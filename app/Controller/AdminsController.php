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
	
}