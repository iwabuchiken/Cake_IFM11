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

	/******************** (20 '*'s)
	 * public function slice_Raw_Data_By_Week()
	 * at : 2020/04/25 16:17:22
	 * caller
	 * 		
	 ********************/
	public function slice_Raw_Data_By_Week() {
		//_20200425_161736:caller
		//_20200425_161740:head
		//_20200425_161742:wl

		/********************
		 * step : 1
		 * 		prep : vars
		 ********************/
		//44_5.1_10_rawdata.(AUDJPY).(Period-M5).(NumOfUnits-55000).(Bars-55000).20200227_131436.csv
		$dpath_Raw_File_Src = "C:\\Users\\iwabuchiken\\AppData\\Roaming\\MetaQuotes\\Terminal" 
							. "\\34B08C83A5AAE27A4079DE708E60511E\\MQL4\\Files"
							. "\\Research\\obs\\44_\\44_5.1_10\\obs\\44_";
		
		$fname_Raw_File_Src = "44_5.1_10_rawdata.(AUDJPY).(Period-M5)." 
						. "(NumOfUnits-55000).(Bars-55000).20200227_131436.csv";
		
		//C:\WORKS_2\WS\WS_Others.prog\prog\D-7\2_2\VIRTUAL\Admin_Projects\curr\data\csv_raw
		$dpath_Sliced_Files = "C:\\WORKS_2\\WS\\WS_Others.prog\\prog\\D-7\\2_2\\VIRTUAL" 
						. "\\Admin_Projects\\curr\\data\\csv_raw";
		
		/********************
		 * step : 2
		 * 		slice
		 ********************/
		$result_i = LibFxAdmin::slice_Raw_Data_By_Week(
								$dpath_Raw_File_Src
								, $fname_Raw_File_Src
								, $dpath_Sliced_Files
				);
		
		debug("slice_Raw_Data_By_Week ==> rerulst_i : $result_i");
		
		/********************
		* step : X
		* 		vars --> for view
		********************/
		$time_current = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
		
		// variables
		$this->set("time_current", $time_current);
		
		/********************
		* step : X
		* 		view
		********************/
		// layout
		$this->layout = "plain";
		
	}//public function slice_Raw_Data_By_Week() {

	/******************** (20 '*'s)
	 * public function slice_Raw_Data_By_Week()
	 * at : 2020/04/25 16:17:22
	 * caller
	 *
	 ********************/
	public function _slice_Raw_Data_By_Week(
			
			$_dpath_Raw_File_Src
			, $_fname_Raw_File_Src
			, $_dpath_Sliced_Files
				
			
			) {
		//_20200522_115343:caller
		//_20200522_115347:head
		//_20200522_115350:wl
	
		/********************
		 * step : 1
		 * 		prep : vars
		 ********************/
		//44_5.1_10_rawdata.(AUDJPY).(Period-M5).(NumOfUnits-55000).(Bars-55000).20200227_131436.csv
		$_dpath_Raw_File_Src = "C:\\Users\\iwabuchiken\\AppData\\Roaming\\MetaQuotes\\Terminal"
				. "\\34B08C83A5AAE27A4079DE708E60511E\\MQL4\\Files"
						. "\\Research\\obs\\44_\\44_5.1_10\\obs\\44_";
	
		$_fname_Raw_File_Src = "44_5.1_10_rawdata.(AUDJPY).(Period-M5)."
				. "(NumOfUnits-55000).(Bars-55000).20200227_131436.csv";
	
		//C:\WORKS_2\WS\WS_Others.prog\prog\D-7\2_2\VIRTUAL\Admin_Projects\curr\data\csv_raw
		$_dpath_Sliced_Files = "C:\\WORKS_2\\WS\\WS_Others.prog\\prog\\D-7\\2_2\\VIRTUAL"
				. "\\Admin_Projects\\curr\\data\\csv_raw";
	
		/********************
		 * step : 2
		 * 		slice
		 ********************/
		$result_i = LibFxAdmin::slice_Raw_Data_By_Week(
				$_dpath_Raw_File_Src
				, $_fname_Raw_File_Src
				, $_dpath_Sliced_Files
		);
	
		debug("slice_Raw_Data_By_Week ==> rerulst_i : $result_i");
	
		/********************
			* step : X
			* 		vars --> for view
		********************/
		$time_current = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
	
		// variables
		$this->set("time_current", $time_current);
	
		/********************
			* step : X
			* 		view
		********************/
		// layout
		$this->layout = "plain";
	
	}//public function slice_Raw_Data_By_Week() {
	
	/********************
	 * public function _slice_Raw_Data_By_Day
	 * at : 2020/05/22 16:50:26
	 * 
	 * caller
	 *
	 *	http://localhost/Eclipse_Luna/Cake_IFM11/fx_admin/slice_Raw_Data
	 ********************/
	public function _slice_Raw_Data_By_Day(
			
			$_dpath_Raw_File_Src
			, $_fname_Raw_File_Src
			, $_dpath_Sliced_Files
				
			
			) {
		//_20200522_165010:caller
		//_20200522_165017:head
		//_20200522_165020:wl
	
		/********************
		 * step : 1
		 * 		prep : vars
		 ********************/
// 		//44_5.1_10_rawdata.(AUDJPY).(Period-M5).(NumOfUnits-55000).(Bars-55000).20200227_131436.csv
// 		$_dpath_Raw_File_Src = "C:\\Users\\iwabuchiken\\AppData\\Roaming\\MetaQuotes\\Terminal"
// 				. "\\34B08C83A5AAE27A4079DE708E60511E\\MQL4\\Files"
// 						. "\\Research\\obs\\44_\\44_5.1_10\\obs\\44_";
	
// 		$_fname_Raw_File_Src = 
// 					"44_5.1_10_rawdata.(AUDJPY).(Period-M5).(NumOfUnits-55000).(Bars-55000).20200521_154244.[SLICE-1_0518-0521].csv";
// // 					"44_5.1_10_rawdata.(AUDJPY).(Period-M5).(NumOfUnits-55000).(Bars-55000).20200521_154244.csv";
				
// // 		$_fname_Raw_File_Src = "44_5.1_10_rawdata.(AUDJPY).(Period-M5)."
// // 				. "(NumOfUnits-55000).(Bars-55000).20200227_131436.csv";
	
// 		//C:\WORKS_2\WS\WS_Others.prog\prog\D-7\2_2\VIRTUAL\Admin_Projects\curr\data\csv_raw
// 		$_dpath_Sliced_Files = "C:\\WORKS_2\\WS\\WS_Others.prog\\prog\\D-7\\2_2\\VIRTUAL"
// 				. "\\Admin_Projects\\curr\\data\\csv_raw";
	
		debug("\$_fname_Raw_File_Src => " . $_fname_Raw_File_Src);
		
// 		//debug
// 		return;
		
		/********************
		 * step : 2
		 * 		slice
		 ********************/
		/********************
		 * step : 2 : 1
		 * 		get : lines
		 ********************/
		//_20200524_165246:next
// 		$result_i = LibFxAdmin::slice_Raw_Data_By_Day__V2(

		$valOf_Ret__Rcvd = LibFxAdmin::slice_Raw_Data_By_Day__V2(
				$_dpath_Raw_File_Src
				, $_fname_Raw_File_Src
				, $_dpath_Sliced_Files
		);
		// 		array($linesOf_File_Content__Header, $lo_CSV_Lines_By_Day__Final)
		
		// unpack
		$linesOf_File_Content__Header	= $valOf_Ret__Rcvd[0];
		$lo_CSV_Lines_By_Day__Final		= $valOf_Ret__Rcvd[1];
		
		// len
		$lenOf_LO_CSV_Lines_By_Day__Final = count($lo_CSV_Lines_By_Day__Final);
		
		
// 		//debug
// 		debug("\$linesOf_File_Content__Header =>");
// 		debug($linesOf_File_Content__Header);
		
// 		//debug
// 		for ($i = 0; $i < $lenOf_LO_CSV_Lines_By_Day__Final; $i++) {
		
// 			$entry = $lo_CSV_Lines_By_Day__Final[$i];
			
// 			debug("\$i = $i");
// 			debug($entry[0]);
			
// 		}//for ($i = 0; $i < $lenOf_LO_CSV_Lines_By_Day__Final; $i++)
		
		
		
// 		debug("slice_Raw_Data_By_Week ==> rerulst_i : $result_i");

		/********************
		 * step : 3
		 * 		write to file
		 ********************/
		//_20200525_161041:tmp
		/********************
		 * step : 3 : 0
		 * 		prep
		 ********************/
		/********************
		 * step : 3 : 0 : 1
		 * 		pair, period
		 ********************/
		// 		array(
		// 				(int) 0 => 'Pair=AUDJPY;Period=M5;Days=55000;Shift=1;Bars=55000;Time=20200521_154244
		// ',
		// 				(int) 1 => 'no;Open;High;Low;Close;RSI;MFI;Force;BB.2s;BB.1s;BB.main;BB.-1s;BB.-2s;Diff;High/Low;datetime
		// '
		// 		)
		
		
		
		$charOf_Delimiter_CSV_File = CONS::$charOf_Sort_Delimiter_CSV_Line;
		
		$lineOf_Header_Lines_First = $linesOf_File_Content__Header[0];
		
		$tokensOf_Header_Lines_First = explode($charOf_Delimiter_CSV_File, $lineOf_Header_Lines_First);
		
		$token_Pair		= $tokensOf_Header_Lines_First[0];
		$token_Period	= $tokensOf_Header_Lines_First[1];
		
// 		//debug
// 		debug("\$token_Pair = $token_Pair, \$token_Period = $token_Period");
// 				//'$token_Pair = Pair=AUDJPY, $token_Period = Period=M5'
		
		$tokens_Pair = explode("=", $token_Pair);
		$tokens_Period = explode("=", $token_Period);
		
		debug("\$tokens_Pair[1] = $tokens_Pair[1], \$tokens_Period[1] = $tokens_Period[1]");
				//'$tokens_Pair[1] = AUDJPY, $tokens_Period[1] = M5'

		/********************
		 * step : 3 : 0 : 1.1
		 * 		date : first
		 ********************/
		$line_CSV = $lo_CSV_Lines_By_Day__Final[0][0];
		
// 		debug("\$line_CSV => $line_CSV");

		$tokensOf_Line_CSV = explode(CONS::$charOf_Sort_Delimiter_CSV_Line, $line_CSV);
		
		$token_Datetime = $tokensOf_Line_CSV[15];
		
		debug("\$token_Datetime => $token_Datetime");
				//'$token_Datetime => 2020.05.18 00:05'

		$tokensOf_Datetime = explode(" ", $token_Datetime);
		
		$tokensOf_Date = explode(".", $tokensOf_Datetime[0]);
		
		$strOf_Datetime_For_Dirname = join("-", $tokensOf_Date);
		
		debug("\$strOf_Datetime_For_Dirname => $strOf_Datetime_For_Dirname");
				//'$strOf_Datetime_For_Dirname => 2020-05-18'

		/********************
		 * step : 3 : 0 : 1.2
		 * 		date : last
		 ********************/
		$lenOf_tmp = count($lo_CSV_Lines_By_Day__Final);
		
		$line_CSV = $lo_CSV_Lines_By_Day__Final[$lenOf_tmp - 1][0];
		
		// 		debug("\$line_CSV => $line_CSV");
		
		$tokensOf_Line_CSV = explode(CONS::$charOf_Sort_Delimiter_CSV_Line, $line_CSV);
		
		$token_Datetime = $tokensOf_Line_CSV[15];
		
		debug("\$token_Datetime => $token_Datetime");
		//'$token_Datetime => 2020.05.18 00:05'
		
		$tokensOf_Datetime = explode(" ", $token_Datetime);
		
		$tokensOf_Date = explode(".", $tokensOf_Datetime[0]);
		
		$strOf_Datetime_For_Dirname__Last_Date = join("-", $tokensOf_Date);
		
		debug("\$strOf_Datetime_For_Dirname__Last_Date => $strOf_Datetime_For_Dirname__Last_Date");
		//'$strOf_Datetime_For_Dirname => 2020-05-18'
		
		/********************
		 * step : 3 : 0 : 2
		 * 		main folder name
		 ********************/
		$time_label = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
		
		$strOf_Genre_Name = "slice-by-day";
		
		$strOf_Pair_Period = $tokens_Pair[1] . "-" . $tokens_Period[1];
		
// 		$dirname_Slice = "(slice-by-day)"
		$dirname_Slice = "(" . $strOf_Genre_Name . ")"
				. "."
				. "(" . $strOf_Pair_Period . ")"
// 				. "(" . $tokens_Pair[1] . "-" . $tokens_Period[1] . ")"
				
				. "."
				. "(" . $strOf_Datetime_For_Dirname
						. "_"
						. $strOf_Datetime_For_Dirname__Last_Date
						. ")"
						
				. "." . "($time_label)";
		
		//debug
		debug("\$dirname_Slice => $dirname_Slice");
		
		/********************
		 * step : 3 : 0 : 3
		 * 		build : path for main folder
		 ********************/
		$dpath_Sliced_Files__Eigen = join("\\", array($_dpath_Sliced_Files, $dirname_Slice));
		
		//debug
		debug("\$dpath_Sliced_Files__Eigen => $dpath_Sliced_Files__Eigen");
		
		/********************
		 * step : 3 : 0 : 4
		 * 		dir : make
		 ********************/
		if (!file_exists($dpath_Sliced_Files__Eigen)) {
				
			$result_bool = mkdir($dpath_Sliced_Files__Eigen, $mode=0777, $recursive=true);
			
			debug(($result_bool == true) ? 
					"dir created => $dpath_Sliced_Files__Eigen"
					 : "dir NOT created!! ==> $dpath_Sliced_Files__Eigen");
				
		} else {
			
			debug("dir exists => $dpath_Sliced_Files__Eigen");
			
		}//if (!file_exists($dpath_Sliced_Files__Eigen)) {
		
		//_20200525_164903:tmp
		
		/********************
		 * step : 3 : X
		 * 		iterate : file name
		 ********************/
		$lo_File_Name_Sliced_By_Day = array();
		
		for ($i = 0; $i < $lenOf_LO_CSV_Lines_By_Day__Final; $i++) {
		
			$entry = $lo_CSV_Lines_By_Day__Final[$i];
			
// 			debug("\$i = $i");
// 			debug($entry[0]);
					//'690;70.011;70.011;69.994;69.994;54.50943;40.98804;-0.008500000000000001;70.04900000000001;7
		
			/********************
			 * step : 3 : 1
			 * 		build : file name
			 ********************/
			/********************
			 * step : 3 : 1 : 1
			 * 		get : datetime
			 ********************/
			$tokens = explode($charOf_Delimiter_CSV_File, $entry[0]);
// 			$tokens = explode($charOf_Delimiter_CSV_File, $entry);
			
			$strOf_Datetime = $tokens[15];
			
// 			debug("\$strOf_Datetime => " . $strOf_Datetime);
// 					//'$strOf_Datetime => 2020.05.18 00:05'

			$tokensOf_Datetime = explode(" ", $strOf_Datetime);
			
// 			debug("\$tokensOf_Datetime[0] => " . $tokensOf_Datetime[0]);
					//'$tokensOf_Datetime[0] => 2020.05.18'
			
			$tokensOf_Date = explode(".", $tokensOf_Datetime[0]);
			
			$strOf_Datetime__Final = join("-", $tokensOf_Date);
			
			debug("\$strOf_Datetime__Final => " . $strOf_Datetime__Final);

			/********************
			 * step : 3 : 1 : 2
			 * 		build
			 ********************/
			$fname__Final = "($strOf_Genre_Name).($strOf_Pair_Period).($strOf_Datetime__Final).($time_label).csv";
			
			/********************
			 * step : 3 : 2
			 * 		append
			 ********************/
			array_push($lo_File_Name_Sliced_By_Day, $fname__Final);
			
// 			debug("\$fname__Final => " . $fname__Final);
			
// 			$tokensOf_Date = explode(".", $tokensOf_Datetime[0]);
			
// 			$token_Datetime = $tokensOf_Line_CSV[15];
			
// 			debug("\$token_Datetime => $token_Datetime");
// 			//'$token_Datetime => 2020.05.18 00:05'
			
// 			$tokensOf_Datetime = explode(" ", $token_Datetime);
			
// 			$tokensOf_Date = explode(".", $tokensOf_Datetime[0]);
			
// 			$strOf_Datetime_For_Dirname__Last_Date = join("-", $tokensOf_Date);
// 				// 			$tokens = explode($charOf_Delimiter_CSV_File, $entry);
			
// 			$strOf_Datetime = $tokens[15];
// 			
			
		}//for ($i = 0; $i < $lenOf_LO_CSV_Lines_By_Day__Final; $i++)
		
		//debug
// 		debug("\$lo_File_Name_Sliced_By_Day =>");
// 		debug($lo_File_Name_Sliced_By_Day);
		
		/********************
		 * step : 4
		 * 		iterate : write to file
		 ********************/
		/********************
		 * step : 4 : 1
		 * 		prep
		 ********************/
		$lenOf_LO_File_Name_Sliced_By_Day = count($lo_File_Name_Sliced_By_Day);
		
		/********************
		 * step : 4 : 2
		 * 		iterate
		 ********************/
		for ($i = 0; $i < $lenOf_LO_File_Name_Sliced_By_Day; $i++) {
			/********************
			 * step : 4 : 2 : 1
			 * 		get : entry
			 ********************/
			$entry = $lo_File_Name_Sliced_By_Day[$i];
			
			/********************
			 * step : 4 : 2 : 2
			 * 		build : full path
			 ********************/
			$fpath_Out_CSV_By_Day = join(DIRECTORY_SEPARATOR, array($dpath_Sliced_Files__Eigen, $entry));
			
			//_20200526_114404:tmp
			debug("\$fpath_Out_CSV_By_Day =>");
			debug($fpath_Out_CSV_By_Day);
			
			/********************
			 * step : 4 : 2 : 3
			 * 		file : open
			 ********************/
			//_20200526_114428:tmp
			$fout = fopen($fpath_Out_CSV_By_Day, "w");
			
			/********************
			 * step : 4 : 2 : 4
			 * 		write : header
			 ********************/
			//_20200526_114637:tmp
			foreach ($linesOf_File_Content__Header as $line) {
			
				fwrite($fout, $line);
				
			}//foreach ($linesOf_File_Content__Header as $line)
			
// 			fwrite($fout, "\n");
			
			/********************
			 * step : 4 : 2 : 5
			 * 		write : data
			 ********************/
			//_20200526_115023:tmp
			/********************
			 * step : 4 : 2 : 5.1
			 * 		get : list of csv lines
			 ********************/
			$lo_CSV_Lines = $lo_CSV_Lines_By_Day__Final[$i];
			
			//_20200526_115844:next
			$sort_Direction = CONS::$strOf_Sort_Direction_LO_BarDatas__DSC;
			
			$lo_CSV_Lines__Sorted = LibFxAdmin::sort_CSV_Lines_BarData__By_Date__V2($lo_CSV_Lines, $sort_Direction);
			
			/********************
			 * step : 4 : 2 : 5.2
			 * 		write : lines
			 ********************/
// 			foreach ($lo_CSV_Lines as $lineOf_CSV) {
			foreach ($lo_CSV_Lines__Sorted as $lineOf_CSV) {
			
				fwrite($fout, $lineOf_CSV);
				
// 				fwrite($fout, "\n");
				
			}//foreach ($lo_CSV_Lines as $lineOf_CSV)
			
			/********************
			 * step : 4 : 2 : X
			 * 		file : close
			 ********************/
			fclose($fout);
		
		}//for ($i = 0; $i < $lenOf_LO_File_Name_Sliced_By_Day; $i++)
		
		
		/********************
			* step : X
			* 		vars --> for view
		********************/
		$time_current = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
	
		// variables
		$this->set("time_current", $time_current);
	
		/********************
			* step : X
			* 		view
		********************/
		// layout
		$this->layout = "plain";
	
	}//_slice_Raw_Data_By_Day(
	
	
	/******************** (20 '*'s)
	 * public function slice_Raw_Data()
	 * at : 2020/05/22 11:52:26
	 * caller
	 *
	 ********************/
	public function slice_Raw_Data() {
		//_20200522_115730:caller
		//_20200522_115734:head
		//_20200522_115737:wl
	
		/********************
		 * step : 0 : 1
		 * 		parameters
		 ********************/
		/********************
		 * step : 0 : 1 : 1
		 * 		Fname_Raw_File_Src
		 ********************/
		//_20200526_184754:next
		//$fname_Raw_File_Src
		//param_Slice_Raw_Data__Fname_Raw_File_Src
		@$query_Slice_Raw_Data__Fname_Raw_File_Src = 
					$this->request->query[CONS::$param_Slice_Raw_Data__Fname_Raw_File_Src];
// 		@$query_Article_Genre = $this->request->query['fname_Raw_File_Src'];
		
		debug(($query_Slice_Raw_Data__Fname_Raw_File_Src == null) ?
					 "\$query_Slice_Raw_Data__Fname_Raw_File_Src => null"
					 : "\$query_Slice_Raw_Data__Fname_Raw_File_Src => NOT null : $query_Slice_Raw_Data__Fname_Raw_File_Src");
// 		debug("\$query_Slice_Raw_Data__Fname_Raw_File_Src => " . $query_Slice_Raw_Data__Fname_Raw_File_Src);
		
		/********************
		 * step : 1
		 * 		prep : vars
		 ********************/
		//44_5.1_10_rawdata.(AUDJPY).(Period-M5).(NumOfUnits-55000).(Bars-55000).20200227_131436.csv
		$dpath_Raw_File_Src = "C:\\Users\\iwabuchiken\\AppData\\Roaming\\MetaQuotes\\Terminal"
				. "\\34B08C83A5AAE27A4079DE708E60511E\\MQL4\\Files"
						. "\\Research\\obs\\44_\\44_5.1_10\\obs\\44_";
	
		// fname_Raw_File_Src
		if ($query_Slice_Raw_Data__Fname_Raw_File_Src == null) {
		
			$fname_Raw_File_Src = "44_5.1_10_rawdata.(AUDJPY).(Period-M5)" 
							. ".(NumOfUnits-55000).(Bars-55000)" 
							. ".20200521_154244.[SLICE-1_0518-0521].csv";
// 			$fname_Raw_File_Src = "44_5.1_10_rawdata.(AUDJPY).(Period-M5)."
// 					. "(NumOfUnits-55000).(Bars-55000).20200227_131436.csv";
		
		} else {
		
			$fname_Raw_File_Src = $query_Slice_Raw_Data__Fname_Raw_File_Src;
			
		}//if ($query_Slice_Raw_Data__Fname_Raw_File_Src == null)
		
		
// 		$fname_Raw_File_Src = "44_5.1_10_rawdata.(AUDJPY).(Period-M5)."
// 				. "(NumOfUnits-55000).(Bars-55000).20200227_131436.csv";
	
		//C:\WORKS_2\WS\WS_Others.prog\prog\D-7\2_2\VIRTUAL\Admin_Projects\curr\data\csv_raw
		$dpath_Sliced_Files = "C:\\WORKS_2\\WS\\WS_Others.prog\\prog\\D-7\\2_2\\VIRTUAL"
				. "\\Admin_Projects\\curr\\data\\csv_raw";
	
		/********************
		 * step : 1 : 2
		 * 		validate : source file --> exists
		 ********************/
		$fpath_Raw_File_Src = join(DIRECTORY_SEPARATOR, array($dpath_Raw_File_Src, $fname_Raw_File_Src));
		
		// condition
		$cond_1 = file_exists($fpath_Raw_File_Src);
		
		// judge
		if ($cond_1 == true) {
		
			/********************
			 * step : 2
			 * 		slice
			 ********************/
			$flag_tmp = false;
			
			if ($flag_tmp) {
			
	// 			$result_i = LibFxAdmin::slice_Raw_Data_By_Week(
				$result_i = $this->_slice_Raw_Data_By_Week(
						$dpath_Raw_File_Src
						, $fname_Raw_File_Src
						, $dpath_Sliced_Files
				);
			
				debug("slice_Raw_Data_By_Week ==> rerulst_i : $result_i");
				
			} else {//if (true)
				
				$result_i = $this->_slice_Raw_Data_By_Day(
						$dpath_Raw_File_Src
						, $fname_Raw_File_Src
						, $dpath_Sliced_Files
				);
				
				debug("slice_Raw_Data_By_Day ==> rerulst_i : $result_i");
				
			}//if (true)			
				
		} else {//if ($cond_1 == true)
			
			debug("file ==> NOT exist : $fpath_Raw_File_Src");
			
		}//if ($cond_1 == true)
		
// 		/********************
// 		 * step : 2
// 		 * 		slice
// 		 ********************/
// 		$flag_tmp = false;
		
// 		if ($flag_tmp) {
		
// // 			$result_i = LibFxAdmin::slice_Raw_Data_By_Week(
// 			$result_i = $this->_slice_Raw_Data_By_Week(
// 					$dpath_Raw_File_Src
// 					, $fname_Raw_File_Src
// 					, $dpath_Sliced_Files
// 			);
		
// 			debug("slice_Raw_Data_By_Week ==> rerulst_i : $result_i");
			
// 		} else {//if (true)
			
// 			$result_i = $this->_slice_Raw_Data_By_Day(
// 					$dpath_Raw_File_Src
// 					, $fname_Raw_File_Src
// 					, $dpath_Sliced_Files
// 			);
			
// 			debug("slice_Raw_Data_By_Day ==> rerulst_i : $result_i");
			
// 		}//if (true)
	
		/********************
			* step : X
			* 		vars --> for view
		********************/
		$time_current = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
	
		// variables
		$this->set("time_current", $time_current);
	
		/********************
			* step : X
			* 		view
		********************/
		// layout
		$this->layout = "plain";
		
		// template
		//ref https://stackoverflow.com/questions/11711385/rendering-controller-to-a-different-view-in-cakephp#11715695
		$this -> render('slice__raw__data__by__week');	//=> works : View\FxAdmin\slice__raw__data__by__week.ctp
// 		$this -> render('FxAdmin/slice__raw__data__by__week');
		
	}//slice_Raw_Data
	
	
}//class ArticlesController extends AppController {

