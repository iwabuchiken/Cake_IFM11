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
		debug("count(lo_As_href) => ".count($lo_As_href));
		
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
		//_20191220_141744:next
		//_20191222_142941:caller
		$lo_Article_Groups = categorize_Articles($lo_Articles);
		
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
 * categorize_Articles($lo_Articles)
 * 
 * at	: 2019/12/22 14:49:21
 * 
 * ref	: 
 * 
 *****************************************/
function categorize_Articles($lo_Articles) {
//_20191222_142941:caller
//_20191222_142944:head
//_20191222_142950:wl

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
	 * step : 2
	 	build : keyword list
	 ****************/
	$lo_KWs_Intl_1 = [
				"日韓"
				, "北朝鮮"
				, "朝鮮"
				, "韓国"
			];
	
	$lo_Article_Groups_Intl_1 = [];
	
	$labelOf_Article_Groups_Intl_1 = "Korea";
	
	// judge
	$lenOf_LO_Articles = count($lo_Articles);
	
// 	foreach ($lo_Articles as $article) {
	for ($i = 0; $i < $lenOf_LO_Articles; $i++) {
		
		// get : instance
		$article = $lo_Articles[$i];
	
		$line = $article[0];
		
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
	$lo_Articles_Others = [];
	
	// L1'
	$lo_Article_Groups_Intl_1__Lines = [];
	foreach ($lo_Article_Groups_Intl_1 as $article) {
	
		array_push($lo_Article_Groups_Intl_1__Lines, $article[0]);
		
	}//foreach ($lo_Article_Groups_Intl_1 as $article)
	
	// L2'
	$lo_Articles__Lines = [];
	foreach ($lo_Articles as $article) {
	
		array_push($lo_Articles__Lines, $article[0]);
		
	}//foreach ($lo_Article_Groups_Intl_1 as $article)
	
	// lines in the orig ?
	foreach ($lo_Articles as $article) {
	
		$line = $article[0];
		
		// in array ?
		if (! in_array($line, $lo_Article_Groups_Intl_1__Lines)) {
		
			array_push($lo_Articles_Others, $article);
			
		}//if (! in_array($line, $lo_Article_Groups_Intl_1__Lines))
		;
		
	}//foreach ($lo_Articles as $article)
	
	debug("count(\$lo_Articles_Others) =>");
	debug(count($lo_Articles_Others));
	
	
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

	$lo_Article_Groups = [
	
// 			["main", $lo_Articles]
			[$labelOf_Article_Groups_Intl_1, $lo_Article_Groups_Intl_1]
			, ["Jp", $lo_Articles_Jp]
			, ["others", $lo_Articles_Others]
// 			, $lo_Articles_Others
// 			, ["Others", $lo_Articles_Others]
	
	];
	
	return $lo_Article_Groups;
	
}//function categorize_Articles($lo_Articles) {

function has_String($haystack, $needle) {
	
	$judge = (strpos( $haystack, $needle ) !== false);
	
	return $judge;
	
// 	if( strpos( $haystack, $needle ) !== false) {
// 		echo "\"bar\" exists in the haystack variable";
// 	}
		
}//function has_String($haystack, $needle) {