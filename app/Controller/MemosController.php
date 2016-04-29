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
		$aryOf_Realm_DBFiles_Names = Utils::find_All_Realm_DBFiles_Names();
		
		debug("\$aryOf_Realm_DBFiles_Names");
		debug($aryOf_Realm_DBFiles_Names);
		
		// memos
		$resOf_Memos = $this->Memo->find('all');
		
		$numOf_Memos = count($resOf_Memos);
		
		debug("\$numOf_Memos => ".$numOf_Memos);
		
		$this->render("/Elements/commons/common_1");
		
	}//add_memos
	
}