<?php

/*
C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\
	=> app diretory
/cake_apps/Cake_IFM11

 * 
 * 
 */


class ImagesController extends AppController {
	
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

// 		//debug
// 		debug("host => ".Utils::get_HostName());
		
		/**********************************
		 * sort
		**********************************/
		$opt_order = $this->_index_Order();

		@$filter_TableName = $this->request->query['filter_table_name'];

		@$filter_Memo = $this->request->query['filter_memo'];

		$opt_conditions = $this->_index__Options();

// 		//test
// 		$opt_conditions = array("Image.memos LIKE" => array("palnts", "闃ｱ"));	//=>  General error: 1 near ",": syntax error
		
// 		debug($opt_conditions);
		
		/**********************************
		* Build: list
		**********************************/
		$param_Paginate = array(
				
				'conditions' => $opt_conditions,
				
				'limit' => 4,
				
				'order' => $opt_order,
				
		);
		
// 		debug($param_Paginate);
		
		$this->paginate = $param_Paginate;
		
// 		$this->paginate = array(
				
// 				'conditions' => $opt_conditions,
				
// 				'limit' => 4,
				
// 				'order' => $opt_order,
				
// 		);
			
		$images = $this->paginate('Image');

		$paginateData = $this->params['paging']['Image'];
		
		/**********************************
		 * set: meta data
		**********************************/
		$this->set('total_num_of_images', count($this->Image->find('all')));
		
		$this->set('num_of_pages', $paginateData['pageCount']);  
		
		$this->set('current_page', $paginateData['page']);  
		
// 		debug("\$paginateData['pageCount'] => ".$paginateData['pageCount']);
		
		$this->set('num_of_images_filtered', $paginateData['count']);  
		
		/**********************************
		 * set: images
		**********************************/
		$this->set('images', $images);

		/*******************************
			set: vars
		*******************************/
		$direction = "desc";
		
// 		Utils::build_URL__Sort(CONS::$key_Build_URL__Column_FileName, $direction);
// 		Utils::build_URL(CONS::$key_Build_URL__Column_FileName);
// 		Utils::test__Build_URI();
		
		
		
		/**********************************
		* store: current url
		**********************************/
		//REF http://book.cakephp.org/2.0/ja/core-libraries/components/sessions.html
		
// 		$current_url = Router::url('/', true ).substr($this->here, strlen($this->webroot));
// 		$this->Session->write('current_url', $current_url);

// 		//test
// 		$key = CONS::$key_Build_URL__Column_ID;
// 		$direction = "desc";
		
// 		$tmp = Utils::build_URL__Sort($key, $direction);
		
// 		debug("new url => ".$tmp);
		
// 		$key = CONS::$key_Build_URL__Column_FileName;
// 		$direction = "desc";
		
// 		$tmp = Utils::build_URL__Sort($key, $direction);
		
// 		debug("new url => ".$tmp);
		
	}//public function index()

	public function
	_index_Order() {
	
		/*******************************
		 get query
		*******************************/
		$sort_name = @$this->request->query['sort'];
	
		$sort_direction = @$this->request->query['direction'];

		$dflt_SortName = CONS::$dflt_SortName;	//=> 'id'
		
// 		debug("\$this->request->query ...");
// 		debug($this->request->query);
		
// 		debug("\$this->request ...");
// 		debug($this->request);
	
		/*******************************
		 prep: vars
		*****************************/
		/*******************************
		 direction
		*******************************/
// 		$val_Session_SortName = "sort_name";
	
// 		$val_Session_Direction__ASC = "asc";
// 		$val_Session_Direction__DESC = "desc";
	
		$current_Sort = "";
		$current_Direction = "";
	
// 		$dflt_Session_SortName = "id";
	
		/*******************************
		 judge: query::sort_name ?
		*******************************/
		$current_Sort = $this->_index_Order__Current_SortName(
								$sort_name, $dflt_SortName);

		/*******************************
		 judge: query::sort_direction ?
		*******************************/
		$current_Direction = $this->_index_Order__Current_SortDirection(
// 		$current_Direction = $this->_index_2__Sort__Switch_Direction(
						$sort_direction);
					
		/*******************************
		 set
		*******************************/
			// 		$opt_order = array("Image.".$sort_name => $sort_direction);
		$opt_order = array();
	
		$this->set("sort", $current_Sort);
		// 		$this->set("sort", $sort_name);
	
		$this->set("direction", $current_Direction);
		// 		$this->set("direction", $sort_direction);
	
		/*******************************
		 return
		*******************************/
		$opt_order = array("Image.".$current_Sort => $current_Direction);
		// 		$opt_order = array("Image.".$sort_name => $sort_direction);
	
		return $opt_order;
	
	}//_index_Order
	
	public function
	_index_Order__Current_SortName
	($sort_name, $dflt_SortName) {
// 	($sort_name, $val_Session_SortName, $dflt_Session_SortName) {
	
		if ($sort_name == null) {
	
// 			debug("\$sort_name => null");
	
			$current_Sort = $dflt_SortName;
	
		} else {//$sort_name == null
	
			// set: current sort name
			$current_Sort = $sort_name;
	
		}//$sort_name == null
	
	
// 		debug("\$current_Sort => ".$current_Sort);
	
		/*******************************
		 return
		*******************************/
		return $current_Sort;
	
	}//_index_Order__Current_SortName
	
	public function
	_index_Order__Current_SortDirection
	($sort_direction) {
	
		/*******************************
		 vars
		*******************************/
		$current_Direction = "";
	
		/*******************************
		 judge
		*******************************/
		if ($sort_direction == null) {
				
			$current_Direction = CONS::$dflt_SortDirection;
	
		} else {//if ($sort_direction == null)

			if ($sort_direction == CONS::$str_Sort_ASC || $sort_direction == CONS::$str_Sort_DESC) {
			
				$current_Direction = $sort_direction;
			
			} else {
			
				$current_Direction = CONS::$dflt_SortDirection;
				
			}//if ($sort_direction == CONS::$str_Sort_ASC || $sort_direction == CONS::$str_Sort_DESC)
			
		}////if ($sort_direction == null)
	
		/*******************************
		 return
		*******************************/
// 		debug("\$current_Direction => ".$current_Direction);
	
		return $current_Direction;
	
	}//_index_Order__Current_SortDirection
	
	
	
// 	public function index() {
	public function index_2() {
		
		/*******************************
			setup: params
		*******************************/
// 		$opt_order = $this->_index__Sort();
		$opt_order = $this->_index_2__Sort();

		$opt_conditions = $this->_index_2__Options();
// 		$opt_conditions = $this->_index__Options();
		
// 		debug("\$opt_conditions ...");
// 		debug($opt_conditions);
		
		/*******************************
			paginate
		*******************************/
		/**********************************
		 * Build: list
		**********************************/
		$param_Paginate = array(
		
				'conditions' => $opt_conditions,
		
				'limit' => 4,
		
				'order' => $opt_order,
		
		);
		
// 		debug($param_Paginate);
		
		$this->paginate = $param_Paginate;
		
		$images = $this->paginate('Image');
		
// 		debug("count(\$images) => ".count($images));
		
// 		$paginateData = $this->params['paging']['Image'];
		
// 		debug("\$paginateData =>");
// 		debug($paginateData);
		
// 		debug("index_2");
		
// 		$this->render("/Elements/plain");
		
		/*******************************
			set: meta data
		*******************************/
		$this->_index_2__Set_Page_Data();
		
// 		$this->set('total_num_of_images', $paginateData['count']);
		
// 		$this->set('num_of_pages', $paginateData['pageCount']);
		
// 		$this->set('current_page', $paginateData['page']);
		
// 		// 		debug("\$paginateData['pageCount'] => ".$paginateData['pageCount']);
		
// 		$this->set('num_of_images_filtered', $paginateData['count']);
		
		/**********************************
		 * set: images
		**********************************/
		$this->set('images', $images);
		
		
	}
	
	public function
	_index_2__Set_Page_Data() {
	
		/*******************************
			images data
		*******************************/
		$paginateData = $this->params['paging']['Image'];
		
		$this->set('total_num_of_images', $paginateData['count']);
		
		$this->set('num_of_pages', $paginateData['pageCount']);
		
		$this->set('current_page', $paginateData['page']);
		
		// 		debug("\$paginateData['pageCount'] => ".$paginateData['pageCount']);
		
		$this->set('num_of_images_filtered', $paginateData['count']);

		/*******************************
			params data: filter memo
		*******************************/
		@$query_Filter_Memo = $this->request->query[CONS::$str_Filter_Memo];
// 		@$query_Filter_Memo = $this->request->query[$filter_memo];
		
// 		debug("\$query_Filter_Memo => ".$query_Filter_Memo);

// 		debug("\$this->request->query ...");
// 		debug($this->request->query);
		
		if ($query_Filter_Memo == CONS::$str_Filter_Memo_all) {
		
			$this->set("filter_memo", '');
		
		} else if ($query_Filter_Memo == null) {//if ($query_Filter_Memo == CONS::$str_Filter_Memo_all)
		
			/**********************************
			 * set: var
			**********************************/
			$this->set("filter_memo", null);
	
		} else {//if ($query_Filter_Memo == CONS::$str_Filter_Memo_all)

			$this->set("filter_memo", $query_Filter_Memo);
			
		}

		/*******************************
		 params data: filter memo: AND_OR
		*******************************/
		@$AND_OR = $this->request->query[CONS::$str_Filter_RadioButtons_Name_Memo];

// 		debug("\$AND_OR => ".$AND_OR);
		
		if ($AND_OR == null) {
// 			RBs_AND_OR_Memo
			$this->set(CONS::$str_Filter_RadioButtons_Name_Memo, null);
// 			$this->set("pageVar_AndOr_Memo", null);
// 			$this->set(CONS::$pageVar_AndOr_Memo, null);
		
		} else {
		
			$this->set(CONS::$str_Filter_RadioButtons_Name_Memo, $AND_OR);

		}//if ($AND_OR == null)
		
		/*******************************
		 params data: filter file name
		*******************************/
		@$query_Filter_File_Name = $this->request->query[CONS::$str_Filter_File_Name];
// 		@$query_Filter_File_Name = $this->request->query[$filter_file_name];
		
// 		debug("\$query_Filter_File_Name => ".$query_Filter_File_Name);
		
		if ($query_Filter_File_Name == CONS::$str_Filter_File_Name_all) {
		
			$this->set("filter_file_name", '');
		
		} else if ($query_Filter_File_Name == null) {
		
			$this->set("filter_file_name", null);
		
		} else {
		
			$this->set("filter_file_name", $query_Filter_File_Name);
		
		}

		/*******************************
		 params data: filter file name: AND_OR
		*******************************/
		@$AND_OR__FileName = $this->request->query[CONS::$str_Filter_RadioButtons_Name_File_Name];
// 		@$AND_OR = $this->request->query[CONS::$str_Filter_RadioButtons_Name_Memo];
		
		// 		debug("\$AND_OR => ".$AND_OR);
		
		if ($AND_OR__FileName == null) {
			// 			RBs_AND_OR_Memo
			$this->set(CONS::$str_Filter_RadioButtons_Name_File_Name, null);
			// 			$this->set("pageVar_AndOr_Memo", null);
			// 			$this->set(CONS::$pageVar_AndOr_Memo, null);
		
		} else {
		
			$this->set(CONS::$str_Filter_RadioButtons_Name_File_Name, $AND_OR__FileName);
		
		}//if ($AND_OR == null)
		
	}//_index_2__Set_Page_Data()
	
	
	public function
	_test_CreateModel() {
		
		$this->Image->create();

		$this->Image->set("created_at", Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]));
		
		$this->Image->save();
		
// 		debug("model created");
		
// 			$this->request->data['Image']['created_at'] =
// 				Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]);
				
// 			$this->request->data['Image']['updated_at'] =
// 				Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]);
				
// 			if ($this->Image->save($this->request->data)) {
	
		
	}
	
	public function
	test_Use_Session($use_plain_view = 0) {
// 	test_Use_Session($use_plain_view) {
// 	test_Use_Session() {

// 		debug("test_Use_Session");
// 		debug("_test_Use_Session");

		$session_Key = "abcdef";
// 		$session_Key = "abc";
		
		$session_Value = "ABCDEF";
// 		$session_Value = "DEF";
		
		// write session
		$this->Session->write($session_Key, $session_Value);
		
		// read session
		$tmp = $this->Session->read($session_Key);
		
// 		debug("\$tmp => ".$tmp);

// 		//test
// 		debug($this->Paginator->url());	//=> undefined
		
// 		debug($_SESSION);
		
// 		phpinfo();
		
		if ($use_plain_view == 1) {
// 		if ($use_plain_view == true) {
			
			$this->render("/Elements/plain");
			
		}//$use_plain_view == true
		
// 		$this->render("/Elements/plain");
		
	}//_test_Use_Session

	public function
	_index_2__Sort() {

		/*******************************
		 get query
		*******************************/
		$sort_name = @$this->request->query['sort'];
		
		$sort_direction = @$this->request->query['direction'];
		
		$switch_direction = @$this->request->query['switch_direction'];

		/*******************************
			set: view variables
		*******************************/
		if ($sort_name != null) {
			
			$this->set("query_SortName", $sort_name);
			
		}//$sort_name != null
		
		if ($sort_direction != null) {
			
			$this->set("query_SortDirection", $sort_direction);
			
		}//$sort_name != null
		
		
		/*******************************
		 prep: vars
		*****************************/
		/*******************************
		 direction
		*******************************/
		// 		$val_Session_Direction = "direction";
		$val_Session_Direction = CONS::$session_Key_Direction;
		
		$val_Session_SortName = "sort_name";
		
		$val_Session_Direction__ASC = "asc";
		$val_Session_Direction__DESC = "desc";
		
		$current_Sort = "";
		$current_Direction = "";
		
		$dflt_Session_SortName = "id";
		
		/*******************************
		 judge: query::sort_name ?
		*******************************/
		$current_Sort = $this->_index_2__Sort__Current_SortName(
				$sort_name,
				$val_Session_SortName,
				$dflt_Session_SortName);
		
		/*******************************
		 judge: switch direction?
		*******************************/
		//test: prep --> pagination page?
		//ref http://stackoverflow.com/questions/6768793/get-the-full-url-in-php answered Jul 20 '11 at 21:33
		$uri = $_SERVER['REQUEST_URI'];
		
// 		debug("\$uri => ".$uri);
		
		//ref http://stackoverflow.com/questions/4366730/check-if-string-contains-specific-words answered Dec 6 '10 at 13:15
		$has_Page_Param = strpos($uri, "page:");
		
		// 		debug("\$has_Page_Param => ".$has_Page_Param);
		
		// 		debug($has_Page_Param === true ?
		// 					"\$has_Page_Param => true" : "\$has_Page_Param => false");
		
		// 		if (strpos($a, 'are') !== false) {
		// 			echo 'true';
		// 		}
		
		// 		//test
		//		//ref http://book.cakephp.org/3.0/en/views/helpers/paginator.html
		// 		$result = $this->Paginator->templates('number');
		
		// 		debug("\$this->Paginator->templates('number') => ".$result);
		
		
		
		
		if ($switch_direction == null) {
		
		// 				debug("\$switch_direction => null");
				
			/*******************************
			judge: query::sort_direction ?
			*******************************/
			$current_Direction = $this->_index_2__Sort__Current_Direction(
			$sort_direction,
			$val_Session_Direction,
			$val_Session_Direction__ASC,
			$val_Session_Direction__DESC);
		
		} else {
		
// 		debug("\$switch_direction => '".$switch_direction."'");
		
			// validate
			if ($switch_direction != CONS::$param_Val_Switch_Direction__ON) {
					// 			if ($switch_direction != CONS::$param_Val_Switch_Direction__ON
						// 					&& $switch_direction != CONS::$param_Val_Switch_Direction__OFF) {
		
						debug("unknown switch_direction value => $switch_direction");
		
						/*******************************
						judge: query::sort_direction ?
						*******************************/
						$current_Direction = $this->_index_2__Sort__Current_Direction(
								$sort_direction,
								$val_Session_Direction,
								$val_Session_Direction__ASC,
								$val_Session_Direction__DESC);
		
					} else if ($has_Page_Param !== false) {
					// 			} else if ($has_Page_Param === true) {
		
					debug("pagination param in the uri ==> not switching the direction");
		
						/*******************************
				 judge: query::sort_direction ?
						*******************************/
						 $current_Direction = $this->_index_2__Sort__Current_Direction(
						 		$sort_direction,
						 		$val_Session_Direction,
						 		$val_Session_Direction__ASC,
						 		$val_Session_Direction__DESC);
		
					} else {//$switch_direction != CONS::$param_Val_Switch_Direction__ON && $switch_direction != CONS::$param_Val_Switch_Direction__OFF
		
						/*******************************
						judge: query::sort_direction ?
						*******************************/
						$current_Direction = $this->_index_2__Sort__Switch_Direction(
						$sort_direction,
						$val_Session_Direction,
						$val_Session_Direction__ASC,
						$val_Session_Direction__DESC);
							
					}//$switch_direction != CONS::$param_Val_Switch_Direction__ON && $switch_direction != CONS::$param_Val_Switch_Direction__OFF
						
		}//if ($switch_direction == null)
		
		
	
		// 		/*******************************
		// 		 judge: query::sort_direction ?
		// 		*******************************/
		// 		$current_Direction = $this->_index_2__Sort__Current_Direction(
		// 								$sort_direction,
		// 								$val_Session_Direction,
		// 								$val_Session_Direction__ASC,
		// 								$val_Session_Direction__DESC);
	
		/*******************************
		set
		*******************************/
		// 		$opt_order = array("Image.".$sort_name => $sort_direction);
		$opt_order = array();
	
		$this->set("sort", $current_Sort);
		// 		$this->set("sort", $sort_name);
	
		$this->set("direction", $current_Direction);
		// 		$this->set("direction", $sort_direction);
	
		/*******************************
		return
		*******************************/
		$opt_order = array("Image.".$current_Sort => $current_Direction);
		// 		$opt_order = array("Image.".$sort_name => $sort_direction);
	
		return $opt_order;
		
	}//_index__Sort
			
	public function
	_index__Sort() {
// 	_index_2__Sort() {

		/*******************************
			get query
		*******************************/
		$sort_name = @$this->request->query['sort'];
		
		$sort_direction = @$this->request->query['direction'];
		
		$switch_direction = @$this->request->query['switch_direction'];
		
// 		debug("\$sort_name => '".$sort_name."' / "."\$sort_direction => '".$sort_direction."'");
		
// 		debug("\$this->request->query ...");
// 		debug($this->request->query);
		
		/*******************************
			prep: vars
		*****************************/
		/*******************************
		 direction
		*******************************/
// 		$val_Session_Direction = "direction";
		$val_Session_Direction = CONS::$session_Key_Direction;
		
		$val_Session_SortName = "sort_name";
		
		$val_Session_Direction__ASC = "asc";
		$val_Session_Direction__DESC = "desc";
		
		$current_Sort = "";
		$current_Direction = "";
		
		$dflt_Session_SortName = "id";
		
		/*******************************
			judge: query::sort_name ?
		*******************************/
		$current_Sort = $this->_index_2__Sort__Current_SortName(
								$sort_name, 
								$val_Session_SortName, 
								$dflt_Session_SortName);

		/*******************************
			judge: switch direction?
		*******************************/
		//test: prep --> pagination page?
		//ref http://stackoverflow.com/questions/6768793/get-the-full-url-in-php answered Jul 20 '11 at 21:33
		$uri = $_SERVER['REQUEST_URI'];
		
// 		debug("\$uri => ".$uri);
		
		//ref http://stackoverflow.com/questions/4366730/check-if-string-contains-specific-words answered Dec 6 '10 at 13:15
		$has_Page_Param = strpos($uri, "page:");

// 		debug("\$has_Page_Param => ".$has_Page_Param);
		
// 		debug($has_Page_Param === true ? 
// 					"\$has_Page_Param => true" : "\$has_Page_Param => false");
		
// 		if (strpos($a, 'are') !== false) {
// 			echo 'true';
// 		}		
		
// 		//test
//		//ref http://book.cakephp.org/3.0/en/views/helpers/paginator.html
// 		$result = $this->Paginator->templates('number');
		
// 		debug("\$this->Paginator->templates('number') => ".$result);
		
		
		
		
		if ($switch_direction == null) {
		
// 				debug("\$switch_direction => null");
			
			/*******************************
			 judge: query::sort_direction ?
			*******************************/
			$current_Direction = $this->_index_2__Sort__Current_Direction(
					$sort_direction,
					$val_Session_Direction,
					$val_Session_Direction__ASC,
					$val_Session_Direction__DESC);
						
		} else {
		
// 			debug("\$switch_direction => '".$switch_direction."'");

			// validate
			if ($switch_direction != CONS::$param_Val_Switch_Direction__ON) {
// 			if ($switch_direction != CONS::$param_Val_Switch_Direction__ON 
// 					&& $switch_direction != CONS::$param_Val_Switch_Direction__OFF) {
				
				debug("unknown switch_direction value => $switch_direction");
				
				/*******************************
				 judge: query::sort_direction ?
				*******************************/
				$current_Direction = $this->_index_2__Sort__Current_Direction(
						$sort_direction,
						$val_Session_Direction,
						$val_Session_Direction__ASC,
						$val_Session_Direction__DESC);
								
			} else if ($has_Page_Param !== false) {
// 			} else if ($has_Page_Param === true) {
				
				debug("pagination param in the uri ==> not switching the direction");
				
				/*******************************
				 judge: query::sort_direction ?
				*******************************/
				$current_Direction = $this->_index_2__Sort__Current_Direction(
						$sort_direction,
						$val_Session_Direction,
						$val_Session_Direction__ASC,
						$val_Session_Direction__DESC);
								
			} else {//$switch_direction != CONS::$param_Val_Switch_Direction__ON && $switch_direction != CONS::$param_Val_Switch_Direction__OFF
				
				/*******************************
				 judge: query::sort_direction ?
				*******************************/
				$current_Direction = $this->_index_2__Sort__Switch_Direction(
						$sort_direction,
						$val_Session_Direction,
						$val_Session_Direction__ASC,
						$val_Session_Direction__DESC);
			
			}//$switch_direction != CONS::$param_Val_Switch_Direction__ON && $switch_direction != CONS::$param_Val_Switch_Direction__OFF
			
		}//if ($switch_direction == null)
		
		
		
// 		/*******************************
// 		 judge: query::sort_direction ?
// 		*******************************/
// 		$current_Direction = $this->_index_2__Sort__Current_Direction(
// 								$sort_direction, 
// 								$val_Session_Direction, 
// 								$val_Session_Direction__ASC, 
// 								$val_Session_Direction__DESC);
		
		/*******************************
			set
		*******************************/
// 		$opt_order = array("Image.".$sort_name => $sort_direction);
		$opt_order = array();
		
		$this->set("sort", $current_Sort);
// 		$this->set("sort", $sort_name);
		
		$this->set("direction", $current_Direction);
// 		$this->set("direction", $sort_direction);

		/*******************************
			return
		*******************************/
		$opt_order = array("Image.".$current_Sort => $current_Direction);
// 		$opt_order = array("Image.".$sort_name => $sort_direction);
		
		return $opt_order;
		
	}//_index_2__Sort
	
	public function
	_index_2__Sort__Current_SortName
	($sort_name, $val_Session_SortName, $dflt_Session_SortName) {

		if ($sort_name == null) {
		
// 			debug("\$sort_name => null");
			/*******************************
			 judge: session => has a value for sort_name?
			*******************************/
			// read the sessin value
			@$session_SortName = $this->Session->read($val_Session_SortName);
		
			if ($session_SortName == null) {
		
// 				debug("\$session_SortName => null");
		
				// update session value
				$this->Session->write($val_Session_SortName, $dflt_Session_SortName);
		
				$current_Sort = $dflt_Session_SortName;
		
			} else {//if ($session_SortName == null)
		
// 				debug("\$session_SortName => $session_SortName");
		
				// set the current sort name
				$current_Sort = $session_SortName;
		
			}//if ($session_SortName == null)
				
				// 			debug("\$session_SortName => ".$session_SortName);
				
		} else {//$sort_name == null
				
// 			debug("request->query['sort'] => ".$this->request->query['sort']);
				
			// update: session value
			// update session value
			$this->Session->write($val_Session_SortName, $sort_name);
		
			// set: current sort name
			$current_Sort = $sort_name;
				
		}//$sort_name == null
		
		
// 		debug("\$current_Sort => ".$current_Sort);
		
		/*******************************
			return
		*******************************/
		return $current_Sort;
		
	}//_index_2__Sort__Current_SortName
	
	public function
	_index_2__Sort__Current_Direction(
				$sort_direction,
				$val_Session_Direction,
				$val_Session_Direction__ASC,
				$val_Session_Direction__DESC) {

		/*******************************
			vars
		*******************************/
		$current_Direction = "";
		
		
		/*******************************
			judge
		*******************************/
		if ($sort_direction == null) {
			
// 				debug("\$sort_direction => null");

			/*******************************
			 judge: session => has a value for sort_direction?
			*******************************/
			// read the sessin value
			@$session_Direction = $this->Session->read($val_Session_Direction);
			
			if ($session_Direction == null) {
			
// 				debug("\$session_SortName => null");
			
				// update session value
				$this->Session->write($val_Session_Direction, $val_Session_Direction__ASC);
			
				$current_Direction = $val_Session_Direction__ASC;
			
			} else {//if ($session_SortName == null)
			
// 				debug("\$session_Direction => $session_Direction");
			
				// set the current sort name
				$current_Direction = $session_Direction;
			
			}//if ($session_SortName == null)
			
			// 			debug("\$session_SortName => ".$session_SortName);
			
		} else {//if ($sort_direction == null)

			// update session value
			$this->Session->write($val_Session_Direction, $sort_direction);
				
			$current_Direction = $sort_direction;
				
		}//if ($sort_direction == null)
		
		/*******************************
			return
		*******************************/
// 		debug("\$current_Direction => ".$current_Direction);
		
		return $current_Direction;
		
	}//_index_2__Sort__Current_Direction
	
	public function
	_index_2__Sort__Switch_Direction(
				$sort_direction,
				$val_Session_Direction,
				$val_Session_Direction__ASC,
				$val_Session_Direction__DESC) {

		/*******************************
			vars
		*******************************/
		$current_Direction = "ASC";
// 		$current_Direction = "";
		
		
		/*******************************
			judge
		*******************************/
		// read the sessin value
		@$session_Direction = $this->Session->read($val_Session_Direction);
		
		debug("current \$session_Direction => '".$session_Direction."'");
		
		// session value => exists?
		if ($session_Direction != null) {
		
			// value ==> asc?
			if ($session_Direction == CONS::$session_Value__Direction_ASC) {

				debug("\$session_Direction => ".CONS::$session_Value__Direction_ASC);
				
				// update session value
				$this->Session->write($val_Session_Direction, 
							CONS::$session_Value__Direction_DESC);

				$current_Direction = CONS::$session_Value__Direction_DESC;
				
				//test
				$tmp = $this->Session->read($val_Session_Direction);
				
				debug("session read => $tmp");
				
			} else {
			
				debug("\$session_Direction => ".CONS::$session_Value__Direction_DESC);
				
				// update session value
				$this->Session->write($val_Session_Direction,
						CONS::$session_Value__Direction_ASC);
				
				$current_Direction = CONS::$session_Value__Direction_ASC;
								
			}//if ($session_Direction)
			
			
			
		} else {//if ($session_Direction != null)
		
			debug("\$session_Direction => null");
			
			/*******************************
				set: default
			*******************************/
			debug("writing a session value...");
			
			debug("\$val_Session_Direction => ".$val_Session_Direction
					." / "."CONS::\$session_Value__Direction_ASC => "
					.CONS::$session_Value__Direction_ASC);
			
			// update session value
			$res = $this->Session->write($val_Session_Direction,
					CONS::$session_Value__Direction_ASC);
			
// 			debug("CONS::\$session_Value__Direction_ASC => "
// 					.CONS::$session_Value__Direction_ASC);
			
			debug("\$this->Session->write(\$val_Session_Direction => '".$res."'");
			
			$current_Direction = CONS::$session_Value__Direction_ASC;
			
			//test
			$tmp = $this->Session->read($val_Session_Direction);
			
			debug("\$this->Session->read(\$val_Session_Direction) => '$tmp'");
			
		}//if ($session_Direction != null)
		
		
		debug("\$current_Direction => ".$current_Direction);
		
		/*******************************
			return
		*******************************/
		return $current_Direction;
		
	}//_index_2__Sort__Switch_Direction
	
	
	public function
	_index__Options() {

// 		debug("_index__Options");
		
		/*******************************
			memo
		*******************************/
		$opt_conditions = array();
		
		$opt_conditions = $this->_index__Options__Memo($opt_conditions);

// 		/*******************************
// 			table name
// 		*******************************/
// 		$opt_conditions = $this->_index__Options__TableName($opt_conditions);

		/*******************************
			id
		*******************************/
		$opt_conditions = $this->_index__Options__Id($opt_conditions);

		/*******************************
			file name
		*******************************/
		$opt_conditions = $this->_index__Options__FileName($opt_conditions);

		/**********************************
		 * return
		**********************************/
		
		return $opt_conditions;

	}//_index__Options
	
	public function
	_index_2__Options() {

		/*******************************
			memo
		*******************************/
		$opt_conditions = array();
		
// 		$opt_conditions = $this->_index__Options__Memo($opt_conditions);
		$opt_conditions = $this->_index_2__Options__Memo($opt_conditions);
		
// 		$tmp = $this->_index_2__Options__Memo($opt_conditions);

// 		debug("\$this->_index_2__Options__Memo ...");
// 		debug($tmp);
		
		/*******************************
			table name
		*******************************/
// 		$opt_conditions = $this->_index__Options__TableName($opt_conditions);

		/*******************************
		 id
		 *******************************/
		$opt_conditions = $this->_index__Options__Id($opt_conditions);
		
		/*******************************
			file name
		*******************************/
		$opt_conditions = $this->_index_2__Options__FileName($opt_conditions);
// 		$opt_conditions = $this->_index__Options__FileName($opt_conditions);

		/**********************************
		 * return
		**********************************/
		
		return $opt_conditions;

	}//_index_2__Options
	
	
	public function 
	_index__Options__Memo($opt_conditions) {

// 		debug("_index__Options__Memo");
		
		/*******************************
			get: AND, OR
		*******************************/
		@$AND_OR = $this->request->query[CONS::$str_Filter_RadioButtons_Name_Memo];
		
		
		
// 		debug($AND_OR);
		
		/**********************************
		 * param: filter: hin
		**********************************/
		$filter_memo = CONS::$str_Filter_Memo;
		
// 		$opt_conditions = array();
		
		@$query_Filter_Memo = $this->request->query[$filter_memo];
		
// 		debug("\$query_Filter_Memo => '".$query_Filter_Memo."'");
		
		if ($query_Filter_Memo == CONS::$str_Filter_Memo_all) {
			// 		if ($query_Filter_Hins == "-1") {
		
			$this->Session->write($filter_memo, null);
		
			$this->set("filter_memo", '');
		
		} else if ($query_Filter_Memo == null) {
		
			@$session_Filter = $this->Session->read($filter_memo);
		
			if ($session_Filter != null) {

				if ($AND_OR != null) {
				
					$opt_conditions = $this->_index__Options__Memo_AndOr(
														$opt_conditions, $session_Filter, $AND_OR);
					
				} else {
				
				
					$opt_conditions['Image.memos LIKE'] = "%$session_Filter%";
				
				}
				
				
// 				if ($AND_OR != null) {
				
// 					$tokens = explode(" ", $session_Filter);
					
// 					debug($tokens);
					
// 					if ($AND_OR == CONS::$str_Filter_RadioButtons_Memo_AND) {
					
					
// 					} else if ($AND_OR == CONS::$str_Filter_RadioButtons_Memo_OR) {
					
					
					
// 					}
				
				
// 				} else {
				
				
// 					$opt_conditions['Image.memos LIKE'] = "%$session_Filter%";
				
// 				}
				
				
				// 				$opt_conditions['Token.hin'] = "DISTINCT ".$session_Filter;
// 				$opt_conditions['Image.memos LIKE'] = "%$session_Filter%";
		
				/**********************************
				 * set: var
				**********************************/
				$this->set("filter_memo", $session_Filter);
		
			} else {
		
				/**********************************
				 * set: var
				**********************************/
				$this->set("filter_memo", null);
		
			}
		
		} else {

			if ($AND_OR != null) {
			
// 				debug("\$AND_OR => NOT null");
				
				$opt_conditions = $this->_index__Options__Memo_AndOr(
						$opt_conditions, $query_Filter_Memo, $AND_OR);
					
			} else {
			
// 				debug("\$AND_OR => null");
			
				$opt_conditions['Image.memos LIKE'] = "%$query_Filter_Memo%";
			
			}
				
			
// 			if ($AND_OR != null) {
			
// 				$tokens = explode(" ", $query_Filter_Memo);
					
// 				debug($tokens);
					
// 				if ($AND_OR == CONS::$str_Filter_RadioButtons_Memo_AND) {
						
						
// 				} else if ($AND_OR == CONS::$str_Filter_RadioButtons_Memo_OR) {
						
						
						
// 				}
			
			
// 			} else {
			
			
// 				$opt_conditions['Image.memos LIKE'] = "%$query_Filter_Memo%";
			
// 			}//if ($AND_OR != null)
				
			// 			$opt_conditions['History.line LIKE'] = "%$query_Filter_Hins%";
		
			//REF http://book.cakephp.org/2.0/en/models/retrieving-your-data.html
			// 			$opt_conditions['Image.memos LIKE'] = "DISTINCT ".$query_Filter_Hins;
// 			$opt_conditions['Image.memos LIKE'] = "%$query_Filter_Memo%";
		
			$session_Filter = $this->Session->write($filter_memo, $query_Filter_Memo);
		
			//			debug("session_Filter => written");
		
			/**********************************
			 * set: var
			**********************************/
			$this->set("filter_memo", $query_Filter_Memo);
		
		}
		
		/**********************************
		 * return
		**********************************/
		return $opt_conditions;
		
	}//_index__Options__Memo
	
	public function 
	_index_2__Options__Memo($opt_conditions) {

// 		debug("_index_2__Options__Memo");
		
		/*******************************
			get: AND, OR
		*******************************/
		@$AND_OR = $this->request->query[CONS::$str_Filter_RadioButtons_Name_Memo];
		
		/**********************************
		 * param: filter: hin
		**********************************/
		$filter_memo = CONS::$str_Filter_Memo;
		
		@$query_Filter_Memo = $this->request->query[$filter_memo];
		
// 		debug("\$query_Filter_Memo => ".$query_Filter_Memo);
		
		if ($query_Filter_Memo == CONS::$str_Filter_Memo_all) {
		
// 			$this->set("filter_memo", '');
		
		} else if ($query_Filter_Memo == null) {//if ($query_Filter_Memo == CONS::$str_Filter_Memo_all)
		
			/**********************************
			 * set: var
			**********************************/
// 			$this->set("filter_memo", null);
	
		} else {//if ($query_Filter_Memo == CONS::$str_Filter_Memo_all)

// 			debug("'else' starting...");
			
			/*******************************
				$query_Filter_Memo => "plants縲�闃ｱ"
			*******************************/
			if ($AND_OR != null) {
			
				$opt_conditions = $this->_index_2__Options__Memo_AndOr(
						$opt_conditions, $query_Filter_Memo, $AND_OR);
					
			} else {
			
				$opt_conditions['Image.memos LIKE'] = "%$query_Filter_Memo%";
			
			}
				
			/**********************************
			 * set: var
			**********************************/
// 			$this->set("filter_memo", $query_Filter_Memo);
		
		}//if ($query_Filter_Memo == CONS::$str_Filter_Memo_all)
		
		/**********************************
		 * return
		**********************************/
		return $opt_conditions;
		
	}//_index_2__Options__Memo
	
	public function 
	_index__Options__Memo_AndOr
	($opt_conditions, $filter_String, $AND_OR) {

// 		if ($AND_OR != null) {
		
			// replace "縲�" with " "
			$filter_String = str_replace("縲�", " ", $filter_String);
		
// 			debug("replaced => '$filter_String'");
			
			// tokenize
			$tokens = explode(" ", $filter_String);
				
// 			debug("\$tokens ...");
// 			debug($tokens);
				
			if ($AND_OR == CONS::$str_Filter_RadioButtons_Memo_AND) {

				$tmp = array();
				
				
// 				$a = array("Image.memos LIKE", "Image.memos LIKE", "Image.memos LIKE");
// 				$b = array("a", "b", "c");
				
// 				$c = array_combine($a, $b);
				
// 				debug($c);
				
				$tmp2 = array();
				$tmp2['AND'] = array();
				$tmp2['NOT'] = array();
// 				$tmp2 = array('AND' => array());
// 				$tmp2 = array('NOT' => array());
// 				$tmp2 = array('AND');
				
// 				debug($tmp2);
				
// 				$tmp2['AND'] = [array('Image.memos LIKE' => $filter_String), array('Image.memos LIKE' => $filter_String)];
				
// 				$tmp2['AND']['Image.memos LIKE'] = $filter_String;
// 				$tmp2['AND']['Image.memos LIKE'] = $filter_String." (1)";
				
				
				
// 				$tmp2 = array('AND' => array(
// 									array('Image.memos LIKE' => $filter_String),
// 									array('Image.memos LIKE' => $filter_String)
// 				));
				
				// 				array(
				// 						'AND' => array(
				// 								(int) 0 => array(
				// 										'Image.memos LIKE' => '鬟滉ｺ�'
				// 								),
				// 								(int) 1 => array(
				// 										'Image.memos LIKE' => '鬟滉ｺ�'
				// 								)
				// 						)
				// 				)
// 				debug($tmp2);
				
				for ($i = 0; $i < count($tokens); $i++) {

// 					array_push($tmp, array('Image.memos LIKE' => $filter_String));
					
// 					array_push($tmp2['NOT'], array('Image.memos LIKE' => "%$tokens[$i]%"));

// 					if ($tokens[$i]) {
					
					
					
// 					} else {
					
					
					
// 					}
					
// 					debug(mb_substr($tokens[$i], 0, 1));
// 					debug(substr($tokens[$i], 0, 2));
					//REF substr http://stackoverflow.com/questions/2790899/php-how-to-check-if-a-string-starts-with-a-specified-string answered May 7 '10 at 18:46
					$start_char = mb_substr($tokens[$i], 0, 1);
					
					if ($start_char == '-') {
					
						$str = mb_substr($tokens[$i], 1, mb_strlen($tokens[$i]) - 1);
// 						$str = mb_substr($tokens[$i], 1, mb_strlen($tokens[$i] -1));
						
// 						debug("starts with -");

						//REF NOT http://cakebaker.42dh.com/2007/04/26/how-to-use-not-in-in-a-condition/
						array_push($tmp2['NOT'], 
									array('Image.memos LIKE' => "%$str%"));
					
					} else {
					
// 						debug("starts NOT with -");
						array_push($tmp2['AND'], array('Image.memos LIKE' => "%$tokens[$i]%"));
					
					}
					
					
// 					array_push($tmp2['AND'], array('Image.memos LIKE' => "%$tokens[$i]%"));
// 					array_push($tmp2['NOT'], array('Image.memos LIKE' => "%$tokens[$i]%"));
					
					
// 					array_push($tmp2['AND'], array('Image.memos LIKE' => "%$filter_String%"));
// 					$tmp2['AND'] = array('Image.memos LIKE' => $filter_String);
					
				}
				
				$tmp = array('AND' => $tmp);
				
// 				debug($tmp);
// 				debug($tmp2);
				
// 				$tmp2 = array('AND' => array('Image.memos LIKE' => $filter_String));
				
				$opt_conditions = array($tmp2);
// 				$opt_conditions = $tmp2;
				
// 				$opt_conditions['Image.memos LIKE'] = "%$filter_String%";
				
				
				
			} else if ($AND_OR == CONS::$str_Filter_RadioButtons_Memo_OR) {
					
				$opt_conditions['Image.memos LIKE'] = "%$filter_String%";
				
			}
		
		
// 		} else {
		
		
// 			$opt_conditions['Image.memos LIKE'] = "%$session_Filter%";
		
// 		}
		
		/*******************************
			return
		*******************************/
		return $opt_conditions;
			
	}//_index__Options__Memo_AndOr($opt_conditions)
	
	public function 
	_index_2__Options__Memo_AndOr
	($opt_conditions, $filter_String, $AND_OR) {

// 		debug("_index_2__Options__Memo_AndOr");
		
		
			// replace "縲�" with " "
			$filter_String = str_replace("縲�", " ", $filter_String);
		
			// tokenize
			$tokens = explode(" ", $filter_String);
				
			if ($AND_OR == CONS::$str_Filter_RadioButtons_Memo_AND) {

				$tmp = array();
				
				$tmp2 = array();
				$tmp2['AND'] = array();
				$tmp2['NOT'] = array();
				
				for ($i = 0; $i < count($tokens); $i++) {

					//REF substr http://stackoverflow.com/questions/2790899/php-how-to-check-if-a-string-starts-with-a-specified-string answered May 7 '10 at 18:46
					$start_char = mb_substr($tokens[$i], 0, 1);
					
					if ($start_char == '-') {
					
						$str = mb_substr($tokens[$i], 1, mb_strlen($tokens[$i]) - 1);

						//REF NOT http://cakebaker.42dh.com/2007/04/26/how-to-use-not-in-in-a-condition/
						array_push($tmp2['NOT'], 
									array('Image.memos LIKE' => "%$str%"));
					
					} else {
					
						array_push($tmp2['AND'], array('Image.memos LIKE' => "%$tokens[$i]%"));
					
					}
					
				}//for ($i = 0; $i < count($tokens); $i++)
				
				$tmp = array('AND' => $tmp);
				
				$opt_conditions = array($tmp2);
				
			} else if ($AND_OR == CONS::$str_Filter_RadioButtons_Memo_OR) {//if ($AND_OR == CONS::$str_Filter_RadioButtons_Memo_AND)
					
// 				debug("\$AND_OR => CONS::\$str_Filter_RadioButtons_Memo_OR");
				
// 				$opt_conditions['Image.memos LIKE'] = "%$filter_String%";

				$tmp = array();
				
				$tmp2 = array();
				$tmp2['OR'] = array();
// 				$tmp2['AND'] = array();
// 				$tmp2['NOT'] = array();
				
				for ($i = 0; $i < count($tokens); $i++) {
				
// 					//REF substr http://stackoverflow.com/questions/2790899/php-how-to-check-if-a-string-starts-with-a-specified-string answered May 7 '10 at 18:46
// 					$start_char = mb_substr($tokens[$i], 0, 1);
						
// 					if ($start_char == '-') {
							
// 						$str = mb_substr($tokens[$i], 1, mb_strlen($tokens[$i]) - 1);
				
// 						//REF NOT http://cakebaker.42dh.com/2007/04/26/how-to-use-not-in-in-a-condition/
// 						array_push($tmp2['NOT'],
// 						array('Image.memos LIKE' => "%$str%"));
							
// 					} else {
							
						array_push($tmp2['OR'], array('Image.memos LIKE' => "%$tokens[$i]%"));
// 						array_push($tmp2['AND'], array('Image.memos LIKE' => "%$tokens[$i]%"));
							
// 					}
						
				}//for ($i = 0; $i < count($tokens); $i++)
				
				$tmp = array('AND' => $tmp);
				
				$opt_conditions = array($tmp2);
				
			}//if ($AND_OR == CONS::$str_Filter_RadioButtons_Memo_AND)
		
		
// 		} else {
		
		
// 			$opt_conditions['Image.memos LIKE'] = "%$session_Filter%";
		
// 		}
		
		/*******************************
			return
		*******************************/
		return $opt_conditions;
			
	}//_index_2__Options__Memo_AndOr
	
	public function 
	_index__Options__TableName($opt_conditions) {

		/**********************************
		 * param: filter: hin
		**********************************/
		$filter_table_name = CONS::$str_Filter_TableName;
// 		$filter_table_name = CONS::$str_Filter_Memo;
		
// 		$opt_conditions = array();
		
		@$query_Filter_TableName = $this->request->query[$filter_table_name];
		
		if ($query_Filter_TableName == CONS::$str_Filter_TableName_all) {
			// 		if ($query_Filter_Hins == "-1") {
		
			$this->Session->write($filter_table_name, null);
		
			$this->set("filter_table_name", '');
		
		} else if ($query_Filter_TableName == null) {
		
			@$session_Filter = $this->Session->read($filter_table_name);
		
			if ($session_Filter != null) {
		
				// 				$opt_conditions['Token.hin'] = "DISTINCT ".$session_Filter;
				$opt_conditions['Image.table_name'] = $session_Filter;
		
				/**********************************
				 * set: var
				**********************************/
				$this->set("filter_table_name", $session_Filter);
		
			} else {
		
				/**********************************
				 * set: var
				**********************************/
				$this->set("filter_table_name", null);
		
			}
		
		} else {
		
			// 			$opt_conditions['History.line LIKE'] = "%$query_Filter_Hins%";
		
			//REF http://book.cakephp.org/2.0/en/models/retrieving-your-data.html
			// 			$opt_conditions['Image.table_name'] = "DISTINCT ".$query_Filter_Hins;
			$opt_conditions['Image.table_name'] = $query_Filter_TableName;
		
			$session_Filter = $this->Session->write($filter_table_name, $query_Filter_TableName);
		
			//			debug("session_Filter => written");
		
			/**********************************
			 * set: var
			**********************************/
			$this->set("filter_table_name", $query_Filter_TableName);
		
		}
		
		/**********************************
		 * return
		**********************************/
		return $opt_conditions;
		
	}//_index__Options__TableName($opt_conditions)
	
	public function 
	_index__Options__Id($opt_conditions) {

		
// 		debug("_index__Options__Id(\$opt_conditions) ==> starting...");
		
		/**********************************
		 * param: filter: hin
		**********************************/
		$filter_id = CONS::$str_Filter_Id;
// 		$filter_id = CONS::$str_Filter_Id;
// 		$filter_id = CONS::$str_Filter_Memo;
		
// 		$opt_conditions = array();
		
		@$query_Filter_Id = $this->request->query[$filter_id];
		
		/*******************************
			validate : numeric
		*******************************/
		if (!is_numeric($query_Filter_Id)) {
		
			debug("query is NOT numeric => '$query_Filter_Id'");

			return;
			
		}//if (!is_numeric($query_Filter_Id))
		;
		
		/*******************************
			validate : float?
		*******************************/
		if (strpos($query_Filter_Id, '.') == true) {
// 		if (is_float($query_Filter_Id)) {
		
			debug("query is NOT integer => '$query_Filter_Id'");

			return;
			
		}//if (!is_numeric($query_Filter_Id))
		;
		
		/*******************************
			validate : negative?
		*******************************/
		if (((int)$query_Filter_Id) < 1) {
// 		if (is_float($query_Filter_Id)) {
		
			debug("query is a negative number => '$query_Filter_Id'");

			return;
			
		}//if (!is_numeric($query_Filter_Id))
		;
		
		/*******************************
			conditions
		*******************************/
		if ($query_Filter_Id == CONS::$str_Filter_TableName_all) {
			// 		if ($query_Filter_Hins == "-1") {
		
// 			debug("\$query_Filter_Id ==> ".CONS::$str_Filter_TableName_all);
			
			$this->Session->write($filter_id, null);
		
			$this->set("filter_id", '');
// 			$this->set("filter_table_name", '');
		
		} else if ($query_Filter_Id == null) {
		
// 			debug("\$query_Filter_Id == null");
			
			@$session_Filter = $this->Session->read($filter_id);
		
			if ($session_Filter != null) {
		
				if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local) {
				
					$opt_conditions['Image.id'] = $session_Filter;
// 					$opt_conditions['Image._id'] = $session_Filter;
				
				} else {
					
					$opt_conditions['Image.id'] = $session_Filter;
					
				}
				
				// 				$opt_conditions['Token.hin'] = "DISTINCT ".$session_Filter;
// 				$opt_conditions['Image.table_name'] = $session_Filter;
		
				/**********************************
				 * set: var
				**********************************/
				$this->set("filter_id", $session_Filter);
		
			} else {
		
				/**********************************
				 * set: var
				**********************************/
				$this->set("filter_id", null);
		
			}
		
		} else {
		
// 			debug("\$query_Filter_Id ==> NOT null");
			
			// 			$opt_conditions['History.line LIKE'] = "%$query_Filter_Hins%";
		
			//REF http://book.cakephp.org/2.0/en/models/retrieving-your-data.html
			// 			$opt_conditions['Image.table_name'] = "DISTINCT ".$query_Filter_Hins;
// 			$opt_conditions['Image.table_name'] = $query_Filter_Id;
		
			if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local) {
			
				$opt_conditions['Image.id'] = $query_Filter_Id;
// 				$opt_conditions['Image._id'] = $query_Filter_Id;
			
			} else {
					
				$opt_conditions['Image.id'] = $query_Filter_Id;
					
			}
				
			
			$session_Filter = $this->Session->write($filter_id, $query_Filter_Id);
		
			//			debug("session_Filter => written");
		
			/**********************************
			 * set: var
			**********************************/
			$this->set("filter_id", $query_Filter_Id);
		
		}
		
		/**********************************
		 * return
		**********************************/
		return $opt_conditions;
		
	}//_index__Options__Id($opt_conditions)
	
	public function 
	_index__Options__FileName($opt_conditions) {

		/**********************************
		 * param: filter: hin
		**********************************/
		$filter_file_name = CONS::$str_Filter_File_Name;
// 		$filter_table_name = CONS::$str_Filter_Memo;
		
// 		$opt_conditions = array();
		
		@$query_Filter_File_Name = $this->request->query[$filter_file_name];
		
		if ($query_Filter_File_Name == CONS::$str_Filter_File_Name_all) {
			// 		if ($query_Filter_Hins == "-1") {
		
			$this->Session->write($filter_file_name, null);
		
			$this->set("filter_file_name", '');
		
		} else if ($query_Filter_File_Name == null) {
		
			@$session_Filter = $this->Session->read($filter_file_name);
		
			if ($session_Filter != null) {
		
				// 				$opt_conditions['Token.hin'] = "DISTINCT ".$session_Filter;
				$opt_conditions['Image.file_name LIKE'] = "%".$session_Filter."%";
// 				$opt_conditions['Image.file_name'] = $session_Filter;
		
// 				array('Image.file_name LIKE' => "%$filter_TableName%")
				/**********************************
				 * set: var
				**********************************/
				$this->set("filter_file_name", $session_Filter);
		
			} else {
		
				/**********************************
				 * set: var
				**********************************/
				$this->set("filter_file_name", null);
		
			}
		
		} else {
		
			// 			$opt_conditions['History.line LIKE'] = "%$query_Filter_Hins%";
		
			//REF http://book.cakephp.org/2.0/en/models/retrieving-your-data.html
			// 			$opt_conditions['Image.table_name'] = "DISTINCT ".$query_Filter_Hins;
			$opt_conditions['Image.file_name LIKE'] = "%".$query_Filter_File_Name."%";
// 			$opt_conditions['Image.file_name LIKE'] = "%".$session_Filter."%";
// 			$opt_conditions['Image.file_name'] = $query_Filter_File_Name;
		
			$session_Filter = $this->Session->write($filter_file_name, $query_Filter_File_Name);
		
			//			debug("session_Filter => written");
		
			/**********************************
			 * set: var
			**********************************/
			$this->set("filter_file_name", $query_Filter_File_Name);
		
		}
		
		/**********************************
		 * return
		**********************************/
		return $opt_conditions;
		
	}//_index__Options__FileName
	
	public function 
	_index_2__Options__FileName($opt_conditions) {

		/**********************************
		 * param: filter: hin
		**********************************/
		$filter_file_name = CONS::$str_Filter_File_Name;
// 		$filter_table_name = CONS::$str_Filter_Memo;
		
// 		$opt_conditions = array();
		
		@$query_Filter_File_Name = $this->request->query[$filter_file_name];
		
		if ($query_Filter_File_Name == CONS::$str_Filter_File_Name_all) {
			// 		if ($query_Filter_Hins == "-1") {
		
			$this->set("filter_file_name", '');
		
		} else if ($query_Filter_File_Name == null) {
		
			/**********************************
			 * set: var
			**********************************/
			$this->set("filter_file_name", null);
	
		} else {//if ($query_Filter_File_Name == CONS::$str_Filter_File_Name_all)

			/*******************************
				'AND' key
			*******************************/
			if (isset($opt_conditions[0]['AND'])) {
				
				// push
				array_push(
					$opt_conditions[0]['AND'], 
				
					array('Image.file_name LIKE' => "%$query_Filter_File_Name%")
				
				);
				
// 			if (isset($opt_conditions['AND'])) {
			
// 				debug("\$opt_conditions['AND'] ...");
// 				debug($opt_conditions['AND']);
			
			} else {//if (isset($opt_conditions[0]['AND']))

				//REF http://book.cakephp.org/2.0/en/models/retrieving-your-data.html
				$opt_conditions['Image.file_name LIKE'] = "%".$query_Filter_File_Name."%";
	
// 				debug("count(\$opt_conditions) => ".count($opt_conditions));
				
// 				debug("\$opt_conditions[0] ...");
// 				debug($opt_conditions[0]);
				
// 				if (isset($opt_conditions[0]['AND'])) {
				
// 					debug("\$opt_conditions[0]['AND'] ...");
// 					debug($opt_conditions[0]['AND']);
				
// 				} else {
				
// 					debug("isset(\$opt_conditions[0]['AND']) => false");
					
// 				}//if ($opt_conditions[0]['AND'])
				
				
// 				debug("\$opt_conditions['AND'] ... => not set");
// 				debug($opt_conditions);
				
			}//if (isset($opt_conditions[0]['AND']))
// 			}//if (isset($opt_conditions['AND']))
			
// 			//REF http://book.cakephp.org/2.0/en/models/retrieving-your-data.html
// 			$opt_conditions['Image.file_name LIKE'] = "%".$query_Filter_File_Name."%";
		
			/**********************************
			 * set: var
			**********************************/
			$this->set("filter_file_name", $query_Filter_File_Name);
		
		}
		
		/**********************************
		 * return
		**********************************/
		return $opt_conditions;
		
	}//_index_2__Options__FileName
	
	public function 
	_index_Build_ImageList_TableName($filter_TableName) {
		
// 		$options = array('Image.memos LIKE' => "%abc%");
		$options = array(
						'conditions' => 
							array(
									'Image.memos LIKE' => "%$filter_TableName%")
		);
		
		return $this->Image->find('all', $options);
		
	}//_index_Build_ImageList_TableName
	
	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid image'));
		}
	
		$image = $this->Image->findById($id);
		if (!$image) {
			throw new NotFoundException(__('Invalid image'));
		}
	
// 		debug("id => ".$id);
		
		$this->set('image', $image);
		
		$current_url = $this->Session->read('current_url');
		
		$this->set('current_url', $current_url);
	
// 		debug($current_url);
		
	}
	
	public function 
	add() {
		
// 		//log
// 		$msg = "add()";
// 		Utils::write_Log($this->dpath_Log, $msg, __FILE__, __LINE__);
		
		if ($this->request->is('post')) {

			//log
			$info = serialize($this->request->data);
				
			Utils::write_Log($this->dpath_Log, $info, __FILE__, __LINE__);
				
			//log
			$msg = "add by post";
			Utils::write_Log($this->dpath_Log, $msg, __FILE__, __LINE__);
			
			$this->Image->create();

			$this->Image->set("created_at",
					Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]));
			
			$this->Image->set("updated_at",
					Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]));
			
				
// 			$this->request->data['Image']['created_at'] =
// 			Utils::get_CurrentTime2(CONS::$timeLabelTypes["rails"]);
				
// 			$this->request->data['Image']['updated_at'] =
// 			Utils::get_CurrentTime2(CONS::$timeLabelTypes["rails"]);
				
			if ($this->Image->save($this->request->data)) {
				
				//log
				$msg = "image => saved";
				Utils::write_Log($this->dpath_Log, $msg, __FILE__, __LINE__);
	
				$this->Session->setFlash(__('Your image has been saved.'));
				return $this->redirect(array('action' => 'index'));
	
			}
				
			//log
			$msg = "Unable to save";
			Utils::write_Log($this->dpath_Log, $msg, __FILE__, __LINE__);
			
			
			$this->Session->setFlash(__('Unable to add your image.'));

		}
		
// 		} else if ($this->request->is('get')) {
				
// 			$this->Session->setFlash(__('Sorry. GET method is not available'));
			
// 		}//if ($this->request->is('post'))
	
	}//add
	
	public function 
	add_from_remote() {
		if ($this->request->is('post')) {

			//test
			$info = serialize($this->request->data);
			
			Utils::write_Log($this->dpath_Log, $info, __FILE__, __LINE__);
			
			$this->Image->create();
				
// 			$this->request->data['Image']['created_at'] =
// 				Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]);
				
// 			$this->request->data['Image']['updated_at'] =
// 				Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]);

			$this->Image->set("created_at", 
							Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]));
				
			$this->Image->set("updated_at", 
							Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]));
				
			if ($this->Image->save($this->request->data)) {
	
				$this->Session->setFlash(__('Your image has been saved.'));
				return $this->redirect(array('action' => 'index'));
	
			}
				
			$this->Session->setFlash(__('Unable to add your image.'));

		}
		
// 		} else if ($this->request->is('get')) {
				
// 			$this->Session->setFlash(__('Sorry. GET method is not available'));
			
// 		}//if ($this->request->is('post'))
	
	}//add

	/*******************************
		1) add image data to mysql table<br>
			=> those image files that are not recorded yet in the mysql table<br>
		2) Ranges are given by the admin values<br>
			=> add_image_Range_Start, add_image_Range_End
	*******************************/
	public function 
	add_Fix() {
		
		/*******************************
		 valid: "GO" command given
		*******************************/
		$command = @$this->request->query['command'];
		
		if ($command == null || $command != "GO") {
				
			debug("No 'GO' command given. No operations => ?command=GO");
				
			return ;
				
		}//$command == null || $command != "GO"
		
		/*******************************
		 valid: remote server
		*******************************/
		if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local) {
				
			debug("Not the remote server");
				
			return;
		
		}
		
		/**************************************************************
			get: image file list => /cake_apps/images/ifm11
		**************************************************************/
// 		"/home/users/2/chips.jp-benfranklin/web/cake_apps/Cake_IFM11/app/Lib/data";
		
		$dpath_Image_Files = "/home/users/2/chips.jp-benfranklin/web/cake_apps/images/ifm11";
// 		$dpath_Image_Files = "/cake_apps/images/ifm11";
		
		$list_Files = array_values(array_diff(
						scandir($dpath_Image_Files), array('..', '.')));
		
		debug("\$list_Files =>".count($list_Files));
		
		debug(array_slice($list_Files, 0, 3));
		
		/*******************************
			set:start, end
		*******************************/
		$start = Utils::get_Admin_Value("add_image_Range_Start", "val1");
		
		if ($start === null) {
			
			$start = "2015-08-15";
			
		}//$start === null
		
		$end = Utils::get_Admin_Value("add_image_Range_End", "val1");

		if ($end === null) {
				
			$end = "2015-09-03";
				
		}//$start === null
		
// 		$start = "2015-08-31";
// 		$end = "2015-09-03";
// 		$start = "2005-08-31";
// 		$end = "2005-09-03";
		
		debug(sprintf("start = %s / end = %s", $start, $end));
		
		$list_Files__Filtered = array();
		
		foreach ($list_Files as $file_Name) {
		
			if ($file_Name >= $start && $file_Name <= $end) {
				
				array_push($list_Files__Filtered, $file_Name);
				
			}//$file_Name >= $start && $file_Name <= $end;
			
		}//foreach ($list_Files as $file_Name)
		
		debug("\$list_Files__Filtered => ".count($list_Files__Filtered));
// 		debug("\$file_Name => ".count($file_Name));
		
// 		debug($list_Files__Filtered);
		
		/*******************************
			valid: any entry
		*******************************/
		if (count($list_Files__Filtered) < 1) {
// 		if (count($list_Files__Filtered < 1)) {
			
			debug("filtered files => less than 1");
			
			return;
			
		}//count($list_Files__Filtered < 1)
		
		/**************************************************************
			list: images in the mysql table
		**************************************************************/
		$opt = array(
			
				'conditions' => array(

						'AND' => array(
					
								"Image.file_name >=" => $start,
								
								"Image.file_name <=" => $end,
						)
				)
		);
		
		$images_MySQL = $this->Image->find('all', $opt);
		
		debug("\$images_MySQL => ".count($images_MySQL));
		
		/*******************************
			list: names from mysql data
		*******************************/
		$images_MySQL__File_Names = array();
		
		foreach ($images_MySQL as $image) {
		
			array_push($images_MySQL__File_Names, $image['Image']['file_name']);
			
		}//foreach ($images_MySQL as $image)
		
		debug("\$images_MySQL__File_Names => ".count($images_MySQL__File_Names));

		sort($images_MySQL__File_Names);
		
		// unique
		$images_MySQL__File_Names = array_unique($images_MySQL__File_Names);
		
		debug("\$images_MySQL__File_Names => ".count($images_MySQL__File_Names));
		
		/*******************************
			filter
		*******************************/
		$list_Files__Not_In_Remote = array();
		
		foreach ($list_Files__Filtered as $fname) {
		
			if (!in_array($fname, $images_MySQL__File_Names)) {
				
				array_push($list_Files__Not_In_Remote, $fname);
				
			}//!in_array($fname, $images_MySQL__File_Names);
			
		}//foreach ($list_Files__Filtered as $fname)
		
		debug("\$list_Files__Not_In_Remote => ".count($list_Files__Not_In_Remote));
		
		debug($list_Files__Not_In_Remote);
		
		$this->add_Fix__Save_New_Files($list_Files__Not_In_Remote);
// 		$this->add_Fix__Save_New_Files($list_Files__Filtered);
		
	}//add_Fix

	public function 
	add_Fix__Save_New_Files($list_Files__Filtered) {
		
		/*******************************
			save new files
		*******************************/
		$cnt_Files_Saved = 0;
		$cnt_Files_Not_Saved = 0;
		
		foreach ($list_Files__Filtered as $fname) {
		
			$this->Image->create();
			
			$time = Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]);
			
			$this->Image->set("created_at", $time);
			
			$this->Image->set("updated_at", $time);
			
			$this->Image->set("local_id", null);
				
			$this->Image->set("local_created_at", null);
			
			$this->Image->set("local_modified_at", null);
				
			$this->Image->set("file_id", null);
				
			$this->Image->set("file_path", null);
			
			$this->Image->set("file_name", $fname);
			
			$this->Image->set("local_date_added", null);
			
			$this->Image->set("local_date_modified", null);
			
			$this->Image->set("memos", null);
			
			$this->Image->set("tags", null);
			
			$this->Image->set("local_last_viewed_at", null);
			
			$this->Image->set("table_name", "ifm11");

			/*******************************
				save
			*******************************/
			if ($this->Image->save()) {
			
				debug("image => saved: ".$fname);

				$cnt_Files_Saved += 1;
			
			} else {
			
				debug("image => NOT saved: ".$fname);
			
				$cnt_Files_Not_Saved += 1;
			
			}
				
		}//foreach ($list_Files__Filtered as $fname)
		
		debug(sprintf("total = %d / saved = %d / not saved = %d", 
				count($list_Files__Filtered), 
				$cnt_Files_Saved, 
				$cnt_Files_Not_Saved));
		
	}//add_Fix__Save_New_Files

	/*******************************
		use => CONS::$adminKey_last_Added_From_DBFile<br>
		convert => "2015/09/16 00:00:00.000" to "2015-09-16_00-00-00.000"
		where args => "WHERE file_name > admin val::add_image_Range_Start,End"
// 		where args => "WHERE file_name > $last_Added_From_DBFile"
	*******************************/
	public function
	add_From_DB_File() {

		/*******************************
			valid: remote server
		*******************************/
		if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local) {
			
			debug("Not the remote server");
			
			$this->add_From_DB_File__Local();
			
			return;
				
		}
		
		/*******************************
		 valid: "GO" command given
		*******************************/
		$command = @$this->request->query['command'];
		
		if ($command == null || $command != "GO") {
				
// 			debug("No 'GO' command given. No operations => ?command=GO");
				
			return ;
				
		}//$command == null || $command != "GO"
		
// 		$res = Utils::add_ImageData_From_DB_File();

		/*******************************
			get data: from DB file
		*******************************/
		$last_Added_From_DBFile = 
						Utils::get_Admin_Value(
								CONS::$adminKey_last_Added_From_DBFile, 
								"val1");
		
// 		debug("\$last_Added_From_DBFile => $last_Added_From_DBFile");
		
		if ($last_Added_From_DBFile == null) {
			
			$last_Added_From_DBFile = CONS::$adminVal_last_Added_From_DBFile;
			
		}//$last_Added_From_DBFile == null
		
// 		$last_Added_From_DBFile = CONS::$last_Added_From_DBFile;
		
		// convert
		$last_Added_From_DBFile = 
				Utils::conv_TimeLabel_Standard_2_FileNameFormat($last_Added_From_DBFile);

		/*******************************
			set:start, end
		*******************************/
		$start = Utils::get_Admin_Value("add_image_Range_Start", "val1");
		
		if ($start === null) {
			
			$start = "2015-08-15";
			
		}//$start === null
		
		$end = Utils::get_Admin_Value("add_image_Range_End", "val1");

		if ($end === null) {
				
			$end = "2015-09-03";
				
		}//$start === null
		
		
// 		$whereArgs = sprintf("WHERE file_name >= '$start' AND file_name <= '$end'");
// 		$whereArgs = sprintf("WHERE file_name >= $start AND file_name <= $end");
		$whereArgs = "WHERE file_name > "
// 		$whereArgs = "WHERE modified_at > "
						."'"
						.$last_Added_From_DBFile
// 						.CONS::$last_Added_From_DBFile
						."'";
		
		$result = Utils::find_All_Images__WhereArgs("file_name", "DESC", $whereArgs);
// 		$result = Utils::find_All_Images__WhereArgs("modified_at", "DESC", $whereArgs);
// 		$result = Utils::find_All_Images__WhereArgs("_id", "ASC", $whereArgs);
		
		$images = $result[0];
		
		$numOf_Images = $result[1];
		
		debug("\$numOf_Images => $numOf_Images");
		
		$cnt = 0;

		/*******************************
			insert: data from sqlite file into => mysql db
		*******************************/
		$res_Add_Data = Utils::add_ImageData_From_DB_File($images, $numOf_Images);
		
		debug($res_Add_Data);
		
	}//add_From_DB_File
	
	public function 
	add_From_DB_File__Local() {
		
		$dpath_Src = "C:\\WORKS_2\\WS\\Eclipse_Luna\\Cake_IFM11\\lib\\data\\csv";
// 		$dpath_Src = "lib\\data\\csv";
		
		$fname_Src = "images.csv";
		
		$fpath_Src = implode(DIRECTORY_SEPARATOR, array($dpath_Src, $fname_Src));
		
		debug("\$fpath_Src => ".$fpath_Src);
		
		$f_CSV = fopen($fpath_Src, "r");
		
		/*******************************
		 read lines
		*******************************/
		$csv_Lines = array();
		
		//REF fgetcsv http://us3.php.net/manual/en/function.fgetcsv.php
		while ( ($data = fgetcsv($f_CSV) ) !== FALSE ) {
		
			array_push($csv_Lines, $data);
		
		}
		
		debug("csv lines => ".count($csv_Lines));

		debug(array_slice($csv_Lines, 0, 3));
		
		// 		(int) 0 => '2',
		// 		(int) 1 => 'null',
		// 		(int) 2 => 'null',
		// 		(int) 3 => '38',
		// 		(int) 4 => '2014/08/12 17:39:54.454',
		// 		(int) 5 => '2014/08/20 11:27:08.197',
		// 		(int) 6 => '7809',
		// 		(int) 7 => '2014-08-12_12-17-13_686.jpg',
		// 		(int) 8 => '2014-08-12_12-17-13_686.jpg',
		// 		(int) 9 => '2014/08/12 12:17:13.000',
		// 		(int) 10 => '2014/08/12 12:17:14.000',
		// 		(int) 11 => ':PLANTS縲�繝励Λ繝ｳ繧ｿ繝ｼ縲�繧ｪ繧ｯ繝ｩ',
		// 		(int) 12 => '',
		// 		(int) 13 => '',
		// 		(int) 14 => 'ifm11__PLANTS'
		
		/*******************************
			filter: by file_name
		*******************************/
		$start = "2015-08-15";
		$end = "2015-09-01";
		
		debug("start = $start / end = $end");
		
		$csv_Lines__Filtered = array();
		
		foreach ($csv_Lines as $line) {
		
			if ($line[8] >= $start && $line[8] <= $end) {
				
				array_push($csv_Lines__Filtered, $line);
				
			}//$line[8] >= $start && $line[8] <= $end;
			
		}//foreach ($csv_Lines as $line)
		
		debug("\$csv_Lines__Filtered => ".count($csv_Lines__Filtered));
		
		/*******************************
			close
		*******************************/
		fclose($f_CSV);
		
	}//add_From_DB_File__Local()
	
	public function 
	delete($id) {
		/******************************
	
		validate
	
		******************************/
		if (!$id) {
			throw new NotFoundException(__('Invalid image id'));
		}
	
		$image = $this->Image->findById($id);
	
		if (!$image) {
			throw new NotFoundException(__("Can't find the image. id = %d", $id));
		}
	
		/******************************
	
		delete
	
		******************************/
		if ($this->Image->delete($id)) {
			// 		if ($this->Video->save($this->request->data)) {
	
			$this->Session->setFlash(__("Image deleted => %s", $image['Image']['title']));
	
			return $this->redirect(
					array(
							'controller' => 'images',
							'action' => 'index'
				
					));
	
		} else {
	
			$this->Session->setFlash(
					__("Image can't be deleted => %s", $image['Image']['title']));
	
			// 			$page_num = _get_Page_from_Id($id - 1);
	
			return $this->redirect(
					array(
							'controller' => 'images',
							'action' => 'view',
							$id
					));
	
		}
	
	}//public function delete($id)
	
	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid text'));
		}
	
		/****************************************
		 * Image
		****************************************/
		$image = $this->Image->findById($id);
		if (!$image) {
			throw new NotFoundException(__('Invalid image'));
		}
	
		if (count($this->params->data) != 0) {
	
			$this->Image->id = $id;
	
			$this->params->data['Image']['updated_at'] =
			Utils::get_CurrentTime2(CONS::$timeLabelTypes["rails"]);
	
			if ($this->Image->save($this->request->data)) {
	
				$this->Session->setFlash(__('Your image has been updated.'));
				return $this->redirect(
						array(
								'action' => 'view',
								$id));
	
			}//if ($this->Text->save($this->request->data))
	
			$this->Session->setFlash(__('Unable to update your image.'));
	
		}
	
		if (!$this->request->data) {
			$this->request->data = $image;;
		}

		/*******************************
		 set data
		*******************************/
		$this->set("image", $image);
		
		debug("image => set");
		
		
	}//public function edit($id = null)
	
	public function 
	edit_image($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid text'));
		}
	
// 		debug("id => ".$id);
		
		/****************************************
		 * Image
		****************************************/
		$image = $this->Image->findById($id);
		
		if (!$image) {
			throw new NotFoundException(__('Invalid image'));
		}
	
		if (count($this->params->data) != 0) {
	
			$this->Image->id = $id;
	
			$this->params->data['Image']['updated_at'] =
			Utils::get_CurrentTime2(CONS::$timeLabelTypes["rails"]);
	
			if ($this->Image->save($this->request->data)) {
	
				$this->Session->setFlash(__('Your image has been updated.'));
				return $this->redirect(
						array(
								'action' => 'view',
								$id));
	
			}//if ($this->Text->save($this->request->data))
	
			$this->Session->setFlash(__('Unable to update your image.'));
	
		}
	
// 		debug($this->request->data);
		
		if (!$this->request->data) {
			$this->request->data = $image;;
		}
	
	}//public function edit($id = null)
	
	public function
	image_manager() {

// 		//debug
// 		phpinfo();
		
// 		return;
				// 		PHP Version 5.6.3
				
		/*******************************
			query: update csv
		*******************************/
		@$param_ACTION = $this->request->query['action'];
		
		if ($param_ACTION != null && $param_ACTION == "UPDATE_CSV") {
			
			$this->image_manager__Update_CSV();
			
			/*******************************
			 update: 'memos' values
			*******************************/
			$this->image_manager__Update_CSV__Memos();
				
			//ref http://book.cakephp.org/2.0/en/controllers.html "// Render the element in /View/Elements/ajaxreturn.ctp"
			$this->render("/Elements/plain");
			
			return;
			
		}//$param_ACTION != null && $param_ACTION == ""
		
// 		//test
// 		$fname_orig = "2015/09/30 00:00:00.000";
		
// 		$fname_new = Utils::conv_TimeLabel_Standard_2_FileNameFormat($fname_orig);
		
// 		debug("$fname_orig, $fname_new");

		/*******************************
			prep: params
		*******************************/
		$sort = @$this->request->query['sort'];
		$direction = @$this->request->query['direction'];
		
		$filter_No_Memos = @$this->request->query['filter'];
		
		/*******************************
			get: images
		*******************************/
		if ($sort != null) {
		
			$sort_ColName = $sort;
		
		} else {
		
			$sort_ColName = "_id";
			
		}//if ($sort != null)
		
		if ($direction != null) {
		
			$sort_Direction = $direction;
		
		} else {
		
			$sort_Direction = "DESC";
			
		}//if ($direction != null)
		
		/*******************************
			find: images
		*******************************/
		if ($filter_No_Memos != null && $filter_No_Memos == "no_memo") {
		
			debug("filtering by 'no_memo'...");
			
			$result = 
				Utils::find_All_Images__DateRange__NoMemos(
								$sort_ColName, $sort_Direction);
		
		} else {
			
			//debug
// 			debug("filtering....");
		
// 			debug("\$sort_ColName => ".$sort_ColName);
// 			debug("\$sort_Direction => ".$sort_Direction);
			
			$result = Utils::find_All_Images__DateRange($sort_ColName, $sort_Direction);
			
		}//if ($filter_No_Memos != null && $filter_No_Memos ==)
		
		//debug
// 		debug("\$result=> ".count($result));
		
		/*******************************
			valid: not null
		*******************************/
		if ($result == null) {
			
// 			$this->layout = "plain";
			
			debug("Utils::find_All_Images__DateRange => returned null");
			
			$this->set("message", "Utils::find_All_Images__DateRange => returned null");
			
			$this->render("/Elements/commons/common_1");
// 			$this->render("Elements/commons/common_1");
// 			$this->render("common_1");
			
			return;
			
		}//$result == null
		
		$images = $result[0];

// 		debug("images => ".count($images));
		
		/*******************************
			set: data
		*******************************/
		$this->set("images", $images);
		
		$this->set("numOf_images", $result[1]);
		
// 		/*******************************
// 			debug
// 		*******************************/
// 		$count = 0;
		
// 		foreach ($images as $row) {
		
// 			debug($row);
			
// 			$count += 1;
			
// 			if ($count > 4) {
				
// 				break;
				
// 			}
			
// 		}//foreach ($images as $row)
		
	}//image_manager

	/*******************************
		updates the csv records<br>
		those in the mysql table but not in the csv table<br>
		=> insert those records into the csv table
	*******************************/
	public function
	image_manager__Update_CSV() {
		
		debug("image_manager__Update_CSV()");

		/*******************************
			update: memos
		*******************************/
		//debug
		if (Utils::get_HostName() == "localhost") {
		
			debug("I am a local server. No op.");
				
			return;
				
		} else {
			
			//debug
			
			debug("remote server");
// 			debug("remote server: image_manager__Update_CSV --> under construction");
			
// 			return;
			
		}
		
// 		/*******************************
// 			update: 'memos' values
// 		*******************************/
// 		$this->image_manager__Update_CSV__Memos();
		
		
		$dpath = "/home/users/2/chips.jp-benfranklin/web/cake_apps"
					."/Cake_IFM11/app/Lib/data";
		
		/*******************************
		 get: the latest db file
		*******************************/
		$fname = Utils::get_Latest_File__By_FileName($dpath);
		
		/*******************************
		 valid: file exists
		*******************************/
		if ($fname == null) {
		
			debug("Utils::get_Latest_File__By_FileName => returned null");
		
			return null;
		
		}//$fname == null
			
// 		$fpath .= DIRECTORY_SEPARATOR.$fname;
		
// 		$fname = "ifm11_backup.bk";
		
		$fpath = implode(DIRECTORY_SEPARATOR, array($dpath, $fname));
		
// 		debug($fpath);
// 		debug($dpath);
		
		/*******************************
			valid: file exists
		*******************************/
		if (!file_exists($fpath)) {
			
			debug("file => not exist: $fpath");
			
			return;
			
		} else {//!file_exists($fpath)
			
			debug("file => exists: $fpath");
			
		}
		
		/*******************************
			list: from => remote csv file: L1
		*******************************/
// 		$start = "2015-09-01";
// 		$end = "2015-09-15";
		
		/*******************************
		 set:start, end
		*******************************/
		$start = Utils::get_Admin_Value("add_image_Range_Start", "val1");
		
		if ($start === null) {
				
			$start = "2015-08-15";
				
		}//$start === null
		
		$end = Utils::get_Admin_Value("add_image_Range_End", "val1");
		
		if ($end === null) {
		
			$end = "2015-09-03";
		
		}//$start === null
		
		$result = Utils::find_All_Images__Range_By_FileName(
						"file_name", 
						"DESC", 
						$start, 
						$end);
// 						"2015-09-01", 
// 						"2015-09-15");
		
		$images_CSV = $result[0];
		
		debug($result[1]);

		/*******************************
		 list: from => remote csv file: names list: L1'
		*******************************/
		$images_CSV__Names = array();
		
		foreach ($images_CSV as $item) {
		
			array_push($images_CSV__Names, $item['file_name']);
// 			array_push($images_CSV__Names, $item[8]);
			
		}//foreach ($images_CSV as $item)
		
// 		debug("images_CSV__Names");
// 		debug(array_slice($images_CSV__Names, 0, 3));
		
		/*******************************
			list: from => remote mysql table: L2
		*******************************/
		$opt = array(
	
			'conditions' => array(
	
					'AND' => array(
				
							"Image.file_name >=" => $start,
							
							"Image.file_name <=" => $end,
					)
			)
		);
		
		$images_MySQL = $this->Image->find('all', $opt);
		
		debug("\$images_MySQL => ".count($images_MySQL));
		
		/*******************************
			new list: mysql records not in the csv file
		*******************************/
		$images_MySQL_NotIn_CSV = array();
		
		foreach ($images_MySQL as $image) {
		
			if (!in_array($image['Image']['file_name'], $images_CSV__Names)) {
				
				array_push($images_MySQL_NotIn_CSV, $image);
				
			}//!in_array($image['Image']['file_name'], $images_CSV__Names);
			
		}//foreach ($images_MySQL as $image)
		
		debug("images_MySQL_NotIn_CSV => ".count($images_MySQL_NotIn_CSV));
		
		$len_Images_MySQL_NotIn_CSV = count($images_MySQL_NotIn_CSV);
		
		/*******************************
		 new list: mysql records not in the csv file: names
		*******************************/
		$images_MySQL_NotIn_CSV__Names = array();
		
		foreach ($images_MySQL_NotIn_CSV as $elem) {
		
			array_push($images_MySQL_NotIn_CSV__Names, $elem['Image']['file_name']);
			
		}//foreach ($images_MySQL_NotIn_CSV as $elem)
		
		/*******************************
			"NotIn_CSV" images => save to CSV db file
		*******************************/
		$res_Str = Utils::add_ImageData__MySQL_NotInCSV_2_CSV($images_MySQL_NotIn_CSV);
		
		debug($res_Str);
		
	}//image_manager__Update_CSV()
	
	public function
	image_manager__Update_CSV__Memos() {
		
		/**********************************************
			build list: from CSV
		**********************************************/
		/*******************************
			get: PDOStatement
		*******************************/
		$result_Set = $this->image_manager__Update_CSV__Memos__ListFromCSV();

		$numOf_Elem = $result_Set[1];
		
		/*******************************
			list: images
		*******************************/
		$listOf_Images_From_CSV = array();
		
		foreach ($result_Set[0] as $elem) {
		
			array_push($listOf_Images_From_CSV, $elem);
			
		}//foreach ($result_Set[0] as $elem)
		
		debug("count(\$listOf_Images_From_CSV) => ".count($listOf_Images_From_CSV));

		/**********************************************
		 build list: names of the files from csv
		**********************************************/		
		$listOf_Names__From_CSV = array();
		
		foreach ($listOf_Images_From_CSV as $elem) {

			array_push($listOf_Names__From_CSV, $elem['file_name']);
			
		}//foreach ($listOf_Images_From_CSV as $elem)

// 		debug("\$listOf_Names__From_CSV => ".count($listOf_Names__From_CSV));
		
		/**********************************************
		 build list: from mysql
		**********************************************/		
		/*******************************
		 range
		*******************************/
		$start = Utils::get_Admin_Value("add_image_Range_Start", "val1");
		
		if ($start === null) {
		
			$start = "2015-08-15";
		
		}//$start === null
		
		$end = Utils::get_Admin_Value("add_image_Range_End", "val1");
		
		if ($end === null) {
		
			$end = "2015-09-03";
		
		}//$start === null
		
		debug("start = $start / end = $end");
		
		// column, direction
		$sort_ColName = "_id";
		$sort_Direction = "DESC";
		
		$listOf_Images_From_MySQL = Utils::find_All_Images__From_MySQL__Range_By_FileName(
							$sort_ColName, 
							$sort_Direction, 
							$start, $end);
		
		debug("count(\$listOf_Images_From_MySQL) => ".count($listOf_Images_From_MySQL));

		/*******************************
			list: from mysql, no memos
		*******************************/
		$numOf_Images_From_MySQL__NoMemos = 0;
		
		foreach ($listOf_Images_From_MySQL as $elem) {
		
			if ($elem['Image']['memos'] == '') {
				
				$numOf_Images_From_MySQL__NoMemos += 1;
				
			}//$elem['Image']['memos'];
			
		}//foreach ($listOf_Images_From_MySQL as $elem)
		
		debug("\$numOf_Images_From_MySQL__NoMemos => ".$numOf_Images_From_MySQL__NoMemos);
		
		/**********************************************
		 build list: mysql records, those also in the csv records
		**********************************************/		
		// instances of the CakePHP Image model
		$listOf_Images_From_MySQL_AlsoIn_CSV = array();
		
		foreach ($listOf_Images_From_MySQL as $elem) {
		
			$file_Name = $elem['Image']['file_name'];

			// if in the names list, then push
			if (in_array($file_Name, $listOf_Names__From_CSV)) {
				
				array_push($listOf_Images_From_MySQL_AlsoIn_CSV, $elem);
				
			}//in_array($file_Name, $listOf_Names__From_CSV)
			
		}//foreach ($listOf_Images_From_MySQL as $elem)
		
		debug("count(\$listOf_Images_From_MySQL_AlsoIn_CSV => "
				.count($listOf_Images_From_MySQL_AlsoIn_CSV));
		
		/*******************************
			insert: memos in the mysql records => into the csv records
		*******************************/
		$numOf_Success = 0;
		$numOf_Failure = 0;
		
		foreach ($listOf_Images_From_CSV as $elem) {
		
			$image = Utils::find_Image_From_ArrayOf_Images__By_FileName(
						$elem['file_name'], 
						$listOf_Images_From_MySQL_AlsoIn_CSV);
			
			// update memos
			$elem['memos'] = $image['Image']['memos'];
			
			// save updates
			$result = Utils::update_Image($elem);
			
			// report
			if ($result === true) {

				debug("update done => ".$elem['file_name']);
			
				$numOf_Success += 1;
				
			} else {
			
				debug("update NOT done => ".$elem['file_name']);
				
				$numOf_Failure += 1;
				
			}//if ($result)
			
		}//foreach ($listOf_Images_From_CSV as $elem)

		/*******************************
			report
		*******************************/
		$msg = array(
			
				"total" => $numOf_Elem,
				"updates_Success" => $numOf_Success,
				"updates_Failure" => $numOf_Failure,
				
		);
		
		debug($msg);
		
	}//image_manager__Update_CSV__Memos()
	
	/*******************************
	 * query<br>
	 * 1. add_image_Range_Start,End => range<br>
	 * 2. memos => null<br>
		@return<br>
		array(query result : PDOStatement, number of images : Integer)
	*******************************/
	public function
	image_manager__Update_CSV__Memos__ListFromCSV() {

		/*******************************
		 PDO file
		*******************************/
		$fpath = Utils::get_fpath();
		
		/*******************************
		 validate: db file exists
		*******************************/
		$res = file_exists($fpath);
		
		if ($res == false) {
		
			debug("data folder => not exist: $fpath");
				
			return null;
		
		} else {
				
			debug("data folder => exists: $fpath");
				
		}
			
		/*******************************
		 get: the latest db file
		*******************************/
		$fname = Utils::get_Latest_File__By_FileName($fpath);
		
		/*******************************
		 valid: file exists
		*******************************/
		if ($fname == null) {
		
			debug("Utils::get_Latest_File__By_FileName => returned null");
		
			return null;
		
		}//$fname == null
		
		$fpath .= DIRECTORY_SEPARATOR.$fname;
			
		debug("fpath => $fpath");
		
		/*******************************
		 pdo: setup
		*******************************/
		//REF http://www.if-not-true-then-false.com/2012/php-pdo-sqlite3-example/
		$file_db = new PDO("sqlite:$fpath");
			
		if ($file_db === null) {
		
			debug("pdo => null");
		
			return null;
		
		} else {
				
// 			debug("pdo => created");
				
		}
			
		// Set errormode to exceptions
		$file_db->setAttribute(PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION);
		
		/*******************************
		 range
		*******************************/
		$start = Utils::get_Admin_Value("add_image_Range_Start", "val1");
		
		if ($start === null) {
				
			$start = "2015-08-15";
				
		}//$start === null
		
		$end = Utils::get_Admin_Value("add_image_Range_End", "val1");
		
		if ($end === null) {
		
			$end = "2015-09-03";
		
		}//$start === null
		
		debug("start = $start / end = $end");
		
		/*******************************
		 params
		*******************************/
		$sort_ColName = "_id";
		
		$sort_Direction = "DESC";
		
		/*******************************
		 build list: from CSV
		*******************************/
		$where_Col = "file_name";
		
		$q = "SELECT * FROM ".CONS::$tname_IFM11
			." "."WHERE"." "
			.$where_Col." ".">="." "."'$start'"
			." "."AND"." "
			.$where_Col." "."<="." "."'$end'"
			." "."AND"." "
			."memos is null"
					
			//ref http://www.tutorialspoint.com/sqlite/sqlite_order_by.htm
			." "."ORDER BY"." "
			.$sort_ColName." ".$sort_Direction
			;
			
		debug("q => $q");
			
		$result = $file_db->query($q);
		
// 		debug(get_class($result));

		/*******************************
			get: num of images
		*******************************/
		$q = "SELECT Count(*) FROM ".CONS::$tname_IFM11
			." "."WHERE"." "
			.$where_Col." ".">="." "."'$start'"
			." "."AND"." "
			.$where_Col." "."<="." "."'$end'"
			." "."AND"." "
			."memos is null"
			//ref http://www.tutorialspoint.com/sqlite/sqlite_order_by.htm
			." "."ORDER BY"." "
			.$sort_ColName." ".$sort_Direction
			;

		$result_Num = $file_db->query($q);
		
		$numOf_Images = $result_Num->fetchColumn();
		
		/*******************************
		 pdo => reset
		*******************************/
		$file_db = null;
		
		/*******************************
			return
		*******************************/
		return array($result, $numOf_Images);
// 		return $result;
		
	}//image_manager__Update_CSV__Memos__ListFromCSV()
	
	public function
	edit_image_data($id = null) {
		
		debug("id => '$id'");
		
		debug($this->request->query);
// 		debug($this->request);
		
		/*******************************
			get image data
		*******************************/
		$image = Utils::find_Image_ById($id);
		
		/*******************************
			set: value
		*******************************/
		$this->set("image", $image);
		
// 		debug($image[1]);
// 		debug($image['file_name']);
// 		debug($image);
		
// 		$cnt = $image->fetchColumn();
		
// 		debug("cnt => $cnt");
		
// 		foreach ($image as $row) {
			
// // 			debug($row['_id']);
			
// // 			debug($row);
			
// 		}
		
	}//edit_image_data

	public function
	update_image_data() {

		$this->layout = 'plain';
		
		/*******************************
			get: params: memos
		*******************************/
		$memos = @$this->request->query['memos'];
		
		$msg = null;
		
		if ($memos == null) {
		
			$msg = "memos => null";
		
		} else if ($memos == "") {
			
			$msg = "memos => blank";
			
		} else {
		
			$msg = "memos => $memos";
			
		}//if ($memos == null)
		
		/*******************************
			get: params: id
		*******************************/
		$image_id = @$this->request->query['image_id'];
		
		//ref http://php.net/manual/en/function.trim.php
		$image_id = trim($image_id);
		
// 		$msg = null;
		
		$msg .= " | ";
		
		if ($image_id == null) {
		
			$msg .= "id => null";
		
			$this->set("msg", $msg);
			
			return;
			
		} else if ($image_id == "") {
			
			$msg .= "id => blank";
			
		} else {
		
			$msg .= "id => $image_id";
			
		}//if ($image_id == null)

		//log
		$msg_Log = "update_image_data: $msg";
		
		Utils::write_Log($this->dpath_Log, $msg_Log, __FILE__, __LINE__);
		
		/*******************************
			get: image data from id
		*******************************/
		$image = Utils::find_Image_ById($image_id);
		
// 		debug($image);

		$image['memos'] = $memos;
		
		/*******************************
			update data
		*******************************/
		$res = Utils::update_Image($image);

		$msg = ($res == true ? "updated" : "NOT updated");
		
// 		debug("update done => ".($res == true ? "yes" : "no"));
// 		debug($image);

		/*******************************
		 set: values
		*******************************/
		$this->set("msg", $msg);
		
		$this->set("image_id", $image_id);
		
		
	}//update_image_data

	public function
	admin_Image_Manager() {
		
		$this->loadModel('Admin');
		
		$admins = $this->Admin->find('all');
		
		debug("admins => ".count($admins));
		
	}//admin_Image_Manager

	public function
	im_Add_Image_Data() {

		/*******************************
			valid: "GO" command given
		*******************************/
		$command = @$this->request->query['command'];
		
		if ($command == null || $command != "GO") {
			
			debug("No 'GO' command given. No operations => ?command=GO");
			
			return ;
			
		}//$command == null || $command != "GO"
		
		/*******************************
			valid: remote server
		*******************************/
		if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local) {
			
			debug("Not the remote server");
			
			return;
				
		}
		
		
		/*******************************
			gen: image file list
		*******************************/
		$gen_ImageList = @$this->request->query['gen_ImageList'];
		
		if ($gen_ImageList != null && $gen_ImageList == "yes") {

			debug("generating image file list...");
			
			$this->im_Add_Image_Data__Gen_ImageList_File();
			
		} else {//$gen_ImageList != null && $gen_ImageList == "yes"

			debug("image file list => not generating...");
			
		}//$gen_ImageList != null && $gen_ImageList == "yes"

		/*******************************
			list: L2: data from sqlite bk file
		*******************************/
		
		$images_SQLite_IFM11 = $this->im_Add_Image_Data__Get_BK_List();

		/*******************************
			list: L3: data from remote mysql table
		*******************************/
		$images_MySQL_Images = $this->im_Add_Image_Data__Get_MySQL_List();

// 		debug($images_MySQL_Images[0]['Image']['file_name']);
		
		$cnt_Images_MySQL = count($images_MySQL_Images);
		
		$images_MySQL_Images__FileNames = array();
		

		//debug
		$count = 0;
		
		for ($i = 0; $i < $cnt_Images_MySQL; $i++) {

			$name = $images_MySQL_Images[$i]['Image']['file_name'];
			
			array_push($images_MySQL_Images__FileNames, $name);
			
			$count += 1;
			
		}
		
		/*******************************
			list: L4: L3 - L2
		*******************************/
		$images_Missing_From_MySQL = array();
		
// 		debug($images_SQLite_IFM11[0]);
		
		foreach ($images_SQLite_IFM11 as $item) {

			$file_name = $item['file_name'];
			
			if (!in_array($file_name, $images_MySQL_Images__FileNames)) {
				
				array_push($images_Missing_From_MySQL, $item);
				
			}//condition
			
// 			debug($image_SQLite_BK);
			
// 			break;
			
// 			if ($image_MySQL) {
// 				;
// 			}//$image_MySQL;
			
		}//foreach ($images_SQLite_IFM11 as $image_SQLite_BK)
		
		debug("images_Missing_From_MySQL => ".count($images_Missing_From_MySQL));
		
// 		debug(array_slice($images_Missing_From_MySQL, 0, 2));
		
		/*******************************
			save missing image data => to remote mysql table
		*******************************/
		$res_Add_Data = Utils::add_ImageData_From_DB_File($images_Missing_From_MySQL, count($images_Missing_From_MySQL));
// 		$res_Add_Data = Utils::add_ImageData_From_DB_File($images, $numOf_Images);
		
		
	}//im_Add_Image_Data

	/*******************************
		@return PDOStatement
	*******************************/
	public function
	im_Add_Image_Data__Get_BK_List() {
		
		$fname_SQLite_IFM11 = "ifm11_backup_20151109_081050.bk";
		
		/*******************************
			dir path
		*******************************/
		if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local) {
				
			$dpath = "C:\\WORKS_2\\WS\\Eclipse_Luna"
						."\\Cake_IFM11\\app\\Lib"
						."\\data";
				
		} else {
				
			$dpath = "/home/users/2/chips.jp-benfranklin/web"
						."/cake_apps/Cake_IFM11/app/Lib"
						."/data";
				
		}//if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local)
		
		// file path
		$fpath = implode(DIRECTORY_SEPARATOR, array($dpath, $fname_SQLite_IFM11));
		
		debug("\$fpath => ".$fpath);
		
		// images
// 		$images_SQLite_IFM11 = Utils::find_All_Images__From_File("_id", "ASC",)
		
		$whereArgs = "WHERE file_name > "
						."'"
						."2015-10"
// 						.CONS::$last_Added_From_DBFile
						."'"
						." AND "
						."file_name < "
						."'"
						."2015-11"
// 						.CONS::$last_Added_From_DBFile
						."'"
						;
		
		$result = Utils::find_All_Images__WhereArgs__FromFile(
							"_id", "ASC", 
							$whereArgs, $fpath);
		
// 		//debug
// 		$count = 0;
		
// 		foreach ($result[0] as $item) {
// // 		foreach ($result as $item) {
		
// 			$count += 1;
			
// 		}//foreach ($result as $item)
		
// 		debug("result[0] => $count");
// // 		debug("result => $count");

		/*******************************
			return
		*******************************/
		return $result[0];
		
	}//im_Add_Image_Data__Get_BK_List

	/*******************************
		range => 2015-10-01 ~ 2015-11-01
	*******************************/
	public function
	im_Add_Image_Data__Get_MySQL_List() {

		$range_Start = "2015-10-01";
		
		$range_End = "2015-11-01";
		
		$opt = array(

				//ref http://book.cakephp.org/2.0/en/models/retrieving-your-data.html "CakePHP accepts all valid SQL boolean operations, including AND, OR, NOT, XOR, etc."
				'conditions' => array(
						
								'AND' => array(
										
									array('Image.file_name >' => "$range_Start"),
										
									array('Image.file_name <' => "$range_End"),
										
// 									array('Image.file_name' => "> $range_Start"),
										
// 									array('Image.file_name' => "< $range_End"),
										
								),
// 				'conditions' => array('Image.file_name LIKE' => "%$filter_TableName%"),
// 				'conditions'	=> 
// 						"Image.file_name > $range_Start AND Image.file_name < $range_End"
		));
		
		$images_MySQL = $this->Image->find('all', $opt);

		debug("count(\$images_MySQL) => ".count($images_MySQL));
		
		//debug
		$count = 0;

// 		foreach ($images_MySQL as $image) {
		
// 			debug($image['Image']['file_name']);
			
// 			$count += 1;
			
// 			if ($count > 5) {
				
// 				break;
				
// 			}//$count > 5
			
// 		}//foreach ($images_MySQL as $image)

		/*******************************
			return
		*******************************/
		return $images_MySQL;
// 		return $result[0];
		
	}//im_Add_Image_Data__Get_MySQL_List
	
	
	public function
	im_Add_Image_Data__DEPRECATED_S_13_SHARP_2() {

		/*******************************
			gen: image file list
		*******************************/
		$gen_ImageList = @$this->request->query['gen_ImageList'];
		
		if ($gen_ImageList != null && $gen_ImageList == "yes") {

			debug("generating image file list...");
			
			$this->im_Add_Image_Data__Gen_ImageList_File();
			
		} else {//$gen_ImageList != null && $gen_ImageList == "yes"

			debug("image file list => not generating...");
			
		}//$gen_ImageList != null && $gen_ImageList == "yes"

		/*******************************
			list: L1: Names from image file list
		*******************************/
		/*******************************
			get: list file
		*******************************/
		$dpath = CONS::$dpath_ImageFiles_List;
		
		$latest_File_Name = Utils::get_Latest_File__By_FileName($dpath);
		
		debug("latest images list file => $latest_File_Name");
		
		$f_ImagesFiles_List = fopen("$dpath/$latest_File_Name", "r");
		
		debug("file opened => $latest_File_Name");
		
		// get: file names
		$list_ImageFiles_Names = array();
		
		while ( ($data = fgetcsv($f_ImagesFiles_List) ) !== FALSE ) {

			array_push($list_ImageFiles_Names, $data[1]);
	
		}

		debug("\$list_ImageFiles_Names => ".count($list_ImageFiles_Names));
		
		debug(array_slice($list_ImageFiles_Names, 0, 3));
		
		// close
		fclose($f_ImagesFiles_List);
		
		/*******************************
			list: L2: Image instances from remote db table
		*******************************/
// 		$range_Start = "2015/10/01";
// 		$range_End = "2015/11/01";

// 		$images_MySQL = Utils::find_All_Images__DateRange(
// 							"_id", 
// 							"ASC", 
// 							$range_Start, $range_End);
				
// 		debug("count(\$images_MySQL)".count($images_MySQL));

		$range_Start = "2015-10-01";
		
		$range_End = "2015-11-01";
		
		$opt = array(

				//ref http://book.cakephp.org/2.0/en/models/retrieving-your-data.html "CakePHP accepts all valid SQL boolean operations, including AND, OR, NOT, XOR, etc."
				'conditions' => array(
						
								'AND' => array(
										
									array('Image.file_name >' => "$range_Start"),
										
									array('Image.file_name <' => "$range_End"),
										
// 									array('Image.file_name' => "> $range_Start"),
										
// 									array('Image.file_name' => "< $range_End"),
										
								),
// 				'conditions' => array('Image.file_name LIKE' => "%$filter_TableName%"),
// 				'conditions'	=> 
// 						"Image.file_name > $range_Start AND Image.file_name < $range_End"
		));
		
		$images_MySQL = $this->Image->find('all', $opt);

		debug("count(\$images_MySQL) => ".count($images_MySQL));
		
		//debug
		$count = 0;

		foreach ($images_MySQL as $image) {
		
			debug($image['Image']['file_name']);
			
			$count += 1;
			
			if ($count > 5) {
				
				break;
				
			}//$count > 5
			
		}//foreach ($images_MySQL as $image)
		
		
		
	}//im_Add_Image_Data__DEPRECATED_S_13_SHARP_2

	public function
	im_Add_Image_Data__Gen_ImageList_File() {

		/*******************************
		 valid: remote server
		*******************************/
		if (Utils::get_HostName() == "localhost") {
		
			debug("I am a local server. No op.");
				
			return;
				
		}
		
		/*******************************
		 range
		*******************************/
		$range_Start = @$this->request->query['range_Start'];
		
		if ($range_Start === null) {
				
			$range_Start = "2015-10-01";
			// 			$range_Start = "2015/10/01";
				
		}//$range_Start === null
		
		$range_End = @$this->request->query['range_End'];
		
		if ($range_End === null) {
				
			$range_End = "2015-11-01";
			// 			$range_End = "2015/11/01";
				
		}//$range_End === null
		
		debug("start => $range_Start || end => $range_End");
		
		/*******************************
		 list: remote mysql data
		*******************************/
		$list_Remote_DB = Utils::get_CsvLines_Images_FromRemote($range_Start, $range_End);
		// 		$csv_Lines = Utils::get_CsvLines_Images_FromRemote($range_Start, $range_End);
		// 		$csv_Lines = Utils::get_CsvLines_Images_FromRemote();

		/*******************************
		 list: remote mysql data => file names
		*******************************/
		$list_Remote_DB_File_Names = array();
		
		foreach ($list_Remote_DB as $item) {
		
			array_push($list_Remote_DB_File_Names, $item[8]);
				
		}//foreach ($list_Remote_DB as $item)
		
		debug("\$list_Remote_DB_File_Names[0] => "
				.$list_Remote_DB_File_Names[0]);
		
		/*******************************
		 list: remote image files
		*******************************/
		$list_Remote_Images = Utils::get_Remote_ImageList($range_Start, $range_End);
		// 		$list_Remote_Images = Utils::get_Remote_ImageList();
		
		debug("\$list_Remote_Images[0] => ".count($list_Remote_Images[0]));
		
		/*******************************
		 filter
		*******************************/
		$list_Missing_Files = array();
		
		foreach ($list_Remote_Images as $image_file_name) {
		
			if (!in_array($image_file_name, $list_Remote_DB_File_Names)) {
		
				array_push($list_Missing_Files, $image_file_name);
		
			}//!$list_Remote_DB_File_Names
				
		}//foreach ($list_Remote_Images as $image_file)
		
		debug("missing files => ".count($list_Missing_Files));
		
		debug("\$list_Missing_Files[0] => ".$list_Missing_Files[0]);
		
		/*******************************
		 valid: any missing files
		*******************************/
		if (count($list_Missing_Files) < 1) {
				
			debug("no missing files");
				
			return ;
				
		}//count($list_Missing_Files < 1)
		
		/*******************************
		 save list to files
		*******************************/
		$time_Label = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
		// 		$time_Label = Utils::get_CurrentTime2("serial");
		
		$fname = sprintf("list_images_%s.csv", $time_Label);
// 		$fname = sprintf("list_images_%s.txt", $time_Label);
		// 		$fname = "list_images.txt";
		
		debug("\$fname => ".$fname);
		
		$dpath = "/home/users/2/chips.jp-benfranklin/web"
				."/cake_apps/Cake_IFM11/app/Lib/data"
				."/image_files_list";
		
		// valid: folder exists
		if (!file_exists($dpath)) {
			
			mkdir($dpath);
			
			debug("folder => created: $dpath");
			
		} else {
			
			debug("folder => exists: $dpath");
			
		}
		
		$fpath = "$dpath/$fname";
// 		$fpath = "/home/users/2/chips.jp-benfranklin/web"
// 				."/cake_apps/Cake_IFM11/app/Lib/data"
// 				."/image_files_list"
// 				."/$fname";
		
		$f = fopen($fpath, "w");
		// 		$f = fopen($fpath, "r");

		// write
		$count = 1;

		foreach ($list_Missing_Files as $name) {

// 			fwrite($f, sprintf("%d\t%s\n", $count, $name));
			fputcsv($f, array($count, $name));
				
			$count += 1;
			
		}//foreach ($list_Missing_Files as $name)

		fclose($f);

		debug("list => saved: ".$fpath);
		
	}//im_Add_Image_Data__Gen_ImageList_File

	public function
	manage_Sharp_ImageFiles__Change_FileNames() {
		
		/*******************************
		 files list
		*******************************/
		$dpath = "C:\\WORKS_2\\Storage\\images\\100SHARP\\tmp";
		
		$list_Files = array_values(array_diff(
				scandir($dpath), array('..', '.')));
		
		debug("files => ".count($list_Files));
		
		/*******************************
		 file names
		*******************************/
		$count = 0;
		
		$len = count($list_Files);
		
		for ($i = 0; $i < $len; $i++) {
		
			// exists?
			$res_b = file_exists($list_Files[$i]);
				
			if ($res_b == false) {
					
				debug("file not exist => $list_Files[$i]");
		
				continue;
					
			} else {
					
				$f = fopen($list_Files[$i], "a");
		
				//ref http://www.w3schools.com/php/func_filesystem_filemtime.asp
				debug(sprintf("%s (%s = %d)",
				$list_Files[$i],
				date("Y-m-d h:i:s", filemtime($list_Files[$i])),
				filemtime($list_Files[$i])
				));
				// 						filemtime($list_Files[$i])));
		
				fclose($f);
		
				$count += 1;
		
			}//if ($res_b == false)
				
		}//for ($i = 0; $i < $len; $i++)
		
		debug("done => $count");
		
	}//manage_Sharp_ImageFiles__Change_FileNames
	
	public function
	manage_Sharp_ImageFiles__Insert_Data($db_file) {
// 	manage_Sharp_ImageFiles__Insert_Data() {
		
		/*******************************
			list of file names
		*******************************/
		$dpath_ImageFiles = "C:\\Users\\kbuchi\\Desktop\\data\\images\\is13sh";
		
		$list_Files = array_values(array_diff(
				scandir($dpath_ImageFiles), array('..', '.')));
		
		$lenOf_List_Files = count($list_Files);
		
		debug("files => ".$lenOf_List_Files);
// 		debug("files => ".count($list_Files));

		debug($list_Files[0]);
		
		/*******************************
			setup: vars
		*******************************/
		$dpath = Utils::get_fpath();
		
// 		$dpath = "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\Lib\\data";
// 		"C:\WORKS\WS\Eclipse_Luna\Cake_IFM11\app\Lib\data";
		
		$fname = $db_file;
// 		$fname = "ifm11_backup_20160107_092216.bk";
		
		$fpath = implode(DIRECTORY_SEPARATOR, array($dpath, $fname));

		debug($fpath);
		
		/*******************************
			valid: db file exists
		*******************************/
		if (! file_exists($fpath)) {
			
			debug("no such db file => $db_file");
			
			return ;
			
		}//! file_exists($fpath)
		
		/*******************************
		 pdo: setup
		*******************************/
		//REF http://www.if-not-true-then-false.com/2012/php-pdo-sqlite3-example/
		$file_db = new PDO("sqlite:$fpath");
			
		if ($file_db === null) {
		
			debug("pdo => null");
		
			return null;
		
		} else {
				
// 			debug("pdo => created");
				
		}
			
		// Set errormode to exceptions
		$file_db->setAttribute(PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION);

		/*******************************
		 prep: data for insertion
		*******************************/
		$sql = "INSERT INTO ifm11 ("
				."created_at, modified_at, "		// 1,2
				."date_added, date_modified, "		// 3,4
				."file_path, file_name"				// 5,6
						.") "
								."SELECT "
// 								."VALUES ("
										."?, ?, "
										."?, ?, "
										."?, ?"
								." "
// 								.")"
				." "
				."WHERE NOT EXISTS(SELECT 1 FROM ifm11 WHERE file_path = ? AND file_name = ?)"
			;
			
		debug($sql);
		
		$time = Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]);
		
		// counter => insertion successful
		$count = 0;
		
		// insert
		foreach ($list_Files as $elem) {
		
			$data = array(
			
					$time,		// created_at
					$time,		// modified_at
					
					$time,		// date_added
					$time,		// date_modified
					
					$dpath_ImageFiles,		// file_path
					$elem,		// file_name
						
					$dpath_ImageFiles,		// file_path
					$elem		// file_name
						
			);
			
			$qry = $file_db->prepare($sql);

			//ref http://php.net/manual/en/pdostatement.execute.php
			$res = $qry->execute($data);
			
			//debug
			if ($res === true) {
	
				debug("execute => true: ".$elem);
				
				// count
				$count += 1;
	
			} else {
	
				debug("execute => false: ".$elem);
	
			}//if ($res === true)
					
		}//foreach ($list_Files as $elem)
		
		/*******************************
			report
		*******************************/
		$msg = sprintf("insert: total => %d, done => %d", $lenOf_List_Files, $count);
				
		debug($msg);
		
		/*******************************
		 pdo => reset
		*******************************/
		$file_db = null;
		
	}//manage_Sharp_ImageFiles__Insert_Data
	
	public function
	manage_Sharp_ImageFiles() {
		
		
		
		/*******************************
			valid: local server
		*******************************/
		if (Utils::get_HostName() != "localhost") {
		
			debug("I am not a local server. No op.");
				
			return;
				
		} else {
			
			//debug
			
			debug("local server");
// 			debug("remote server: image_manager__Update_CSV --> under construction");
			
// 			return;
			
		}

		/*******************************
			valid: param
		*******************************/
		$db_file = @$this->request->query['db_file'];
		
		if ($db_file == null) {
			
			debug("db file => not designated");
			
			return ;
			
		}//$db_file == null
		
		/*******************************
			rename => file names
		*******************************/
// 		$this->manage_Sharp_ImageFiles__Change_FileNames();

		/*******************************
			insert data
		*******************************/
		$this->manage_Sharp_ImageFiles__Insert_Data($db_file);
// 		$this->manage_Sharp_ImageFiles__Insert_Data();
		
	}//manage_Sharp_ImageFiles()
	
	public function
	manage_IPhone_ImageFiles__Change_FileNames() {
		
		/*******************************
		 files list
		*******************************/
		$dpath = "C:\\WORKS_2\\Storage\\images\\100SHARP\\tmp";
		
		$list_Files = array_values(array_diff(
				scandir($dpath), array('..', '.')));
		
		debug("files => ".count($list_Files));
		
		/*******************************
		 file names
		*******************************/
		$count = 0;
		
		$len = count($list_Files);
		
		for ($i = 0; $i < $len; $i++) {
		
			// exists?
			$res_b = file_exists($list_Files[$i]);
				
			if ($res_b == false) {
					
				debug("file not exist => $list_Files[$i]");
		
				continue;
					
			} else {
					
				$f = fopen($list_Files[$i], "a");
		
				//ref http://www.w3schools.com/php/func_filesystem_filemtime.asp
				debug(sprintf("%s (%s = %d)",
				$list_Files[$i],
				date("Y-m-d h:i:s", filemtime($list_Files[$i])),
				filemtime($list_Files[$i])
				));
				// 						filemtime($list_Files[$i])));
		
				fclose($f);
		
				$count += 1;
		
			}//if ($res_b == false)
				
		}//for ($i = 0; $i < $len; $i++)
		
		debug("done => $count");
		
	}//manage_IPhone_ImageFiles__Change_FileNames
	
	public function
	manage_IPhone_ImageFiles__Insert_Data($db_file) {
// 	manage_IPhone_ImageFiles__Insert_Data() {
		
		/*******************************
			list of file names
		*******************************/
		$dpath_ImageFiles = "C:\\Users\\iwabuchiken\\data\\images\\iphone";
// 		$dpath_ImageFiles = "C:\\Users\\kbuchi\\Desktop\\data\\images\\iphone";
// 		$dpath_ImageFiles = "C:\Users\kbuchi\Desktop\data\images\iphone";
// 		$dpath_ImageFiles = "C:\Users\kbuchi\Desktop\data\images\is13sh";
		
		$list_Files = array_values(array_diff(
				scandir($dpath_ImageFiles), array('..', '.')));
		
		$lenOf_List_Files = count($list_Files);
		
		debug("files => ".$lenOf_List_Files);
// 		debug("files => ".count($list_Files));

		debug($list_Files[0]);
		
		/*******************************
			setup: vars
		*******************************/
		$dpath = Utils::get_fpath();
		
// 		$dpath = "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\Lib\\data";
// 		"C:\WORKS\WS\Eclipse_Luna\Cake_IFM11\app\Lib\data";
		
		$fname = $db_file;
// 		$fname = "ifm11_backup_20160107_092216.bk";
		
		$fpath = implode(DIRECTORY_SEPARATOR, array($dpath, $fname));

		debug($fpath);
		
		/*******************************
			valid: db file exists
		*******************************/
		if (! file_exists($fpath)) {
			
			debug("no such db file => $db_file");
			
			return ;
			
		}//! file_exists($fpath)
		
		/*******************************
		 pdo: setup
		*******************************/
		//REF http://www.if-not-true-then-false.com/2012/php-pdo-sqlite3-example/
		$file_db = new PDO("sqlite:$fpath");
			
		if ($file_db === null) {
		
			debug("pdo => null");
		
			return null;
		
		} else {
				
// 			debug("pdo => created");
				
		}
			
		// Set errormode to exceptions
		$file_db->setAttribute(PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION);

		/*******************************
		 prep: data for insertion
		*******************************/
		$sql = "INSERT INTO ifm11 ("
				."created_at, modified_at, "		// 1,2
				."date_added, date_modified, "		// 3,4
				."file_path, file_name"				// 5,6
						.") "
								."SELECT "
// 								."VALUES ("
										."?, ?, "
										."?, ?, "
										."?, ?"
								." "
// 								.")"
				." "
				."WHERE NOT EXISTS(SELECT 1 FROM ifm11 WHERE file_path = ? AND file_name = ?)"
			;
			
		debug($sql);
		
		$time = Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]);
		
		// counter => insertion successful
		$count = 0;
		
		// insert
		foreach ($list_Files as $elem) {
		
			$data = array(
			
					$time,		// created_at
					$time,		// modified_at
					
					$time,		// date_added
					$time,		// date_modified
					
					$dpath_ImageFiles,		// file_path
					$elem,		// file_name
						
					$dpath_ImageFiles,		// file_path
					$elem		// file_name
						
			);
			
			$qry = $file_db->prepare($sql);

			//ref http://php.net/manual/en/pdostatement.execute.php
			$res = $qry->execute($data);
			
			//debug
			if ($res === true) {
	
				debug("execute => true: ".$elem);
				
				// count
				$count += 1;
	
			} else {
	
				debug("execute => false: ".$elem);
	
			}//if ($res === true)
					
		}//foreach ($list_Files as $elem)
		
		/*******************************
			report
		*******************************/
		$msg = sprintf("insert: total => %d, done => %d", $lenOf_List_Files, $count);
				
		debug($msg);
		
		/*******************************
		 pdo => reset
		*******************************/
		$file_db = null;
		
	}//manage_IPhone_ImageFiles__Insert_Data

	public function
	manage_IPhone_ImageFiles() {
		
		/*******************************
			valid: local server
		*******************************/
		if (Utils::get_HostName() != "localhost") {
		
			debug("I am not a local server. No op.");
				
			return;
				
		} else {
			
			//debug
			
			debug("local server");
// 			debug("remote server: image_manager__Update_CSV --> under construction");
			
// 			return;
			
		}

		/*******************************
			valid: param
		*******************************/
		$db_file = @$this->request->query['db_file'];
		
		if ($db_file == null) {
			
			debug("db file => not designated");
			
			return ;
			
		} else {//$db_file == null
			
			debug("db file => $db_file");
			
		}//$db_file == null
		
// 		/*******************************
// 			rename => file names
// 		*******************************/
// // 		$this->manage_IPhone_ImageFiles__Change_FileNames();

		/*******************************
			insert data
		*******************************/
		$this->manage_IPhone_ImageFiles__Insert_Data($db_file);
// 		$this->manage_IPhone_ImageFiles__Insert_Data();
		
	}//manage_IPhone_ImageFiles()
	
	public function
	manage_IPhone_ImageFiles__Insert_Data__OnMac($db_file) {
// 	manage_IPhone_ImageFiles__Insert_Data() {
		
		//debug
		debug("manage_IPhone_ImageFiles__Insert_Data__OnMac");
		
// 		return ;
		
		/*******************************
			list of file names
		*******************************/
		// path to image file dir
// 		$dpath_ImageFiles = "/Users/mac/Desktop/works/storage/images/from_iphone/renamed";
		$dpath_ImageFiles = "C:\Users\iwabuchiken\data\images\iphone";
// 		$dpath_ImageFiles = "C:\Users\kbuchi\Desktop\data\images\iphone";
// 		$dpath_ImageFiles = "C:\Users\kbuchi\Desktop\data\images\is13sh";
		
		// validate
		if (! file_exists($dpath_ImageFiles)) {
			
			debug("no such dir => $dpath_ImageFiles");
			
			return ;
			
		}
		
		// list
		$list_Files = array_values(array_diff(
				scandir($dpath_ImageFiles), array('..', '.')));
		
		// filter => items starting with "." char
		foreach ($list_Files as $key => $element) {
			if (Utils::startsWith($element, ".")) {
				
				unset($list_Files[$key]);
				
				debug("unset done => $element($key)");
				
			}
		}
		
		// reset keys
		$list_Files = array_values($list_Files);
		
		$lenOf_List_Files = count($list_Files);
		
		debug("files => ".$lenOf_List_Files);
// 		debug("files => ".count($list_Files));

// 		debug($list_Files);
		debug("list_Files[0] => ".$list_Files[0]);
		debug("list_Files[1] => ".$list_Files[1]);
		
// 		//debug
// 		return ;
		
		/*******************************
			setup: vars
		*******************************/
		$dpath = Utils::get_fpath();
		
// 		debug("dpath => $dpath");
		
// 		$dpath = "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\Lib\\data";
// 		"C:\WORKS\WS\Eclipse_Luna\Cake_IFM11\app\Lib\data";
		
		$fname = $db_file;
// 		$fname = "ifm11_backup_20160107_092216.bk";
		
		$fpath = implode(DIRECTORY_SEPARATOR, array($dpath, $fname));

		debug($fpath);
		
		//debug
		debug("fpath => $fpath");
		
		/*******************************
			valid: db file exists
		*******************************/
		if (! file_exists($fpath)) {
			
			debug("no such db file => $db_file");
			
			return ;
			
		}//! file_exists($fpath)
		
		/*******************************
		 pdo: setup
		*******************************/
		//REF http://www.if-not-true-then-false.com/2012/php-pdo-sqlite3-example/
		$file_db = new PDO("sqlite:$fpath");
			
		if ($file_db === null) {
		
			debug("pdo => null");
		
			return null;
		
		} else {
				
// 			debug("pdo => created");
				
		}
			
		// Set errormode to exceptions
		$file_db->setAttribute(PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION);

		/*******************************
		 prep: data for insertion
		*******************************/
		$sql = "INSERT INTO ifm11 ("
				."created_at, modified_at, "		// 1,2
				."date_added, date_modified, "		// 3,4
				."file_path, file_name"				// 5,6
						.") "
								."SELECT "
// 								."VALUES ("
										."?, ?, "
										."?, ?, "
										."?, ?"
								." "
// 								.")"
				." "
				."WHERE NOT EXISTS(SELECT 1 FROM ifm11 WHERE file_path = ? AND file_name = ?)"
			;
			
		debug("sql => $sql");
		
		$time = Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]);
		
		// counter => insertion successful
		$count = 0;
		
		// insert
		foreach ($list_Files as $elem) {
		
			$data = array(
			
					$time,		// created_at
					$time,		// modified_at
					
					$time,		// date_added
					$time,		// date_modified
					
					$dpath_ImageFiles,		// file_path
					$elem,		// file_name
						
					$dpath_ImageFiles,		// file_path
					$elem		// file_name
						
			);
			
			$qry = $file_db->prepare($sql);

			//ref http://php.net/manual/en/pdostatement.execute.php
			$res = $qry->execute($data);
			
			//debug
			if ($res === true) {
	
				debug("execute => true: ".$elem);
				
				// count
				$count += 1;
	
			} else {
	
				debug("execute => false: ".$elem);
	
			}//if ($res === true)
					
		}//foreach ($list_Files as $elem)
		
		/*******************************
			report
		*******************************/
		$msg = sprintf("insert: total => %d, done => %d", $lenOf_List_Files, $count);
				
		debug($msg);
		
		/*******************************
		 pdo => reset
		*******************************/
		$file_db = null;
		
		/*******************************
				report
		*******************************/
		debug("manage_IPhone_ImageFiles__Insert_Data__OnMac => done");
		
	}//manage_IPhone_ImageFiles__Insert_Data__OnMac($db_file)

	public function
	manage_IPhone_ImageFiles__OnMac() {
		
		/*******************************
			valid: local server
		*******************************/
		if (Utils::get_HostName() != "localhost") {
		
			debug("I am not a local server. No op.");
				
			return;
				
		} else {
			
			//debug
			
			debug("local server");
// 			debug("remote server: image_manager__Update_CSV --> under construction");
			
// 			return;
			
		}

		/*******************************
			valid: param
		*******************************/
		$db_file = @$this->request->query['db_file'];
		
		if ($db_file == null) {
			
			debug("db file => not designated");

			/*******************************
			 view
			 *******************************/
			$this->render("/Images/manage__i_phone__image_files");
				
			return ;
			
		} else {//$db_file == null
			
			debug("db file => $db_file");
			
		}//$db_file == null
		
// 		/*******************************
// 			rename => file names
// 		*******************************/
// // 		$this->manage_IPhone_ImageFiles__Change_FileNames();

		/*******************************
			insert data
		*******************************/
		$this->manage_IPhone_ImageFiles__Insert_Data__OnMac($db_file);
// 		$this->manage_IPhone_ImageFiles__Insert_Data();
		
		/*******************************
				view
		*******************************/
		$this->render("/Images/manage__i_phone__image_files");
		
	}//manage_IPhone_ImageFiles()
	
}



// public function
// _index_2__Sort() {
// 	// 	_index__Sort() {

// 	/*******************************
// 	 get query
// 	*******************************/
// 	$sort_name = @$this->request->query['sort'];

// 	$sort_direction = @$this->request->query['direction'];

// 	// 		debug("\$sort_name => ".$sort_name." / "."\$sort_direction => ".$sort_direction);

// 	/*******************************
// 	 sort name
// 	*******************************/
// 	if ($sort_name === null && $sort_name == "") {
			
// 		$sort_name = "id";
			
// 	}

// 	/*******************************
// 	 direction
// 	*******************************/
// 	$val_Session_Direction = CONS::$session_Key_Direction;
// 	// 		$val_Session_Direction = "direction";

// 	$val_Session_Direction__ASC = "asc";
// 	$val_Session_Direction__DESC = "desc";

// 	//test
// 	// read the sessin value
// 	$tmp = $this->Session->read($val_Session_Direction);

// 	debug("_index__Sort : session direction => $tmp");

// 	/*******************************
// 	 query is not given
// 	*******************************/
// 	if ($sort_direction === null || $sort_direction == "") {
// 		// 		if ($sort_direction === null && $sort_direction == "") {

// 		// 			debug("\$sort_direction === null || \$sort_direction == \"\" ---> true");
			
// 		// read the sessin value
// 		@$session_Direction = $this->Session->read($val_Session_Direction);
// 		// 			@$session_Direction = $this->Session->read("direction");
			
// 		// 			debug("\$session_Direction => ".$session_Direction);
			
			
// 		// paginatin => in effect?
// 		@$named = $this->request->named;
			
// 		// 			debug("session_Direction => '$session_Direction'");
// 		// 			debug(" / "."\$named => ");
// 		// 			debug($named);
			
			 	
// 		/*******************************
// 		 current => not set
// 		--> set to 'asc' (default)
// 		*******************************/
// 		if ($named != null) {//if ($session_Direction === null)

// 			debug("\$named != null");

// 			if ($session_Direction === null) {

// 				$sort_direction = $val_Session_Direction__ASC;
					
// 				// update session value
// 				$this->Session->write($val_Session_Direction, $val_Session_Direction__ASC);

// 			} else {
					
// 				// set var
// 				$sort_direction = $session_Direction;

// 			}

// 			/*******************************
// 				current => not set
// 			--> set to 'asc' (default)
// 			*******************************/
// 		} else if ($session_Direction === null) {
				
// 			// 				debug("\$session_Direction === null");

// 			$sort_direction = $val_Session_Direction__ASC;

// 			// update session value
// 			$this->Session->write($val_Session_Direction, $val_Session_Direction__ASC);

// 			/*******************************
// 				current => asc
// 			--> change to 'desc'
// 			*******************************/
// 		} else if ($session_Direction == $val_Session_Direction__ASC) {

// 			// 				debug("\$session_Direction == \$val_Session_Direction__ASC");

// 			// set var
// 			$sort_direction = $val_Session_Direction__DESC;

// 			// update session value
// 			// 				$this->Session->write("desc");
// 			$this->Session->write($val_Session_Direction, $val_Session_Direction__DESC);

// 			/*******************************
// 				current => desc
// 			--> change to 'asc'
// 			*******************************/
// 		} else if ($session_Direction == $val_Session_Direction__DESC) {

// 			debug("\$session_Direction == \$val_Session_Direction__DESC");

// 			// set var
// 			$sort_direction = $val_Session_Direction__ASC;

// 			// update session value
// 			$this->Session->write($val_Session_Direction, $val_Session_Direction__ASC);

// 			/*******************************
// 				default
// 			*******************************/
// 		} else {//if ($session_Direction === null)
				
// 			$sort_direction = $val_Session_Direction__ASC;

// 			// update session value
// 			$this->Session->write($val_Session_Direction, $val_Session_Direction__ASC);
// 			// 				$this->Session->write(val_Session_Direction, $val_Session_Direction__ASC);

// 			debug("session_Direction => default");

// 		}//if ($session_Direction === null)
			
			
// 			// 			$sort_direction = $val_Session_Direction__ASC;
			
// 	} else {//if ($sort_direction === null && $sort_direction == "")
			
// 		debug("else");
			
// 		debug("\$sort_direction => $sort_direction");
			
// 	}

// 		// 		debug("\$sort_direction => $sort_direction");

// 		// 		if ($sort_name != null && $sort_name != ""
// 		// 				&& ($sort_direction != null && $sort_direction != "")) {

// 		// 			$opt_order = array("Image.".$sort_name => $sort_direction);
// 	// 			$opt_order = array("Image.".$sort_name => 'desc');
// 	// 			$opt_order = array("Image.".$sort_name => 'asc');
// 	// 			$opt_order = array($sort_name => 'asc');

// 	// 		} else {

// 	// // 			$sort_name = "id";

// 	// // 			$sort_direction = "asc";
		
// 	// // 			$opt_order = array($sort_name => $sort_direction);
// 	// // 			$opt_order = array($sort_name => 'asc');
// 	// 			// 			$opt_order = array('id' => 'asc');

// 	// 		}

// 	/*******************************
// 	 set
// 	*******************************/
// 	$opt_order = array("Image.".$sort_name => $sort_direction);

// 	$this->set("sort", $sort_name);

// 	$this->set("direction", $sort_direction);

// 	/*******************************
// 	 return
// 	*******************************/
// 	// 		return $this->_index__Sort();
// 	return $opt_order;

// }//_index__Sort
