#REF http://docs.ruby-lang.org/ja/2.1.0/method/File/s/dirname.html
require 'fileutils'
#REF __FILE__ http://d.hatena.ne.jp/gan2/20070520/1179649635
require File.dirname(__FILE__) + "/" + "cons.rb"
require File.dirname(__FILE__) + "/" + "methods.rb"
# ruby C:\WORKS\WS\Eclipse_Kepler\Cake_IFM11\app\Lib\templates\utils.rb

# @loc_Controller = "../../../Controller"
@dpath_Root = File.dirname(__FILE__)

def create_Controller(cont_Name)
    p @loc_Controller
end

def test
  
    p "hi"
    
    create_Controller("Image")
    
    #REF http://tobysoft.net/wiki/index.php?Ruby%2F%A5%D5%A5%A1%A5%A4%A5%EB%A4%CE%C2%B8%BA%DF%A4%F2%B3%CE%C7%A7%A4%B7%A4%BF%A4%A4
    p File.exist?(@loc_Controller)
    
#    p "file => #{__FILE__}"
#    
    #REF https://tomafro.net/2010/01/tip-relative-paths-with-file-expand-path "File.expand_path can take a second argument"
    p File.expand_path(@loc_Controller, __FILE__)
    
end

def exec_Job
	
	#=================
	# validate: any optins
	#=================
	options = ARGV
	
	if options.length < 1
	  
	  print "No argument"
	  
	  return
	  
	end
	
	p "len = #{options.length.to_s}"
	
	#=================
	# validate: command => valid
	#=================
	cmd = options[0]

	#REF http://ref.xaio.jp/ruby/classes/array/include	
	res = @commands.include?(cmd)
	
	if res != true
	  
	  puts "Unknown command => #{cmd}"
	  
	  return
	  
	end
	
	#=================
	# dispatch
	#=================	
	if cmd == @commands[0]		# scaffold

		#=================
		# validate: has a model name
		#=================	
		if options.length < 2
			
			msg = "No model name given for => scaffolding"
			puts "[#{File.basename(__FILE__)} : #{__LINE__}] #{msg}"
			
			return
			
		end
		
		_exec_Scaffold(options)
		
	else
		
		puts "[#{__FILE__} : #{__LINE__}] Funny. Unknown commands"
		
		puts "cmd = #{cmd}"
		put "registered commmands => "
		p @commands
		
	end
	
	
	# p "res = #{res.to_s}"
    
end#exec_Job

def _exec_Scaffold(options)

		model_Name = options[1]
		
		#=================
		# Copy: model
		#=================	
		_exec_Scaffold__Copy_Model(options)
		
	
end

def _exec_Scaffold__Copy_Model(options)
	
		model_Name = options[1]
		
		#=================
		# setup: src
		#=================	
		f_src = "#{@dpath_Root}/#{@dname_Templates}/#{@fname_Tmpl_Model}"
		
		p "f_src => #{f_src}"
		
		#=================
		# validate
		#=================	
		p "files exists => #{File.exist?(f_src)}"
		
		#=================
		# setup: dst
		#=================	
		# f_dst = "#{@loc_Controller}"
		# model_Name_plural = conv_Singular_to_Plural(model_Name)
		
		f_dst = "#{@loc_Model}/#{model_Name}#{@fname_Model}"
		
		p "f_dst => #{f_dst}"
		
		#=================
		# validate
		#=================	
		p "files exists => #{File.exist?(f_dst)}"

		p File.expand_path(f_dst)
				
		#=================
		# copy
		#=================	
		res = FileUtils.cp(f_src, f_dst)
		# res = File.copy(f_src, f_dst)
		
		msg = "Copy file => #{res.to_s}"
		puts "[#{File.basename(__FILE__)} : #{__LINE__}] #{msg}"

		
end#_exec_Scaffold__Copy_Model(options)
# test

exec_Job
