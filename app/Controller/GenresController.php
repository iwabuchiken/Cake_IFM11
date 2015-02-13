<?php

class GenresController extends AppController {
	public $helpers = array('Html', 'Form');

	public function index() {
		$this->set('genres', $this->Genre->find('all'));
	}
	
	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid genre'));
		}
	
		$genre = $this->Genre->findById($id);
		if (!$genre) {
			throw new NotFoundException(__('Invalid genre'));
		}
		$this->set('genre', $genre);
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Genre->create();
			
			$this->request->data['Genre']['created_at'] = Utils::get_CurrentTime();
			$this->request->data['Genre']['updated_at'] = Utils::get_CurrentTime();
			
			if ($this->Genre->save($this->request->data)) {
				$this->Session->setFlash(__('Your genres has been saved.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to add your genres.'));
		}
	}

	public function delete($id) {
		/******************************
	
		validate
	
		******************************/
		if (!$id) {
			throw new NotFoundException(__('Invalid genre id'));
		}
	
		$genre = $this->Genre->findById($id);
	
		if (!$genre) {
			throw new NotFoundException(__("Can't find the genre. id = %d", $id));
		}
	
		/******************************
	
		delete
	
		******************************/
		if ($this->Genre->delete($id)) {
			// 		if ($this->Genre->save($this->request->data)) {
	
			$this->Session->setFlash(__(
					"Genre deleted => %s",
					$genre['Genre']['name']));
	
			return $this->redirect(
					array(
							'controller' => 'genres',
							'action' => 'index'
	
					));
	
		} else {
	
			$this->Session->setFlash(
					__("Genre can't be deleted => %s",
							$genre['Genre']['name']));
	
			// 			$page_num = _get_Page_from_Id($id - 1);
	
			return $this->redirect(
					array(
							'controller' => 'genres',
							'action' => 'view',
							$id
					));
	
		}
	
	}//public function delete($id)
	
}