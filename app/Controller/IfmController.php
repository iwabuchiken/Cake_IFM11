<?php

/*
C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\
	=> app diretory
/cake_apps/Cake_IFM11

 * 
 * 
 */
/****************************************
 * vars : global
 ****************************************/

// class ImagesController extends AppController {
class IfmController extends AppController {

// 	public $scaffold;

	//ref http://stackoverflow.com/questions/4252577/cakephp-session-cant-write answered Nov 23 '10 at 3:56
// 	public $helpers = array('Html', 'Form', 'Session');
	public $helpers = array('Html', 'Form');
// 	public $helpers = array('Html', 'Form');

	//REF http://book.cakephp.org/2.0/en/core-libraries/components/pagination.html
// 	public $components = array('Paginator', 'Session');
	public $components = array('Paginator');

// 	public function index_2() {

	
	
	/****************************************
	* funcs
	****************************************/
	/********************
	* index
	********************/
	public function index() {

		/******************
		 * step : 1
		 * 		prep
		 ****************/
		
// 		/******************
// 		 * step : 1.2
// 		 * 		prep : url params
// 		 ****************/
// 		@$filter_Memo = $this->request->query['filter_memo'];
		
		/******************
		 * step : 1.1 : 1
		 * 		get : param
		 ****************/
		/******************
		 * step : X
		 * 		set : vars for view
		 ****************/
// 		global $lo_Commands;
// 		global $lo_Commands = $this->set_LO_Commands();
		$lo_Commands = $this->set_LO_Commands();

// 		$lo_Commands = [
// 			[1, "aaa", "AAA"]
// 			, [2, "bbb", "BBB"]
// 		];

// 		debug("\$lo_Commands[0] =>");
// 		debug($lo_Commands[0]);
		
		// set
		$this->set("lo_Commands", $lo_Commands);
		
	}//public function index()

	public function set_LO_Commands() {

		$lo_Commands = [
		
				[CONS::$OP_0_1, CONS::$OP_0_1_String_1, CONS::$OP_0_1_String_2]
// 				[$OP_0_1]
				, [CONS::$OP_1, CONS::$OP_1_String_1, CONS::$OP_1_String_2]
				, [CONS::$OP_1_2, CONS::$OP_1_2_String_1, CONS::$OP_1_2_String_2]
				, [CONS::$OP_1_3, CONS::$OP_1_3_String_1, CONS::$OP_1_3_String_2]
		
				, [CONS::$OP_2_0, CONS::$OP_2_0_String_1, CONS::$OP_2_0_String_2]
				, [CONS::$OP_4, CONS::$OP_4_String_1, CONS::$OP_4_String_2]
				, [CONS::$OP_5, CONS::$OP_5_String_1, CONS::$OP_5_String_2]
					
				, [CONS::$OP_7, CONS::$OP_7_String_1, CONS::$OP_7_String_2]
				, [CONS::$OP_8, CONS::$OP_8_String_1, CONS::$OP_8_String_2]
				, [CONS::$OP_9, CONS::$OP_9_String_1, CONS::$OP_9_String_2]
		
				, [CONS::$OP_9_1, CONS::$OP_9_1_String_1, CONS::$OP_9_1_String_2]
				, [CONS::$OP_16, CONS::$OP_9_2_String_1, CONS::$OP_9_2_String_2]    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
				, [CONS::$OP_10, CONS::$OP_10_String_1, CONS::$OP_10_String_2]
		
				, [CONS::$OP_10_1, CONS::$OP_10_1_String_1, CONS::$OP_10_1_String_2]
				, [CONS::$OP_11, CONS::$OP_11_String_1, CONS::$OP_11_String_2]
				, [CONS::$OP_11_0, CONS::$OP_11_0_String_1, CONS::$OP_11_0_String_2]
		
				, [CONS::$OP_11_1, CONS::$OP_11_1_String_1, CONS::$OP_11_1_String_2]    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
				, [CONS::$OP_12, CONS::$OP_12_String_1, CONS::$OP_12_String_2]    #
				, [CONS::$OP_13, CONS::$OP_13_String_1, CONS::$OP_13_String_2]    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
		
				, [CONS::$OP_14, CONS::$OP_14_String_1, CONS::$OP_14_String_2]    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
				, [CONS::$OP_15, CONS::$OP_15_String_1, CONS::$OP_15_String_2]    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
// 				[CONS::$OP_0_1, CONS::$OP_0_1_String_1, "start apps"]
// // 				[$OP_0_1, "0-1) start xampp, filezilla, open folder, open files.bat", "start apps"]
// 				, [CONS::$OP_1, CONS::$OP_1_String_1, "change_file_names"]
// 				, [CONS::$OP_1_2, CONS::$OP_1_2_String_1, "Delete_in-db-existing-files"]
// 				, [CONS::$OP_1_3, CONS::$OP_1_3_String_1, "*Delete temporary-purpose files*"]
		
// 				, [CONS::$OP_2_0, CONS::$OP_2_0_String_1, "start editing"]
// 				, [CONS::$OP_4, CONS::$OP_4_String_1, "open csv file"]
// 				, [CONS::$OP_5, CONS::$OP_5_String_1, "insert to db"]
					
// 				, [CONS::$OP_7, CONS::$OP_7_String_1, "delete image files"]
// 				, [CONS::$OP_8, CONS::$OP_8_String_1, "delete db entries"]
// 				, [CONS::$OP_9, CONS::$OP_9_String_1, "validate admin value"]
		
// 				, [CONS::$OP_9_1, CONS::$OP_9_1_String_1, "***"]
// 				, [CONS::$OP_16, CONS::$OP_9_2_String_1, "upload db file"]    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
// 				, [CONS::$OP_10, CONS::$OP_10_String_1, "data ==> to remote"]
		
// 				, [CONS::$OP_10_1, CONS::$OP_10_1_String_1, "data ==> to file"]
// 				, [CONS::$OP_11, CONS::$OP_11_String_1, "validate updates"]
// 				, [CONS::$OP_11_0, CONS::$OP_11_0_String_1, "update data ==> to file"]
		
// 				, [CONS::$OP_11_1, CONS::$OP_11_1_String_1, "open update page"]    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
// 				, [CONS::$OP_12, CONS::$OP_12_String_1, "copy image files"]    #
// 				, [CONS::$OP_13, CONS::$OP_13_String_1, "move uploaded images"]    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
		
// 				, [CONS::$OP_14, CONS::$OP_14_String_1, "upload image files"]    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
// 				, [CONS::$OP_15, CONS::$OP_15_String_1, "close apps"]    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
// 				[CONS::$OP_0_1, "0-1) start xampp, filezilla, open folder, open files.bat", "start apps"]
// // 				[$OP_0_1, "0-1) start xampp, filezilla, open folder, open files.bat", "start apps"]
// 				, [CONS::$OP_1, "1) change_file_names.bat", "change_file_names"]
// 				, [CONS::$OP_1_2, "1-2) Delete_in-db-existing-files.bat", "Delete_in-db-existing-files"]
// 				, [CONS::$OP_1_3, "", "*Delete temporary-purpose files*"]
		
// 				, [CONS::$OP_2_0, "2-0) edit_memos.9-0.bat", "start editing"]
// 				, [CONS::$OP_4, "4) edit_memos.8.open-csv-file.bat - ショートカット", "open csv file"]
// 				, [CONS::$OP_5, "edit_memos.3.insert-to-db.bat", "insert to db"]
					
// 				, [CONS::$OP_7, "edit_memos.12.delete-image-files.bat", "delete image files"]
// 				, [CONS::$OP_8, "edit_memos.4.delete-photos.bat", "delete db entries"]
// 				, [CONS::$OP_9, "edit_memos.13.validate-admin-value.bat", "validate admin value"]
		
// 				, [CONS::$OP_9_1, "9-1) upload db file.txt", "***"]
// 				, [CONS::$OP_16, "9-2) upload db file", "upload db file"]    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
// 				, [CONS::$OP_10, "edit_memos.14.add-data-to-remote.bat", "data ==> to remote"]
		
// 				, [CONS::$OP_10_1, "10-1) edit_memos.14.add-data-to-remote.history.txt", "data ==> to file"]
// 				, [CONS::$OP_11, "edit_memos.15.validate-update.bat", "validate updates"]
// 				, [CONS::$OP_11_0, "11-0) update date.txt", "update data ==> to file"]
		
// 				, [CONS::$OP_11_1, "11-1) open update page.bat", "open update page"]    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
// 				, [CONS::$OP_12, "edit_memos.5.copy-image-files.bat", "copy image files"]    #
// 				, [CONS::$OP_13, "13) image_move-uploaded-files.bat", "move uploaded images"]    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
		
// 				, [CONS::$OP_14, "14) upload image files", "upload image files"]    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
// 				, [CONS::$OP_15, "15) close-apps.bat", "close apps"]    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
		];
		
		// return
		return $lo_Commands;
		
	}//public function set_LO_Commands() {
	
	public function ifm_Actions() {
		//_20200108_131334:caller
		//_20200108_131357:head
		//_20200108_131403:wl

		/******************
		 * step : 1 : 1
		 * 		prep : url params
		 ****************/
		@$query_Action = $this->request->query['action'];
		
		debug("\$query_Action => '" . $query_Action . "'");
		
		/******************
		 * step : 1 : 2
		 * 		validate
		 ****************/
		if 		($query_Action == null)
					{ debug("\$query_Action => null");	$this->layout = 'plain'; return;}
		else if	($query_Action == false)
					{ debug("\$query_Action => false");	$this->layout = 'plain'; return;}//if ($query_Action == null) {
		else if	($query_Action == "")
					{ debug("\$query_Action => blank");	$this->layout = 'plain'; return;}//if ($query_Action == null) {
		
		/******************
		 * step : 2
		 * 		dispatch
		 ****************/
		//_20200108_142438:next
		if ($query_Action == CONS::$OP_0_1) {
		
			debug("starting apps...");
			
			//_20200109_093814:next
// 			$this->ifm_Actions__0_1();
			
		} else {
		
			debug("unknown action => '" . $query_Action . "'");
			
		}//if ($query_Action == CONS::$OP_0_1)
		
		
		/********************
		* step :
		* 	layout
		********************/
		$this->layout = 'plain';
		
	}//public function ifm_Actions() {
	
}//class IfmController extends AppController {

