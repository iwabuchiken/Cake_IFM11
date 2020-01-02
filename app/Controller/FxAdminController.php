<?php

/*
C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\
	=> app diretory
/cake_apps/Cake_IFM11

 * 
 * 
 */


// class ImagesController extends AppController {
class FxAdminController extends AppController {

	
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
// 		@$query_Article_Genre = $this->request->query['query_Article_Genre'];
		
		
	}//public function index()
	
	/******************** (20 '*'s)
	* public function process_log_file()
	* at : 2020/01/02 16:49:32
	* caller
	* 		js : function process_log_file()
	********************/
	public function process_log_file() {
		
		//_20200102_172903:next
		
		$dpath_Log = CONS::$dpath_Log_Fx_Admin;
		$fname_Log = CONS::$fname_Log_Fx_Admin;
		
		$time_current = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
		
		$text = "abc" . " / " . $time_current;
		
		$fname_Working = __FILE__; $line = __LINE__;
		
		// write log
		Utils::write_Log__Fx_Admin($dpath_Log, $fname_Log, $text, $fname_Working, $line);
// 		write_Log__Fx_Admin($dpath_Log, $fname_Log, $text, $fname_Working, $line);
		
// 		debug("process_log_file ==> starting...");
		
		// variables
		$this->set("time_current", $time_current);
		
		// layout
		$this->layout = "plain";
		
	}//public function process_log_file() {
	
}//class ArticlesController extends AppController {

