<?php

class MemosController extends AppController {
	
// 	public $scaffold;
	
	public $helpers = array('Html', 'Form');
// 	public $helpers = array('Html', 'Form');

	//REF http://book.cakephp.org/2.0/en/core-libraries/components/pagination.html
	public $components = array('Paginator');

	public function index() {
		
		
		
		$this->render("/Elements/commons/common_1");
		
	}//index
	
	public function add_memos() {

		debug("add_memos");

		// get: list of realm db files
		$fname_Realm_DBFile_Latest = Utils::find_All_Realm_DBFiles_Names();
		
		debug("\$fname_Realm_DBFile_Latest");
		debug($fname_Realm_DBFile_Latest);
		
		// memos
		$resOf_Memos = $this->Memo->find('all');
		
		$numOf_Memos = count($resOf_Memos);
		
		debug("\$numOf_Memos (Cake DB) => ".$numOf_Memos);
		
		// memos --> from csv db
		$aryOf_Memos__CSV_File = Utils::find_All_Memos__From_CSV($fname_Realm_DBFile_Latest);
		
		debug($aryOf_Memos__CSV_File == null ? "null" : "CSV file => ".count($aryOf_Memos__CSV_File));
		
		$this->render("/Elements/commons/common_1");
		
	}//add_memos
	
}