<?php

/*
C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\
	=> app diretory
/cake_apps/Cake_IFM11

 * 
 * 
 */

require_once 'C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/fx/PD.php';


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
			/********************
			 * step : 2 : 0 : 0
			 * 		log
			 ********************/
			$msg = "========================================[loop : $i";	// "=" x 40
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
			 * 		conditions
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
				$msg = "(while)(step : 2 : j1 : Y : 1)";
				$msg .= "\n";
			
				debug($msg);
			
				Utils::write_Log__Fx_Admin(
						$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
						, $msg, __FILE__, __LINE__);
					
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
			
				//_20200601_101636:next
				
			}//if ($cond_1__Position_Taken == true)

			/********************
			 * step : 2 : X
			 * 		counter
			 ********************/
			$cntOf_Loop += 1;
					
		}//for ($i = $idxOf_ForLoop_Start; $i < $lenOf_LO_BarDatas; $i++) {

		/********************
		 * step : 2 : X
		 * 		return
		 ********************/
		/********************
		 * step : X : 1
		 * 		val
		 ********************/
		//_20200601_101537:tmp
		$valOf_Ret = array($cntOf_Loop, $i);
		
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

// 		//debug
// 		debug("\$_lo_BarDatas[0] =>");
// 		debug($_lo_BarDatas[0]);
		
// 		debug("\$_lo_BarDatas[count(\$_lo_BarDatas) - 1] =>");
// 		debug($_lo_BarDatas[count($_lo_BarDatas) - 1]);

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
		
		/********************
		 * step : 2
		 * 		loop
		 ********************/
		while (true) {
				
			/********************
			 * step : 2 : 0
			 * 		stopper
			 ********************/
			if ($_cntOf_Loop_While > $_maxOf_Loop_While) {
					
				debug("(while)(step : 2 : 0) while-loop ==> maxed : count = $_cntOf_Loop_While, max = $_maxOf_Loop_While");
		
				// break
				break;
		
			}//if ($cntOf_Loop_While > $maxOf_Loop_While)
			
			//_20200531_142253:next
			
			/********************
			 * step : 2 : 1
			 * 		for-loop
			 ********************/
			//_20200601_093740:caller
			//$valOf_Ret = array($cntOf_Loop, $i)
			$valOf_Ret_Received = FxTestController::fx_tester_T_1__Order_Buy__V2__For_Loop(
						$idxOf_ForLoop_Start, $_lo_BarDatas
						, $_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
					);
			
			// unpack
			$cntOf_Loop_This = $valOf_Ret_Received[0];
			$idxOf_ForLoop_Last = $valOf_Ret_Received[1];
			
			// 
			$cntOf_Loop_Total += $cntOf_Loop_This;

			//log
			$msg = "\$cntOf_Loop_This = $cntOf_Loop_This / \$cntOf_Loop_Total = $cntOf_Loop_Total";
			$msg .= "\n";
				
			debug($msg);
				
			Utils::write_Log__Fx_Admin(
					$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
					, $msg, __FILE__, __LINE__);
				
			//test
			$idxOf_ForLoop_Start += 1;
			
			/********************
			 * step : 2 : 1
			 * 		prep
			 ********************/
// 			/********************
// 			 * step : 2 : j1
// 			 * 		position ==> taken ?
// 			 ********************/
// 			/********************
// 			 * step : 2 : j1 : 1
// 			 * 		conditions
// 			 ********************/
// 			$cond_1__Position_Taken = ($_flag_Position == true);
				
// 			if ($cond_1__Position_Taken == true) {
// 				/********************
// 				 * step : 2 : j1 : Y
// 				 * 		position ==> taken
// 				 ********************/
// 				/********************
// 				 * step : 2 : j1 : Y : 1
// 				 * 		log
// 				 ********************/
// 				$msg = "(while)(step : 2 : j1 : Y : 1)";
// 				$msg .= "\n";
				
// 				debug($msg);
				
// 				Utils::write_Log__Fx_Admin(
// 						$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
// 						, $msg, __FILE__, __LINE__);
					
// 			} else {
// 				/********************
// 				 * step : 2 : j1 : N
// 				 * 		position ==> NOT taken
// 				 ********************/
// 				/********************
// 				 * step : 2 : j1 : N : 1
// 				 * 		log
// 				 ********************/
// 				$msg = "(while)(step : 2 : j1 : N : 1)";
// 				$msg .= "\n";
				
// 				debug($msg);
				
// 				Utils::write_Log__Fx_Admin(
// 						$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
// 						, $msg, __FILE__, __LINE__);

// 				/********************
// 				 * step : 2 : j2
// 				 * 		pattern ==> detected ?
// 				 ********************/
				//_20200601_101723:ref
// 				if ($_nameOf_DP == CONS::$nameOf_DP__Detect_All) {
// 					/********************
// 					 * step : 2 : j2 : choice-1
// 					 * 		pattern ==> detected : detect all
// 					 ********************/
// 					$msg = "(while)(step : 2 : j2 : choice-1)";
// 					$msg .= "\n";
					
// 					$msg .= "detection starts...";
// 					$msg .= "\n";
						
						
// 					// flag
// 					$flag_Pattern_Detected = PD::dp_ALL();
					
// 					$msg .= "result => " . (($flag_Pattern_Detected == true) ? "true" : "false");
					
// 					debug($msg);
						
// 					Utils::write_Log__Fx_Admin(
// 							$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
// 							, $msg, __FILE__, __LINE__);
				
// 				} else {
// 					/********************
// 					 * step : 2 : j2 : choice-X
// 					 * 		pattern ==> unknown
// 					 ********************/
// 					$msg = "unknown PD name : $_nameOf_DP";
					
// 					$msg .= "\n";
// 					$msg .= "breaking from the while loop";
					
// 					debug($msg);
					
// 					Utils::write_Log__Fx_Admin(
// 							$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
// 							, $msg, __FILE__, __LINE__);
					
// 					break;
					
// 				}//if ($_nameOf_DP == CONS::$nameOf_DP__Detect_All)
				
// 			}//if ($cond_1__Position_Taken == true)
				
			/********************
			 * step : 2 : 2 : X
			 * 		counter : increment
			 ********************/
			$_cntOf_Loop_While += 1;
				
		}//while (true) {
		
	}//fx_tester_T_1__Order_Buy__V2__While_Loop
	
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
		//_20200531_132111:caller
		FxTestController::fx_tester_T_1__Order_Buy__V2__While_Loop(
					$lo_BarDatas__Order_A_Z, $lo_HeaderLines
// 					$lo_BarDatas, $lo_HeaderLines

					, $cntOf_Loop_While, $maxOf_Loop_While
					, $flag_Position

					, $nameOf_DP
				
					, $dpath_Log_Fx_Tester__Full, CONS::$fname_Log_Fx_Tester
				);
		
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