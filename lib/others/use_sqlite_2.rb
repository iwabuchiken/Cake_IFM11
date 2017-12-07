# encoding: utf-8

require 'sqlite3'
require 'csv'

=begin

file:         use_sqlite.rb
created at:   2017/01/05 18:00:48

<Usage>
C:\WORKS_2\WS\WS_Others\JVEMV6\12#\use_sqlite_2.rb

pushd C:\WORKS_2\WS\WS_Others\JVEMV6\12#
use_sqlite_2.rb

use_sqlite_2.rb f
use_sqlite_2.rb m

C:\WORKS_2\WS\WS_Others\JVEMV6\12#\use_sqlite_2.rb m

pushd C:\WORKS_2\WS\WS_Others\JVEMV6\12#
use_sqlite_2.rb m

=end

=begin

sqlite3 C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\data\ifm11_backup_20160110_080900.bk
SELECT * FROM ifm11 WHERE file_name = '2017-01-05_10-47-41_000.jpg' ;

=end

#FPATH = "C:/WORKS_2/WS/WS_Others/prog/D-5/2#"
FPATH = "."  #=> permission denied
#FPATH = "./"  #=> permission denied

#ref http://stackoverflow.com/questions/837123/adding-a-directory-to-load-path-ruby
libdir = File.expand_path(File.dirname(FPATH))

$LOAD_PATH.unshift(FPATH) unless $LOAD_PATH.include?(libdir)

require 'utils.20161228_123529'

################################
# 
# variables
#
################################
#ref http://qiita.com/kansiho/items/f5ab9b6eeb990e6af327
$FNAME_ONE_ENTRY  = "data.txt"
$FNAME_RANGE      = "range.txt"
$FNAME_MULTIPLE      = "multiple.csv"
$FNAME_ENTRIES      = "entries.csv"

#$FNAME_DB = "C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/data/#ifm11_backup_20160110_080900.bk.for-use"
#$FNAME_DB = "C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/data/ifm11_backup_20160110_080900.bk~"
$FNAME_DB = "C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/data/ifm11_backup_20160110_080900.bk"
#C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\data\ifm11_backup_20160110_080900.bk

$DPATH_IMAGE_FILE = "C:/WORKS_2/WS/WS_Cake_IFM11/iphone"

################################
#	
#	methods
#
################################
def show_help

  puts "<Usage>"  
  puts "\tuse_sqlite.rb [type]"  
  
  puts "<types>"
  puts "\td\tDelete unused photos"
  puts "\td2\tDelete unused photos in 'tmp' folder"
  
  puts "\tf\tgenerate csv file with entries ('entries.csv')"
  puts "\tm\trecord multiple items ('multiple.csv')"
  puts "\tr\trecord items from a range of period ('range.txt')"
  puts "\ts\trecord a single item ('one_entry.txt')"
  
end#show_help



def update_records__multiple

  puts "[#{File.basename(__FILE__)}:#{__LINE__}] updating..."
  
  ################################
  # 
  # read file
  #
  ################################
  #ref http://qiita.com/shizuma/items/7719172eb5e8c29a7d6e#csvread
  csv_data = CSV.read($FNAME_ENTRIES, headers: true, encoding: 'utf-8', col_sep: "\t")  #=> w.
#  csv_data = CSV.read($FNAME_ENTRIES, headers: true, encoding: 'utf-8', col_sep: "\t")  #=> w.
#  csv_data = CSV.read($FNAME_MULTIPLE, headers: true, encoding: 'utf-8', col_sep: "\t")  #=> w.

  ################################
  # 
  # build sql statement
  #
  ################################
  # execute
  fname_db = $FNAME_DB
#  fname_db = "C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/data/#ifm11_backup_20160110_080900.bk.for-use"
#  fname = "C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/data/ifm11_backup_20160110_080900.bk"
  
  #ref http://www.ownway.info/Ruby/sqlite3-ruby/about
  db = SQLite3::Database.new(fname_db)
  
  #debug
  puts
  p db
  puts

  #test
  #ref http://ref.xaio.jp/ruby/classes/string/encode
  Encoding.default_internal = "utf-8"
  
  # counter
  count_inserted = 0
  
  count_total = csv_data.size

  csv_data.each do |data|
    
    memos = data["memos"] #=> w.
    fname = data["file_name"]

#    # validate : file ---> not exist
#    sql = "SELECT * FROM ifm11 WHERE file_name = '?';"
#              
##    sql = "SELECT * FROM ifm11 WHERE file_name = '%s';"\
##              % [fname]
#    
#    puts "[#{File.basename(__FILE__)}:#{__LINE__}] sql(query) => #{sql}"
#    
#    result = db.execute("SELECT * FROM ifm11 WHERE file_name = '?';", [fname])
##    result = db.execute(sql, [fname])
##    result = db.query(sql, [fname])
#    
#    p result
              
#    db.execute(sql) do |row|
#    
#      puts "[#{File.basename(__FILE__)}:#{__LINE__}] row[5] => #{row[5]}"
#        
##      p row[5]
##      p row
##      p row['file_name']
#      
#    end
#    db.query(sql)
              
              
      
#    f_FileExists = File.exists?($DPATH_IMAGE_FILE + "/" + fname)
#    
#    if f_FileExists == false
#      
#      puts "[#{File.basename(__FILE__)}:#{__LINE__}] file NOT exist ... ('#{fname}')"
#      
#      next
#      
#    else
#      
#      puts "[#{File.basename(__FILE__)}:#{__LINE__}] file exists ... ('#{fname}')"
#      
#    end

    # validate : memos ---> no entry
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
  
    #debug
    begin
    
      cursor = db.execute(sql)
      
      puts "[#{File.basename(__FILE__)}:#{__LINE__}] cursor => #{cursor}"
      
      
      puts "[#{File.basename(__FILE__)}:#{__LINE__}] db => executed"
      
      puts 
      
      # count
      count_inserted += 1
      
    rescue => e
      
      puts "[#{File.basename(__FILE__)}:#{__LINE__}] error => #{e}"
      
    end
      
  end#csv_data.each do |data|

  # close db
  db.close
  
  # report
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] db => closed"
  
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] total = #{count_total} / inserted = #{count_inserted}"
  

end#update_records__multiple

def generate_entries_file
  
#  puts "[#{File.basename(__FILE__)}:#{__LINE__}] generating..."

  ################################
  #	
  #	files list
  #
  ################################
  dpath = "C:/WORKS_2/WS/WS_Cake_IFM11/iphone"
#  dpath = "C:/Users/iwabuchiken/data/images/iphone"
  
  type = "files"
  
  files = get_dir_list(dpath, type, sort = true)

  # sort ==> DESC
  files.reverse!
  
#  p files.size  
#  p files[0]
  
  ################################
  #	
  #	write: csv
  #
  ################################
  #ref http://d.akiroom.com/2013-04/ruby-header-csv/
  header = ["no", "file_name", "memos"]
  
  result = CSV.generate(encoding: 'utf-8', col_sep: "\t") do |csv|
#  result = CSV.generate(headers: header, encoding: 'utf-8', col_sep: "\t") do |csv|
   
    # header
    csv << header
    
    files.each_with_index do |name, i|
      
      csv << [i + 1, name]
      
    end#files.each do |name|
     
  end#result = CSV.generate do |csv|
  
#  File.open("abc.csv", 'w') do |file|
  File.open($FNAME_ENTRIES, 'w') do |file|
#  File.open("#{$FNAME_ENTRIES}.csv", 'w') do |file|
    
    #debug
    puts "[#{File.basename(__FILE__)}:#{__LINE__}] file => opened"

        
    
    file.write(result)
    
  end#File.open("intro.#{get_time_label()}.csv", 'w') do |file|
  
  #debug
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] total files => #{files.size.to_i} "

  #debug
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] write csv => done"
  
end#generate_entries_file

def delete_unused_photos
  
  ################################
  # 
  # build sql statement
  #
  ################################
  # execute
  fname_db = $FNAME_DB
  
  #ref http://www.ownway.info/Ruby/sqlite3-ruby/about
  db = SQLite3::Database.new(fname_db)

#  sql = "DELETE  FROM ifm11_1 WHERE memos LIKE '-*%';"  #=> TEST : "ifm11_1" ---> not existing
#      #=> no such table: ifm11_1
  
  sql = "DELETE  FROM ifm11 WHERE memos LIKE '-*%';"
#  sql = "DELETE  FROM ifm11 WHERE memos LIKE "-*%";"
  
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] sql => #{sql}"
  
  cursor = db.execute(sql)

  puts "[#{File.basename(__FILE__)}:#{__LINE__}] db.execute => returned #{cursor.size}"
  
  
#  p cursor
#  p cursor.size
  
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] db => executed"

  # close db
  db.close
  
end#delete_unused_photos

def _delete_Unused_Photos_In_tmp_Folder__1_DB_Process(fname)
  
  begin
    
    fname_db = $FNAME_DB
    
    #ref http://www.ownway.info/Ruby/sqlite3-ruby/about
    db = SQLite3::Database.new(fname_db)
    
    sql_command = "SELECT * FROM ifm11 WHERE file_name='#{fname}'"
    
#    puts
#    puts "[#{File.basename(__FILE__)}:#{__LINE__}] sql =>"
#    p sql_command
    
    stm = db.prepare sql_command
#    stm = db.prepare "SELECT * FROM ifm11 WHERE file_name='#{fname}'"
#    stm = db.prepare "SELECT * FROM ifm11 WHERE file_name=?"
    
#    stm.bind_param 1, fname
    
#    puts
#    puts "[#{File.basename(__FILE__)}:#{__LINE__}] stm =>"
    
#    p stm
    
    rs = stm.execute
    
#    puts
#    puts "[#{File.basename(__FILE__)}:#{__LINE__}] rs =>"
    
#    p rs
    
    row = rs.next
    
#    puts
#    puts "[#{File.basename(__FILE__)}:#{__LINE__}] row =>"
#    
#    p row
    
    puts
    
    if row == nil
      
      puts "[#{File.basename(__FILE__)}:#{__LINE__}] row ==> nil : #{fname}"
      
    else
      
#      p row.size
      
    end
    
#    p row.size
    
  
  rescue SQLite3::Exception => e 
      
      puts "Exception occurred"
      puts e
      
  ensure
    
      stm.close if stm
      db.close if db
      
  end
  
    ####################
    # return
    ####################
  if row == nil
    return nil
  else
    return row
  end

end#_delete_Unused_Photos_In_tmp_Folder__1_DB_Process

def delete_Unused_Photos_In_tmp_Folder
  
    ####################
    # get : dir list
    ####################
  #ref %q https://stackoverflow.com/questions/32340957/sqlite-relational-database-query-in-ruby
  dpath = %q"C:\WORKS_2\WS\WS_Cake_IFM11\tmp";
  type = "files"
  sort = true
  
  listOf_FileNamesInTMPFolder = get_dir_list(dpath, type, sort)
  
  puts
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] listOf_FileNamesInTMPFolder => #{listOf_FileNamesInTMPFolder.size}"
  
    ####################
    # validate : any entries?
    ####################
  if listOf_FileNamesInTMPFolder == nil
    
    puts
    puts "[#{File.basename(__FILE__)}:#{__LINE__}] listOf_FileNames => nil"
    
    return
    
  elsif listOf_FileNamesInTMPFolder.size < 1
    
    puts
    puts "[#{File.basename(__FILE__)}:#{__LINE__}] listOf_FileNames => less than 1"
    
    return
    
  end
  
  #
#  pushd \WORKS_2\WS\Eclipse_Luna\Cake_IFM11\lib\others\
#  use_sqlite_2.rb
  
#  #debug
#  puts "[#{File.basename(__FILE__)}:#{__LINE__}] delete_Unused_Photos_In_tmp_Folder"
  
    ####################
    # iterate
    ####################
  fout_Name = "others_data/d2_#{get_time_label()}.txt"
#  fout_Name = "others_data/tmp_#{get_time_label()}.txt"
  
  countOf_DeletedFiles = 0
  
  listOf_FileNamesInTMPFolder.each do |entry|
    
    fname = entry
    
    #ref http://zetcode.com/db/sqliteruby/queries/
    res = _delete_Unused_Photos_In_tmp_Folder__1_DB_Process(fname)
    
    data_Line = (res == nil) ? "nil" : res.join("\t")
    
    puts
    puts "[#{File.basename(__FILE__)}:#{__LINE__}] result => #{data_Line}"
  #  puts "[#{File.basename(__FILE__)}:#{__LINE__}] result => #{res}"
    
      ####################
      # write : to file
      ####################
#    fout_Name = "others_data/tmp_#{get_time_label()}.txt"
    
    if res != nil
      
      begin
        
  #      fout_Name = "others_data/tmp_#{get_time_label()}.txt"
        
        fout = File.open(fout_Name, "a")
#        fout = File.open(fout_Name, "w")
        
        fout.write(data_Line)
        fout.write("\n")
        
        fout.close
      
#        puts
#        puts "[#{File.basename(__FILE__)}:#{__LINE__}] file => closed : #{fout_Name}"
        
          ####################
          # count
          ####################
        countOf_DeletedFiles += 1
        
          ####################
          # delete file
          ####################
        fpath_Delete = dpath + "\\" + entry
        
        puts
        puts "[#{File.basename(__FILE__)}:#{__LINE__}] Deleting file... => #{fpath_Delete}"
        
        res_Delete = File.delete(fpath_Delete)
        
        puts "[#{File.basename(__FILE__)}:#{__LINE__}] \tresult => #{res_Delete}"
        
      rescue Exception => e
      
        puts
        puts "[#{File.basename(__FILE__)}:#{__LINE__}] Exception occurred"
        
    #    puts "Exception occurred"
        
        puts e  
        
      end#begin
    
    else
      
      puts
      puts "[#{File.basename(__FILE__)}:#{__LINE__}] nil returned => #{fname}"
      
      
    end#if
    
    
    
  end#listOf_FileNamesInTMPFolder.each do |entry|
  
    ####################
    # report : count
    ####################
  puts
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] countOf_DeletedFiles => #{countOf_DeletedFiles}"
  
  
#  #test
#  fname = "2017-12-04_14-33-27_000.jpg"
#  fname = "2017-12-04_14-33-27_001.jpg"

#  #ref http://zetcode.com/db/sqliteruby/queries/
#  res = _delete_Unused_Photos_In_tmp_Folder__1_DB_Process(fname)
#  
#  data_Line = (res == nil) ? "nil" : res.join("\t")
#  
#  puts
#  puts "[#{File.basename(__FILE__)}:#{__LINE__}] result => #{data_Line}"
##  puts "[#{File.basename(__FILE__)}:#{__LINE__}] result => #{res}"
#  
#    ####################
#    # write : to file
#    ####################
#  fout_Name = "others_data/tmp_#{get_time_label()}.txt"
#  
#  if res != nil
#    
#    begin
#      
##      fout_Name = "others_data/tmp_#{get_time_label()}.txt"
#      
#      fout = File.open(fout_Name, "w")
#      
#      fout.write(data_Line)
#      fout.write("\n")
#      
#      fout.close
#    
#      puts
#      puts "[#{File.basename(__FILE__)}:#{__LINE__}] file => closed : #{fout_Name}"
#      
#      
#    rescue Exception => e
#    
#      puts
#      puts "[#{File.basename(__FILE__)}:#{__LINE__}] Exception occurred"
#      
#  #    puts "Exception occurred"
#      
#      puts e  
#      
#    end#begin
#  
#  else
#    
#    puts
#    puts "[#{File.basename(__FILE__)}:#{__LINE__}] nil returned => #{fout_Name}"
#    
#    
#  end#if
#  
#  begin
#    
#    fname_db = $FNAME_DB
#    
#    #ref http://www.ownway.info/Ruby/sqlite3-ruby/about
#    db = SQLite3::Database.new(fname_db)
#    
#    sql_command = "SELECT * FROM ifm11 WHERE file_name='#{fname}'"
#    
#    puts
#    puts "[#{File.basename(__FILE__)}:#{__LINE__}] sql =>"
#    p sql_command
#    
#    stm = db.prepare sql_command
##    stm = db.prepare "SELECT * FROM ifm11 WHERE file_name='#{fname}'"
##    stm = db.prepare "SELECT * FROM ifm11 WHERE file_name=?"
#    
##    stm.bind_param 1, fname
#    
##    puts
##    puts "[#{File.basename(__FILE__)}:#{__LINE__}] stm =>"
#    
#    p stm
#    
#    rs = stm.execute
#    
#    puts
#    puts "[#{File.basename(__FILE__)}:#{__LINE__}] rs =>"
#    
#    p rs
#    
#    row = rs.next
#    
#    puts
#    puts "[#{File.basename(__FILE__)}:#{__LINE__}] row =>"
#    
#    p row
#    
#    puts
#    p row.size
#    
#  
#  rescue SQLite3::Exception => e 
#      
#      puts "Exception occurred"
#      puts e
#      
#  ensure
#    
#      stm.close if stm
#      db.close if db
#      
#  end
  
  return
  
  
  
  ################################
  # 
  # build sql statement
  #
  ################################
  # execute
  fname_db = $FNAME_DB
  
  #ref http://www.ownway.info/Ruby/sqlite3-ruby/about
  db = SQLite3::Database.new(fname_db)

#  sql = "DELETE  FROM ifm11_1 WHERE memos LIKE '-*%';"  #=> TEST : "ifm11_1" ---> not existing
#      #=> no such table: ifm11_1
  
  sql = "DELETE  FROM ifm11 WHERE memos LIKE '-*%';"
#  sql = "DELETE  FROM ifm11 WHERE memos LIKE "-*%";"
  
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] sql => #{sql}"
  
  cursor = db.execute(sql)

  puts "[#{File.basename(__FILE__)}:#{__LINE__}] db.execute => returned #{cursor.size}"
  
  
#  p cursor
#  p cursor.size
  
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] db => executed"

  # close db
  db.close
  
end#delete_Unused_Photos_In_tmp_Folder

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
    
    generate_entries_file
    
    return
    
  elsif ARGV[0] == "d"
    
#    generate_entries_file
    
    delete_unused_photos
    
    return
    
  elsif ARGV[0] == "d2"
    
#    generate_entries_file
    
    delete_Unused_Photos_In_tmp_Folder
    
    return
    
  else
    
    puts "[#{File.basename(__FILE__)}:#{__LINE__}] unknown option => #{ARGV[0]}"
    
    return
  
  end
#  update_single_record
  
#  test_sqlite_2
#  test_sqlite
  
  
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] done!"
  
  
end#exec

exec
