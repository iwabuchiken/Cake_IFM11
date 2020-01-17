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

		/******************** (20 '*'s)
		 * step : 0 : 1
		 * 	debug
		 ********************/
		$msg = "\n";
		$msg .= "\n";
		$msg .= "******************************** fx_tester_T_1() ********************************";
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
			
			debug("Libfx::get_ListOf_BarDatas() ==> returned : len is " . count($lo_BarDatas));
			
		}//if ($lo_BarDatas == -1)
		
		//_20200105_174937:next
		
		/********************
		 * step : 2
		 		tester ==> exec
		 ********************/
		//_20200117_125541:next
		//_20200106_130954:caller
		$valOf_Ret__received = LibEaTester::fx_tester_T_1__Exec($lo_BarDatas);
		
		// unpack
		$flg_Position	= $valOf_Ret__received[0];
		$pos			= $valOf_Ret__received[1];
		$typeOf_Bar		= $valOf_Ret__received[2];
		$numOf_Loop		= $valOf_Ret__received[3];
		
		//debug
		$msg = "(controller::fx_tester_T_1 : step : D : 1 : 2-4 : 2)";
		$msg .= "\n";
		
		$msg .= "tester ==> exec ==> comp";
		$msg .= "\n";
			
		$msg .= "\$flg_Position\t" . (($flg_Position == true ? "true" : "false"))
				. "\n"
				. "\$typeOf_Bar\t" . $typeOf_Bar
				. "\n"
				. "\$pos->st_idx\t" . $pos->st_idx
				. "\n"
				. "\$lo_BarDatas[\$pos->st_idx]->dateTime\t" . $lo_BarDatas[$pos->st_idx]->dateTime
				. "\n"
				. "\$numOf_Loop\t" . $numOf_Loop
				. "\n"
				;
		$msg .= "\n";
			
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
				, $msg, __FILE__, __LINE__);
		
		
		
// 		LibEaTester::fx_tester_T_1__Exec($lo_BarDatas);
// 		$this->fx_tester_T_1__Exec($lo_BarDatas);
		
		/******************** (20 '*'s)
		 * step : X
		 * 	set : values for view
		 *
		 ********************/
		$time_current = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
		
		// variables
		$this->set("time_current", $time_current);
		
		// layout
		$this->layout = "plain";
		
	}//public function fx_tester_T_1() {

	//_20200104_163637:next
	
}//class FxTesterController extends AppController {

