<?php

/********************
 * at : 2020/03/15 13:21:40

<run file>
php C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\utils\fx\exec_tester-1.php
 

log file : C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\utils\fx\log_exec_tester-1.log
sakura C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\utils\fx\log_exec_tester-1.log
 
 
********************/


require_once 'C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/cons.php';

// require_once 'C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/utils.php';
// require_once '../utils/cons.php';
// require_once 'utils/cons.php';
// require_once 'cons.php';
	
class ExecTester {

	public static function
	get_HostName() {
	
		$pieces = parse_url(Router::url('/', true));
	
		return $pieces['host'];
	
	}//public function get_HostName()
	
	
	public static function
	get_CurrentTime2($labelType) {
		//REF http://stackoverflow.com/questions/470617/get-current-date-and-time-in-php
		date_default_timezone_set('Asia/Tokyo');
	
		switch($labelType) {
	
			case CONS::$timeLabelTypes["rails"]:
	
				return date('Y-m-d H:i:s', time());
	
			case CONS::$timeLabelTypes["basic"]:
	
				$label = date('Y/m/d H:i:s.u', time());
	
				$len_label = strlen($label);
	
				// 					debug(substr($label, 0, $len_label - 3));
	
				return substr($label, 0, $len_label - 3);
				// 					return date('Y/m/d H:i:s.u', time());
				// 					return date('Y/m/d H:i:s', time());
	
			case CONS::$timeLabelTypes["serial"]:
	
				//ref https://stackoverflow.com/questions/17909871/getting-date-format-m-d-y-his-u-from-milliseconds
				$t = microtime(true);
				$micro = sprintf("%06d",($t - floor($t)) * 1000000);
				$d = new DateTime( date('Y-m-d H:i:s.'.$micro, $t) );
	
	
				// 				print $d->format("Y-m-d H:i:s.u")
	
				return $d->format("Ymd_His_u");
				// 				return date('Ymd_His', time());
				
			default:
	
				return date('Y/m/d H:i:s', time());
	
		}//switch($labelType)
	
		// 		return date('m/d/Y H:i:s', time());
	
	}//function get_CurrentTime2($labelType)
	
	
	public static function
	get_CurrentTime() {
		//REF http://stackoverflow.com/questions/470617/get-current-date-and-time-in-php
		date_default_timezone_set('Asia/Tokyo');
	
		return date('m/d/Y H:i:s', time());
	
	}
	
	
	public static function
	write_Log__Fx_Admin
	(
			$dpath_Log, $fname_Log, $text
			, $fname_Working, $line
			, $flg_Add_File_Line = true) {
	
		$max_LineNum = CONS::$logFile_maxLineNum;
	
		$path_LogFile = join("/", array($dpath_Log, $fname_Log));
// 		$path_LogFile = join(
// 				DS,
// 				array($dpath_Log, $fname_Log));
		// 				array($dpath, CONS::$fname_Log));
		// 					array($dpath, "log.txt"));
	
		/****************************************
		 * Dir exists?
		****************************************/
		if (!file_exists($dpath_Log)) {
	
			mkdir($dpath_Log, $mode=0777, $recursive=true);
	
		}
	
		/****************************************
		 * File exists?
			****************************************/
		if (!file_exists($path_LogFile)) {
	
			// 			mkdir($path_LogFile, $mode=0777);
			//REF touch http://php.net/touch
			$res = touch($path_LogFile);
	
			if ($res == false) {
	
				return;
	
			}
	
		}
	
		/****************************************
		 * File => longer than the max num?
			****************************************/
		//REF read content http://www.php.net/manual/en/function.file.php
		$lines = file($path_LogFile);
	
		$fname_Working_Length = count($lines);
	
		$log_File = null;
	
		if ($fname_Working_Length > $max_LineNum) {
	
			$dname = dirname($path_LogFile);
				
			$fname = null;
				
			if (ExecTester::get_HostName() == "localhost") {
	
				//_20200128_171830:tmp
				$fname = $fname_Log
				.".(".ExecTester::get_CurrentTime2(
						CONS::$timeLabelTypes['serial'])
						. ")"
								.CONS::$fname_Log_ext_Log;
				// 				$fname = CONS::$fname_Log_trunk
				// 							.CONS::$fname_Log_Suffix_Local
				// 							."_".Utils::get_CurrentTime2(
				// 									CONS::$timeLabelTypes['serial'])
				// 							.CONS::$fname_Log_ext;
	
			} else {
	
				$fname = CONS::$fname_Log_trunk
				.CONS::$fname_Log_Suffix_Remote
				."_".ExecTester::get_CurrentTime2(
						CONS::$timeLabelTypes['serial'])
						.CONS::$fname_Log_ext;
	
			}
			
			$new_name = join("/", array($dpath_Log, $fname_Log));
			
// 			$new_name = join(
// 					DS,
// 					array(
// 							$dname,
// 							$fname
// 							// // 								"log"
// 					// 								CONS::$fname_Log_trunk
// 					// 								.CONS::fna
// 					// 								."_".Utils::get_CurrentTime2(
// 							// 										CONS::$timeLabelTypes['serial'])
// 					// 								.CONS::$fname_Log_ext
// 					// // 								.".txt"
// 					)
// 			);
	
			$res = rename($path_LogFile, $new_name);
	
		} else {
	
		}
	
// 		/******************************
	
// 		modify: file name
	
// 		******************************/
// 		$tmp = strpos(strtolower($fname_Working), "c");
	
// 		if ($tmp == 0) {
				
// 			$fname_Working = str_replace(ROOT, "", $fname_Working);
				
// 		}
	
		/****************************************
		 * File: open
			****************************************/
		$log_File = fopen($path_LogFile, "a");
	
		/****************************************
		 * Write
		****************************************/
		// 		//REF replace http://oshiete.goo.ne.jp/qa/3163848.html
		// 		$file = str_replace(ROOT.DS, "", $file);
	
		$time = ExecTester::get_CurrentTime();
	
		// 		$full_Text = "[$time : $file : $line] %% $text"."\n";
	
		// build : text line
		if ($flg_Add_File_Line == true) {
	
			$full_Text = "[$time : " . basename($fname_Working) . " : $line] $text"
			. "\n";
	
		} else {
	
			$full_Text = "$text"
			. "\n";
				
		}//if ($flg_Add_File_Line == true)
	
	
			// 		$full_Text = "[$time : " . basename($fname_Working) . " : $line] $text"."\n";
			// 		$full_Text = "[$time : $fname_Working : $line] $text"."\n";
	
		$res = fwrite($log_File, $full_Text);
	
		/****************************************
		 * File: Close
		****************************************/
		fclose($log_File);
			
	}//write_Log__Fx_Admin($dpath_Log, $text, $fname_Working, $line)
	
	
	
	/********************
	* exec_tester_1
	* 	at : 2020/03/15 13:08:12
	* 
	* @return : 
	* 
	********************/
// 	public static function get_Bar_Type__BUY($pos, $bd) {
	public static function exec_tester_1() {
		/********************
		 * step : 0 : 1
		 * 		prep : vars
		 ********************/
		$num_Sleep_In_Seconds = 5;
		
		
		$msg = "[" . basename(__FILE__) . " : " . __LINE__ . "] exec_tester_1";
		
		print($msg);
// 		print("exec_tester_1");
		print ("\n");
		print ("\n");

// 		$msg .= "\n";
		
		//debug : write
		$dpath = "C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/fx";
		
		$fname = "log_exec_tester-1.log";
		
// 		Utils::write_Log__Fx_Admin(
		ExecTester::write_Log__Fx_Admin(
				$dpath, $fname
// 				CONS::$dpath_Log_Fx_Admin, $fname
				, $msg, __FILE__, __LINE__);
		
		
		/********************
		 * step : 1
		 * 		
		 ********************/
		$lo_Filenames_CSV = array(

			"(AUDJPY).(M5).20200227_131436.[20200106_0005-20200106_2355].csv"
			, "(AUDJPY).(M5).20200227_131436.[20200107_0005-20200107_2355].csv"
			, "(AUDJPY).(M5).20200227_131436.[20200108_0005-20200108_2355].csv"
			, "(AUDJPY).(M5).20200227_131436.[20200109_0005-20200109_2355].csv"
			, "(AUDJPY).(M5).20200227_131436.[20200110_0005-20200110_2355].csv"
			, "(AUDJPY).(M5).20200227_131436.[20200113_0005-20200113_2355].csv"
			, "(AUDJPY).(M5).20200227_131436.[20200114_0005-20200114_2355].csv"
// 			"(AUDJPY).(M5).20200227_131436.[20200115_0005-20200115_2355].csv"
		);
		
		$url_Trunk = "http://localhost/Eclipse_Luna/Cake_IFM11/fx_test/fx_tester_T_1?_txtOf_tag_TA_Fx_Test_Index_Tester_1=";
		
		/********************
		 * step : 2
		 *		build : command lines
		 ********************/
		$lo_URL_Full = array();
		
		foreach ($lo_Filenames_CSV as $name) {
		
			// build : url full
			$url_Full = $url_Trunk . $name ;
			
			// append
			array_push($lo_URL_Full, $url_Full);
			
		}//foreach ($lo_Filenames_CSV as $name)
		
		/********************
		 * step : 3
		 *		exec
		 ********************/
		foreach ($lo_URL_Full as $urlfull) {
		
			/********************
			 * step : 3.1
			 *		exec
			 ********************/
			$cmd = "C:\WORKS_2\Programs\opera\launcher " . $urlfull;
// 			$cmd = "C:\WORKS_2\Programs\opera\launcher " . $lo_URL_Full[0];
			
			$msg = "executing ... : $cmd";
			
			ExecTester::write_Log__Fx_Admin(
					$dpath, $fname
					// 				CONS::$dpath_Log_Fx_Admin, $fname
					, $msg, __FILE__, __LINE__);
			
			exec($cmd);
			;
			/********************
			 * step : 3.2
			 *		sleep
			 ********************/
			sleep($num_Sleep_In_Seconds);
			
		}//foreach ($lo_URL_Full as $fullpath)
		
		
		
		
	}//public static function exec_tester_1() {
	
	
}//class Libfx

ExecTester::exec_tester_1();
