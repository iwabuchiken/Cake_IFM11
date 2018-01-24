<?php

/*
C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\
	=> app diretory
/cake_apps/Cake_IFM11

 * 
 * 
 */


class ProjectsController extends AppController {
	
	//ref http://stackoverflow.com/questions/4252577/cakephp-session-cant-write answered Nov 23 '10 at 3:56
	public $helpers = array('Html', 'Form');

	//REF http://book.cakephp.org/2.0/en/core-libraries/components/pagination.html
	public $components = array('Paginator');

	### layout
// 	$this->layout = 'layout_projects';
	
	public function index() {

		
	}//public function index()

	public function python_commands() {

		$this->layout = 'projects_plain';
		
		$this->render("/Projects/index/python_commands");
		
	}//public function index()

	
}



