<?php

require_once 'cons.php';
	
class Libfx {
	
	/********************
	* get_ListOf_BarDatas
	* 
	* @return
	* 		-1		fopen ==> returned false
	* 
	********************/
	public static function get_ListOf_BarDatas() {
		//_20200105_125406:caller
		//_20200105_125411:head
		//_20200105_125417:wl
		/********************
		* step : 1
		* 	open : file
		********************/
		/********************
		* step : 1.1
		* 	open
		********************/
		//C:\WORKS_2\WS\WS_Others.prog\prog\D-7\2_2\VIRTUAL\Admin_Projects\curr\data\csv_raw
		$dpath_File_CSV = "C:\\WORKS_2\\WS\\WS_Others.prog\\prog\\D-7\\2_2\\VIRTUAL\\Admin_Projects\\curr\\data\\csv_raw";
		
		$fname_File_CSV = "44_5.1_10_rawdata.(AUDJPY).(Period-M15).(NumOfUnits-18000).(Bars-ALL-20190424_184417).20190311_081029.[SLICE-30].csv";
		
		$fpath_File_CSV = $path_LogFile = join(
				DS,
				array($dpath_File_CSV, $fname_File_CSV));

		// open
		$modeOf_Open_File = "r";
		
		$fin__File_CSV = fopen($fpath_File_CSV, $modeOf_Open_File);
// 		$fin__File_CSV = fopen($fpath_File_CSV, "a");
	
// 		debug("\$fin__File_CSV => " . $fin__File_CSV);

		/********************
		 * step : 1.2
		 * 	validate
		 ********************/
		if ($fin__File_CSV == false) {
		
			debug("\$fin__File_CSV ==> returned false");
			
			return -1;
					
		} else {//if ($fin__File_CSV == false)
			
			debug("file opened => $fpath_File_CSV");
			
		}//if ($fin__File_CSV == false)
			
		/********************
		 * step : 2
		 * 	read --> lines
		 ********************/
		/********************
		 * step : 2.1
		 * 	prep
		 ********************/
		//ref https://www.tutorialspoint.com/php/php_function_fgetcsv.htm
		$maxOf_CSV_Line_Length = 500;
		
		$charOf_CSV_Delimiter = ";";
		
		$row = 1;
		
		$lo_CSV_Lines = [];
		
		/********************
		 * step : 2.2
		 * 	read
		 ********************/
// 		while (($data = fgetcsv($fin__File_CSV, 10000, ",")) !== FALSE) {
		while (($data = fgetcsv($fin__File_CSV, $maxOf_CSV_Line_Length, $charOf_CSV_Delimiter)) !== FALSE) {
			
			$num = count($data);
			
// 			debug("<p> $num fields in line $row: <br /></p>\n");
// 			echo "<p> $num fields in line $row: <br /></p>\n";
		
			$row++;
			
			/********************
			 * step : 2.2 : 1
			 * 	append
			 ********************/
			array_push($lo_CSV_Lines, $data);
			
			
// 			for ($c=0; $c < $num; $c++) {
				
// 				debug($data[$c] . "<br />\n");
// // 				echo $data[$c] . "<br />\n";
				
// 			}
		}
		
		/********************
		 * step : 3
		 * 	file ==> close
		 ********************/
		fclose($fin__File_CSV);
		
		debug("file ==> closed");
		debug("\$row => $row");
		debug("count(\$lo_CSV_Lines) => " . count($lo_CSV_Lines));
		
		$lenOf_LO_CSV_Lines = count($lo_CSV_Lines);
		
		debug("\$lo_CSV_Lines[0] =>");
		debug($lo_CSV_Lines[0]);
		
		debug("\$lo_CSV_Lines[\$lenOf_LO_CSV_Lines - 1] =>");
		debug($lo_CSV_Lines[$lenOf_LO_CSV_Lines - 1]);

		/********************
		 * step : 4
		 * 	conv ==> CSV lines to --> bardatas
		 ********************/
		//_20200105_153133:next
		
		// return
		return null;
		
	}//public static function get_ListOf_BarDatas() {
	
}//class Libfx
	