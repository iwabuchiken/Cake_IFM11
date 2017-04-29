require 'exifr'

def execute
  
  fpath = 'C:/WORKS_2/Storage/images/iphone/tmp/2017-04-27_19-21-12_000.jpg'
  
  @exif = EXIFR::JPEG.new(fpath)
#  @exif = EXIFR::JPEG.new('/path/to/file.jpg')
  
  puts "[#{File.basename(__FILE__)}:#{__LINE__}] date_time_original => " + @exif.date_time_original.to_s
#  puts "[#{File.basename(__FILE__)}:#{__LINE__}] date_time_original => " + @exif.date_time_original
  
  
  print "done"
  
end#execute

execute
