<?php

/*
C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\
	=> app diretory
/cake_apps/Cake_IFM11

 * 
 * 
 */


// class ImagesController extends AppController {
class FxAdminController extends AppController {

	
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
		
		/******************
		 * step : 1.2
		 * 		prep : url params
		 ****************/
		/******************
		 * step : 1.1 : 1
		 * 		get : param
		 ****************/
// 		@$query_Article_Genre = $this->request->query['query_Article_Genre'];
		
		
	}//public function index()
	
	/******************** (20 '*'s)
	* public function process_log_file__Get_ListOf_Ticket_Nums()
	* at : 2020/01/03 12:52:13
	* caller
	* 		php : process_log_file
	********************/
	public function process_log_file__Get_ListOf_Ticket_Nums() {
		//_20200114_130535:caller
		//_20200114_130555:head
		//_20200114_130558:wl
		
		/******************** (20 '*'s)
		* step 1 : 0
		* 	prep : log
		********************/
		$msg	= "\n";
		
		$msg	.= "process_log_file__Get_ListOf_Ticket_Nums => starting...";
		$msg	.= "\n";
			
		Utils::write_Log__Fx_Admin(
// 				basename(CONS::$dpath_Log_Fx_Admin), CONS::$fname_Log_Fx_Admin__Ticket_Num
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin__Ticket_Num
// 				CONS::$dpath_Log_Fx_Admin__Ticket_Num, CONS::$fname_Log_Fx_Admin__Ticket_Num
// 				, $msg, basename(__FILE__), __LINE__);
				, $msg, __FILE__, __LINE__);
		
		debug($msg);
		
		/********************
		* step 1
		* 	get : file handler
		********************/
		/********************
		* step 1 : 1
		* 	prep : vars
		********************/
		$dpath_MT4_Log_Files = "C:\\Users\\iwabuchiken\\AppData\\Roaming\\MetaQuotes\\Terminal"
				. "\\34B08C83A5AAE27A4079DE708E60511E\\MQL4\\Files\\Logs"
				."\\20191224_073459[eap-2.id-1].[AUDJPY-1].dir";
		
		$fname_MT4_Log_File = "[ea-3].(20191224_073459).log.(20191224_084212).copy";
		
		$fpath_MT4_Log_File = join(DS, 
					array(
							$dpath_MT4_Log_Files
							, $fname_MT4_Log_File
							
					));
		
		/********************
		* step 1 : 2
		* 	file : open
		********************/
		$fin_MT4_Log_Files = fopen($fpath_MT4_Log_File, "r");
		
		//_20200114_132944:next
		
		/********************
		* step 3
		* 	file : close
		********************/
		fclose($fin_MT4_Log_Files);
	
		//debug
		$msg	= "\n";
		
		$msg	.= "(step 3) file ==> closed";
		$msg	.= "\n";
			
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin__Ticket_Num
				, $msg, __FILE__, __LINE__);
		
		/********************
		 * step 1 : 1.4
		 * 	filter
		 ********************/
		
		/********************
		 * step 1 : 1.3.X
		 * 	file : close
		 ********************/
// 		fclose($fin_MT4_Log_File__Target);
		
	}//public function process_log_file__Get_ListOf_Ticket_Nums() {
	
	/******************** (20 '*'s)
	* public function process_log_file__Get_ListOf_Ticket_Nums()
	* at : 2020/01/03 12:52:13
	* caller
	* 		php : process_log_file
	********************/
	public function process_log_file__Get_ListOf_Ticket_Nums__DEPRECATED_20200114_130507() {
		//_20200103_134838:caller
		//_20200103_134919:head
		//_20200103_134926:wl
		
		/******************** (20 '*'s)
		* step 1 : 1
		* 	get : list of file names
		********************/
		/******************** (20 '*'s)
		* step 1 : 1.1
		* 	scan dir
		********************/
		//C:\Users\iwabuchiken\AppData\Roaming\MetaQuotes\Terminal\34B08C83A5AAE27A4079DE708E60511E\MQL4\Files\Logs\20191224_073459[eap-2.id-1].[AUDJPY-1].dir
		$dpath_MT4_Log_Files = "C:\\Users\\iwabuchiken\\AppData\\Roaming\\MetaQuotes\\Terminal\\34B08C83A5AAE27A4079DE708E60511E\\MQL4\\Files\\Logs\\20191224_073459[eap-2.id-1].[AUDJPY-1].dir";
// 		$dpath_MT4_Log_Files = "C:/Users/iwabuchiken/AppData/Roaming/MetaQuotes/Terminal/34B08C83A5AAE27A4079DE708E60511E/MQL4/Files/Logs/20191224_073459[eap-2.id-1].[AUDJPY-1].dir";
		
		$fname_MT4_Log_File = "*";
// 		$fname_MT4_Log_File = "*.copy";
		
// 		$fpath_MT4_Log_Files = "$dpath_MT4_Log_Files/$fname_MT4_Log_File";
		$fpath_MT4_Log_Files = "$dpath_MT4_Log_Files\\$fname_MT4_Log_File";
		
		//debug----------------------
		$msg = "\$fpath_MT4_Log_Files ==> " . $fpath_MT4_Log_Files;
		
		// write log
		Utils::write_Log__Fx_Admin(
					CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
					, $msg
					, __FILE__, __LINE__);
		
		//_20200411_180506:ref
		//ref https://www.codewall.co.uk/list-files-in-directory-with-php/
		$lo_MT4_Log_Files = array_diff(scandir($dpath_MT4_Log_Files . "/"), [".", ".."]);
// 		$lo_MT4_Log_Files = array_diff(scandir($dpath_MT4_Log_Files . "/", 1), [".", ".."]);
// 		$lo_MT4_Log_Files = glob($fpath_MT4_Log_Files);
// 		$lo_MT4_Log_Files = glob($fpath_MT4_Log_Files);
		
// 		debug($lo_MT4_Log_Files);
		
		/******************** (20 '*'s)
		* step 1 : 1.2
		* 	filter
		********************/
		$lo_MT4_Log_Files__Filtered = [];
		
		foreach ($lo_MT4_Log_Files as $name) {
		
			// conditions
			$cond_1 = Utils::endsWith($name, ".copy");
			$cond_2 = Utils::endsWith($name, ".log");
			
			// judge
			if ($cond_1 || $cond_2) {
			
				array_push($lo_MT4_Log_Files__Filtered, $name);
				
			}//if ($cond_1 || $cond_2)
			
		}//foreach ($lo_MT4_Log_Files as $name)
		
		debug($lo_MT4_Log_Files__Filtered);

		//debug----------------------
		$msg = "\n";
		
		$msg .= "count(lo_MT4_Log_Files__Filtered) ==> " . count($lo_MT4_Log_Files__Filtered);
// 		$msg = "count(lo_MT4_Log_Files__Filtered) ==> " . count($lo_MT4_Log_Files__Filtered);
		
		// write log
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
				, $msg
				, __FILE__, __LINE__);

		/******************** (20 '*'s)
		 * step 1 : 1.3
		 * 	open : file
		 ********************/
		/******************** (20 '*'s)
		 * step 1 : 1.3.1
		 * 	get file : 1 file only
		 ********************/
		$fname_MT4_Log_File__Example = "";
		
		foreach ($lo_MT4_Log_Files__Filtered as $name) {
		
			// pick up
			if (Utils::endsWith($name, ".copy")) {
			
				$fname_MT4_Log_File__Example = $name;
				
				break;
				
			}//if (Utils::endsWith($name, ".copy"))
			;
			
		}//foreach ($lo_MT4_Log_Files__Filtered as $name)
		
		debug("\$fname_MT4_Log_File__Example ==> " . $fname_MT4_Log_File__Example);
		
		/******************** (20 '*'s)
		 * step 1 : 1.3.2
		 * 	file : open
		 ********************/
		// file path
		$fpath_MT4_Log_File__Target = join(
				DS,
				array($dpath_MT4_Log_Files, $fname_MT4_Log_File__Example));
		
		$fin_MT4_Log_File__Target = fopen($fpath_MT4_Log_File__Target, "r");
// 		$fin_MT4_Log_File__Target = fopen($fpath_MT4_Log_File__Target, "a");
		
		/******************** (20 '*'s)
		 * step 1 : 1.3.3
		 * 	file : read
		 ********************/
		$lo_Lines_MT4_Log_File__Target = [];
		
		if ($fin_MT4_Log_File__Target) {
			
			while (($line = fgets($fin_MT4_Log_File__Target)) !== false) {
				
// 				debug($line);
				
				array_push($lo_Lines_MT4_Log_File__Target, $line);
				
			}
		
			fclose($fin_MT4_Log_File__Target);
			
		} else {
			// error opening the file.
			debug("\$fin_MT4_Log_File__Target ==> false");
			
		}
		
		debug("count(\$lo_Lines_MT4_Log_File__Target) => " . count($lo_Lines_MT4_Log_File__Target));
		
		/******************** (20 '*'s)
		 * step 1 : 1.4
		 * 	filter
		 ********************/
		//_20200103_135103:next
		
		/******************** (20 '*'s)
		 * step 1 : 1.3.X
		 * 	file : close
		 ********************/
// 		fclose($fin_MT4_Log_File__Target);
		
	}//public function process_log_file__Get_ListOf_Ticket_Nums__DEPRECATED_20200114_130507
	
	/******************** (20 '*'s)
	* public function process_log_file()
	* at : 2020/01/02 16:49:32
	* caller
	* 		js : function process_log_file()
	********************/
	public function process_log_file() {
		/******************** (20 '*'s)
		* step : 1
		* 	get : list of ticket nums from ==> log file (L1)
		* 
		********************/
		//_20200114_130535:caller
		$this->process_log_file__Get_ListOf_Ticket_Nums();
		
		/******************** (20 '*'s)
		* step : 2
		* 	get : list of ticket nums from ==> gaitame report file (L2)
		* 
		********************/
		/******************** (20 '*'s)
		* step : 3
		* 	get : L2 の中から、L1にあるもの ==> pick up (L3)
		* 
		********************/
		/******************** (20 '*'s)
		* step : 4
		* 	L3 ==> write to file
		* 
		********************/
// 		$time_current = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
		
		//_20200102_172903:next
		
// 		$dpath_Log = CONS::$dpath_Log_Fx_Admin;
// 		$fname_Log = CONS::$fname_Log_Fx_Admin;
		
		
// 		$text = "abc" . " / " . $time_current;
		
// // 		$fname_Working = __FILE__; $line = __LINE__;
		
// 		// write log
// 		Utils::write_Log__Fx_Admin($dpath_Log, $fname_Log, $text, __FILE__, __LINE__);
// // 		write_Log__Fx_Admin($dpath_Log, $fname_Log, $text, $fname_Working, $line);
		
// // 		debug("process_log_file ==> starting...");
		
		/******************** (20 '*'s)
		* step : X
		* 	set : values for view
		* 
		********************/
		$time_current = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
		
		// variables
		$this->set("time_current", $time_current);
		
		// layout
		$this->layout = "plain";
		
	}//public function process_log_file() {
	
}//class ArticlesController extends AppController {

