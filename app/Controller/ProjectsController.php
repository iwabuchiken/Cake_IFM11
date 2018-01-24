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

	public function _python_commands__Numbering() {
		
		/******************** (20 '*'s)
		*
		* processing
		*
		********************/
		$result = exec('cd');
// 		$result = exec('dir');
		
		debug("result => '" . $result . "'");
		
		
		$message = "numbering ---> done" . $result;
// 		$message = "numbering ---> done";
		
		return $message;
		
	}
	
	public function test_1_Proc_Open() {
		
		#ref https://2a17-blog.phpnuke.org/en/c387937/php-proc-open-example
		$descr = array(
				
				#ref https://www.sitepoint.com/proc-open-communicate-with-the-outside-world/
				0 => array('pipe', 'r'), // 0 is STDIN for process
				
				// 			0 => array(
						// 					'test.py'
						// 			)
		);
		
		$pipes = array();
		
		$cmd = "php C:\\WORKS_2\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\webroot\\test2.php";
		
		debug("cmd => '$cmd'");
// 		$cmd = "python test.py";
		
		$process = proc_open($cmd, $descr, $pipes);
		
		proc_close($process);
		
		debug("proc --> done");
	}
	
	public function pc_numbering_EXECUTE() {

		/******************** (20 '*'s)
		*
		* processing
		*
		********************/
		/******************** (20 '*'s)
		*
		* get : query vals
		*
		********************/
		@$query_Dpath = $this->request->query['dpath'];
		@$query_Fname = $this->request->query['fname'];
		
		debug("query_Dpath => '" . $query_Dpath . "'");
		debug("query_Fname => '" . $query_Fname . "'");

		/******************** (20 '*'s)
		*
		* build : exec string
		*
		********************/
		$exec_Str = 
				"pushd "
				."C:\\WORKS_2\\WS\\WS_Others\\free\\VX7GLZ_science-research\\31_Materials\\1_"
				." && python 1_1.3.py numbering > tmp.log "
				."&& python C:\\WORKS_2\\WS\\WS_Others\\free\\fx\\82_\\libs\\cp_log.py "
				."-ladd-numbering-through";
		
		debug($exec_Str);
				
		### executte
		$res = exec("echo hi");
		$res = exec("cd");
		
// 		$res = exec("dir");
// 		exec("dir", $res);
// 		$res = exec("dir c:\\works_2");
// 		$res = exec("pushd c:\\works_2 && dir");
// 		$res = exec($exec_Str);
		
// 		debug("res => '");
// 		debug($res);
		
// 		$res = exec("pushd .. && cd");
// 		debug("res => '");
// 		debug($res);
		
		$res = exec("cd");
		debug("cd => '");
		debug($res);
		
// 		$res = exec("python C:\\WORKS_2\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\webroot\\test.py");
// 		debug("res => '");
// 		debug($res);
		
// 		$res = system("python C:\\WORKS_2\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\webroot\\test.py");
// 		pushd C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\webroot
		$cmd = "pushd .. && python test.py";
		debug("cmd => $cmd");
		
		$res = system($cmd);
		debug("res =>");
		debug($res);
		
		$res = `python test.py`;
// 		$res = `pushd .. && python test.py`;
		
		debug("res =>");
		debug($res);
		
		#test
		$this->test_1_Proc_Open();
		
		/******************** (20 '*'s)
		*
		* rendering
		*
		********************/
		$this->layout = 'projects_plain';

		$this->render("/Projects/index/python_commands");

	}//public function pc_numbering_EXECUTE() {
	
	public function pc_numbering() {
		
		/******************** (20 '*'s)
		*
		* set vars
		*
		********************/
		$dflt_Dpath = "C:\\WORKS_2\\WS\\FM_2_20171104_225946\\Materials_Science";
		
		$dflt_Fname = "Materials_Science.mm";
		
		$dflt_ExecFile = "1_1.3.py";
		
		$this->set("dflt_Dpath", $dflt_Dpath);
		$this->set("dflt_Fname", $dflt_Fname);
		$this->set("dflt_ExecFile", $dflt_ExecFile);
		
	}//public function pc_numbering() {
	
	public function python_commands() {
	
		/******************** (20 '*'s)
		*
		* processing
		*
		********************/
		/******************** (20 '*'s)
		*
		* dispatch
		*
		********************/
		$message = "";
		
		if (true) {
		
			$message = $this->_python_commands__Numbering();
// 			$message = "numbering";
		
		} else {
		
			
			
		}//if (true)
		
		/******************** (20 '*'s)
		*
		* set vars
		*
		********************/
		$this->set("message", $message);
		
		/******************** (20 '*'s)
		*
		* rendering
		*
		********************/
// 		$this->layout = 'projects_plain';
		
// 		$this->render("/Projects/index/python_commands");
		
	}//public function python_commands()

	
}



