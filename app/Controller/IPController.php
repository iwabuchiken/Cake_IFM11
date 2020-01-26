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
		* step : 0
		* 		prep : vars
		********************/
		$msg_from_controller = "";
		
		/********************
		* step : 1 : params
		********************/
		//_20200125_173157:next
		@$action = $this->request->query['action'];

		//debug
		if ($action == null) {
		
// 			debug();
			
			// set : message
			$msg_from_controller = "param : action ==> null ; nop";
			
			$this->set("msg_from_controller" , $msg_from_controller);
			
		} else if ($action == "") {
		
// 			debug("param : action ==> blank");

			// set : message
			$msg_from_controller = "param : action ==> blank ; nop";
			
			$this->set("msg_from_controller" , $msg_from_controller);
							
		} else {
		
			debug("param:action => '" . $action . "'");
			
			/********************
			 * step : 2
			 * 		dispatch
			 ********************/
			if ($action == CONS::$label_IP_Proc_ID__1) {
			
				// set : message
				$msg_from_controller = "param is ==> " . CONS::$label_IP_Proc_ID__1
						. " / starting...";
				
// 				debug($msg_from_controller);
				$this->set("msg_from_controller" , $msg_from_controller);
				
				//_20200126_181129:next
				
			} else {
			
				// set : message
				$msg_from_controller = "param is ==> unknown";
				
				$this->set("msg_from_controller" , $msg_from_controller);
				
				
			}//if ($action == CONS::$label_IP_Proc_ID__1)
			
		}//if ($action == null)
		
		
		
		/********************
		* step : X : display
		********************/
		// layout
		$this->layout = "plain";
		
		/********************
		* step : X
		* 		set ==> view vars
		********************/
		// time label
		$tlabel = Utils::get_CurrentTime();
		$this->set("tlabel" , $tlabel);
		
		// param : action
		
		
		/********************
		* step : X : debug
		********************/
		
	}//public function ip_proc_actions() {
	
}//class FxTesterController extends AppController {

