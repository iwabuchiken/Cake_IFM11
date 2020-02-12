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
	public static function conv_CSV_Lines_To_BarDatas($lo_CSV_Lines, $lenOf_Header_Lines) {
		//_20200105_171832:caller
		//_20200105_171836:head
		//_20200105_171839:wl
		/********************
		* step : 0
		* 	prep : vars
		********************/
		$lenOf_LO_CSV_Lines = count($lo_CSV_Lines);
		
		// list
		$lo_BarDatas = [];
		
		/********************
		* step : 0 : 2
		* 	for-loop
		********************/
// 		for ($i = 0; $i < $lenOf_LO_CSV_Lines; $i++) {
		for ($i = 0 + $lenOf_Header_Lines; $i < $lenOf_LO_CSV_Lines; $i++) {
			/********************
			* step : 1
			* 	get ==> line
			********************/
			$line = $lo_CSV_Lines[$i];
// 			$line = $lenOf_LO_CSV_Lines[$i];
			
			$lenOf_Line = count($line);
			
// 			debug("\$line =>");
// 			debug($line);
			
			/********************
			* step : 2
			* 	gen ==> instance of bardata
			* 	no;Open;High;Low;Close;RSI;MFI;BB.2s;BB.1s;BB.main;BB.-1s;BB.-2s;Diff;High/Low;datetime
			* 	public $price_Open = -1.0;	// 1
				public $price_High = -1.0;
				public $price_Low = -1.0;
				public $price_Close = -1.0;
				
				public $rsi      = -1.0;	// 5
				public $mfi      = -1.0;
				
				public $bb_2S       = -1.0;
				public $bb_1S       = -1.0;
				public $bb_Main     = -1.0;
				public $bb_M1S       = -1.0;	// 10
				public $bb_M2S       = -1.0;	// 11
				
				public $diff_OC       = -1.0;	// 12
				public $diff_HL       = -1.0;	// 13
			
				public $dateTime        = "";	// 14
				public $dateTime_Local  = "";	// 15
			********************/
			$bd = new BarData;
			
			$bd->no = $line[0];
			$bd->price_Open = $line[1];
			$bd->price_High = $line[2];
			$bd->price_Low = $line[3];
			$bd->price_Close = $line[4];
			
			$bd->rsi = $line[5];
			$bd->mfi = $line[6];
			
			$bd->bb_2S = $line[7];
			$bd->bb_1S = $line[8];
			$bd->bb_Main = $line[9];
			$bd->bb_M1S = $line[10];
			$bd->bb_M2S = $line[11];
			
			$bd->diff_OC = $line[12];
			$bd->diff_HL = $line[13];
			
			$bd->dateTime = $line[14];
			$bd->dateTime_Local = $line[15];
			
			/********************
			* step : 3
			* 	instance of bardata ==> append
			********************/
			array_push($lo_BarDatas, $bd);
			
		}//for ($i = 0; $i < $lenOf_LO_CSV_Lines; $i++)
		
		//debug
		debug("count(\$lo_BarDatas) => " . count($lo_BarDatas));
// 		debug("\$lo_BarDatas[0] =>");
// 		debug($lo_BarDatas[0]);
// 		debug("\$lo_BarDatas[0]->price_Open => " . $lo_BarDatas[0]->price_Open);
		
		/********************
		* step : 4
		* 	return
		********************/
		return $lo_BarDatas;
		
	}//public static function conv_CSV_Lines_To_BarDatas($lo_CSV_Lines, $lenOf_Header_Lines) {
		
	/********************
	* get_ListOf_BarDatas
	* 
	* @return
	* 		-1		fopen ==> returned false
	* 
	********************/
	public static function get_ListOf_BarDatas
	($_dpath_File_CSV, $_fname_File_CSV) {
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
		$dpath_File_CSV = $_dpath_File_CSV;
// 		$dpath_File_CSV = "C:\\WORKS_2\\WS\\WS_Others.prog\\prog\\D-7\\2_2\\VIRTUAL\\Admin_Projects\\curr\\data\\csv_raw";
		
		$fname_File_CSV = $_fname_File_CSV;
// 		$fname_File_CSV = CONS::$fname_FX_Tester_CSV_File;
// 		$fname_File_CSV = "44_5.1_10_rawdata.(AUDJPY).(Period-M15).(NumOfUnits-18000).(Bars-ALL-20190424_184417).20190311_081029.[SLICE-30].csv";
		
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
			
			$msg = "file opened => $fpath_File_CSV";
			
			debug($msg);
			
			Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
				, $msg
				, __FILE__, __LINE__);
			
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
		
		//_20200114_132902:ref
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
// 		debug("\$row => $row");
// 		debug("count(\$lo_CSV_Lines) => " . count($lo_CSV_Lines));
		
		$lenOf_LO_CSV_Lines = count($lo_CSV_Lines);
		
// 		debug("\$lo_CSV_Lines[0] =>");
// 		debug($lo_CSV_Lines[0]);
		
// 		debug("\$lo_CSV_Lines[\$lenOf_LO_CSV_Lines - 1] =>");
// 		debug($lo_CSV_Lines[$lenOf_LO_CSV_Lines - 1]);

		/********************
		 * step : 4
		 * 	conv ==> CSV lines to --> bardatas
		 ********************/
		//_20200105_153133:next
		$lenOf_Header_Lines = 2;
		
		//_20200105_171832:caller
		$lo_BarDatas = Libfx::conv_CSV_Lines_To_BarDatas($lo_CSV_Lines, $lenOf_Header_Lines);
		
// 		//test
// 		$lo_BarDatas = -1;
		
		// return
		return $lo_BarDatas;
// 		return null;
		
	}//public static function get_ListOf_BarDatas() {
	
	/********************
	 * reverse_LO_BarDatas
	 *
	 * @return
	 * 		-1		fopen ==> returned false
	 *
	 ********************/
	public static function reverse_LO_BarDatas($lo_BarDatas, $strOf_Direction) {
		//_20200120_151446:caller
		//_20200120_151450:head
		//_20200120_151453:wl

		/********************
		 * step : 0
		 		prep : log
		 ********************/		
		$msg = "reverse_LO_BarDatas";
		$msg .= "\n";
		
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
				, $msg, __FILE__, __LINE__);
		
		/********************
		 * step : 0 : 2
		 		prep : vars
		 ********************/		
		$lenOf_LO_BarDatas = count($lo_BarDatas);
		
		/********************
		 * step : 1
		 		get : first, last elements
		 ********************/		
		$elem_First = $lo_BarDatas[0];
		$elem_Last = $lo_BarDatas[count($lo_BarDatas) - 1];
		
		$msg = "\$elem_First->dateTime\t" . $elem_First->dateTime;
		$msg .= "\n";
		
		$msg = "\$elem_Last->dateTime\t" . $elem_Last->dateTime;
		$msg .= "\n";
		
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
				, $msg, __FILE__, __LINE__);
		
		/********************
		 * step : 2
		 		judge : current sorting order
		 ********************/
		$strOf_Direction__Current = "";
		
		/********************
		 * step : 2.1
		 		conditions
		 ********************/
		$cond_1 = ($elem_First->dateTime < $elem_Last->dateTime);
		
		/********************
		 * step : 2.2
		 		judge
		 ********************/
		if ($cond_1 == true) {
		
			$msg = "order ==> ascending";
			$msg .= "\n";
			
			Utils::write_Log__Fx_Admin(
					CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
					, $msg, __FILE__, __LINE__);
			
			// set
			$strOf_Direction__Current = CONS::$strOf_Sort_Direction_LO_BarDatas__ASC;
			
		} else {
		
			$msg = "order ==> descending";
			$msg .= "\n";
				
			Utils::write_Log__Fx_Admin(
					CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
					, $msg, __FILE__, __LINE__);
				
			// set
			$strOf_Direction__Current = CONS::$strOf_Sort_Direction_LO_BarDatas__DSC;
				
		}//if ($cond_1 == true)
		
		/********************
		 * step : j1
		 		dispatch
		 ********************/
		/********************
		 * step : j1 : 1
		 		conditions
		 ********************/
		$cond_1 = ($strOf_Direction__Current == CONS::$strOf_Sort_Direction_LO_BarDatas__ASC
					&& $strOf_Direction == CONS::$strOf_Sort_Direction_LO_BarDatas__ASC);
		
		$cond_2 = ($strOf_Direction__Current == CONS::$strOf_Sort_Direction_LO_BarDatas__DSC
					&& $strOf_Direction == CONS::$strOf_Sort_Direction_LO_BarDatas__ASC);
		
		$cond_3 = ($strOf_Direction__Current == CONS::$strOf_Sort_Direction_LO_BarDatas__ASC
					&& $strOf_Direction == CONS::$strOf_Sort_Direction_LO_BarDatas__DSC);
		
		$cond_4 = ($strOf_Direction__Current == CONS::$strOf_Sort_Direction_LO_BarDatas__DSC
					&& $strOf_Direction == CONS::$strOf_Sort_Direction_LO_BarDatas__DSC);
		
		/********************
		 * step : j1 : 2
		 		dispatch ==> exec
		 ********************/
		$lo_BarDatas__Processed = array();
		
		if ($cond_1 == true) {
		
			$msg = "param = ASC / current = ASC";
			$msg .= "\n";
			
			Utils::write_Log__Fx_Admin(
					CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
					, $msg, __FILE__, __LINE__);
			
			// set
			$lo_BarDatas__Processed = $lo_BarDatas;
		
		} else if ($cond_2 == true) {
			
// 			$msg = "current = ASC / param = DSC";
			$msg = "current = DSC / param = ASC";
// 			$msg = "current = DSC / param = ASC (coding...)";
			$msg .= "\n";
				
			Utils::write_Log__Fx_Admin(
					CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
					, $msg, __FILE__, __LINE__);
				
			// build
// 			$lo_BarDatas__Processed = $lo_BarDatas;
			for ($i = $lenOf_LO_BarDatas - 1; $i >= 0; $i --) {
// 			for ($i = $lenOf_LO_BarDatas; $i > 0; $i --) {
// 			for ($i = $lenOf_LO_BarDatas; $i >= 0; $i --) {
			
				// elem
				$item = $lo_BarDatas[$i];
				
				array_push($lo_BarDatas__Processed, $item);
				
			}//for ($i = $lenOf_LO_BarDatas; $i >= 0; $i --) {
			
		} else if ($cond_3 == true) {
			
// 			$msg = "current = ASC / param = DSC (coding...)";
			$msg = "current = ASC / param = DSC";
			$msg .= "\n";
				
			Utils::write_Log__Fx_Admin(
					CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
					, $msg, __FILE__, __LINE__);

			// build
			for ($i = $lenOf_LO_BarDatas - 1; $i >= 0; $i --) {
					
				// elem
				$item = $lo_BarDatas[$i];
			
				array_push($lo_BarDatas__Processed, $item);
			
			}//for ($i = $lenOf_LO_BarDatas; $i >= 0; $i --) {
					
// 			// set
// 			$lo_BarDatas__Processed = $lo_BarDatas;
			
		} else if ($cond_4 == true) {
			
			$msg = "current = DSC / param = DSC";
			$msg .= "\n";
				
			Utils::write_Log__Fx_Admin(
					CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
					, $msg, __FILE__, __LINE__);
				
			// set
			$lo_BarDatas__Processed = $lo_BarDatas;
			
		} else {
		
			$msg = "unknown combination : current = '$strOf_Direction__Current' / param = '$strOf_Direction'";
			$msg .= "\n";
			$msg .= "==> default : no processing";
			$msg .= "\n";
			
			Utils::write_Log__Fx_Admin(
					CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
					, $msg, __FILE__, __LINE__);
			
			// set
			$lo_BarDatas__Processed = $lo_BarDatas;
			
		}//if ($cond_1 == true)
		
		/********************
		 * step : X
		 * 		return
		 ********************/
		/********************
		 * step : X : 1
		 * 		set val
		 ********************/
		$valOf_Ret = $lo_BarDatas__Processed;
		
		/********************
		 * step : X : 2
		 * 		return
		 ********************/
		return $valOf_Ret;
		
	}//reverse_LO_BarDatas($lo_BarDatas, $strOf_Direction)
	
}//class Libfx
	