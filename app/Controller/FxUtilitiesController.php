<?php

/*
C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\
	=> app diretory
/cake_apps/Cake_IFM11

 * 
 * 
 */

//ref https://www.devdungeon.com/content/how-parse-html-dom-php
// require_once('simple_html_dom.php');
// require_once('C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/simple_html_dom.php');

class FxUtilitiesController extends AppController {

	/********************
	 * get_ListOf_Orders_From_Statement
	 * 	at : 2020/04/04 12:37:34
	 * 
	 * @param param_Dpath_Statement_File
	 * @param param_Fname_Statement_File
	 * 
	 * <descrip>
	 * 		1. file gen-ed at : C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\webroot\Log_Fx_Admin\data.[fx-utils].XXX.dir
	 ********************/
	//_20200412_133400:next
	//_20200329_132038:tmp
// 	public function get_ListOf_Orders_From_Statement($dpath, $fname) {
	public function util_2__Extract_Ticket_Numbers() {
		//_20200411_174210:caller
		//_20200411_174216:head
		//_20200411_174219:wl
		/********************
		* step : 0
		* 	vars
		********************/
		
		/********************
		* step : 1
		* 	params : statement file
		********************/
		// get : param vals
		@$query_Param_Dpath_File_EA_Log = $this->request->query[CONS::$param_Dpath_File_EA_Log];
				// CONS::$param_Dpath_File_EA_Log : "param_Dpath_File_EA_Log"
		
		// default
		if ($query_Param_Dpath_File_EA_Log == null) {
		
			debug("\$query_Param_Dpath_File_EA_Log == null");
			
			$query_Param_Dpath_File_EA_Log = CONS::$param_Dpath_File_EA_Log__Dflt;
			
			debug("CONS::\$param_Dpath_File_EA_Log__Dflt = " . CONS::$param_Dpath_File_EA_Log__Dflt);
			
		}//if ($query_Param_Dpath_File_EA_Log == null)

		//debug
		debug("\$query_Param_Dpath_File_EA_Log = " . $query_Param_Dpath_File_EA_Log);

		/********************
		 * step : 2
		 * 		get : dir list
		 ********************/
		//ref https://stackoverflow.com/questions/591094/how-do-you-reindex-an-array-in-php
		$tmp_Ary = array_diff(scandir($query_Param_Dpath_File_EA_Log . "/"), [".", ".."]);
		
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
			
				array_push($lo_MT4_Log_Files__Filtered, $fname);
				
			}//if ($cond_1 || $cond_2)
			
		}//for ($i = 0; $i < $lenOf_LO_MT4_Log_Files; $i++)

// 		//debug
// 		debug("\$lo_MT4_Log_Files__Filtered : ");
		
// 		debug($lo_MT4_Log_Files__Filtered);
		
		/********************
		 * step : 3.3
		 * 		re-order
		 ********************/
		//ref https://stackoverflow.com/questions/589601/pop-first-element-of-array-instead-of-last-reversed-array-pop
		$lo_MT4_Log_Files__Filtered_Final = array();
		
		// index : 1 - last
		$lo_MT4_Log_Files__Filtered_Final = array_slice($lo_MT4_Log_Files__Filtered, 1);
// 		array_push($lo_MT4_Log_Files__Filtered_Final, array_slice($lo_MT4_Log_Files__Filtered, 1));
		
		// index : first
		array_push($lo_MT4_Log_Files__Filtered_Final, $lo_MT4_Log_Files__Filtered[0]);
		
		
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
			$fpath = join(DS, array($query_Param_Dpath_File_EA_Log, $fname));
			
			//debug
			debug("\$fpath : " . $fpath);

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
		
		//debug
		debug("\$lo_Tiket_Nums =>");
		debug($lo_Tiket_Nums);
		
		/********************
		* set : view vals
		********************/
		/********************
		* set : view vals : 1
		* 		current time
		********************/
		$time_Current = Utils::get_CurrentTime();
		
		$this->set("time_Current", $time_Current);
		
		/********************
		* set : view vals : 2
		* 		source file
		********************/
		$tmp_str = "EA log file";
		$tmp_str .= "<br>";
		
		$tmp_str .= "dpath = " . $query_Param_Dpath_File_EA_Log;
		$tmp_str .= "<br>";
		
		$this->set("message", $tmp_str);
		
		/********************
		* set : layout
		********************/
		$this->layout = "plain";
		
	}//public function util_2__Extract_Ticket_Numbers() {
	
	/********************
	 * get_ListOf_Orders_From_Statement
	 * 	at : 2020/04/04 12:37:34
	 * 
	 * @param param_Dpath_Statement_File
	 * @param param_Fname_Statement_File
	 * 
	 * <descrip>
	 * 		1. file gen-ed at : C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\webroot\Log_Fx_Admin\data.[fx-utils].XXX.dir
	 ********************/
	//_20200329_132038:tmp
// 	public function get_ListOf_Orders_From_Statement($dpath, $fname) {
	public function get_ListOf_Orders_From_Statement() {
		//_20200404_123046:caller
		//_20200404_123048:head
		//_20200404_123051:wl
		/********************
		* step : 0
		* 	vars
		********************/
		$lo_TRs_Of_Orders = array();
		
		/********************
		* step : 1
		* 	params : statement file
		********************/
		// get : param vals
		@$query_Param_Dpath_Statement_File = $this->request->query[CONS::$param_Dpath_Statement_File];
		@$query_Param_Fname_Statement_File = $this->request->query[CONS::$param_Fname_Statement_File];
		
		// default
		if ($query_Param_Dpath_Statement_File == null) {
		
			debug("\$query_Param_Dpath_Statement_File == null");
			
			$query_Param_Dpath_Statement_File = CONS::$param_Dpath_Statement_File__Dflt;
			
		}//if ($query_Param_Dpath_Statement_File == null)
		;
		
		if ($query_Param_Fname_Statement_File == null) {
		
			debug("\$query_Param_Fname_Statement_File == null");
			
			$query_Param_Fname_Statement_File = CONS::$param_Fname_Statement_File__Dflt;
			
		}//if ($query_Param_Fname_Statement_File == null)

		//debug
		debug("\$query_Param_Dpath_Statement_File = " . $query_Param_Dpath_Statement_File);
		debug("\$query_Param_Fname_Statement_File = " . $query_Param_Fname_Statement_File);

		/********************
		 * step : 2
		 * 	file : load
		 ********************/
		// open
		$modeOf_Open_File = "r";
		
		$fpath_Statement_File = join(DS, array($query_Param_Dpath_Statement_File, $query_Param_Fname_Statement_File));
		
		//$valOf_Return = [$lo_TRs_Of_Orders];
		$valOf_Return = Libfx::get_ListOf_Orders_From_Statement($fpath_Statement_File);
		
		$lo_TRs_Of_Orders = $valOf_Return[0];
		
// 		// read content
// 		//ref https://www.php.net/manual/en/function.file-get-contents.php
// 		$linesOf_Statememt_File = file_get_contents($fpath_Statement_File);
		
// // 		debug("count(\$linesOf_Statememt_File) : " . count($linesOf_Statememt_File));
// 		//ref https://www.php.net/manual/en/function.substr.php
// // 		debug("substr(\$linesOf_Statememt_File, 0, 10) : '" . substr($linesOf_Statememt_File, 0, 10) . "'");
		
// // 		$fin__Statement_File = fopen($fpath_Statement_File, $modeOf_Open_File);
		
// // 		debug("file opened => " . $fpath_Statement_File);
// // 		debug("(status = " . $fin__Statement_File . ")");

		
		
// 		/********************
// 		 * step : 3
// 		 * 	html : parse
// 		 ********************/
// 		/********************
// 		 * step : 3.1
// 		 * 	get : html
// 		 ********************/
// 		$doc = new DOMDocument();
		
// 		$doc->loadHTML($linesOf_Statememt_File);
		
// 		$TRs = $doc->getElementsByTagName('tr');
		
// 		$cntOf_TRs = 0;
		
// 		foreach ($TRs as $tr) {
		
// 			$cntOf_TRs += 1;
			
// 		}//foreach ($TRs as $tr)
		
// 		debug("\$cntOf_TRs : " . $cntOf_TRs);

// 		$maxOf_ForEach__TRs = $cntOf_TRs;
// // 		$maxOf_ForEach__TRs = 10;
		
// 		// get : subnode --> "td"
// 		for ($i = 0; $i < $cntOf_TRs; $i++) {
		
// 			// stopper
// 			if ($i > $maxOf_ForEach__TRs) break;
			
// 			// get tag : TR
// 			//ref https://stackoverflow.com/questions/3627489/php-parse-html-code
// 			$tr = $TRs->item($i);
// // 			$tr = $TRs->childNodes[0];
			
// // 			debug("(\$i = $i) \$tr->nodeValue : " . $tr->nodeValue);
			
// 			//test
// 			$tr_Child_Nodes = $tr->childNodes;
			
// 			$TDs = $tr->getElementsByTagName('td');
			
// 			// numeric ?
// 			$is_Nove_Value_Numeric = is_numeric($tr_Child_Nodes->item(0)->nodeValue);
			
// // 			debug("\$tr_Child_Nodes->item(0)->nodeValue : " . $tr_Child_Nodes->item(0)->nodeValue
					
// // 					. "(" . "numerical => " 
// // 					. ( $is_Nove_Value_Numeric? "true" : "false" . ")")
// // 					);
			
// 			// push
// 			$tds_Item_2 = $TDs->item(2);
			
// 			$keyWord_Omit = "balance";
			
// 			debug("\$tr->nodeValue : " . $tr->nodeValue . " / \$tds_Item_2 : " . $tds_Item_2->nodeValue);
			
// 			debug(($tds_Item_2->nodeValue != $keyWord_Omit) ? "omit : TRUE" : "omit : FALSE");
// 			debug("\$tds_Item_2->nodeValue == \$keyWord_Omit --> " . (($tds_Item_2->nodeValue == $keyWord_Omit) ? "omit : TRUE" : "omit : FALSE"));
// // 			debug(($tds_Item_2 !== $keyWord_Omit) ? "omit : TRUE" : "omit : FALSE");
// // 			debug("strcmp(\$tds_Item_2, \$keyWord_Omit)" . strcmp($tds_Item_2, $keyWord_Omit));
// // // 			debug(($tds_Item_2 != $keyWord_Omit) ? "omit : TRUE" : "omit : FALSE");
			
// // 			debug("\$is_Nove_Value_Numeric : " . ($is_Nove_Value_Numeric == true ? "TRUE" : "FALSE"));
			
// // 			if ($is_Nove_Value_Numeric == true) {
// // 			if ($is_Nove_Value_Numeric == true && $tds_Item_2 != $keyWord_Omit) {
// // 			if ($is_Nove_Value_Numeric == true && $tds_Item_2 !== $keyWord_Omit) {

// 			$cond_1 = $is_Nove_Value_Numeric == true;
// 			$cond_2 = !($tds_Item_2->nodeValue == $keyWord_Omit);
			
// 			if ( $cond_1 && $cond_2) {
			
// 				array_push($lo_TRs_Of_Orders, $tr);
				
// 			} else {//if ($is_Nove_Value_Numeric == true)
				
// // 				debug("(\$i = $i : \$is_Nove_Value_Numeric == false (\"" . $tr_Child_Nodes->item(0)->nodeValue . "\")");
				
// 			}//if ($is_Nove_Value_Numeric == true)
// 			;
			
// // 			// subnodes
// // 			$TR_TDs = 
			
// 		}//for ($i = 0; $i < $cntOf_TRs; $i++)
		
		
// 		debug("count(\$lo_TRs_Of_Orders) : " . count($lo_TRs_Of_Orders));
		
		//_20200404_140552:next
// 		//debug
// 		foreach ($lo_TRs_Of_Orders as $tr) {
		
// 			debug($tr->nodeValue);
			
// 			// td
// 			$TDs = $tr->getElementsByTagName('td');
			
// 			debug(
// 					"\$TDs->item(0) : " . $TDs->item(0)->nodeValue
// 					. " / "
// 					. "\$TDs->item(2) : " . $TDs->item(2)->nodeValue
					
// 					);
// 					//'$TDs->item(0) : 4473128 / $TDs->item(2) : buy'
			
			
// 		}//foreach ($lo_TRs_Of_Orders as $tr)
		
		
		
		
// 		debug("count(\$TRs) : " . count($TRs));
		
// 		//ref https://stackoverflow.com/questions/18349130/how-to-parse-html-in-php
// 		$html_Object = str_get_html($linesOf_Statememt_File);
		
// 		debug("(\$html_Object == true) ? => " . ($html_Object == true) ? "true" : "false");
		
// 		debug("get_class(\$html) : " . get_class($html_Object));
// // 		debug("get_class(\$html) : " . get_class($html));
		
		/********************
		 * step : 4
		 * 		gen : csv file
		 ********************/
		$flg_Gen_Data_File = true;
		
		$dname = "data.[fx-utils]." . Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]) . ".dir";
		
		if ($flg_Gen_Data_File == true) {
			/********************
			 * step : 4.1
			 * 		setup
			 ********************/
			// paths
			$dpath_Dst_Data_File = "C:\\WORKS_2\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\webroot\\Log_Fx_Admin"
					
					. "\\" . $dname;
			
			$fname_Dst_Data_File = "Order_List." . Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"])
								. ".dat";
		
			// file fullpath
			$fpath_Dst_Data_File = join(DS, 
						array($dpath_Dst_Data_File, $fname_Dst_Data_File));
			
// 			// open
// 			$fout_Data_File = fopen($fpath_Dst_Data_File, "r");
			
			/********************
			 * step : 4.2
			 * 		build text
			 ********************/
			/********************
			 * step : 4.2 : 1
			 * 		meta
			 ********************/
			// text : meta
			$txt = "\n";
			$txt .= "\$query_Param_Dpath_Statement_File\t" . $query_Param_Dpath_Statement_File;
			$txt .= "\n";
			
			$txt .= "\$query_Param_Fname_Statement_File\t$query_Param_Fname_Statement_File";
			$txt .= "\n";
			
			// num of TRs
			$txt .= "count(\$lo_TRs_Of_Orders)" . "\t" . count($lo_TRs_Of_Orders);
			$txt .= "\n";
			
			// separator line
			$txt .= "\n";
			
			// text : data
			foreach ($lo_TRs_Of_Orders as $tr) {
				/********************
				 * step : 4.2 : 2
				 * 		dat
				 ********************/
				$TDs = $tr->getElementsByTagName('td');
				
				$lenOf_TDs = $TDs->length;
				
				$lo_TD_Vals = array();
				
				foreach ($TDs as $td) {
				
					array_push($lo_TD_Vals, $td->nodeValue);
					
				}//foreach ($TDs as $td)
				
				$txt .= join("\t", $lo_TD_Vals);
				$txt .="\n";
				
				
				
// 				$txt .= $TDs->item(0)->nodeValue;
// 				$txt .= "\t";
				
// 				$txt .= $TDs->item(1)->nodeValue;
// 				$txt .="\n";
				
			}//foreach ($lo_TRs_Of_Orders as $tr)
			
			
			
			
			// write
// 			$fout_Data_File.write($txt);
			Utils::write_Log__Fx_Admin($dpath_Dst_Data_File, $fname_Dst_Data_File, $txt, __FILE__, __LINE__);
			
// 			// close file
// 			fclose($fout_Data_File);
			
			debug("file written : $fpath_Dst_Data_File");
			
		}//if ($flg_Gen_Data_File == true)
		;
		
		
		
		/********************
		 * step : 3.2
		 * 		find : "tr"
		 ********************/
// 		$TRs = $html->find('tr');
		
// 		debug("count(\$TRs) : " . count($TRs));
		
		
		
		/********************
		 * step : X
		 * 	file : close
		 ********************/
// 		fclose($fin__Statement_File);
		
// 		//debug
// 		debug("file closed => " . $fpath_Statement_File);
		
		/********************
		* set : view vals
		********************/
		/********************
		* set : view vals : 1
		* 		current time
		********************/
		$time_Current = Utils::get_CurrentTime();
		
		$this->set("time_Current", $time_Current);
		
		/********************
		* set : view vals : 2
		* 		source file
		********************/
		$tmp_str = "Statement file";
		$tmp_str .= "<br>";
		
		$tmp_str .= "dpath = " . $query_Param_Dpath_Statement_File;
		$tmp_str .= "<br>";
		
		$tmp_str .= "file = $query_Param_Fname_Statement_File";
		$tmp_str .= "<br>";

		$this->set("message", $tmp_str);
		
		/********************
		* set : layout
		********************/
		$this->layout = "plain";
		
	}//public function get_ListOf_Orders_From_Statement(dpath, fname) {

	
	//_20200406_100650:next
	
}//class FxUtilitiesController extends AppController {

/***************************
//ref https://stackoverflow.com/questions/17391811/how-to-execute-in-php-interactive-mode
// 2020/02/05 14:54:13

<?php
	echo microtime();
?>



****************************/