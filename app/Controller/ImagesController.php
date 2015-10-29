<?php

class ImagesController extends AppController {
	
// 	public $scaffold;
	
	public $helpers = array('Html', 'Form');
// 	public $helpers = array('Html', 'Form');

	//REF http://book.cakephp.org/2.0/en/core-libraries/components/pagination.html
	public $components = array('Paginator');

	public function index() {

		//debug
// 		debug($this->request->named);
// 		debug($this->request);
		
		/**********************************
		 * sort
		**********************************/
		$opt_order = $this->_index__Sort();
// 		$options_sort = $this->_index__Sort();
		
// 		$sort_name = $options_sort[0];
// 		$sort_direction = $options_sort[1];
		
// 		$sort_name = @$this->request->query['sort'];
		
// 		if ($sort_name != null && $sort_name != "") {
		
// 			$opt_order = array("Image.".$sort_name => $sort_direction);
// // 			$opt_order = array("Image.".$sort_name => 'desc');
// // 			$opt_order = array("Image.".$sort_name => 'asc');
// // 			$opt_order = array($sort_name => 'asc');
		
// 		} else {
		
// 			$sort_name = "id";
				
// 			$opt_order = array($sort_name => 'asc');
// 			// 			$opt_order = array('id' => 'asc');
		
// 		}
		
// 		$this->set("sort", $sort_name);
		
		//test
// 		debug($opt_order);
// 		debug($this->request->query);
		
// 		//test
// 		$this->_test_CreateModel();
		
// 		//REF http://www.codeofaninja.com/2013/07/pagination-in-cakephp.html
// 		$this->paginate = array(
// 				'limit' => 4,
// 				'order' => $opt_order,
// // 				'order' => array(
// // 						'id' => 'asc'
// // 				)
// 		);
		
		//log
		Utils::write_Log($this->dpath_Log, "index()", __FILE__, __LINE__);
		
// 		$filter_TableName = $this->request->query['filter_table_name'];
		@$filter_TableName = $this->request->query['filter_table_name'];
		@$filter_Memo = $this->request->query['filter_memo'];

		$opt_conditions = $this->_index__Options();

// 		debug($opt_conditions);
		
		/**********************************
		* Build: list
		**********************************/
// 		if ($filter_TableName != null) {
			
// 			debug("filter => not null");

			$this->paginate = array(
// 					'conditions' => array('Image.file_name LIKE' => "%$filter_TableName%"),
					'conditions' => $opt_conditions,
// 					'conditions' => array('Image.memos LIKE' => "%$filter_TableName%"),
					'limit' => 4,
					'order' => $opt_order,
					
// 					'page'	=> 2,
					
// 					'order' => array(
// 							'id' => 'asc'
// 					)
			);
			
			$images = $this->paginate('Image');

// 			debug($this->params['paging']['Image']);
			
// 			array(
// 					'page' => (int) 1,
// 					'current' => (int) 4,
// 					'count' => (int) 7,
// 					'prevPage' => false,
// 					'nextPage' => true,
// 					'pageCount' => (int) 2,
// 					'order' => array(
// 							'Image.id' => 'asc'
// 					),
// 					'limit' => (int) 4,
// 					'options' => array(
// 							'order' => array(
// 									'Image.id' => 'asc'
// 							)
// 					),
// 					'paramType' => 'named'
// 			)

			$paginateData = $this->params['paging']['Image'];
			
// 			debug($paginateData);
			
// 			debug($this->paginator->sortDir());	//=> 'Call to a member function sortDir() on null'
// 			debug($this->Paginator->sortDir());	//=> 'Call to undefined method PaginatorComponent::sortDir()'
// 			debug($this->Paginator->sort());	//=> 'Call to undefined method PaginatorComponent::sortDir()'
			
// 			debug($images);
			
// 			$images = $this->_index_Build_ImageList_TableName($filter_TableName);
// 			$temp = $this->_index_Build_ImageList_TableName($filter_TableName);
			
			/**********************************
			 * total number of images
			**********************************/
// 			$this->set('total_num_of_images', $paginateData['count']);
			
// 			debug("page count => ".$paginateData['pageCount']);
			
			$this->set('total_num_of_images', count($this->Image->find('all')));
			
			$this->set('num_of_pages', $paginateData['pageCount']);  
			
			$this->set('num_of_images_filtered', $paginateData['count']);  
// 				count(
// 					$this->Image->find('all',
// 							array(
// 								'conditions' => 
// 									array(
// 										'Image.memos LIKE' => "%$filter_TableName%")
// // 										'Image.file_name LIKE' => "%$filter_TableName%")
// 							)
// 					)
// 				)
// 			);

// 			debug($temp);
// 			debug("\$temp => ".count($temp));
// 			debug("\$temp => ".$temp);
			
// 			$images = $this->Image->find('all');
			
// 		} else {
			
// // 			debug("filter => null");
			
// // 			$images = $this->Image->find('all');

// 			$images = $this->paginate('Image');

// 			/**********************************
// 			 * total number of images
// 			**********************************/
// 			$this->set('total_num_of_images', count($this->Image->find('all')));
					
// 		}
		
		$this->set('images', $images);
// 		$this->set('images', $this->Image->find('all'));

// 		//REF http://stackoverflow.com/questions/6836990/how-to-get-complete-current-url-for-cakephp answered Jul 29 '11 at 15:18
// 		debug($this->here);
// 		debug(Router::url( $this->here, true ));
// 		debug("/ => ".Router::url('/', true ));
		
// 		debug("webroot => ".$this->webroot);
		 
// 		debug("HTTP_HOST => ".$_SERVER['HTTP_HOST']);
		 
		/**********************************
		* store: current url
		**********************************/
		//REF http://book.cakephp.org/2.0/ja/core-libraries/components/sessions.html
		
		$current_url = Router::url('/', true ).substr($this->here, strlen($this->webroot));
		$this->Session->write('current_url', $current_url);
// 		$this->Session->write('current_url', Router::url( $this->here, true ));
		
// 		debug("\$current_url => ".$current_url);
		
// 		debug(Router::url( $this->here, true ));
		
		/**********************************
		* total number of images
		**********************************/
// 		$this->set('total_num_of_images', count($this->Image->find('all')));
		
// 		debug($this->request);
// 		debug($this->request->query);
		
// 		//REF http://www.codeofaninja.com/2013/07/pagination-in-cakephp.html
// 		$this->paginate = array(
// 				'limit' => 3,
// 				'order' => array(
// 						'id' => 'asc'
// 				)
// 		);
		
// 		// we are using the 'User' model
// 		$images2 = $this->paginate('Image');
		
// // 		debug($images2);
// // 		debug($images2);
		
// 		$this->set('images2', $images2);
		
	}
	
	public function
	_test_CreateModel() {
		
		$this->Image->create();

		$this->Image->set("created_at", Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]));
		
		$this->Image->save();
		
		debug("model created");
		
// 			$this->request->data['Image']['created_at'] =
// 				Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]);
				
// 			$this->request->data['Image']['updated_at'] =
// 				Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]);
				
// 			if ($this->Image->save($this->request->data)) {
	
		
	}
	
	
	public function
	_index__Sort() {

		/*******************************
			get query
		*******************************/
		$sort_name = @$this->request->query['sort'];
		
		$sort_direction = @$this->request->query['direction'];
		
		/*******************************
			sort name
		*******************************/
		if ($sort_name === null && $sort_name == "") {
			
			$sort_name = "id";
			
		}

		/*******************************
			direction
		*******************************/
		$val_Session_Direction = "direction";
		
		$val_Session_Direction__ASC = "asc";
		$val_Session_Direction__DESC = "desc";
		
		/*******************************
			query is not given
		*******************************/
		if ($sort_direction === null || $sort_direction == "") {
// 		if ($sort_direction === null && $sort_direction == "") {

			// read the sessin value
			@$session_Direction = $this->Session->read($val_Session_Direction);
// 			@$session_Direction = $this->Session->read("direction");
			
// 			debug("session_Direction => '$session_Direction'");
			
			// paginatin => in effect?
			@$named = $this->request->named;
			
			/*******************************
				current => not set
					--> set to 'asc' (default)
			*******************************/
			if ($named != null) {//if ($session_Direction === null)

				if ($session_Direction === null) {

					$sort_direction = $val_Session_Direction__ASC;
					
					// update session value
					$this->Session->write($val_Session_Direction, $val_Session_Direction__ASC);
						
				} else {
					
					// set var
					$sort_direction = $session_Direction;
						
				}
				
			/*******************************
				current => not set
					--> set to 'asc' (default)
			*******************************/
			} else if ($session_Direction === null) {
			
				debug("\$session_Direction === null");
				
				$sort_direction = $val_Session_Direction__ASC;

				// update session value
				$this->Session->write($val_Session_Direction, $val_Session_Direction__ASC);
				
			/*******************************
				current => asc
					--> change to 'desc'
			*******************************/
			} else if ($session_Direction == $val_Session_Direction__ASC) {
				
				// set var
				$sort_direction = $val_Session_Direction__DESC;
				
				// update session value
// 				$this->Session->write("desc");
				$this->Session->write($val_Session_Direction, $val_Session_Direction__DESC);

			/*******************************
				current => desc
					--> change to 'asc'
			*******************************/
			} else if ($session_Direction == $val_Session_Direction__DESC) {
				
				// set var
				$sort_direction = $val_Session_Direction__ASC;
				
				// update session value
				$this->Session->write($val_Session_Direction, $val_Session_Direction__ASC);

			/*******************************
				default
			*******************************/
			} else {//if ($session_Direction === null)
			
				$sort_direction = $val_Session_Direction__ASC;
				
				// update session value
				$this->Session->write(val_Session_Direction, $val_Session_Direction__ASC);
				
				debug("session_Direction => default");
				
			}//if ($session_Direction === null)
			
			
// 			$sort_direction = $val_Session_Direction__ASC;
			
		} else {//if ($sort_direction === null && $sort_direction == "")
			
			debug("else");
			
			debug("\$sort_direction => $sort_direction");
			
		}
		
// 		debug("\$sort_direction => $sort_direction");
		
// 		if ($sort_name != null && $sort_name != ""
// 				&& ($sort_direction != null && $sort_direction != "")) {
		
// 			$opt_order = array("Image.".$sort_name => $sort_direction);
			// 			$opt_order = array("Image.".$sort_name => 'desc');
			// 			$opt_order = array("Image.".$sort_name => 'asc');
			// 			$opt_order = array($sort_name => 'asc');
		
// 		} else {
		
// // 			$sort_name = "id";
		
// // 			$sort_direction = "asc";
			
// // 			$opt_order = array($sort_name => $sort_direction);
// // 			$opt_order = array($sort_name => 'asc');
// 			// 			$opt_order = array('id' => 'asc');
		
// 		}
		
		/*******************************
			set
		*******************************/
		$opt_order = array("Image.".$sort_name => $sort_direction);
		
		$this->set("sort", $sort_name);
		
		$this->set("direction", $sort_direction);

		/*******************************
			return
		*******************************/
		return $opt_order;
		
	}//_index__Sort
	
	public function
	_index__Options() {

		/*******************************
			memo
		*******************************/
		$opt_conditions = array();
		
		$opt_conditions = $this->_index__Options__Memo($opt_conditions);

		/*******************************
			table name
		*******************************/
		$opt_conditions = $this->_index__Options__TableName($opt_conditions);

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
	_index__Options__Memo($opt_conditions) {

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
			
				$opt_conditions = $this->_index__Options__Memo_AndOr(
						$opt_conditions, $query_Filter_Memo, $AND_OR);
					
			} else {
			
			
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
	_index__Options__Memo_AndOr
	($opt_conditions, $filter_String, $AND_OR) {

// 		if ($AND_OR != null) {
		
			$tokens = explode(" ", $filter_String);
				
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
				
				debug($tmp2);
				
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
				// 										'Image.memos LIKE' => '食事'
				// 								),
				// 								(int) 1 => array(
				// 										'Image.memos LIKE' => '食事'
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
				debug($tmp2);
				
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
		
	}//_index__Options__Memo
	
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
		
		//log
		$msg = "add()";
		Utils::write_Log($this->dpath_Log, $msg, __FILE__, __LINE__);
		
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
	
	public function delete($id) {
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
		
// 		/*******************************
// 			valid: local server?
// 		*******************************/
// 		if (env('SERVER_NAME') !== 'localhost') {	//REF api http://php.net/manual/ja/reserved.variables.server.php
// 			// 		if (env('SERVER_ADDR') !== '127.0.0.1') {	//=> false returned
// 			// 			$this->default = $this->development;
// 			debug("not local");
			
// // 			return ;
	
// 		} else {
			
// 			debug("local");
			
// 		}
		
		/*******************************
			get: images
		*******************************/
		$sort_ColName = "_id";
		$sort_Direction = "DESC";
		
		$images = Utils::find_All_Images($sort_ColName, $sort_Direction);
// 		$images = Utils::find_All_Images();
		

		/*******************************
			set: data
		*******************************/
		$this->set("images", $images);
		
	}//image_manager
	
}