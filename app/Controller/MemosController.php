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
		
		/*
		 * paginate
		 */
		$resOf_Memos__Paginagte = $this->_index__FindMemos__Paginate();
		
		debug("count(\$resOf_Memos__Paginagte) => ".count($resOf_Memos__Paginagte));
		
		// set
		$this->set("memos", $resOf_Memos__Paginagte);
// 		$this->set("memos", $resOf_Memos);
		
		/*
		 * view-related
		 */
		// layout
// 		$this->layout = "default_memos";
		
// 		$this->render("/Elements/commons/common_1");
		
	}//index

	/*
	 * @return
	 * result of find
	 */
	public function _index__FindMemos__Paginate() {

// 		debug("start paginating...");
		
		$opt_order = array("Memo.id" => "ASC");
		
		$this->paginate = array(
		// 					'conditions' => array('Image.file_name LIKE' => "%$filter_TableName%"),
// 				'conditions' => $opt_conditions,
				// 					'conditions' => array('Image.memos LIKE' => "%$filter_TableName%"),
				'limit' => 10,
// 				'limit' => 4,
				'order' => $opt_order,
					
				// 					'page'	=> 2,
					
		// 					'order' => array(
				// 							'id' => 'asc'
				// 					)
		);
			
// 		debug("paginator => set");
		
// 		return $this->paginate('Memo');
		$images = $this->paginate('Memo');
// 		$images = $this->paginate('Image');

		$paginateData = $this->params['paging']['Memo'];
		
		debug("\$paginateData['pageCount'] => ".$paginateData['pageCount']);
		
		// return
		return $images;
		
	}//_index__FindMemos__Paginate()
	
	public function index__opt() {

		$opt = array(
		
				'order'		=> "Memo.r_created_at DESC"
// 				'order'		=> "Memo.id ASC"
		
		);
		
		// return
		return $opt;
		
	}//index__opt()
	
	public function add_memos() {

		debug("add_memos");

		/*******************************
		 get: db file names => from sqlite db
		*******************************/
		$aryOf_Realm_DBFile_Names__UnInserted = 
					Utils::find_All_Realm_DBFile_Names__From_SqliteDB();
		
		debug("\$aryOf_Realm_DBFile_Names__UnInserted => ");
		debug($aryOf_Realm_DBFile_Names__UnInserted);

		/*******************************
		 get: db file names => from directory
		*******************************/
// 		$aryOf_Realm_DBFile_Names__From_Directory =
// 					Utils::find_All_Realm_DBFile_Names__From_Directory();
		
// 		debug("\$aryOf_Realm_DBFile_Names__From_Directory => ");
// 		debug($aryOf_Realm_DBFile_Names__From_Directory);
		
		debug("Utils::get_dpath__Realm_DB_Files() =>");
		debug(Utils::get_dpath__Realm_DB_Files());
		
		debug(file_exists(Utils::get_dpath__Realm_DB_Files()) == true ? "exists" : "NOT exist");
		
		
		/*
		 * execute
		 */
// 		$this->_add_memos__execute();
		
		
// 		/*
// 		 * get: name of the latest realm db files
// 		 */
// 		$fname_Realm_DBFile_Latest = Utils::find_All_Realm_DBFiles_Names();
		
// 		debug("\$fname_Realm_DBFile_Latest");
// 		debug($fname_Realm_DBFile_Latest);

// 		/*
// 		 * memos --> from Cake db
// 		 */
// 		$resOf_Memos = $this->Memo->find('all');
		
// 		$numOf_Memos = count($resOf_Memos);
		
// 		debug("\$numOf_Memos (Cake DB) => ".$numOf_Memos);
		
// 		/*
// 		 * memos --> from csv db
// 		 */
// 		$aryOf_Memos__CSV_File = Utils::find_All_Memos__From_CSV($fname_Realm_DBFile_Latest);
		
// 		debug($aryOf_Memos__CSV_File == null ? "null" : "CSV file => ".count($aryOf_Memos__CSV_File));
		
// 		/*
// 		 * memos: from csv db & not in Cake db
// 		 */
// 		$aryOf_Memos__CSV_File__Filtered = 
// 				Utils::filter_Memos_From_CSVFile__NotIn_CakeDB($aryOf_Memos__CSV_File);
		
// 		debug("count(\$aryOf_Memos__CSV_File__Filtered) => "
// 				.count($aryOf_Memos__CSV_File__Filtered));
// // 		debug("count(\$aryOf_Memos__CSV_File) => ".count($aryOf_Memos__CSV_File));

// // 		debug("\$aryOf_Memos__CSV_File[0]->title =>");
// // 		debug($aryOf_Memos__CSV_File[0]->title);
// // 		debug("\$aryOf_Memos__CSV_File[0] =>");
// // 		debug($aryOf_Memos__CSV_File[0]);
		
// 		/*
// 		 * insert memos (update if exists)
// 		 */
// 		$numOf_Memos__Inserted = Utils::insert_Memos_From_CSVFile__V2($aryOf_Memos__CSV_File);
// // 		$numOf_Memos__Inserted = Utils::insert_Memos_From_CSVFile($aryOf_Memos__CSV_File);
		
// 		debug("\$numOf_Memos__Inserted => ".$numOf_Memos__Inserted);
		
		/*
		 * view
		 */
// 		$this->render("/Elements/commons/common_1");
		
	}//add_memos

	public function 
	_add_memos__execute($fname_Realm_DBFile_Latest) {
// 	public function _add_memos__execute() {

		/*
		 * get: name of the latest realm db files
		*/
// 		$fname_Realm_DBFile_Latest = Utils::find_All_Realm_DBFiles_Names();
		
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
		
	}//public function add_memos()
	
	function beforeFilter() {

		//ref http://stackoverflow.com/questions/7426469/assigning-layout-in-cakephp answered Sep 15 '11 at 6:16
		parent::beforeFilter();
		$this->layout = 'default_memos';
		
	}
	
}