<?php

/*
C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\
	=> app diretory
/cake_apps/Cake_IFM11

 * 
 * 
 */


// class ImagesController extends AppController {
// class FxEaTesterController extends AppController {
class FxTestController extends AppController {
// class FxEaTesterController extends AppController {
// class FxTesterController extends AppController {

	
// 	public $scaffold;

	//ref http://stackoverflow.com/questions/4252577/cakephp-session-cant-write answered Nov 23 '10 at 3:56
// 	public $helpers = array('Html', 'Form', 'Session');
	public $helpers = array('Html', 'Form');
// 	public $helpers = array('Html', 'Form');

	//REF http://book.cakephp.org/2.0/en/core-libraries/components/pagination.html
// 	public $components = array('Paginator', 'Session');
	public $components = array('Paginator');

// 	public function index_2() {
	public function index() {

		/******************
		 * step : 1
		 * 		prep
		 ****************/
		
		/******************
		 * step : 1.2
		 * 		prep : url params
		 ****************/
		/******************
		 * step : 1.1 : 1
		 * 		get : param
		 ****************/
		
	}//public function index()

	public function test_codes_20200205_144054() {
		//_20200205_144054:caller
		//_20200205_144056:head
		//_20200205_144059:wl
		
		$st = microtime();
		
		list($msec, $usec) = explode(" ", $st);
		
		$val_Msec = (float) $msec;
		$val_Usec = (int) $usec;
		
		debug("\$val_Usec = $val_Usec / \$val_Msec = $val_Msec (\$val_Msec + 3 = " . ($val_Msec + 3));
		
		debug("\$val_Usec + \$val_Msec = " . ($val_Usec + $val_Msec));
		
		
	}
	
	/********************
	* fx_tester_T_1__Order_Buy
	* 	at : 2020/03/29 13:08:29
	********************/
	//_20200329_132038:tmp
	public function fx_tester_T_1__Order_Buy() {
//_20200329_130132:caller
//_20200329_130134:head
//_20200329_130139:wl

		/********************
		 * step : 0 : 0
		 * 		prep : log file name
		 ********************/
		//"log_fx_admin.log"
		$tokensOf_fname_Log = explode(".", CONS::$fname_Log_Fx_Admin);
		
		$strOf_Time_Label = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
		
		CONS::$fname_Log_Fx_Admin = "$tokensOf_fname_Log[0].[tester_T_1]"
		. "." . "($strOf_Time_Label)"
		. "." . $tokensOf_fname_Log[1];
		
		/********************
		 * step : 0 : 0 : A : 1
		 * 	params
		********************/
		//_20200528_140405:ref
		@$query_tag_TA_Fx_Test_Index_Tester_1 = $this->request->query[CONS::$param_Val_TA_Fx_Test_Index_Tester_1];
		
		// 				[0] => (AUDJPY)
		// 				[1] => (M5)
		// 				[2] => 20200227_131436
		// 				[3] => [20200115_0005-20200115_2355]
		// 				[4] => csv
		
		$tokens = explode(".", $query_tag_TA_Fx_Test_Index_Tester_1);
		
		
		/********************
		 * step : 0 : 1
		 * 		prep : log dir
		********************/
		//_20200201_161421:tmp
		$tmp_Dpath_Log_Fx_Admin__orig = CONS::$dpath_Log_Fx_Admin;
		
		CONS::$dpath_Log_Fx_Admin .= "/"
				. "log."
				. $strOf_Time_Label
				. "." . $tokens[0]
				. "." . $tokens[1]
				. "." . $tokens[3]
				. ".dir"
				// 								. $strOf_Time_Label . ".dir"
		;
		
		/********************
		 * step : 0 : 0 : -1
		 * 		prep : time
		 ********************/
		// measrue time
		//ref https://stackoverflow.com/questions/6245971/accurate-way-to-measure-execution-times-of-php-scripts
		$time_Start = microtime();
		$time_Start_In_Float = Utils::conv_Microtime_to_Float($time_Start);
		
		$time_Start_In_TimeLabel = Utils::conv_Float_to_TimeLabel_2($time_Start_In_Float);
		// 		$time_Start_In_TimeLabel = Utils::conv_Float_to_TimeLabel($time_Start_In_Float);
		
		// 		$time_Start = microtime(true);
		
		$msg = "----------------------------";
		$msg .= "\n";
		$msg .= "time start : $time_Start_In_TimeLabel (float = $time_Start_In_Float)";
		$msg .= "\n";
		
		//debug : write
		$fname = CONS::$fname_Log_Fx_Admin;
		// 		$fname = CONS::$fname_Log_Fx_Admin . CONS::$fname_Log_Fx_Admin__List_Of_Pos__Suffix;
		
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, $fname
				, $msg, __FILE__, __LINE__);
		
		// 		/********************
		// 		 * step : 0 : 0 : A : 1
		// 		 * 	params
		// 		 ********************/
		// 		@$query_tag_TA_Fx_Test_Index_Tester_1 = $this->request->query[CONS::$param_Val_TA_Fx_Test_Index_Tester_1];
		
		// 		@$query_tag_TA_Fx_Test_Index_Tester_1 = $this->request->query['_txtOf_tag_TA_Fx_Test_Index_Tester_1'];
		
		// 		$msg = "\$query_tag_TA_Fx_Test_Index_Tester_1 => " . $query_tag_TA_Fx_Test_Index_Tester_1;
		// 		$msg .= "\n";
		
		// 		debug($msg);
		
		// 		return ;
		
		// 		Utils::write_Log__Fx_Admin(
		// 				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
		// 				, $msg, __FILE__, __LINE__);
		
		/********************
		 * step : 0 : 1
		 * 	debug
		********************/
		$msg = "\n";
		$msg .= "\n";
		$msg .= "******************************** fx_tester_T_1() "
				. "["
				. Utils::get_CurrentTime()
				. "] "
						. "********************************";
		$msg .= "\n";
		$msg .= "\n";
		
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
				, $msg, __FILE__, __LINE__);
		
		/******************** (20 '*'s)
		 * step : 1
		 * 	prep : BarData
		 *
		********************/
		/******************** (20 '*'s)
		 * step : 1 : 1
		 get : list of bardatas
		 *
		********************/
		/********************
		 * step : 1 : 1.1
		 get : list
		********************/
		//_20200212_132137:tmp
		$_dpath_File_CSV = CONS::$dpath_FX_Tester_CSV_File;
		
		//_20200227_142412:next
		$_fname_File_CSV = $query_tag_TA_Fx_Test_Index_Tester_1;
		// 		$_fname_File_CSV = CONS::$fname_FX_Tester_CSV_File;
		
		debug("\$_fname_File_CSV => " . $_fname_File_CSV);
		
		// 		return ;
		
		//_20200522_114017:tmp
		$lo_BarDatas = Libfx::get_ListOf_BarDatas($_dpath_File_CSV, $_fname_File_CSV);
		// 		$lo_BarDatas = Libfx::get_ListOf_BarDatas();
		
		/********************
		 * step : 1 : 1.2
		 validate
		********************/
		if ($lo_BarDatas == -1) {
		
			// message
			debug("\$lo_BarDatas ==> returned -1");
			/********************
			 * step : X
			 * 	set : values for view
			 *
			********************/
			$time_current = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
				
			// variables
			$this->set("time_current", $time_current);
				
			// layout
			$this->layout = "plain";
				
			// exit func
			return ;
				
		} else {//if ($lo_BarDatas == -1)
				
			$msg	= "(step : 1 : 1.2) Libfx::get_ListOf_BarDatas() ==> returned valid";
			$msg	.= "Libfx::get_ListOf_BarDatas() ==> returned : len is " . count($lo_BarDatas);
			$msg	.= "\n";
		
			Utils::write_Log__Fx_Admin(
					CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
					, $msg, __FILE__, __LINE__);
		
		}//if ($lo_BarDatas == -1)
		
		//debug
		//_20200119_183513:tmp
		$msg = "\n";
		$msg .= "\$lo_BarDatas[0]->dateTime\t" . $lo_BarDatas[0]->dateTime;
		$msg .= "\n";
		$msg .= "\$lo_BarDatas[count(\$lo_BarDatas) - 1]->dateTime\t" . $lo_BarDatas[count($lo_BarDatas) - 1]->dateTime;
		$msg .= "\n";
		
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
				, $msg, __FILE__, __LINE__);
		
		//_20200119_184045:next
		$lo_BarDatas = Libfx::reverse_LO_BarDatas($lo_BarDatas, CONS::$strOf_Sort_Direction_LO_BarDatas__ASC);
		
		//debug
		$msg = "\n";
		$msg .= "sorting ==> comp";
		$msg .= "\n";
		$msg .= "\$lo_BarDatas[0]->dateTime\t" . $lo_BarDatas[0]->dateTime;
		$msg .= "\n";
		$msg .= "\$lo_BarDatas[count(\$lo_BarDatas) - 1]->dateTime\t" . $lo_BarDatas[count($lo_BarDatas) - 1]->dateTime;
		$msg .= "\n";
		
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
				, $msg, __FILE__, __LINE__);
		
		/********************
		 * step : 2
		 tester ==> exec
		********************/
		/********************
		 * step : 2 : 0
		 prep : vars
		********************/
		// stopper ==> while loop
		$num_Loop_Stopper = 3;
		
		// len : bardatas
		$lenOf_LO_BarDatas = count($lo_BarDatas);
		
		// counter
		$cntOf_While = 0;
		//_20200128_173447:marker
		$maxOf_While_Loop = $lenOf_LO_BarDatas - $num_Loop_Stopper;
		// 		$maxOf_While_Loop = 3;
		// 		$maxOf_While_Loop = 5;
		
		// list
		$lo_Pos = array();
		
		// 		/********************
		// 		 * step : 2 : 0.1
		// 		 		list of pos : meta, header
		// 		 ********************/
		// 		$nameOf_DP = CONS::$strOf_DetectPattern_Name__DP_All;
		
		// 		$msg = LibEaTester::show_LO_Pos_Data__Build_Lines__MetaData_and_Header(
		// 				$lo_Pos, $lo_BarDatas
		// 				, $nameOf_DP
		// 				, $_dpath_File_CSV, $_fname_File_CSV
		// 		);
		// 		// 		$msg = LibEaTester::show_LO_Pos_Data__Build_Lines($lo_Pos, $lo_BarDatas);
		
		// 		//debug : write
		// 		$fname = CONS::$fname_Log_Fx_Admin . CONS::$fname_Log_Fx_Admin__List_Of_Pos__Suffix;
		
		// 		Utils::write_Log__Fx_Admin(
		// 				CONS::$dpath_Log_Fx_Admin, $fname
		// 				, $msg, __FILE__, __LINE__);
		
		/********************
		 * step : 2 : 0.2
		 while
		********************/
		// num of loop start
		//_20200121_170907:tmp
		$num_Loop_Start = CONS::$numOf_While_Loop_Start;
		// 		$num_Loop_Start = 0;
		
		//debug
		$msg	= "\$num_Loop_Start = " . $num_Loop_Start;
		$msg	.= "\n";
			
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
				, $msg, __FILE__, __LINE__);
		
		
		while (true) {
				
			//_20200222_192407:next
			/********************
			 * step : 2 : 1
			 exec
			 ********************/
			//_20200308_150453:tmp
			//_20200201_160828:caller
			$valOf_Ret__received = LibEaTester::fx_tester_T_1__Exec($lo_BarDatas, $num_Loop_Start);
				
			/********************
			 * step : 2 : 2
			 unpack ==> received vals
			********************/
			// unpack
			$flg_Position	= $valOf_Ret__received[0];
			$pos			= $valOf_Ret__received[1];
			$typeOf_Bar		= $valOf_Ret__received[2];
			$numOf_Loop		= $valOf_Ret__received[3];
				
			// 			/********************
			// 			 * step : 2 : 2.0
			// 			 		$pos ==> to file
			// 			 ********************/
			// 			$msg_tmp = LibEaTester::show_LO_Pos_Data__Build_Lines__Entries($pos, $lo_BarDatas);
		
			// 			//debug : write
			// 			$fname = CONS::$fname_Log_Fx_Admin . CONS::$fname_Log_Fx_Admin__List_Of_Pos__Suffix;
				
			// 			$flg_Add_File_Line = false;
				
			// 			Utils::write_Log__Fx_Admin(
			// 					CONS::$dpath_Log_Fx_Admin, $fname
			// 					, $msg_tmp, __FILE__, __LINE__, $flg_Add_File_Line);
		
			/********************
			 * step : 2 : 2.1
			received vals ==> to list
			********************/
			array_push($lo_Pos, $pos);
				
			/********************
			 * step : 2 : 3
			 log
			********************/
			//debug
			$msg = "(controller::fx_tester_T_1 : step : D : 1 : 2-4 : 2)";
			$msg .= "\n";
				
			$msg .= "tester ==> exec ==> comp";
			$msg .= "\n";
		
			$msg .= "\$flg_Position\t" . (($flg_Position == true ? "true" : "false"))
			. "\n";
				
			$msg .= "\$typeOf_Bar\t" . $typeOf_Bar
			. "\n";
				
			$msg .= "\$pos->st_idx\t" . $pos->st_idx
			. "\n";
			$msg .= "\$lo_BarDatas[\$pos->st_idx]->dateTime\t" . $lo_BarDatas[$pos->st_idx]->dateTime
			. "\n";
		
			$msg .= "\$numOf_Loop\t" . $numOf_Loop
			. "\n";
				
			$msg .= "\n";
				
			Utils::write_Log__Fx_Admin(
					CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
					, $msg, __FILE__, __LINE__);
		
			/********************
			 * step : 2 : 4
			 counter
			********************/
			//_20200118_155832:next
			$cntOf_While += 1;
				
			/********************
			 * step : 2 : 5
			 stopper
			 ********************/
			//_20200122_182820:next
			if ($cntOf_While >= $maxOf_While_Loop) {
					
				$msg = "\$cntOf_While\t" . $cntOf_While
				. " / "
						. "\$maxOf_While_Loop\t" . $maxOf_While_Loop
						. "\n";
		
				$msg .= "breaking the while loop...";
				$msg .= "\n";
		
				Utils::write_Log__Fx_Admin(
						CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
						, $msg, __FILE__, __LINE__);
		
				// break
				break;
		
			}//if ($cntOf_While >= $maxOf_While_Loop)
		
			/********************
			 * step : 2 : 6
			 update ==> $_num_Loop_Start
			 ********************/
			/********************
			 * step : 2 : 6.1
			 log
			 ********************/
			//_20200121_171609:tmp
			$num_Latest_Pos_Start_Idx = $pos->st_idx;
		
			//debug
			$msg = "\$num_Latest_Pos_Start_Idx\t" . $num_Latest_Pos_Start_Idx;
			$msg .= "\n";
				
			/********************
			 * step : 2 : 6.2
			 update
			 ********************/
			//debug
			$msg .= "\$num_Loop_Start (current)\t" . $num_Loop_Start;
			$msg .= "\n";
				
			// update
			$num_Loop_Start = $num_Latest_Pos_Start_Idx + 1;
		
			//debug
			$msg .= "\$num_Loop_Start (updated)\t" . $num_Loop_Start;
			$msg .= "\n";
		
			Utils::write_Log__Fx_Admin(
					CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
					, $msg, __FILE__, __LINE__);
		
		}//while (true) {
		
		/********************
		 * step : 3
		 post-while
		 ********************/
		/********************
		 * step : 3 : 1
		 log
		 ********************/
		//debug
		$msg = "(step : 3 : 1) while ==> comp";
		$msg .= "\n";
			
		$msg .= "count(\$lo_Pos)\t" . count($lo_Pos);
		$msg .= "\n";
			
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
				, $msg, __FILE__, __LINE__);
		
		/********************
		 * step : 3 : 2
		 debug : list of "pos"-s
		********************/
		//_20200130_181154:caller
		//_20200212_124817:tmp
		$nameOf_DP = CONS::$strOf_DetectPattern_Name__DP_All;
		
		//_20200222_182249:tmp
		//_20200130_181154:caller
		$msg = LibEaTester::show_LO_Pos_Data__Build_Lines(
				$lo_Pos, $lo_BarDatas
				, $nameOf_DP
				, $_dpath_File_CSV, $_fname_File_CSV
		);
		// 		$msg = LibEaTester::show_LO_Pos_Data__Build_Lines($lo_Pos, $lo_BarDatas);
		
		//debug : write
		$fname = CONS::$fname_Log_Fx_Admin . CONS::$fname_Log_Fx_Admin__List_Of_Pos__Suffix;
		
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, $fname
				, $msg, __FILE__, __LINE__);
		
		/********************
		 * step : 3 : 2.2
		 debug : list of "pos"-s ==> filtered
		 ==> same ext_idx --> omitted
		********************/
		//_20200310_142830:next
		//_20200311_141839:caller
		$lo_Pos__Filtered = LibEaTester::filter_LO_Pos__No_Dup($lo_Pos, $lo_BarDatas);
		// 		$lo_Pos__Filtered = LibEaTester::filter_LO_Pos__No_Dup($lo_Pos);
		
		//debug
		$msg = "fx_tester_T_1 (step : 3 : 2.2)";
		$msg .= "\n";
			
		$msg .= "count(\$lo_Pos__Filtered) = ". count($lo_Pos__Filtered);
		$msg .= "\n";
		$msg .= "\n";
			
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
				, $msg, __FILE__, __LINE__);
		
		
		$msg = LibEaTester::show_LO_Pos_Data__Build_Lines(
				$lo_Pos__Filtered, $lo_BarDatas
				, $nameOf_DP
				, $_dpath_File_CSV, $_fname_File_CSV
		);
		// 		$msg = LibEaTester::show_LO_Pos_Data__Build_Lines($lo_Pos, $lo_BarDatas);
		
		//debug : write
		$fname = CONS::$fname_Log_Fx_Admin . CONS::$fname_Log_Fx_Admin__List_Of_Pos__Suffix__Filtered;
		
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, $fname
				, $msg, __FILE__, __LINE__);
		
		
		/********************
		 * step : X
		 * 	set : values for view
		 *
		********************/
		$time_current = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
		
		// variables
		$this->set("time_current", $time_current);
		
		// layout
		$this->layout = "plain";
		
		/********************
		 * step : X
		 * 		time
		 ********************/
		// 		$time_End = microtime(true);
		$time_End = microtime();
		$time_End_In_Float = Utils::conv_Microtime_to_Float($time_End);
		$time_End_In_TimeLabel = Utils::conv_Float_to_TimeLabel($time_End_In_Float);
		
		$time_End_In_TimeLabel_2 = Utils::conv_Float_to_TimeLabel_2($time_End_In_Float, 6);
		// 		$time_End_In_TimeLabel_2 = Utils::conv_Float_to_TimeLabel_2($time_End_In_Float);
		// 		$time_End_In_TimeLabel_2 = date('Y/m/d H:i:s', floor($time_End_In_Float));;
		
		//ref https://stackoverflow.com/questions/16825240/how-to-convert-microtime-to-hhmmssuu
		$time_elapsed_In_Float = $time_End_In_Float - $time_Start_In_Float;
		$time_elapsed_In_TimeLabel = Utils::conv_Float_to_TimeLabel($time_elapsed_In_Float);
		// 		$time_elapsed_In_Float = $time_End - $time_Start;
		
		
		$msg = "-----------------------------------";
		$msg .= "\n";
		$msg .= "time end : $time_End / float = $time_End_In_Float / time label = $time_End_In_TimeLabel"
		. " / label 2 = $time_End_In_TimeLabel_2"
		;
		$msg .= "\n";
		
		$msg .= "elapsed : " . $time_elapsed_In_TimeLabel;
		// 		$msg .= "time end : $time_End (elapsed : " . Utils::conv_Microtime_to_TimeLabel($time_elapsed) . ")";
		$msg .= "\n";
		
		//debug : write
		$fname = CONS::$fname_Log_Fx_Admin;
		// 		$fname = CONS::$fname_Log_Fx_Admin . CONS::$fname_Log_Fx_Admin__List_Of_Pos__Suffix;
		
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, $fname
				, $msg, __FILE__, __LINE__);
		
		/********************
		 * step : X
		 * 	set : CONS::$dpath_Log_Fx_Admin
		 *
		********************/
		// log file dir ==> back to orig
		CONS::$dpath_Log_Fx_Admin = $tmp_Dpath_Log_Fx_Admin__orig;
		
	}//public function fx_tester_T_1__Order_Buy()
	
	/********************
	* fx_tester_T_1__Order_Buy__V2
	* 	at : 2020/05/28 13:20:24
	********************/
	//_20200329_132038:tmp
	public function fx_tester_T_1__Order_Buy__V2() {
//_20200528_132029:caller
//_20200528_132032:head
//_20200528_132036:wl

		//_20200528_140426:tmp
		/********************
		 * step : 0 : 0 : A : 1
		 * 	params
		 ********************/
		//_20200528_140405:ref
// 		@$query_tag_TA_Fx_Test_Index_Tester_1 = $this->request->query[CONS::$param_Val_TA_Fx_Test_Index_Tester_1];
		@$query_Tester_T_1__Source_CSV_File_Name = $this->request->query[CONS::$param_Tester_T_1__Source_CSV_File_Name];
		
		// 				[0] => (AUDJPY)
		// 				[1] => (M5)
		// 				[2] => 20200227_131436
		// 				[3] => [20200115_0005-20200115_2355]
		// 				[4] => csv
		
		// default
		$fname_Source_CSV__Default = "(slice-by-day).(AUDJPY-M5).(2020-05-13).(20200527_095823_351450).csv";
		
		
		if ($query_Tester_T_1__Source_CSV_File_Name == null) {
		
			debug("\$query_Tester_T_1__Source_CSV_File_Name => null");
			
			$fname_Source_CSV = $fname_Source_CSV__Default;
			
		} else if (preg_match("/.+\..+\..+/", $query_Tester_T_1__Source_CSV_File_Name, $matches) == 1) {//if ($query_Tester_T_1__Source_CSV_File_Name == null)
			
			debug("\$query_Tester_T_1__Source_CSV_File_Name ==> match : $query_Tester_T_1__Source_CSV_File_Name");
			
			$fname_Source_CSV = $query_Tester_T_1__Source_CSV_File_Name;
			
		} else {//if ($query_Tester_T_1__Source_CSV_File_Name == null)

			debug("\$query_Tester_T_1__Source_CSV_File_Name ==> NOT match !!" 
					. " : $query_Tester_T_1__Source_CSV_File_Name"
					. "\n"
					. "using the default csv file name => $fname_Source_CSV__Default"
					);
			
			$fname_Source_CSV = $fname_Source_CSV__Default;
// 			$fname_Source_CSV = $query_Tester_T_1__Source_CSV_File_Name;
			
		}//if ($query_Tester_T_1__Source_CSV_File_Name == null)
		
		$tokens = explode(".", $fname_Source_CSV);
// 		$tokens = explode(".", $query_tag_TA_Fx_Test_Index_Tester_1);
		
		debug("\$tokens =>");
		debug($tokens);
		
		
		//_20200528_140148:tmp
		/********************
		 * step : 0 : 1
		 * 		prep : log dir
		 ********************/
		// time label
		$strOf_Time_Label = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
		
		//_20200201_161421:tmp
		$tmp_Dpath_Log_Fx_Admin__orig = CONS::$dpath_Log_Fx_Admin;
		
// 		CONS::$dpath_Log_Fx_Admin .= "/"
// 				. "log."
// 				. $strOf_Time_Label
// 				. "." . $tokens[0]
// 				. "." . $tokens[1]
// 				. "." . $tokens[3]
// 				. ".dir";
		
		/********************
		 * step : 0 : 0
		 * 		prep : log file name
		 ********************/
		//"log_fx_admin.log"
// 		$tokensOf_fname_Log = "log_Tester_1__Order_Buy__V2";
// 		$tokensOf_fname_Log = "log_Tester";
// 		$tokensOf_fname_Log = explode(".", CONS::$fname_Log_Fx_Admin);
		
// 		debug("\$tokensOf_fname_Log =>");
// 		debug($tokensOf_fname_Log);
		
// 		$strOf_Time_Label = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
		
// 		CONS::$fname_Log_Fx_Admin = "$tokensOf_fname_Log[0].[tester_T_1]"
		CONS::$fname_Log_Fx_Tester = 
				CONS::$fname_Log_Fx_Tester__Trunk 
				. "." . "(T-1).(Order-Buy-V2)"
				. "." . "($strOf_Time_Label)"
				. CONS::$fname_Log_Fx_Tester__Ext;
// 		. "." . $tokensOf_fname_Log[1];
		
		//debug
		debug("CONS::\$fname_Log_Fx_Tester => " . CONS::$fname_Log_Fx_Tester);
		
		/********************
		 * step : 0 : 0 : A : 1
		 * 	params
		********************/
		
		/********************
		 * step : 0 : 0 : -1
		 * 		prep : time
		 ********************/
		// measrue time
		//ref https://stackoverflow.com/questions/6245971/accurate-way-to-measure-execution-times-of-php-scripts
		$time_Start = microtime();
		$time_Start_In_Float = Utils::conv_Microtime_to_Float($time_Start);
		
		$time_Start_In_TimeLabel = Utils::conv_Float_to_TimeLabel_2($time_Start_In_Float);
		
		
		/********************
		 * step : 0 : 1
		 * 	debug
		********************/
		
		/******************** (20 '*'s)
		 * step : 1
		 * 	prep : BarData
		 *
		********************/
		/******************** (20 '*'s)
		 * step : 1 : 1
		 get : list of bardatas
		 *
		********************/
		/********************
		 * step : 1 : 1.1
		 get : list
		********************/
		
		/********************
		 * step : 1 : 1.2
		 validate
		********************/
		
		/********************
		 * step : 2
		 tester ==> exec
		********************/
		/********************
		 * step : 2 : 0
		 prep : vars
		********************/
		
		/********************
		 * step : 2 : 0.2
		 while
		********************/
		
		/********************
		 * step : 3
		 post-while
		 ********************/
		
		
		/********************
		 * step : X
		 * 	set : values for view
		 *
		********************/
		$time_current = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
		
		// variables
		$this->set("time_current", $time_current);
		
		// layout
		$this->layout = "plain";
		
		/********************
		 * step : X
		 * 		time
		 ********************/
		// 		$time_End = microtime(true);
		$time_End = microtime();
		$time_End_In_Float = Utils::conv_Microtime_to_Float($time_End);
		$time_End_In_TimeLabel = Utils::conv_Float_to_TimeLabel($time_End_In_Float);
		
		$time_End_In_TimeLabel_2 = Utils::conv_Float_to_TimeLabel_2($time_End_In_Float, 6);
		// 		$time_End_In_TimeLabel_2 = Utils::conv_Float_to_TimeLabel_2($time_End_In_Float);
		// 		$time_End_In_TimeLabel_2 = date('Y/m/d H:i:s', floor($time_End_In_Float));;
		
		//ref https://stackoverflow.com/questions/16825240/how-to-convert-microtime-to-hhmmssuu
		$time_elapsed_In_Float = $time_End_In_Float - $time_Start_In_Float;
		$time_elapsed_In_TimeLabel = Utils::conv_Float_to_TimeLabel($time_elapsed_In_Float);

		//debug
		debug("\$time_elapsed_In_TimeLabel => $time_elapsed_In_TimeLabel");
		
		/********************
		 * step : X
		 * 	set : CONS::$dpath_Log_Fx_Admin
		 *
		********************/
		
	}//public function fx_tester_T_1__Order_Buy__V2() {
	
	/********************
	* fx_tester_T_1
	* 	at : (before) 2020/01/06 13:09:11
	********************/
// 	public function fx_tester_T_1_TMP() {
	public function fx_tester_T_1() {
		//_20200106_130954:caller
		//_20200106_130959:head
		//_20200106_131002:wl
		
// 		//test
// 		$this->test_codes_20200205_144054();
		
// 		return ;

		/********************
		 * step : 0 : -1
		 * 		dispatch : BUY, SELL
		 ********************/
		/********************
		 * step : 0 : -1.1
		 * 		param
		 ********************/
		//_20200329_123400:tmp
		@$query_Order_Genre = $this->request->query[CONS::$param_Tester_T_1__Order_Genre];
		
		if ($query_Order_Genre == null) {
		
			debug("\$query_Order_Genre => null");
			
			$query_Order_Genre = CONS::$param_Tester_T_1__Order_Genre__BUY;
			
			debug("\$query_Order_Genre : deault --> set : " . $query_Order_Genre);
		
		} else if ($query_Order_Genre == CONS::$param_Tester_T_1__Order_Genre__BUY) {
			
			debug("\$query_Order_Genre => BUY : " . $query_Order_Genre);
			
		} else if ($query_Order_Genre == CONS::$param_Tester_T_1__Order_Genre__SELL) {
			
			debug("\$query_Order_Genre => SELL : " . $query_Order_Genre);
			
		} else {
		
			debug("\$query_Order_Genre => unknown : " . $query_Order_Genre);
			
		}//if ($query_Order_Genre == null)

		/********************
		 * step : 0 : -1.2
		 * 		dispatch
		 ********************/
		if ($query_Order_Genre == CONS::$param_Tester_T_1__Order_Genre__BUY) {
		
			debug("calling --> fx_tester_T_1__Order_Buy");
			
			$this->fx_tester_T_1__Order_Buy();
			
		} else if ($query_Order_Genre == CONS::$param_Tester_T_1__Order_Genre__SELL) {
			
			debug("calling --> fx_tester_T_1__Order_Sell");
		
		} else {
		
			debug("calling --> NOT");
			
		}//if ($query_Order_Genre == CONS::$param_Tester_T_1__Order_Genre__BUY)
		
		// debug
		return ;
		
	}//public function fx_tester_T_1() {

	/********************
	* fx_tester_T_1
	* 	at : (before) 2020/01/06 13:09:11
	********************/
	public function fx_tester_T_1_DEPRECATED() {
// 	public function fx_tester_T_1() {
		//_20200106_130954:caller
		//_20200106_130959:head
		//_20200106_131002:wl
		
// 		//test
// 		$this->test_codes_20200205_144054();
		
// 		return ;

		/********************
		 * step : 0 : 0
		 * 		prep : log file name
		 ********************/
		//"log_fx_admin.log"
		$tokensOf_fname_Log = explode(".", CONS::$fname_Log_Fx_Admin);
		
		$strOf_Time_Label = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
		
		CONS::$fname_Log_Fx_Admin = "$tokensOf_fname_Log[0].[tester_T_1]" 
								. "." . "($strOf_Time_Label)"
								. "." . $tokensOf_fname_Log[1];

		/********************
		 * step : 0 : 0 : A : 1
		 * 	params
		 ********************/
		@$query_tag_TA_Fx_Test_Index_Tester_1 = $this->request->query[CONS::$param_Val_TA_Fx_Test_Index_Tester_1];

		// 				[0] => (AUDJPY)
		// 				[1] => (M5)
		// 				[2] => 20200227_131436
		// 				[3] => [20200115_0005-20200115_2355]
		// 				[4] => csv
		
		$tokens = explode(".", $query_tag_TA_Fx_Test_Index_Tester_1);
		
		
		/********************
		 * step : 0 : 1
		 * 		prep : log dir
		 ********************/
		//_20200201_161421:tmp
		$tmp_Dpath_Log_Fx_Admin__orig = CONS::$dpath_Log_Fx_Admin;
		
		CONS::$dpath_Log_Fx_Admin .= "/"
								. "log."
								. $strOf_Time_Label 
								. "." . $tokens[0]
								. "." . $tokens[1]
								. "." . $tokens[3]
								. ".dir"
// 								. $strOf_Time_Label . ".dir"
								;
								
		/********************
		 * step : 0 : 0 : -1
		 * 		prep : time
		 ********************/
		// measrue time
		//ref https://stackoverflow.com/questions/6245971/accurate-way-to-measure-execution-times-of-php-scripts
		$time_Start = microtime();
		$time_Start_In_Float = Utils::conv_Microtime_to_Float($time_Start);
		
		$time_Start_In_TimeLabel = Utils::conv_Float_to_TimeLabel_2($time_Start_In_Float);
// 		$time_Start_In_TimeLabel = Utils::conv_Float_to_TimeLabel($time_Start_In_Float);
		
// 		$time_Start = microtime(true);
		
		$msg = "----------------------------";
		$msg .= "\n";
		$msg .= "time start : $time_Start_In_TimeLabel (float = $time_Start_In_Float)";
		$msg .= "\n";
		
		//debug : write
		$fname = CONS::$fname_Log_Fx_Admin;
		// 		$fname = CONS::$fname_Log_Fx_Admin . CONS::$fname_Log_Fx_Admin__List_Of_Pos__Suffix;
		
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, $fname
				, $msg, __FILE__, __LINE__);
		
// 		/********************
// 		 * step : 0 : 0 : A : 1
// 		 * 	params
// 		 ********************/
// 		@$query_tag_TA_Fx_Test_Index_Tester_1 = $this->request->query[CONS::$param_Val_TA_Fx_Test_Index_Tester_1];

// 		@$query_tag_TA_Fx_Test_Index_Tester_1 = $this->request->query['_txtOf_tag_TA_Fx_Test_Index_Tester_1'];
		
// 		$msg = "\$query_tag_TA_Fx_Test_Index_Tester_1 => " . $query_tag_TA_Fx_Test_Index_Tester_1;
// 		$msg .= "\n";
		
// 		debug($msg);
		
// 		return ;
		
// 		Utils::write_Log__Fx_Admin(
// 				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
// 				, $msg, __FILE__, __LINE__);
		
		/********************
		 * step : 0 : 1
		 * 	debug
		 ********************/
		$msg = "\n";
		$msg .= "\n";
		$msg .= "******************************** fx_tester_T_1() "
				. "[" 
				. Utils::get_CurrentTime()
				. "] "
				. "********************************";
		$msg .= "\n";
		$msg .= "\n";
		
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
				, $msg, __FILE__, __LINE__);
		
		/******************** (20 '*'s)
		 * step : 1
		 * 	prep : BarData
		 *
		 ********************/
		/******************** (20 '*'s)
		 * step : 1 : 1
		 	get : list of bardatas
		 *
		 ********************/
		/********************
		 * step : 1 : 1.1
		 	get : list
		 ********************/
		//_20200212_132137:tmp
		$_dpath_File_CSV = CONS::$dpath_FX_Tester_CSV_File;
		
		//_20200227_142412:next
		$_fname_File_CSV = $query_tag_TA_Fx_Test_Index_Tester_1;
// 		$_fname_File_CSV = CONS::$fname_FX_Tester_CSV_File;
		
		debug("\$_fname_File_CSV => " . $_fname_File_CSV);
		
// 		return ;
		
		$lo_BarDatas = Libfx::get_ListOf_BarDatas($_dpath_File_CSV, $_fname_File_CSV);
// 		$lo_BarDatas = Libfx::get_ListOf_BarDatas();
		
		/********************
		 * step : 1 : 1.2
		 	validate
		 ********************/
		if ($lo_BarDatas == -1) {
		
			// message
			debug("\$lo_BarDatas ==> returned -1");
			/********************
			 * step : X
			 * 	set : values for view
			 *
			 ********************/
			$time_current = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
			
			// variables
			$this->set("time_current", $time_current);
			
			// layout
			$this->layout = "plain";
			
			// exit func
			return ;
			
		} else {//if ($lo_BarDatas == -1)
			
			$msg	= "(step : 1 : 1.2) Libfx::get_ListOf_BarDatas() ==> returned valid";
			$msg	.= "Libfx::get_ListOf_BarDatas() ==> returned : len is " . count($lo_BarDatas);
			$msg	.= "\n";
				
			Utils::write_Log__Fx_Admin(
					CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
					, $msg, __FILE__, __LINE__);
				
		}//if ($lo_BarDatas == -1)
		
		//debug
		//_20200119_183513:tmp
		$msg = "\n";
		$msg .= "\$lo_BarDatas[0]->dateTime\t" . $lo_BarDatas[0]->dateTime;
		$msg .= "\n";
		$msg .= "\$lo_BarDatas[count(\$lo_BarDatas) - 1]->dateTime\t" . $lo_BarDatas[count($lo_BarDatas) - 1]->dateTime;
		$msg .= "\n";
		
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
				, $msg, __FILE__, __LINE__);
		
		//_20200119_184045:next
		$lo_BarDatas = Libfx::reverse_LO_BarDatas($lo_BarDatas, CONS::$strOf_Sort_Direction_LO_BarDatas__ASC);
		
		//debug
		$msg = "\n";
		$msg .= "sorting ==> comp";
		$msg .= "\n";
		$msg .= "\$lo_BarDatas[0]->dateTime\t" . $lo_BarDatas[0]->dateTime;
		$msg .= "\n";
		$msg .= "\$lo_BarDatas[count(\$lo_BarDatas) - 1]->dateTime\t" . $lo_BarDatas[count($lo_BarDatas) - 1]->dateTime;
		$msg .= "\n";
		
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
				, $msg, __FILE__, __LINE__);
		
		/********************
		 * step : 2
		 		tester ==> exec
		 ********************/
		/********************
		 * step : 2 : 0
		 		prep : vars
		 ********************/
		// stopper ==> while loop
		$num_Loop_Stopper = 3;
		
		// len : bardatas
		$lenOf_LO_BarDatas = count($lo_BarDatas);
		
		// counter
		$cntOf_While = 0;
		//_20200128_173447:marker
		$maxOf_While_Loop = $lenOf_LO_BarDatas - $num_Loop_Stopper;
// 		$maxOf_While_Loop = 3;
// 		$maxOf_While_Loop = 5;
		
		// list
		$lo_Pos = array();
		
// 		/********************
// 		 * step : 2 : 0.1
// 		 		list of pos : meta, header
// 		 ********************/
// 		$nameOf_DP = CONS::$strOf_DetectPattern_Name__DP_All;
		
// 		$msg = LibEaTester::show_LO_Pos_Data__Build_Lines__MetaData_and_Header(
// 				$lo_Pos, $lo_BarDatas
// 				, $nameOf_DP
// 				, $_dpath_File_CSV, $_fname_File_CSV
// 		);
// 		// 		$msg = LibEaTester::show_LO_Pos_Data__Build_Lines($lo_Pos, $lo_BarDatas);
		
// 		//debug : write
// 		$fname = CONS::$fname_Log_Fx_Admin . CONS::$fname_Log_Fx_Admin__List_Of_Pos__Suffix;
		
// 		Utils::write_Log__Fx_Admin(
// 				CONS::$dpath_Log_Fx_Admin, $fname
// 				, $msg, __FILE__, __LINE__);
		
		/********************
		 * step : 2 : 0.2
		 		while
		 ********************/
		// num of loop start
		//_20200121_170907:tmp
		$num_Loop_Start = CONS::$numOf_While_Loop_Start;
// 		$num_Loop_Start = 0;

		//debug
		$msg	= "\$num_Loop_Start = " . $num_Loop_Start;
		$msg	.= "\n";
			
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
				, $msg, __FILE__, __LINE__);
		
		
		while (true) {
			
			//_20200222_192407:next
			/********************
			 * step : 2 : 1
			 		exec
			 ********************/
			//_20200308_150453:tmp
			//_20200201_160828:caller
			$valOf_Ret__received = LibEaTester::fx_tester_T_1__Exec($lo_BarDatas, $num_Loop_Start);
			
			/********************
			 * step : 2 : 2
			 		unpack ==> received vals
			 ********************/
			// unpack
			$flg_Position	= $valOf_Ret__received[0];
			$pos			= $valOf_Ret__received[1];
			$typeOf_Bar		= $valOf_Ret__received[2];
			$numOf_Loop		= $valOf_Ret__received[3];
			
// 			/********************
// 			 * step : 2 : 2.0
// 			 		$pos ==> to file
// 			 ********************/
// 			$msg_tmp = LibEaTester::show_LO_Pos_Data__Build_Lines__Entries($pos, $lo_BarDatas);

// 			//debug : write
// 			$fname = CONS::$fname_Log_Fx_Admin . CONS::$fname_Log_Fx_Admin__List_Of_Pos__Suffix;
			
// 			$flg_Add_File_Line = false;
			
// 			Utils::write_Log__Fx_Admin(
// 					CONS::$dpath_Log_Fx_Admin, $fname
// 					, $msg_tmp, __FILE__, __LINE__, $flg_Add_File_Line);
				
			/********************
			 * step : 2 : 2.1
			 		received vals ==> to list
			 ********************/
			array_push($lo_Pos, $pos);
			
			/********************
			 * step : 2 : 3
			 		log
			 ********************/
			//debug
			$msg = "(controller::fx_tester_T_1 : step : D : 1 : 2-4 : 2)";
			$msg .= "\n";
			
			$msg .= "tester ==> exec ==> comp";
			$msg .= "\n";
				
			$msg .= "\$flg_Position\t" . (($flg_Position == true ? "true" : "false"))
					. "\n";
			
			$msg .= "\$typeOf_Bar\t" . $typeOf_Bar
					. "\n";
			
			$msg .= "\$pos->st_idx\t" . $pos->st_idx
							. "\n";
			$msg .= "\$lo_BarDatas[\$pos->st_idx]->dateTime\t" . $lo_BarDatas[$pos->st_idx]->dateTime
									. "\n";

			$msg .= "\$numOf_Loop\t" . $numOf_Loop
					. "\n";
			
			$msg .= "\n";
			
			Utils::write_Log__Fx_Admin(
			CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
			, $msg, __FILE__, __LINE__);

			/********************
			 * step : 2 : 4
			 		counter
			 ********************/
			//_20200118_155832:next
			$cntOf_While += 1;
			
			/********************
			 * step : 2 : 5
			 		stopper
			 ********************/
			//_20200122_182820:next
			if ($cntOf_While >= $maxOf_While_Loop) {
			
				$msg = "\$cntOf_While\t" . $cntOf_While
					. " / "
					. "\$maxOf_While_Loop\t" . $maxOf_While_Loop
					. "\n";
				
				$msg .= "breaking the while loop...";
				$msg .= "\n";
				
				Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
				, $msg, __FILE__, __LINE__);
				
				// break
				break;
				
			}//if ($cntOf_While >= $maxOf_While_Loop)

			/********************
			 * step : 2 : 6
			 		update ==> $_num_Loop_Start
			 ********************/
			/********************
			 * step : 2 : 6.1
			 		log
			 ********************/
			//_20200121_171609:tmp
			$num_Latest_Pos_Start_Idx = $pos->st_idx;

			//debug
			$msg = "\$num_Latest_Pos_Start_Idx\t" . $num_Latest_Pos_Start_Idx;
			$msg .= "\n";
			
			/********************
			 * step : 2 : 6.2
			 		update
			 ********************/
			//debug
			$msg .= "\$num_Loop_Start (current)\t" . $num_Loop_Start;
			$msg .= "\n";
			
			// update
			$num_Loop_Start = $num_Latest_Pos_Start_Idx + 1;

			//debug
			$msg .= "\$num_Loop_Start (updated)\t" . $num_Loop_Start;
			$msg .= "\n";
				
			Utils::write_Log__Fx_Admin(
					CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
					, $msg, __FILE__, __LINE__);
				
		}//while (true) { 
		
		/********************
		 * step : 3
		 		post-while
		 ********************/
		/********************
		 * step : 3 : 1
		 		log
		 ********************/
		//debug
		$msg = "(step : 3 : 1) while ==> comp";
		$msg .= "\n";
			
		$msg .= "count(\$lo_Pos)\t" . count($lo_Pos);
		$msg .= "\n";
			
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
				, $msg, __FILE__, __LINE__);
		
		/********************
		 * step : 3 : 2
		 		debug : list of "pos"-s
		 ********************/
		//_20200130_181154:caller
		//_20200212_124817:tmp
		$nameOf_DP = CONS::$strOf_DetectPattern_Name__DP_All;
		
		//_20200222_182249:tmp
		//_20200130_181154:caller
		$msg = LibEaTester::show_LO_Pos_Data__Build_Lines(
							$lo_Pos, $lo_BarDatas
							, $nameOf_DP
							, $_dpath_File_CSV, $_fname_File_CSV
						);
// 		$msg = LibEaTester::show_LO_Pos_Data__Build_Lines($lo_Pos, $lo_BarDatas);
		
		//debug : write
		$fname = CONS::$fname_Log_Fx_Admin . CONS::$fname_Log_Fx_Admin__List_Of_Pos__Suffix;
		
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, $fname
				, $msg, __FILE__, __LINE__);

		/********************
		 * step : 3 : 2.2
		 debug : list of "pos"-s ==> filtered
		 	==> same ext_idx --> omitted
		 ********************/
		//_20200310_142830:next
		//_20200311_141839:caller
		$lo_Pos__Filtered = LibEaTester::filter_LO_Pos__No_Dup($lo_Pos, $lo_BarDatas);
// 		$lo_Pos__Filtered = LibEaTester::filter_LO_Pos__No_Dup($lo_Pos);
		
		//debug
		$msg = "fx_tester_T_1 (step : 3 : 2.2)";
		$msg .= "\n";
			
		$msg .= "count(\$lo_Pos__Filtered) = ". count($lo_Pos__Filtered);
		$msg .= "\n";
		$msg .= "\n";
			
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
				, $msg, __FILE__, __LINE__);
		
		
		$msg = LibEaTester::show_LO_Pos_Data__Build_Lines(
				$lo_Pos__Filtered, $lo_BarDatas
				, $nameOf_DP
				, $_dpath_File_CSV, $_fname_File_CSV
		);
		// 		$msg = LibEaTester::show_LO_Pos_Data__Build_Lines($lo_Pos, $lo_BarDatas);
		
		//debug : write
		$fname = CONS::$fname_Log_Fx_Admin . CONS::$fname_Log_Fx_Admin__List_Of_Pos__Suffix__Filtered;
		
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, $fname
				, $msg, __FILE__, __LINE__);
		
		
		/********************
		 * step : X
		 * 	set : values for view
		 *
		 ********************/
		$time_current = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
		
		// variables
		$this->set("time_current", $time_current);
		
		// layout
		$this->layout = "plain";
		
		/********************
		 * step : X
		 * 		time
		 ********************/
// 		$time_End = microtime(true);
		$time_End = microtime();
		$time_End_In_Float = Utils::conv_Microtime_to_Float($time_End);
		$time_End_In_TimeLabel = Utils::conv_Float_to_TimeLabel($time_End_In_Float);
		
		$time_End_In_TimeLabel_2 = Utils::conv_Float_to_TimeLabel_2($time_End_In_Float, 6);
// 		$time_End_In_TimeLabel_2 = Utils::conv_Float_to_TimeLabel_2($time_End_In_Float);
// 		$time_End_In_TimeLabel_2 = date('Y/m/d H:i:s', floor($time_End_In_Float));;
		
		//ref https://stackoverflow.com/questions/16825240/how-to-convert-microtime-to-hhmmssuu
		$time_elapsed_In_Float = $time_End_In_Float - $time_Start_In_Float;
		$time_elapsed_In_TimeLabel = Utils::conv_Float_to_TimeLabel($time_elapsed_In_Float);
// 		$time_elapsed_In_Float = $time_End - $time_Start;
		
		
		$msg = "-----------------------------------";
		$msg .= "\n";
		$msg .= "time end : $time_End / float = $time_End_In_Float / time label = $time_End_In_TimeLabel"
				. " / label 2 = $time_End_In_TimeLabel_2"
				;
		$msg .= "\n";
		
		$msg .= "elapsed : " . $time_elapsed_In_TimeLabel;
// 		$msg .= "time end : $time_End (elapsed : " . Utils::conv_Microtime_to_TimeLabel($time_elapsed) . ")";
		$msg .= "\n";
		
		//debug : write
		$fname = CONS::$fname_Log_Fx_Admin;
// 		$fname = CONS::$fname_Log_Fx_Admin . CONS::$fname_Log_Fx_Admin__List_Of_Pos__Suffix;
		
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, $fname
				, $msg, __FILE__, __LINE__);
		
		/********************
		 * step : X
		 * 	set : CONS::$dpath_Log_Fx_Admin
		 *
		 ********************/
		// log file dir ==> back to orig
		CONS::$dpath_Log_Fx_Admin = $tmp_Dpath_Log_Fx_Admin__orig;
		
	}//public function fx_tester_T_1() {

	//_20200104_163637:next

	/********************
	 * 
	 * fx_tester_T_1_V2
	 * 	at : 2020/05/27 10:23:18
	 * 
	 ********************/
	// 	public function fx_tester_T_1_TMP() {
	public function fx_tester_T_1_V2() {
		//_20200527_102334:caller
		//_20200527_102338:head
		//_20200527_102341:wl
	
		/********************
		 * step : 0 : -1
		 * 		dispatch : BUY, SELL
		 ********************/
		/********************
		 * step : 0 : -1.1
		 * 		param
		 ********************/
		@$query_Order_Genre = $this->request->query[CONS::$param_Tester_T_1__Order_Genre];
		
		/********************
		 * step : 0 : -1.2
		 * 		dispatch
		 ********************/
		if ($query_Order_Genre == CONS::$param_Tester_T_1__Order_Genre__BUY) {
	
			debug("calling --> fx_tester_T_1__Order_Buy");
			
			//_20200527_103506:next
// 			$this->fx_tester_T_1__Order_Buy();
			//_20200528_132029:caller
			$this->fx_tester_T_1__Order_Buy__V2();
				
		} else if ($query_Order_Genre == CONS::$param_Tester_T_1__Order_Genre__SELL) {
				
			debug("calling --> fx_tester_T_1__Order_Sell");
	
		} else {
	
			debug("calling --> NOT : " . (($query_Order_Genre == null) ? 
							"\$query_Order_Genre => null" : $query_Order_Genre));
// 			debug("calling --> NOT");
				
		}//if ($query_Order_Genre == CONS::$param_Tester_T_1__Order_Genre__BUY)
	
		
		/********************
		 * step : X
		 * 	set : values for view
		 *
		 ********************/
		$time_current = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
		
		// variables
		$this->set("time_current", $time_current);
		
		// layout
		$this->layout = "plain";
		
		// debug
		return ;
	
	}//public function fx_tester_T_1_V2() {
	
	
}//class FxTesterController extends AppController {

/***************************
//ref https://stackoverflow.com/questions/17391811/how-to-execute-in-php-interactive-mode
// 2020/02/05 14:54:13

<?php
	echo microtime();
?>



****************************/