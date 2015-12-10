<?php

class AdminsController extends AppController {
	public $helpers = array('Html', 'Form');

	public function index() {
		
		$admins = $this->Admin->find('all');
		
// 		debug("admins => ".count($admins));

// 		debug($admins);
		
		$this->set('admins', $admins);
// 		$this->set('admins', $this->Admin->find('all'));
		
	}
	
	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid admin'));
		}
	
		debug("id => $id");
		
		$admin = $this->Admin->findById($id);
		
		if (!$admin) {
			throw new NotFoundException(__('Invalid admin'));
		}
		$this->set('admin', $admin);
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Admin->create();
			
			$this->request->data['Admin']['created_at'] = Utils::get_CurrentTime();
			$this->request->data['Admin']['updated_at'] = Utils::get_CurrentTime();
			
			if ($this->Admin->save($this->request->data)) {
				$this->Session->setFlash(__('Your admins has been saved.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to add your admins.'));
		}
	}

	public function delete($id) {
		/******************************
	
		validate
	
		******************************/
		if (!$id) {
			throw new NotFoundException(__('Invalid admin id'));
		}
	
		$admin = $this->Admin->findById($id);
	
		if (!$admin) {
			throw new NotFoundException(__("Can't find the admin. id = %d", $id));
		}
	
		/******************************
	
		delete
	
		******************************/
		if ($this->Admin->delete($id)) {
			// 		if ($this->Admin->save($this->request->data)) {
	
			$this->Session->setFlash(__(
					"Admin deleted => %d",
					$admin['Admin']['id']));
	
			return $this->redirect(
					array(
							'controller' => 'admins',
							'action' => 'index'
	
					));
	
		} else {
	
			$this->Session->setFlash(
					__("Admin can't be deleted => %d",
							$admin['Admin']['id']));
	
			// 			$page_num = _get_Page_from_Id($id - 1);
	
			return $this->redirect(
					array(
							'controller' => 'admins',
							'action' => 'view',
							$id
					));
	
		}
	
	}//public function delete($id)

	public function 
	edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid text'));
		}
	
		/****************************************
			* Admin
		****************************************/
		$admin = $this->Admin->findById($id);
		if (!$admin) {
			throw new NotFoundException(__('Invalid admin'));
		}
	
// 		debug($this->request);
// 		debug($this->request->is(array('admin', 'put')));
// 		debug($this->request->is('post'));
	
		// 		if ($this->request->is(array('admin', 'put'))) {
			
		/**********************************
		* save
		**********************************/
		if ($this->request->is(array('post', 'put'))) {
// 		if ($this->request->is('post')) {
			
			$this->Admin->id = $id;
			
			$this->request->data['Admin']['updated_at'] = Utils::get_CurrentTime();
			
			if ($this->Admin->save($this->request->data)) {
		
				$this->Session->setFlash(__('Your admin has been updated.'));
				return $this->redirect(
						array(
								'action' => 'view',
								$id));
		
			}//if ($this->Admin->save($this->request->data))
				
			$this->Session->setFlash(__('Unable to update your admin.'));
			
		}
			
		if (!$this->request->data) {
			$this->request->data = $admin;;
		}
	
	}//edit

	public function
	stats() {

		/*******************************
			prep
		*******************************/
		$keywords = array(
			
				"RES"	=> array(
			
								"count" => 0,
								"percent" => 0,
						
							),
				"E2"	=> array(
			
								"count" => 0,
								"percent" => 0,
						
							),
				":m"	=> array(
			
								"count" => 0,
								"percent" => 0,
						
							),
				
		);
		
		$keywords_3 = array(
							array(
									
								"word"	=> "RES",
								"count" => 0,
								"percent" => 0,
						
							),
				
							array(
								"word"	=> "E2",
								"count" => 0,
								"percent" => 0,
						
							),
				
							array(
								"word"	=> ":m",
								"count" => 0,
								"percent" => 0,
						
							),
				
		);
		
		/*******************************
			get tokens
		*******************************/
		$string = @$this->request->query['keywords'];
		
		if ($string == null || $string == '') {
			
			$string = "RES,E2,:m";
			
		}//$string == null || $string == ''
// 		$string = "RES,E2,:m";
		
		$tokens = explode(",", $string);
// 		$tokens = explode($string, ",");
		
		debug($tokens);
		
		$keywords_3 = array();
		
		foreach ($tokens as $token) {
		
			array_push($keywords_3, 
						array(
								"word"		=> $token, 
								"count"		=> 0,
								"percent"	=> 0,
						)
			);
			
		}//foreach ($tokens as $token)
		
		
		
// 		$keywords_3 = array(
// 							array(
									
// 								"word"	=> "RES",
// 								"count" => 0,
// 								"percent" => 0,
						
// 							),
				
// 							array(
// 								"word"	=> "E2",
// 								"count" => 0,
// 								"percent" => 0,
						
// 							),
				
// 							array(
// 								"word"	=> ":m",
// 								"count" => 0,
// 								"percent" => 0,
						
// 							),
				
// 		);
		
		$keywords_2 = array();
		
// 		$keywords = array(
			
// 				"RES"	=> 0,
// 				"E2"	=> 0,
// 				":m"	=> 0
				
// 		);
		
		$keys = array();
		
		foreach ($keywords_3 as $keyword) {
		
			array_push($keys, $keyword['word']);
			
		}//foreach ($keywords_3 as $keyword)
		
		
// 		$keys = array_keys($keywords);
		
		/*******************************
			images
		*******************************/
		$model = ClassRegistry::init('Image');
		
		$listOf_Images = $model->find('all');
		
		debug("\$listOf_Images => ".count($listOf_Images));
		
// 		debug($listOf_Images[0]);
		
		/*******************************
			count
		*******************************/
		foreach ($listOf_Images as $image) {
		
			// get memo
			$memo = $image['Image']['memos'];
			
			// foreach: keywords
			$number = count($keywords_3);
			
			for ($i = 0; $i < $number; $i++) {
			
				$keyword = $keywords_3[$i];
				
				$word = $keyword['word'];

				if (strpos($memo, $word) !== false) {
// 				if (strpos($memo, $word)) {
	
					$keywords_3[$i]['count'] += 1;
// 					$keyword['count'] += 1;
	
				}//strpos($memo, $word)
				
				
			}//for ($i = 0; $i < $number; $i++)
			
// 			foreach ($keywords_3 as $keyword) {
				
// 				$word = $keyword['word'];
				
// 				if (strpos($memo, $word)) {
					
// 					$keyword['count'] += 1;
					
// 				}//strpos($memo, $word)
				
// 			}
			
// 			foreach ($keys as $k) {
			
// 				if (strpos($memo, $k) !== false) {
					
// 					$keywords_3[$k]['count'] += 1;
// // 					$keywords[$k]['count'] += 1;
// // 					$keywords[$k] += 1;
					
// 				}//strpos($memo, $k) !== false;
				
// 			}//foreach ($keys as $k)
			
		}//foreach ($listOf_Images as $image)
		
		/*******************************
			sum up
		*******************************/
		$total = 0;

		foreach ($keywords_3 as $keyword) {
		
			$total += $keyword['count'];
// 			$total += $keywords[$k]['count'];
// 			$total += $keywords[$k];
			
		}//foreach ($keys as $k)
			
// 		debug("\$total => ".$total);
		
// 		foreach ($keys as $k) {
		
// 			$total += $keywords[$k]['count'];
// // 			$total += $keywords[$k];
			
// 		}//foreach ($keys as $k)
		
		/*******************************
			report
		*******************************/
// 		debug($keywords);
		
		debug("\$total => ".$total);
		
		/*******************************
			add: percentage
		*******************************/
		$numOf_Images = count($listOf_Images);
		
		for ($i = 0; $i < $number; $i++) {
		
// 			$keyword = $keywords_3[$i];
			
			$keywords_3[$i]['percent'] = 
								round(
									(float)$keywords_3[$i]['count'] / $numOf_Images, 
// 									(float)$keywords_3[$i]['count'] / $total, 
									3);
			
		}//for ($i = 0; $i < $number; $i++)
		
// 		foreach ($keywords as $k) {
			
// 			$k['percent'] = round((float)$k['count'] / $total, 3);
// // 			$k['percent'] = (float)$k['count'] / $total;
// // 			$k['percent'] = floatval($k['count']) / $total;
// // 			$k['percent'] = $k['count'] / $total;
			
// // 			debug($k);
			
// 			array_push($keywords_2, $k);
			
// 		}
		
		// report
// 		debug($keywords);
		
// 		debug(1/3);
		
// 		debug($keywords_3);
// 		debug($keywords_2);
		
		/*******************************
			set values
		*******************************/
		$this->set("keywords", $keywords_3);
		
	}//stats()
	
}