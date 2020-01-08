<?php

/*
C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\
	=> app diretory
/cake_apps/Cake_IFM11

 * 
 * 
 */


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
		$lo_Commands = $this->set_LO_Commands();

// 		$lo_Commands = [
// 			[1, "aaa", "AAA"]
// 			, [2, "bbb", "BBB"]
// 		];

		// set
		$this->set("lo_Commands", $lo_Commands);
		
	}//public function index()

	public function set_LO_Commands() {

		$OP_0_1	= "0-1";      # 0-1) start xampp, filezilla, open folder, open files.bat
		$OP_1	= "1";          # 1) change_file_names.bat
		$OP_1_2	= "1-2";      # 1-2) Delete_in-db-existing-files.bat
		$OP_1_3	= "1-3";      # 1-3) Delete temporary-purpose files
		
		$OP_2_0	= "2-0";      # 2-0) edit_memos.9-0.bat
		$OP_4	= "4";          # 4) edit_memos.8.open-csv-file.bat - ショートカット
		$OP_5	= "5";          # 5) edit_memos.3.insert-to-db.bat - ショートカット
		
		$OP_7	= "7";      # 7) edit_memos.12.delete-image-files.bat - ショートカット
		$OP_8	= "8";      # 8) edit_memos.4.delete-photos.bat - ショートカット
		$OP_9	= "9";      # 9) edit_memos.13.validate-admin-value.bat - ショートカット
		$OP_9_1	= "9-1";
		
		$OP_10	= "10";
		$OP_10_1	= "10-1";
		
		$OP_11	= "11";
		$OP_11_0	= "11-0";
		$OP_11_1	= "11-1";
		
		$OP_12	= "12";
		$OP_13	= "13";
		
		$OP_14	= "14";
		
		$OP_15	= "15";
		$OP_16	= "16";
		
		$lo_Commands = [
		
				[$OP_0_1, "0-1) start xampp, filezilla, open folder, open files.bat", "start apps"]
				, [$OP_1, "1) change_file_names.bat", "change_file_names"]
				, [$OP_1_2, "1-2) Delete_in-db-existing-files.bat", "Delete_in-db-existing-files"]
				, [$OP_1_3, "", "*Delete temporary-purpose files*"]
		
				, [$OP_2_0, "2-0) edit_memos.9-0.bat", "start editing"]
				, [$OP_4, "4) edit_memos.8.open-csv-file.bat - ショートカット", "open csv file"]
				, [$OP_5, "edit_memos.3.insert-to-db.bat", "insert to db"]
					
				, [$OP_7, "edit_memos.12.delete-image-files.bat", "delete image files"]
				, [$OP_8, "edit_memos.4.delete-photos.bat", "delete db entries"]
				, [$OP_9, "edit_memos.13.validate-admin-value.bat", "validate admin value"]
		
				, [$OP_9_1, "9-1) upload db file.txt", "***"]
				, [$OP_16, "9-2) upload db file", "upload db file"]    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
				, [$OP_10, "edit_memos.14.add-data-to-remote.bat", "data ==> to remote"]
		
				, [$OP_10_1, "10-1) edit_memos.14.add-data-to-remote.history.txt", "data ==> to file"]
				, [$OP_11, "edit_memos.15.validate-update.bat", "validate updates"]
				, [$OP_11_0, "11-0) update date.txt", "update data ==> to file"]
		
				, [$OP_11_1, "11-1) open update page.bat", "open update page"]    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
				, [$OP_12, "edit_memos.5.copy-image-files.bat", "copy image files"]    #
				, [$OP_13, "13) image_move-uploaded-files.bat", "move uploaded images"]    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
		
				, [$OP_14, "14) upload image files", "upload image files"]    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
				, [$OP_15, "15) close-apps.bat", "close apps"]    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
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
		
		/********************
		* step :
		* 	layout
		********************/
		$this->layout = 'plain';
		
	}//public function ifm_Actions() {
	
}//class IfmController extends AppController {

