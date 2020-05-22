<?php

require_once 'C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/cons.php';
// require_once '../utils/cons.php';
// require_once 'utils/cons.php';
// require_once 'cons.php';
	
//_20200425_162406:tmp
class LibFxAdmin {
// class Libfxadmin {

	/********************
	 * slice_Raw_Data_By_Week
	 * 	at : 2020/04/25 13:08:07
	 *
	 * @return : 
	 *
	 ********************/
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

		/********************
		 * step : 2.1
		 * 		sort bar data
		 ********************/
		/********************
		 * step : 2.1 : 1
		 * 		check : current sort order
		 ********************/
		/********************
		 * step : 2.1 : 1.1
		 * 		get : tokens
		 ********************/
		//_20200504_164530:tmp
		$lenOf_LinesOf_File_Content__BarData = count($linesOf_File_Content__BarData);
		
		// tokenizer char
		$charOf_Tokenizer = ";";
		
		// first line
		$line_First = $linesOf_File_Content__BarData[0];
		
		$tokensOf_Line_First = explode($charOf_Tokenizer, $line_First);
		
// 		debug("\$tokensOf_Line_First =>");
// 		debug($tokensOf_Line_First);
		
		// last line
		$line_Last = $linesOf_File_Content__BarData[$lenOf_LinesOf_File_Content__BarData - 1];
		
		$tokensOf_Line_Last = explode($charOf_Tokenizer, $line_Last);

// 		debug("\$tokensOf_Line_Last =>");
// 		debug($tokensOf_Line_Last);
		
		//_20200504_164929:tmp:upto

		/********************
		 * step : 2.1 : 2
		 * 		compare : dates
		 ********************/
		$numOf_Index__Compare_Dates_Of_BarData = 14;
		
		$cond_tmp = ($tokensOf_Line_First[$numOf_Index__Compare_Dates_Of_BarData]
				
					<= $tokensOf_Line_Last[$numOf_Index__Compare_Dates_Of_BarData]
				);
		
		debug("bardata lines : sort ==> " . (($cond_tmp) ? "A-Z" : "Z-A"));
		debug("first bardata : " . $tokensOf_Line_First[$numOf_Index__Compare_Dates_Of_BarData]);
		debug("last bardata : " . $tokensOf_Line_Last[$numOf_Index__Compare_Dates_Of_BarData]);
		
		/********************
		 * step : 2.1 : 3
		 * 		sort
		 ********************/
		if ($cond_tmp == false) {
		
			$linesOf_File_Content__BarData = array_reverse($linesOf_File_Content__BarData);
			
			debug("\$linesOf_File_Content__BarData ==> reversed");
			
			$line_First = $linesOf_File_Content__BarData[0];
			
			$tokensOf_Line_First = explode($charOf_Tokenizer, $line_First);
			
			// 		debug("\$tokensOf_Line_First =>");
			// 		debug($tokensOf_Line_First);
			
			// last line
			$line_Last = $linesOf_File_Content__BarData[$lenOf_LinesOf_File_Content__BarData - 1];
			
			$tokensOf_Line_Last = explode($charOf_Tokenizer, $line_Last);
			
			$numOf_Index__Compare_Dates_Of_BarData = 14;
			
			$cond_tmp = ($tokensOf_Line_First[$numOf_Index__Compare_Dates_Of_BarData]
			
					<= $tokensOf_Line_Last[$numOf_Index__Compare_Dates_Of_BarData]
			);
			
			debug("bardata lines : sort ==> " . (($cond_tmp) ? "A-Z" : "Z-A"));
			debug("first bardata : " . $tokensOf_Line_First[$numOf_Index__Compare_Dates_Of_BarData]);
			debug("last bardata : " . $tokensOf_Line_Last[$numOf_Index__Compare_Dates_Of_BarData]);
			
			
		}//if ($cond_tmp == false)
		;
		
		//_20200504_170016:upto
		//_20200504_170156:next
		//debug
		return -1;
		
		/********************
		 * step : 3
		 * 		get : day of the week
		 ********************/
		$counter = 0;
		$maxOf_Count = 2200;	//=> 7.638888888888889 days (M5)
// 		$maxOf_Count = 600;
// 		$maxOf_Count = 30;
		
		// flag : a new week started
		$flg_New_Week = false;
		
		// list
		$lo_Tmp_Lines = array();	// L2
		
		$lo_Weeks = array();		// L3
		
		debug("\$linesOf_File_Content__BarData[0] : " . $linesOf_File_Content__BarData[0]);
		debug("\$linesOf_File_Content__BarData[last] : " 
				. $linesOf_File_Content__BarData[count($linesOf_File_Content__BarData) - 1]);
		
		//_20200425_173501:next
		foreach ($linesOf_File_Content__BarData as $line) {
		
			/********************
			 * step : 3 : 0
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
			
// 			debug("(step : 3 : 1) \$tokens[0]" . $tokens[0]
// 					. "\$tokens[\$lenOf_Tokens - 2] : " 
// 					. $tokens[$lenOf_Tokens - 2]
// 					);
			
			
// 			debug("\$strOf_Date_Time : " . $strOf_Date_Time);
			
			$tokensOf_Date_Time = explode(" ", $strOf_Date_Time);
			
// 			debug($tokensOf_Date_Time);
// 				// 		array(
// 				// 				(int) 0 => '2020.02.27',
// 				// 				(int) 1 => '06:10'
// 				// 		)
				
			$strOf_Date__Formatted = str_replace(".", "-", $tokensOf_Date_Time[0]);
						// '2020-02-27'
			
// 			debug("\$strOf_Date__Formatted : " . $strOf_Date__Formatted);
			
			/********************
			 * step : 3 : 2
			 * 		conv : to date
			 ********************/
			//ref https://stackoverflow.com/questions/12835133/how-to-find-the-date-of-a-day-of-the-week-from-a-date-using-php
			// "$date" ==> '2012-10-11'
			$strOf_Day_Of_The_Week = date('w', strtotime($strOf_Date__Formatted));
			
// 			debug("\$strOf_Day_Of_The_Week : " . $strOf_Day_Of_The_Week);
			
			/********************
			 * step : 3 : 3
			 * 		judge : different week ?
			 ********************/
			/********************
			 * step : 3 : 3.0
			 * 		conditions
			 ********************/
// 			$cond_1 = ($strOf_Day_Of_The_Week == 4);
			$cond_1 = ($strOf_Day_Of_The_Week == 1);
			$cond_2 = ($flg_New_Week == false);
			
			$condFor_J1 = ($cond_1 == true && $cond_2 == true);
			
			//
			$cond_3 = ($strOf_Day_Of_The_Week == 2);
			$cond_4 = ($flg_New_Week == true);
			
			$condFor_J2 = ($cond_3 == true && $cond_4 == true);
						
			/********************
			 * step : 3 : 3 : j1
			 * 		day ==> monday; flag ==> false ?
			 ********************/
			if ($condFor_J1 == true) {
				/********************
				 * step : 3 : 3 : j1 : Y
				 * 		day ==> monday; flag ==> false
				 ********************/
				/********************
				 * step : 3 : 3 : j1 : Y : 1
				 * 		log
				 ********************/
				debug("(step : 3 : 3 : j1 : Y)");
				debug("\$strOf_Day_Of_The_Week : " 
						. $strOf_Day_Of_The_Week 
						. " / " 
						. (($flg_New_Week == true) ? 
								"\$flg_New_Week => true" : "\$flg_New_Week => false"));
				
				/********************
				 * step : 3 : 3 : j1 : Y : 2
				 * 		flag ==> to true
				 ********************/
				$flg_New_Week = true;
				
				/********************
				 * step : 3 : 3 : j1 : Y : 3
				 * 		append : 
				 ********************/
				// append
				array_push($lo_Weeks, $lo_Tmp_Lines);
				
				// reset
				$lo_Tmp_Lines = array();

				debug("(step : 3 : 3 : j1 : Y : 3) \$lo_Tmp_Lines ==> reseted");
				
				$tokens_tmp = explode(";", $line);
				
				debug("\$tokens_tmp[0] : " . $tokens_tmp[0] 
						. " / "
						. "\$tokens_tmp[14] : " . $tokens_tmp[14]);
				
				/********************
				 * step : 3 : 3 : j1 : Y : 4
				 * 		append : this line to L2
				 ********************/
				array_push($lo_Tmp_Lines, $line);
			
			} else if ($condFor_J2 == true) {
				/********************
				 * step : 3 : 3 : j2 : Y
				 * 		(day ==> tuesday; flag ==> true)
				 ********************/
				/********************
				 * step : 3 : 3 : j2 : Y : 1
				 * 		log
				 ********************/
				debug("(step : 3 : 3 : j2 : Y : 1)");
				
				/********************
				 * step : 3 : 3 : j2 : Y : 2
				 * 		flag ==> false
				 ********************/
				$flg_New_Week = false;
				
				/********************
				 * step : 3 : 3 : j2 : Y : 3
				 * 		append : this line to L2
				 ********************/
				array_push($lo_Tmp_Lines, $line);
				
			} else {
				/********************
				 * step : 3 : 3 : (j1 : N)+(j2 : N) : N
				 * 		
				 ********************/
				/********************
				 * step : 3 : 3 : (j1 : N)+(j2 : N) : N : 1
				 * 		log
				 ********************/
				debug("(step : 3 : 3 : (j1 : N)+(j2 : N) : N)");
				
				/********************
				 * step : 3 : 3 : (j1 : N)+(j2 : N) : N : 2
				 * 		append : this line to L2
				 ********************/
				array_push($lo_Tmp_Lines, $line);
				
			}//if ($condFor_J1 == true)
			
			
					
					
			
			
		}//foreach ($linesOf_File_Content__BarData as $line)
		
		/********************
		 * step : 3 : 4
		 * 		append : last lines
		 ********************/
		array_push($lo_Weeks, $lo_Tmp_Lines);
		
		//debug
		debug("count(\$lo_Weeks) : " . count($lo_Weeks));
		
		foreach ($lo_Weeks as $week) {
			
			// target
			$lineOf_Target = $week[0];
			
			$tokens = explode(";", $lineOf_Target);
			
			debug("\$lineOf_Target : " . $lineOf_Target);
			debug($tokens[0] . " / " . $tokens[14]);
			debug("count(\$week) : " . count($week));
			
// 			debug(array_slice($week, 0, 3));;
			
		}//foreach ($lo_Weeks as $week)
		
		
// 		debug(array_slice($lo_Weeks[0], 0, 3));
		
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
	
	/********************
	 * slice_Raw_Data_By_Day
	 * 	at : 2020/04/26 13:08:46
	 *
	 * @return : 
	 *
	 ********************/
	public static function slice_Raw_Data_By_Day(
			
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

	/********************
	 * slice_Raw_Data_By_Day__V2
	 * 
	 * 	at : 2020/04/26 13:08:46
	 *
	 * @return : 
	 *
	 ********************/
	public static function slice_Raw_Data_By_Day__V2(
			
			$_dpath_Raw_File_Src
			, $_fname_Raw_File_Src
			, $_dpath_Sliced_Files
			
			) {
		//_20200522_165547:caller
		//_20200522_165549:head
		//_20200522_165552:wl
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
		//ref https://www.php.net/manual/en/function.file.php
		$linesOf_File_Content = file($fpath);
		
		debug("count(\$linesOf_File_Content) : " . count($linesOf_File_Content));
		
		debug("\$linesOf_File_Content[0] : " . $linesOf_File_Content[0]);
		
		/********************
		 * step : Z
		 * 		TEST
		 ********************/
		//test : conv to list of bardatas : 20200522_170150
		$lenOf_Header_Lines = 2;
		
		//array($lo_BarDatas, array_slice($lo_CSV_Lines, 0, $lenOf_Header_Lines))
		$valOf_Ret__Received = Libfx::conv_CSV_Lines_To_BarDatas__V2(
										$linesOf_File_Content, $lenOf_Header_Lines);
		
		$lo_BarDatas		= $valOf_Ret__Received[0];
		$lo_HeaderLines		= $valOf_Ret__Received[1];
		
		//_20200522_170915:tmp
		debug("\$lo_HeaderLines =>");
		debug($lo_HeaderLines);
		
		//_20200522_171234:next
		debug("\$lo_BarDatas[0] =>");
		debug($lo_BarDatas[0]);
		

		/********************
		 * step : 3
		 * 		get : day of the week
		 ********************/
		
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
		
	}//slice_Raw_Data_By_Day__V2

	/********************
	 * get_LO_Tickets_From_Tickets_Data_File
	 * 
	 * 	at : 2020/05/06 12:30:57
	 *
	 * @return :
	 *		array(
				(int) 0 => array(
					(int) 0 => '24877371',
					(int) 1 => '2020.05.05 08:10:00',
					(int) 2 => '68.688',
					(int) 3 => '68.663',
					(int) 4 => '68.702',
					...
					(int) 30 => '3',
					(int) 31 => '3'
		
	 ********************/
	public static function get_LO_Tickets_From_Tickets_Data_File(
				
			$_dpath_File_Tickets_Data
			, $_fname_File_Tickets_Data

	) {
		//_20200506_113043:caller
		//_20200506_113049:head
		//_20200506_113052:wl
		/********************
		 * step : 1 : 1
		 * 		prep : vars
		 ********************/
		
		/********************
		 * step : 2
		 * 		file : load lines
		 ********************/
		/********************
		 * step : 2 : 1
		 * 		path
		 ********************/
		$fpath = join(DS, array($_dpath_File_Tickets_Data, $_fname_File_Tickets_Data));
		
		/********************
		 * step : 2 : 2
		 * 		file exists
		 ********************/
		$result_b = file_exists($fpath);
		
		// open file
		if ($result_b == false) {
			
			debug("file ==> NOT exist : $fpath");
			
			return false;
			
		} else {//if ($result_b == false) {
			
			debug("file ==> exists : $fpath");
				
			
		}//if ($result_b == false) {
		
// 		//debug
// 		debug("\$fpath : " . $fpath);
		
		/********************
		 * step : 2 : 3
		 * 		load : lines
		 ********************/
		$linesOf_File_Content = file($fpath);
		
		/********************
		 * step : 3
		 * 		lines == filter
		********************/
		/********************
		 * step : 3 : 1
		 * 		for-loop
		********************/
		$lo_LineOf_Ticket_Data = array();
		
		$strOf_Patterns = '/^\[.+\]\t\d+\t/';
		
		foreach ($linesOf_File_Content as $line) {
			/********************
			 * step : 3 : 1
			 * 		for-loop
			 ********************/
			$res_i = preg_match($strOf_Patterns, $line, $matches);
			
			if ($res_i >= 1) {
			
// 				debug("match : $line");
				
				// append
				array_push($lo_LineOf_Ticket_Data, $line);
				
			}//if (Utils::startsWith($line, $needle))
			;
			
			
		}//foreach ($linesOf_File_Content as $line) {
		
		debug("count(\$lo_LineOf_Ticket_Data) : " . count($lo_LineOf_Ticket_Data));
		
// 		debug($lo_LineOf_Ticket_Data);

		/********************
		 * step : 4
		 * 		build : list of tickets
		 ********************/
		$lo_Ticket_Data = array();
		
		foreach ($lo_LineOf_Ticket_Data as $line) {
		
			$tokens = explode("\t", $line);
			
			array_push($lo_Ticket_Data, array_slice($tokens, 1, count($tokens) - 2));
// 			array_push($lo_Ticket_Data, array_slice($tokens, 1, count($tokens) - 1));
			
		}//foreach ($lo_LineOf_Ticket_Data as $line)
		
// 		debug(array_slice($lo_Ticket_Data, 0, 5));
		
		/********************
		 * step : 5
		 * 		return
		 ********************/
		// set val
		$valOf_Ret = $lo_Ticket_Data;
		
		// return
		return $valOf_Ret;
		
	}//public static function get_LO_Tickets_From_Tickets_Data_File

	/********************
	 * get_Meta_Info_From_Tickets_Data_File
	 *
	 * 	at : 2020/05/07 16:58:26
	 *
	 * @return :
	 *		array(
	 (int) 0 => array(
	 (int) 0 => '24877371',
	 (int) 1 => '2020.05.05 08:10:00',
	 (int) 2 => '68.688',
	 (int) 3 => '68.663',
	 (int) 4 => '68.702',
	 ...
	 (int) 30 => '3',
	 (int) 31 => '3'
	
	 ********************/
	public static function get_Meta_Info_From_Tickets_Data_File(
	
			$_dpath_File_Tickets_Data
			, $_fname_File_Tickets_Data
	
	) {
		//_20200506_113043:caller
		//_20200506_113049:head
		//_20200506_113052:wl
		/********************
		 * step : 1 : 1
		 * 		prep : vars
		 ********************/
	
		/********************
		 * step : 2
		 * 		file : load lines
		 ********************/
		/********************
		 * step : 2 : 1
		 * 		path
		 ********************/
		$fpath = join(DS, array($_dpath_File_Tickets_Data, $_fname_File_Tickets_Data));
	
		/********************
		 * step : 2 : 2
		 * 		file exists
		********************/
		$result_b = file_exists($fpath);
	
		// open file
		if ($result_b == false) {
				
			debug("file ==> NOT exist : $fpath");
				
			return false;
				
		} else { debug("file ==> exists : $fpath"); }//if ($result_b == false) {
	
		
		/********************
		 * step : 2 : 3
		 * 		load : lines
		 ********************/
		$linesOf_File_Content = file($fpath);
	
		/********************
		 * step : 3
		 * 		lines == filter
		********************/
		$lo_Lines_Meta_Info = array();
		
		foreach ($linesOf_File_Content as $line) {
		
			// modify string
			$line = preg_replace('/\n/', '', $line);
			$line = preg_replace('/\r/', '', $line);
// 			$line = preg_replace('/\r\n/', '', $line);
// 			$line = preg_replace('/\s/', '', $line);
			
			// condition
// 			$cond_1 = (Utils::startsWith($line, "[") == false) && (count_chars($line, 1) > 0);
// 			$cond_1 = (Utils::startsWith($line, "[") == false) && (count($line) > 0);
// 			$cond_1 = (Utils::startsWith($line, "[") == false) && (empty($line) == false);
			$cond_1 = (Utils::startsWith($line, "[") == false) && ($line != '');
// 			$cond_1 = (Utils::startsWith($line, "[") == false) && ($line != null);
// 			$cond_1 = (Utils::startsWith($line, "[") == false) && ($line != "");
// 			$cond_1 = (Utils::startsWith($line, "[") == false);
			
			// judge
			if ($cond_1 == true) {
				
// 				debug("strlen(\$line) : " . strlen($line) . "('$line')");
				
// 				debug("(count_chars(\$line, 1) => ");
// 				debug(count_chars($line, 1));
// 				debug("(count_chars(\$line, 1) => " . (count_chars($line, 1)) . "('$line')");
// 				debug("count(\$line) => " . count($line) . "('$line')");
				
				array_push($lo_Lines_Meta_Info, $line);
				
			}//if ($cond_1 == true)
			
		}//foreach ($linesOf_File_Content as $line)
		
		/********************
		 * step : 5
		 * 		return
		 ********************/
		// set val
		$valOf_Ret = $lo_Lines_Meta_Info;
	
		// return
		return $valOf_Ret;
	
	}//get_Meta_Info_From_Tickets_Data_File
	
	/********************
	 * get_LO_Tickets_From_Tickets_Report_File
	 *
	 * 	at : 2020/05/06 12:34:27
	 *
	 * @return :
	
	 ********************/
	public static function get_LO_Tickets_From_Tickets_Report_File(
	
			$_dpath_File_Report
			, $_fname_File_Report
	
	) {
		//_20200506_123454:caller
		//_20200506_123459:head
		//_20200506_123502:wl
		/********************
		 * step : 1 : 1
		 * 		prep : vars
		 ********************/
	
	}//public static function get_LO_Tickets_From_Tickets_Report_File(

	/********************
	 * tasks_26_Gen_Combined_Trade_Result_List
	 *
	 * 	at : 2020/05/19 19:02:57
	 *
	 * @return :
	
	 ********************/
	public static function tasks_26_Gen_Combined_Trade_Result_List(
	
			$_dpath_File_Report
			, $_fname_File_Report
	
	) {
		//_20200519_190242:caller
		//_20200519_190247:head
		//_20200519_190250:wl
		/********************
		 * step : 1 : 1
		 * 		prep : vars
		 ********************/
		
	}//tasks_26_Gen_Combined_Trade_Result_List
	
}//class Libfx
	