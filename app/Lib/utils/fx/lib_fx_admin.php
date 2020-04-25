<?php

require_once 'C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/cons.php';
// require_once '../utils/cons.php';
// require_once 'utils/cons.php';
// require_once 'cons.php';
	
//_20200425_162406:tmp
class LibFxAdmin {
// class Libfxadmin {

	/********************
	 * get_Bar_Type
	 * 	at : 2020/01/09 17:56:19
	 *
	 * @return : [$strOf_Bar_Type]
	 *
	 ********************/
	// 	public static function get_Bar_Type__BUY($pos, $bd) {
	public static function slice_Raw_Data_By_Week(
			
			$_dpath_Raw_File_Src
			, $_fname_Raw_File_Src
			, $_dpath_Sliced_Files
			
			) {
		//_20200425_162555:caller
		//_20200425_162559:head
		//_20200425_162601:wl
		/********************
		 * step : 0 : 1
		 * 		prep : vars
		 ********************/
		//_20200425_164407:tmp
		debug("\$_dpath_Raw_File_Src : " . $_dpath_Raw_File_Src);

		/********************
		 * step : 1
		 * 		load file
		 ********************/
		/********************
		 * step : 1 : 1
		 * 		validate : file exists
		 ********************/
		// file path
		$fpath = join("\\", array($_dpath_Raw_File_Src, $_fname_Raw_File_Src));
		
		debug($fpath);
		
		// validate
		$result_b = file_exists($fpath);
		
		debug("\$fpath => " . $fpath);
		
		debug(($result_b == true) ? "exists" : "NOT exist");

		/********************
		 * step : 2
		 * 		get : file lines
		 ********************/
		/********************
		 * step : 2 : 1
		 * 		lines : all
		 ********************/
		//ref https://www.php.net/manual/en/function.file.php
		$linesOf_File_Content = file($fpath);
		
		debug("count(\$linesOf_File_Content) : " . count($linesOf_File_Content));
		
		debug("\$linesOf_File_Content[0] : " . $linesOf_File_Content[0]);
		
		/********************
		 * step : 2 : 2
		 * 		lines : bar data
		 ********************/
		$numOf_Header_Lines = 2;
		
		$linesOf_File_Content__BarData = array_slice($linesOf_File_Content, 2);
		
		debug("count(\$linesOf_File_Content__BarData) : " . count($linesOf_File_Content__BarData));
		
		debug("\$linesOf_File_Content__BarData[0] : " . $linesOf_File_Content__BarData[0]);
		
		$charOf_Delimiter = ";";
		
		debug(explode($charOf_Delimiter, $linesOf_File_Content__BarData[0]));
		
// 		$linesOf_File_Content__BarData = array_slice($numOf_Header_Lines);
		
// 		debug(array_slice($linesOf_File_Content__BarData, 2, 2));

		/********************
		 * step : 3
		 * 		get : day of the week
		 ********************/
		$counter = 0;
		$maxOf_Count = 600;
// 		$maxOf_Count = 30;
		
		//_20200425_173501:next
		foreach ($linesOf_File_Content__BarData as $line) {
		
			/********************
			 * step : 3 : 10
			 * 		limiter
			 ********************/
			if ($counter > $maxOf_Count) {
				
				debug("counter ==> more than max ( \$counter = $counter / \$maxOf_Count = $maxOf_Count");
				
				break;
				
			}//if ($counter > $maxOf_Count)
			;
			
			// count
			$counter += 1;
			
			/********************
			 * step : 3 : 1
			 * 		prep : tokens
			 ********************/
			//_20200425_170430:tmp
// 			$line = $linesOf_File_Content__BarData[0];
			
			$tokens = explode($charOf_Delimiter, $line);
			
			$lenOf_Tokens = count($tokens);
			
			$strOf_Date_Time = $tokens[$lenOf_Tokens - 2];
			
			debug("\$strOf_Date_Time : " . $strOf_Date_Time);
			
			$tokensOf_Date_Time = explode(" ", $strOf_Date_Time);
			
			debug($tokensOf_Date_Time);
				// 		array(
				// 				(int) 0 => '2020.02.27',
				// 				(int) 1 => '06:10'
				// 		)
				
			$strOf_Date__Formatted = str_replace(".", "-", $tokensOf_Date_Time[0]);
			
			debug("\$strOf_Date__Formatted : " . $strOf_Date__Formatted);
			
			/********************
			 * step : 3 : 2
			 * 		conv : to date
			 ********************/
			//ref https://stackoverflow.com/questions/12835133/how-to-find-the-date-of-a-day-of-the-week-from-a-date-using-php
			// "$date" ==> '2012-10-11'
			$strOf_Day_Of_The_Week = date('w', strtotime($strOf_Date__Formatted));
// 			$strOf_Day_Of_The_Week = date('w', strtotime($tokensOf_Date_Time[0]));
	// 		$strOf_Day_Of_The_Week = date('w', strtotime($date));
	// // 		$strOf_Day_Of_The_Week = date($tokensOf_Date_Time);
			
			debug("\$strOf_Day_Of_The_Week : " . $strOf_Day_Of_The_Week);			
		}//foreach ($linesOf_File_Content__BarData as $line)
		
		
// 		/********************
// 		 * step : 3 : 1
// 		 * 		prep : tokens
// 		 ********************/
// 		//_20200425_170430:tmp
// 		$line = $linesOf_File_Content__BarData[0];
		
// 		$tokens = explode($charOf_Delimiter, $line);
		
// 		$lenOf_Tokens = count($tokens);
		
// 		$strOf_Date_Time = $tokens[$lenOf_Tokens - 2];
		
// 		debug("\$strOf_Date_Time : " . $strOf_Date_Time);
		
// 		$tokensOf_Date_Time = explode(" ", $strOf_Date_Time);
		
// 		debug($tokensOf_Date_Time);
// 			// 		array(
// 			// 				(int) 0 => '2020.02.27',
// 			// 				(int) 1 => '06:10'
// 			// 		)
// 		/********************
// 		 * step : 3 : 2
// 		 * 		conv : to date
// 		 ********************/
// 		//ref https://stackoverflow.com/questions/12835133/how-to-find-the-date-of-a-day-of-the-week-from-a-date-using-php
// 		// "$date" ==> '2012-10-11'
// 		$strOf_Day_Of_The_Week = date('w', strtotime($tokensOf_Date_Time[0]));
// // 		$strOf_Day_Of_The_Week = date('w', strtotime($date));
// // // 		$strOf_Day_Of_The_Week = date($tokensOf_Date_Time);
		
// 		debug("\$strOf_Day_Of_The_Week : " . $strOf_Day_Of_The_Week);
		
// 		debug("\$tokens =>");
// 		debug($tokens);
// 		debug(count($tokens));
// 		debug($tokens[15]);
// 		debug($tokens[count($tokens) - 1]);
// 		debug($tokens[count($tokens)]);	//=> not working
// 		debug($tokens[-1]);	//=> "Error: Allowed memory size of"
		
// 		$token_DateTime = $tokens[-2];
		
// 		debug("\$token_DateTime : " . $token_DateTime);
		
		
		/********************
		 * step : X
		 * 		return
		 ********************/
		/********************
		 * step : X : 1
		 * 		set : val
		 ********************/
		$valOf_Ret = -1;
		
		/********************
		 * step : X : 2
		 * 		return
		 ********************/
		return $valOf_Ret;
		
	}//public static function slice_Raw_Data_By_Week() {
	
}//class Libfx
	