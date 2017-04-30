=begin

C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\Change_FileName.rb

<Usage>
  1. copy "IMG..." files to ==> C:\WORKS_2\Storage\images\iphone\tmp
  2. run this file ===>
C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\Change_FileName.rb
  
  3. if you want to save the generated console messages, run
C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\Change_FileName.rb > [your-choice-of-file-name]

<info>
written at: 2017/04/30 01:42:17

=end

require 'exifr'
require 'fileutils'

###############################
#
# @param "2017-04-29 16:30:45 +0900"
#
# @return "2017-04-29_16-30-45_000"
#
###############################
def conv_exifdatetime_2_datelabel_with_millsec(exifdatetime)

  #debug
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] exifdatetime => #{exifdatetime}"
  
    
  tokens_1 = exifdatetime.split(" ") #=> [2017-04-29, 16:30:45, +0900]
  
  tokens_2 = tokens_1[1].split(":")   #=> [16, 30, 45]
  
  join_1 = tokens_2.join("-")     #=> 16-30-45
  
  final = "#{tokens_1[0]}_#{join_1}_000"
  
  return final
  
end#conv_exifdatetime_2_datelabel_with_millsec(exifdatetime)

def execute
  
  dpath = "C:/WORKS_2/Storage/images/iphone/tmp"
  
#  p Dir.glob(dpath)
#  p Dir.glob("*") 
  #ref http://stackoverflow.com/questions/1755665/get-names-of-all-files-from-a-folder-with-ruby answered Nov 18 '09 at 12:34
#  p Dir.entries(dpath) 

  #ref https://ruby-doc.org/core-2.2.2/Dir.html  
  Dir.chdir(dpath)
  list = Dir.glob("*")

  aryOf_pairs = Array.new
  
  list.each_with_index {|elem|
   
    fpath = "#{dpath}/#{elem}"

    @exif = EXIFR::JPEG.new(fpath)
     
#    #debug
#    aryof_methods = @exif.methods.sort
#    
#    aryof_methods.each {|elem|
#     
#      p elem
#       
#    }
#    
#    exit
    ##/ debug end
    
#    puts "[#{File.basename(__FILE__)}:#{__LINE__}] date_time_original => " + @exif.date_time_original.to_s
#    puts "[#{File.basename(__FILE__)}:#{__LINE__}] date_time_original => "\
#    puts "[#{File.basename(__FILE__)}:#{__LINE__}] date_time_digitized => "\
    puts "[#{File.basename(__FILE__)}:#{__LINE__}] date_time => "\
          "#{@exif.date_time.to_s}"  #=> works
#          "#{@exif.date_time_digitized.to_s}"  #=> works
#          "#{@exif.date_time_original.to_s}"  #=> works
#          @exif.date_time_original.to_s
    
    #debug
    puts "[#{File.basename(__FILE__)}:#{__LINE__}] calling conv_exifdatetime_2_datelabel_with_millsec elem for => #{elem}"
    
    
    aryOf_pairs << [elem, conv_exifdatetime_2_datelabel_with_millsec(@exif.date_time.to_s)]
#    aryOf_pairs << [elem, @exif.date_time_original.to_s]
    
  }#list.each_with_index {|elem|
      
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] aryOf_pairs =>"
  
  p aryOf_pairs
  
  
#  fpath = "#{dpath}/IMG_1389.JPG"
##  fpath = 'C:/WORKS_2/Storage/images/iphone/tmp/2017-04-27_19-21-12_000.jpg'
#  
#  @exif = EXIFR::JPEG.new(fpath)
##  @exif = EXIFR::JPEG.new('/path/to/file.jpg')
#  
#  puts "[#{File.basename(__FILE__)}:#{__LINE__}] date_time_original => " + @exif.date_time_original.to_s
##  puts "[#{File.basename(__FILE__)}:#{__LINE__}] date_time_original => " + @exif.date_time_original
  
  
  print "done"
  
end#execute

def execute_2
  
  ################################
  #	
  #	build: name pair list
  #
  ################################
  dpath = "C:/WORKS_2/Storage/images/iphone/tmp"
  
  #ref https://ruby-doc.org/core-2.2.2/Dir.html  
  Dir.chdir(dpath)
  list = Dir.glob("*")

  aryOf_pairs = Array.new
  
  list.each_with_index {|elem|
   
    fpath = "#{dpath}/#{elem}"

    puts "[#{File.basename(__FILE__)}:#{__LINE__}] elem is => #{elem}"
    
    #debug
    puts "[#{File.basename(__FILE__)}:#{__LINE__}] elem.split(\".\")[-1] => #{elem.split(".")[-1].downcase}"
    
#    @exif = EXIFR::JPEG.new(fpath)
    
    #test
    date_time_original = nil
    
    begin
      
      @exif = EXIFR::JPEG.new(fpath)
      
      date_time_original = @exif.date_time_original
      
    rescue
      
     puts "[#{File.basename(__FILE__)}:#{__LINE__}] error occurred => #{elem}"
     
#      @exif.date_time_original = nil
     
#     return
      
    end
    
    #/ test end
    
#    #debug
#    p @exif
         
    #ref multiline string http://stackoverflow.com/questions/10522414/breaking-up-long-strings-on-multiple-lines-in-ruby-without-stripping-newlines answered May 9 '12 at 21:10
#    puts "[#{File.basename(__FILE__)}:#{__LINE__}] date_time => "\
#          "#{@exif.date_time.to_s}"  #=> works
    
#    #debug
#    puts "[#{File.basename(__FILE__)}:#{__LINE__}] calling conv_exifdatetime_2_datelabel_with_millsec elem for => #{elem}"
#
#    puts "[#{File.basename(__FILE__)}:#{__LINE__}] @exif.date_time_original.to_s => #{@exif.date_time_original.to_s}"
#    puts "[#{File.basename(__FILE__)}:#{__LINE__}] @exif.date_time_digitized.to_s => #{@exif.date_time_digitized.to_s}"
#    puts "[#{File.basename(__FILE__)}:#{__LINE__}] @exif.date_time.to_s => #{@exif.date_time.to_s}"
#    puts "[#{File.basename(__FILE__)}:#{__LINE__}] @exif.date_time_original => #{@exif.date_time_original}"
#    puts "[#{File.basename(__FILE__)}:#{__LINE__}] @exif.date_time => #{@exif.date_time}"

#    file = File.open(fpath)
#    
    #ref mtime http://stackoverflow.com/questions/10580728/is-it-possible-to-read-a-files-modification-date-with-ruby answered May 14 '12 at 9:39
#    p File.mtime(fpath)
#    
#    file.close
      
    if date_time_original == nil
#    if @exif.date_time_original == nil
#    if @exif.date_time_original.to_s == nil
    
      puts "[#{File.basename(__FILE__)}:#{__LINE__}] @exif.date_time_original.to_s == nil"
      
      target_date_time_label = File.mtime(fpath).to_s
#      target_date_time_label = File.mtime(fpath)
    
    else#if (@exif.date_time_original.to_s == nil)
    
      target_date_time_label = @exif.date_time_original.to_s
    
    end#if (@exif.date_time_original.to_s == nil)  
#      target_date_time_label = @exif.date_time_original.to_s
    
    puts "[#{File.basename(__FILE__)}:#{__LINE__}] target_date_time_label => #{target_date_time_label}"
    
    
    aryOf_pairs << [elem, \
              conv_exifdatetime_2_datelabel_with_millsec(target_date_time_label)\
              , elem.split(".")[-1].downcase]
#    aryOf_pairs << [elem, conv_exifdatetime_2_datelabel_with_millsec(target_date_time_label)]
#    aryOf_pairs << [elem, conv_exifdatetime_2_datelabel_with_millsec(@exif.date_time_original.to_s)]
#    aryOf_pairs << [elem, conv_exifdatetime_2_datelabel_with_millsec(@exif.date_time.to_s)]
    
  }#list.each_with_index {|elem|
      
#  puts "[#{File.basename(__FILE__)}:#{__LINE__}] aryOf_pairs =>"
  
#  p aryOf_pairs

  ################################
  # 
  # modify: same name file?
  #
  ################################
  aryOf_pairs_final = Array.new
  
#  aryOf_pairs.each_with_index {|elem, i|
#   
#    p elem
#     
#  }

  #debug
#  p aryOf_pairs.keys
  
  ############### index 0 : original file names
  #ref collect http://ruby-doc.org/core-1.9.3/Array.html#method-i-map
  aryof_original_names = aryOf_pairs.collect {|x|   

    x[0]  
  
  }
  
#  p aryof_original_names
  
  ############### index 1 : modified file names
  aryof_modified_names = aryOf_pairs.collect {|x|   

    x[1]  
  
  }
  
  ############### index 2 : extension
  aryof_original_extensions = aryOf_pairs.collect {|x|   

    x[2]  
  
  }
  
  ############### file name ---> modify
  aryof_modified_names_tmp = Array.new
  
#  p aryof_modified_names.collect {|x|
  
  #test
#  aryof_modified_names = ["2017-04-27_19-21-12_000", "2017-04-27_19-21-25_000", "2017-04-27_20-08-35_000", "2017-04-29_16-30-43_000", "2017-04-29_16-30-45_000"]
#  aryof_modified_names = ["2017-04-27_19-21-12_000", "2017-04-27_19-21-25_000", "2017-04-27_20-08-35_000", "2017-04-29_16-30-43_000", "2017-04-27_19-21-12_000"]
#  aryof_modified_names = ["2017-04-27_19-21-12_000", "2017-04-27_19-21-25_000", "2017-04-27_20-08-35_000", "2017-04-27_19-21-12_000", "2017-04-27_19-21-12_000"]
#
#  puts "[#{File.basename(__FILE__)}:#{__LINE__}] aryof_modified_names =>"
#  
#  p aryof_modified_names
#  
  ##/ test end
    
  aryof_modified_names.each {|x|
   
    #ref include http://stackoverflow.com/questions/1986386/check-if-a-value-exists-in-an-array-in-ruby answered Dec 31 '09 at 17:51
    res = aryof_modified_names_tmp.include?(x)
    
    if res == false
      
      aryof_modified_names_tmp << x
      
    else
      
      puts "[#{File.basename(__FILE__)}:#{__LINE__}] result => false : #{x}"
      
      while res == true
#      while res == false
        
        tokens = x.split("_")

        #ref http://stackoverflow.com/questions/1543171/how-can-i-output-leading-zeros-in-ruby answered Oct 9 '09 at 11:16        
        mill = (tokens[2].to_i + 1).to_s.rjust(3, "0")
        
        x = "#{tokens[0]}_#{tokens[1]}_#{mill}"
        
        puts "[#{File.basename(__FILE__)}:#{__LINE__}] x is now => #{x}"
        
        
        res = aryof_modified_names_tmp.include?(x)
      
      end
      
      aryof_modified_names_tmp << x
      
    end#if res == false
    
#    aryof_modified_names_tmp.include?(x) ? x + " => included" : x  #=> works
    
  }

#  puts "[#{File.basename(__FILE__)}:#{__LINE__}] aryof_modified_names_tmp =>"
#  
#  p aryof_modified_names_tmp
  
  ############### build ==> new array
  aryof_modified_names_tmp.each_with_index {|elem, i|

    aryOf_pairs_final << [aryof_original_names[i], elem]
        
  }

  puts
#  puts "[#{File.basename(__FILE__)}:#{__LINE__}] aryOf_pairs_final =>"
  
#  p aryOf_pairs_final

  ################################
  # 
  # file: rename
  #
  ################################
  count = 0
  
  aryOf_pairs_final.each_with_index {|elem, i|
#  aryOf_pairs_final.each {|elem|

    fpath_src = "#{dpath}/#{elem[0]}"
    fpath_dst = "#{dpath}/#{elem[1]}.#{aryof_original_extensions[i]}"
#    fpath_dst = "#{dpath}/#{elem[1]}.jpg"
    
    #debug
#    puts "[#{File.basename(__FILE__)}:#{__LINE__}] fpath_src = #{fpath_src} / fpath_dst = #{fpath_dst}"
    
    #ref http://rubytips86.hatenablog.com/entry/2014/04/01/220058
    File.rename(fpath_src, fpath_dst)
    
    count += 1
    
  }

    
  print "done ==> #{count} files renamed / total = #{aryOf_pairs_final.size} files"
#  print "done"
  
end#execute

#execute
execute_2
