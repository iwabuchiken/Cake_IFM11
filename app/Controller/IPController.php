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
	public function ip_proc_actions__Proc_1() {
		//_20200127_174455:head
		//_20200127_174500:caller
		//_20200127_174504:wl
		/********************
		* step : 0
		* 		prep : vars
		********************/
// 		//test
// 		phpinfo();
		
		$dpath_Image_File = "C:/WORKS_2/WS/WS_Others.Art/JVEMV6/46_art/6_visual-arts/5_free-painting/images";
		$fname_Image_File = "test_20200127_175307.png";
		
		$fpath_Image_File = join("/", array($dpath_Image_File, $fname_Image_File));
		
		//_20200127_181527:next
		$im_inp = ImageCreateFromPNG($fpath_Image_File);
// 		$im_inp = ImageCreateFromJPEG($fpath_Image_File);
		
		ImageDestroy($im_inp);
		
		
		/********************
		* step : X
		* 		return
		********************/
		/********************
		* step : X : 1
		* 		val
		********************/
		$valOf_Return = array("<br>ip_proc_actions__Proc_1 ==> comp");
// 		$valOf_Return = array("ip_proc_actions__Proc_1 ==> comp");
		
		/********************
		* step : X : 2
		* 		return
		********************/
		return $valOf_Return;
		
	}//public function ip_proc_actions__Proc_1() {
	
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
				
				//_20200126_181129:next
				//_20200127_174500:caller
				//$valOf_Return = array("ip_proc_actions__Proc_1 ==> comp");
				$valOf_Return__received = $this->ip_proc_actions__Proc_1();
				
				$msg_from_controller .= $valOf_Return__received[0];
				
// 				debug($msg_from_controller);
				$this->set("msg_from_controller" , $msg_from_controller);
				
			} else {
			
				// set : message
				$msg_from_controller = "param is ==> unknown : '$action'";
				
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

