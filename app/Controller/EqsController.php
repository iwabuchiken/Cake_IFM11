<?php

/*
C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\
	=> app diretory
/cake_apps/Cake_IFM11

 */


class EqsController extends AppController {
	
// 	public $scaffold;

	//ref http://stackoverflow.com/questions/4252577/cakephp-session-cant-write answered Nov 23 '10 at 3:56
// 	public $helpers = array('Html', 'Form', 'Session');
	public $helpers = array('Html', 'Form');

	//REF http://book.cakephp.org/2.0/en/core-libraries/components/pagination.html
	public $components = array('Paginator');

	public function index() {

		/**********************************
		* Build: list
		**********************************/
		$eqs = $this->Eq->find('all');
		
		/**********************************
		 * set: images
		**********************************/

	}//public function index()

	public function index_2() {

		/**********************************
		* Build: list
		**********************************/
		$data_EQs = Utils::get_EQs__ALL();
		
		$aryOf_EpicenterNames = Utils::get_ListOf_EpicenterNames();

	}//public function index()

	public function index_2__DEPRECATED() {

		/**********************************
		* Build: list
		**********************************/
		$id_Location = 289;
		
		$url = "https://typhoon.yahoo.co.jp/weather/jp/earthquake/list/?e=$id_Location";

		//ref C:\WORKS_2\WS\Eclipse_Luna\Cake_NR5\app\Controller\Articles2Controller.php
		$html = file_get_html($url);
		
// 		$table_Main = $html->find('table');
		
// 		// each tr
// 		debug("count(\$table_Main) : ".count($table_Main));	//=> 'count($table_Main) : 1'
		
// 		$aryOf_Table_0 = $table_Main[0];
// 		$aryOf_Trs = $aryOf_Table_0->find('tr');
		
// 		debug("count(\$aryOf_Trs : )".count($aryOf_Trs));	//=> 'count($aryOf_Trs : )101'
		
// 		$trs_0 = $aryOf_Trs[0];
		
// 		debug("count(\$trs_0) : ".count($trs_0));	//=> 'count($trs_0) : 1'

// 		debug("count(\$trs_0->td) : ".count($trs_0->td));	//=> 'count($trs_0->td) : 1'
		
// 		$tds = $trs_0->td;
		
// 		debug($tds);	//=> false
		
// 		$tds_0 = $tds[0];
		
// 		debug("count(\$tds_0) : ".count($tds_0));
		
// 		debug($tds_0);	//=> null
		
// 		$trs_0_0 = $trs_0[0];	//=> Cannot use object of type simple_html_dom_node as array
		
// // 		debug("count(\$trs_0_0) : ".count($trs_0_0));	//=> Cannot use object of type simple_html_dom_node as array
		
// 		$trs_0_0__tds = $trs_0_0->td;
		
// 		$trs = ($table_Main[0])->find('tr');	//=> syntax error, unexpected '->' (T_OBJECT_OPERATOR)	
// 		$trs = $table_Main->find('tr');	//=> Call to a member function find() on array	
// 		$trs = $table_Main->tr;
		
		// try
		$aryOf_TRs = $table_Main = $html->find('table tr');
		
		debug("count(\$aryOf_TRs) : ".count($aryOf_TRs));	//=> 'count($aryOf_TRs) : 101'
		
		$tr_0 = $aryOf_TRs[0];
		
		debug("get_class(\$tr_0) : ".get_class($tr_0));
		
// 		debug($tr_0);
		
// 		debug($tr_0->td);
		debug($tr_0->plaintext);
				// '       発生時刻           情報発表時刻           震源地           マグニ
				// チュード           最大震度        '
// 		debug($tr_0);
		
		$tds = $tr_0->find('td');
		debug("get_class(\$tds) : ".get_class($tds[0]));	//=> 'get_class($tds) : simple_html_dom_node'
// 		debug("get_class(\$tds) : ".get_class($tds));
		debug("\$tds[0]->plaintext : ".$tds[0]->plaintext);	//=> '$tds[0]->plaintext :   発生時刻     '

		$tds_0 = $tds[0];
		
		$as = $tds_0->find("a");

		debug("count(\$as) : ".count($as));	//=> 'count($as) : 2'
		
		$as_0 = $as[0];
		
		$href = $as_0->href;
		
		debug($href);	//=> '/weather/jp/earthquake/list/?sort=0&key=1&e=289'
		
		$as_1 = $as[1];
		
		$href = $as_1->href;
		
		debug($href);	//=> '/weather/jp/earthquake/list/?sort=0&key=1&e=289'
		
		/**********************************
		 * set: images
		**********************************/

	}//public function index()

}//class EqsController extends AppController {

