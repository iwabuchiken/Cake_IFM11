<?php

/*
C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\
	=> app diretory
/cake_apps/Cake_IFM11

http://localhost/Eclipse_Luna/Cake_IFM11/eqs/index_2
http://benfranklin.chips.jp/cake_apps/Cake_IFM11/eqs/index_2

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
		$numOf_Pages = 1;
		
		$id_Epicenter = 289;
		
		$data_EQs = Utils::get_EQs__NPages($id_Epicenter, $numOf_Pages);
		
// 		debug($data_EQs);
		
// 		$data_EQs = Utils::get_EQs__ALL();
		
// 		$aryOf_EpicenterNames = Utils::get_ListOf_EpicenterNames();

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

	public function 
	_add_epicenter_names__SaveData($aryOf_EpicenterNames) {
		
		$aryOf_Names = array();

		$lenOf_EpicenterNames = count($aryOf_EpicenterNames);

		// filter array
		for ($i = 0; $i < $lenOf_EpicenterNames; $i++) {
		
			$name_Data = $aryOf_EpicenterNames[$i];

			if ($name_Data != null) {
			
				array_push($aryOf_Names, array($i, $name_Data));
				
			}//if ($name_Data != null)
			
		}//for ($i = 0; $i < $lenOf_EpicenterNames; $i++)
		
		//debug
		for ($i = 0; $i < 10; $i++) {
		
			debug("\$aryOf_Names[$i] : ");
			debug($aryOf_Names[$i]);
			// 			array(
			// 					(int) 0 => (int) 189,
			// 					(int) 1 => '根室半島南東沖'
			// 			)
		}//for ($i = 0; $i < 10; $i++)
		
	}//public function _add_epicenter_names__SaveData() {
	
	public function add_epicenter_names() {
		
		/******************** (20 '*'s)
		* params
		********************/
		@$id_Epicenter_Start = $this->request->query['id_start'];
		@$id_Epicenter_End = $this->request->query['id_end'];
		
		@$action = $this->request->query['action'];

		$id_Epicenter_Start_Dflt = 280;
		$id_Epicenter_End_Dflt = 300;

		$lenOf_NamesList = 400;
		
		/******************** (20 '*'s)
		* validate : start
		********************/
		if ($id_Epicenter_Start == '') {
		
			debug("\$id_Epicenter_Start => blank' / set to => $id_Epicenter_Start_Dflt");

			$id_Epicenter_Start = $id_Epicenter_Start_Dflt;
			
		} else {//if ($id_Epicenter_Start == '')
			
			debug("\$id_Epicenter_Start => not blank' : $id_Epicenter_Start");
			
		}
		
		/******************** (20 '*'s)
		* validate : end
		********************/
		if ($id_Epicenter_End == '') {
		
			debug("\$id_Epicenter_End => blank' / set to => $id_Epicenter_End_Dflt");

			$id_Epicenter_End = $id_Epicenter_End_Dflt;
			
		} else {//if ($id_Epicenter_End == '')
			
			debug("\$id_Epicenter_End => not blank' : $id_Epicenter_End");
			
		}//if ($id_Epicenter_End == '') {
		
		//test : time
		$time_Start = microtime(true);
		
		$aryOf_EpicenterNames = Utils::get_ListOf_EpicenterNames__Range(
						$id_Epicenter_Start, 
						$id_Epicenter_End,
						$lenOf_NamesList);
// 		$aryOf_EpicenterNames = Utils::get_ListOf_EpicenterNames();

		//test : time
		$time_End = microtime(true);
		
		//debug
		debug("start = $time_Start / end = $time_End");
		
		debug(
				"exec time : ".($time_End - $time_Start)
				." / "
				
				."per 1 id : ".($time_End - $time_Start) / ($id_Epicenter_End - $id_Epicenter_Start)
				
		);
		
// 		debug(array_slice($aryOf_EpicenterNames, 280, 10));
// 		debug(array_slice($aryOf_EpicenterNames, 0, 10));
		
		/******************** (20 '*'s)
		* set vars
		********************/
		$this->set("aryOf_EpicenterNames", $aryOf_EpicenterNames);
		
		$this->set("lenOf_NamesList", $lenOf_NamesList);

		/******************** (20 '*'s)
		* save data
		********************/
		if ($action != null && $action == 'save') {
		
			$this->_add_epicenter_names__SaveData($aryOf_EpicenterNames);
		
		} else {
		
			debug("action is not 'save' ===> not saving epicenter data");
			
		}//if ($action != null && $action == 'save')
		
		
		
// 		//debug
// 		for ($i = $id_Epicenter_Start; $i < $id_Epicenter_End; $i++) {
		
// 			debug($aryOf_EpicenterNames[$i]);
			
// 		}//for ($i = 0; $i < $id_Epicenter_End; $i++)
		
		
		/**********************************
		 * view
		 **********************************/
// 		$this->render("/Eqs/index_2");
		
		
	}//public function add_epicenter_names() {

	public function _show_epicenters__TEST() {
		
		/******************** (20 '*'s)
		* get : rubis
		********************/
		$txt = "小学校学習指導要領";
		
		$aryOf_WordPair = Utils::get_Rubis($txt);
		
		debug($aryOf_WordPair);
		
// 		$txt = "小学校学習指導要領";
		
// 		//ref https://developer.yahoo.co.jp/webapi/jlp/furigana/v1/furigana.html
// 		$url_Request = "https://jlp.yahooapis.jp/FuriganaService/V1/furigana?appid=dj00aiZpPXlIWUpoTVpGSVFBRiZzPWNvbnN1bWVyc2VjcmV0Jng9N2E-&grade=1&sentence=$txt";
		
// 		//ref https://pulogu.net/blog/020-computer/php/php-xml-data-read-parse-test/
// 		$xml = simplexml_load_file($url_Request);
		
// 		debug($xml);
// 		debug("\$xml->Result");
// 		debug($xml->Result);
// 		debug("\$xml->Result->WordList");
// 		debug($xml->Result->WordList);
// 		debug("Word => " . count($xml->Result->WordList->Word));
		// 		debug("Word => " . count($xml->Word));
		// 		debug($xml->resultset);
		
		// 		var_dump( $xml->resultset );
		// 		var_dump( $xml );
		// 		var_dump( $xml );
		// 		debug(var_dump( $xml ));
		// 		<ResultSet xmlns="urn:yahoo:jp:jlp:FuriganaService" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="urn:yahoo:jp:jlp:FuriganaService https://jlp.yahooapis.jp/FuriganaService/V1/furigana.xsd">
		// 		<Result>
		// 		<WordList>
		// 		<Word>
		// 			<Surface>小学校</Surface>
		// 			<Furigana>しょうがっこう</Furigana>
		// 			<Roman>syougakkou</Roman>
		// 		</Word>
		// 		<Word>
		// 			<Surface>学習指導</Surface>
		// 			<Furigana>がくしゅうしどう</Furigana>
		// 			<Roman>gakusyuusidou</Roman>
		// 		</Word>
		// 		<Word>
		// 			<Surface>要領</Surface>
		// 			<Furigana>ようりょう</Furigana>
		// 			<Roman>youryou</Roman>
		// 		</Word>
		// 		</WordList>
		// 		</Result>
		// 		</ResultSet>
		
	}//public function _show_epicenters__TEST() {
	
	public function show_epicenters() {
		
		/******************** (20 '*'s)
		* test : rubi
		********************/
		$this->_show_epicenters__TEST();
	
	}
	
}//class EqsController extends AppController {

