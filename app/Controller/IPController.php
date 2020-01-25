<?php

/*
C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\
	=> app diretory
/cake_apps/Cake_IFM11

 * 
 * 
 */


class IPController extends AppController {

	
// 	public $scaffold;

	//ref http://stackoverflow.com/questions/4252577/cakephp-session-cant-write answered Nov 23 '10 at 3:56
	public $helpers = array('Html', 'Form');

	//REF http://book.cakephp.org/2.0/en/core-libraries/components/pagination.html
// 	public $components = array('Paginator', 'Session');
	public $components = array('Paginator');

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

	/******************
	 * ip_proc_actions
	 * 
	 * 	at : 2020/01/25 17:21:18
	 	caller : function ip_proc_actions(_param) (js file)
	 	
	 ****************/
	public function ip_proc_actions() {
		//_20200125_172001:head
		//_20200125_172004:caller
		//_20200125_172007:wl
		/********************
		* step : 1 : params
		********************/
		//_20200125_173157:next
// 		@$query_Article_Genre = $this->request->query['query_Article_Genre'];

		/********************
		* step : X : display
		********************/
		// layout
		$this->layout = "plain";
		
		/********************
		* step : X : debug
		********************/
		$tlabel = Utils::get_CurrentTime();
		
		$this->set("tlabel" , $tlabel);
		
	}//public function ip_proc_actions() {
	
}//class FxTesterController extends AppController {

