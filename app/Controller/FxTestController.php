<?php

/*
C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\
	=> app diretory
/cake_apps/Cake_IFM11

 * 
 * 
 */

require_once 'C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/fx/PD.php';

require_once 'C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/fx/lib_ea_tester_2.php';

// $val_TP			= 0.10;
// $val_SL			= 0.05;
// $val_SPREAD		= 0.03;

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
		
		/******************
		 * step : X
		 * 		set : vars for ==> view (simple)
		 ****************/
		$lo_URLs = array(
				
				array(
					"44#10.2.2 : tester_1__V2"
					, "http://localhost/Eclipse_Luna/Cake_IFM11/fx_test/fx_tester_T_1_V2"
						. "?_Tester_T_1__Order_Genre=_Tester_T_1__Order_Genre__BUY"
						. "&Tester_T_1__Source_CSV_File_Name=(slice-by-day).(AUDJPY-M5).(2020-05-13)"
							. ".(20200530_134010_951771).csv"
						. "&Tester_T_1__Source_CSV_Dpath="
							. "C:\\WORKS_2\\WS\\WS_Others.prog\\prog\\D-7\\2_2\\VIRTUAL\\Admin_Projects\\curr\\data\\csv_raw"
							. "\(slice-by-day).(AUDJPY-M5).(2020-05-13_2020-05-21).(20200530_134010_951771)")
				
		);
		
		
		$this->set("lo_URLs", $lo_URLs);
		
		/******************
		 * step : X
		 * 		view
		 ****************/
		$path_View = "index_simple";
		$path_Layout = "plain";
		
		debug("rendering... $path_View");
		
		//ref https://duckduckgo.com/?q=cake+php+different+view&t=opera&ia=web&iai=r1-0&page=1&adx=prdsdb&sexp=%7B"v7exp"%3A"a"%2C"sltexp"%3A"b"%2C"prodexp"%3A"a"%2C"prdsdexp"%3A"b"%2C"rgiexp"%3A"b"%2C"bfexp"%3A"b"%7D
		$this->render($path_View, $path_Layout);
		
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
	 * fx_tester_T_1__Order_Buy__V2__Log_Dir
	 * 	at : 2020/05/29 18:35:46
	 ********************/
	//_20200329_132038:tmp
	public function 
	fx_tester_T_1__Order_Buy__V2__Log_Dir
	($_tokens, $_strOf_Time_Label, $_strOf_Tester_Name) {
		//_20200529_182757:caller
		//_20200529_182802:head
		//_20200529_182806:wl

		/********************
		 * step : 0 : 1 : 1
		 * 		prep
		 ********************/
		// time label
		$_strOf_Time_Label = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
		
		//_20200529_181231:tmp
		$dpath_Log_Fx_Tester = CONS::$dpath_Log_Fx_Tester;
		
		/********************
		 * step : 0 : 1 : 2
		 * 		build path
		 ********************/
		$strOf_Tester_Name = $_strOf_Tester_Name;
// 		$strOf_Tester_Name = "tester-1_v2";
		
		$dname_Log_Tester = "($strOf_Tester_Name)."
		. $_tokens[1]
		. "."
				. $_tokens[2]
				. "(" . $_strOf_Time_Label . ")"
						. ".log";
		
// 		debug("\$dname_Log_Tester => $dname_Log_Tester");
		
		// dpath
		$dpath_Log_Fx_Tester__Full = join(DIRECTORY_SEPARATOR, array($dpath_Log_Fx_Tester, $dname_Log_Tester));
		
		/********************
		 * step : 0 : 1 : 3
		 * 		gen : dir
		********************/
		if (!file_exists($dpath_Log_Fx_Tester__Full)) {
		
			$result_bool = mkdir($dpath_Log_Fx_Tester__Full, $mode=0777, $recursive=true);
				
			debug(($result_bool == true) ?
					"dir created => $dpath_Log_Fx_Tester__Full"
					: "dir NOT created!! ==> $dpath_Log_Fx_Tester__Full");
		
		} else {
				
			debug("dir exists => $dpath_Log_Fx_Tester__Full");
				
		}//if (!file_exists($dpath_Sliced_Files__Eigen)) {

		/********************
		 * step : X
		 * 		return
		 ********************/
		/********************
		 * step : X : 1
		 * 		prep
		 ********************/
		$valOf_Ret = array($dpath_Log_Fx_Tester__Full, $dpath_Log_Fx_Tester, $dname_Log_Tester);
		
		/********************
		 * step : X : 2
		 * 		return
		 ********************/
		// return
		return $valOf_Ret;
		
	}//fx_tester_T_1__Order_Buy__V2__Log_Dir

	/********************
	 * fx_tester_T_1__Order_Buy__V2__Params
	 * 	at : 2020/05/29 18:35:15
	 ********************/
	//_20200329_132038:tmp
	public function 
	fx_tester_T_1__Order_Buy__V2__Params() {
		//_20200528_132029:caller
		//_20200528_132032:head
		//_20200528_132036:wl

		/********************
		 * step : 1
		 * 		param : CONS::$param_Tester_T_1__Source_CSV_File_Name
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
				
// 			debug("\$query_Tester_T_1__Source_CSV_File_Name ==> match : $query_Tester_T_1__Source_CSV_File_Name");
				
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

		/********************
		 * step : 2
		 * 		param : CONS::$param_Tester_T_1__Source_CSV_File_Name
		 ********************/
		@$query_Tester_T_1__Source_CSV_Dpath = $this->request->query[CONS::$param_Tester_T_1__Source_CSV_Dpath];
		
		// 				[0] => (AUDJPY)
		// 				[1] => (M5)
		// 				[2] => 20200227_131436
		// 				[3] => [20200115_0005-20200115_2355]
		// 				[4] => csv
		
		// default
		//C:\WORKS_2\WS\WS_Others.prog\prog\D-7\2_2\VIRTUAL\Admin_Projects\curr\data\csv_raw\(slice-by-day).(AUDJPY-M5).(2020-05-13_2020-05-21).(20200530_132553_216136)
		$dpath_Source_CSV__Default = "C:\\WORKS_2\\WS\\WS_Others.prog\\prog\\D-7\\2_2\\VIRTUAL\\Admin_Projects\\curr\\data\\csv_raw\\(slice-by-day).(AUDJPY-M5).(2020-05-13_2020-05-21).(20200530_132553_216136)";		

		if ($query_Tester_T_1__Source_CSV_Dpath == null) {
		
			debug("\$query_Tester_T_1__Source_CSV_Dpath => null");
		
			$dpath_Source_CSV = $dpath_Source_CSV__Default;
		
		} else {//if ($query_Tester_T_1__Source_CSV_File_Name == null)
		
		
			$dpath_Source_CSV = $query_Tester_T_1__Source_CSV_Dpath;
// 			$dpath_Source_CSV = $dpath_Source_CSV__Default;
		
		}//if ($query_Tester_T_1__Source_CSV_File_Name == null)
		
		/********************
		 * step : X
		 * 		return
		 ********************/
		/********************
		 * step : X : 1
		 * 		prep
		 ********************/
		$valOf_Ret = array($fname_Source_CSV, $dpath_Source_CSV);
		
		/********************
		 * step : X : 2
		 * 		return
		 ********************/
		// return
		return $valOf_Ret;
				
	}//fx_tester_T_1__Order_Buy__V2__Params
	
	/********************
	* fx_tester_T_1__Order_Buy__V2__For_Loop
	* 	at : 2020/06/01 09:37:30
	* 
	* @return
	* 		$valOf_Ret = array($cntOf_Loop, $i);
	* 
	********************/
	public function
	fx_tester_T_1__Order_Buy__V2__For_Loop(

				$idxOf_ForLoop_Start, $_lo_BarDatas
				, $_nameOf_DP
				, $_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
			
			) {
//_20200601_093740:caller
//_20200601_093744:head
//_20200601_093747:wl

		/********************
		 * step : 1
		 * 		prep : vars
		 ********************/
		// len
		$lenOf_LO_BarDatas = count($_lo_BarDatas);
		
		// flags
		$flag_Pattern_Detected	= false;
		
		$flag_Position_Taken	= false;
		
		// stopper
		$maxOf_Loop = 10;
		
		$cntOf_Loop = 0;

		// position
		$pos = LibEaTester::init_Pos();
		
		// status : for-loop exit
		//code:20200607_153202:c
		$statusOf_For_Loop_Exit = 0;
		
		// status : for-loop execution
		//	e.g.
		//		"complete/j3-3:N:3" (status string / location id label)
		$statusOf_For_Loop_Execution = 0;
		
		/********************
		 * step : 2
		 * 		for-loop
		 ********************/
		$i = $idxOf_ForLoop_Start;
		
		//debug:20200601_094308
		$msg = "(for-loop)(step : 2)";
		$msg .= "\n";
		
		$msg .= "for-loop starting at the index of : $idxOf_ForLoop_Start";
		$msg .= "\n";
		
// 		debug($msg);
		
		Utils::write_Log__Fx_Admin(
				$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
				, $msg, __FILE__, __LINE__);
		
		for (; $i < $lenOf_LO_BarDatas; $i++) {
			
			
			/********************
			 * step : 2 : 0
			 * 		prep
			 ********************/
			// bardata
			$bardata_This = $_lo_BarDatas[$i];
			
			/********************
			 * step : 2 : 0 : 0
			 * 		log
			 ********************/
// 			$msg = "========================================[loop : $i";	// "=" x 40
			$msg = "===================================[for-loop : $i";	// "=" x 35
			$msg .= "\n";
			
			Utils::write_Log__Fx_Admin(
					$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
					, $msg, __FILE__, __LINE__);

			/********************
			 * step : 2 : 0 : 1
			 * 		stopper
			 ********************/
			if ($cntOf_Loop > $maxOf_Loop) {
			
				$msg = "(for)(step : 2 : 0 : 1)";
				$msg .= "for-loop ==> maxed : count = $cntOf_Loop / max = $maxOf_Loop";
				$msg .= "\n";
				
				$msg .= "breaking from the for loop...";
				$msg .= "\n";
				
				Utils::write_Log__Fx_Admin(
						$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
						, $msg, __FILE__, __LINE__);
				
				// break
				break;
				
			}//if ($cntOf_Loop > $maxOf_Loop)
					
			/********************
			 * step : 2 : 0 : X
			 * 		vars
			 ********************/
			$bardata = $_lo_BarDatas[$i];
			
			/********************
			 * step : 2 : j1
			 * 		position ==> taken ?
			 ********************/
			/********************
			 * step : 2 : j1 : 1
			 * 		conditions : position ==> taken?
			 ********************/
			$cond_1__Position_Taken = ($flag_Position_Taken == true);
			
			if ($cond_1__Position_Taken == true) {
				/********************
				 * step : 2 : j1 : Y
				 * 		position ==> taken
				 ********************/
				/********************
				 * step : 2 : j1 : Y : 1
				 * 		log
				 ********************/
				$msg = "[" . basename(__FILE__) . " : " . __LINE__ . "]";
				$msg .= " ";
				
				$msg .= "(for)(step : 2 : j1 : Y : 1)";
				$msg .= "\n";
				
				$msg .= "position ==> taken";
				$msg .= "\n";
			
// 				debug($msg);
			
// 				Utils::write_Log__Fx_Admin(
// 						$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
// 						, $msg, __FILE__, __LINE__);
					

				Utils::write_Log__Fx_Admin(
						$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
						, $msg, __FILE__, __LINE__);
					
				// flash
				$msg = "";
				
				/********************
				 * step : 2 : j1 : Y : 3
				 * 		$pos ==> update
				 ********************/
				//next:20200615_141145:n
				LibEaTester_2::update_Pos(
						$bardata_This
						, $pos
						, $i
						, CONS::$strOf_Position_Type__BUY
						, $_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
				);
				
				//ref:20200613_143927:r
				$statusOf_For_Loop_Execution = CONS::$statusOf_For_Loop_Execution__J1_Y3;
// 				$msg .= "\n";
				$msg = "\n";
				
				$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
				$msg .= " ";
				
				$msg .= "(for)(step : 2 : j1 : Y : 3)";
				$msg .= "\n";
				
				$msg .= "\$pos ==> update";
				$msg .= "\n";

				//debug:20200629_153448:d
				$msg .= "\n";
				$msg .= "(debug)";
				$msg .= "\n";
				
				$msg .= sprintf("\$bardata_This->dateTime\t%s\n\$pos->cu_dateTime\t%s", $bardata_This->dateTime, $pos->cu_dateTime);
				$msg .= "\n";
				
				
				Utils::write_Log__Fx_Admin(
						$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
						, $msg, __FILE__, __LINE__);
					
				// flash
				$msg = "";
				
				$msg .= LibEaTester::show_Basic_Pos_Data__Build_Lines(
									$pos, $_lo_BarDatas, __FILE__, __LINE__);

				Utils::write_Log__Fx_Admin(
						$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
						, $msg, __FILE__, __LINE__);
					
				// flash
				$msg = "";
				
								// 				$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]"
				// 						. " (step : 2 : j2 : choice-1 : j3-3 : N : 3.1)";
					
// 				$msg .= "set ==> val : \$statusOf_For_Loop_Execution --> $statusOf_For_Loop_Execution";
				$msg = "set ==> val : \$statusOf_For_Loop_Execution --> $statusOf_For_Loop_Execution";
				$msg .= "\n";
				
				/********************
				 * step : 2 : j1 : Y : 4
				 * 		probe ==> bar result
				 ********************/
				//next:20200613_151214:n
				//caller:20200614_125632
				//$valOf_Ret = array($strOf_BarResult);
				$valOf_Ret__Recieved = LibEaTester_2::judge_Bar_SL_TP_Trail__BUY(
							$bardata
							, $pos
							, $_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester);
				
				// unpack
				$strOf_BarResult = $valOf_Ret__Recieved[0];
				
				//log
				$msg = "\n";
				$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
				$msg .= " ";
				
				$msg .= "(for)(step : 2 : j1 : Y : 4)";
				$msg .= "\n";

				//fix:20200623_110432:f
				$msg .= "bar result ==> $strOf_BarResult";
				$msg .= "\n";

				Utils::write_Log__Fx_Admin(
						$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
						, $msg, __FILE__, __LINE__);
					
				// flash
				$msg = "";
				
				//next:20200604_131159
				
				//next:20200615_164609:n
				/********************
				 * step : 2 : j4
				 * 		bar result ==> within ?
				 ********************/
				/********************
				 * step : 2 : j4 : 0 : 1
				 * 		conditions
				 ********************/
				//code:20200616_111328:c
				$cond_5__Within = ($strOf_BarResult == CONS::$strOf_BarResult__Within);
				
				//debug:20200623_110526:d
				$msg .= "//debug:20200623_110526:d";
				$msg .= "\n";
				$msg .= "\$cond_5__Within ==> " . (($cond_5__Within == true) ? "true" : "false");
// 				$msg .= "\$cond_5__Within ==> $cond_5__Within";
				$msg .= "\n";
				
				Utils::write_Log__Fx_Admin(
						$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
						, $msg, __FILE__, __LINE__);

				// flash
				$msg = "";
				
				
				
				/********************
				 * step : 2 : j4 : 0 : 2
				 * 		judge
				 ********************/
				if ($cond_5__Within == true) {
					/********************
					 * step : 2 : j4 : Y
					 * 		bar result ==> within
					 ********************/
					/********************
					 * step : 2 : j4 : Y : 1
					 * 		log
					 ********************/
					$msg = "\n";
					$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
					$msg .= " ";
					
					$msg .= "(for)(step : 2 : j4 : Y : 1)";
					$msg .= "\n";
						
					$msg .= "bar result ==> within : $strOf_BarResult";
					$msg .= "\n";
					$msg .= "\n";
						
					/********************
					 * step : 2 : j4 : Y : 2
					 * 		set ==> status
					 ********************/
					$statusOf_For_Loop_Execution = CONS::$statusOf_For_Loop_Execution__J4_Y2;
				
					/********************
					 * step : 2 : j4 : Y : 3
					 * 		continue ==> looop
					 ********************/
					//code:20200616_112306:c

					$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
					$msg .= "\n";
					
					$msg .= "(for)(step : 2 : j4 : Y : 2)";
					$msg .= "continue the loop...";
					$msg .= "\n";
					
					Utils::write_Log__Fx_Admin(
							$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
							, $msg, __FILE__, __LINE__);
					
					// flash
					$msg = "";
					
					// continue
					continue;
					
				} else {
					/********************
					 * step : 2 : j4 : N
					 * 		bar result ==> NOT within
					 ********************/
					/********************
					 * step : 2 : j4 : N : 1
					 * 		log
					 ********************/
					$msg = "\n";
					$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
					$msg .= " ";
						
					$msg .= "(for)(step : 2 : j4 : N : 1)";
					$msg .= "\n";
					
					$msg .= "bar result ==> NOT within : $strOf_BarResult";
					$msg .= "\n";
					
					// separator
					$msg .= "\n";
						
					/********************
					 * step : 2 : j4 : N : 2
					 * 		set ==> status
					 ********************/
					$statusOf_For_Loop_Execution = CONS::$statusOf_For_Loop_Execution__J4_N2;

					//log
					Utils::write_Log__Fx_Admin(
							$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
							, $msg, __FILE__, __LINE__);
					
					// flash
					$msg = "";
					
					//next:20200618_172639:n
					/********************
					 * step : 2 : j5
					 * 		bar result ?
					 ********************/
					if ($strOf_BarResult == CONS::$strOf_BarResult__Trail) {
						/********************
						 * step : 2 : j5.1 : choice-1(Trail)
						 * 		Trail
						 ********************/
						/********************
						 * step : 2 : j5.1 : choice-1(Trail) : 1
						 * 		log
						 ********************/
						$msg = "\n";
						$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
						$msg .= " ";
						
						$msg .= "(for)(step : 2 : j5.1 : choice-1(Trail) : 1)";
						$msg .= "\n";
							
						$msg .= "bar result ==> " . CONS::$strOf_BarResult__Trail;
						$msg .= "\n";

						//debug:20200619_163356:d
// 						/********************
// 						 * step : 2 : j5.1 : choice-1(Trail) : 1
// 						 * 		log
// 						 ********************/
						$msg .= "\n";
						
						$msg .= sprintf("price_Close\t%.03f", $bardata->price_Close);
						$msg .= "\n";
						
						$msg .= sprintf("\$pos->pr_SL\t%.03f", $pos->pr_SL);
						$msg .= "\n";
						
						$msg .= sprintf("\$pos->pr_TP\t%.03f", $pos->pr_TP);
						$msg .= "\n";
						
						$msg .= sprintf("\$pos->val_Trail_Starting\t%.03f", $pos->val_Trail_Starting);
						$msg .= "\n";
						
						//code:20200620_114800:c
						// $trail_starting
						$msg .= sprintf("\$pos->trail_starting_idx\t%d", $pos->trail_starting_idx);
						$msg .= "\n";
						
						$msg .= sprintf("\$pos->trail_starting_pr\t%.03f", $pos->trail_starting_pr);
						$msg .= "\n";
						
						$msg .= sprintf("\$pos->st_pr\t%.03f (%s)", $pos->st_pr, $_lo_BarDatas[$pos->st_idx]->dateTime);
						$msg .= "\n";
						
						$price_Trail_Starting =$pos->st_pr + $pos->val_Trail_Starting + $pos->val_SPREAD; 
						
// 						$msg .= sprintf("\$pos->st_pr + \$pos->val_Trail_Starting + \$pos->val_SPREAD\t%.03f"
						$msg .= sprintf("\$price_Trail_Starting : \$pos->st_pr + \$pos->val_Trail_Starting + \$pos->val_SPREAD\t%.03f"
									, $price_Trail_Starting
								);
						$msg .= "\n";
						
						$msg .= sprintf("\$bardata->price_Close - (st_pr + val_Trail_Starting + SPREAD)\t%.03f"
									, $bardata->price_Close - ($price_Trail_Starting));
// 									, $bardata->price_Close - ($pos->st_pr + $pos->val_Trail_Starting);
						$msg .= "\n";

						/********************
						 * step : 2 : j5.1-1
						 * 		pos->SL,TP ==> update ?
						 ********************/
						$msg .= "\n";
// 						$msg = "\n";
						$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
						$msg .= " ";
						
						$msg .= "(for)(step : 2 : j5.1-1)";
// 						$msg .= "(for)(step : 2 : j5.1 : choice-1(Trail) : 2)";
						$msg .= "\n";
						
						$msg .= "pos->SL,TP ==> update ?";
						$msg .= "\n";
						
						//code:20200620_115732:c
						// judge : condition
						$difOf_Price_Close_And_Trail_Starting_Price = 
											$bardata->price_Close - $pos->trail_starting_pr;
						
						$cond_6_Trail_Update = ($difOf_Price_Close_And_Trail_Starting_Price > 0);
						
// 						//test:20200620_120258:t
// 						$cond_6_Trail_Update = false;
						
						//log
						Utils::write_Log__Fx_Admin(
								$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
								, $msg, __FILE__, __LINE__);
						
						// flash
						$msg = "";
						
						// judge
						if ($cond_6_Trail_Update == true) {
							/********************
							 * step : 2 : j5.1-1 : Y
							 * 		pos->SL,TP ==> update
							 ********************/
							/********************
							 * step : 2 : j5.1-1 : Y : 1
							 * 		log
							 ********************/
// 							$msg .= "\n";
							$msg = "\n";
							// 						$msg = "\n";
							$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
							$msg .= " ";
							
							$msg .= "(for)(step : 2 : j5.1-1 : Y : 1)";
							// 						$msg .= "(for)(step : 2 : j5.1 : choice-1(Trail) : 2)";
							$msg .= "\n";
								
							$msg .= sprintf(
									"pos->SL,TP ==> updating (\$difOf_Price_Close_And_Trail_Starting_Price\t%.03f"
									, $difOf_Price_Close_And_Trail_Starting_Price
									);
							$msg .= "\n";
							
							$pr_SL_New = $bardata->price_Close - ($pos->val_SL + $pos->val_SPREAD);
							$pr_TP_New = $bardata->price_Close + ($pos->val_TP + $pos->val_SPREAD);
							
							$msg .= sprintf("\$pr_SL_New\t%.03f", $pr_SL_New);
							$msg .= "\n";
							
							$msg .= sprintf("\$pr_TP_New\t%.03f", $pr_TP_New);
							$msg .= "\n";
							
							//next:20200620_120543:n
							/********************
							 * step : 2 : j5.1-1 : Y : 2
							 * 		$pos ==> update
							 ********************/
							//code:20200621_120039:c
							// log
							$msg .= "\n";
							// 						$msg = "\n";
							$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
							$msg .= " ";
								
							$msg .= "(for)(step : 2 : j5.1-1 : Y : 2)";
							// 						$msg .= "(for)(step : 2 : j5.1 : choice-1(Trail) : 2)";
							$msg .= "\n";
							
							$msg .= "\$pos ==> before update";
							$msg .= "\n";

							// log
							$msg .= LibEaTester::show_Basic_Pos_Data__Build_Lines(
									$pos, $_lo_BarDatas, __FILE__, __LINE__);
								
							// update
							$pos->pr_SL = $pr_SL_New;
							$pos->pr_TP = $pr_TP_New;
								
							$pos->trail_starting_idx	= $i;
							$pos->trail_starting_pr		= $bardata->price_Close;

							//next:20200628_124338:n
							
							// log
							$msg .= "\$pos ==> updated";
							$msg .= "\n";
							
							// separator
							$msg .= "\n";
								
							$msg .= LibEaTester::show_Basic_Pos_Data__Build_Lines(
											$pos, $_lo_BarDatas, __FILE__, __LINE__);
							
							/********************
							 * step : 2 : j5.1-1 : Y : 3
							 * 		set ==> loop status
							 ********************/
							//code:20200621_121020:c
							$statusOf_For_Loop_Execution = CONS::$statusOf_For_Loop_Execution__J5_1_1_Y3;
							$msg .= "\n";
							
							$msg .= "set ==> val : \$statusOf_For_Loop_Execution --> $statusOf_For_Loop_Execution";
							$msg .= "\n";

							/********************
							 * step : 2 : j5.1-1 : Y : 4
							 * 		loop ==> continue
							 ********************/
							//next:20200621_121506:n
							$msg .= "\n";
							// 						$msg = "\n";
							$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
							$msg .= " ";
								
							$msg .= "(for)(step : 2 : j5.1-1 : Y : 4)";
							// 						$msg .= "(for)(step : 2 : j5.1 : choice-1(Trail) : 2)";
							$msg .= "\n";
							
							$msg .= "continue loop...";
							$msg .= "\n";

							//log
							Utils::write_Log__Fx_Admin(
									$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
									, $msg, __FILE__, __LINE__);
							
							// flash
							$msg = "";
								
							// continue
							continue;
							
						} else {
							/********************
							 * step : 2 : j5.1-1 : N
							 * 		pos->SL,TP ==> NOT update
							 ********************/
							/********************
							 * step : 2 : j5.1-1 : N : 1
							 * 		log
							 ********************/
// 							$msg .= "\n";
							$msg = "\n";
							// 						$msg = "\n";
							$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
							$msg .= " ";
								
							$msg .= "(for)(step : 2 : j5.1-1 : N : 1)";
							// 						$msg .= "(for)(step : 2 : j5.1 : choice-1(Trail) : 2)";
							$msg .= "\n";
								
							$msg .= "pos->SL,TP ==> NOT updating";
							$msg .= "\n";
							
							$msg .= sprintf("\$difOf_Price_Close_And_Trail_Starting_Price\t%.03f"
										, $difOf_Price_Close_And_Trail_Starting_Price);
							$msg .= "\n";
							
							/********************
							 * step : 2 : j5.1-1 : N : 2
							 * 		set ==> loop status
							 ********************/
							//next:20200623_112457:n
							$statusOf_For_Loop_Execution = CONS::$statusOf_For_Loop_Execution__J5_1_1_N2;
							$msg .= "\n";
								
							$msg .= "set ==> val : \$statusOf_For_Loop_Execution --> $statusOf_For_Loop_Execution";
							$msg .= "\n";
								

							/********************
							 * step : 2 : j5.1-1 : N : 3
							 * 		continue
							 ********************/
							$msg .= "\n";
							// 						$msg = "\n";
							$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
							$msg .= " ";
							
							$msg .= "(for)(step : 2 : j5.1-1 : N : 3)";
							// 						$msg .= "(for)(step : 2 : j5.1 : choice-1(Trail) : 2)";
							$msg .= "\n";
							
							$statusOf_For_Loop_Execution = CONS::$statusOf_For_Loop_Execution__J5_1_1_N3;
							$msg .= "\n";
							
							$msg .= "set ==> val : \$statusOf_For_Loop_Execution --> $statusOf_For_Loop_Execution";
							$msg .= "\n";
								
							$msg .= "continuing...";
							$msg .= "\n";
								
							//log
							Utils::write_Log__Fx_Admin(
									$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
									, $msg, __FILE__, __LINE__);
							
							// flash
							$msg = "";

							// continue
							continue;
							
							
						}//if ($cond_6_Trail_Update == true)
						
						
// 						$msg .= "pos->SL,TP ==> updating...";
// 						$msg .= "\n";
						
// 						$pr_SL_New = $bardata->price_Close - ($pos->val_SL + $pos->val_SPREAD);
// 						$pr_TP_New = $bardata->price_Close + ($pos->val_TP + $pos->val_SPREAD);
						
// 						$msg .= sprintf("\$pr_SL_New\t%.03f", $pr_SL_New);
// 						$msg .= "\n";
						
// 						$msg .= sprintf("\$pr_TP_New\t%.03f", $pr_TP_New);
// 						$msg .= "\n";
						
						//next:20200619_170455:n
						
						
// 						$msg .= "breaking... (coding not yet)";
						$msg = "breaking... (coding not yet)";
						$msg .= "\n";
							
						Utils::write_Log__Fx_Admin(
								$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
								, $msg, __FILE__, __LINE__);
							
						// flash
						$msg = "";

						Utils::write_Log__Fx_Admin(
								$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
								, $msg, __FILE__, __LINE__);
						
						// flash
						$msg = "";
						
						break;
						
						//next:20200622_134838:n
						
					} else if ($strOf_BarResult == CONS::$strOf_BarResult__SL) {
						/********************
						 * step : 2 : j5.1-2(SL)
						 * 		SL
						 ********************/
						/********************
						 * step : 2 : j5.1-2(SL) : 1
						 * 		log
						 ********************/
						//code:20200624_172551:c
						$msg = "[" . basename(__FILE__) . " : " . __LINE__ . "]";
						$msg .= "\n";
							
						$msg .= "(for)(step : 2 : j5.1-2(SL) : 1)";
						$msg .= "\n";
						
						$difOf_Price_SL_And_Price_Start = $pos->pr_SL - $pos->st_pr;
						
						$msg .= sprintf(
								
								"\$difOf_Price_SL_And_Price_Start\t%.03f"
								, $difOf_Price_SL_And_Price_Start
								
								);

						//next:20200628_124405:n
						
						/********************
						 * step : 2 : j5.1-2(SL) : 2
						 * 		set ==> status 
						 ********************/
						//next:20200624_173926:n
						$statusOf_For_Loop_Execution = CONS::$statusOf_For_Loop_Execution__J5_1_2_2;

// 						$msg = "[" . basename(__FILE__) . " : " . __LINE__ . "]";
						$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
						$msg .= "\n";
							
						$msg .= "(for)(step : 2 : j5.1-2(SL) : 2)";
						$msg .= "\n";
						
						$msg .= "set ==> val : \$statusOf_For_Loop_Execution --> $statusOf_For_Loop_Execution";
						$msg .= "\n";						
						
						$msg .= LibEaTester::show_Basic_Pos_Data__Build_Lines(
								$pos
								, $_lo_BarDatas
								, __FILE__, __LINE__);
						
						$msg .= "breaking from for-loop... SL";
						$msg .= "\n";
							
						Utils::write_Log__Fx_Admin(
								$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
								, $msg, __FILE__, __LINE__);
							
						// flash
						$msg = "";
							
						break;
												
					} else {
						/********************
						 * step : 2 : j5 : others
						 * 		
						 ********************/
// 						$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
						$msg = "[" . basename(__FILE__) . " : " . __LINE__ . "]";
						$msg .= "\n";
							
						$msg .= "(for)(step : 2 : j5 : others)";
						$msg .= "\n";

						//debug
						
						$msg .= LibEaTester::show_Basic_Pos_Data__Build_Lines(
										$pos
										, $_lo_BarDatas
										, __FILE__, __LINE__);

						
						$msg .= "breaking... (coding not yet)";
						$msg .= "\n";
							
						Utils::write_Log__Fx_Admin(
								$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
								, $msg, __FILE__, __LINE__);
							
						// flash
						$msg = "";
							
						break;
						
					}//if ($strOf_BarResult == CONS::$strOf_BarResult__Trail)
					
// 					$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
// 					$msg .= "\n";
					
// 					$msg .= "breaking... (coding not yet)";
// 					$msg .= "\n";
					
// 					Utils::write_Log__Fx_Admin(
// 							$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
// 							, $msg, __FILE__, __LINE__);
					
// 					// flash
// 					$msg = "";
					
// 					break;
						
				}//if ($cond_5__Within == true)
				
				
// 				$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
// 				$msg .= "\n";
				
// 				$msg .= "breaking... (coding not yet)";
// 				$msg .= "\n";
				
// 				Utils::write_Log__Fx_Admin(
// 						$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
// 						, $msg, __FILE__, __LINE__);
	
// 				// flash
// 				$msg = "";

// 				break;
				
			} else {
				/********************
				 * step : 2 : j1 : N
				 * 		position ==> NOT taken
				 ********************/
				/********************
				 * step : 2 : j1 : N : 1
				 * 		log
				 ********************/
				$msg = "(for)(step : 2 : j1 : N : 1)";
				$msg .= "\n";
				
				$msg .= "position ==> NOT taken";
				$msg .= "\n";
			
				debug($msg);
			
				Utils::write_Log__Fx_Admin(
						$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
						, $msg, __FILE__, __LINE__);
				
				// flash
				$msg = "";
				
				//_20200601_101636:next
				/********************
				 * step : 2 : j2
				 * 		pattern ==> detected ?
				 ********************/
				//code:20200610_115528:c
				if ($_nameOf_DP == CONS::$nameOf_DP__Detect_All) {
// 				if (false) {
					/********************
					 * step : 2 : j2 : choice-1
					 * 		pattern ==> detected : detect all
					 ********************/
					$msg = "(for)(step : 2 : j2 : choice-1)";
					$msg .= "\n";
	
					$msg .= "detection starts...";
					$msg .= "\n";


					// result
					$resultOf_PD_dp_ALL = PD::dp_ALL();
// 					$flag_Pattern_Detected = PD::dp_ALL();
	
// 					$msg .= "result => " . (($flag_Pattern_Detected == true) ? "true" : "false");
	
// 					debug($msg);

// 					Utils::write_Log__Fx_Admin(
// 							$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
// 							, $msg, __FILE__, __LINE__);

					Utils::write_Log__Fx_Admin(
							$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
							, $msg, __FILE__, __LINE__);
					
					// flash
					$msg = "";
						
					if ($resultOf_PD_dp_ALL == true) {
						/********************
						 * step : 2 : j2 : choice-1 : Y
						 * 		pattern ==> detected
						 ********************/
						/********************
						 * step : 2 : j2 : choice-1 : Y : 1
						 * 		log
						 ********************/
						//_20200601_142250:tmp
						$msg = "(for)(step : 2 : j2 : choice-1 : Y : 1)";
						$msg .= "\n";
						$msg .= "pattern ==> detected : " . CONS::$nameOf_DP__Detect_All;
						$msg .= "\n";
					
// 						debug($msg);
					
// 						Utils::write_Log__Fx_Admin(
// 								$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
// 								, $msg, __FILE__, __LINE__);

						/********************
						 * step : 2 : j2 : choice-1 : Y : 2
						 * 		flag ==> set : true ($flag_Pattern_Detected)
						 ********************/
						$flag_Pattern_Detected = true;
						
						$msg .= "(for)(step : 2 : j2 : choice-1 : Y : 2)";
						$msg .= "\n";
						$msg .= "\$flag_Pattern_Detected ==> set to true : " . (($flag_Pattern_Detected == true) ? "true" : "false");
						$msg .= "\n";
							
						Utils::write_Log__Fx_Admin(
								$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
								, $msg, __FILE__, __LINE__);
						
						// flash
						$msg = "";
						
// 						debug($msg);

						/********************
						 * step : 2 : j2 : choice-1 : Y : 3
						 * 		position ==> init
						 ********************/
// 						/********************
// 						 * step : 2 : j2 : choice-1 : Y : 3 : 1
// 						 * 		calc
// 						 ********************/
// 						//ref //ref:20200604_122301 / LibEaTester
// 						$pr_TP			= $bd->price_Open + ($val_TP + $val_SPREAD);
// 						$pr_SL			= $bd->price_Open - ($val_SL + $val_SPREAD);
						
						/********************
						 * step : 2 : j2 : choice-1 : Y : 3 : 2
						 * 		set vals
						 ********************/
						//caller:20200604_123001
						//code:20200604_123320
// 						LibEaTester_2::set_Vals_To_Pos(
						//code:20200606_181945:c
						//debug:20200628_121707:d
						LibEaTester_2::set_Vals_To_Pos__First_Occasion(
									$pos
									, $i
									, $bardata_This
									
									, CONS::$strOf_Position_Type__BUY
									
									, CONS::$val_FxTester_TP
									, CONS::$val_FxTester_SL
									, CONS::$val_FxTester_SPREAD
									, CONS::$val_FxTester_Trail_Starting_Diff
						);
// 						LibEaTester_2::set_Vals_To_Pos($pos, $i, $bardata_This, $val_TP, $val_SL, $val_SPREAD);
						
// 						//_20200601_150706:tmp
// 						$pos->st_idx	= $i;
// 						$pos->st_pr	= $bardata_This->price_Open;
// // 						$pos['st_idx']	= $i;
// // 						$pos['st_pr']	= $bardata_This['price_Open'];
						
						//next:20200603_164949
						
						// log
// 						$msg .= LibEaTester::show_Basic_Pos_Data__Build_Lines($pos, $_lo_BarDatas, __FILE__, __LINE__);
						$msg = LibEaTester::show_Basic_Pos_Data__Build_Lines($pos, $_lo_BarDatas, __FILE__, __LINE__);
// 						$msg .= "(for)(step : 2 : j2 : choice-1 : Y : 3 : 2) set vals";
// 						$msg .= "\n";
						
// 						$msg .= sprintf("st_pr\t%.03f\t(id = %d)", $pos->st_pr, $pos->st_idx);
// // 						$msg .= "position ==> init : st_pr = " . $pos->st_pr;
// 						$msg .= "\n";
						
// 						$msg .= sprintf("cu_pr\t%.03f\t(id = %d)", $pos->cu_pr, $pos->cu_idx);
// // 						$msg .= "position ==> init : cu_pr = " . $pos->cu_pr;
// 						$msg .= "\n";
						
// 						debug($msg);

						Utils::write_Log__Fx_Admin(
								$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
								, $msg, __FILE__, __LINE__);
						
						// flash
						$msg = "";
						
						/********************
						 * step : 2 : j2 : choice-1 : Y : 4
						 * 		flag
						 ********************/
						//_20200601_151123:tmp
						$flag_Position_Taken = true;

						$msg .= "(for)(step : 2 : j2 : choice-1 : Y : 4)";
						$msg .= "\n";
						$msg .= "\$flag_Position_Taken ==> set to true : " 
									. (($flag_Position_Taken == true) ? "true" : "false");
						$msg .= "\n";

						Utils::write_Log__Fx_Admin(
								$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
								, $msg, __FILE__, __LINE__);
						
						// flash
						$msg = "";
						
// 						debug($msg);

						//code:20200604_174850
						/********************
						 * step : 2 : j2 : choice-1 : j3-1
						 * 		this bar ==> SL ?
						 ********************/
						/********************
						 * step : 2 : j2 : choice-1 : j3-1 : 1
						 * 		conditions
						 ********************/
						$cond_2__Is_SL = LibEaTester_2::is_SL(
								$bardata_This
								, $pos->pr_SL
								, CONS::$strOf_Position_Type__BUY
								, $_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
								);
// 						//log
// 						$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]\n";
						
// 						$msg .= "is_SL ==> " . (($cond_2__Is_SL == true) ? "true" : "false");
// 						$msg .= "\n";
						
// 						$msg .= sprintf(
// 									"\$bardata_This->price_Close\t%.03f\n\$pos->pr_SL\t%.03f"
// 									, $bardata_This->price_Close, $pos->pr_SL
// 								);
						
// 						$msg .= "\n";
						
						//next:20200604_181437
						/********************
						 * step : 2 : j2 : choice-1 : j3-1 : 2
						 * 		judge ==> is SL ?
						 ********************/
						if ($cond_2__Is_SL == true) {
						//test:dummy
// 						if (true) {
							/********************
							 * step : 2 : j2 : choice-1 : j3-1 : 2 : Y
							 * 		judge ==> is SL
							 ********************/
							/********************
							 * step : 2 : j2 : choice-1 : j3-1 : 2 : Y : 1
							 * 		log
							 ********************/
// 							$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]"
							$msg = "[" . basename(__FILE__) . " : " . __LINE__ . "]"
									. " (step : 2 : j2 : choice-1 : j3-1 : 2 : Y : 1)";
							$msg .= "\n";
	
							$msg .= "is_SL ==> true";
							$msg .= "\n";
	
							$msg .= sprintf(
										"\$bardata_This->price_Close\t%.03f\n\$pos->pr_SL\t%.03f"
										, $bardata_This->price_Close, $pos->pr_SL
									);
	
							$msg .= "\n";
						
							//next:20200610_122943:n
							$statusOf_For_Loop_Execution = CONS::$statusOf_For_Loop_Execution__J3bar1_Y1;
							$msg .= "\n";
							
							$msg .= "set ==> val : \$statusOf_For_Loop_Execution --> $statusOf_For_Loop_Execution";
							$msg .= "\n";
							
							$msg .= "breaking... (coding not yet)";
							$msg .= "\n";
							
							Utils::write_Log__Fx_Admin(
									$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
									, $msg, __FILE__, __LINE__);
								
							// flash
							$msg = "";
							
							break;
							
						} else {
							/********************
							 * step : 2 : j2 : choice-1 : j3-1 : 2 : N
							 * 		judge ==> is NOT SL
							 ********************/
							/********************
							 * step : 2 : j2 : choice-1 : j3-1 : 2 : N : 1
							 * 		log
							 ********************/
							$msg = "[" . basename(__FILE__) . " : " . __LINE__ . "] (step : 2 : j2 : choice-1 : j3-1 : 2 : N : 1)";
// 							$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "] (step : 2 : j2 : choice-1 : j3-1 : 2 : N : 1)";
							$msg .= "\n";
							
							$msg .= "is_SL ==> false";
							$msg .= "\n";
							
							$msg .= sprintf(
									"\$bardata_This->price_Close\t%.03f\n\$pos->pr_SL\t%.03f"
									, $bardata_This->price_Close, $pos->pr_SL
							);
							
							$msg .= "\n";
							
							// separator line
							$msg .= "\n";

							Utils::write_Log__Fx_Admin(
									$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
									, $msg, __FILE__, __LINE__);
							
							// flash
							$msg = "";
								
							/********************
							 * step : 2 : j2 : choice-1 : j3-2
							 * 		TP ?
							 ********************/
							/********************
							 * step : 2 : j2 : choice-1 : j3-2 : 1
							 * 		conditions
							 ********************/
							//code:20200605_123445
							$cond_3__Is_TP = LibEaTester_2::is_TP(
									$bardata_This
									, $pos->pr_TP
									, CONS::$strOf_Position_Type__BUY
									, $_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
							);
							
							/********************
							 * step : 2 : j2 : choice-1 : j3-2 : 2
							 * 		judge ==> is TP ?
							 ********************/
							//test:dummy
// 							if (true) {
							if ($cond_3__Is_TP == true) {
// 							if ($cond_3__Is_TP) {
								/********************
								 * step : 2 : j2 : choice-1 : j3-2 : 2 : Y
								 * 		judge ==> is TP
								 ********************/
								/********************
								 * step : 2 : j2 : choice-1 : j3-2 : 2 : Y : 1
								 * 		log
								 ********************/
// 								$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]" 
								$msg = "[" . basename(__FILE__) . " : " . __LINE__ . "]" 
										. " (step : 2 : j2 : choice-1 : j3-2 : 2 : Y : 1)";
								$msg .= "\n";
								
								$msg .= "is_TP ==> true";
								$msg .= "\n";
								
								$msg .= sprintf(
										"\$bardata_This->price_Close\t%.03f\n\$pos->pr_TP\t%.03f"
										, $bardata_This->price_Close, $pos->pr_TP
								);
								
								$msg .= "\n";
								
								//code:20200613_145831:c
								$statusOf_For_Loop_Execution = CONS::$statusOf_For_Loop_Execution__J3bar2_Y1;
								$msg .= "\n";
								
								// 				$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]"
								// 						. " (step : 2 : j2 : choice-1 : j3-3 : N : 3.1)";
									
								$msg .= "set ==> val : \$statusOf_For_Loop_Execution --> $statusOf_For_Loop_Execution";
								$msg .= "\n";
								
								$msg .= "breaking... (coding not yet)";
								$msg .= "\n";
								
								Utils::write_Log__Fx_Admin(
										$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
										, $msg, __FILE__, __LINE__);
									
								// flash
								$msg = "";
								
								break;
							
							} else {
							
								/********************
								 * step : 2 : j2 : choice-1 : j3-2 : 2 : N
								 * 		judge ==> is NOT TP
								 ********************/
								/********************
								 * step : 2 : j2 : choice-1 : j3-3 : 2 : N : 1
								 * 		log
								 ********************/
// 								$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]"
								$msg = "[" . basename(__FILE__) . " : " . __LINE__ . "]"
										. " (step : 2 : j2 : choice-1 : j3-2 : 2 : N : 1)";
								$msg .= "\n";
								
								$msg .= "is_TP ==> false";
								$msg .= "\n";
								
								$msg .= sprintf(
										"\$bardata_This->price_Close\t%.03f\n\$pos->pr_TP\t%.03f"
										, $bardata_This->price_Close, $pos->pr_TP
								);
								
								$msg .= "\n";
								
								// separator
								$msg .= "\n";
								
								Utils::write_Log__Fx_Admin(
										$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
										, $msg, __FILE__, __LINE__);
								
								// flash
								$msg = "";
								
								//next:20200606_115039:n
								/********************
								 * step : 2 : j2 : choice-1 : j3-3
								 * 		trailing ==> start ?
								 ********************/
								/********************
								 * step : 2 : j2 : choice-1 : j3-3 : 1
								 * 		conditions
								 ********************/
								$cond_4_Trailing_Start = LibEaTester_2::is_Trailing(
											$bardata_This
											, $pos
											, CONS::$strOf_Position_Type__BUY
											, $_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
										);
								//test
// 								if (true) {
								if ($cond_4_Trailing_Start == true) {
									/********************
									 * step : 2 : j2 : choice-1 : j3-3 : Y
									 * 		trailing ==> start
									 ********************/
									/********************
									 * step : 2 : j2 : choice-1 : j3-3 : Y : 1
									 * 		log
									 ********************/
// 									$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]"
									$msg = "[" . basename(__FILE__) . " : " . __LINE__ . "]"
											. " (step : 2 : j2 : choice-1 : j3-3 : Y : 1)";
									$msg .= "\n";
									
									$msg .= "is_Trailing ==> true";
									$msg .= "\n";
									
									$msg .= sprintf(
											"\$bardata_This->price_Close\t%.03f\n\$pos->trail_starting_pr\t%.03f"
											, $bardata_This->price_Close
											, $pos->st_pr + $pos->val_Trail_Starting + $pos->val_SPREAD
// 											, $bardata_This->price_Close, $pos->trail_starting_pr
									);
									
									$msg .= "\n";
								
									//code:20200613_150624:c
									$statusOf_For_Loop_Execution = CONS::$statusOf_For_Loop_Execution__J3bar3_Y1;
									$msg .= "\n";
									
									$msg .= "set ==> val : \$statusOf_For_Loop_Execution --> $statusOf_For_Loop_Execution";
									$msg .= "\n";
									
									$msg .= "breaking... (coding not yet)";
									$msg .= "\n";
									
									Utils::write_Log__Fx_Admin(
											$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
											, $msg, __FILE__, __LINE__);
										
									// flash
									$msg = "";
									
									break;
										
								} else {
								
									/********************
									 * step : 2 : j2 : choice-1 : j3-3 : N
									 * 		trailing ==> start
									 ********************/
									/********************
									 * step : 2 : j2 : choice-1 : j3-3 : N : 1
									 * 		log
									 ********************/
// 									$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]"
									$msg = "[" . basename(__FILE__) . " : " . __LINE__ . "]"
											. " (step : 2 : j2 : choice-1 : j3-3 : N : 1)";
									$msg .= "\n";
										
									$msg .= "is_Trailing ==> false";
									$msg .= "\n";
										
									$msg .= sprintf(
											"\$bardata_This->price_Close\t%.03f\n\$pos->trail_starting_pr\t%.03f"
											, $bardata_This->price_Close
											, $pos->st_pr + $pos->val_Trail_Starting + $pos->val_SPREAD
// 											, $bardata_This->price_Close, $pos->trail_starting_pr
									);

									$msg .= "\n";

									//next:20200606_185920:n
									/********************
									 * step : 2 : j2 : choice-1 : j3-3 : N : 2
									 * 		pos ==> update
									 ********************/
									$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]"
											. " (step : 2 : j2 : choice-1 : j3-3 : 2 : N : 2)";
									$msg .= "\n";
	
									$msg .= "updating pos...";
									$msg .= "\n";
									$msg .= "\n";
	
									//log ==> flash
									Utils::write_Log__Fx_Admin(
											$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
											, $msg, __FILE__, __LINE__);
										
									//flash
									$msg = "";
									
									//code:20200606_113647
									//code:20200608_135549
// 									LibEaTester_2::update_Pos(
									LibEaTester_2::update_Pos__First_Bar(
												$bardata_This
												, $pos
												, $i
												, CONS::$strOf_Position_Type__BUY
												, $_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
											);
									
									// log
// 									$msg	.="[" . basename(__FILE__) . " : " . __LINE__ . "]";
									$msg	="[" . basename(__FILE__) . " : " . __LINE__ . "]";
									$msg .= "\n";
									$msg .= "calling : LibEaTester::show_Basic_Pos_Data__Build_Lines";
									$msg .= "\n";
	
									$msg	.= LibEaTester::show_Basic_Pos_Data__Build_Lines(
															$pos, $_lo_BarDatas, __FILE__, __LINE__);
	// 								$msg .= LibEaTester::show_Basic_Pos_Data__Build_Lines($pos, $_lo_BarDatas, __FILE__, __LINE__);
	
									// separator line
									$msg .= "\n";
						
									/********************
									 * step : 2 : j2 : choice-1 : j3-3 : N : 3
									 * 		next loop
									 ********************/
									/********************
									 * step : 2 : j2 : choice-1 : j3-3 : N : 3.1
									 * 		set ==> val
									 ********************/
									//next:20200608_141713:n
									$statusOf_For_Loop_Execution = CONS::$statusOf_For_Loop_Execution__J2_Choice_1_J3_3_N3_1;

									$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]"
											. " (step : 2 : j2 : choice-1 : j3-3 : N : 3.1)";
									$msg .= "\n";
									
									$msg .= "set ==> val : \$statusOf_For_Loop_Execution --> $statusOf_For_Loop_Execution";
									$msg .= "\n";
										
									/********************
									 * step : 2 : j2 : choice-1 : j3-3 : N : 3.2
									 * 		continue
									 ********************/
// 									//test
// 									break;

									Utils::write_Log__Fx_Admin(
											$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
											, $msg, __FILE__, __LINE__);
									
									// flash
									$msg = "";
										
									continue;
									
									
// 									//test:20200607_154149:t
// 									$statusOf_For_Loop_Exit = CONS::$statusOf_For_Loop_Exit__Break_Caller_While_Loop_Also;
// // 									$statusOf_For_Loop_Exit = CONS::$statusOf_For_Loop_Exit__Debug_Stop;
									
// 									$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
// 									$msg .= "\n";
									
// 									$msg .= "testing : \$statusOf_For_Loop_Exit ==> set to " 
// 											. $statusOf_For_Loop_Exit;
// // 											. CONS::$statusOf_For_Loop_Exit__Debug_Stop;
// 									$msg .= "\n";
									
// 									$msg .= "breaking from for-loop...";
// 									$msg .= "\n";
										
// 									//test
// 									break;
									
									
								}//if ($cond_4_Trailing_Start == true)
								
// 								//next:20200605_125122
// 								/********************
// 								 * step : 2 : j2 : choice-1 : j3-3 : 2 : N : 2
// 								 * 		pos ==> update
// 								 ********************/
// 								$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]"
// 										. " (step : 2 : j2 : choice-1 : j3-3 : 2 : N : 2)";
// 								$msg .= "\n";
								
// 								$msg .= "updating pos...";
// 								$msg .= "\n";
// 								$msg .= "\n";
								
// 								//code:20200606_113647
// 								LibEaTester_2::update_Pos(
// 											$bardata_This
// 											, $pos
// 											, CONS::$strOf_Position_Type__BUY
// 											, $_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
// 										);
								
// 								// log
// 								$msg	.="[" . basename(__FILE__) . " : " . __LINE__ . "]";
// 								$msg .= "\n";
// 								$msg .= "calling : LibEaTester::show_Basic_Pos_Data__Build_Lines";
// 								$msg .= "\n";
								
// 								$msg	.= LibEaTester::show_Basic_Pos_Data__Build_Lines(
// 														$pos, $_lo_BarDatas, __FILE__, __LINE__);
// // 								$msg .= LibEaTester::show_Basic_Pos_Data__Build_Lines($pos, $_lo_BarDatas, __FILE__, __LINE__);

// 								// separator line
// 								$msg .= "\n";
								
							}//if ($cond_3__Is_TP)
							
							
							
						}//if ($cond_2__Is_SL == true)
						
						
						
					} else {//if ($resultOf_PD_dp_ALL == true) {
						/********************
						 * step : 2 : j2 : choice-1 : N
						 * 		pattern ==> detected
						 ********************/
						/********************
						 * step : 2 : j2 : choice-1 : N : 1
						 * 		log
						 ********************/
						$msg = "[" . basename(__FILE__) . " : " . __LINE__ . "]";
// 						$msg .= "(for)(step : 2 : j2 : choice-1 : N : 1)";
						$msg .= "(for)(step : 2 : j2 : choice-1 : N : 1)";
						$msg .= "\n";
						$msg .= "pattern ==> NOT detected : " . CONS::$nameOf_DP__Detect_All;
						$msg .= "\n";
						
// 						debug($msg);
							
						Utils::write_Log__Fx_Admin(
								$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
								, $msg, __FILE__, __LINE__);
						
						// flash
						$msg = "";
						
					}//if ($resultOf_PD_dp_ALL == true) {
					
// 					// write log
// 					Utils::write_Log__Fx_Admin(
// 							$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
// 							, $msg, __FILE__, __LINE__);

				} else {//if ($_nameOf_DP == CONS::$nameOf_DP__Detect_All) {
					/********************
					 * step : 2 : j2 : choice-X : N
					 * 		pattern ==> unknown
					 ********************/
					/********************
					 * step : 2 : j2 : choice-X : N : 1
					 * 		log
					 ********************/
					$msg = "(step : 2 : j2 : choice-X : N : 1)";
					$msg .= "\n";
					
					$msg .= "unknown PD name : $_nameOf_DP";
					$msg .= "\n";

					//code:20200610_115412:c
					/********************
					 * step : 2 : j2 : choice-X : N : 2
					 * 		set : status ==> for-loop exectution
					 ********************/
					// 					$msg .= "breaking from the while loop";
					$msg .= "for-loop continues...";
					$msg .= "\n";

					$statusOf_For_Loop_Execution = CONS::$statusOf_For_Loop_Execution__J2_N;
					$msg .= "\n";
					
					$msg .= "set ==> val : \$statusOf_For_Loop_Execution --> $statusOf_For_Loop_Execution";
					$msg .= "\n";
						
// 					debug($msg);
					
					Utils::write_Log__Fx_Admin(
							$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
							, $msg, __FILE__, __LINE__);
					
					// flash
					$msg = "";
					
					// continue
					continue;
// 					break;
	
				}//if ($_nameOf_DP == CONS::$nameOf_DP__Detect_All)				
				
			}//if ($cond_1__Position_Taken == true)

			/********************
			 * step : 2 : X
			 * 		counter
			 ********************/
			$cntOf_Loop += 1;

			/********************
			 * step : 2 : X
			 * 		status : for-loop
			 ********************/
			$statusOf_For_Loop_Execution = CONS::$statusOf_For_Loop_Execution__Last_Line_Of_For_Loop;
			
			/********************
			 * step : 2 : X
			 * 		exit status
			 ********************/
			$statusOf_For_Loop_Exit = CONS::$statusOf_For_Loop_Exit__Reached_Loop_Last_Line;
					
		}//for ($i = $idxOf_ForLoop_Start; $i < $lenOf_LO_BarDatas; $i++) {

		/********************
		 * step : 2 : X
		 * 		for-loop ==> exited
		 ********************/
		// flash $msg content
		if ($msg != null && count($msg) > 0) {
		
			Utils::write_Log__Fx_Admin(
					$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
					, $msg, __FILE__, __LINE__);
			
		}//if ($msg != null && count($msg) > 0)
		;
		
		// renew $msg
		$msg = "[" . basename(__FILE__) . " : " . __LINE__ . "]";
		$msg .= "\n";
		
		$msg .= "\n";
		$msg .= "for-loop ==> exited : \$i = $i";
		$msg .= "\n";
		
		debug($msg);
	
		// status : exit
		$msg .= "\$statusOf_For_Loop_Exit => " . $statusOf_For_Loop_Exit;
		$msg .= "\n";
		
		//code:20200609_163152:c
		// status : for-loop execution
		$msg .= "\$statusOf_For_Loop_Execution => " . $statusOf_For_Loop_Execution;
		$msg .= "\n";
		
		//code:20200618_171436:c
		// status : $pos ==> st_idx
		$msg .= "\$pos->st_idx => " . $pos->st_idx;
		$msg .= "\n";
		
		Utils::write_Log__Fx_Admin(
				$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
				, $msg, __FILE__, __LINE__);
		
		// flash
		$msg = "";
		
		/********************
		 * step : 2 : X
		 * 		return
		 ********************/
		/********************
		 * step : X : 1
		 * 		val
		 ********************/
		//_20200601_101537:tmp
		//_20200601_152352:tmp
		//code:20200603_162633
		//test:dummy value 20200603_162835
// 		$idxOf_Position_Start = $i * 3;
		$idxOf_Position_Start = $i * 2;

		//next:20200625_131641:n
		//code:20200607_155305:c
		$valOf_Ret = array(
				$cntOf_Loop
				, $i
				, $idxOf_Position_Start
				, $statusOf_For_Loop_Exit
				, $pos
				, $statusOf_For_Loop_Execution
				
		);
// 		$valOf_Ret = array($cntOf_Loop, $i, $idxOf_Position_Start, $statusOf_For_Loop_Exit, $pos);
// 		$valOf_Ret = array($cntOf_Loop, $i, $idxOf_Position_Start, $statusOf_For_Loop_Exit);
// 		$valOf_Ret = array($cntOf_Loop, $i, $idxOf_Position_Start);
// 		$valOf_Ret = array($cntOf_Loop, $i);
		
		/********************
		 * step : X : 2
		 * 		return
		 ********************/
		return $valOf_Ret;
		
	}//fx_tester_T_1__Order_Buy__V2__For_Loop
	
	/********************
	* fx_tester_T_1__Order_Buy__V2__While_Loop
	* 	at : 2020/05/28 13:20:24
	********************/
	//_20200329_132038:tmp
	public function fx_tester_T_1__Order_Buy__V2__While_Loop(
			
			$_lo_BarDatas, $_lo_HeaderLines
			
			, $_cntOf_Loop_While, $_maxOf_Loop_While
			, $_flag_Position
			
			, $_nameOf_DP
			
			, $_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
			
			
			
			) {
//_20200531_132111:caller
//_20200531_132115:head
//_20200531_132117:wl

		/********************
		 * step : 1
		 * 		prep : vars
		 ********************/
		$flag_Pattern_Detected = false;
		
		// len
		$lenOf_LO_BarDatas = count($_lo_BarDatas);
		
		// for-loop : start index
		$idxOf_ForLoop_Start = 0;
		
		// counter
		$cntOf_Loop_Total = 0;
		
// 		$cntOf_Looop_While = 0;
		
		// status
		$statusOf_While_Loop_Execution = "";
		
		//code:20200627_124329:c
		// list of $pos
		$lo_Pos = array();
		
		/********************
		 * step : 2
		 * 		loop : while
		 ********************/
		while (true) {
				
			/********************
			 * step : 2 : 0
			 * 		stopper
			 ********************/
			if ($_cntOf_Loop_While > $_maxOf_Loop_While) {
				/********************
				 * step : 2 : 0 : 0.1
				 * 		stopper
				 ********************/
				$msg = "(while)(step : 2 : 0) while-loop ==> maxed" 
						. " " . ": count = $_cntOf_Loop_While, max = $_maxOf_Loop_While";
				debug($msg);
		
				Utils::write_Log__Fx_Admin(
						$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
						, $msg, __FILE__, __LINE__);
				
				// break
				break;
		
			}//if ($cntOf_Loop_While > $maxOf_Loop_While)
			
			//_20200531_142253:next
			
			/********************
			 * step : 2 : 0 : 1
			 * 		while-loop : show count
			 ********************/
			$msg = "(while)(step : 2 : 0 : 1)";
			$msg .= "\n";
			$msg .= "\n";
			$msg .= "####==================== while : $_cntOf_Loop_While ====================###";
// 			$msg .= "while-loop : show count ==> $_cntOf_Loop_While";
			$msg .= "\n";
			
			debug($msg);
			
			Utils::write_Log__Fx_Admin(
					$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
					, $msg, __FILE__, __LINE__);
				
			/********************
			 * step : 2 : 1
			 * 		for-loop
			 ********************/
			//_20200601_093740:caller
			//$valOf_Ret = array($cntOf_Loop, $i)
			//array($cntOf_Loop, $i, $idxOf_Position_Start)
			//$valOf_Ret = array($cntOf_Loop, $i, $idxOf_Position_Start, $statusOf_For_Loop_Exit)
			//$valOf_Ret = array($cntOf_Loop, $i, $idxOf_Position_Start, $statusOf_For_Loop_Exit, $pos)
				// $cntOf_Loop		//0
				// , $i		//1
				// , $idxOf_Position_Start			//2
				// , $statusOf_For_Loop_Exit		//3
				// , $pos		//4
				// , $statusOf_For_Loop_Execution		//5
			//coding:20200603_162557
			$valOf_Ret_Received = FxTestController::fx_tester_T_1__Order_Buy__V2__For_Loop(
					
						$idxOf_ForLoop_Start, $_lo_BarDatas
						, $_nameOf_DP
						, $_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
					
					);
			
			/********************
			 * step : 2 : 2
			 * 		post for-loop
			 ********************/
			/********************
			 * step : 2 : 2 : 1
			 * 		unpack
			 ********************/
			//next:20200616_114358:n
			
			// unpack
			$cntOf_Loop_This		= $valOf_Ret_Received[0];
			$idxOf_ForLoop_Last		= $valOf_Ret_Received[1];
			
			$pos_Tmp				= $valOf_Ret_Received[4];
			
			//code:20200627_122803:c
			$statusOf_For_Loop_Execution	= $valOf_Ret_Received[5];
			
			
			
			$idxOf_Position_Start	= $pos_Tmp->st_idx;
// 			$idxOf_Position_Start	= $valOf_Ret_Received[2];
			
			//code:20200607_155156:c
			$statusOf_For_Loop_Exit	= $valOf_Ret_Received[3];
			
			// 
			$cntOf_Loop_Total += $cntOf_Loop_This;

			//log
			$msg = "back to while-loop";
			$msg .= "\n";
			
			//coding:20200603_162120
			$msg .= "\$cntOf_Loop_This\t$cntOf_Loop_This" 
					. " " . "\n\$cntOf_Loop_Total\t$cntOf_Loop_Total"
					. " " . "\n\$idxOf_ForLoop_Last\t$idxOf_ForLoop_Last"
					. " " . "\n\$idxOf_Position_Start\t$idxOf_Position_Start"
					. " " . "\n\$statusOf_For_Loop_Exit\t$statusOf_For_Loop_Exit";
// 					. " " . "/ \$cntOf_Loop_Total = $cntOf_Loop_Total"
// 					. " " . "/ \$idxOf_ForLoop_Last = $idxOf_ForLoop_Last"
// 					. " " . "/ \$idxOf_Position_Start = $idxOf_Position_Start";
// 			$msg .= "\$cntOf_Loop_This = $cntOf_Loop_This / \$cntOf_Loop_Total = $cntOf_Loop_Total";
			$msg .= "\n";

			Utils::write_Log__Fx_Admin(
					$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
					, $msg, __FILE__, __LINE__);
			
				
			/********************
			 * step : 2 : 2 : 1.1
			 * 		check : for-loop ended with?
			 ********************/
			//debug
			if ($statusOf_For_Loop_Execution == CONS::$statusOf_For_Loop_Execution__J5_1_2_2) {
				/********************
				 * step : 2 : 2 : 1.1 : 1
				 * 		check : for-loop ended with ==> SL
				 ********************/
				$msg = "[" . basename(__FILE__) . " : " . __LINE__ . "]";
				$msg .= " ";
			
				$msg .= "(while)(step : 2 : 2 : 1.1 : 1)";
				$msg .= "\n";
			
				$msg .= "for-loop ended with ==> SL (\$statusOf_For_Loop_Execution = $statusOf_For_Loop_Execution)";
				$msg .= "\n";
			
				Utils::write_Log__Fx_Admin(
						$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
						, $msg, __FILE__, __LINE__);

				/********************
				 * step : 2 : 2 : 1.1 : 2
				 * 		$pos ==> append
				 ********************/
				//code:20200627_124427:c
				array_push($lo_Pos, $pos_Tmp);
				
			} else {//if ($statusOf_For_Loop_Execution == CONS::$statusOf_For_Loop_Execution__J5_1_2_2)
				/********************
				 * step : 2 : 2 : 1.1 : X
				 * 		check : for-loop ended with ==> ??
				 ********************/
				$msg = "[" . basename(__FILE__) . " : " . __LINE__ . "]";
				$msg .= " ";
			
				$msg .= "(while)(step : 2 : 2 : 1.1 : X)";
				$msg .= "\n";
			
				$msg .= "for-loop ended with ==> \$statusOf_For_Loop_Execution = $statusOf_For_Loop_Execution";
				$msg .= "\n";
			
				Utils::write_Log__Fx_Admin(
						$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
						, $msg, __FILE__, __LINE__);
				
			}//if ($statusOf_For_Loop_Execution == CONS::$statusOf_For_Loop_Execution__J5_1_2_2)
					
			/********************
			 * step : 2 : 2 : 2
			 * 		increment ==> $idxOf_ForLoop_Start
			 ********************/
			//coding:20200603_163513
			//test
			$idxOf_ForLoop_Start = $idxOf_Position_Start + 1;
// 			$idxOf_ForLoop_Start += 1;



			//next:20200616_114510:n
			$msg = "[" . basename(__FILE__) . " : " . __LINE__ . "]";
			$msg .= " ";
				
			$msg .= "(while)(step : 2 : 2 : 2)";
			$msg .= "\n";
				
			$msg .= "\$idxOf_ForLoop_Start ==> updated : $idxOf_ForLoop_Start";
			$msg .= "\n";
			
			Utils::write_Log__Fx_Admin(
					$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
					, $msg, __FILE__, __LINE__);

			/********************
			 * step : 2 : 2
			 * 		validate
			 ********************/
			/********************
			 * step : 2 : 2 : 1
			 * 		validate : for-loop start < length of $_lo_BarDatas
			 ********************/
			//code:20200603_164105
			if ($idxOf_ForLoop_Start >= $lenOf_LO_BarDatas) {
			
				$msg .= "\$idxOf_ForLoop_Start >= \$lenOf_LO_BarDatas ($idxOf_ForLoop_Start / $lenOf_LO_BarDatas)";
				$msg .= "\n";
				
				$msg .= "breaking from the while loop...";
				$msg .= "\n";
				
				Utils::write_Log__Fx_Admin(
						$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
						, $msg, __FILE__, __LINE__);
				
				// break
				break;
									
			}//if ($idxOf_ForLoop_Start >= $lenOf_LO_BarDatas)

			/********************
			 * step : 2 : 2 : 2
			 * 		validate : $statusOf_For_Loop_Exit
			 ********************/
			//code:20200607_155707:c
			$cond_1 = ($statusOf_For_Loop_Exit == CONS::$statusOf_For_Loop_Exit__Break_Caller_While_Loop_Also);
			
			if ($cond_1 == true) {
					
				$msg = "[" . basename(__FILE__) . " : " . __LINE__ . "]";
				$msg .= "\n";
				
				$msg .= "\$statusOf_For_Loop_Exit => $statusOf_For_Loop_Exit";
				$msg .= "\n";
			
				$msg .= "breaking from the while loop, also...";
				$msg .= "\n";
			
				Utils::write_Log__Fx_Admin(
						$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
						, $msg, __FILE__, __LINE__);
			
				// break
				break;
					
			}//if ($cond_1 == true) {
					
// 			/********************
// 			 * step : 2 : 1
// 			 * 		prep
// 			 ********************/
			/********************
			 * step : 2 : 2 : X
			 * 		counter : increment
			 ********************/
			$_cntOf_Loop_While += 1;
				
		}//while (true) {
		
		/********************
		 * step : 3
		 * 		post while-loop
		 ********************/
		//code:20200627_124756:c
		$msg = "[" . basename(__FILE__) . " : " . __LINE__ . "]";
		$msg .= "\n";
		
		$msg .= "(while)(step : 3)";
		$msg .= "\n";
	
		$msg .= "post while-loop";
		$msg .= "\n";
	
		$msg .= sprintf("count(\$lo_Pos)\t%d", count($lo_Pos));
		$msg .= "\n";
	
		Utils::write_Log__Fx_Admin(
				$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
				, $msg, __FILE__, __LINE__);
		
		/********************
		 * step : X
		 * 		return
		 ********************/
		/********************
		 * step : X : 1
		 * 		prep
		 ********************/
		$valOf_Ret = array($lo_Pos);
		
		/********************
		 * step : X : 2
		 * 		return
		 ********************/
		// return
		return $valOf_Ret;
				
		
	}//fx_tester_T_1__Order_Buy__V2__While_Loop
	
	/********************
	* fx_tester_T_1__Order_Buy__V2__Write_List_Of_Pos()
	* 
	* 	at : 2020/05/28 13:20:24
	********************/
	//_20200329_132038:tmp
	public function fx_tester_T_1__Order_Buy__V2__Write_List_Of_Pos
	(
			$_strOf_Time_Label
			, $_lo_Pos
			, $_fname_Source_CSV
			, $_dpath_Log_Fx_Tester__Full
			
			, $_nameOf_DP
			, $_lo_BarDatas__Order_A_Z
			
			) {
//_20200701_154609:caller
//_20200701_154619:head
//_20200701_154622:wl

		//_20200528_140426:tmp
		/********************
		 * step : 1
		 * 	prep
		 ********************/
		/********************
		 * step : 3 : 1
		 * 		prep : vars
		 ********************/
		$label_ListOf_Pos = "list-of-pos";
		
		$_fname_ListOf_Pos = "$label_ListOf_Pos.($_strOf_Time_Label).dat";
		
		$lenOf_LO_Pos = count($_lo_Pos);
		
		/********************
		 * step : 3 : 2
		 * 		header
		********************/
		//next:20200629_155516:n
		
		$content = "\n";
		
		/********************
		 * step : 3 : 2 : 1
		 * 		header : meta info
		 ********************/
		// meta info
		$content .= "source csv\t$_fname_Source_CSV";
		$content .= "\n";
		$content .= "this file\t$_fname_ListOf_Pos";
		$content .= "\n";
// 		$content .= "this file\t$_fname_ListOf_Pos";
// 		$content .= "\n";
		
		//next:20200630_141350:n
		// SL, TP
// 		$content .= "val_SL\t" . $_lo_Pos[0]->val_SL;
		$content .= sprintf("val_SL\t%.02f", $_lo_Pos[0]->val_SL);
		$content .= "\n";
		$content .= sprintf("val_TP\t%.02f", $_lo_Pos[0]->val_TP);
		$content .= "\n";
		$content .= sprintf("val_SPREAD\t%.02f", $_lo_Pos[0]->val_SPREAD);
		$content .= "\n";
		
		// dp name
		$content .= "nameOf_DP\t$_nameOf_DP";
		$content .= "\n";

		// starting, ending
		$lenOf_LO_BarData = count($_lo_BarDatas__Order_A_Z);
		
		$content .= "starting bar\t" . $_lo_BarDatas__Order_A_Z[0]->dateTime;
		$content .= "\n";
		$content .= "ending bar\t" . $_lo_BarDatas__Order_A_Z[$lenOf_LO_BarData - 1]->dateTime;
		$content .= "\n";
		
		// separator
		$content .= "\n";
		
		/********************
		 * step : 3 : 2 : 2
		 * 		header : column names
		 ********************/
		// serial num
		$content .= "no" . "\t";
		
		// starting bar
		$content .= "st_idx\tst_pr\tdatetime";
		
		$content .= "\t";
		// 		$content .= "\n";
		
		// current
		$content .= "cu_idx\tcu_pr\tdatetime";
		
		$content .= "\t";
		
		//next:20200701_163805:n
		
		// SL, TP, diff
		$content .= "pos.SL\tpos.TP\tdiff.SL~start";
		
		// return char
		$content .= "\n";
		
		
		/********************
		 * step : 3 : 3
		 * 		data
		 ********************/
		// data
		for ($i = 0; $i < $lenOf_LO_Pos; $i++) {
			/********************
			 * step : 3 : 3 : 0
			 * 		prep
			 ********************/
			// pos
			$pos = $_lo_Pos[$i];
				
			/********************
			 * step : 3 : 3 : 1
			 * 		serial num
			********************/
			$content	.= ($i + 1);
			$content .= "\t";
				
			/********************
			 * step : 3 : 3 : 2
			 * 		starting bar
			 ********************/
			$content .= sprintf("%d\t%.03f\t%s", $pos->st_idx, $pos->st_pr, $pos-> st_dateTime);
			$content .= "\t";
				
			/********************
			 * step : 3 : 3 : 3
			 * 		current bar
			 ********************/
			$content .= sprintf("%d\t%.03f\t%s", $pos->cu_idx, $pos->cu_pr, $pos-> cu_dateTime);
				
			$content .= "\t";
				
			/********************
			 * step : 3 : 3 : 4
			 * 		SL, TP, diff
			 ********************/
			$diffOf_Price_SL_Start = $pos->pr_SL - $pos->st_pr;
				
			$content .= sprintf("%.03f\t%.03f\t%.03f", $pos->pr_SL, $pos->pr_TP, $diffOf_Price_SL_Start);
				
			$content .= "\t";
				
			/********************
			 * step : 3 : 3 : X
			 * 		return char
			 ********************/
			$content .= "\n";
				
		}//for ($i = 0; $i < $lenOf_LO_Pos; $i++)
		
		/********************
		 * step : 3 : 4
		 * 		write
		 ********************/
		Utils::write_Log__Fx_Admin(
				$_dpath_Log_Fx_Tester__Full, $_fname_ListOf_Pos
// 				$dpath_Log_Fx_Tester__Full, $_fname_ListOf_Pos
				, $content, __FILE__, __LINE__);

		/********************
		 * step : 4
		 * 		return
		 ********************/
		/********************
		 * step : X : 1
		 * 		prep
		 ********************/
		$valOf_Ret = array($_fname_ListOf_Pos);
		
		/********************
		 * step : X : 2
		 * 		return
		 ********************/
		// return
		return $valOf_Ret;
		
	}//public function fx_tester_T_1__Order_Buy__V2__Write_List_Of_Pos() {
	
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
		//_20200529_183406:tmp
		//_20200528_132029:caller
		$valOfRet__Received = FxTestController::fx_tester_T_1__Order_Buy__V2__Params();
		
		$fname_Source_CSV	= $valOfRet__Received[0]; 
		$dpath_Source_CSV	= $valOfRet__Received[1]; 
		
		debug("\$fname_Source_CSV = $fname_Source_CSV / \$dpath_Source_CSV = $dpath_Source_CSV");
		
		$tokens = explode(".", $fname_Source_CSV);
// 		$tokens = explode(".", $query_tag_TA_Fx_Test_Index_Tester_1);
		
// 		debug("\$tokens =>");
// 		debug($tokens);
			// 		(int) 0 => '(slice-by-day)',
			// 		(int) 1 => '(AUDJPY-M5)',
			// 		(int) 2 => '(2020-05-13)',
			// 		(int) 3 => '(20200527_095823_351450)',
			// 		(int) 4 => 'csv'		
		
		//_20200528_140148:tmp
		/********************
		 * step : 0 : 1
		 * 		prep : log dir
		 ********************/
		// time label
		$strOf_Time_Label = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
		
		// tester name
		$strOf_Tester_Name = "tester-1_v2";
		
		//_20200529_182703:tmp
		//_20200529_182757:caller
		//$valOf_Ret = array($dpath_Log_Fx_Tester__Full, $dpath_Log_Fx_Tester, $dname_Log_Tester);
		$valOfRet__Received = 
				FxTestController::fx_tester_T_1__Order_Buy__V2__Log_Dir($tokens, $strOf_Time_Label, $strOf_Tester_Name);
		
		// unpack
		$dpath_Log_Fx_Tester__Full	= $valOfRet__Received[0];
		$dpath_Log_Fx_Tester		= $valOfRet__Received[1];
		$dname_Log_Tester			= $valOfRet__Received[2];
		
		//debug
// 		debug("\$dpath_Log_Fx_Tester__Full => " . $dpath_Log_Fx_Tester__Full);
		
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
// 		debug("CONS::\$fname_Log_Fx_Tester => " . CONS::$fname_Log_Fx_Tester);
		
		//_20200530_130239:tmp
		//test
		$msg = "fx_tester_T_1__Order_Buy__V2 ==> starts";
		$msg .= "\n";
		
// 		debug("\$dpath_Log_Fx_Tester__Full = $dpath_Log_Fx_Tester__Full / CONS::\$fname_Log_Fx_Tester = " . CONS::$fname_Log_Fx_Tester);
		
		Utils::write_Log__Fx_Admin(
				$dpath_Log_Fx_Tester__Full, CONS::$fname_Log_Fx_Tester
				, $msg, __FILE__, __LINE__);
		
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
		
		/********************
		 * step : 1
		 * 	get : list of bardatas
		********************/
		//_20200529_185258:next
		//C:\WORKS_2\WS\WS_Others.prog\prog\D-7\2_2\VIRTUAL\Admin_Projects\curr\data\csv_raw\(slice-by-day).(AUDJPY-M5).(2020-05-13_2020-05-21).(20200530_132553_216136)
// 		$dpath_File_CSV = "C:\\WORKS_2\\WS\\WS_Others.prog\\prog\\D-7\\2_2\\VIRTUAL\\Admin_Projects\\curr\\data\\csv_raw\\(slice-by-day).(AUDJPY-M5).(2020-05-13_2020-05-21).(20200530_132553_216136)";
		$dpath_File_CSV = $dpath_Source_CSV;
		
		//_20200530_133828:tmp
		debug("calling ==> Libfx::get_ListOf_BarDatas__V2");
		
		$valOf_Ret__Received = Libfx::get_ListOf_BarDatas__V2(
						$dpath_File_CSV, $fname_Source_CSV
						, $dpath_Log_Fx_Tester__Full, CONS::$fname_Log_Fx_Tester
				);
		
		// unpack
		$lo_BarDatas		= $valOf_Ret__Received[0];
		$lo_HeaderLines		= $valOf_Ret__Received[1];
		
// 		//debug
// 		debug("\$lo_HeaderLines =>");
// 		debug($lo_HeaderLines);
		
		debug("count(\$lo_BarDatas) => " . count($lo_BarDatas));

// 		if (count($lo_BarDatas) > 0) {
		
// 			debug("\$lo_BarDatas[0] =>");
// 			debug($lo_BarDatas[0]);
		
// 		} else {
		
// 			debug("count(\$lo_BarDatas) ==> < 0");
			
// 		}//if (count($lo_BarDatas) > 0) {
		
		/********************
		 * step : 2
		 * 	testing
		 ********************/
		//_20200530_143853:next
		/********************
		 * step : 2 : 1
		 * 		prep : vars
		 ********************/
		$lenOf_LO_BarDatas = count($lo_BarDatas);
		
		$cntOf_Loop_While = 0;
		
		$maxOf_Loop_While = 20;
		
		// flags
		// 	position
		$flag_Position = false;

		/********************
		 * step : 2 : 1 : 2
		 * 		list ==> reverse
		 ********************/
// 		//debug
// 		debug("\$lo_BarDatas[0] =>");
// 		debug($lo_BarDatas[0]);

// 		debug("\$lo_BarDatas[count(\$lo_BarDatas) - 1] =>");
// 		debug($lo_BarDatas[count($lo_BarDatas) - 1]);

		
		$lo_BarDatas__Order_A_Z = Libfx::reverse_LO_BarDatas(
						$lo_BarDatas, CONS::$strOf_Sort_Direction_LO_BarDatas__ASC);
		
		//debug
		debug("\$lo_BarDatas ==> order : A-Z");
		
// 		//debug
// 		debug("\$lo_BarDatas__Order_A_Z[0] =>");
// 		debug($lo_BarDatas__Order_A_Z[0]);

// 		debug("\$lo_BarDatas__Order_A_Z[count(\$lo_BarDatas__Order_A_Z) - 1] =>");
// 		debug($lo_BarDatas__Order_A_Z[count($lo_BarDatas__Order_A_Z) - 1]);
				
		/********************
		 * step : 2 : 2
		 * 		while-loop
		 ********************/
		//debug
		$msg = "(step : 2 : 2) while-loop ==> starts";
		$msg .= "\n";
		
		debug($msg);
		
		Utils::write_Log__Fx_Admin(
				$dpath_Log_Fx_Tester__Full, CONS::$fname_Log_Fx_Tester
				, $msg, __FILE__, __LINE__);
		
		
		$nameOf_DP = CONS::$nameOf_DP__Detect_All;
		
		//_20200531_132021:tmp
		//$valOf_Ret = array($lo_Pos);
		//_20200531_132111:caller
// 		FxTestController::fx_tester_T_1__Order_Buy__V2__While_Loop(
		$valOf_Ret__received = FxTestController::fx_tester_T_1__Order_Buy__V2__While_Loop(
					$lo_BarDatas__Order_A_Z, $lo_HeaderLines
// 					$lo_BarDatas, $lo_HeaderLines

					, $cntOf_Loop_While, $maxOf_Loop_While
					, $flag_Position

					, $nameOf_DP
				
					, $dpath_Log_Fx_Tester__Full, CONS::$fname_Log_Fx_Tester
				);
		
		//log
		$msg = "[" . basename(__FILE__) . " : " . __LINE__ . "]";
		$msg .= "\n";
		
		$msg .= "FxTestController::fx_tester_T_1__Order_Buy__V2__While_Loop ==> returned";
		$msg .= "\n";
			
		// write log
		Utils::write_Log__Fx_Admin(
				$dpath_Log_Fx_Tester__Full, CONS::$fname_Log_Fx_Tester
				, $msg, __FILE__, __LINE__);

		/********************
		 * step : 2 : 3
		 * 		post while-loop : unpack
		 ********************/
		// unpack
		//$valOf_Ret = array($lo_Pos);
		$lo_Pos		= $valOf_Ret__received[0];
		
		//debug
		$msg = "[" . basename(__FILE__) . " : " . __LINE__ . "]";
		$msg .= " ";
		
		$msg = "(step : 2 : 3) post while-loop : unpack";
		$msg .= "\n";
			
		$msg .= "count(\$lo_Pos)\t" . count($lo_Pos);
		$msg .= "\n";
			
		Utils::write_Log__Fx_Admin(
				$dpath_Log_Fx_Tester__Full, CONS::$fname_Log_Fx_Tester
				, $msg, __FILE__, __LINE__);
		
		/********************
		 * step : 3
		 * 		post testing : write to file ==> list of $pos
		 ********************/
		//next:20200630_141510:n
		//_20200701_154609:caller
		$valOf_Ret__received = $this->fx_tester_T_1__Order_Buy__V2__Write_List_Of_Pos(
				
				$strOf_Time_Label
				, $lo_Pos
				, $fname_Source_CSV
				, $dpath_Log_Fx_Tester__Full
				
				, $nameOf_DP
				, $lo_BarDatas__Order_A_Z
				);
		
		// unpack
		$fname_ListOf_Pos	= $valOf_Ret__received[0];
		
		//code:20200628_121021:c
		//next:20200627_130504:n
// 		debug("\$tokens =>");
// 		debug($tokens);
// 			// 		array(
// 			// 				(int) 0 => '(slice-by-day)',
// 			// 				(int) 1 => '(AUDJPY-M5)',
// 			// 				(int) 2 => '(2020-05-13)',
// 			// 				(int) 3 => '(20200530_134010_951771)',
// 			// 				(int) 4 => 'csv'
// 			// 		)		
			
// 		debug("\$strOf_Time_Label => $strOf_Time_Label");
// 			//'$strOf_Time_Label => 20200628_115555_569696'
			
// 		/********************
// 		 * step : 3 : 1
// 		 * 		prep : vars
// 		 ********************/		
// 		$label_ListOf_Pos = "list-of-pos";
		
// 		$fname_ListOf_Pos = "$label_ListOf_Pos.($strOf_Time_Label).dat";
		
// 		$lenOf_LO_Pos = count($lo_Pos);
		
// 		/********************
// 		 * step : 3 : 2
// 		 * 		header
// 		 ********************/		
// 		//next:20200629_155516:n
		
// 		$content = "\n";
		
// 		/********************
// 		 * step : 3 : 2 : 1
// 		 * 		header : meta info
// 		 ********************/		
// 		// meta info
// 		$content .= "source csv\t$fname_Source_CSV";
// 		$content .= "\n";
// 		$content .= "this file\t$fname_ListOf_Pos";
// 		$content .= "\n";
		
// 		//next:	20200630_141350:n
		
		
// 		// separator
// 		$content .= "\n";
		
// 		/********************
// 		 * step : 3 : 2 : 2
// 		 * 		header : column names
// 		 ********************/		
// 		// serial num
// 		$content .= "no" . "\t";
		
// 		// starting bar
// 		$content .= "st_idx\tst_pr\tdatetime";
		
// 		$content .= "\t";
// // 		$content .= "\n";
		
// 		// current
// 		$content .= "cu_idx\tcu_pr\tdatetime";
		
// 		$content .= "\t";
		
// 		// SL, TP, diff
// 		$content .= "pos.SL\tpos.TP\tdiff.SL~start";
		
// 		// return char
// 		$content .= "\n";
		
		
// 		/********************
// 		 * step : 3 : 3
// 		 * 		data
// 		 ********************/		
// 		// data
// 		for ($i = 0; $i < $lenOf_LO_Pos; $i++) {
// 			/********************
// 			 * step : 3 : 3 : 0
// 			 * 		prep
// 			 ********************/
// 			// pos
// 			$pos = $lo_Pos[$i];
			
// 			/********************
// 			 * step : 3 : 3 : 1
// 			 * 		serial num
// 			 ********************/
// 			$content	.= ($i + 1);
// 			$content .= "\t";
			
// 			/********************
// 			 * step : 3 : 3 : 2
// 			 * 		starting bar
// 			 ********************/
// 			$content .= sprintf("%d\t%.03f\t%s", $pos->st_idx, $pos->st_pr, $pos-> st_dateTime);
// 			$content .= "\t";
			
// 			/********************
// 			 * step : 3 : 3 : 3
// 			 * 		current bar
// 			 ********************/
// 			$content .= sprintf("%d\t%.03f\t%s", $pos->cu_idx, $pos->cu_pr, $pos-> cu_dateTime);
			
// 			$content .= "\t";
			
// 			/********************
// 			 * step : 3 : 3 : 4
// 			 * 		SL, TP, diff
// 			 ********************/
// 			$diffOf_Price_SL_Start = $pos->pr_SL - $pos->st_pr;
			
// 			$content .= sprintf("%.03f\t%.03f\t%.03f", $pos->pr_SL, $pos->pr_TP, $diffOf_Price_SL_Start);
			
// 			$content .= "\t";
			
// 			/********************
// 			 * step : 3 : 3 : X
// 			 * 		return char
// 			 ********************/
// 			$content .= "\n";
			
// 		}//for ($i = 0; $i < $lenOf_LO_Pos; $i++)
		
// 		/********************
// 		 * step : 3 : 4
// 		 * 		write
// 		 ********************/		
// 		Utils::write_Log__Fx_Admin(
// 				$dpath_Log_Fx_Tester__Full, $fname_ListOf_Pos
// 				, $content, __FILE__, __LINE__);

		//debug
		$msg = "[" . basename(__FILE__) . " : " . __LINE__ . "]";
		$msg .= " ";
		
		$msg = "(step : 3 : 3)";
		$msg .= "\n";
			
		$msg .= "write to file ==> comp ($fname_ListOf_Pos)";
		$msg .= "\n";
			
		Utils::write_Log__Fx_Admin(
				$dpath_Log_Fx_Tester__Full, CONS::$fname_Log_Fx_Tester
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

		//debug
		debug("\$time_elapsed_In_TimeLabel => $time_elapsed_In_TimeLabel");

		//debug
		$msg = "[" . basename(__FILE__) . " : " . __LINE__ . "]";
		$msg .= " ";
		
		$msg = "(step : X)";
		$msg .= "\n";
			
		$msg .= "\$time_elapsed_In_TimeLabel => $time_elapsed_In_TimeLabel";
		$msg .= "\n";
			
		Utils::write_Log__Fx_Admin(
				$dpath_Log_Fx_Tester__Full, CONS::$fname_Log_Fx_Tester
				, $msg, __FILE__, __LINE__);
		
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