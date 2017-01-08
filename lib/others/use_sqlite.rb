# encoding: utf-8

require 'sqlite3'
require 'csv'

=begin

file:         use_sqlite.rb
created at:   2017/01/05 18:00:48

<Usage>
C:\WORKS_2\WS\WS_Others\JVEMV6\12#\use_sqlite.rb

pushd C:\WORKS_2\WS\WS_Others\JVEMV6\12#
use_sqlite.rb

=end

=begin

sqlite3 C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\data\ifm11_backup_20160110_080900.bk
SELECT * FROM ifm11 WHERE file_name = '2017-01-05_10-47-41_000.jpg' ;

=end

FPATH = "C:/WORKS_2/WS/WS_Others/prog/D-5/2#"

#ref http://stackoverflow.com/questions/837123/adding-a-directory-to-load-path-ruby
libdir = File.expand_path(File.dirname(FPATH))

$LOAD_PATH.unshift(FPATH) unless $LOAD_PATH.include?(libdir)

require 'utils.20161228_123529'



################################
#	
#	variables
#
################################
#ref http://qiita.com/kansiho/items/f5ab9b6eeb990e6af327
$FNAME_ONE_ENTRY  = "data.txt"
$FNAME_RANGE      = "range.txt"
$FNAME_MULTIPLE      = "multiple.csv"
$FNAME_ENTRIES      = "entries.csv"

#$FNAME_DB = "C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/data/#ifm11_backup_20160110_080900.bk.for-use"
$FNAME_DB = "C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/data/ifm11_backup_20160110_080900.bk"


################################
#	
#	methods
#
################################
def test_sqlite
  
  #debug
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] starting ..."
  
  
  fname = "C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/data/ifm11_backup_20160110_080900.bk"
  
  #ref http://www.ownway.info/Ruby/sqlite3-ruby/about
  db = SQLite3::Database.new(fname)
  
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] db => opened: #{fname}"
  
  # select
  cursor = db.execute("SELECT * FROM ifm11 WHERE _id > 18586")
#  cursor = db.execute("SELECT * FROM ifm11 WHERE _id < 10")
#  cursor = db.execute("SELECT * FROM ifm11 WHERE key1 = ? AND key2 = ?", [key1, key2])
  
  #debug
  p cursor
  
  cursor.each do |tuple|
    puts tuple[0]  # value1 の値
    puts tuple[1]  # value2 の値
  end
  
  # db を使い MySQL を操作する
  db.close
  
end#test_sqlite

def test_sqlite_2
  
  fname = "C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/data/ifm11_backup_20160110_080900.bk"
  
  #ref http://www.ownway.info/Ruby/sqlite3-ruby/about
  db = SQLite3::Database.new(fname)
  
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] db => opened: #{fname}"
  
  ################################
  #	
  #	get: data
  #
  ################################
  f = File.open("data.txt", "r")
  
  line = f.readlines
#  line = f.read
  
  # close file
  f.close
  
  # extract strings
  fname = line[0].split("=")[1].strip
  tags = line[3].split("=")[1].strip
#  fname = line[0].split("=")[1]
#  tags = line[3].split("=")[1]

  
  ################################
  #	
  #	db
  #
  ################################
  sql = "UPDATE ifm11 SET tags = '%s' WHERE file_name = '%s';" % [tags, fname]
#  sql = "UPDATE ifm11 SET tags = '%s' WHERE file_name = '2017-01-05_10-47-41_000.jpg';" % tags
#  sql = "UPDATE ifm11 SET tags = '++' WHERE file_name = '2017-01-05_10-47-41_000.jpg';"
#  sql = "UPDATE ifm11 SET tags = '-' WHERE file_name = '2017-01-05_10-47-41_000.jpg';"
#  sql = "SELECT * FROM ifm11 WHERE _id > 18586"
  
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] sql => #{sql}"
  
  
  cursor = db.execute(sql)
#  cursor = db.execute("SELECT * FROM ifm11 WHERE _id < 10")
#  cursor = db.execute("SELECT * FROM ifm11 WHERE key1 = ? AND key2 = ?", [key1, key2])
  
  #debug
  p cursor
  
#  cursor.each do |tuple|
#    puts tuple[0]  # value1 の値
#    puts tuple[1]  # value2 の値
#  end
  
  # db を使い MySQL を操作する
  db.close
  
  #debug
  "[#{File.basename(__FILE__)}:#{__LINE__}] db => closed"
  
end#test_sqlite_2

def update_single_record
  
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] updating..."
  
  ################################
  #	
  #	read file
  #
  ################################
  f = File.open("data.txt", "r")
  
  line = f.readlines
#  line = f.read
  
  ################################
  #	
  #	close file
  #
  ################################
  f.close
  
  ################################
  #	
  #	build sql statement
  #
  ################################
#  fname = line[0].split("=")[1]
#  tags = line[3].split("=")[1]
  fname = line[0].split("=")[1].strip
  tags = line[3].split("=")[1].strip

#  p line
  
  #ref http://ref.xaio.jp/ruby/classes/string/percent
  sql = "UPDATE ifm11 SET tags = '%s' WHERE file_name = '%s';" % [tags, fname]
#  sql = "UPDATE ifm11 SET tags = '-' WHERE file_name = '2017-01-05_10-47-41_000.jpg';"
#  sql = "UPDATE ifm11 SET tags = \"%s\" WHERE file_name = \"%s\";" % [tags, fname]
#  sql = "UPDATE ifm11 SET tags = %s WHERE file_name = %s;" % tags, fname
#  sql = "UPDATE ifm11 SET tags = %s WHERE file_name = %s;" % tags, fname
  
  #debug
#  puts "[#{File.basename(__FILE__)}:#{__LINE__}] sql => #{sql}"

  # execute
  fname = "C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/data/#ifm11_backup_20160110_080900.bk.for-use"
#  fname = "C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/data/ifm11_backup_20160110_080900.bk"
  
  #ref http://www.ownway.info/Ruby/sqlite3-ruby/about
  db = SQLite3::Database.new(fname)

#  cursor = db.execute("UPDATE ifm11 SET tags = '?' WHERE file_name = '?';" % [tags, fname])
  cursor = db.execute(sql)
  
  p cursor  
  
  # close db
  db.close
  
end#update_single_record

def update_records__range
  
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] updating..."
  
  ################################
  #	
  #	read file
  #
  ################################
  f = File.open($FNAME_RANGE, "r")
  
  line = f.readlines
  
  ################################
  #	
  #	close file
  #
  ################################
  f.close
  
  ################################
  #	
  #	build sql statement
  #
  ################################
  fname_start = line[0].split("=")[1].strip
  fname_end = line[1].split("=")[1].strip
  tags = line[3].split("=")[1].strip

#  p line
  
  #ref http://ref.xaio.jp/ruby/classes/string/percent
  #ref http://stackoverflow.com/questions/2337510/ruby-can-i-write-multi-line-string-with-no-concatenation no=329
  sql = "UPDATE ifm11 SET tags = '%s' "\
        "WHERE file_name >= '%s' "\
        "AND "\
        "file_name <= '%s';"\
        % [tags, fname_start, fname_end]
  
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] sql => #{sql}"
  
        
  # execute
  fname_db = $FNAME_DB
#  fname_db = "C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/data/#ifm11_backup_20160110_080900.bk.for-use"
#  fname = "C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/data/ifm11_backup_20160110_080900.bk"
  
  #ref http://www.ownway.info/Ruby/sqlite3-ruby/about
  db = SQLite3::Database.new(fname_db)

  cursor = db.execute(sql)
  
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] db => executed"
  
#  p cursor  
  
  # close db
  db.close
  
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] db => closed"
  
  
end#update_single_record

def update_records__multiple
  
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] updating..."
  
  ################################
  #	
  #	read file
  #
  ################################
  #ref http://qiita.com/shizuma/items/7719172eb5e8c29a7d6e#csvread
#  csv_data = CSV.read($FNAME_MULTIPLE, headers: true, force_quotes: true, force_slashes: true) #=> error
#  csv_data = CSV.read($FNAME_MULTIPLE, headers: true, force_quotes: true)  #=> w
#  csv_data = CSV.read($FNAME_MULTIPLE, headers: true)
  #ref http://stackoverflow.com/questions/7078974/how-to-change-the-encoding-during-csv-parsing-in-rails no=12
#  csv_data = CSV.read($FNAME_MULTIPLE, headers: true, encoding: 'utf-8')  #=> w.
#  csv_data = CSV.read($FNAME_MULTIPLE, headers: true, encoding: 'utf-8', col_sep: '\t')  #=> n.w.
  csv_data = CSV.read($FNAME_MULTIPLE, headers: true, encoding: 'utf-8', col_sep: "\t")  #=> w.
  
  
  ################################
  #	
  #	build sql statement
  #
  ################################
  # execute
  fname_db = $FNAME_DB
#  fname_db = "C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/data/#ifm11_backup_20160110_080900.bk.for-use"
#  fname = "C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/data/ifm11_backup_20160110_080900.bk"
  
  #ref http://www.ownway.info/Ruby/sqlite3-ruby/about
  db = SQLite3::Database.new(fname_db)

  #test
  #ref http://ref.xaio.jp/ruby/classes/string/encode
  Encoding.default_internal = "utf-8"
  
  
  csv_data.each do |data|
    
#    tags = data["tags"].encode #=> w.
    memos = data["memos"] #=> w.
    fname = data["file_name"]

          
    

    # validate
    if memos == "" or memos == nil
      
      puts "[#{File.basename(__FILE__)}:#{__LINE__}] skipping the line ... (memo is '#{memos}')"
      
      next
      
    end

    sql = "UPDATE ifm11 SET memos = '%s' "\
          "WHERE file_name = '%s';"\
          % [memos, fname]
          
    puts "[#{File.basename(__FILE__)}:#{__LINE__}] sql => #{sql}"
    
    #test
#    tags = tags.gsub("\/","")
#    tags = tags.gsub("\\","")
#    tags = tags.gsub(/\\/,"")
#    tags = tags.gsub(/\\/,"")
    
#    puts "[#{File.basename(__FILE__)}:#{__LINE__}] sql => #{sql}"
  
    cursor = db.execute(sql)
    puts "[#{File.basename(__FILE__)}:#{__LINE__}] db => executed"
      
  end
  
  # close db
  db.close
  
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] db => closed"
  
end#update_single_record

def show_help

  puts "<Usage>"  
  puts "\tuse_sqlite.rb [type]"  
  
  puts "<types>"
  puts "\tf\tgenerate csv file with entries ('entries.csv')"
  puts "\tm\trecord multiple items ('multiple.csv')"
  puts "\tr\trecord items from a range of period ('range.txt')"
  puts "\ts\trecord a single item ('one_entry.txt')"
  
end#show_help

def generate_entries_file
  
#  puts "[#{File.basename(__FILE__)}:#{__LINE__}] generating..."

  ################################
  #	
  #	files list
  #
  ################################
  dpath = "C:/Users/iwabuchiken/data/images/iphone"
  type = "files"
  
  files = get_dir_list(dpath, type, sort = true)

  p files.size  
  p files[0]
  
  ################################
  #	
  #	write: csv
  #
  ################################
#  csv_data = CSV.write($FNAME_ENTRIES, headers: true, encoding: 'utf-8', col_sep: "\t")  #=> w.
  
#  CSV.open('test.csv','w', encoding: 'utf-8', col_sep: "\t") do |test|
  #ref http://qiita.com/shizuma/items/7719172eb5e8c29a7d6e
#  p CSV.generate do |csv|  #=> "`generate': no block given"
  result = CSV.generate do |csv|
    
    csv << ["A","B","C"]
    csv << ["milk","coffee","water"]
    
#  CSV.open('test.csv','w') do |test|
#   test << ["A","B","C"]
#   test << ["milk","coffee","water"]
  end
  
  p result
  
  # write file
#  f = File.open("abc.csv", 'w')
#  
#  f.puts(" UTF-8 に変換できなかった場合は")
#  
#  f.close
  
#  File.open("abc.csv", 'w') do |file|
  File.open("intro.#{get_time_label()}.csv", 'w') do |file|
#  File.open("intro.csv", 'w') do |file|
    
    #debug
    puts "[#{File.basename(__FILE__)}:#{__LINE__}] file => opened"
    
    
#    file.write("このクラスは CSV ファイルやデータに対する完全なインターフェイスを提供します。")
    file.write(result)
#    file.write(intro_csv)
    
  end
  
  #debug
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] write csv => done"
  
  
#  ################################
#  # 
#  # build sql statement
#  #
#  ################################
#  # execute
#  fname_db = $FNAME_DB
#  #  fname_db = "C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/data/#ifm11_backup_20160110_080900.bk.for-use"
#  #  fname = "C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/data/ifm11_backup_20160110_080900.bk"
#  
#  #ref http://www.ownway.info/Ruby/sqlite3-ruby/about
#  db = SQLite3::Database.new(fname_db)
  
  
end#generate_entries_file

def exec

  ################################
  #	
  #	validate: parameters
  #
  ################################
#  p ARGV.size
  
  if ARGV.size < 1
    
    puts "[#{File.basename(__FILE__)}:#{__LINE__}] arguments needed"
    
    show_help
    
    return
    
  end

  ################################
  #	
  #	one entry
  #
  ################################
  if ARGV[0] == "s"
    
    update_single_record
    
    return
    
  elsif ARGV[0] == "r"
    
    update_records__range

    return
    
  elsif ARGV[0] == "m"
    
    update_records__multiple
    
    return
    
  elsif ARGV[0] == "f"

#    #test    #=> w.
#    puts "[#{File.basename(__FILE__)}:#{__LINE__}] writing a file..."
#        
#    File.open("intro.csv", 'w') do |file|
#      
#      file.write("出力は以下のような感じ。")
#    #    file.write(intro_csv)
#      
#    end

    
    generate_entries_file
    
    return
    
  end
#  update_single_record
  
#  test_sqlite_2
#  test_sqlite
  
  
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] done!"
  
  
end#exec

exec
