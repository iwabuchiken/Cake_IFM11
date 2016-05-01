<?php

class MemosController extends AppController {
	
// 	public $scaffold;
	
	public $helpers = array('Html', 'Form');
// 	public $helpers = array('Html', 'Form');

	//REF http://book.cakephp.org/2.0/en/core-libraries/components/pagination.html
	public $components = array('Paginator');

	public function index() {
		
		$opt = $this->index__opt();
		
// 		$opt = array(

// 				'order'		=> "Memo.id ASC"
				
// 		);
		
		$resOf_Memos = $this->Memo->find('all', $opt);
		
		debug(count($resOf_Memos));
		
		// set
		$this->set("memos", $resOf_Memos);
		
		/*
		 * view-related
		 */
		// layout
// 		$this->layout = "default_memos";
		
// 		$this->render("/Elements/commons/common_1");
		
	}//index
	
	public function index__opt() {

		$opt = array(
		
				'order'		=> "Memo.id ASC"
		
		);
		
		// return
		return $opt;
		
	}//index__opt()
	
	public function add_memos() {

		debug("add_memos");

		/*
		 * get: name of the latest realm db files
		 */
		$fname_Realm_DBFile_Latest = Utils::find_All_Realm_DBFiles_Names();
		
		debug("\$fname_Realm_DBFile_Latest");
		debug($fname_Realm_DBFile_Latest);

		/*
		 * memos --> from Cake db
		 */
		$resOf_Memos = $this->Memo->find('all');
		
		$numOf_Memos = count($resOf_Memos);
		
		debug("\$numOf_Memos (Cake DB) => ".$numOf_Memos);
		
		/*
		 * memos --> from csv db
		 */
		$aryOf_Memos__CSV_File = Utils::find_All_Memos__From_CSV($fname_Realm_DBFile_Latest);
		
		debug($aryOf_Memos__CSV_File == null ? "null" : "CSV file => ".count($aryOf_Memos__CSV_File));
		
		/*
		 * memos: from csv db & not in Cake db
		 */
		$aryOf_Memos__CSV_File__Filtered = 
				Utils::filter_Memos_From_CSVFile__NotIn_CakeDB($aryOf_Memos__CSV_File);
		
		debug("count(\$aryOf_Memos__CSV_File__Filtered) => "
				.count($aryOf_Memos__CSV_File__Filtered));
// 		debug("count(\$aryOf_Memos__CSV_File) => ".count($aryOf_Memos__CSV_File));

// 		debug("\$aryOf_Memos__CSV_File[0]->title =>");
// 		debug($aryOf_Memos__CSV_File[0]->title);
// 		debug("\$aryOf_Memos__CSV_File[0] =>");
// 		debug($aryOf_Memos__CSV_File[0]);
		
		/*
		 * insert memos (update if exists)
		 */
		$numOf_Memos__Inserted = Utils::insert_Memos_From_CSVFile__V2($aryOf_Memos__CSV_File);
// 		$numOf_Memos__Inserted = Utils::insert_Memos_From_CSVFile($aryOf_Memos__CSV_File);
		
		debug("\$numOf_Memos__Inserted => ".$numOf_Memos__Inserted);
		
		/*
		 * view
		 */
// 		$this->render("/Elements/commons/common_1");
		
	}//add_memos

	function beforeFilter() {

		//ref http://stackoverflow.com/questions/7426469/assigning-layout-in-cakephp answered Sep 15 '11 at 6:16
		parent::beforeFilter();
		$this->layout = 'default_memos';
		
	}
	
}