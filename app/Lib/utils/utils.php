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
		
					$label = date('Y/m/d H:i:s.u', time());
					
					$len_label = strlen($label);
					
// 					debug(substr($label, 0, $len_label - 3));
					
					return substr($label, 0, $len_label - 3);
// 					return date('Y/m/d H:i:s.u', time());
// 					return date('Y/m/d H:i:s', time());
		
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

		public static function
		find_All_Images
		($sort_ColName = "_id", $sort_Direction = "ASC",
			$limit = "50") {
			
			//ref C:\WORKS\WS\Eclipse_Luna\Cake_TA2\app\Lib\utils\utils.php
			
			/*******************************
			 PDO file
			*******************************/
			$fpath = "";
				
			if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local) {
					
				$fpath .= "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\Lib\\data";
// 				$fpath .= "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_TA2\\app\\Lib\\data";
					
			} else {
					
				$fpath .= "/home/users/2/chips.jp-benfranklin/web/cake_apps/Cake_IFM11/app/Lib/data";
// 				$fpath .= "/cake_apps/Cake_IFM11/app/Lib/data";
// 				$fpath .= "/home/users/2/chips.jp-benfranklin/web/android_app_data/IFM11";
					
			}//if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local)
					
			/*******************************
			 validate: db file exists
			*******************************/
			$res = file_exists($fpath);
			
			if ($res == false) {
			
				debug("data folder => not exist: $fpath");
				
				return null;
			
			} else {
				
				debug("data folder => exists: $fpath");
				
			}
				
			/*******************************
			 get: the latest db file
			*******************************/
			$fname = Utils::get_Latest_File__By_FileName($fpath);

			$fpath .= DIRECTORY_SEPARATOR.$fname;
				
			debug("fpath => $fpath");
			
			/*******************************
			 pdo: setup
			*******************************/
			//REF http://www.if-not-true-then-false.com/2012/php-pdo-sqlite3-example/
			$file_db = new PDO("sqlite:$fpath");
				
			if ($file_db === null) {
					
				debug("pdo => null");
					
				return null;
					
			} else {
				
				debug("pdo => created");
				
			}
				
			// Set errormode to exceptions
			$file_db->setAttribute(PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEPTION);

			/*******************************
				get: db infos
			*******************************/
			//ref http://stackoverflow.com/questions/669092/sqlite-getting-number-of-rows-in-a-database answered Mar 21 '09 at 10:37
			$images = $file_db->query("SELECT Count(*) FROM ".CONS::$tname_IFM11);
// 			$images = $file_db->query('SELECT Count(*) FROM ta2');
			// 			$images = $file_db->query('SELECT * FROM ta2 ORDER BY _id DESC');
				
			// 			$cnt_Tweets = sqlite_num_rows($images);	//=> "Call to undefined function sqlite_num_rows()"
			
			//ref http://stackoverflow.com/questions/883365/row-count-with-pdo answered May 19 '09 at 15:16
			$cnt_Images = $images->fetchColumn();	//=> w
			// 			$cnt_Images = count($images);
				
			debug("cnt_Images => ".$cnt_Images);

			/*******************************
				get: images
			*******************************/
			$q = "SELECT * FROM "
					.CONS::$tname_IFM11
// 					." WHERE created_at > "
// 							."'"
// 							.CONS::$query_Range_Start
// 							."'"
// 					." "
// 					."AND"
// 					." "
// 					." created_at < "
// 							."'"
// 							.CONS::$query_Range_End
// 							."'"
// // 					.", "

					." "
					//ref http://www.tutorialspoint.com/sqlite/sqlite_order_by.htm
					."ORDER BY"
					." "
					.$sort_ColName." ".$sort_Direction
					
					." "
					."LIMIT"
					." "
					.$limit
					;
							
			debug("q => $q");
			
			$result = $file_db->query($q);
				
// 			$res_cnt = $file_db->query($q_cnt);
			
// 			//debug
// 			if ($result === true) {
					
// 				debug("result => true");
				
// 				debug("count => ".$result->columnCount());
					
// 			} else {
					
// 				debug("result => false");
			
// 				debug($result);
// 				debug(get_class($result));
				
// 			}//if ($result === true)
					
			/*******************************
				report
			*******************************/
			$count = 0;
			
// 			foreach ($result as $row) {
				
// 				debug($row);
				
// 				$count += 1;
				
// 				if ($count > 2) {
					
// 					break;
					
// 				}//$count > 5
				
// 			}
			
			/*******************************
				pdo => reset
			*******************************/
			$file_db = null;
			
			/*******************************
				return
			*******************************/
			return $result;
// 			return null;
					
		}//find_All_Images

		public static function
		get_Latest_File__By_FileName($fpath) {
		
			/*******************************
			 dir list
			*******************************/
			//REF array_values http://stackoverflow.com/questions/7536961/reset-php-array-index Jeremy Banks♦
			//REF scan dir http://php.net/manual/en/function.scandir.php#107215
			$scanned_directory = array_values(array_diff(scandir($fpath), array('..', '.')));
			// 			$scanned_directory = array_diff(scandir($fpath), array('..', '.'));
				
// 			debug($scanned_directory);
		
			/*******************************
			 validate: any entry
			*******************************/
			if (count($scanned_directory) < 1) {
		
				//debug
				$msg = "dir list => no entry";
		
				Utils::write_Log(
				Utils::get_dPath_Log(),
				$msg,
				__FILE__, __LINE__);
		
		
				return null;
		
			}
				
			/*******************************
			 get: the latest
			*******************************/
// 			krsort($scanned_directory);
			arsort($scanned_directory);

			$scanned_directory = array_values($scanned_directory);
			
// 			debug($scanned_directory);
			
			$tmp_fname = $scanned_directory[0];
			
// 			debug($tmp_fname);
			
// 			/*******************************
// 			 1 entry, only
// 			*******************************/
// 			if (count($scanned_directory) == 1) {
		
// 				return $scanned_directory[0];
		
// 			}
				
// 			/*******************************
// 			 2 or more
// 			*******************************/
// 			$tmp_fname = $scanned_directory[0];
				
// 			$len = count($scanned_directory);
				
// 			for ($i = 1; $i < $len; $i++) {
		
// 				if (strcmp($tmp_fname, $scanned_directory[$i]) < 0) {
						
// 					$tmp_fname = $scanned_directory[$i];
						
// 				}
		
// 			}
				
			// 			debug("latest => ".$tmp_fname);
				
			/*******************************
			 return
			*******************************/
			return $tmp_fname;
				
		}//get_Latest_File__By_FileName($fpath)
		
		
	}//class Utils
	