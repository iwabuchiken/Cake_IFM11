<?php

class ImagesController extends AppController {
	
// 	public $scaffold;
	
	public $helpers = array('Html', 'Form');
// 	public $helpers = array('Html', 'Form');

	//REF http://book.cakephp.org/2.0/en/core-libraries/components/pagination.html
	public $components = array('Paginator');

	public function index() {

		//REF http://www.codeofaninja.com/2013/07/pagination-in-cakephp.html
		$this->paginate = array(
				'limit' => 4,
				'order' => array(
						'id' => 'asc'
				)
		);
		
		//log
		Utils::write_Log($this->dpath_Log, "index()", __FILE__, __LINE__);
		
// 		$filter_TableName = $this->request->query['filter_table_name'];
		@$filter_TableName = $this->request->query['filter_table_name'];
		@$filter_Memo = $this->request->query['filter_memo'];
		
		$opt_conditions = $this->_index__Options();

		debug($opt_conditions);
		
		/**********************************
		* Build: list
		**********************************/
		if ($filter_TableName != null) {
			
// 			debug("filter => not null");

			$this->paginate = array(
// 					'conditions' => array('Image.file_name LIKE' => "%$filter_TableName%"),
					'conditions' => array('Image.memos LIKE' => "%$filter_TableName%"),
					'limit' => 4,
					'order' => array(
							'id' => 'asc'
					)
			);
			
			$images = $this->paginate('Image');
			
// 			debug($images);
			
// 			$images = $this->_index_Build_ImageList_TableName($filter_TableName);
// 			$temp = $this->_index_Build_ImageList_TableName($filter_TableName);
			
			/**********************************
			 * total number of images
			**********************************/
			$this->set('total_num_of_images', count($this->Image->find('all')));
			
			$this->set('num_of_images_filtered', 
				count(
					$this->Image->find('all',
							array(
								'conditions' => 
									array(
										'Image.memos LIKE' => "%$filter_TableName%")
// 										'Image.file_name LIKE' => "%$filter_TableName%")
							)
					)
				)
			);

// 			debug($temp);
// 			debug("\$temp => ".count($temp));
// 			debug("\$temp => ".$temp);
			
// 			$images = $this->Image->find('all');
			
		} else {
			
// 			debug("filter => null");
			
// 			$images = $this->Image->find('all');

			$images = $this->paginate('Image');

			/**********************************
			 * total number of images
			**********************************/
			$this->set('total_num_of_images', count($this->Image->find('all')));
					
		}
		
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

		/**********************************
		 * return
		**********************************/
		return $opt_conditions;

	}//_index__Options
	
	public function 
	_index__Options__Memo($opt_conditions) {

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
		
				// 				$opt_conditions['Token.hin'] = "DISTINCT ".$session_Filter;
				$opt_conditions['Image.memos LIKE'] = "%$session_Filter%";
		
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
		
			// 			$opt_conditions['History.line LIKE'] = "%$query_Filter_Hins%";
		
			//REF http://book.cakephp.org/2.0/en/models/retrieving-your-data.html
			// 			$opt_conditions['Image.memos LIKE'] = "DISTINCT ".$query_Filter_Hins;
			$opt_conditions['Image.memos LIKE'] = "%$query_Filter_Memo%";
		
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
			$msg = "add by post";
			Utils::write_Log($this->dpath_Log, $msg, __FILE__, __LINE__);
			
			$this->Image->create();
				
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
				
			$this->Image->create();
				
// 			$this->request->data['Image']['created_at'] =
// 			Utils::get_CurrentTime2(CONS::$timeLabelTypes["rails"]);
				
// 			$this->request->data['Image']['updated_at'] =
// 			Utils::get_CurrentTime2(CONS::$timeLabelTypes["rails"]);
				
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
	
	}//public function edit($id = null)
	
	
}