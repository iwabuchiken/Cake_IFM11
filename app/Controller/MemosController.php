<?php

class MemosController extends AppController {
	
// 	public $scaffold;
	
	public $helpers = array('Html', 'Form');
// 	public $helpers = array('Html', 'Form');

	//REF http://book.cakephp.org/2.0/en/core-libraries/components/pagination.html
	public $components = array('Paginator');

	public function index() {
		
		$opt = $this->index__opt();

// 		debug("\$opt =>");
// 		debug($opt);
		
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
		
		$opt_order = array("Memo.r_created_at" => "DESC");
// 		$opt_order = array("Memo.id" => "ASC");

		$conditions = $this->_index__FindMemos__Paginate__Conditions();
		
// 		$conditions = array("Memo.title LIKE" => "%食事%");
		
		if ($conditions != null) {
// 		if (isset($conditions)) {
		
			$paginate_array = array(
			
					'limit'			=> 10,
					'order'			=> $opt_order,
					'conditions'	=> $conditions
			);			
		
		} else {
		
			$paginate_array = array(
				
					'limit' => 10,
					'order' => $opt_order,
			);
			
		}//if (isset($conditions))
		
// 		debug($paginate_array);
		
		$this->paginate = $paginate_array;

// 		$this->paginate = array(
// 		// 					'conditions' => array('Image.file_name LIKE' => "%$filter_TableName%"),
// // 				'conditions' => $opt_conditions,
// 				// 					'conditions' => array('Image.memos LIKE' => "%$filter_TableName%"),
// 				'limit' => 10,
// // 				'limit' => 4,
// 				'order' => $opt_order,
					
// 				// 					'page'	=> 2,
					
// 		// 					'order' => array(
// 				// 							'id' => 'asc'
// 				// 					)
// 		);
			
// 		debug("paginator => set");
		
// 		return $this->paginate('Memo');
		$images = $this->paginate('Memo');
// 		$images = $this->paginate('Image');

		$paginateData = $this->params['paging']['Memo'];
		
		debug("\$paginateData['pageCount'] => ".$paginateData['pageCount']);
		
		//ref http://stackoverflow.com/questions/17093612/cakephp-how-to-get-total-number-of-records-retrieved-with-pagination answered Jun 13 '13 at 17:52
		debug("\$paginateData['count'] => ".$paginateData['count']);
// 		debug("\$paginateData =>");
// 		debug($paginateData);
		
		// return
		return $images;
		
	}//_index__FindMemos__Paginate()
	
	public function 
	_index__FindMemos__Paginate__Conditions() {

		// get => query
		@$search_string = $this->request->query['search_string'];
		
// 		debug($this->request->query);
		
// 		debug("\$search_string => '$search_string");

		// get => session value for ---> search_string
		@$session_Search_String = $this->Session->read(CONS::$session_Key_Search_String);
		
// 		debug("\$session_Search_String => \"".$session_Search_String."\"");
		
		// set search string
		if (!isset($search_string) && isset($session_Search_String)) {
			
			$search_string = $session_Search_String;
			
		} else if (isset($search_string) && !isset($session_Search_String)) {//!isset($search_string) && isset($session_Search_String)
			
			$this->Session->write(CONS::$session_Key_Search_String, $search_string);
			
		}//!isset($search_string) && isset($session_Search_String)
		
// 		debug("\$search_string is now ==> \"".$search_string."\"");
		
		// set search string
		if (isset($search_string)) {
		
			/*******************************
				in case of => '*'
			*******************************/
			if ($search_string == CONS::$clear_search_string) {
				
// 				debug("\$search_string IS => ".CONS::$clear_search_string);
				
// 			if ($search_string == "*") {
			
				// treat in => (isset($search_string)) --> false
				// nullify conditions
				$conditions = null;
			
				// clear session value
				$this->Session->write(CONS::$session_Key_Search_String, null);

				// update => value for the view
				$this->set("search_string", null);
				
			} else {
			
// 				debug("\$search_string is NOT => ".CONS::$clear_search_string);
				
				/*******************************
				 others
				*******************************/
				$conditions = array();
					
				$conditions['OR'] = array();
					
				array_push($conditions['OR'], array("Memo.title LIKE" => "%$search_string%"));
				array_push($conditions['OR'], array("Memo.body LIKE" => "%$search_string%"));
					
				// 			$conditions = array("Memo.title LIKE" => "%$search_string%");
				// 			$conditions = array("Memo.title LIKE" => $search_string);

				// set session value
				$this->Session->write(CONS::$session_Key_Search_String, $search_string);

				// update => value for the view
				$this->set("search_string", $search_string);
				
			}//if ($search_string == "*")
			
			
// 			/*******************************
// 				others
// 			*******************************/
// 			$conditions = array();
			
// 			$conditions['OR'] = array();
			
// 			array_push($conditions['OR'], array("Memo.title LIKE" => "%$search_string%"));
// 			array_push($conditions['OR'], array("Memo.body LIKE" => "%$search_string%"));
			
// // 			$conditions = array("Memo.title LIKE" => "%$search_string%");
// // 			$conditions = array("Memo.title LIKE" => $search_string);
		
		} else {
		
			$conditions = null;

			// clear session value
			$this->Session->write(CONS::$session_Key_Search_String, null);
			
			// update => value for the view
			$this->set("search_string", null);
				
		}//if (isset($search_string))
		
		
		
		// set message
		//ref http://php.net/manual/en/function.serialize.php
		$this->set("message_2", serialize($conditions));
// 		$this->set("message_2", $conditions);
		
		
		// return
		return $conditions;
// 		return null;
		
	}//_index__FindMemos__Paginate__Conditions()
	
	public function index__opt() {

// 		$conditions = array("Memo.title LIKE" => "%食事%");
		
		// build option
		if (isset($conditions)) {
			
			$opt = array(
		
				'order'			=> "Memo.r_created_at DESC",
				'conditions'	=> $conditions
// 				'order'		=> "Memo.id ASC"
		
			);
			
		} else {//isset($conditions)
			
			$opt = array(
			
					'order'		=> "Memo.r_created_at DESC"
	// 				'order'		=> "Memo.id ASC"
			
			);
			
		}//isset($conditions)
		
// 		debug($opt);
		
		// return
		return $opt;
		
	}//index__opt()
	
	public function add_memos() {

		debug("add_memos");

		/*******************************
		 get: db file names => from sqlite db
		*******************************/
		$aryOf_Realm_DBFile_Names__From_SqliteDB = 
					Utils::find_All_Realm_DBFile_Names__From_SqliteDB();
		
		debug("\$aryOf_Realm_DBFile_Names__From_SqliteDB => ");
		debug($aryOf_Realm_DBFile_Names__From_SqliteDB);

// 		// validate
// 		if (count($aryOf_Realm_DBFile_Names__From_SqliteDB) < 1) {
				
// 			$this->set("message", "no db files in the sqlite db");
				
// 			return;
				
// 		}//count($aryOf_Realm_DBFile_Names__From_Directory) < 1
		
		/*******************************
		 get: db file names => from directory
		*******************************/
		$aryOf_Realm_DBFile_Names__From_Directory =
					Utils::find_All_Realm_DBFile_Names__From_Directory();
		
		debug("\$aryOf_Realm_DBFile_Names__From_Directory => ");
		debug($aryOf_Realm_DBFile_Names__From_Directory);
		
		// validate
		if (count($aryOf_Realm_DBFile_Names__From_Directory) < 1) {
			
			$this->set("message", "no db files in the directory");
			
			return;
			
		}//count($aryOf_Realm_DBFile_Names__From_Directory) < 1
		
		/*******************************
			array push
		*******************************/
		$aryOf_Realm_DBFile_Names__UnInserted = array();
		
		// if no entries in the sqlite db
		//		=> push all items to 'Uninseted' array
		if (count($aryOf_Realm_DBFile_Names__From_SqliteDB) < 1) {
		
			$aryOf_Realm_DBFile_Names__UnInserted = $aryOf_Realm_DBFile_Names__From_Directory;
		
		} else {
		
			foreach ($aryOf_Realm_DBFile_Names__From_Directory as $item) {
			
				//ref in_array http://www.w3schools.com/php/func_array_in_array.asp
				if (!in_array($item, $aryOf_Realm_DBFile_Names__From_SqliteDB)) {
					
					array_push($aryOf_Realm_DBFile_Names__UnInserted, $item);
					
				}//!in_array($item, $aryOf_Realm_DBFile_Names__From_SqliteDB);
				
			}//foreach ($aryOf_Realm_DBFile_Names__From_Directory as $item)
			
		}//if (count($aryOf_Realm_DBFile_Names__From_SqliteDB) < 1)
		
		
		
		debug("\$aryOf_Realm_DBFile_Names__UnInserted =>");
		debug($aryOf_Realm_DBFile_Names__UnInserted);
		
		// validate
		if (count($aryOf_Realm_DBFile_Names__UnInserted) < 1) {
			
			$this->set("message", "no new db files for insertion");
			
			return;
			
		} else {//count($aryOf_Realm_DBFile_Names__From_Directory) < 1

			$this->set("message", 
					"files for insertion => "
					.count($aryOf_Realm_DBFile_Names__UnInserted)." files");
			
		}//count($aryOf_Realm_DBFile_Names__From_Directory) < 1
		
		/*
		 * execute
		 */
		foreach ($aryOf_Realm_DBFile_Names__UnInserted as $item) {
		
			$this->_add_memos__execute($item);
			
		}//foreach ($aryOf_Realm_DBFile_Names__UnInserted as $item)
		
	}//add_memos

	public function 
	_add_memos__execute($fname_Realm_DBFile_Latest) {
// 	public function _add_memos__execute() {

		/*
		 * get: name of the latest realm db files
		*/
// 		$fname_Realm_DBFile_Latest = Utils::find_All_Realm_DBFiles_Names();
		
		debug("\$fname_Realm_DBFile_Latest => $fname_Realm_DBFile_Latest");
// 		debug($fname_Realm_DBFile_Latest);
		
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
		
// 		debug($aryOf_Memos__CSV_File == null ? "null" : "CSV file => ".count($aryOf_Memos__CSV_File));
		
		/*
		 * memos: from csv db & not in Cake db
		*/
		$aryOf_Memos__CSV_File__Filtered =
			Utils::filter_Memos_From_CSVFile__NotIn_CakeDB($aryOf_Memos__CSV_File);
		
// 		debug("count(\$aryOf_Memos__CSV_File__Filtered) => "
// 				.count($aryOf_Memos__CSV_File__Filtered));
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
		
		// insert => record
// 		$numOf_Memos__Inserted = 0;
		
		$res = Utils::insert_Data__Realm_DBFiles(
							$fname_Realm_DBFile_Latest, $numOf_Memos__Inserted);
		
	}//public function add_memos()
	
	function beforeFilter() {

		//ref http://stackoverflow.com/questions/7426469/assigning-layout-in-cakephp answered Sep 15 '11 at 6:16
		parent::beforeFilter();
		$this->layout = 'default_memos';
		
	}
	
}