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
			
			// numeric ?
			$is_Nove_Value_Numeric = is_numeric($tr_Child_Nodes->item(0)->nodeValue);
			
// 			debug("\$tr_Child_Nodes->item(0)->nodeValue : " . $tr_Child_Nodes->item(0)->nodeValue
					
// 					. "(" . "numerical => " 
// 					. ( $is_Nove_Value_Numeric? "true" : "false" . ")")
// 					);
			
			// push
			$tds_Item_2 = $TDs->item(2);
			
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

}//class FxUtilitiesController extends AppController {

/***************************
//ref https://stackoverflow.com/questions/17391811/how-to-execute-in-php-interactive-mode
// 2020/02/05 14:54:13

<?php
	echo microtime();
?>



****************************/