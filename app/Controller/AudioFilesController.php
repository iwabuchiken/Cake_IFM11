<?php

class AudioFilesController extends AppController {
	
// 	public $scaffold;
	
	public $helpers = array('Html', 'Form');
// 	public $helpers = array('Html', 'Form');

	//REF http://book.cakephp.org/2.0/en/core-libraries/components/pagination.html
	public $components = array('Paginator');

	public function index() {

		
		debug("index");
		
		/*******************************
			audio files
		*******************************/
		$audio_Files = $this->AudioFile->find('all');
		
		debug("count(\$audio_Files) => ".count($audio_Files));
		
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
		
			$result = Utils::find_All_Images__DateRange($sort_ColName, $sort_Direction);
			
		}//if ($filter_No_Memos != null && $filter_No_Memos ==)
		
// 		$result = Utils::find_All_Images__DateRange($sort_ColName, $sort_Direction);

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

		/*******************************
			set: data
		*******************************/
		$this->set("images", $images);
		
		$this->set("numOf_images", $result[1]);
		
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
// 		$fpath = "";
			
// 		if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local) {
		
// 			$fpath .= "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\Lib\\data";
		
// 		} else {
		
// 			$fpath .= "/home/users/2/chips.jp-benfranklin/web/cake_apps/Cake_IFM11/app/Lib/data";
		
// 		}//if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local)
		
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
				
			$dpath = "C:\\WORKS\\WS\\Eclipse_Luna"
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
	audio_manager() {
	
		/*******************************
			update: cake db
		*******************************/
		$this->add_AudioFiles_From_DB_File();
		
		/*******************************
			build list => sqlite data
		*******************************/
		$sort_ColName = "file_name";

		$sort_Direction = "DESC";

		$listOf_AMs__SQLITE = Utils::find_AudioFiles__SQLITE($sort_ColName, $sort_Direction);
// 		$listOf_AMs__SQLITE = Utils::find_AudioFiles__SQLITE();
	
		if (count($listOf_AMs__SQLITE) > 0) {
		
			debug("\$listOf_AMs__SQLITE => ".count($listOf_AMs__SQLITE));
			
// 			debug($listOf_AMs__SQLITE[0]);
		
		} else {
		
			debug("\$listOf_AMs__SQLITE => < 0");
			
			return ;
			
		}//if (count($listOf_AMs__SQLITE) > 0)
		
		/*******************************
			set values
		*******************************/
		$this->set("listOf_AMs__SQLITE", $listOf_AMs__SQLITE);
	
	}//audio_manager
	

	/*******************************
	 use => CONS::$adminKey_last_Added_From_DBFile<br>
	convert => "2015/09/16 00:00:00.000" to "2015-09-16_00-00-00.000"
	where args => "WHERE file_name > admin val::add_image_Range_Start,End"
	// 		where args => "WHERE file_name > $last_Added_From_DBFile"
	*******************************/
	public function
	add_AudioFiles_From_DB_File() {
	
		/*******************************
		 valid: remote server
		*******************************/
		if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local) {
				
			debug("Not the remote server");
				
			$this->add_AudioFiles_From_DB_File__Local();
				
			return;
	
		}
	
		/*******************************
		 valid: "GO" command given
		*******************************/
		$command = @$this->request->query['command'];
	
		if ($command == null || $command != "GO") {
	
			debug("no command, or, no 'GO' param");
			
			// 			debug("No 'GO' command given. No operations => ?command=GO");
	
			return ;
	
		}//$command == null || $command != "GO"
	
		// 		$res = Utils::add_ImageData_From_DB_File();

		/*******************************
			get: latest audio memo instance
		*******************************/
		$am_MySQL_Latest = Utils::find_AudioFiles__MySQL__Latest();
	
		/*******************************
			get: file name
		*******************************/
		$am_MySQL_Latest_FileName = "";
		
		if (count($am_MySQL_Latest) > 0) {
		
			$am_MySQL_Latest_FileName = $am_MySQL_Latest['AudioFile']['file_name'];
		
		} else {
		
			$latest_file_name = @$this->request->query['latest-file-name'];

			if ($latest_file_name != null && $latest_file_name != "") {
			
				$am_MySQL_Latest_FileName = $latest_file_name;
			
			} else {
			
				$am_MySQL_Latest_FileName = "レコード_2015-12-09_05-57-31.mp3";
				
			}//if ($latest_file_name != null && $latest_file_name != "")
			
// 			$am_MySQL_Latest_FileName = "レコード_2015-12-09_05-57-31.mp3";
// 			$am_MySQL_Latest_FileName = "";
			
		}//if (count($am_MySQL_Latest) > 0)
		
		debug("\$am_MySQL_Latest_FileName => ".$am_MySQL_Latest_FileName);
		
		/*******************************
			get: list of am file names => from sqlite
		*******************************/
		$listOf_AMs__SQLITE = Utils::find_AudioFiles__SQLITE();
// 		$listOf_AMs__SQLITE = Utils::find_AudioFiles__SQLITE__Latest();

		if ($listOf_AMs__SQLITE === null) {
		
			debug("\$listOf_AMs__SQLITE => null");
		
		} else {
		
			debug("\$listOf_AMs__SQLITE => ".count($listOf_AMs__SQLITE));
			
		}//if ($listOf_AMs__SQLITE === null)
		
		/*******************************
			filter: which AMs to save
		*******************************/
		$listOf_AMs__SQLITE__FilteredBy_FileName = array();
		
		foreach ($listOf_AMs__SQLITE as $elem) {
		
			$file_name = $elem['file_name'];
			
			// judge
			if ($file_name > $am_MySQL_Latest_FileName) {
				
				array_push($listOf_AMs__SQLITE__FilteredBy_FileName, $elem);
				
			}//$file_name > $am_MySQL_Latest_FileName
			
		}//foreach ($listOf_AMs__SQLITE as $elem)
		
		debug("count(\$listOf_AMs__SQLITE__FilteredBy_FileName => "
				.count($listOf_AMs__SQLITE__FilteredBy_FileName));
		
	}//add_AudioFiles_From_DB_File

	/*******************************
		add from local db file => "ta2_backup_XXX.bk"<br>
		loc => "C:\WORKS\WS\Eclipse_Luna\Cake_IFM11\Lib\data\ta"
	*******************************/
	public function
	add_AudioFiles_From_DB_File__Local() {
		
		$dpath_Src = Utils::get_fpath();
		
		$dpath_Src .= DIRECTORY_SEPARATOR."ta";
		
// 		$dpath_Src = "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\Lib\\data\\ta";
// 		$dpath_Src = "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_IFM11\\Lib\\data\\ta";
// 		$dpath_Src = "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_IFM11\\lib\\data\\csv";
// 				$dpath_Src = "lib\\data\\csv";
	
		$fname_Src = Utils::get_Latest_File__By_FileName($dpath_Src);
// 		$fname_Src = "images.csv";
	
// 		debug("\$fname_Src => ".$fname_Src);
		
		$fpath_Src = implode(DIRECTORY_SEPARATOR, array($dpath_Src, $fname_Src));
	
// 		debug("\$fpath_Src => ".$fpath_Src);
	
		/*******************************
		 pdo: setup
		*******************************/
		//REF http://www.if-not-true-then-false.com/2012/php-pdo-sqlite3-example/
		$file_db = new PDO("sqlite:$fpath_Src");
// 		$file_db = new PDO("sqlite:$fpath");
			
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
		 params
		*******************************/
		$sort_ColName = "file_name";
// 		$sort_ColName = "_id";
		
		$sort_Direction = "DESC";
		
		/*******************************
		 build list: from CSV
		*******************************/
// 		$where_Col = "file_name";
		
		$q = "SELECT * FROM ".CONS::$tname_SQLITE_AudioFiles
// 		$q = "SELECT * FROM ".CONS::$tname_IFM11
// 		." "."WHERE"." "
// 				.$where_Col." ".">="." "."'$start'"
// 				." "."AND"." "
// 						.$where_Col." "."<="." "."'$end'"
// 						." "."AND"." "
// 								."memos is null"
			
										//ref http://www.tutorialspoint.com/sqlite/sqlite_order_by.htm
		." "."ORDER BY"." "
				.$sort_ColName." ".$sort_Direction
				;
					
// 		debug("q => $q");
		
		$result = $file_db->query($q);
		
		// 		debug(get_class($result));

		$aryOf_AudioFiles__SQLITE = array();
		
		foreach ($result as $elem) {
		
			array_push($aryOf_AudioFiles__SQLITE, $elem);
			
// 			debug($elem);

		}//foreach ($result as $elem)

// 		debug("\$aryOf_AudioFiles__SQLITE => ".count($aryOf_AudioFiles__SQLITE));
		
// 		debug($aryOf_AudioFiles__SQLITE[0]);
		
// 		// 		debug(get_class($result));

// 		foreach ($result as $elem) {
		
// 			debug($elem);

// 			break;
			
// 		}//foreach ($result as $elem)
		
		
		
		/*******************************
		 get: num of images
		*******************************/
		$q_Count = "SELECT Count(*) FROM ".CONS::$tname_SQLITE_AudioFiles
// 		$q_Count = "SELECT Count(*) FROM ".CONS::$tname_IFM11
// 		." "."WHERE"." "
// 				.$where_Col." ".">="." "."'$start'"
// 				." "."AND"." "
// 						.$where_Col." "."<="." "."'$end'"
// 						." "."AND"." "
// 								."memos is null"
										//ref http://www.tutorialspoint.com/sqlite/sqlite_order_by.htm
		." "."ORDER BY"." "
				.$sort_ColName." ".$sort_Direction
				;
		
				$result_Num = $file_db->query($q);
		
				$numOf_Images = $result_Num->fetchColumn();
		
// 		debug("\$q_Count => ".$q_Count);
		
		$result_Num = $file_db->query($q_Count);
		
		$numOf_AudioFiles = $result_Num->fetchColumn();
// 		$numOf_Images = $result_Num->fetchColumn();
		
// 		debug("\$numOf_AudioFiles => ".$numOf_AudioFiles);
		
		/*******************************
		 pdo => reset
		*******************************/
		$file_db = null;
		
		/*******************************
			build: local db file: audio files
		*******************************/
		$sortColumn	= "file_name";
		$direction	= "DESC";
		
		$listOf_AudioFiles__CakeModel = 
						Utils::find_All_AudioFiles__CakeModel($sortColumn, $direction);
// 		$listOf_AudioFiles__SQLITE = Utils::find_AudioFiles__SQLITE();
		
// 		debug("\$listOf_AudioFiles__CakeModel => ".count($listOf_AudioFiles__CakeModel));
		
		/*******************************
			get: latest entry in Cake db
		*******************************/
		if (count($listOf_AudioFiles__CakeModel) < 1) {
		
			$fileNameOf_Latest_AF__CakeModel = "";
		
		} else {
		
			$fileNameOf_Latest_AF__CakeModel = 
						$listOf_AudioFiles__CakeModel[0]['AudioFile']['file_name'];
			
		}//if (count($listOf_AudioFiles__CakeModel) < 1)
		
		
		debug("\$fileNameOf_Latest_AF__CakeModel => ".$fileNameOf_Latest_AF__CakeModel);
		
		/*******************************
			insert new AFs
		*******************************/
		$count = 0;
		
		$aryOf_AudioFiles_ToInsert = array();
		
		foreach ($aryOf_AudioFiles__SQLITE as $elem) {
		
			$file_name = $elem['file_name'];

			if ($file_name > $fileNameOf_Latest_AF__CakeModel) {
				
				debug("Larger => $file_name > $fileNameOf_Latest_AF__CakeModel");
				
				$res_b = Utils::insert_Data__AudioFile($elem);
				
				if ($res_b == true) {
				
					$count += 1;
				
					debug("new record inserted => $file_name");
					
				} else {
				
					debug("new record NOT inserted => $file_name");
					
				}//if ($res_b == true)
				
			}//$file_name > $fileNameOf_Latest_AF__CakeModel
			
		}//foreach ($aryOf_AudioFiles__SQLITE as $elem)
		
		debug("total inserted => $count (records from sqlite => "
				.count($aryOf_AudioFiles__SQLITE).")");

		
// 		$this->test();
		
	}//add_AudioFiles_From_DB_File__Local()

	public function
	update_audio_file_data() {

		/*******************************
		 layout
		*******************************/
		$this->layout = "plain";
		
		/*******************************
			query
		*******************************/
		$audio_file_id = @$this->request->query['audio_file_id'];
		$text = @$this->request->query['text'];

		/*******************************
			validate: id not null
		*******************************/
		if ($audio_file_id === null) {
		
			$this->set("message", "id => can't find: $audio_file_id");
		
			$this->render("/Elements/audio_files/update_audio_file_data");
			
			return;
			
		} else if ($text === null) {
		
			$this->set("message", "text => null: $audio_file_id");
		
			$this->render("/Elements/audio_files/update_audio_file_data");
			
			return;
			
		}//if ($audio_file_id != null)
		
		/*******************************
			find: audio file
		*******************************/
// 		$opt = array('conditions' => 
// 							array(
// 									'AudioFile.id LIKE' => "$audio_file_id")
// 		);
		
		$af = Utils::find_AudioFile__SQLITE($audio_file_id);
// 		$af = $this->AudioFile->find("first", $opt);
		
// 		debug(($af == null ? "audio file => null" : $af));
		
		/*******************************
			valid: af instance exists
		*******************************/
		if ($af == null) {
			
			/*******************************
				set values
			*******************************/
			$this->set("message", "af => null (id = ".$audio_file_id.")");
			
			/*******************************
				view
			*******************************/
			$this->render("/Elements/audio_files/update_audio_file_data");
			
			return ;
			
		}//$af == null
		
// 		debug($af);
		
		/*******************************
			update: text
		*******************************/
		$af['text'] = $text;
		
// 		debug($af);
		
		/*******************************
			update af
		*******************************/
		$res_b = Utils::update_AudioFile__SQLITE($af);
		
		/*******************************
			set values
		*******************************/
		$this->set("message", sprintf("done: %s (%s)", $af['_id'], $text));
// 		$this->set("message", sprintf("done: %s (%s)", $af['AudioFile']['id'], $text));
// 		$this->set("message", "done: ".$af['AudioFile']['id']);
		
		/*******************************
			view
		*******************************/
		$this->render("/Elements/audio_files/update_audio_file_data");
		
	}//update_audio_file_data()
	
	public function
	test() {

		/*******************************
		 test
		*******************************/
// 		$fpath = "C:\\WORKS\\Storage\\audios\\and_ta2_audios\\AllVoice";
		// 		$fpath = "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_IFM11";
		// 		$fpath = "C:\\Users\\kbuchi\\Desktop\\data\\audios";
		// 		$fpath = "C:\\Users\\kbuchi\\Desktop\\data\\audios\\done";
		$fpath = "C:\\Users\\kbuchi\\Desktop\\data\\audios\\done\\レコード_2015-11-29_16-29-18.mp3";
		
		$res_b = file_exists(mb_convert_encoding($fpath, "UTF-8", "SJIS-win"));
// 		$res_b = file_exists(mb_convert_encoding($fpath, "UTF-8"));
		// 		$res_b = file_exists($fpath);
		
		debug(($res_b == true ? "file exists: $fpath" : "file NOT exists: $fpath"));
		
		$fpath = "C:\\WORKS\\Storage\\audios\\and_ta2_audios\\AllVoice";
		
		//test
		setlocale(LC_ALL, 'ja_JP.UTF-8');
		
		debug(scandir($fpath));
		
		//ref http://stackoverflow.com/questions/2887909/working-with-japanese-filenames-in-php-5-3-and-windows-vista/2888039#2888039 answered Oct 30 '10 at 6:58
		if ($handle = opendir($fpath)) {
				
			debug("file opened: $fpath");
				
			// 		if ($handle = opendir($this->dir)) {
			while (false !== ($file = readdir($handle))){
				$name = mb_convert_encoding($file, "UTF-8", "SJIS-win" );
				// 				$name = mb_convert_encoding($file, "UTF-8", "SJIS-win" );
				debug($name);
				// 				echo "$name<br>";
			}
			closedir($handle);
		}
		
		// 		debug(setlocale(LC_CTYPE, 0) );
		
		
	}//test()
	
	
}//class AudioFiles extends AppController
