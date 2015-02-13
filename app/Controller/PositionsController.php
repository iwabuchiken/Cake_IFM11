<?php

class PositionsController extends AppController {
	public $helpers = array('Html', 'Form');

	public function index() {
		
		/******************************
		
			position: set options
		
		******************************/
		$option = $this->_index_Options();
		
// 		debug($option);
		
		$this->set('positions', $this->Position->find('all',
				$option
				
		));
		
	}//public function index()
	
	public function _index_Options() {
		
// 		debug($this->request->query['sort']);
		
		if (@$this->request->query['sort']) {
			// 		if (@$this->request->query['order']) {
		
			$sort = $this->request->query['sort'];
				
			// 			debug("yes");
			$option = array(
					'order' => array(
							"Position.$sort" => 'asc')
			);
				
		} else {
		
			$option = array(
					'order' => array(
							"Position.id" => 'asc')
			);
		
		}
		
		return $option;
		
	}
	
	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid position'));
		}
	
		$position = $this->Position->findById($id);
		if (!$position) {
			throw new NotFoundException(__('Invalid position'));
		}
		$this->set('position', $position);
		
// 		debug($position);
		
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Position->create();
			
// 			$this->Position['created_at'] = Utils::get_CurrentTime();
			$this->request->data['Position']['created_at'] = Utils::get_CurrentTime();
			$this->request->data['Position']['updated_at'] = Utils::get_CurrentTime();
			
			if ($this->Position->save($this->request->data)) {
				
				$this->Session->setFlash(__('Your position has been saved.'));
				return $this->redirect(array('action' => 'index'));
				
			} else {
				
				$this->Session->setFlash(__('Unable to add your position.'));
				
			}
			
		} else {
			
// 			$data = [1,2,3,4,5];
// 			$data = array(1 => 1, 2 => 2, 3 => 3, 4 => 4);
			$this->loadModel('Video');
				
			$videos = $this->Video->find('all');
				
			// 			debug($langs);
				
			$select_Videos = array();
				
			foreach ($videos as $video) {
			
				$video_Name = $video['Video']['title'];
				$video_Id = $video['Video']['id'];
			
				$select_Videos[$video_Id] = $video_Name;
					
			}
				
			// 			debug($select_Langs);
				
			//REF http://www.php.net/manual/en/function.asort.php
			asort($select_Videos);
				
			$this->set('video_names', $select_Videos);
			
		}
	}

	public function delete($id) {
		/******************************
	
		validate
	
		******************************/
		if (!$id) {
			throw new NotFoundException(__('Invalid position id'));
		}
	
		$position = $this->Position->findById($id);
	
		if (!$position) {
			throw new NotFoundException(__("Can't find the position. id = %d", $id));
		}
	
		/******************************
	
		delete
	
		******************************/
		if ($this->Position->delete($id)) {
			// 		if ($this->Position->save($this->request->data)) {
	
			$this->Session->setFlash(__(
								"Position deleted => %s", 
								$position['Position']['point']));
	
			return $this->redirect(
					array(
							'controller' => 'positions',
							'action' => 'index'
				
					));
	
		} else {
	
			$this->Session->setFlash(
					__("Position can't be deleted => %s", 
							$position['Position']['point']));
	
			// 			$page_num = _get_Page_from_Id($id - 1);
	
			return $this->redirect(
					array(
							'controller' => 'positions',
							'action' => 'view',
							$id
					));
	
		}
	
	}//public function delete($id)
	
	public function edit_memo() {

// 		$this->layout = 'plain';
		
		/******************************
		
			params
		
		******************************/
		$position_id = $this->request->query['id'];
		$position_memo = $this->request->query['memo'];
		$video_id = $this->request->query['video_id'];

		/******************************
		
			position
		
		******************************/
		$position = $this->Position->findById($position_id);
// 		$position = $this->Position->findById($id);
		
		$position['Position']['memo'] = $position_memo;
		
		/******************************
		
			Edit memo
		
		******************************/
		$this->Position->save($position);
		
// 		if ($res == true) {
		
		$this->sort_PosList($video_id);
			// 			$this->render('/Elements/videos/js/delete_position_failed');
				
// 		} else {
		
// 			// 			delete_position_failed.ctp
// 			$this->render('/Elements/videos/js/delete_position_failed');
		
// 		}
// 		;
		
		
// 		$position = $this->Position->findById($id);
	}

	public function
	sort_PosList($video_id) {
		/******************************
	
		layout
	
		******************************/
		$this->layout = 'plain';
	
		/******************************
	
		get: parameter
	
		******************************/
// 		$id = $this->request->query['video_id'];
	
		/******************************
	
		positions
	
		******************************/
// 		$this->loadModel('Position');
			
		$positions = $this->Position->find('all',
				//REF conditions http://book.cakephp.org/2.0/en/models/retrieving-your-data.html#find
				array(
						'conditions' => array(
								'Position.video_id' => $video_id
									
						)
				)
		);
	
		$positions = $this->sort_Position_by_Point($positions);
	
		//REF http://blogs.bigfish.tv/adam/2008/03/24/sorting-with-setsort-in-cakephp-12/
		//REF referer http://cakephp.1045679.n5.nabble.com/Using-usort-in-Cake-td1327099.html Aug 10, 2009; 11:32pm
		// 		$positions = Set::sort($positions, '{n}.Position.point', 'asc');
	
		$this->set('positions', $positions);
	
// 		debug("done");

		$this->render('/Elements/videos/js/return_AllEntries');
	
	}//sort_PosList()
	
	public function
	sort_Position_by_Point($positions) {
	
		// 		usort($positions, "cmp_Position_by_Point");
	
		//REF http://cakephp.1045679.n5.nabble.com/Using-usort-in-Cake-td1327099.html Aug 11, 2009; 9:18pm
		usort($positions, array(&$this, "cmp_Position_by_Point"));
	
		return $positions;
	
		// 		return usort($positions, array(&$this, "cmp_Position_by_Point"));
	
	}
	
	//REF http://stackoverflow.com/questions/4282413/php-sort-array-of-objects-by-object-fields answered Nov 26 '10 at 3:53
	public function
	cmp_Position_by_Point($pos1, $pos2) {
	
		//REF http://www.php.net/manual/en/function.floatval.php
		$point_1 = floatval($pos1['Position']['point']);
		$point_2 = floatval($pos2['Position']['point']);
	
		//REF http://stackoverflow.com/questions/481466/php-string-to-float answered Jan 26 '09 at 21:35
		// 		$point_1 = (float) $pos1['Position']['point'];
		// 		$point_2 = (float) $pos2['Position']['point'];
	
		return $point_1 > $point_2;
		// 		return $point_1 < $point_2;
	
	}
	
}