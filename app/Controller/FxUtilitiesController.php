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
	 * util_3__Gen_Trading_Result_List
	 * 
	 * 	at : 
	 * 
	 * @param 
	 * 
	 * <descrip>
	 * 		1. url
	 * 		==> http://localhost/Eclipse_Luna/Cake_IFM11/fx_utilities/util_2__Extract_Ticket_Numbers&param_Dpath_File_EA_Log=C:\Users\iwabuchiken\AppData\Roaming\MetaQuotes\Terminal\34B08C83A5AAE27A4079DE708E60511E\MQL4\Files\Logs\storage_Logs\20191224_073409[eap-2.id-1].[AUDJPY-1].dir
	 * 
	 * @return
	 * 		$aryOf_Stats_Data
		 * 		total
		 * 		cntOf_Order_Plus
		 * 		cntOf_Order_Minus
		 * 		
		 * 		aryOf_CntOf_Order_Minus_BBLoc
		 * 		aryOf_CntOf_Order_Plus_BBLoc
	 * 
	 ********************/
	//_20200412_133400:next
	//_20200329_132038:tmp
// 	public function get_ListOf_Orders_From_Statement($dpath, $fname) {
	public function util_3__Gen_Trading_Result_List__Gen_Stats
	(
			$lo_Line_Combined
			
			) {
//caller:20200924_115443
//head:20200924_115457
//wl:20200924_115500
		/********************
		 * step : 3a : 0
		 * 		prep : vars
		 ********************/
		$aryOf_Stats_Data = array();
		
		/********************
		 * step : 3a : 1
		 * 		total
		 ********************/
		$numOf_Entries_Total = count($lo_Line_Combined);
		
		debug("\$numOf_Entries_Total ==> " . $numOf_Entries_Total);
		
		// add to array
		$aryOf_Stats_Data['total'] = $numOf_Entries_Total;
		
		/********************
		 * step : 3a : 2
		 * 		order : minus
		 ********************/
		$cntOf_Order_Minus = 0;
		$cntOf_Order_Plus = 0;
		
		foreach ($lo_Line_Combined as $line) {
		
			$profit = $line[108];
			
			// judge
			if ($profit < 0) {
			
				$cntOf_Order_Minus += 1;
				
			} else {//if ($profit < 0)
				
				$cntOf_Order_Plus += 1;
				
			}//if ($profit < 0)
			
		}//foreach ($lo_Line_Combined as $line)
		
		$numOf_Entries_Total = count($lo_Line_Combined);
		
		$msg = sprintf("\$cntOf_Order_Minus = %d, \$cntOf_Order_Plus = %d"

					, $cntOf_Order_Minus, $cntOf_Order_Plus
				
				);
		
		debug("\$numOf_Entries_Total ==> " . $msg);

		// add to array
		$aryOf_Stats_Data['cntOf_Order_Plus'] = $cntOf_Order_Plus;
		$aryOf_Stats_Data['cntOf_Order_Minus'] = $cntOf_Order_Minus;
		
		
		/********************
		 * step : 3a : 3
		 * 		BB.loc ==> count
		 ********************/
		/********************
		 * step : 3a : 3.1
		 * 		minus order : BB.loc ==> 1~6
		 ********************/
		/********************
		 * step : 3a : 3.1 : 0
		 * 		prep : vars
		 ********************/
		/********************
		 * step : 3a : 3.1 : 0.1
		 * 		$aryOf_CntOf_Order_Minus_BBLoc
		 ********************/
		//code:20200924_115713
		$lenOf_Combined_List = count($lo_Line_Combined);
		
		// counter
		$aryOf_CntOf_Order_Minus_BBLoc = array();
// 		$aryOf_CntOf_Order_Minus_BBLoc = array(6);
		
		$lenOf_AryOf_CntOf_Order_Minus_BBLoc = 6;
		
		// init
		for ($i = 0; $i < $lenOf_AryOf_CntOf_Order_Minus_BBLoc; $i++) {
		
			$aryOf_CntOf_Order_Minus_BBLoc[$i] = 0;
			
		}//for ($i = 0; $i < $lenOf_AryOf_CntOf_Order_Minus_BBLoc; $i++)

		/********************
		 * step : 3a : 3.1 : 0.2
		 * 		$sumOf_Orders_Minus, Plus
		 ********************/
		// sum
		$aryOf_SumOf_Orders_Minus		= array();
		$aryOf_SumOf_Orders_Plus		= array();
		
		// init
		for ($i = 0; $i < $lenOf_AryOf_CntOf_Order_Minus_BBLoc; $i++) {
		
			$aryOf_SumOf_Orders_Minus[$i]	= 0;
			$aryOf_SumOf_Orders_Plus[$i]	= 0;
				
		}//for ($i = 0; $i < $lenOf_AryOf_CntOf_Order_Minus_BBLoc; $i++)
		
		
		/********************
		 * step : 3a : 3.1 : ??
		 * 		for-loop
		 ********************/
		for ($i = 0; $i < $lenOf_Combined_List; $i++) {
			/********************
			 * step : 3a : 3.1 : 1
			 * 		get : line
			 ********************/
			$line = $lo_Line_Combined[$i];
			
			/********************
			 * step : 3a : 3.1 : 2
			 * 		set : conditions
			 ********************/
			$cond_1_1		= ($line[97] == 1);		// BB.loc-1
			$cond_1_2		= ($line[97] == 2);		// BB.loc-1
			$cond_1_3		= ($line[97] == 3);		// BB.loc-1
			$cond_1_4		= ($line[97] == 4);		// BB.loc-1
			$cond_1_5		= ($line[97] == 5);		// BB.loc-1
			$cond_1_6		= ($line[97] == 6);		// BB.loc-1
			
			$cond_2_1		= ($line[108] < 0);		// end in minus
			
			/********************
			 * step : 3a : 3.1 : 3
			 * 		judge
			 ********************/
			//next:20200929_151352
			
			//code:20200924_121037
			if ($cond_1_1 == true && $cond_2_1 == true) { 
				$aryOf_CntOf_Order_Minus_BBLoc[0] += 1;
				$aryOf_SumOf_Orders_Minus[0]	+= $line[108];
				
			} else if ($cond_1_2 == true && $cond_2_1 == true) { 
				$aryOf_CntOf_Order_Minus_BBLoc[1] += 1;
				$aryOf_SumOf_Orders_Minus[1]	+= $line[108];
				
			} else if ($cond_1_3 == true && $cond_2_1 == true) { 
				$aryOf_CntOf_Order_Minus_BBLoc[2] += 1;
				$aryOf_SumOf_Orders_Minus[2]	+= $line[108];
				
			} else if ($cond_1_4 == true && $cond_2_1 == true) { 
				$aryOf_CntOf_Order_Minus_BBLoc[3] += 1;
				$aryOf_SumOf_Orders_Minus[3]	+= $line[108];
				
			} else if ($cond_1_5 == true && $cond_2_1 == true) { 
				$aryOf_CntOf_Order_Minus_BBLoc[4] += 1;
				$aryOf_SumOf_Orders_Minus[4]	+= $line[108];
				
			} else if ($cond_1_6 == true && $cond_2_1 == true) { 
				$aryOf_CntOf_Order_Minus_BBLoc[5] += 1;
				$aryOf_SumOf_Orders_Minus[5]	+= $line[108];
				
			}//if ($cond_1 == true && $cond_2_1 == true)
			;
			
		}//for ($i = 0; $i < $lenOf_Combined_List; $i++)
		
		//debug
		$msg = "";
		
		for ($i = 0; $i < $lenOf_AryOf_CntOf_Order_Minus_BBLoc; $i++) {
		
			$msg .= "\$aryOf_CntOf_Order_Minus_BBLoc_" . ($i + 1) 
					. " = " 
					. $aryOf_CntOf_Order_Minus_BBLoc[$i] 
					. "\n";
			
		}//for ($i = 0; $i < $lenOf_AryOf_CntOf_Order_Minus_BBLoc; $i++)
		
		
		debug($msg);

		//debug
		$msg = "";
		
		for ($i = 0; $i < $lenOf_AryOf_CntOf_Order_Minus_BBLoc; $i++) {
		
			$msg .= "\$aryOf_SumOf_Orders_Minus_" . ($i + 1) 
					. " = " 
					. $aryOf_SumOf_Orders_Minus[$i] 
					. "\n";

		}//for ($i = 0; $i < $lenOf_AryOf_CntOf_Order_Minus_BBLoc; $i++)
		
		
		debug($msg);

		/********************
		 * step : 3a : 3.1 : X
		 * 		set to return val
		 ********************/
		// declare : index
		$aryOf_Stats_Data['aryOf_CntOf_Order_Minus_BBLoc'] = array();
		
		for ($i = 0; $i < $lenOf_AryOf_CntOf_Order_Minus_BBLoc; $i++) {
		
			$aryOf_Stats_Data['aryOf_CntOf_Order_Minus_BBLoc'][$i] = $aryOf_CntOf_Order_Minus_BBLoc[$i];
				
		}//for ($i = 0; $i < $lenOf_AryOf_CntOf_Order_Minus_BBLoc; $i++)
		
// 		//debug:20200929_150150
// 		debug("\$aryOf_Stats_Data['aryOf_CntOf_Order_Minus_BBLoc'] =>");
// 		debug($aryOf_Stats_Data['aryOf_CntOf_Order_Minus_BBLoc']);
		
		/********************
		 * step : 3a : 3.2
		 * 		plus order : BB.loc ==> 1~6
		 ********************/
		//code:20200924_122109
		/********************
		 * step : 3a : 3.2 : 1
		 * 		prep
		 ********************/
		// counter
		$aryOf_CntOf_Order_Plus_BBLoc = array();
		
		$lenOf_AryOf_CntOf_Order_Plus_BBLoc = 6;
		
		for ($i = 0; $i < $lenOf_AryOf_CntOf_Order_Plus_BBLoc; $i++) {
		
			$aryOf_CntOf_Order_Plus_BBLoc[$i] = 0;
			
		}//for ($i = 0; $i < $lenOf_AryOf_CntOf_Order_Plus_BBLoc; $i++)
		
		
		/********************
		 * step : 3a : 3.2 : 2
		 * 		count
		 ********************/
		for ($i = 0; $i < $lenOf_Combined_List; $i++) {
			/********************
			 * step : 3a : 3.2 : 1
			 * 		get : line
			 ********************/
			$line = $lo_Line_Combined[$i];
			
			/********************
			 * step : 3a : 3.2 : 2
			 * 		set : conditions
			 ********************/
			$cond_1_1		= ($line[97] == 1);		// BB.loc-1
			$cond_1_2		= ($line[97] == 2);		// BB.loc-1
			$cond_1_3		= ($line[97] == 3);		// BB.loc-1
			$cond_1_4		= ($line[97] == 4);		// BB.loc-1
			$cond_1_5		= ($line[97] == 5);		// BB.loc-1
			$cond_1_6		= ($line[97] == 6);		// BB.loc-1
			
			$cond_2_1		= ($line[108] >= 0);		// end in minus
			
			/********************
			 * step : 3a : 3.2 : 3
			 * 		judge
			 ********************/
			//$aryOf_SumOf_Orders_Minus[0]	+= $line[108];
			//code:20200924_121037
			//code:20200930_113705
			if ($cond_1_1 == true && $cond_2_1 == true) { 		
						$aryOf_CntOf_Order_Plus_BBLoc[0] += 1;
						$aryOf_SumOf_Orders_Plus[0]	+= $line[108];
						
			} else if ($cond_1_2 == true && $cond_2_1 == true) { 
						$aryOf_CntOf_Order_Plus_BBLoc[1] += 1;
						$aryOf_SumOf_Orders_Plus[1]	+= $line[108];

			} else if ($cond_1_3 == true && $cond_2_1 == true) { 
						$aryOf_CntOf_Order_Plus_BBLoc[2] += 1;
						$aryOf_SumOf_Orders_Plus[2]	+= $line[108];

			} else if ($cond_1_4 == true && $cond_2_1 == true) { 
						$aryOf_CntOf_Order_Plus_BBLoc[3] += 1;
						$aryOf_SumOf_Orders_Plus[3]	+= $line[108];

			} else if ($cond_1_5 == true && $cond_2_1 == true) { 
						$aryOf_CntOf_Order_Plus_BBLoc[4] += 1;
						$aryOf_SumOf_Orders_Plus[4]	+= $line[108];

			} else if ($cond_1_6 == true && $cond_2_1 == true) { 
						$aryOf_CntOf_Order_Plus_BBLoc[5] += 1;
						$aryOf_SumOf_Orders_Plus[5]	+= $line[108];
				
			}//if ($cond_1 == true && $cond_2_1 == true)
			;
			
		}//for ($i = 0; $i < $lenOf_Combined_List; $i++)
		
		//debug
		$msg = "";
		
		for ($i = 0; $i < $lenOf_AryOf_CntOf_Order_Plus_BBLoc; $i++) {
		
			$msg .= "\$aryOf_CntOf_Order_Plus_BBLoc_" . ($i + 1) 
					. " = " 
					. $aryOf_CntOf_Order_Plus_BBLoc[$i] 
					. "\n";
			
		}//for ($i = 0; $i < $lenOf_AryOf_CntOf_Order_Plus_BBLoc; $i++)
		
		debug($msg);
		
		//debug
		$msg = "";
		
		for ($i = 0; $i < $lenOf_AryOf_CntOf_Order_Plus_BBLoc; $i++) {
		
			$msg .= "\$aryOf_SumOf_Orders_Plus_" . ($i + 1)
			. " = "
					. $aryOf_SumOf_Orders_Plus[$i]
					. "\n";
		
		}//for ($i = 0; $i < $lenOf_AryOf_CntOf_Order_Plus_BBLoc; $i++)
		
		
		debug($msg);
		
		/********************
		 * step : 3a : 3.2 : X
		 * 		set to return val
		 ********************/
		/********************
		 * step : 3a : 3.2 : X.1
		 * 		aryOf_CntOf_Order_Plus_BBLoc
		 ********************/
		$aryOf_Stats_Data['aryOf_CntOf_Order_Plus_BBLoc'] = array();
		
		for ($i = 0; $i < $lenOf_AryOf_CntOf_Order_Plus_BBLoc; $i++) {
		
			$aryOf_Stats_Data['aryOf_CntOf_Order_Plus_BBLoc'][$i] = $aryOf_CntOf_Order_Plus_BBLoc[$i];
				
		}//for ($i = 0; $i < $lenOf_AryOf_CntOf_Order_Minus_BBLoc; $i++)
		
// 		$valOf_Ret['aryOf_CntOf_Order_Minus_BBLoc'] = $aryOf_CntOf_Order_Minus_BBLoc;
		
		//debug:20200929_150150
		debug("\$aryOf_Stats_Data['aryOf_CntOf_Order_Plus_BBLoc'] =>");
		debug($aryOf_Stats_Data['aryOf_CntOf_Order_Plus_BBLoc']);
		
// 		$valOf_Ret['aryOf_CntOf_Order_Plus_BBLoc'] = $aryOf_CntOf_Order_Plus_BBLoc;

		/********************
		 * step : 3a : 3.2 : X.2
		 * 		$aryOf_SumOf_Orders_Minus, Plus
		 ********************/
		$aryOf_Stats_Data['aryOf_SumOf_Orders_Minus']	= $aryOf_SumOf_Orders_Minus;
		$aryOf_Stats_Data['aryOf_SumOf_Orders_Plus']	= $aryOf_SumOf_Orders_Plus;
		
		/********************
		 * step : 3a : X
		 * 		return
		 ********************/
		// set vars
		$valOf_Ret = $aryOf_Stats_Data;
		
		//debug:20200929_145654
		debug("\$valOf_Ret['aryOf_CntOf_Order_Minus_BBLoc'] ==> ");
		debug($valOf_Ret['aryOf_CntOf_Order_Minus_BBLoc']);
		
		
		// return
		return $valOf_Ret;
		
		
	}//util_3__Gen_Trading_Result_List__Gen_Stats()
	
	public function util_3__Gen_Trading_Result_List() {
		//_20200506_111925:caller
		//_20200506_111928:head
		//_20200506_111931:wl
		/********************
		* step : 0
		* 	vars
		********************/
		/********************
		* step : 0.1
		* 	params
		********************/
		//_20200509_123705:tmp
		@$query_Param_Dpath_File_Tickets_Data = $this->request->query[CONS::$param_Dpath_File_Tickets_Data];
		
		@$query_Param_Fname_File_Tickets_Data = $this->request->query[CONS::$param_Fname_File_Tickets_Data];
		
		// statement file : file name
		@$query_Param_Fname_File_Statement = $this->request->query[CONS::$param_Fname_File_Statement];
		
		// statement file : dpath
		@$query_Param_Dpath_File_Statement = $this->request->query[CONS::$param_Dpath_File_Statement];
		
		/********************
		* step : 1
		* 	from tickets data ==> list of tickets
		********************/
		$dpath_File_Tickets_Data = "";
		$fname_File_Tickets_Data = "";
		
		if ($query_Param_Dpath_File_Tickets_Data == null) {
		
			$dpath_File_Tickets_Data = "C:\\Users\\iwabuchiken\\AppData\\Roaming\\MetaQuotes"
					. "\\Terminal\\34B08C83A5AAE27A4079DE708E60511E\\MQL4"
					. "\\Files\\Logs\\"
					. "\\" . "storage_Logs" . "\\"
							. "20200505_140459[eap-2.id-1].[AUDJPY-5].dir";
				
		} else {
		
			$dpath_File_Tickets_Data = $query_Param_Dpath_File_Tickets_Data;
			
		}//if ($query_Param_Dpath_File_Tickets_Data == null)
		
		
// 		$dpath_File_Tickets_Data = "C:\\Users\\iwabuchiken\\AppData\\Roaming\\MetaQuotes" 
// 								. "\\Terminal\\34B08C83A5AAE27A4079DE708E60511E\\MQL4"
// 								. "\\Files\\Logs\\"
// 								. "20200505_140459[eap-2.id-1].[AUDJPY-5].dir";

		if ($query_Param_Dpath_File_Tickets_Data == null) {
		
			$fname_File_Tickets_Data = "[ea-4_tester-1].(20200505_140459).(tickets-data).log";
		
		} else {
		
			$fname_File_Tickets_Data = $query_Param_Fname_File_Tickets_Data;
				
		}//if ($query_Param_Dpath_File_Tickets_Data == null)
		
// 		$fname_File_Tickets_Data = "[ea-4_tester-1].(20200505_140459).(tickets-data).log";
		
		
		//debug:20200902_133409
		// get list
		$lo_Tickets_From_Tickets_Data_File = 
				LibFxAdmin::get_LO_Tickets_From_Tickets_Data_File(
							$dpath_File_Tickets_Data
							, $fname_File_Tickets_Data
						);

		/********************
		 * step : 2
		 * 	from report file ==> list of tickets
		 ********************/
		//_20200506_125146:tmp
		// paths
		if ($query_Param_Dpath_File_Tickets_Data == null) {
		
			$dpath_File_Statement = CONS::$dpath_File_Detailed_Statement;
		
		} else if ($query_Param_Dpath_File_Tickets_Data == "") {
		
			debug("\$query_Param_Dpath_File_Tickets_Data ==> blank");
			
			$dpath_File_Statement = CONS::$dpath_File_Detailed_Statement;
		
		} else {
		
			debug("\$query_Param_Dpath_File_Tickets_Data ==> not null : string len = " . count($query_Param_Dpath_File_Statement));
			
			$dpath_File_Statement = $query_Param_Dpath_File_Statement;

		}//if ($query_Param_Dpath_File_Tickets_Data == null)
		
		//debug
		$string_tmp = "[" . Utils::get_CurrentTime() . " / "
				. basename(__FILE__) . ":" . __LINE__ . "]";
		
		$string_tmp .= "\n";
		
		$string_tmp .= "\$dpath_File_Statement ==> set to : $dpath_File_Statement";
		
		debug($string_tmp);
		
// 		$dpath_File_Statement = CONS::$dpath_File_Detailed_Statement;
// 		$dpath_File_Statement = "C:\\Users\\iwabuchiken\\AppData\\Roaming\\MetaQuotes"
// 				. "\\Terminal\\34B08C83A5AAE27A4079DE708E60511E\\MQL4"
// 				. "\\Logs\\logs_trading";
		

		
		if ($query_Param_Fname_File_Statement == null) {
		
			$fname_File_Statement = "DetailedStatement.[20200516_122618].htm";
// 			$fname_File_Statement = "DetailedStatement.[20200506_094419].[a-j,M5].htm";
		
		} else {//$query_Param_Fname_File_Statement
		
			$fname_File_Statement = $query_Param_Fname_File_Statement;
		
		}//if ($query_Param_Fname_File_Statement == null)
		
// 		$fname_File_Statement = "DetailedStatement.[20200506_094419].[a-j,M5].htm";
		
		//debug:20200902_133713
		$lo_Tickets_From_Statement_File = 
				Libfx::get_ListOf_Orders_From_Statement__ListOf_Tokens(
						$dpath_File_Statement
						, $fname_File_Statement
						);
		//marker:20200829_112857
		
		/********************
		 * step : 2 : 2
		 * 	from report file ==> account id
		 ********************/
		//code:20200902_131317
		$strOf_Account_Id_From_Statement_File =
				Libfx::get_Account_Id_From_Statement__ListOf_Tokens(
						$dpath_File_Statement
						, $fname_File_Statement
				);
		
		debug("\$strOf_Account_Id_From_Statement_File : " . $strOf_Account_Id_From_Statement_File);
		
// 		//debug:20200902_133455
// 		return ;
		
		/********************
		 * step : 3
		 * 		build : combined list
		 ********************/
		/********************
		 * step : 3 : 0
		 * 		for-loop : Ticket data file
		 ********************/
		$cntOf_Ticket_Num_Match = 0;
		
		// list
		$lo_Line_Combined = array();
		
// 		//test:20200829_112126
// 		$cntOf_Test = 0;
		
// 		$maxOf_CntOf_Test = 1;
		
		foreach ($lo_Tickets_From_Tickets_Data_File as $line_Tickets_Data_File) {

// 			//code:20200829_111212
// 			if ($cntOf_Test < $maxOf_CntOf_Test) {
			
// 				debug("\$line_Tickets_Data_File ==>");
				
// 				debug($line_Tickets_Data_File);
				
// 				// count
// 				$cntOf_Test += 1;
				
// 			}//if ($cntOf_Test < $maxOf_CntOf_Test)
				
			/********************
			 * step : 3 : 1
			 * 		get : ticket num
			 ********************/
			$n1 = $line_Tickets_Data_File[0];
			
			/********************
			 * step : 3 : 2
			 * 		for-loop : report list
			 ********************/
			foreach ($lo_Tickets_From_Statement_File as $line_Statement_File) {
				/********************
				 * step : 3 : 2.1
				 * 		ticket num
				 ********************/
				$n2 = $line_Statement_File[0];
			
				/********************
				 * step : 3 : 2.2 : j1
				 * 		compare : n1, n2
				 ********************/
				if ($n1 == $n2) {
					/********************
					 * step : 3 : 2.2 : j1 : Y
					 * 		n1 = n2
					 ********************/
// 					debug("match : Tickets data : $n1 / Statement file : $n2");
					
					// count
					$cntOf_Ticket_Num_Match += 1;
					
					/********************
					 * step : 3 : 2.2 : j1 : Y : 0.1
					 * 		modify : $line_Statement_File ==> price string
					 ********************/
					//ref https://www.w3schools.com/PHP/func_string_str_replace.asp
					$line_Statement_File[10] = intval(str_replace(" ", "", $line_Statement_File[10]));
// 					$line_Statement_File[10] = str_replace(" ", "", $line_Statement_File[10]);
					
					/********************
					 * step : 3 : 2.2 : j1 : Y : 1
					 * 		build : combined line
					 ********************/
					//_20200506_133102:next
					$line_Combined = array_merge($line_Tickets_Data_File, $line_Statement_File);
					
					/********************
					 * step : 3 : 2.2 : j1 : Y : 2
					 * 		append
					 ********************/
					array_push($lo_Line_Combined, $line_Combined);
					
					break;
				
				} else { }//if ($n1 == $n2)
				
			}//foreach ($lo_Tickets_From_Statement_File as $line_Statement_File)
			
		}//foreach ($lo_Tickets_From_Tickets_Data_File as $line_Tickets_Data_File)
		
		//debug
		debug("\$cntOf_Ticket_Num_Match : " . $cntOf_Ticket_Num_Match);
	
		debug("\$lo_Line_Combined[0] =>");
		debug($lo_Line_Combined[0]);
		
		/********************
		 * step : 3a
		 * 		gen stats data
		 ********************/
		/********************
		 * step : 3a : 1
		 * 		get data
		 ********************/
		//code:20200924_112838
// 		* 		$aryOf_Stats_Data
	// 		* 		total
	// 		* 		cntOf_Order_Plus
	// 		* 		cntOf_Order_Minus
		//caller:20200924_115443
		$valOf_Ret_Rcvd = $this->util_3__Gen_Trading_Result_List__Gen_Stats($lo_Line_Combined);
		
		/********************
		 * step : 3a : 2
		 * 		unpack
		 ********************/
		$numOf_Total			= $valOf_Ret_Rcvd['total'];
		$cntOf_Order_Minus		= $valOf_Ret_Rcvd['cntOf_Order_Minus'];
		$cntOf_Order_Plus		= $valOf_Ret_Rcvd['cntOf_Order_Plus'];
		
		// BB.loc : count of orders
		$aryOf_CntOf_Order_Minus_BBLoc	 = $valOf_Ret_Rcvd['aryOf_CntOf_Order_Minus_BBLoc'];
		$aryOf_CntOf_Order_Plus_BBLoc	 = $valOf_Ret_Rcvd['aryOf_CntOf_Order_Plus_BBLoc'];

		//debug:20200929_145424
		debug("\$aryOf_CntOf_Order_Minus_BBLoc =>");
		debug($aryOf_CntOf_Order_Minus_BBLoc);
		
		// BB.loc : sums
		$aryOf_SumOf_Orders_Minus	 = $valOf_Ret_Rcvd['aryOf_SumOf_Orders_Minus'];
		$aryOf_SumOf_Orders_Plus	 = $valOf_Ret_Rcvd['aryOf_SumOf_Orders_Plus'];
// 		$aryOf_Stats_Data['aryOf_SumOf_Orders_Minus']

		//debug:20200929_145424
		debug("\$aryOf_SumOf_Orders_Minus =>");
		debug($aryOf_SumOf_Orders_Minus);
		
		
		/********************
		 * step : 4
		 * 		write to file
		 ********************/
		/********************
		 * step : 4 : 1
		 * 		prep : meta info
		 ********************/
		//_20200507_165449:tmp
		$lo_Lines_Meta_Info = 
				LibFxAdmin::get_Meta_Info_From_Tickets_Data_File(
						$dpath_File_Tickets_Data
						, $fname_File_Tickets_Data
						);

// 		//debug
// 		debug("\$lo_Lines_Meta_Info =>");
// 		debug($lo_Lines_Meta_Info);
		
		/********************
		 * step : 4 : 2
		 * 		file : open
		 ********************/
		$tlabel = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
		
		$fname_File_Combined_Data = "[ea-4_tester-1].(20200507_140530).(combined-data).($tlabel).dat";
		
		$fpath_File_Combined_Data = join(DS, array($dpath_File_Tickets_Data, $fname_File_Combined_Data));
		
		$fout_File_Combined_Data = fopen($fpath_File_Combined_Data, "w");
		
		/********************
		 * step : 4 : 3
		 * 		file : write
		 ********************/
		/********************
		 * step : 4 : 3.1
		 * 		meta
		 ********************/
		/********************
		 * step : 4 : 3.1 : 1
		 * 		basics
		 ********************/
		$string_tmp = "[" . Utils::get_CurrentTime() 
					. " / "
					. basename(__FILE__)
					. ":"
					. __LINE__ . "]";
		
		$string_tmp .= "\n";
		
		fwrite($fout_File_Combined_Data, $string_tmp);
		
		foreach ($lo_Lines_Meta_Info as $line) {
		
			fwrite($fout_File_Combined_Data, $line);
			
			fwrite($fout_File_Combined_Data, "\n");
			
		}//foreach ($lo_Lines_Meta_Info as $line)

		/********************
		 * step : 4 : 3.1 : 2
		 * 		meta : combined file name
		 ********************/
		$string_tmp = "combined file(this)\t$fname_File_Combined_Data";
		$string_tmp .= "\n";
		
		$string_tmp .= "dpath\t$dpath_File_Tickets_Data";
		$string_tmp .= "\n";
		
		// file path
// 		fwrite($fout_File_Combined_Data, "this file\t$fname_File_Combined_Data");
// 		fwrite($fout_File_Combined_Data, "combined file(this)\t$fname_File_Combined_Data");
// 		fwrite($fout_File_Combined_Data, "\n");
		
// 		fwrite($fout_File_Combined_Data, "dpath\t$dpath_File_Tickets_Data");
// 		fwrite($fout_File_Combined_Data, "\n");
		
// 		// separator
// 		fwrite($fout_File_Combined_Data, "\n");
		
		//next:20200723_144733:n
		
		/********************
		 * step : 4 : 3.1 : 2
		 * 		meta : "buy" or "sell" (from report file)
		 ********************/
		//code:20200829_110037
// 		debug($lo_Line_Combined[0]);

		$string_tmp .= "order_type\t" . $lo_Line_Combined[0][100];
		$string_tmp .= "\n";
		
// 		fwrite($fout_File_Combined_Data, "order_type\t" . $lo_Line_Combined[0][100]);
		fwrite($fout_File_Combined_Data, "\n");

		/********************
		 * step : 4 : 3.1 : 3
		 * 		meta : account id
		 ********************/
		//code:20200902_135521
		$string_tmp .= "account : \t" . $strOf_Account_Id_From_Statement_File;
		$string_tmp .= "\n";
		
		/********************
		 * step : 4 : 3.1 : 4
		 * 	separator lines
		 ********************/
		// separator : 1 lines
		$string_tmp .= "\n";
// 		fwrite($fout_File_Combined_Data, "\n");
		fwrite($fout_File_Combined_Data, $string_tmp);
		
		/********************
		 * step : 4 : 3.1 : 3
		 * 	column names
		 ********************/
		//code:20200829_114700
		$string_tmp = "s.n.\tticket-num\tcurr.datetime\tClose.-12\tClose.-11\tClose.-10\tClose.-9\tClose.-8\tClose.-7\tClose.-6\tClose.-5\tClose.-4\tClose.-3\tClose.-2\tClose.-1\tu/d.-12\tu/d.-11\tu/d.-10\tu/d.-9\tu/d.-8\tu/d.-7\tu/d.-6\tu/d.-5\tu/d.-4\tu/d.-3\tu/d.-2\tu/d.-1\twidth.-12\twidth.-11\twidth.-10\twidth.-9\twidth.-8\twidth.-7\twidth.-6\twidth.-5\twidth.-4\twidth.-3\twidth.-2\twidth.-1\tw-level.-12\tw-level.-11\tw-level.-10\tw-level.-9\tw-level.-8\tw-level.-7\tw-level.-6\tw-level.-5\tw-level.-4\tw-level.-3\tw-level.-2\tw-level.-1\tMFI.-12\tMFI.-11\tMFI.-10\tMFI.-9\tMFI.-8\tMFI.-7\tMFI.-6\tMFI.-5\tMFI.-4\tMFI.-3\tMFI.-2\tMFI.-1\tRSI.-12\tRSI.-11\tRSI.-10\tRSI.-9\tRSI.-8\tRSI.-7\tRSI.-6\tRSI.-5\tRSI.-4\tRSI.-3\tRSI.-2\tRSI.-1\tForce.-12\tForce.-11\tForce.-10\tForce.-9\tForce.-8\tForce.-7\tForce.-6\tForce.-5\tForce.-4\tForce.-3\tForce.-2\tForce.-1\tBB-loc.-12\tBB-loc.-11\tBB-loc.-10\tBB-loc.-9\tBB-loc.-8\tBB-loc.-7\tBB-loc.-6\tBB-loc.-5\tBB-loc.-4\tBB-loc.-3\tBB-loc.-2\tBB-loc.-1\tticket\topen-time\ttype\tsize\titem\tprice\tSL\tTP\tclose-time\tprice\tprofit";

		fwrite($fout_File_Combined_Data, $string_tmp);
		fwrite($fout_File_Combined_Data, "\n");
		
		/********************
		 * step : 4 : 3.2
		 * 		body
		 ********************/
		$cntOf_Loop = 1;
		
		// string for writing
		// init string
		$string_tmp = "";
		
		foreach ($lo_Line_Combined as $line) {
		
			// serial num
			$string_tmp .= strval($cntOf_Loop) . "\t";
// 			fwrite($fout_File_Combined_Data, strval($cntOf_Loop) . "\t");
// // 			fwrite($fout_File_Combined_Data, strval($cntOf_Loop));
			
			$string_tmp .= join("\t", $line);
			
// 			fwrite($fout_File_Combined_Data, join("\t", $line));
// // 			fwrite($fout_File_Combined_Data, $line);
			
			// separator line
			$string_tmp .= "\n";
// 			fwrite($fout_File_Combined_Data, "\n");
			
			// counter
			$cntOf_Loop += 1;
						
		}//foreach ($lo_Line_Combined as $line)
		
		// write : string
		fwrite($fout_File_Combined_Data, $string_tmp);
		
		/********************
		 * step : 3.3
		 * 		stats data
		 ********************/
		//code:20200929_141416
		/********************
		 * step : 3.3 : 1
		 * 		total, plus, minus
		 ********************/
		// flash
		$string_tmp = "";
		
		// separator
		$string_tmp .= "\n";
		$string_tmp .= "\n";
		
		// total
		$string_tmp .= "total=\t$numOf_Total";
		$string_tmp .= "\n";
		
		// minus
		$string_tmp .= "loss=\t$cntOf_Order_Minus";
		$string_tmp .= "\n";
		
		// plus
		$string_tmp .= "gain=\t$cntOf_Order_Plus";
		$string_tmp .= "\n";

		// separator
		$string_tmp .= "\n";

		/********************
		 * step : 3.3 : 2
		 * 		BB.loc ==> count
		 ********************/
		//debug:20200929_145219
		debug("\$aryOf_CntOf_Order_Minus_BBLoc ==>");
		debug($aryOf_CntOf_Order_Minus_BBLoc);
		
		//code:20200929_144730
		$lenOf_AryOf_CntOf_Order_Minus_BBLoc	= count($aryOf_CntOf_Order_Minus_BBLoc);

		// column names
		$string_tmp	.= "BB.loc\tloss(<0)\tgain(>=0)";
		$string_tmp	.= "\n";
		
		for ($i = 0; $i < $lenOf_AryOf_CntOf_Order_Minus_BBLoc; $i++) {
		
			// get entry
			$cntOf_BBLoc_Minus		= $aryOf_CntOf_Order_Minus_BBLoc[$i];
			$cntOf_BBLoc_Plus		= $aryOf_CntOf_Order_Plus_BBLoc[$i];
			
			// string
			$string_tmp		.= ($i + 1) . "\t" . $cntOf_BBLoc_Minus . "\t" . $cntOf_BBLoc_Plus;
			
			$string_tmp		.= "\n";
			
		}//for ($i = 0; $i < $lenOf_AryOf_CntOf_Order_Minus_BBLoc; $i++)
		
		// separator
		$string_tmp .= "\n";
		$string_tmp .= "\n";

		/********************
		 * step : 3.3 : 3
		 * 		BB.loc ==> sums
		 ********************/
		//code:20200930_115626
		// column names
		$string_tmp	.= "BB.loc\tsum(loss)\tsum(gain)";
		$string_tmp	.= "\n";
		
		for ($i = 0; $i < $lenOf_AryOf_CntOf_Order_Minus_BBLoc; $i++) {
		
			// get entry
			$sumOf_BBLoc_Minus		= $aryOf_SumOf_Orders_Minus[$i];
			$sumOf_BBLoc_Plus		= $aryOf_SumOf_Orders_Plus[$i];
				
			// string
			$string_tmp		.= ($i + 1) . "\t" . $sumOf_BBLoc_Minus . "\t" . $sumOf_BBLoc_Plus;
				
			$string_tmp		.= "\n";
				
		}//for ($i = 0; $i < $lenOf_AryOf_CntOf_Order_Minus_BBLoc; $i++)
		
		// separator
		$string_tmp .= "\n";
		$string_tmp .= "\n";
		
		// write : string
		fwrite($fout_File_Combined_Data, $string_tmp);
		
		/********************
		 * step : 4 : 4
		 * 		file : close
		 ********************/
		fclose($fout_File_Combined_Data);
		
		
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
		$tmp_str = "\$dpath_File_Tickets_Data : $dpath_File_Tickets_Data";
		$tmp_str .= "<br>";
		
		$tmp_str .= "\$fname_File_Tickets_Data : $fname_File_Tickets_Data";
		$tmp_str .= "<br>";
		
// 		$tmp_str_2 = "\$fpath_File_Combined_Data : $fpath_File_Combined_Data";
		$tmp_str_2 = $fpath_File_Combined_Data;
// 		$tmp_str_2 .= "<br>";
// 		$tmp_str .= "\$fpath_File_Combined_Data : $fpath_File_Combined_Data";
// 		$tmp_str .= "<br>";
		
		
		$this->set("message", $tmp_str);
		$this->set("message_2", $tmp_str_2);
		
		/********************
		 * set : layout
		 ********************/
		$this->layout = "plain";

		
	}//util_3__Gen_Trading_Result_List
	
	/********************
	 * util_2__Extract_Ticket_Numbers
	 * 	at : 
	 * 
	 * @param 
	 * 
	 * <descrip>
	 * 		1. url
	 * 		==> http://localhost/Eclipse_Luna/Cake_IFM11/fx_utilities/util_2__Extract_Ticket_Numbers&param_Dpath_File_EA_Log=C:\Users\iwabuchiken\AppData\Roaming\MetaQuotes\Terminal\34B08C83A5AAE27A4079DE708E60511E\MQL4\Files\Logs\storage_Logs\20191224_073409[eap-2.id-1].[AUDJPY-1].dir
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
		 * step : X
		 * 		get : list of ticket nums
		 ********************/
		$lo_Tiket_Nums = Libfx::extract_Ticket_Numbers($query_Param_Dpath_File_EA_Log);
		
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
			//C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\webroot\Log_Fx_Admin
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

	/********************
	 * tasks_26_Gen_Combined_Trade_Result_List
	 *
	 * 	at : 2020/05/19 19:02:57
	 *
	 * @return :
			array(
			'param_Dpath_File_Tickets_Data' => 'C:\Users\iwabuchiken\AppData\Roaming\MetaQuotes\Terminal\34B08C83A5AAE27A4079DE708E60511E\MQL4\Files\Logs\20200506_133310[eap-2.id-1].[AUDJPY-5].dir',
			'param_Fname_File_Tickets_Data' => '[ea-4_tester-1].(20200506_133310).(tickets-data).log',
			'param_Fname_File_Statement' => 'DetailedStatement.[20200509_123535].htm'
			)
	
	 ********************/
	public function
	tasks_26_Gen_Combined_Trade_Result_List__Get_Keyword_List(
			
			$dpath_File_Dat
			, $fname_File_Dat
			
			) {
		//_20200520_120600:caller
		//_20200520_120606:head
		//_20200520_120608:wl
		/********************
		 * step : 1 : 1
		 * 		prep : vars
		 ********************/

		/********************
		 * step : 2
		 * 		external : load
		 ********************/
		/********************
		 * step : 2 : 1
		 * 		open
		 ********************/
		//_20200519_191713:tmp
// 		$dpath_File_Dat = "C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\data\data_fx";
// 		$fname_File_Dat = "data_gen_combined_list.dat";
		
		$fpath_File_Dat = join(DS, array($dpath_File_Dat, $fname_File_Dat));
		
		debug("\$fpath_File_Dat => " . $fpath_File_Dat);
		
		$lo_File_Content = file($fpath_File_Dat);
// 		$lo_File_Content = file($fpath_File_Dat, "r");
// 		$fin_File_Dat = fopen($fpath_File_Dat, "r");
		
		/********************
		 * step : 2 : 2
		 * 		read lines
		********************/
		$lo_Lines_File_Dat = [];
		
// 		if ($fin_File_Dat) {
		
			foreach ($lo_File_Content as $line) {
			
// 			while (($line = fgets($fin_File_Dat)) !== false) {
		
				// remove
				$line = preg_replace('/\r/', '', $line);
				$line = preg_replace('/\n/', '', $line);
		
				// omit lines
				if (Utils::startsWith($line, "#")) {
		
					continue;
						
				}//if (Utils::startsWith()
				;
		
				// push line
				if ($line !== '') {
						
					debug("\$line : " . "'" . $line . "'");
						
					array_push($lo_Lines_File_Dat, $line);
						
				}//if ($line !== '')
				;
					// 				array_push($lo_Lines_File_Dat, $line);
		
			}
		
// 		} else {
// 			// error opening the file.
// 			debug("\$fin_File_Dat ==> false");
		
// 		}
		
		debug("count(\$lo_Lines_File_Dat) => " . count($lo_Lines_File_Dat));
		
		//_20200519_192026:next
		
		/********************
		 * step : 3
		 * 		get : param vals
		********************/
		$lo_Keywords = [];
		
		foreach ($lo_Lines_File_Dat as $line) {
		
			$tokens = explode("=", $line);
				
			// push
			$lo_Keywords[$tokens[0]] = $tokens[1];
				
			// 			debug($tokens);
				
		}//foreach ($lo_Lines_File_Dat as $line)
		
// 		debug($lo_Keywords);

		/********************
		 * step : 4
		 * 		return
		 ********************/
		$valOf_Ret = $lo_Keywords;
		
		// return
		return $valOf_Ret;
		
	}//tasks_26_Gen_Combined_Trade_Result_List__Get_Keyword_List() {
	
	/********************
	 * tasks_26_Gen_Combined_Trade_Result_List
	 *
	 * 	at : 2020/05/19 19:02:57
	 *
	 * @return :
	
	 ********************/
	public function
	tasks_26_Gen_Combined_Trade_Result_List() {
		//_20200519_190242:caller
		//_20200519_190247:head
		//_20200519_190250:wl
		/********************
		 * step : 1 : 1
		 * 		prep : vars
		 ********************/
		/********************
		 * step : 2
		 * 		get : list of keywords
		 ********************/
		$dpath_File_Dat = "C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\data\data_fx";
		$fname_File_Dat = "data_gen_combined_list.dat";
		
		$lo_Keywords = $this->tasks_26_Gen_Combined_Trade_Result_List__Get_Keyword_List(
					
				$dpath_File_Dat
				, $fname_File_Dat
				
				);
// 		$lo_Keywords = $this->tasks_26_Gen_Combined_Trade_Result_List__Get_Keyword_List();

		/********************
		 * step : 3
		 * 		build : url
		 ********************/
		$url = "http://localhost/Eclipse_Luna/Cake_IFM11/fx_utilities/util_3__Gen_Trading_Result_List?"
				. "param_Dpath_File_Tickets_Data="
						. $lo_Keywords['param_Dpath_File_Tickets_Data']
// 				. "\&"
				. "&#38;"
				. "param_Fname_File_Tickets_Data="
						. $lo_Keywords['param_Fname_File_Tickets_Data']
// 				. "&"
				. "&#38;"
				. "param_Fname_File_Statement="
						. $lo_Keywords['param_Fname_File_Statement']
				;
		
		$url = "<a href='$url' target='_blank'>$url</a>";
		
		debug("\$url = " . $url);
		
// 		debug($lo_Keywords);
		
		
		/********************
		 * set : view vals : 1
		 * 		current time
		 ********************/
		$time_Current = Utils::get_CurrentTime();
		
		$this->set("time_Current", $time_Current);
		
		/********************
		 * set : view vals : 2
		 * 		message
		********************/
		$tmp_str = "tasks_26_Gen_Combined_Trade_Result_List ==> comp.";
		$tmp_str .= "<br>";
		
		$tmp_str .= "setup file : ";
		$tmp_str .= join(DS, array($dpath_File_Dat, $fname_File_Dat));
		$tmp_str .= "<br>";
		
		$tmp_str .= "dpath for gen-ed file : " . $lo_Keywords['param_Dpath_File_Tickets_Data'];
		
		
		
		// url
// 		$tmp_str .= $this->Url->build($url, true);
// 		$tmp_str = $url;
// 		$tmp_str .= $url;
// 		$tmp_str .= "<br>";
		
		
		$this->set("message", $tmp_str);
// 		$this->set("message", $tmp_str);
		
		// url
		$this->set("url", $url);
		
	}//tasks_26_Gen_Combined_Trade_Result_List

	
	/********************
	 * build_URL__Get_Url()
	 * 	at : 2020/09/27 11:07:24
	 * 	[25] res free# JVEMV6 44#6.2_X / 44. currency / 6. obs / 2. demo result data / 20200927_110318
	 * 
	 * dummy url : 
	 * 			http://localhost/Eclipse_Luna/Cake_IFM11/fx_utilities/tasks_50_Gen_URL_For_Combined_Trade_Result_List?param_NameOf_Dir=20200909_115319[eap-2.id-1].[AUDJPY-5].dir
	 * 
	 ********************/
	function
	build_URL__Get_Url($dpath_File_Tickets_Data_, $nameOf_Dir_, $dpath_File_Statement_) {
//caller:20200927_111759
//head:20200927_111804
//wl:20200927_111808
				/********************
			* step : 1 : 1
			* 		get : strings
			********************/
		$nameOf_TicketsData_Log_File	= "";
	
		$nameOf_Statement_File		= "";
		
		$strOf_url_Main = "http://localhost/Eclipse_Luna/Cake_IFM11/fx_utilities/util_3__Gen_Trading_Result_List";

		// dir fullpath
		$dpath_Target = $dpath_File_Tickets_Data_ . "\\" . $nameOf_Dir_;
		
		/********************
		 * step : 1 : 1 : 2
		 * 		validate : dir path
		 ********************/
		if (is_dir($dpath_Target) === false) {
		
			//debug
			debug("ERROR : \$dpath_Target ==> not a dir : $dpath_Target");
					
			return  -1;
			
		}//if ($nameOf_TicketsData_Log_File == "")
		
		/********************
		 * step : 1 : 2
		 * 		strings : file names
		 ********************/
		// prep
		$handleOf_Dir = opendir($dpath_File_Tickets_Data_ . "\\" . $nameOf_Dir_);
		
// 		debug("\$dpath_File_Tickets_Data_ ==> " . $dpath_File_Tickets_Data_);
		
		// tickets log
		while (($file = readdir($handleOf_Dir)) !== false){
			
			// judge : tickets-data
			if (Utils::in_String($file, "(tickets-data)")) {
			
				$nameOf_TicketsData_Log_File = $file;
			
// 				debug("tickets log ==> found : " . $file);
				
			}//if (Utils::in_String($file, "(tickets-data)")) {
			
			// judge : statement file
			if (Utils::in_String($file, "DetailedStatement")
					
					&& Utils::in_String($file, ".htm")
					
					) {
			
				$nameOf_Statement_File = $file;
			
// 				debug("statement file ==> found : " . $file);
				
				
			}//if (Utils::in_String($file, "(tickets-data)")) {
			
		}
		
		closedir($handleOf_Dir);
		
		/********************
		 * step : 1 : 3
		 * 		validate
		 ********************/
		if ($nameOf_TicketsData_Log_File == "") {
		
			//debug
			debug("ERROR : \$nameOf_TicketsData_Log_File ==> blank");
					
			return  -1;
			
		}//if ($nameOf_TicketsData_Log_File == "")
		
		if ($nameOf_Statement_File == "") {
		
			//debug
			debug("ERROR : \$nameOf_Statement_File ==> blank");
					
			return  -1;
			
		}//if ($nameOf_TicketsData_Log_File == "")
		
		/********************
			* step : 2
			* 		build : url
			********************/
		$strOf_url = $strOf_url_Main
				. "?param_Dpath_File_Tickets_Data=" . $dpath_File_Tickets_Data_
						. "\\"
						. $nameOf_Dir_
						
					."&param_Fname_File_Tickets_Data=" . $nameOf_TicketsData_Log_File
						
					."&param_Fname_File_Statement=" . $nameOf_Statement_File
						
					."&param_Dpath_File_Statement="
						. $dpath_File_Statement_
						. "\\"
						. $nameOf_Dir_;
	
		// return
		return $strOf_url;
				
	}//build_URL__Get_Url
	
	/********************
	 * build_URL()
	 * 	at : 2020/09/25 11:48:20
	 * 	[2] res free# JVEMV6 44#TASKS_49 / 44. currency / TASKS-49. combined-list-gen-stats / 20200925_105653
	 * 
	 * dummy url : 
	 * 			http://localhost/Eclipse_Luna/Cake_IFM11/fx_utilities/tasks_50_Gen_URL_For_Combined_Trade_Result_List?param_NameOf_Dir=20200909_115319[eap-2.id-1].[AUDJPY-5].dir
	 * 
	 ********************/
	function
	build_URL($aryOf_Dir_Names_) {
//caller:20200926_112330
//head:20200926_112333
//wl:20200926_112336

				/********************
			* step : 1 : 1
			* 		get : strings
			********************/
		//next:20200926_172225
		
		//next:20200925_120949
		$dpath_File_Tickets_Data = "C:\\Users\\iwabuchiken\\AppData\\Roaming\\MetaQuotes\\Terminal"
						."\\34B08C83A5AAE27A4079DE708E60511E\\MQL4\\Files\\Logs";
		
		$dpath_File_Statement = $dpath_File_Tickets_Data;

		// dir name
		@$query_Param_NameOf_Dir = $this->request->query[CONS::$param_NameOf_Dir];
		
		
		
// 		$nameOf_Dir					= "20200909_115319[eap-2.id-1].[AUDJPY-5].dir";
		
// 		if ($query_Param_NameOf_Dir == null) {
		
// 			$nameOf_Dir					= "20200909_115319[eap-2.id-1].[AUDJPY-5].dir";
		
// 			debug("\$query_Param_NameOf_Dir ==> null ~~> use default dir name");
			
// 		} else {
		
// 			$nameOf_Dir					= $query_Param_NameOf_Dir;
			
// 			debug("\$nameOf_Dir ==> set to : $nameOf_Dir");
			
// 		}//if ($query_Param_NameOf_Dir == null)
		
		/********************
		* step : 2
		* 		get : url
		********************/
		//code:20200930_161257
		//code:20200927_111940
		$aryOf_SetOf_Url_and_Dirname = array();
		
		$aryOf_Urls = array();

// 		// dummy
// 		$aryOf_Dir_Names_ = array(
				
// 				"20200909_115319[eap-2.id-1].[AUDJPY-5].dir"
// 				, "20200910_093548[eap-2.id-1].[AUDJPY-5].dir"
				
// 		);
		
		// get urls
		foreach ($aryOf_Dir_Names_ as $name) {
		
			//fix:20200927_114737
			$tmp = $this->build_URL__Get_Url($dpath_File_Tickets_Data, $name, $dpath_File_Statement);
// 			$tmp = $this->build_URL__Get_Url($dpath_File_Tickets_Data, $name, $dpath_File_Statement);
// 			$tmp = $this->build_URL__Get_Url($dpath_File_Tickets_Data, $nameOf_Dir, $dpath_File_Statement);
			
// 			//debug:20200930_160627
// 			debug("\$name => " . $name);
			
// 			debug("url ==> " . $tmp);
			
			
			// append
			if ($tmp != -1) {
			
				array_push($aryOf_SetOf_Url_and_Dirname, array($name, $tmp));
				
				array_push($aryOf_Urls, $tmp);
				
			}//if ($tmp != -1)
			
		}//foreach ($aryOf_Dir_Names_ as $name)
		
// 		debug("\$aryOf_Urls =>");
// 		debug($aryOf_Urls);
// // 		debug("\$aryOf_Dir_Names_ =>");
// // 		debug($aryOf_Dir_Names_);

// 		//debug
// 		debug("\$aryOf_SetOf_Url_and_Dirname =>");
// 		debug($aryOf_SetOf_Url_and_Dirname);
		// 		(int) 3 => array(
		// 				(int) 0 => '20200917_082627[eap-2.id-1].[AUDJPY-5].dir',
		// 				(int) 1 => 'http://localhost/Eclipse_Luna/Cake_IFM11/fx_utilities/util_3__Gen_Trading_Result_List?param_Dpath_File_Tickets_Data=C:\Users\iwabuchiken\AppData\Roaming\MetaQuotes\Terminal\34B08C83A5AAE27A4079DE708E60511E\MQL4\Files\Logs\20200917_082627[eap-2.id-1].[AUDJPY-5].dir&param_Fname_File_Tickets_Data=[ea-4_tester-1].(20200917_082627).(tickets-data).log&param_Fname_File_Statement=DetailedStatement.[m5].[20200921_154212].htm&param_Dpath_File_Statement=C:\Users\iwabuchiken\AppData\Roaming\MetaQuotes\Terminal\34B08C83A5AAE27A4079DE708E60511E\MQL4\Files\Logs\20200917_082627[eap-2.id-1].[AUDJPY-5].dir'
		// 		),
		/********************
		* step : 3
		* 		return
		********************/
		// set vars
		$valOf_Ret = $aryOf_SetOf_Url_and_Dirname;
// 		$valOf_Ret = $aryOf_Urls;
// 		$valOf_Ret = $aryOf_Dir_Names_;

		// return
		return $valOf_Ret;
	
	}//build_URL
	
	
	/********************
	 * tasks_50_Gen_URL_For_Combined_Trade_Result_List__Get_Dir_List
	 *
	 * 	at : 2020/09/28 10:47:16
	 *
	 * @return :
	 * 		-1		list file ==> not exist
	
	 ********************/
	public function
	tasks_50_Gen_URL_For_Combined_Trade_Result_List__Get_Dir_List() {
//caller:20200928_104440
//head:20200928_104443
//wl:20200928_104447
		/********************
		 * step : 1
		 * 		prep : vars
		 ********************/
		$dpath_File_Dir_List = "C:\\WORKS_2\\WS\\WS_Others.JVEMV6\\JVEMV6\\44_currency\\10_prog-php\\2_tester";
		
		$fname_File_Dir_List = "list-of-dirs_gen-combined-list.txt";
		
		$fpath_File_Dir_List = join(DS, array($dpath_File_Dir_List, $fname_File_Dir_List));

		/********************
		 * step : 2
		 * 		validate
		 ********************/
		if (file_exists($fpath_File_Dir_List) == false) {
		
			//debug
			debug("list file ==> NOT exist : $fpath_File_Dir_List");
			
			return -1;
			
		}//if (file_exists($fpath_File_Dir_List) == true) {
		
		/********************
		 * step : 3
		 * 		get : list
		 ********************/
		/********************
		 * step : 3 : 1
		 * 		file : load content
		 ********************/
		$aryOf_File_Content = file($fpath_File_Dir_List);
		
// 		debug("\$aryOf_File_Content => ");
// 		debug($aryOf_File_Content);
		
		/********************
		 * step : 3 : 2
		 * 		lines ==> trim
		 ********************/
		//code:20200928_110737
		$aryOf_File_Content__Final = array();
		
		foreach ($aryOf_File_Content as $line) {
		
			array_push($aryOf_File_Content__Final, trim($line));
			
		}//foreach ($aryOf_File_Content as $line)
		
		/********************
		 * step : 4
		 * 		return
		 ********************/
// 		//debug:20200930_160331
// 		debug("\$aryOf_File_Content__Final =>");
// 		debug($aryOf_File_Content__Final);
		
		//
		$valOf_Ret = $aryOf_File_Content__Final;
// 		$valOf_Ret = $aryOf_File_Content;
		
		// return
		return $valOf_Ret;
		
	}//tasks_50_Gen_URL_For_Combined_Trade_Result_List__Get_Dir_List
	
	/********************
	 * tasks_26_Gen_Combined_Trade_Result_List
	 *
	 * 	at : 2020/05/19 19:02:57
	 *
	 * @return :
	
	 ********************/
	public function
	tasks_50_Gen_URL_For_Combined_Trade_Result_List() {
		//caller:20200926_154500
		//head:20200926_154503
		//wl:20200926_154506
		/********************
		 * step : 1 : 1
		 * 		prep : vars
		 ********************/
		/********************
		 * step : 2
		 * 		build : url
		 ********************/
		// dummy
		//marker:20200927_115533
		//next:20200927_115739
		$aryOf_Dir_Names = $this->tasks_50_Gen_URL_For_Combined_Trade_Result_List__Get_Dir_List();
		
// 		$aryOf_Dir_Names = array(
		
// // 				"20200909_115319[eap-2.id-1].[AUDJPY-5].dir"
				
// 				"20200910_093548[eap-2.id-1].[AUDJPY-5].dir"
				
// 				, "20200911_045656[eap-2.id-1].[AUDJPY-5].dir"
				
// 				, "20200914_094747[eap-2.id-1].[AUDJPY-5].dir"
		
// 		);
		
		// url
		//code:20200927_112725
		//caller:20200926_112330
		$url_built = $this->build_URL($aryOf_Dir_Names);
// 		$url_built = $this->build_URL();
		
// 		debug("\$url_built ==> '");
// 		debug($url_built);
// // 		debug("\$url_built ==> '" . $url_built . "'");

		/********************
		 * step : 3
		 * 		set : template vars
		 ********************/
		/********************
		 * step : 3 : 1
		 * 		url
		 ********************/
		$this->set("url_built", $url_built);

// 		debug("\$url_built => ");
// 		debug($url_built);
		
		/********************
		 * step : 3 : 2
		 * 		dir names
		 ********************/
		//code:20200927_113830
		$this->set("aryOf_Dir_Names", $aryOf_Dir_Names);

		/********************
		 * step : 3 : X
		 * 		other vars
		 ********************/
		// time
		$time_Current = Utils::get_CurrentTime();
		
		$this->set("time_Current", $time_Current);
		
	}//tasks_50_Gen_URL_For_Combined_Trade_Result_List()
	
}//class FxUtilitiesController extends AppController {

/***************************
//ref https://stackoverflow.com/questions/17391811/how-to-execute-in-php-interactive-mode
// 2020/02/05 14:54:13

<?php
	echo microtime();
?>



****************************/


// C:\Users\iwabuchiken\AppData\Roaming\MetaQuotes\Terminal\34B08C83A5AAE27A4079DE708E60511E\MQL4\Files\Logs
