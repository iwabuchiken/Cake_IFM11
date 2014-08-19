<?php

	require_once 'cons.php';
	
	class Utils {
		
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
		
					return date('Y/m/d H:i:s', time());
		
				case CONS::$timeLabelTypes["serial"]:
		
					return date('Ymd_His', time());
						
				default:
		
					return date('Y/m/d H:i:s', time());
		
			}//switch($labelType)
		
			// 		return date('m/d/Y H:i:s', time());
		
		}//function get_CurrentTime2($labelType)

		public static function 
		write_Log($dpath, $text, $file, $line) {
		
			$max_LineNum = CONS::$logFile_maxLineNum;
		
			$path_LogFile = join(
					DS,
					array($dpath, CONS::$fname_Log));
// 					array($dpath, "log.txt"));
		
			/****************************************
				* Dir exists?
			****************************************/
			if (!file_exists($dpath)) {
					
				mkdir($dpath, $mode=0777, $recursive=true);
					
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
		
			$file_Length = count($lines);
		
			$log_File = null;
		
			if ($file_Length > $max_LineNum) {
		
				$dname = dirname($path_LogFile);
				
				$fname = null;
				
				if (Utils::get_HostName() == "localhost") {
					
					$fname = CONS::$fname_Log_trunk
								.CONS::$fname_Log_Suffix_Local
								."_".Utils::get_CurrentTime2(
										CONS::$timeLabelTypes['serial'])
								.CONS::$fname_Log_ext;
					
				} else {
					
					$fname = CONS::$fname_Log_trunk
								.CONS::$fname_Log_Suffix_Remote
								."_".Utils::get_CurrentTime2(
										CONS::$timeLabelTypes['serial'])
								.CONS::$fname_Log_ext;
					
				}
					
				$new_name = join(
						DS,
						array(
								$dname,
								$fname
// // 								"log"
// 								CONS::$fname_Log_trunk
// 								.CONS::fna
// 								."_".Utils::get_CurrentTime2(
// 										CONS::$timeLabelTypes['serial'])
// 								.CONS::$fname_Log_ext
// // 								.".txt"
						)
				);
		
				$res = rename($path_LogFile, $new_name);
					
			} else {
					
			}
		
			/******************************
			
				modify: file name
			
			******************************/
			$tmp = strpos(strtolower($file), "c");
			
			if ($tmp == 0) {
				
				$file = str_replace(ROOT, "", $file);
				
			}
			
			/****************************************
				* File: open
			****************************************/
			$log_File = fopen($path_LogFile, "a");
		
			/****************************************
				* Write
			****************************************/
			// 		//REF replace http://oshiete.goo.ne.jp/qa/3163848.html
			// 		$file = str_replace(ROOT.DS, "", $file);
		
			$time = Utils::get_CurrentTime();
		
			// 		$full_Text = "[$time : $file : $line] %% $text"."\n";
			$full_Text = "[$time : $file : $line] $text"."\n";
		
			$res = fwrite($log_File, $full_Text);
			
			/****************************************
				* File: Close
			****************************************/
			fclose($log_File);
				
		}//function write_Log($dpath, $text, $file, $line)
		
		public static function 
		get_CurrentTime() {
			//REF http://stackoverflow.com/questions/470617/get-current-date-and-time-in-php
			date_default_timezone_set('Asia/Tokyo');
		
			return date('m/d/Y H:i:s', time());
		
		}
		
		public static function 
		get_dPath_Log() {
				
			return join(DS, array(ROOT, "lib", "log"));
			// 			return join(DS, array(ROOT, "lib", "log", "log.txt"));
				
		}
		
		public static function 
		get_fPath_DB_Sqlite() {
				
			$msg = "WEBROOT_DIR => ".WEBROOT_DIR
			."/"
					."WWW_ROOT => ".WWW_ROOT;
				
			write_Log(
			CONS::get_dPath_Log(),
			// 				$this->get_dPath_Log(),
			$msg,
			__FILE__,
			__LINE__);
				
				
			return join(DS,
					array(ROOT, APP_DIR, WEBROOT_DIR, CONS::$dbName_Local));
			// 					array(ROOT, APP_DIR, WEBROOT_DIR, $this->dbName_Local));
				
		}

		public static function
		conv_Float_to_TimeLabel ($float_time) {
				
			// 			$integer = (int) $float_time;
			// 			$integer = floor($float_time) / 1;
			$integer = floor($float_time);
			// 			$integer = (int)intval($float_time, 10);
			// 			$integer = (int)intval($float_time);
			// 			$integer = intval($float_time);
			// 			$integer = (intval)floor($float_time);
			// 			$integer = floor($float_time);
				
			$decimal = $float_time - $integer;
				
			$sec_num = $integer;
			// 			$sec_num = parseInt($float_time, 10); // don't forget the $second param
			$hours   = floor($sec_num / 3600);
			$minutes = floor(($sec_num - ($hours * 3600)) / 60);
			$seconds = $sec_num - ($hours * 3600) - ($minutes * 60);
		
			if ($hours   < 10) {$hours_str   = "0$hours";}
			else {$hours_str = $hours;}
		
			if ($minutes < 10) {$minutes_str = "0$minutes";}
			else {$minutes_str = $minutes;}
				
			if ($seconds < 10) {$seconds_str = "0".number_format(($seconds + $decimal), 3, '.', '');}
			else {$seconds_str = number_format(($seconds + $decimal), 3, '.', '');}
			// 				else {$seconds_str = ($seconds + $decimal);}
		
			// 			$time    = "$hours:$minutes:$seconds.".number_format($decimal, 3, '.', '');
			//REF http://www.php.net/manual/en/function.number-format.php
			// 			$time    = "$hours_str:$minutes_str";
				
			if ($hours == "00") {
					
				$time    = "$minutes_str:$seconds_str";
		
			} else {
					
				$time    = "$hours_str:$minutes_str:$seconds_str";
					
			}
			;
		
			// 			$time    = "$hours_str:$minutes_str:$seconds_str";
			// 			$time    = "$hours:$minutes:"
			// 						.number_format(($seconds + $decimal), 3, '.', '');
			// 			$time    = "$integer.$decimal";
				
			return $time;
				
		}//conv_Float_to_TimeLabel ($float_time)
		
		
// 		public static function
// 		conv_Float_to_TimeLabel ($float_time) {
			
			
			
// 			$sec_num = parseInt($float_time, 10); // don't forget the $second param
// 			$hours   = Math.floor($sec_num / 3600);
// 			$minutes = Math.floor(($sec_num - ($hours * 3600)) / 60);
// 			$seconds = $sec_num - ($hours * 3600) - ($minutes * 60);
		
// 			if ($hours   < 10) {$hours   = "0"+$hours;}
// 			if ($minutes < 10) {$minutes = "0"+$minutes;}
// 			if ($seconds < 10) {$seconds = "0"+$seconds;}
// 			$time    = $hours+':'+$minutes+':'+$seconds;
// 			return $time;
// 		}
				
	}//class Utils
	