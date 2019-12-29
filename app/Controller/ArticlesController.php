<?php

/*
C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\
	=> app diretory
/cake_apps/Cake_IFM11

 * 
 * 
 */


// class ImagesController extends AppController {
class ArticlesController extends AppController {

	
// 	public $scaffold;

	//ref http://stackoverflow.com/questions/4252577/cakephp-session-cant-write answered Nov 23 '10 at 3:56
// 	public $helpers = array('Html', 'Form', 'Session');
	public $helpers = array('Html', 'Form');
// 	public $helpers = array('Html', 'Form');

	//REF http://book.cakephp.org/2.0/en/core-libraries/components/pagination.html
// 	public $components = array('Paginator', 'Session');
	public $components = array('Paginator');

// 	public function index_2() {
	public function index() {

		/******************
		 * step : 1
		 * 		prep
		 ****************/
		// 		// list of results
// 		$lo_Articles = [];
		
		// default vals
		$dflt_Query_Article_Genre = "national";
		
		/******************
		 * step : 1.2
		 * 		prep : url params
		 ****************/
		/******************
		 * step : 1.1 : 1
		 * 		get : param
		 ****************/
		@$query_Article_Genre = $this->request->query['query_Article_Genre'];
		
		/******************
		 * step : 1.1 : 2
		 * 		default
		 ****************/
		if ($query_Article_Genre == null ) {
		
			debug("\$query_Article_Genre ==> null");
			
			$query_Article_Genre = $dflt_Query_Article_Genre;
			
		}//if ($query_Article_Genre == null )
			
		else if ($query_Article_Genre == "" ) {
		
			debug("\$query_Article_Genre ==> blank");
			
			$query_Article_Genre = $dflt_Query_Article_Genre;
			
		}//if ($query_Article_Genre == null )
		
		else {
		
			debug("\$query_Article_Genre ==> '$query_Article_Genre'");
			
			$query_Article_Genre = $query_Article_Genre;
			
		}//if ($query_Article_Genre == null )
		
		/******************
		 * step : 1.1 : 3
		 		validate
		 ****************/
		$res_b = in_array($query_Article_Genre, CONS::$aryOf_Genre_Names);
		
		if ($res_b == true) {
		
			debug("genre name ==> valid : '$query_Article_Genre'");
		
		} else {
		
			debug("genre name ==> NOT valid : '$query_Article_Genre'");
			debug("genre name ==> set default : '$dflt_Query_Article_Genre'");
			
			// default
			$query_Article_Genre = $dflt_Query_Article_Genre;
			
		}//if ($res_b == true)
		
		//debug
		debug("\$query_Article_Genre => " . $query_Article_Genre);
		
		/******************
		 * step : 1.2
		 * 		prep : url
		 ****************/
		//$strOf_Article_Type = "business";
		//$strOf_Article_Type = "international";
// 		$strOf_Article_Type = "national";
		$strOf_Article_Type = $query_Article_Genre;
		
		//ref search https://duckduckgo.com/?q=php+parse+html&t=opera&ia=web
		//ref http://htmlparsing.com/php.html
		$url = "http://www.asahi.com/$strOf_Article_Type/list/?iref=com_inttop_all_list";
		// 		$url = "http://www.asahi.com/international/list/?iref=com_inttop_all_list";
		
		
		/******************
		 * step : 2
		 * 		html ==> load
		 ****************/
		//ref https://simplehtmldom.sourceforge.io
		$html = file_get_html($url);
		
// 		debug(get_class($html));
				//'simple_html_dom'

		/******************
		 * step : 3
		 * 		html ==> parse
		 ****************/
		/******************
		 * step : 3 : 1
		 * 		collect : a tags
		 ****************/
		//ref Error: syntax error, unexpected '->'
		$lo_As_href = $html->find('a[href]');
		$lo_As = $html->find('a');
		
// 		debug("count(lo_As) => ".count($lo_As));
// 		debug("count(lo_As_href) => ".count($lo_As_href));
		
// 		debug("\$lo_As[0] => " . $lo_As[0]);
// 		debug("(\$lo_As[0])->plaintext => " . ($lo_As[0])->plaintext);	//=> Error: syntax error, unexpected '->'
// 		debug("\$lo_As[0]->plaintext => " . $lo_As[0]->plaintext);

		/******************
		 * step : 3 : 2
		 * 		a tags ==> filter : "
		 ****************/
		$cntOf_Href_Articles = 0;
		
		$cntOf_Debug_Loop = 0;
		
		$cntOf_As_Href = count($lo_As_href);
		
		$maxOf_Debug_Loop = $cntOf_As_Href;
// 		$maxOf_Debug_Loop = 100;
// 		$maxOf_Debug_Loop = 50;
// 		$maxOf_Debug_Loop = 5;
		
		$lenOf_As_Href = count($lo_As_href);

		// list of results
// 		$lo_Articles = [];
// 		$lo_Articles = $this->get_ListOf_Articles(
		$lo_Articles = get_ListOf_Articles(
				
				$cntOf_Href_Articles
				, $cntOf_Debug_Loop
				, $cntOf_As_Href
				, $maxOf_Debug_Loop
				, $lenOf_As_Href
				
				, $lo_As_href
				
				);
		
		//debug
		debug("count(\$lo_Articles) => " . count($lo_Articles));
	
// 		debug("\$lo_Articles[0] ==> ");
// 		debug($lo_Articles[0]);
		
		/******************
		 * step : 4
			lo_Articles ==> categorize
		 ****************/
		/******************
		 * step : 4 : 1
			prep : genre name
		 ****************/
		$strOf_Genre_Name = $query_Article_Genre;
		
		//_20191220_141744:next
		//_20191222_142941:caller
		
		$lo_Article_Groups = categorize_Articles($lo_Articles, $strOf_Genre_Name);
// 		$lo_Article_Groups = categorize_Articles($lo_Articles);
		
// 		$lo_Articles_Jp = [
				
// 				["yes", "and"]
// 		];
		
// 		$lo_Articles_Others = [
				
// 				["others", "link"]
// 		];
		
// 		$lo_Article_Groups = [
				
// 				["main", $lo_Articles]
// 				, ["Jp", $lo_Articles_Jp]
// 				, ["Others", $lo_Articles_Others]
				
// 		];
// 		$lo_Article_Groups = [$lo_Articles];
		
		/******************
		 * step : 5
			set ==> vars
		 ****************/
		/******************
		 * step : 5 : 1
			pairs
		 ****************/
		$lo_Variable_Pair_For_View = [
				["lo_Article_Groups", $lo_Article_Groups]
				
				, ["query_Article_Genre", $query_Article_Genre]
				
		];
		
		/******************
		 * step : 5 : 2
			set
		 ****************/
// 		foreach ($lo_Variable_Pair_For_View as $name => $variable) {
		foreach ($lo_Variable_Pair_For_View as list($name, $variable)) {
		
			$this->set($name, $variable);
			
		}//foreach ($lo_Variable_Pair_For_View as $name, $variable)
		
		
// 		$this->set("lo_Article_Groups", $lo_Article_Groups);
		
	}//public function index()
	
}//class ArticlesController extends AppController {


/*****************************************
 * get_ListOf_Articles($haystack, $needle)
 * 
 * at	: 2019/12/20 13:39:48
 * 
 * ref	: 
 * 
 *****************************************/
function get_ListOf_Articles(
		
		$cntOf_Href_Articles
		, $cntOf_Debug_Loop
		, $cntOf_As_Href
		, $maxOf_Debug_Loop
		, $lenOf_As_Href
		
		, $lo_As_href
		
		) {
//_20191220_134005:caller
//_20191220_134012:head
//_20191220_134016:wl

	$lo_Articles = [];	
	
	for ($i = 0; $i < $lenOf_As_Href; $i++) {
		/******************
		 * step : 3 : 2.1
		 * 		get : a tag
		 ****************/
		$a_tag = $lo_As_href[$i];
			
		// 			debug($a_tag->href);
			
		//debug
		$cntOf_Debug_Loop += 1;
			
		// 			if ($cntOf_Debug_Loop > $maxOf_Debug_Loop) {
		if ($cntOf_Debug_Loop > $cntOf_As_Href - 1) {
				
			break;
	
		}//if ($cntOf_Debug_Loop > $maxOf_Debug_Loop)
		;
		/******************
		 * step : 3 : 2.2
		 * 		href ==> starts with "/articles"
		 ****************/
		$valOf_Href = $a_tag->href;
			
// 		debug("\$valOf_Href ==> '" . $valOf_Href . "'");
			
		//ref https://stackoverflow.com/questions/2790899/how-to-check-if-a-string-starts-with-a-specified-string#2790919
		$strOf_Start_Chars = "/articles";
			
		$lenOf_Str_Start_Chars = count($strOf_Start_Chars);
			
		$cond_1 = startsWith($valOf_Href, $strOf_Start_Chars);
			
// 		debug("\$cond_1 = $cond_1 (href = '$valOf_Href' / chars = '$strOf_Start_Chars')");
// 		// 			$cond_1 = (substr( $valOf_Href, 0, $lenOf_Str_Start_Chars ) === $strOf_Start_Chars);
			
		if ($cond_1 == true) {
				
// 			debug("hit => '" . $a_tag->href . "'");
	
			//debug(($a_tag->href)->plaintext);	//=> Error: syntax error, unexpected '->'
			// 				debug($a_tag->href->plaintext);	//=> Notice (8): Trying to get property of non-object
			// 				debug($a_tag->href);
			// 				debug($a_tag->plaintext);
	
			/******************
			 * step : 3 : 2.3
			 * 		articles ==> to list
			****************/
			$strOf_URL_Domain_Name = "https://www.asahi.com";
			// push
			$aryOf_Hre_Data = [$a_tag->plaintext, $strOf_URL_Domain_Name . $a_tag->href];
	
			array_push($lo_Articles, $aryOf_Hre_Data);
	
// 			//debug
// 			debug("pushed ==> ");
// 			debug($aryOf_Hre_Data);
			// 			array(
			// 					(int) 0 => '殿をクビに…日本にない発想？　大統領「弾劾」を調べた(12/20)  ',
			// 					(int) 1 => 'https://www.asahi.com/articles/ASMDM52LHMDMUHBI028.html'
			// 			)
	
		}//if ($cond_1 == true)
		;
			
	}//for ($i = 0; $i < $lenOf_As_Href; $i++)	

	
	// return
	return $lo_Articles;
	
}//function get_ListOf_Articles() {


/*****************************************
 * startsWith($haystack, $needle)
 * 
 * at	: 2019/12/20 13:24:30
 * 
 * ref	: https://stackoverflow.com/questions/834303/startswith-and-endswith-functions-in-php
 * 
 *****************************************/
function startsWith($haystack, $needle) {
	return substr_compare($haystack, $needle, 0, strlen($needle)) === 0;
}

/*****************************************
 * endsWith($haystack, $needle)
 * 
 * at	: 2019/12/20 13:24:30
 * 
 * ref	: https://stackoverflow.com/questions/834303/startswith-and-endswith-functions-in-php
 * 
 *****************************************/
function endsWith($haystack, $needle) {
	return substr_compare($haystack, $needle, -strlen($needle)) === 0;
}

/*****************************************
 * get_Article_Group
 *
 * at	: 2019/12/24 11:51:48
 *
 * ref	:
 *
 *****************************************/
// function get_Article_Group($lo_Articles, $lo_Articles_Others) {
function get_Article_Group(
// 		$lo_Articles
// 		, $lo_Articles_Others
		$lo_Articles_Others
		, $lo_KWs_Intl_1
		, $labelOf_Article_Groups_Intl_1
		) {
//_20191224_115157:caller
//_20191224_115203:head
//_20191224_115207:wl

	/******************
	 * step : 0
	 	prep : vars
	 ****************/
	$lo_Articles_Others__new = [];
	
	/******************
	 * step : 2
	 build : keyword list
	 ****************/
	//_20191222_152658:next
// 	$lo_KWs_Intl_1 = [
// 			"日韓"
// 			, "北朝鮮"
// 			, "朝鮮"
// 			, "韓国"
// 	];
	
	$lo_Article_Groups_Intl_1 = [];
	
// 	$labelOf_Article_Groups_Intl_1 = "Korea";
	
	// judge
// 	$lenOf_LO_Articles = count($lo_Articles);
	$lenOf_LO_Articles = count($lo_Articles_Others);
	
	// 	foreach ($lo_Articles as $article) {
	for ($i = 0; $i < $lenOf_LO_Articles; $i++) {
	
		// get : instance
		$article = $lo_Articles_Others[$i];
// 		$article = $lo_Articles[$i];
	
		$line = $article[0];
		
// 		debug("\$lo_KWs_Intl_1 =>");
// 		debug($lo_KWs_Intl_1);
		
		foreach ($lo_KWs_Intl_1 as $kw) {
	
			$judge = has_String($line, $kw);
				
			if ($judge == true) {
					
				// append
				array_push($lo_Article_Groups_Intl_1, $article);
	
				// 				// remove from the main list
				// 				$lo_Articles_COPY = array_diff($lo_Articles_COPY, [$article]);
				// // 				$lo_Articles_COPY = array_diff($lo_Articles_COPY, $article);
	
				// next
				break;
				// 				continue;
	
			}//if ($judge == true)
			;
				
		}//foreach ($lo_KWs_Intl_1 as $kw)
	
	
	
	}//foreach ($lo_Articles as $article)
	
	// remove from the main list
	/******************
	 * step : X
	 build list : Others
	 ****************/
	/******************
	 * step : X : 1
	 prep : vars
	 ****************/
	// L3
	// 	$lo_Articles_Others = [];
	
	// L1'
	$lo_Article_Groups_Intl_1__Lines = [];
	foreach ($lo_Article_Groups_Intl_1 as $article) {
	
		array_push($lo_Article_Groups_Intl_1__Lines, $article[0]);
	
	}//foreach ($lo_Article_Groups_Intl_1 as $article)
	
// 	// L2'
// 	$lo_Articles__Lines = [];
	
// 	foreach ($lo_Articles as $article) {
	
// 		array_push($lo_Articles__Lines, $article[0]);
	
// 	}//foreach ($lo_Article_Groups_Intl_1 as $article)
	
	// lines in the orig ?
// 	foreach ($lo_Articles as $article) {
	foreach ($lo_Articles_Others as $article) {
	
		$line = $article[0];
	
		// in array ?
		if (! in_array($line, $lo_Article_Groups_Intl_1__Lines)) {
	
// 			array_push($lo_Articles_Others, $article);
			array_push($lo_Articles_Others__new, $article);
				
		}//if (! in_array($line, $lo_Article_Groups_Intl_1__Lines))
		;
	
	}//foreach ($lo_Articles as $article)
	
// 	debug("count(\$lo_Articles_Others) =>");
// 	debug(count($lo_Articles_Others));

	/******************
	 * step : X2
	 * 	return
	 ****************/
	$valOf_Ret = [$labelOf_Article_Groups_Intl_1, $lo_Article_Groups_Intl_1, $lo_Articles_Others__new];
// 	$valOf_Ret = [$labelOf_Article_Groups_Intl_1, $lo_Article_Groups_Intl_1, $lo_Articles_Others];
// 	$valOf_Ret = [$labelOf_Article_Groups_Intl_1, $lo_Article_Groups_Intl_1];
	
	// return
	return $valOf_Ret;
	
}//function get_Article_Group() {

/*****************************************
 * categorize_Articles__Intl($lo_Articles)
 * 
 * at	: 2019/12/25 14:01:03
 * 
 * ref	: 
 * 
 *****************************************/
function categorize_Articles__Business($lo_Articles) {
//_20191225_140154:caller
//_20191225_140200:head
//_20191225_140203:wl

	/******************
	 * step : 0 : 0.1
	 	prep : vars
	 ****************/
	$lo_Article_Groups = [];
	
	$lo_Articles_Others = $lo_Articles;
// 	$lo_Articles_Others = [];
	
	/******************
	 * step : 0 : 1
	 	DUP : array
	 ****************/
	//ref http://tobysoft.net/wiki/index.php?PHP%2F%C7%DB%CE%F3%28array%29%A4%F2%A5%B3%A5%D4%A1%BC%28%CA%A3%C0%BD%29%A4%B9%A4%EB%CA%FD%CB%A1%A4%CB%A4%C4%A4%A4%A4%C6
	$lo_Articles_COPY = $lo_Articles;
	
	/******************
	 * step : 1
	 	load : keyword file
	 ****************/
// 	$lo_LO_KWs = array(
// // 			$lo_KWs_Intl_1 = [
// 			array(
// 					"日韓"
// 					, "北朝鮮"
// 					, "朝鮮"
// 					, "韓国"
// 			)
// 	);
	$lo_LO_KWs = [				// , ""
// 			$lo_KWs_Intl_1 = [
			["日韓"
					, "北朝鮮"
					, "朝鮮"
					, "韓国"]
		, ["中国", "香港", "北京", "習氏", "上海", "天安門"]
		, ["シリア", "イラン", "サウジ", "アフガン", "パレスチナ"]
		, ["ベネチア", "仏軍", "ギリシャ", "ソ連", "ノートルダム", "ベルリン"]
		, ["日本"]
		, ["いすゞ", "日産", "トヨタ"]
		, ["労働", "就職", "雇用", "就労"]
		, ["市場", "株式市場", "ＮＹ株"]
		, ["かんぽ"]
		, ["ボーイング"]
		, ["コンビニ"]
	];
	
	$lo_LabelsOf_Article_Group = [
			"Korea"
			, "China"
			, "islam world"
			, "europe"
			, "japan"
			, "automotive"
			, "labor"
			, "market"
			, "financial"
			, "transport"
			, "retail"
			
	];
	
	
	// length
	$lenOf_LO_LO_KWs = count($lo_LO_KWs);

	/******************
	 * step : 2
	 	build : keyword list
	 ****************/
	for ($i = 0; $i < $lenOf_LO_LO_KWs; $i++) {
		/******************
		 * step : 2 : 1.1
		 	unpack : kw list
		 ****************/	
		$lo_KWs = $lo_LO_KWs[$i];
		/******************
		 * step : 2 : 1.2
		 	unpack : group label
		 ****************/	
		$labelOf_Group = $lo_LabelsOf_Article_Group[$i];
		
		/******************
		 * step : 2 : 1.2
		 	get : group
		 ****************/	
		//_20191224_115157:caller
		$valOf_Ret = get_Article_Group(
		// 			$lo_Articles, $lo_Articles_Others
// 				$lo_Articles
// 				, $lo_Articles_Others
				$lo_Articles_Others
				, $lo_KWs
				, $labelOf_Group
		);
		
		$labelOf_Article_Groups_Intl_1 =	$valOf_Ret[0];
		$lo_Article_Groups_Intl_1 =			$valOf_Ret[1];
		$lo_Articles_Others =				$valOf_Ret[2];
		
		// push
		array_push($lo_Article_Groups, [$labelOf_Article_Groups_Intl_1, $lo_Article_Groups_Intl_1]);		
		
	}//for ($i = 0; $i < $lenOf_LO_LO_KWs; $i++)
	
	
// 	$lo_KWs_Intl_1 = [
// 				"日韓"
// 				, "北朝鮮"
// 				, "朝鮮"
// 				, "韓国"
// 			];	
	
// 	$labelOf_Article_Groups_Intl_1 = "Korea";
	
// 	//_20191224_115157:caller
// 	$valOf_Ret = get_Article_Group(
// // 			$lo_Articles, $lo_Articles_Others
// 			$lo_Articles
// 			, $lo_Articles_Others
// 			, $lo_KWs_Intl_1
// 			, $labelOf_Article_Groups_Intl_1
// 			);
	
// 	$labelOf_Article_Groups_Intl_1 =	$valOf_Ret[0];
// 	$lo_Article_Groups_Intl_1 =			$valOf_Ret[1];
// 	$lo_Articles_Others =				$valOf_Ret[2];
	
// 	// push
// 	array_push($lo_Article_Groups, [$labelOf_Article_Groups_Intl_1, $lo_Article_Groups_Intl_1]);
	
// 	/******************
// 	 * step : 2
// 	 	build : keyword list
// 	 ****************/
// 	//_20191222_152658:next
// 	$lo_KWs_Intl_1 = [
// 				"日韓"
// 				, "北朝鮮"
// 				, "朝鮮"
// 				, "韓国"
// 			];
	
// 	$lo_Article_Groups_Intl_1 = [];
	
// 	$labelOf_Article_Groups_Intl_1 = "Korea";
	
// 	// judge
// 	$lenOf_LO_Articles = count($lo_Articles);
	
// // 	foreach ($lo_Articles as $article) {
// 	for ($i = 0; $i < $lenOf_LO_Articles; $i++) {
		
// 		// get : instance
// 		$article = $lo_Articles[$i];
	
// 		$line = $article[0];
		
// 		foreach ($lo_KWs_Intl_1 as $kw) {
		
// 			$judge = has_String($line, $kw);
			
// 			if ($judge == true) {
			
// 				// append
// 				array_push($lo_Article_Groups_Intl_1, $article);
				
// // 				// remove from the main list
// // 				$lo_Articles_COPY = array_diff($lo_Articles_COPY, [$article]);
// // // 				$lo_Articles_COPY = array_diff($lo_Articles_COPY, $article);
				
// 				// next
// 				break;
// // 				continue;
				
// 			}//if ($judge == true)
// 			;
			
// 		}//foreach ($lo_KWs_Intl_1 as $kw)
		
		
		
// 	}//foreach ($lo_Articles as $article)
	
// 	// remove from the main list
// 	/******************
// 	 * step : X
// 		build list : Others
// 	 ****************/
// 	/******************
// 	 * step : X : 1
// 		prep : vars
// 	 ****************/
// 	// L3
// // 	$lo_Articles_Others = [];
	
// 	// L1'
// 	$lo_Article_Groups_Intl_1__Lines = [];
// 	foreach ($lo_Article_Groups_Intl_1 as $article) {
	
// 		array_push($lo_Article_Groups_Intl_1__Lines, $article[0]);
		
// 	}//foreach ($lo_Article_Groups_Intl_1 as $article)
	
// 	// L2'
// 	$lo_Articles__Lines = [];
// 	foreach ($lo_Articles as $article) {
	
// 		array_push($lo_Articles__Lines, $article[0]);
		
// 	}//foreach ($lo_Article_Groups_Intl_1 as $article)
	
// 	// lines in the orig ?
// 	foreach ($lo_Articles as $article) {
	
// 		$line = $article[0];
		
// 		// in array ?
// 		if (! in_array($line, $lo_Article_Groups_Intl_1__Lines)) {
		
// 			array_push($lo_Articles_Others, $article);
			
// 		}//if (! in_array($line, $lo_Article_Groups_Intl_1__Lines))
// 		;
		
// 	}//foreach ($lo_Articles as $article)
	
// 	debug("count(\$lo_Articles_Others) =>");
// 	debug(count($lo_Articles_Others));
	
	
// 	debug("\$lo_Article_Groups_Intl_1 =>");
// 	debug($lo_Article_Groups_Intl_1);
	
// 	debug("array_slice(\$lo_Articles_COPY, 0, 5) =>");
// 	debug(array_slice($lo_Articles_COPY, 0, 5));
	
// 	$lo_Articles_COPY = array_diff($lo_Articles, $lo_Article_Groups_Intl_1);
	
// 	$lo_KW_Intl_1 = [
			
// 			"South&North Korea",
// 			[
// 				"日韓"
// 				, "北朝鮮"
// 				, "朝鮮"
// 			]
			
// 	];
	
	
	
	$lo_Articles_Jp = [

			["yes", "and"]
	];

// 	$lo_Articles_Others = $lo_Articles_COPY;
// 	$lo_Articles_Others = $lo_Articles;
// 	$lo_Articles_Others = [

// 			[$lo_Articles]
// // 			["others", $lo_Articles]
// // 			["others", "link"]
// 	];


	/******************
	 * step : X2
		build list : $lo_Article_Groups
	 ****************/
// 	[$labelOf_Article_Groups_Intl_1, $lo_Article_Groups_Intl_1] = ;
// 	array_push($lo_Article_Groups, [$labelOf_Article_Groups_Intl_1, $lo_Article_Groups_Intl_1]);
	array_push($lo_Article_Groups, ["Jp", $lo_Articles_Jp]);
	array_push($lo_Article_Groups, ["Others", $lo_Articles_Others]);
	
	// 	$lo_Article_Groups = [
	
// // 			["main", $lo_Articles]
// 			[$labelOf_Article_Groups_Intl_1, $lo_Article_Groups_Intl_1]
// 			, ["Jp", $lo_Articles_Jp]
// 			, ["others", $lo_Articles_Others]
// // 			, $lo_Articles_Others
// // 			, ["Others", $lo_Articles_Others]
	
// 	];
	
	return $lo_Article_Groups;
	
}//function categorize_Articles__Intl($lo_Articles) {

/*****************************************
 * categorize_Articles__Politics($lo_Articles)
 * 
 * at	: 2019/12/26 12:15:53
 * 
 * ref	: 
 * 
 *****************************************/
function categorize_Articles__Politics($lo_Articles) {
//_20191226_121559:caller
//_20191226_121600:head
//_20191226_121601:wl

	/******************
	 * step : 0 : 0.1
	 	prep : vars
	 ****************/
	$lo_Article_Groups = [];
	
	$lo_Articles_Others = $lo_Articles;
	
	/******************
	 * step : 0 : 1
	 	DUP : array
	 ****************/
	//ref http://tobysoft.net/wiki/index.php?PHP%2F%C7%DB%CE%F3%28array%29%A4%F2%A5%B3%A5%D4%A1%BC%28%CA%A3%C0%BD%29%A4%B9%A4%EB%CA%FD%CB%A1%A4%CB%A4%C4%A4%A4%A4%C6
	$lo_Articles_COPY = $lo_Articles;
	
	/******************
	 * step : 1
	 	load : keyword file
	 ****************/
	$lo_LO_KWs = [				// , ""
			["日韓", "北朝鮮", "朝鮮", "韓国"]
		, ["中国", "香港", "北京", "習氏", "上海", "天安門"]
		, ["日本", "日中韓"]
		, ["労災"]
// 		, ["議員", "知事", "村長", "市長", "首相"]		// politics
		, ["知事", "村長", "市長", "首相", "内閣", "次官", "政権", "外務省"]		// government
		, ["議員", "立憲", "議長"]							// legislative
		, ["裁判", "地裁", "判決", "地検", "汚職"]
		, ["がん", "診療"]
		, ["火災"]
		, ["沖縄", "辺野古", "普天間"]
		, ["米軍", "外交", "領土"]		// intl
		, ["オスプレイ", "ＩＲ"]		// issues
	];
	
	$lo_LabelsOf_Article_Group = [
			"Korea"
			, "China"
			, "japan"
			, "labor"
// 			, "politics"
			, "government"
			, "legislative"
			, "legal"
			, "health"
			, "incidents"
			, "okinawa"
			, "intl"
			, "issues"
			
	];
	
	
	// length
	$lenOf_LO_LO_KWs = count($lo_LO_KWs);

	/******************
	 * step : 2
	 	build : keyword list
	 ****************/
	for ($i = 0; $i < $lenOf_LO_LO_KWs; $i++) {
		/******************
		 * step : 2 : 1.1
		 	unpack : kw list
		 ****************/	
		$lo_KWs = $lo_LO_KWs[$i];
		/******************
		 * step : 2 : 1.2
		 	unpack : group label
		 ****************/	
		$labelOf_Group = $lo_LabelsOf_Article_Group[$i];
		
		/******************
		 * step : 2 : 1.2
		 	get : group
		 ****************/	
		//_20191224_115157:caller
		$valOf_Ret = get_Article_Group(
// 				, $lo_Articles_Others
				$lo_Articles_Others
				, $lo_KWs
				, $labelOf_Group
		);
		
		$labelOf_Article_Groups_Intl_1 =	$valOf_Ret[0];
		$lo_Article_Groups_Intl_1 =			$valOf_Ret[1];
		$lo_Articles_Others =				$valOf_Ret[2];
		
		// push
		array_push($lo_Article_Groups, [$labelOf_Article_Groups_Intl_1, $lo_Article_Groups_Intl_1]);		
		
	}//for ($i = 0; $i < $lenOf_LO_LO_KWs; $i++)
	
	$lo_Articles_Jp = [

			["yes", "and"]
	];

	/******************
	 * step : X2
		build list : $lo_Article_Groups
	 ****************/
	array_push($lo_Article_Groups, ["Jp", $lo_Articles_Jp]);
	array_push($lo_Article_Groups, ["Others", $lo_Articles_Others]);
	
	return $lo_Article_Groups;
	
}//function categorize_Articles__Politics($lo_Articles) {


/*****************************************
 * categorize_Articles__National($lo_Articles)
 * 
 * at	: 2019/12/26 12:00:09
 * 
 * ref	: 
 * 
 *****************************************/
function categorize_Articles__National($lo_Articles) {
//_20191226_120108:caller
//_20191226_120105:head
//_20191226_120108:wl

	/******************
	 * step : 0 : 0.1
	 	prep : vars
	 ****************/
	$lo_Article_Groups = [];
	
	$lo_Articles_Others = $lo_Articles;
	
	/******************
	 * step : 0 : 1
	 	DUP : array
	 ****************/
	//ref http://tobysoft.net/wiki/index.php?PHP%2F%C7%DB%CE%F3%28array%29%A4%F2%A5%B3%A5%D4%A1%BC%28%CA%A3%C0%BD%29%A4%B9%A4%EB%CA%FD%CB%A1%A4%CB%A4%C4%A4%A4%A4%C6
	$lo_Articles_COPY = $lo_Articles;
	
	/******************
	 * step : 1
	 	load : keyword file
	 ****************/
	$lo_LO_KWs = [				// , ""
			["日韓", "北朝鮮", "朝鮮", "韓国"]
		, ["中国", "香港", "北京", "習氏", "上海", "天安門"]
		, ["日本"]
		, ["労災"]
		, ["議員", "知事", "村長", "市長"]
		, ["裁判", "地裁", "判決", "地検", "汚職"]
		, ["がん", "診療"]
		, ["火災"]
	];
	
	$lo_LabelsOf_Article_Group = [
			"Korea"
			, "China"
			, "japan"
			, "labor"
			, "politics"
			, "legal"
			, "health"
			, "incidents"
			
	];
	
	
	// length
	$lenOf_LO_LO_KWs = count($lo_LO_KWs);

	/******************
	 * step : 2
	 	build : keyword list
	 ****************/
	for ($i = 0; $i < $lenOf_LO_LO_KWs; $i++) {
		/******************
		 * step : 2 : 1.1
		 	unpack : kw list
		 ****************/	
		$lo_KWs = $lo_LO_KWs[$i];
		/******************
		 * step : 2 : 1.2
		 	unpack : group label
		 ****************/	
		$labelOf_Group = $lo_LabelsOf_Article_Group[$i];
		
		/******************
		 * step : 2 : 1.2
		 	get : group
		 ****************/	
		//_20191224_115157:caller
		$valOf_Ret = get_Article_Group(
// 				, $lo_Articles_Others
				$lo_Articles_Others
				, $lo_KWs
				, $labelOf_Group
		);
		
		$labelOf_Article_Groups_Intl_1 =	$valOf_Ret[0];
		$lo_Article_Groups_Intl_1 =			$valOf_Ret[1];
		$lo_Articles_Others =				$valOf_Ret[2];
		
		// push
		array_push($lo_Article_Groups, [$labelOf_Article_Groups_Intl_1, $lo_Article_Groups_Intl_1]);		
		
	}//for ($i = 0; $i < $lenOf_LO_LO_KWs; $i++)
	
	$lo_Articles_Jp = [

			["yes", "and"]
	];

	/******************
	 * step : X2
		build list : $lo_Article_Groups
	 ****************/
	array_push($lo_Article_Groups, ["Jp", $lo_Articles_Jp]);
	array_push($lo_Article_Groups, ["Others", $lo_Articles_Others]);
	
	return $lo_Article_Groups;
	
}//categorize_Articles__National

/*****************************************
 * categorize_Articles__Intl($lo_Articles)
 *
 * at	: 2019/12/25 14:01:03
 *
 * ref	:
 *
 *****************************************/
function categorize_Articles__Intl__Prep_KWs($strOf_Genre_Name) {
//_20191227_163004:caller
//_20191227_163006:head
//_20191227_163007:wl

	/******************
	 * step : 1
	 	dispatch
	 ****************/
// 	if (true) {
	if ($strOf_Genre_Name == CONS::$strOf_Genre_Name__Intl) {
		/******************
		 * step : 1 : 1
		 	intl
		 ****************/
		/******************
		 * step : 1 : 1.1
		 	load external fle
		 ****************/
		//_20191227_164606:tmp
		//ref https://stackoverflow.com/questions/1091107/how-to-join-filesystem-path-strings-in-php
		$fpath_External_File = join("\\", 
					[CONS::$dpath_Articles_Keywords_External_Files, 
						CONS::$fname_Articles_Keywords_External_Files]);
		
		debug("\$fpath_External_File => $fpath_External_File");
		
		$lo_Lines_Raw = file($fpath_External_File);
		
// 		debug("\$lo_Lines_Raw =>");
// 		debug($lo_Lines_Raw);
		
		$lo_Lines_Filtered = [];
		
		foreach ($lo_Lines_Raw as $line) {
			
			// condition
			$cond_1 = startsWith($line, "#");
			$cond_2 = ($line == null);
			$cond_3 = ($line == "");
			$cond_4 = ($line == "\r");
			$cond_5 = ($line == "\r\n");
			
// 						&& (! $line == "");
// 			$cond_1 = (! startsWith($line, "#"))
// 						&& (! $line == null);
// // 						&& (! $line == "");
			
			if ($cond_1) {
				
// 				debug("line starts with '#' ('$line')"); continue;
// 				array_push($lo_Lines_Filtered, $line);
				
			}//if (! startsWith($line, "#"))
				
			if ($cond_2) {
				
// 				debug("line is null ('$line')"); continue;
				
			}//if (! startsWith($line, "#"))
			
			if ($cond_3) { //debug("line is blank ('$line')");
					 continue; }//if (! startsWith($line, "#"))
				
			if ($cond_4) { //debug("line is \\r ('$line')"); 
					continue; }//if (! startsWith($line, "#"))
				
			if ($cond_5) { //debug("line is \\r\\n ('$line')"); 
					continue; }//if (! startsWith($line, "#"))
			
// 			debug("line is '$line' (len = " . count($line));
			
			// push
			array_push($lo_Lines_Filtered, $line);
			
		}//foreach ($lo_Lines_Raw as $line)
		
// 		debug("\$lo_Lines_Filtered =>");
// 		debug($lo_Lines_Filtered);

		/******************
		 * step : 
		 	keyword list ==> init
		 ****************/
		$lo_LO_KWs = [				// , ""
				// 			$lo_KWs_Intl_1 = [
// 				["日韓"
// 						, "北朝鮮"
// 						, "朝鮮"
// 						, "韓国"]
// 				, ["中国", "香港", "北京", "習氏", "上海", "天安門"]
				["中国", "香港", "北京", "習氏", "上海", "天安門"]
				, ["シリア", "イラン", "サウジ", "アフガン", "パレスチナ"]
				, ["ベネチア", "仏軍", "ギリシャ", "ソ連", "ノートルダム", "ベルリン"]
				, ["日本"]
		];
		
		// set : labels line
		foreach ($lo_Lines_Filtered as $line) {
			
			/******************
			 * step : 
			 		tokenize
			 ****************/
			// tokenize
			$tokens = explode(CONS::$strOf_Keyword_Line_Delimiter, $line);
			
			/******************
			 * step : 
			 		labels
			 ****************/
			// lo_LabelsOf_Article_Group__Intl
			if ($tokens[0] == CONS::$strOf_LO_LabelsOf_Article_Group__Intl) {
			
				$lo_LabelsOf_Article_Group = explode(" ", $tokens[1]);
				
			}//if ($tokens[0] == CONS::$strOf_LO_LabelsOf_Article_Group__Intl)
			;
			
			/******************
			 * step : X
			 		keywords
			 ****************/
			if (startsWith($tokens[0], CONS::$strOf_KW)) {
					
// 				$tokens_kw_line = explode("", $tokens[0]);
// // 				$tokens_kw_line = explode(" ", $tokens[0]);
			
// 				debug("\$tokens_kw_line[0] => " . $tokens_kw_line[0]);
				
				/******************
				 * step : X : 1
				 		prep : label, keywords
				 ****************/
				$str_tmp = $tokens[0];
// 				$str_tmp = rtrim($tokens[0], "\r\n");
				
				$strOf_Label = explode("_", $str_tmp)[2];
// 				$strOf_Label = explode("_", $tokens[0])[2];
// 				$strOf_Label = explode("_", $tokens_kw_line[0])[2];
				
				$str_tmp = rtrim($tokens[1], "\r\n");
				
				$lo_KW = explode(" ", $str_tmp);
// 				$lo_KW = explode(" ", $tokens[1]);
				
// 				debug("\$tokens =>");
// 				debug($tokens);
				
// 				debug("\$line => '$line'");
				
// 				debug("\$tokens[0] => '" . $tokens[0] . "'");
// 				debug("\$tokens[1] => '" . $tokens[1] . "'");
				
				debug("\$strOf_Label => " . $strOf_Label);
				debug("\$lo_KW =>");
				debug($lo_KW);

				/******************
				 * step : X : 2
				 		label, keywords ==> append
				 ****************/
				array_push($lo_LabelsOf_Article_Group, $strOf_Label);
				
				array_push($lo_LO_KWs, $lo_KW);
				
			}//if ($tokens[0] == CONS::$strOf_LO_LabelsOf_Article_Group__Intl)
					
			//_20191227_171440:next
			
		}//foreach ($lo_Lines_Filtered as $line)
		
		debug("for-each ==> done : \$lo_LabelsOf_Article_Group =>");
		debug($lo_LabelsOf_Article_Group);
		
// 		$lo_LO_KWs = [				// , ""
// 		// 			$lo_KWs_Intl_1 = [
// 				["日韓"
// 						, "北朝鮮"
// 						, "朝鮮"
// 						, "韓国"]
// 				, ["中国", "香港", "北京", "習氏", "上海", "天安門"]
// 				, ["シリア", "イラン", "サウジ", "アフガン", "パレスチナ"]
// 				, ["ベネチア", "仏軍", "ギリシャ", "ソ連", "ノートルダム", "ベルリン"]
// 				, ["日本"]
// 		];
		
// 		$lo_LabelsOf_Article_Group = [
// 				"Korea"
// 				, "China"
// 				, "islam world"
// 				, "europe"
// 				, "japan"
			
// 		];
		
	}//if (true)
	else {
		/******************
		 * step : X : 1
		 		unknown
		 ****************/
		debug("unknown genre name ('$strOf_Genre_Name'). using default ");
		
		$lo_LO_KWs = [				// , ""
				// 			$lo_KWs_Intl_1 = [
				["日韓"
						, "北朝鮮"
						, "朝鮮"
						, "韓国"]
				, ["中国", "香港", "北京", "習氏", "上海", "天安門"]
				, ["シリア", "イラン", "サウジ", "アフガン", "パレスチナ"]
				, ["ベネチア", "仏軍", "ギリシャ", "ソ連", "ノートルダム", "ベルリン"]
				, ["日本"]
		];
		
		$lo_LabelsOf_Article_Group = [
				"Korea"
				, "China"
				, "islam world"
				, "europe"
				, "japan"
		
		];
		
		
		
	}

	/******************
	 * step : 2
	 		return
	 ****************/
	/******************
	 * step : 2.1
	 		build : return val
	 ****************/
	$valOf_Ret = [$lo_LO_KWs, $lo_LabelsOf_Article_Group];
	
	/******************
	 * step : 2.2
	 		return
	 ****************/
	return $valOf_Ret;
	
}//function categorize_Articles__Intl__Prep_KWs($lo_Articles) {

/*****************************************
 * categorize_Articles__Intl($lo_Articles)
 * 
 * at	: 2019/12/25 14:01:03
 * 
 * ref	: 
 * 
 *****************************************/
function categorize_Articles__Intl($lo_Articles) {
//_20191225_134134:caller
//_20191225_134139:head
//_20191225_134144:wl

	/******************
	 * step : 0 : 0.1
	 	prep : vars
	 ****************/
	$lo_Article_Groups = [];
	
	$lo_Articles_Others = $lo_Articles;
// 	$lo_Articles_Others = [];
	
	/******************
	 * step : 0 : 1
	 	DUP : array
	 ****************/
	//ref http://tobysoft.net/wiki/index.php?PHP%2F%C7%DB%CE%F3%28array%29%A4%F2%A5%B3%A5%D4%A1%BC%28%CA%A3%C0%BD%29%A4%B9%A4%EB%CA%FD%CB%A1%A4%CB%A4%C4%A4%A4%A4%C6
	$lo_Articles_COPY = $lo_Articles;
	
	/******************
	 * step : 1
	 	load : keyword file
	 ****************/
	/******************
	 * step : 1.1
	 	receive : keyword list
	 ****************/
	$strOf_Genre_Name = CONS::$strOf_Genre_Name__Intl;
	
	//_20191227_163004:caller
// 	$valOf_Ret = [$lo_LO_KWs, $lo_LabelsOf_Article_Group];
	$valOf_Ret__Received = categorize_Articles__Intl__Prep_KWs($strOf_Genre_Name);
	
	/******************
	 * step : 1.2
	 	unpack : returned value
	 ****************/
	$lo_LO_KWs =					$valOf_Ret__Received[0];
	$lo_LabelsOf_Article_Group =	$valOf_Ret__Received[1];
	
// 	$lo_LO_KWs = array(
// // 			$lo_KWs_Intl_1 = [
// 			array(
// 					"日韓"
// 					, "北朝鮮"
// 					, "朝鮮"
// 					, "韓国"
// 			)
// 	);

	//_20191226_123516:next
	
// 	$lo_LO_KWs = [				// , ""
// // 			$lo_KWs_Intl_1 = [
// 			["日韓"
// 					, "北朝鮮"
// 					, "朝鮮"
// 					, "韓国"]
// 		, ["中国", "香港", "北京", "習氏", "上海", "天安門"]
// 		, ["シリア", "イラン", "サウジ", "アフガン", "パレスチナ"]
// 		, ["ベネチア", "仏軍", "ギリシャ", "ソ連", "ノートルダム", "ベルリン"]
// 		, ["日本"]
// 	];
	
// 	$lo_LabelsOf_Article_Group = [
// 			"Korea"
// 			, "China"
// 			, "islam world"
// 			, "europe"
// 			, "japan"
			
// 	];
	
	
	// length
	$lenOf_LO_LO_KWs = count($lo_LO_KWs);

	/******************
	 * step : 2
	 	build : keyword list
	 ****************/
	for ($i = 0; $i < $lenOf_LO_LO_KWs; $i++) {
		/******************
		 * step : 2 : 1.1
		 	unpack : kw list
		 ****************/	
		$lo_KWs = $lo_LO_KWs[$i];
		/******************
		 * step : 2 : 1.2
		 	unpack : group label
		 ****************/	
		$labelOf_Group = $lo_LabelsOf_Article_Group[$i];
		
		/******************
		 * step : 2 : 1.2
		 	get : group
		 ****************/	
		//_20191224_115157:caller
		$valOf_Ret = get_Article_Group(
		// 			$lo_Articles, $lo_Articles_Others
// 				$lo_Articles
// 				, $lo_Articles_Others
				$lo_Articles_Others
				, $lo_KWs
				, $labelOf_Group
		);
		
		$labelOf_Article_Groups_Intl_1 =	$valOf_Ret[0];
		$lo_Article_Groups_Intl_1 =			$valOf_Ret[1];
		$lo_Articles_Others =				$valOf_Ret[2];
		
		// push
		array_push($lo_Article_Groups, [$labelOf_Article_Groups_Intl_1, $lo_Article_Groups_Intl_1]);		
		
	}//for ($i = 0; $i < $lenOf_LO_LO_KWs; $i++)
	
	
// 	$lo_KWs_Intl_1 = [
// 				"日韓"
// 				, "北朝鮮"
// 				, "朝鮮"
// 				, "韓国"
// 			];	
	
// 	$labelOf_Article_Groups_Intl_1 = "Korea";
	
// 	//_20191224_115157:caller
// 	$valOf_Ret = get_Article_Group(
// // 			$lo_Articles, $lo_Articles_Others
// 			$lo_Articles
// 			, $lo_Articles_Others
// 			, $lo_KWs_Intl_1
// 			, $labelOf_Article_Groups_Intl_1
// 			);
	
// 	$labelOf_Article_Groups_Intl_1 =	$valOf_Ret[0];
// 	$lo_Article_Groups_Intl_1 =			$valOf_Ret[1];
// 	$lo_Articles_Others =				$valOf_Ret[2];
	
// 	// push
// 	array_push($lo_Article_Groups, [$labelOf_Article_Groups_Intl_1, $lo_Article_Groups_Intl_1]);
	
// 	/******************
// 	 * step : 2
// 	 	build : keyword list
// 	 ****************/
// 	//_20191222_152658:next
// 	$lo_KWs_Intl_1 = [
// 				"日韓"
// 				, "北朝鮮"
// 				, "朝鮮"
// 				, "韓国"
// 			];
	
// 	$lo_Article_Groups_Intl_1 = [];
	
// 	$labelOf_Article_Groups_Intl_1 = "Korea";
	
// 	// judge
// 	$lenOf_LO_Articles = count($lo_Articles);
	
// // 	foreach ($lo_Articles as $article) {
// 	for ($i = 0; $i < $lenOf_LO_Articles; $i++) {
		
// 		// get : instance
// 		$article = $lo_Articles[$i];
	
// 		$line = $article[0];
		
// 		foreach ($lo_KWs_Intl_1 as $kw) {
		
// 			$judge = has_String($line, $kw);
			
// 			if ($judge == true) {
			
// 				// append
// 				array_push($lo_Article_Groups_Intl_1, $article);
				
// // 				// remove from the main list
// // 				$lo_Articles_COPY = array_diff($lo_Articles_COPY, [$article]);
// // // 				$lo_Articles_COPY = array_diff($lo_Articles_COPY, $article);
				
// 				// next
// 				break;
// // 				continue;
				
// 			}//if ($judge == true)
// 			;
			
// 		}//foreach ($lo_KWs_Intl_1 as $kw)
		
		
		
// 	}//foreach ($lo_Articles as $article)
	
// 	// remove from the main list
// 	/******************
// 	 * step : X
// 		build list : Others
// 	 ****************/
// 	/******************
// 	 * step : X : 1
// 		prep : vars
// 	 ****************/
// 	// L3
// // 	$lo_Articles_Others = [];
	
// 	// L1'
// 	$lo_Article_Groups_Intl_1__Lines = [];
// 	foreach ($lo_Article_Groups_Intl_1 as $article) {
	
// 		array_push($lo_Article_Groups_Intl_1__Lines, $article[0]);
		
// 	}//foreach ($lo_Article_Groups_Intl_1 as $article)
	
// 	// L2'
// 	$lo_Articles__Lines = [];
// 	foreach ($lo_Articles as $article) {
	
// 		array_push($lo_Articles__Lines, $article[0]);
		
// 	}//foreach ($lo_Article_Groups_Intl_1 as $article)
	
// 	// lines in the orig ?
// 	foreach ($lo_Articles as $article) {
	
// 		$line = $article[0];
		
// 		// in array ?
// 		if (! in_array($line, $lo_Article_Groups_Intl_1__Lines)) {
		
// 			array_push($lo_Articles_Others, $article);
			
// 		}//if (! in_array($line, $lo_Article_Groups_Intl_1__Lines))
// 		;
		
// 	}//foreach ($lo_Articles as $article)
	
// 	debug("count(\$lo_Articles_Others) =>");
// 	debug(count($lo_Articles_Others));
	
	
// 	debug("\$lo_Article_Groups_Intl_1 =>");
// 	debug($lo_Article_Groups_Intl_1);
	
// 	debug("array_slice(\$lo_Articles_COPY, 0, 5) =>");
// 	debug(array_slice($lo_Articles_COPY, 0, 5));
	
// 	$lo_Articles_COPY = array_diff($lo_Articles, $lo_Article_Groups_Intl_1);
	
// 	$lo_KW_Intl_1 = [
			
// 			"South&North Korea",
// 			[
// 				"日韓"
// 				, "北朝鮮"
// 				, "朝鮮"
// 			]
			
// 	];
	
	
	
	$lo_Articles_Jp = [

			["yes", "and"]
	];

// 	$lo_Articles_Others = $lo_Articles_COPY;
// 	$lo_Articles_Others = $lo_Articles;
// 	$lo_Articles_Others = [

// 			[$lo_Articles]
// // 			["others", $lo_Articles]
// // 			["others", "link"]
// 	];


	/******************
	 * step : X2
		build list : $lo_Article_Groups
	 ****************/
// 	[$labelOf_Article_Groups_Intl_1, $lo_Article_Groups_Intl_1] = ;
// 	array_push($lo_Article_Groups, [$labelOf_Article_Groups_Intl_1, $lo_Article_Groups_Intl_1]);
	array_push($lo_Article_Groups, ["Jp", $lo_Articles_Jp]);
	array_push($lo_Article_Groups, ["Others", $lo_Articles_Others]);
	
	// 	$lo_Article_Groups = [
	
// // 			["main", $lo_Articles]
// 			[$labelOf_Article_Groups_Intl_1, $lo_Article_Groups_Intl_1]
// 			, ["Jp", $lo_Articles_Jp]
// 			, ["others", $lo_Articles_Others]
// // 			, $lo_Articles_Others
// // 			, ["Others", $lo_Articles_Others]
	
// 	];
	
	return $lo_Article_Groups;
	
}//function categorize_Articles__Intl($lo_Articles) {

/*****************************************
 * categorize_Articles($lo_Articles)
 * 
 * at	: 2019/12/22 14:49:21
 * 
 * ref	: 
 * 
 *****************************************/
// function categorize_Articles($lo_Articles) {
function categorize_Articles($lo_Articles, $strOf_Genre_Name) {
//_20191222_142941:caller
//_20191222_142944:head
//_20191222_142950:wl

	/******************
	 * step : 0 : 0.1
	 	prep : vars
	 ****************/
	$lo_Article_Groups = [];
	
	$lo_Articles_Others = $lo_Articles;
// 	$lo_Articles_Others = [];
	
	/******************
	 * step : 0 : 1
	 	DUP : array
	 ****************/
	//ref http://tobysoft.net/wiki/index.php?PHP%2F%C7%DB%CE%F3%28array%29%A4%F2%A5%B3%A5%D4%A1%BC%28%CA%A3%C0%BD%29%A4%B9%A4%EB%CA%FD%CB%A1%A4%CB%A4%C4%A4%A4%A4%C6
	$lo_Articles_COPY = $lo_Articles;
	
// 	/******************
// 	 * step : 1
// 	 	load : keyword file
// 	 ****************/
	/******************
	 * step : 1
	 	dispatch
	 ****************/
	if ($strOf_Genre_Name == CONS::$strOf_Genre_Name__Intl) {
		/******************
		 * step : 1 : 1
		 	intl
		 ****************/
		$lo_Article_Groups = categorize_Articles__Intl($lo_Articles);
		
	
	} else if ($strOf_Genre_Name == CONS::$strOf_Genre_Name__Business) {
		/******************
		 * step : 1 : 1
		 	intl
		 ****************/
		//_20191225_140154:caller
		$lo_Article_Groups = categorize_Articles__Business($lo_Articles);
		
		//_20191225_142602:next
	} else if ($strOf_Genre_Name == CONS::$strOf_Genre_Name__National) {
		/******************
		 * step : 1 : 1
		 intl
		 ****************/
		//_20191226_120108:caller
		$lo_Article_Groups = categorize_Articles__National($lo_Articles);
		
// 		debug("categorizing ==> national");
	
	} else if ($strOf_Genre_Name == CONS::$strOf_Genre_Name__Politics) {
		/******************
		 * step : 1 : 1
		 intl
		 ****************/
		//_20191226_121559:caller
		$lo_Article_Groups = categorize_Articles__Politics($lo_Articles);
		
	} else {
		/******************
		 * step : 1 : X
		 	unknown
		 ****************/
		debug("unknown genre name ==> '$strOf_Genre_Name' ; using default ==> '" . CONS::$strOf_Genre_Name__Intl . "'");
		
		$lo_Article_Groups = categorize_Articles__Intl($lo_Articles);
		
	}//if ($strOf_Genre_Name == CONS::$strOf_Genre_Name__Intl)
	
// 	$lo_LO_KWs = [
// // 			$lo_KWs_Intl_1 = [
// 			["日韓"
// 					, "北朝鮮"
// 					, "朝鮮"
// 					, "韓国"]
// 		, ["中国", "香港", "北京", "習氏", "上海"]
// 		, ["シリア", "イラン", "サウジ", "アフガン"]
// 		, ["ベネチア", "仏軍", "ギリシャ"]
// 	];
	
// 	$lo_LabelsOf_Article_Group = [
// 			"Korea"
// 			, "China"
// 			, "islam world"
// 			, "europe"
			
// 	];
	
	
// 	// length
// 	$lenOf_LO_LO_KWs = count($lo_LO_KWs);

// 	/******************
// 	 * step : 2
// 	 	build : keyword list
// 	 ****************/
// 	for ($i = 0; $i < $lenOf_LO_LO_KWs; $i++) {
// 		/******************
// 		 * step : 2 : 1.1
// 		 	unpack : kw list
// 		 ****************/	
// 		$lo_KWs = $lo_LO_KWs[$i];
// 		/******************
// 		 * step : 2 : 1.2
// 		 	unpack : group label
// 		 ****************/	
// 		$labelOf_Group = $lo_LabelsOf_Article_Group[$i];
		
// 		/******************
// 		 * step : 2 : 1.2
// 		 	get : group
// 		 ****************/	
// 		//_20191224_115157:caller
// 		$valOf_Ret = get_Article_Group(
// 		// 			$lo_Articles, $lo_Articles_Others
// // 				$lo_Articles
// // 				, $lo_Articles_Others
// 				$lo_Articles_Others
// 				, $lo_KWs
// 				, $labelOf_Group
// 		);
		
// 		$labelOf_Article_Groups_Intl_1 =	$valOf_Ret[0];
// 		$lo_Article_Groups_Intl_1 =			$valOf_Ret[1];
// 		$lo_Articles_Others =				$valOf_Ret[2];
		
// 		// push
// 		array_push($lo_Article_Groups, [$labelOf_Article_Groups_Intl_1, $lo_Article_Groups_Intl_1]);		
		
// 	}//for ($i = 0; $i < $lenOf_LO_LO_KWs; $i++)
	
	
// 	$lo_Articles_Jp = [

// 			["yes", "and"]
// 	];

// 	/******************
// 	 * step : X2
// 		build list : $lo_Article_Groups
// 	 ****************/
// 	array_push($lo_Article_Groups, ["Jp", $lo_Articles_Jp]);
// 	array_push($lo_Article_Groups, ["Others", $lo_Articles_Others]);
	
	return $lo_Article_Groups;
	
}//function categorize_Articles($lo_Articles) {

function has_String($haystack, $needle) {
	
	$judge = (strpos( $haystack, $needle ) !== false);
	
	return $judge;
	
// 	if( strpos( $haystack, $needle ) !== false) {
// 		echo "\"bar\" exists in the haystack variable";
// 	}
		
}//function has_String($haystack, $needle) {