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
		//_20200106_130954:caller
		LibEaTester::fx_tester_T_1__Exec($lo_BarDatas);
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
