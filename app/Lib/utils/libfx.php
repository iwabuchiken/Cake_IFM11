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
		
// 		$fpath_File_CSV = $path_LogFile = join(
		$fpath_File_CSV = join(
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
// 				$_dpath_File_CSV, $_fname_File_CSV
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

	/********************
	 * reverse_LO_BarDatas
	 *
	 * @return
	 * 		-1		fopen ==> returned false
	 *
	 ********************/
	public static function get_ListOf_Orders_From_Statement($fpath_Statement_File) {
		//_20200406_095119:caller
		//_20200406_095122:head
		//_20200406_095125:wl

		/********************
		* step : 0
		* 		vars
		********************/
		$lo_TRs_Of_Orders = array();
		
		
		// read content
		//ref https://www.php.net/manual/en/function.file-get-contents.php
		$linesOf_Statememt_File = file_get_contents($fpath_Statement_File);
		
		// 		debug("count(\$linesOf_Statememt_File) : " . count($linesOf_Statememt_File));
		//ref https://www.php.net/manual/en/function.substr.php
		// 		debug("substr(\$linesOf_Statememt_File, 0, 10) : '" . substr($linesOf_Statememt_File, 0, 10) . "'");
		
		// 		$fin__Statement_File = fopen($fpath_Statement_File, $modeOf_Open_File);
		
		// 		debug("file opened => " . $fpath_Statement_File);
		// 		debug("(status = " . $fin__Statement_File . ")");
		
		
		
		/********************
		 * step : 3
		 * 	html : parse
		 ********************/
		/********************
		 * step : 3.1
		 * 	get : html
		 ********************/
		$doc = new DOMDocument();
		
		$doc->loadHTML($linesOf_Statememt_File);
		
		$TRs = $doc->getElementsByTagName('tr');
		
		$cntOf_TRs = 0;
		
		foreach ($TRs as $tr) {
		
			$cntOf_TRs += 1;
				
		}//foreach ($TRs as $tr)
		
		debug("\$cntOf_TRs : " . $cntOf_TRs);
		
		$maxOf_ForEach__TRs = $cntOf_TRs;
			// 		$maxOf_ForEach__TRs = 10;
		
		// get : subnode --> "td"
		for ($i = 0; $i < $cntOf_TRs; $i++) {
		
			// stopper
			if ($i > $maxOf_ForEach__TRs) break;
				
			// get tag : TR
			//ref https://stackoverflow.com/questions/3627489/php-parse-html-code
			$tr = $TRs->item($i);
			// 			$tr = $TRs->childNodes[0];
				
			// 			debug("(\$i = $i) \$tr->nodeValue : " . $tr->nodeValue);
				
			//test
			$tr_Child_Nodes = $tr->childNodes;
				
			$TDs = $tr->getElementsByTagName('td');
			
			debug("\$TDs->length : " . $TDs->length);
			
			// numeric ?
			$is_Nove_Value_Numeric = is_numeric($tr_Child_Nodes->item(0)->nodeValue);
				
			// 			debug("\$tr_Child_Nodes->item(0)->nodeValue : " . $tr_Child_Nodes->item(0)->nodeValue
				
			// 					. "(" . "numerical => "
			// 					. ( $is_Nove_Value_Numeric? "true" : "false" . ")")
			// 					);
				
			// push
			$tds_Item_2 = $TDs->item(2);
			
			debug("get_class(\$tds_Item_2) : " . get_class($tds_Item_2));
			
			$keyWord_Omit = "balance";
				
			debug("\$tr->nodeValue : " . $tr->nodeValue . " / \$tds_Item_2 : " . $tds_Item_2->nodeValue);
				
			debug(($tds_Item_2->nodeValue != $keyWord_Omit) ? "omit : TRUE" : "omit : FALSE");
			debug("\$tds_Item_2->nodeValue == \$keyWord_Omit --> " . (($tds_Item_2->nodeValue == $keyWord_Omit) ? "omit : TRUE" : "omit : FALSE"));
			// 			debug(($tds_Item_2 !== $keyWord_Omit) ? "omit : TRUE" : "omit : FALSE");
			// 			debug("strcmp(\$tds_Item_2, \$keyWord_Omit)" . strcmp($tds_Item_2, $keyWord_Omit));
			// // 			debug(($tds_Item_2 != $keyWord_Omit) ? "omit : TRUE" : "omit : FALSE");
				
			// 			debug("\$is_Nove_Value_Numeric : " . ($is_Nove_Value_Numeric == true ? "TRUE" : "FALSE"));
				
			// 			if ($is_Nove_Value_Numeric == true) {
			// 			if ($is_Nove_Value_Numeric == true && $tds_Item_2 != $keyWord_Omit) {
			// 			if ($is_Nove_Value_Numeric == true && $tds_Item_2 !== $keyWord_Omit) {
		
			$cond_1 = $is_Nove_Value_Numeric == true;
			
			$cond_2 = !($tds_Item_2->nodeValue == $keyWord_Omit);
				
			if ( $cond_1 && $cond_2) {
					
				array_push($lo_TRs_Of_Orders, $tr);
		
			} else {//if ($is_Nove_Value_Numeric == true)
		
				// 				debug("(\$i = $i : \$is_Nove_Value_Numeric == false (\"" . $tr_Child_Nodes->item(0)->nodeValue . "\")");
		
			}//if ($is_Nove_Value_Numeric == true)
			;
				
				// 			// subnodes
				// 			$TR_TDs =
				
		}//for ($i = 0; $i < $cntOf_TRs; $i++)
		
		
		debug("count(\$lo_TRs_Of_Orders) : " . count($lo_TRs_Of_Orders));
		
		/********************
		* return
		********************/
		$valOf_Return = [$lo_TRs_Of_Orders];
		
		
		/********************
		* return : 2
		* 	return
		********************/
		return $valOf_Return;
		
		
	}//public static function get_ListOf_Orders_From_Statement($fpath_Statement_File) {

	/********************
	 * extract_Ticket_Numbers
	 * 
	 * at : 2020/04/13 15:47:30
	 *
	 * @return
	 * 		array of ticket numbers
			// 			array(
			// 				(int) 0 => (int) 19572576,
			// 				(int) 1 => (int) 19573570,
			// 				(int) 2 => (int) 19574058,
			// 				(int) 3 => (int) 19592951
			// 			)
	 *
	 ********************/
	public static function extract_Ticket_Numbers($dpath_File_EA_Log) {
		//_20200413_154657:caller
		//_20200413_154703:head
		//_20200413_154707:wl
	
		/********************
			* step : 0
			* 		vars
		********************/

		/********************
		 * step : 2
		 * 		get : dir list
		 ********************/
		//ref https://stackoverflow.com/questions/591094/how-do-you-reindex-an-array-in-php
		$tmp_Ary = array_diff(scandir($dpath_File_EA_Log . "/"), [".", ".."]);
		
		debug("count(\$tmp_Ary) : " . count($tmp_Ary));
		
		$lo_MT4_Log_Files = array_values($tmp_Ary);
		
		$lenOf_LO_MT4_Log_Files = count($lo_MT4_Log_Files);
		
		// 		debug("\$lo_MT4_Log_Files : ($lenOf_LO_MT4_Log_Files) files");
		
		// 		debug($lo_MT4_Log_Files);
		
		//_20200411_181313:next
		/********************
		 * step : 3
		 * 		build : array
		********************/
		/********************
		 * step : 3.1
		 * 		prep
		********************/
		$lo_MT4_Log_Files__Filtered = array();
		
		/********************
		 * step : 3.2
		 * 		filter
		********************/
		// filter
		for ($i = 0; $i < $lenOf_LO_MT4_Log_Files; $i++) {
		
			// get item
			$fname = $lo_MT4_Log_Files[$i];
				
			// conditions
			$cond_1 = Utils::endsWith($fname, ".copy");
			$cond_2 = Utils::endsWith($fname, ".log");
				
			// judge
			if ($cond_1 || $cond_2) {
				
// 				//debug
// 				debug("\$cond_1 || \$cond_2 ==> true : $fname");
				
				array_push($lo_MT4_Log_Files__Filtered, $fname);
		
			}//if ($cond_1 || $cond_2)
				
		}//for ($i = 0; $i < $lenOf_LO_MT4_Log_Files; $i++)
		
// 		//debug
// 		debug("\$lo_MT4_Log_Files__Filtered : " . "(" . count($lo_MT4_Log_Files__Filtered) . " items)");
// // 		debug("\$lo_MT4_Log_Files__Filtered : ");

// 		debug($lo_MT4_Log_Files__Filtered);
		
// 		debug("\$lo_MT4_Log_Files__Filtered[0] : ");
// 		debug($lo_MT4_Log_Files__Filtered[0]);
		
		/********************
		 * step : 3.3
		 * 		re-order
		 ********************/
		//ref https://stackoverflow.com/questions/589601/pop-first-element-of-array-instead-of-last-reversed-array-pop
		$lo_MT4_Log_Files__Filtered_Final = array();
		
		// index : 1 - last
		$lo_MT4_Log_Files__Filtered_Final = array_slice($lo_MT4_Log_Files__Filtered, 1);
		// 		array_push($lo_MT4_Log_Files__Filtered_Final, array_slice($lo_MT4_Log_Files__Filtered, 1));
		
// 		//debug
// 		debug("\$lo_MT4_Log_Files__Filtered_Final : ");
		
// 		debug($lo_MT4_Log_Files__Filtered_Final);
		
		
		// index : first
		array_push($lo_MT4_Log_Files__Filtered_Final, $lo_MT4_Log_Files__Filtered[0]);
		
		debug("\$lo_MT4_Log_Files__Filtered[0] : ");
		debug($lo_MT4_Log_Files__Filtered[0]);
		
		//debug
		debug("\$lo_MT4_Log_Files__Filtered_Final : ");
		
		debug($lo_MT4_Log_Files__Filtered_Final);
		
		/********************
		 * step : 4
		 * 		for-loop-1
		********************/
		/********************
		 * step : 4.1
		 * 		prep
		********************/
		// length
		$lenOf_LO_MT4_Log_Files__Filtered_Final = count($lo_MT4_Log_Files__Filtered_Final);
		
		debug("\$lenOf_LO_MT4_Log_Files__Filtered_Final : " . $lenOf_LO_MT4_Log_Files__Filtered_Final);
		
		// array : list of ticket numbers
		$lo_Tiket_Nums = array();
		
		/********************
		 * step : 4.2
		 * 		loop
		********************/
		for ($i = 0; $i < $lenOf_LO_MT4_Log_Files__Filtered_Final; $i++) {
				
			/********************
			 * step : 4.2 : 1
			 * 		build : fpath
			 ********************/
			// file name
			$fname = $lo_MT4_Log_Files__Filtered_Final[$i];
				
			// build path
			$fpath = join(DS, array($dpath_File_EA_Log, $fname));
				
// 			//debug
// 			debug("\$fpath : " . $fpath);
		
			/********************
			 * step : 4.2 : 2
			 * 		load lines (file : open)
			********************/
			//ref https://www.php.net/manual/en/function.file.php
			$linesOf_File_Content = file($fpath);
			// 	(int) 169 => '[2019.12.24 07:36:25 / ea-3.mq4:423](step : j1 : N : 1) new bar --> NO
			// 	(int) 170 => '[2019.12.24 07:36:28 / ea-3.mq4:423](step : j1 : N : 1) new bar --> NO
				
			/********************
			 * step : 5
			 * 		for-loop-2
			********************/
			foreach ($linesOf_File_Content as $index => $line) {
				/********************
				 * step : 5.1
				 * 		prep
				 ********************/
				// 				$strOf_Patterns = '/taken/';
				$strOf_Patterns = CONS::$regStr_Position_Taken;
		
				// 				$strOf_Patterns = '/position ==> taken/';
					
				// 				//debug
				// 				debug("\$line : " . $line);
				// 						//'$line : [2019.12.24 07:35:04 / ea-3.mq4:354](step : j3 : Y : 2) position ==> taken : res_ea_3_i = 19572576
		
				/********************
				 * step : 5.2
				 * 		exec matches
				 ********************/
				$res_i = preg_match($strOf_Patterns, $line, $matches);
		
				/********************
				 * step : 5.3 : j1
				 * 		matches ?
				********************/
				//debug
				if ($res_i == 1) {
					/********************
					 * step : 5.3 : j1 : Y
					 * 		matches
					 ********************/
					/********************
					 * step : 5.3 : j1 : Y : 1
					 * 		log
					 ********************/
					//debug
					// 					debug("(step : 5.3 : j1 : Y : 1) matches : \$res_i = $res_i");
						
					/********************
					 * step : 6 : j2
					 * 		match : ticket number string ?
					 ********************/
					/********************
					 * step : 6 : j2: 0
					 * 		prep
					 ********************/
					/********************
					 * step : 6 : j2: 1
					 * 		exec : matching
					 ********************/
					$strOf_Patterns_2 = CONS::$regStr_Ticket_Num_String;
					// 					$strOf_Patterns_2 = '/= (\d+)/';
						
					$res_i_2 = preg_match($strOf_Patterns_2, $line, $matches_2);
						
					// 					//debug
					// 					debug("\$matches_2 =>");
					// 					debug($matches_2);
					// array(
					// 		(int) 0 => '= 19576806',
					// 		(int) 1 => '19576806'
					// )
						
					/********************
					 * step : 6 : j2: 2
					 * 		matched ?
					********************/
					if ($res_i_2 == 1) {
						/********************
						 * step : 6 : j2: 2 : Y
						 * 		matched
						 ********************/
						/********************
						 * step : 6 : j2: 2 : Y : 1
						 * 		log
						 ********************/
						// 						debug("matched : \$strOf_Patterns_2 => $strOf_Patterns_2 (\$res_i_2 = $res_i_2");
							
						// 						//debug
						// 						debug("\$matches_2 =>");
						// 						debug($matches_2);
		
						/********************
						 * step : 6 : j2: 2 : Y : 2
						 * 		append
						 ********************/
						array_push($lo_Tiket_Nums, (int) $matches_2[1]);
							
					} else {
						/********************
						 * step : 6 : j2: 2 : N
						 * 		NOT matched
						 ********************/
							
		
		
					}//if ($res_i_2 == 1)
						
						 	
						 	 	
					/********************
					 * step : 6 : j2: 2
					 * 		matched ?
					 ********************/
						
				} else {//if ($res_i == 1)
					/********************
					 * step : 5.3 : j1 : N
					 * 		NOT matches
					 ********************/
		
				}//if ($res_i == 1)
				;
		
					// 				//debug
					// 				debug($matches);
		
		
			}//foreach ($linesOf_File_Content as $index => )
				
				// 			//debug
				// 			debug($linesOf_File_Content);
				
				// 			$fin_Log = fopen($fpath, "r");
				
				// 			debug("file ==> opened : $fin_Log");
				
				// 			/********************
				// 			 * step : 4.2 : 3
				// 			 * 		file : load content
				// 			 ********************/
				
				
				// 			/********************
				// 			 * step : 4.2 : X
				// 			 * 		file : close
				// 			 ********************/
				// 			fclose($fin_Log);
				
		}//for ($i = 0; $i < $lenOf_LO_MT4_Log_Files__Filtered_Final; $i++)
		
		/********************
		 * step : X
		 * 		return
		 ********************/
		$valOf_Ret = $lo_Tiket_Nums;
		
		// return
		return $valOf_Ret;
		
		
	}//public static function extract_Ticket_Numbers() {
	
	
}//class Libfx
	