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

	/********************
	* fx_tester_T_1
	* 	at : (before) 2020/01/06 13:09:11
	********************/
	public function fx_tester_T_1() {
		//_20200106_130954:caller
		//_20200106_130959:head
		//_20200106_131002:wl

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
		 * step : 0 : 1
		 * 		prep : log dir
		 ********************/
		//_20200201_161421:tmp
		$tmp_Dpath_Log_Fx_Admin__orig = CONS::$dpath_Log_Fx_Admin;
		
// 		CONS::$dpath_Log_Fx_Admin .= CONS::$dpath_Log_Fx_Admin . "/"
		CONS::$dpath_Log_Fx_Admin .= "/"
								. "log."
								. $strOf_Time_Label . ".dir"
								;
// 		CONS::$dpath_Log_Fx_Admin .= "log."
// 								. CONS::$dpath_Log_Fx_Admin . "/"
// 								. $strOf_Time_Label . ".dir"
// 								;
		
		/******************** (20 '*'s)
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
		$lo_BarDatas = Libfx::get_ListOf_BarDatas();
		
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
			
// 			debug("Libfx::get_ListOf_BarDatas() ==> returned : len is " . count($lo_BarDatas));

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
// 		Libfx::reverse_LO_BarDatas($lo_BarDatas, CONS::$strOf_Sort_Direction_LO_BarDatas__ASC);
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
		
		
		
		//_20200105_174937:next
		
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
		
		
		//_20200117_125541:next
		
		// num of loop start
		//_20200121_170907:tmp
		$num_Loop_Start = 0;
		
		while (true) {
			
			/********************
			 * step : 2 : 1
			 		exec
			 ********************/
			//_20200201_160828:caller
			$valOf_Ret__received = LibEaTester::fx_tester_T_1__Exec($lo_BarDatas, $num_Loop_Start);
// 			$valOf_Ret__received = LibEaTester::fx_tester_T_1__Exec($lo_BarDatas);
			
			/********************
			 * step : 2 : 2
			 		unpack ==> received vals
			 ********************/
			// unpack
			$flg_Position	= $valOf_Ret__received[0];
			$pos			= $valOf_Ret__received[1];
			$typeOf_Bar		= $valOf_Ret__received[2];
			$numOf_Loop		= $valOf_Ret__received[3];
			
			//_20200121_172537:next
			
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
			
// 			Utils::write_Log__Fx_Admin(
// 					CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
// 					, $msg, __FILE__, __LINE__);
				
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
		$msg = LibEaTester::show_LO_Pos_Data__Build_Lines($lo_Pos, $lo_BarDatas);
		
// 		$lenOf_LO_Pos = count($lo_Pos);
		
// 		//show
// 		$msg = "\n";
		
// 		//_20200128_174019:next
// 		for ($i = 0; $i < $lenOf_LO_Pos; $i++) {
		
// 			$pos = $lo_Pos[$i];
			
// 			$msg .= "\$pos->st_idx\t" . $pos->st_idx;
// 			$msg .= " / ";
// 			$msg .= "\$pos->st_pr\t" . $pos->st_pr;
// 			$msg .= "\n";
			
// 			$msg .= "\$lo_BarDatas[\$pos->st_idx]->dateTime\t" . $lo_BarDatas[$pos->st_idx]->dateTime;
// 			$msg .= "\n";
// 			$msg .= "\n";
			
// 		}//for ($i = 0; $i < $lenOf_LO_Pos; $i++)
		
		//debug : write
		$fname = CONS::$fname_Log_Fx_Admin . CONS::$fname_Log_Fx_Admin__List_Of_Pos__Suffix;
		
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, $fname
				, $msg, __FILE__, __LINE__);
		
// 		//_20200106_130954:caller
// 		$valOf_Ret__received = LibEaTester::fx_tester_T_1__Exec($lo_BarDatas);
		
// 		// unpack
// 		$flg_Position	= $valOf_Ret__received[0];
// 		$pos			= $valOf_Ret__received[1];
// 		$typeOf_Bar		= $valOf_Ret__received[2];
// 		$numOf_Loop		= $valOf_Ret__received[3];
		
// 		//debug
// 		$msg = "(controller::fx_tester_T_1 : step : D : 1 : 2-4 : 2)";
// 		$msg .= "\n";
		
// 		$msg .= "tester ==> exec ==> comp";
// 		$msg .= "\n";
			
// 		$msg .= "\$flg_Position\t" . (($flg_Position == true ? "true" : "false"))
// 				. "\n"
// 				. "\$typeOf_Bar\t" . $typeOf_Bar
// 				. "\n"
// 				. "\$pos->st_idx\t" . $pos->st_idx
// 				. "\n"
// 				. "\$lo_BarDatas[\$pos->st_idx]->dateTime\t" . $lo_BarDatas[$pos->st_idx]->dateTime
// 				. "\n"
// 				. "\$numOf_Loop\t" . $numOf_Loop
// 				. "\n"
// 				;
// 		$msg .= "\n";
			
// 		Utils::write_Log__Fx_Admin(
// 				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
// 				, $msg, __FILE__, __LINE__);
		
		
		
// 		LibEaTester::fx_tester_T_1__Exec($lo_BarDatas);
// 		$this->fx_tester_T_1__Exec($lo_BarDatas);
		
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
		 * 	set : CONS::$dpath_Log_Fx_Admin
		 *
		 ********************/
		// log file dir ==> back to orig
		CONS::$dpath_Log_Fx_Admin = $tmp_Dpath_Log_Fx_Admin__orig;
		
		
	}//public function fx_tester_T_1() {

	//_20200104_163637:next
	
}//class FxTesterController extends AppController {

