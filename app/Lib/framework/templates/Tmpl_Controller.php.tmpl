<?php

class VideosController extends AppController {
	public $helpers = array('Html', 'Form', 'Mytest');
// 	public $helpers = array('Html', 'Form');

	public function index() {
// 		$this->set('videos', $this->Video->find('all'));
	
// 		debug(count($this->request->query));
// 		debug($this->request->query);
// 		debug($this->request->query['sort']);
// 		debug(@$this->request->query['order'] ? "yes" : "no");
		
		if (@$this->request->query['sort']) {
// 		if (@$this->request->query['order']) {
		
			$sort = $this->request->query['sort'];
			
// 			debug("yes");
			$option = array(
							'order' => array(
									"Video.$sort" => 'asc')
			);
			
		} else {
		
			$option = array(
					'order' => array(
							"Video.id" => 'asc')
			);
		
		}
		
		$this->set('videos', $this->Video->find('all',
						$option
// 						array(
// 							'order' => array(
// 									'Video.id' => 'asc')
// 						)
		
	
		));
		
// 		debug(Utils::get_dPath_Log());
		
		Utils::write_Log(
					Utils::get_dPath_Log(), 
					"Videos#index", 
					__FILE__, __LINE__);
		
	}
	
	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid video'));
		}
	
		$video = $this->Video->findById($id);
		if (!$video) {
			throw new NotFoundException(__('Invalid video'));
		}
		
		$this->set('video', $video);
		
		/******************************
		
			positions
		
		******************************/
		$this->loadModel('Position');
			
		$positions = $this->Position->find('all',
							//REF conditions http://book.cakephp.org/2.0/en/models/retrieving-your-data.html#find
							array(
								'conditions' => array(
													'Position.video_id' => $id
			
												)
// 								,
// 								'order' => array('Position.point ASC')
							)
		);
		
		
		$positions = $this->sort_Position_by_Point($positions);
// 		$res = $this->sort_Position_by_Point($positions);

// 		debug($positions);
		
// 		if ($res == true) {
		
// 			debug("sort done");
			
// 		} else {
		
// 			debug("sort not done");
		
// 		}

		//REF http://blogs.bigfish.tv/adam/2008/03/24/sorting-with-setsort-in-cakephp-12/
		//REF referer http://cakephp.1045679.n5.nabble.com/Using-usort-in-Cake-td1327099.html Aug 10, 2009; 11:32pm
// 		$positions = Set::sort($positions, '{n}.Position.point', 'asc');
		
		$this->set('positions', $positions);
		
		/******************************
		
			test: SimpleXMLElement
		
		******************************/
		$this->_test_SimpleXMLElement();
// 		$this->_test_DOMXML();

		
	}
	
	public function _test_DOMXML() {
		
		$text = "台湾・台北（Taipei）にある日本の対台湾窓口機関、交流協会台北事務所前で7日、台湾労働党や中台統一派団体のメンバーら数十人が、安倍政権の集団的自衛権行使の容認など平和憲法に反する動きに対し抗議活動を行った";
		// 		$text = "南スーダンの国連平和維持活動（ＰＫＯ）に派遣された陸上自衛隊第５次派遣施設隊長";
		$params = "sentence=$text";
		
		$url = "http://chasen.org/~taku/software/mecapi/mecapi.cgi";
		
		$html = file_get_contents("$url?$params");

		$xmlDoc = new DOMDocument();
		
		$xmlDoc->loadXML($html);
// 		$xmlDoc->loadHTML($html);
		
		$xmlDom = $xmlDoc->documentElement;
		
		$this->set('xmlDom', $xmlDom);
		
	}
	
	public function _test_SimpleXMLElement() {

		$text = "台湾・台北（Taipei）にある日本の対台湾窓口機関、交流協会台北事務所前で7日、台湾労働党や中台統一派団体のメンバーら数十人が、安倍政権の集団的自衛権行使の容認など平和憲法に反する動きに対し抗議活動を行った";
		// 		$text = "南スーダンの国連平和維持活動（ＰＫＯ）に派遣された陸上自衛隊第５次派遣施設隊長";
		$params = "sentence=$text";
		
		$url = "http://chasen.org/~taku/software/mecapi/mecapi.cgi";
		
		$html = file_get_contents("$url?$params");
		
		$xml = simplexml_load_string($html);
		
		$this->set('xml', $xml);
		
	}

	public function add() {
		if ($this->request->is('post')) {
			
			$this->Video->create();
			
			$this->request->data['Video']['created_at'] =
						Utils::get_CurrentTime2(CONS::$timeLabelTypes["rails"]);
			
			$this->request->data['Video']['updated_at'] =
						Utils::get_CurrentTime2(CONS::$timeLabelTypes["rails"]);
			
			if ($this->Video->save($this->request->data)) {
				
				$this->Session->setFlash(__('Your video has been saved.'));
				return $this->redirect(array('action' => 'index'));
				
			}
			$this->Session->setFlash(__('Unable to add your video.'));
		} else {
			
			$this->loadModel('Genre');
			
			$genres = $this->Genre->find('all');
			
			$select_Genres = array();
			
			foreach ($genres as $genre) {
					
				$genre_Name = $genre['Genre']['name'];
				$genre_Id = $genre['Genre']['id'];
					
				$select_Genres[$genre_Id] = $genre_Name;
					
			}
				
			asort($select_Genres);
			
			$this->set('genre_names', $select_Genres);
				
		}
	}

	public function delete($id) {
		/******************************
	
		validate
	
		******************************/
		if (!$id) {
			throw new NotFoundException(__('Invalid video id'));
		}
	
		$video = $this->Video->findById($id);
	
		if (!$video) {
			throw new NotFoundException(__("Can't find the video. id = %d", $id));
		}
	
		/******************************
	
		delete
	
		******************************/
		if ($this->Video->delete($id)) {
			// 		if ($this->Video->save($this->request->data)) {
				
			$this->Session->setFlash(__("Video deleted => %s", $video['Video']['title']));
				
			return $this->redirect(
					array(
							'controller' => 'videos',
							'action' => 'index'
							
					));
				
		} else {
				
			$this->Session->setFlash(
					__("Video can't be deleted => %s", $video['Video']['title']));
				
			// 			$page_num = _get_Page_from_Id($id - 1);
				
			return $this->redirect(
					array(
							'controller' => 'videos',
							'action' => 'view',
							$id
					));
				
		}
	
	}//public function delete($id)
	
	public function retrieve_CurrentTime() {
		
		$this->layout = 'plain';
		
		$cur_Time = 500;
		
		$this->set('cur_Time', $cur_Time);
		
		//REF http://book.cakephp.org/2.0/en/controllers.html "This allows direct rendering of elements"
		$this->render('/Elements/videos/js/retrieve_CurrentTime');
		
// 		return $this->redirect(array('action' => 'index'));
		
	}

	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid text'));
		}
	
		/****************************************
			* Video
		****************************************/
		$video = $this->Video->findById($id);
		if (!$video) {
			throw new NotFoundException(__('Invalid video'));
		}
	
		if (count($this->params->data) != 0) {
				
			$this->Video->id = $id;
				
			$this->params->data['Video']['updated_at'] =
						Utils::get_CurrentTime2(CONS::$timeLabelTypes["rails"]);
				
			if ($this->Video->save($this->request->data)) {
	
				$this->Session->setFlash(__('Your video has been updated.'));
				return $this->redirect(
						array(
								'action' => 'view',
								$id));
	
			}//if ($this->Text->save($this->request->data))
				
			$this->Session->setFlash(__('Unable to update your video.'));
				
		}
	
		if (!$this->request->data) {
			$this->request->data = $video;;
		}
	
	}//public function edit($id = null)
	
	public function 
	save_CurrentTime() {
		
		$this->layout = 'plain';
		
// 		$result = $this->request->data['curTime'];
// 		$result = $this->request->data;
// 		$result = $this->request;
// 		$result = $this->request->query;
		$result = $this->request->query['curTime'];
		$video_id = $this->request->query['video_id'];
		
		/******************************
		
			save position
		
		******************************/
		$res = $this->save_Position($result, $video_id);
		
		$this->sort_PosList();
		
// 		if ($res == true) {
		
// // 			$result = "Saved: ".$result;
// // 			$arr = array ('saved'=> true,'point'=> $result, 'video_id' => $video_id);
// 			$arr = "<tr>"
// 					."<td>".Utils::conv_Float_to_TimeLabel($result)."</td>"
// 					."<td></td>"
// 					;
			
// 		} else {
		
// // 			$result = "Not saved: ".$result;
// // 			$arr = array ('saved'=> false,'point'=> $result, 'video_id' => $video_id);
// 			$arr = "Can't save position";
		
// 		}

// 		/******************************
		
// 			report
		
// 		******************************/
// 		$result = $result."/".$video_id;
		
// // 		debug($result);
		
// 		// set to return response=error
// // 		$arr = array ('response'=>'error','comment'=>'test comment here');
		
// 		$this->set('arr', $arr);
// // 		$this->set('result', $result);
		
// 		$this->render('/Elements/videos/js/return_SingleEntry');
// // 		$this->render('/Elements/videos/js/retrieve_CurrentTime');
		
		
	}//save_CurrentTime()
	
	public function 
	delete_Ajax() {
		
		$this->layout = 'plain';
		
		$position_id = $this->request->query['id'];
		
		/******************************
		
			delete position
		
		******************************/
// 		$res = true;
		
		$res = $this->_delete_Position($position_id);
		
		if ($res == true) {
		
			$this->sort_PosList();
// 			$this->render('/Elements/videos/js/delete_position_failed');
			
		} else {
		
// 			delete_position_failed.ctp
			$this->render('/Elements/videos/js/delete_position_failed');
		
		}
		;
		
	}//save_CurrentTime()

	public function 
	save_Position($result, $video_id) {
		
		$this->loadModel('Position');
		
		$this->Position->create();
		
		$this->Position->set('video_id', $video_id);
		$this->Position->set('point', $result);
		
		$this->Position->set('created_at', Utils::get_CurrentTime());
		$this->Position->set('updated_at', Utils::get_CurrentTime());
		
		if ($this->Position->save()) {
			
			return true;
			
		} else {
			
			return false;
		}
		
	}
	
	public function 
	_delete_Position($position_id) {
		
		$this->loadModel('Position');

// 		$position = $this->Position->find('all',
// 						//REF conditions http://book.cakephp.org/2.0/en/models/retrieving-your-data.html#find
// 						array(
// 								'conditions' => array(
// 										'Position.id' => $position_id
											
// 								)
// 						)
// 					);
		
		if ($this->Position->delete($position_id)) {
			
			return true;
			
		} else {
			
			return false;
		}
		
	}

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

	public function
	sort_PosList() {
		/******************************
		
			layout
		
		******************************/
		$this->layout = 'plain';
		
		/******************************
		
			get: parameter
		
		******************************/
		$id = $this->request->query['video_id'];
		
		/******************************
		
		positions
		
		******************************/
		$this->loadModel('Position');
			
		$positions = $this->Position->find('all',
			//REF conditions http://book.cakephp.org/2.0/en/models/retrieving-your-data.html#find
			array(
				'conditions' => array(
						'Position.video_id' => $id
							
				)
			)
		);
		
		$positions = $this->sort_Position_by_Point($positions);
		
		//REF http://blogs.bigfish.tv/adam/2008/03/24/sorting-with-setsort-in-cakephp-12/
		//REF referer http://cakephp.1045679.n5.nabble.com/Using-usort-in-Cake-td1327099.html Aug 10, 2009; 11:32pm
		// 		$positions = Set::sort($positions, '{n}.Position.point', 'asc');
		
		$this->set('positions', $positions);		

		$this->render('/Elements/videos/js/return_AllEntries');
		
	}//sort_PosList()

}