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

			/*******************************
			 valid: file exists
			*******************************/
			if ($fname == null) {
			
				debug("Utils::get_Latest_File__By_FileName => returned null");
			
				return null;
			
			}//$fname == null
					
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
		find_All_Images__From_File
		($sort_ColName = "_id", $sort_Direction = "ASC",
			$limit = "50", $fpath) {
			
			//ref C:\WORKS\WS\Eclipse_Luna\Cake_TA2\app\Lib\utils\utils.php
			
			/*******************************
			 PDO file
			*******************************/
// 			$fpath = "";
				
// 			if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local) {
					
// 				$fpath .= "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\Lib\\data";
// // 				$fpath .= "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_TA2\\app\\Lib\\data";
					
// 			} else {
					
// 				$fpath .= "/home/users/2/chips.jp-benfranklin/web/cake_apps/Cake_IFM11/app/Lib/data";
// // 				$fpath .= "/cake_apps/Cake_IFM11/app/Lib/data";
// // 				$fpath .= "/home/users/2/chips.jp-benfranklin/web/android_app_data/IFM11";
					
// 			}//if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local)
					
			/*******************************
			 validate: db file exists
			*******************************/
			$res = file_exists($fpath);
			
			if ($res == false) {
			
				debug("file => not exist: $fpath");
				
				return null;
			
			} else {
				
				debug("file => exists: $fpath");
				
			}
				
// 			/*******************************
// 			 get: the latest db file
// 			*******************************/
// 			$fname = Utils::get_Latest_File__By_FileName($fpath);

// 			/*******************************
// 			 valid: file exists
// 			*******************************/
// 			if ($fname == null) {
			
// 				debug("Utils::get_Latest_File__By_FileName => returned null");
			
// 				return null;
			
// 			}//$fname == null
					
// 			$fpath .= DIRECTORY_SEPARATOR.$fname;
				
// 			debug("fpath => $fpath");
			
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
					
		}//find_All_Images__From_File

		/*******************************
		 * used in the remote server<br>
		 * 
		 * @param $range_Start,End not including
			@return array($result, $cnt_Images)<br>
			null	=> data folder => not exist<br>
		*******************************/
		public static function
		find_All_Images_From_CSV__DateRange
		($fpath, $sort_ColName = "_id", $sort_Direction = "ASC",
// 			$limit = "50", 
			$range_Start = "2015/10/01 00:00:00.000",
			$range_End = "2015/10/10 00:00:00.000"
			) {
			/*******************************
			 PDO file
			*******************************/
// 			$fpath = "";
				
// 			if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local) {
					
// 				$fpath .= "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\Lib\\data";
// // 				$fpath .= "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_TA2\\app\\Lib\\data";
					
// 			} else {
					
// 				$fpath .= "/home/users/2/chips.jp-benfranklin/web/cake_apps/Cake_IFM11/app/Lib/data";
// // 				$fpath .= "/cake_apps/Cake_IFM11/app/Lib/data";
// // 				$fpath .= "/home/users/2/chips.jp-benfranklin/web/android_app_data/IFM11";
					
// 			}//if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local)
					
			/*******************************
			 validate: db file exists
			*******************************/
			$res = file_exists($fpath);
			
			if ($res == false) {
			
				debug("file => not exist: $fpath");
				
				return null;
			
			}
				
// 			/*******************************
// 			 get: the latest db file
// 			*******************************/
// 			$fname = Utils::get_Latest_File__By_FileName($fpath);

// 			/*******************************
// 				valid: file exists
// 			*******************************/
// 			if ($fname == null) {
				
// 				debug("Utils::get_Latest_File__By_FileName => returned null");
				
// 				return null;
				
// 			}//$fname == null
			
// 			$fpath .= DIRECTORY_SEPARATOR.$fname;
				
// 			debug("fpath => $fpath");
			
			/*******************************
			 pdo: setup
			*******************************/
			//REF http://www.if-not-true-then-false.com/2012/php-pdo-sqlite3-example/
			$file_db = new PDO("sqlite:$fpath");
				
			if ($file_db === null) {
					
				debug("pdo => null");
					
				return null;
					
			} else {
				
//				debug("pdo => created");
				
			}
				
			// Set errormode to exceptions
			$file_db->setAttribute(PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEPTION);

// 			/*******************************
// 				prep: range data: Start
// 			*******************************/
// 			$tmp = Utils::get_Admin_Value(CONS::$adminData_Image_data_Range_Start, "val1");
			
// 			debug("val1 => $tmp");
			
// 			if ($tmp != null) {
				
// 				$range_Start = $tmp
// 				;
// 			}//$tmp != null

// 			/*******************************
// 				prep: range data: End
// 			*******************************/
// 			$tmp = Utils::get_Admin_Value(CONS::$adminData_Image_data_Range_End, "val1");
			
// 			debug("End => $tmp");
			
// 			if ($tmp != null) {
				
// 				$range_End = $tmp;
				
// 			}//$tmp != null
			
			/*******************************
				get: db infos
			*******************************/
			//ref http://stackoverflow.com/questions/669092/sqlite-getting-number-of-rows-in-a-database answered Mar 21 '09 at 10:37
			$query = "SELECT Count(*) FROM "
						.CONS::$tname_IFM11
						." "
						."WHERE date_added > '$range_Start'"
						." "
						."AND"
						." "
						."date_added < '$range_End'"
// 						."WHERE date_added < '$range_End'"
						;
			
//			debug("query => $query");
			
			$images = $file_db->query(
						$query
// 						"SELECT Count(*) FROM "
// 						.CONS::$tname_IFM11
// 						." "
// 						."WHERE date_added > '$range_Start'"
			
			);
			
			//ref http://stackoverflow.com/questions/883365/row-count-with-pdo answered May 19 '09 at 15:16
			$cnt_Images = $images->fetchColumn();	//=> w
			// 			$cnt_Images = count($images);
				
			debug("cnt_Images => ".$cnt_Images);

			/*******************************
				get: images
			*******************************/
			$q = "SELECT * FROM "
					.CONS::$tname_IFM11
					
					." "
					."WHERE date_added > '$range_Start'"
					." "
					."AND"
					." "
					."date_added < '$range_End'"
// 					."WHERE date_added < '$range_End'"

					." "
					//ref http://www.tutorialspoint.com/sqlite/sqlite_order_by.htm
					."ORDER BY"
					." "
					.$sort_ColName." ".$sort_Direction
					;
							
			debug("q => $q");
			
			$result = $file_db->query($q);
				
// 			/*******************************
// 				report
// 			*******************************/
// 			$count = 0;
			
// // 			foreach ($result as $row) {
				
// // 				debug($row);
				
// // 				$count += 1;
				
// // 				if ($count > 2) {
					
// // 					break;
					
// // 				}//$count > 5
				
// // 			}
			
			/*******************************
				pdo => reset
			*******************************/
			$file_db = null;
			
			/*******************************
				return
			*******************************/
			return array($result, $cnt_Images);
			
// 			return $result;
// 			return null;
					
		}//find_All_Images_From_CSV__DateRange

		/*******************************
		 * @param $range_Start,End not including
			@return array($result, $cnt_Images)<br>
			null	=> data folder => not exist<br>
		*******************************/
		public static function
		find_All_Images__DateRange
		($sort_ColName = "_id", $sort_Direction = "ASC",
// 			$limit = "50", 
			$range_Start = "2015/10/01 00:00:00.000",
			$range_End = "2015/10/10 00:00:00.000"
			) {
// 			$limit = "50", $range_Start = "2015/10/01 00:00:00.000") {
			
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
				
// 				debug("data folder => exists: $fpath");
				
			}
				
			/*******************************
			 get: the latest db file
			*******************************/
			$fname = Utils::get_Latest_File__By_FileName($fpath);

			/*******************************
				valid: file exists
			*******************************/
			if ($fname == null) {
				
				debug("Utils::get_Latest_File__By_FileName => returned null");
				
				return null;
				
			}//$fname == null
			
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
				
//				debug("pdo => created");
				
			}
				
			// Set errormode to exceptions
			$file_db->setAttribute(PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEPTION);

			/*******************************
				prep: range data: Start
			*******************************/
			$tmp = Utils::get_Admin_Value(CONS::$adminData_Image_data_Range_Start, "val1");
			
			debug("val1 => $tmp");
			
			if ($tmp != null) {
				
				$range_Start = $tmp
				;
			}//$tmp != null

			/*******************************
				prep: range data: End
			*******************************/
			$tmp = Utils::get_Admin_Value(CONS::$adminData_Image_data_Range_End, "val1");
			
			debug("End => $tmp");
			
			if ($tmp != null) {
				
				$range_End = $tmp;
				
			}//$tmp != null
			
			/*******************************
				get: db infos
			*******************************/
			//ref http://stackoverflow.com/questions/669092/sqlite-getting-number-of-rows-in-a-database answered Mar 21 '09 at 10:37
			$query = "SELECT Count(*) FROM "
						.CONS::$tname_IFM11
						." "
						."WHERE date_added > '$range_Start'"
						." "
						."AND"
						." "
						."date_added < '$range_End'"
// 						."WHERE date_added < '$range_End'"
						;
			
//			debug("query => $query");
			
			$images = $file_db->query(
						$query
// 						"SELECT Count(*) FROM "
// 						.CONS::$tname_IFM11
// 						." "
// 						."WHERE date_added > '$range_Start'"
			
			);
// 			$images = $file_db->query("SELECT Count(*) FROM ".CONS::$tname_IFM11);
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
					
					." "
					."WHERE date_added > '$range_Start'"
					." "
					."AND"
					." "
					."date_added < '$range_End'"
// 					."WHERE date_added < '$range_End'"

					." "
					//ref http://www.tutorialspoint.com/sqlite/sqlite_order_by.htm
					."ORDER BY"
					." "
					.$sort_ColName." ".$sort_Direction
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
			return array($result, $cnt_Images);
// 			return $result;
// 			return null;
					
		}//find_All_Images

		/*******************************
		 * @param $range_Start,End not including
			@return array($result, $cnt_Images)<br>
			null	=> data folder => not exist<br>
		*******************************/
		public static function
		find_All_Images__DateRange__NoMemos
		($sort_ColName = "_id", $sort_Direction = "ASC",
// 			$limit = "50", 
			$range_Start = "2015/10/01 00:00:00.000",
			$range_End = "2015/10/10 00:00:00.000"
			) {
// 			$limit = "50", $range_Start = "2015/10/01 00:00:00.000") {
			
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
				
// 				debug("data folder => exists: $fpath");
				
			}
				
			/*******************************
			 get: the latest db file
			*******************************/
			$fname = Utils::get_Latest_File__By_FileName($fpath);

			/*******************************
				valid: file exists
			*******************************/
			if ($fname == null) {
				
				debug("Utils::get_Latest_File__By_FileName => returned null");
				
				return null;
				
			}//$fname == null
			
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
				
//				debug("pdo => created");
				
			}
				
			// Set errormode to exceptions
			$file_db->setAttribute(PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEPTION);

			/*******************************
				prep: range data: Start
			*******************************/
			$tmp = Utils::get_Admin_Value(CONS::$adminData_Image_data_Range_Start, "val1");
			
			debug("val1 => $tmp");
			
			if ($tmp != null) {
				
				$range_Start = $tmp
				;
			}//$tmp != null

			/*******************************
				prep: range data: End
			*******************************/
			$tmp = Utils::get_Admin_Value(CONS::$adminData_Image_data_Range_End, "val1");
			
			debug("End => $tmp");
			
			if ($tmp != null) {
				
				$range_End = $tmp;
				
			}//$tmp != null
			
			/*******************************
				get: db infos
			*******************************/
			//ref http://stackoverflow.com/questions/669092/sqlite-getting-number-of-rows-in-a-database answered Mar 21 '09 at 10:37
			$query = "SELECT Count(*) FROM "
						.CONS::$tname_IFM11
						." "
						."WHERE date_added > '$range_Start'"
						." "
						."AND"
						." "
						."date_added < '$range_End'"
						." "
						."AND"
						." "
// 						."memos = ''"
// 						." "
// 						."OR"
// 						." "
// 						."memos = 'null'"
// 						." "
// 						."OR"
// 						." "
						."memos = 'NULL'"
// 						."WHERE date_added < '$range_End'"
						;
			
//			debug("query => $query");
			
			$images = $file_db->query(
						$query
// 						"SELECT Count(*) FROM "
// 						.CONS::$tname_IFM11
// 						." "
// 						."WHERE date_added > '$range_Start'"
			
			);
// 			$images = $file_db->query("SELECT Count(*) FROM ".CONS::$tname_IFM11);
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
					
					." "
					."WHERE date_added > '$range_Start'"
					." "
					."AND"
					." "
					."date_added < '$range_End'"
// 					."WHERE date_added < '$range_End'"

					." "
							."AND"
							." "
// 					."memos = ''"
// 					."memos = 'null'"
// 					."memos = 'NULL'"
// 					."memos = NULL"
					."memos is null"
							
					." "
					//ref http://www.tutorialspoint.com/sqlite/sqlite_order_by.htm
					."ORDER BY"
					." "
					.$sort_ColName." ".$sort_Direction
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
			return array($result, $cnt_Images);
// 			return $result;
// 			return null;
					
		}//find_All_Images__DateRange__NoMemos

		/*******************************
		 * @param $range_Start,End not including
			@return array($result, $cnt_Images)<br>
			null	=> data folder => not exist<br>
		*******************************/
		public static function
		find_All_Images__Range_By_FileName
		($sort_ColName = "_id", $sort_Direction = "ASC",
// 			$limit = "50", 
			$range_Start = "2015/10/01 00:00:00.000",
			$range_End = "2015/10/10 00:00:00.000"
			) {
// 			$limit = "50", $range_Start = "2015/10/01 00:00:00.000") {
			
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
				
// 				debug("data folder => exists: $fpath");
				
			}
				
			/*******************************
			 get: the latest db file
			*******************************/
			$fname = Utils::get_Latest_File__By_FileName($fpath);

			/*******************************
				valid: file exists
			*******************************/
			if ($fname == null) {
				
				debug("Utils::get_Latest_File__By_FileName => returned null");
				
				return null;
				
			}//$fname == null
			
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
				
//				debug("pdo => created");
				
			}
				
			// Set errormode to exceptions
			$file_db->setAttribute(PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEPTION);

// 			/*******************************
// 				prep: range data: Start
// 			*******************************/
// 			$tmp = Utils::get_Admin_Value(CONS::$adminData_Image_data_Range_Start, "val1");
			
// 			debug("val1 => $tmp");
			
// 			if ($tmp != null) {
				
// 				$range_Start = $tmp
// 				;
// 			}//$tmp != null

// 			/*******************************
// 				prep: range data: End
// 			*******************************/
// 			$tmp = Utils::get_Admin_Value(CONS::$adminData_Image_data_Range_End, "val1");
			
// 			debug("End => $tmp");
			
// 			if ($tmp != null) {
				
// 				$range_End = $tmp;
				
// 			}//$tmp != null
			
			/*******************************
				get: db infos
			*******************************/
			$target_ColName = "file_name";
			
			//ref http://stackoverflow.com/questions/669092/sqlite-getting-number-of-rows-in-a-database answered Mar 21 '09 at 10:37
			$query = "SELECT Count(*) FROM "
						.CONS::$tname_IFM11
						." "
						."WHERE $target_ColName > '$range_Start'"
// 						."WHERE date_added > '$range_Start'"
						." "
						."AND"
						." "
						."$target_ColName < '$range_End'"
// 						."date_added < '$range_End'"
// 						."WHERE date_added < '$range_End'"
						;
			
//			debug("query => $query");
			
			$images = $file_db->query(
						$query
// 						"SELECT Count(*) FROM "
// 						.CONS::$tname_IFM11
// 						." "
// 						."WHERE date_added > '$range_Start'"
			
			);
// 			$images = $file_db->query("SELECT Count(*) FROM ".CONS::$tname_IFM11);
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
					
					." "
					."WHERE $target_ColName > '$range_Start'"
// 					."WHERE date_added > '$range_Start'"
					." "
					."AND"
					." "
					."$target_ColName < '$range_End'"
// 					."date_added < '$range_End'"
// 					."WHERE date_added < '$range_End'"

					." "
					//ref http://www.tutorialspoint.com/sqlite/sqlite_order_by.htm
					."ORDER BY"
					." "
					.$sort_ColName." ".$sort_Direction
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
			return array($result, $cnt_Images);
// 			return $result;
// 			return null;
					
		}//find_All_Images

		/*******************************
			@return array($result, $cnt_Images)<br>
			@param $sort_ColName
		*******************************/
		public static function
		find_All_Images__WhereArgs
		($sort_ColName = "_id", $sort_Direction = "ASC",
// 			$limit = "50", 
			$whereArgs
			) {
// 			$limit = "50", $range_Start = "2015/10/01 00:00:00.000") {
			
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
				
// 				debug("data folder => exists: $fpath");
				
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
				
//				debug("pdo => created");
				
			}
				
			// Set errormode to exceptions
			$file_db->setAttribute(PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEPTION);

			/*******************************
				get: db infos
			*******************************/
			//ref http://stackoverflow.com/questions/669092/sqlite-getting-number-of-rows-in-a-database answered Mar 21 '09 at 10:37
			$query = "SELECT Count(*) FROM "
						.CONS::$tname_IFM11
						
						." "
						.$whereArgs
// 						."WHERE date_added > '$range_Start'"
// 						." "
// 						."AND"
// 						." "
// 						."date_added < '$range_End'"
// // 						."WHERE date_added < '$range_End'"
						;
			
//			debug("query => $query");
			
			$images = $file_db->query(
						$query
// 						"SELECT Count(*) FROM "
// 						.CONS::$tname_IFM11
// 						." "
// 						."WHERE date_added > '$range_Start'"
			
			);
// 			$images = $file_db->query("SELECT Count(*) FROM ".CONS::$tname_IFM11);
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
					
					." "
					.$whereArgs
// 					."WHERE date_added > '$range_Start'"
// 					." "
// 					."AND"
// 					." "
// 					."date_added < '$range_End'"
// // 					."WHERE date_added < '$range_End'"

					." "
					//ref http://www.tutorialspoint.com/sqlite/sqlite_order_by.htm
					."ORDER BY"
					." "
					.$sort_ColName." ".$sort_Direction
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
			return array($result, $cnt_Images);
// 			return $result;
// 			return null;
					
		}//find_All_Images__WhereArgs

		
		public static function
		find_All_Images__WhereArgs__FromFile
		($sort_ColName = "_id", $sort_Direction = "ASC",
// 			$limit = "50", 
			$whereArgs, $fpath
			) {
// 			$limit = "50", $range_Start = "2015/10/01 00:00:00.000") {
			
			//ref C:\WORKS\WS\Eclipse_Luna\Cake_TA2\app\Lib\utils\utils.php
			
			/*******************************
			 PDO file
			*******************************/
// 			$fpath = "";
				
// 			if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local) {
					
// 				$fpath .= "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\Lib\\data";
// // 				$fpath .= "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_TA2\\app\\Lib\\data";
					
// 			} else {
					
// 				$fpath .= "/home/users/2/chips.jp-benfranklin/web/cake_apps/Cake_IFM11/app/Lib/data";
// // 				$fpath .= "/cake_apps/Cake_IFM11/app/Lib/data";
// // 				$fpath .= "/home/users/2/chips.jp-benfranklin/web/android_app_data/IFM11";
					
// 			}//if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local)
					
			/*******************************
			 validate: db file exists
			*******************************/
			$res = file_exists($fpath);
			
			if ($res == false) {
			
				debug("file => not exist: $fpath");
				
				return null;
			
			} else {
				
				debug("file => exists: $fpath");
				
			}
				
// 			/*******************************
// 			 get: the latest db file
// 			*******************************/
// 			$fname = Utils::get_Latest_File__By_FileName($fpath);

// 			$fpath .= DIRECTORY_SEPARATOR.$fname;
				
// 			debug("fpath => $fpath");
			
			/*******************************
			 pdo: setup
			*******************************/
			//REF http://www.if-not-true-then-false.com/2012/php-pdo-sqlite3-example/
			$file_db = new PDO("sqlite:$fpath");
				
			if ($file_db === null) {
					
				debug("pdo => null");
					
				return null;
					
			} else {
				
//				debug("pdo => created");
				
			}
				
			// Set errormode to exceptions
			$file_db->setAttribute(PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEPTION);

			/*******************************
				get: db infos
			*******************************/
			//ref http://stackoverflow.com/questions/669092/sqlite-getting-number-of-rows-in-a-database answered Mar 21 '09 at 10:37
			$query = "SELECT Count(*) FROM "
						.CONS::$tname_IFM11
						
						." "
						.$whereArgs
// 						."WHERE date_added > '$range_Start'"
// 						." "
// 						."AND"
// 						." "
// 						."date_added < '$range_End'"
// // 						."WHERE date_added < '$range_End'"
						;
			
//			debug("query => $query");
			
			$images = $file_db->query(
						$query
// 						"SELECT Count(*) FROM "
// 						.CONS::$tname_IFM11
// 						." "
// 						."WHERE date_added > '$range_Start'"
			
			);
// 			$images = $file_db->query("SELECT Count(*) FROM ".CONS::$tname_IFM11);
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
					
					." "
					.$whereArgs
// 					."WHERE date_added > '$range_Start'"
// 					." "
// 					."AND"
// 					." "
// 					."date_added < '$range_End'"
// // 					."WHERE date_added < '$range_End'"

					." "
					//ref http://www.tutorialspoint.com/sqlite/sqlite_order_by.htm
					."ORDER BY"
					." "
					.$sort_ColName." ".$sort_Direction
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
			return array($result, $cnt_Images);
// 			return $result;
// 			return null;
					
		}//find_All_Images__WhereArgs__FromFile
		

		
		public static function
		find_Image_ById($id) {
			
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
			
//				debug("data folder => not exist: $fpath");
				
				return null;
			
			} else {
				
// 				debug("data folder => exists: $fpath");
				
			}
				
			/*******************************
			 get: the latest db file
			*******************************/
			$fname = Utils::get_Latest_File__By_FileName($fpath);

			$fpath .= DIRECTORY_SEPARATOR.$fname;
				
//			debug("fpath => $fpath");
			
			/*******************************
			 pdo: setup
			*******************************/
			//REF http://www.if-not-true-then-false.com/2012/php-pdo-sqlite3-example/
			$file_db = new PDO("sqlite:$fpath");
				
			if ($file_db === null) {
					
				debug("pdo => null");
					
				return null;
					
			} else {
				
//				debug("pdo => created");
				
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
				
//			debug("cnt_Images => ".$cnt_Images);

			/*******************************
				get: images
			*******************************/
			$q = "SELECT * FROM "
					.CONS::$tname_IFM11
					." "
					."WHERE _id = $id";
					
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

// 					." "
// 					//ref http://www.tutorialspoint.com/sqlite/sqlite_order_by.htm
// 					."ORDER BY"
// 					." "
// 					.$sort_ColName." ".$sort_Direction
					
// 					." "
// 					."LIMIT"
// 					." "
// 					.$limit
// 					;
							
//			debug("q => $q");
			
			$result = $file_db->query($q);
				
// // 			$res_cnt = $file_db->query($q_cnt);
			
// 			//debug
// 			if ($result === true) {
					
// 				debug("result => true");
				
// 				debug("count => ".$result->columnCount());
					
// 			} else {
					
// 				debug("result => false");
			
// 				debug($result);
// 				debug(get_class($result));
				
// 				debug("count => ".$result->columnCount());
				
// 			}//if ($result === true)
					
			/*******************************
				valid: 1 entry?
			*******************************/
			$tmp = $file_db->query(
// 						"SELECT Count(*) FROM ".CONS::$tname_IFM11." WHERE _id > 10000");
						"SELECT Count(*) FROM ".CONS::$tname_IFM11." WHERE _id = $id");
			
			$len = $tmp->fetchColumn();
			
			if ($len != 1) {
				
				debug("entry => not 1");
				
				return null;
				
			}//$len != 1
			
// 			debug("len => $len");		//=> 'len => 440'
			
// 			/*******************************
// 				report
// 			*******************************/
// 			$count = 0;
			
// // 			foreach ($result as $row) {
				
// // 				debug($row);
				
// // 				$count += 1;
				
// // 				if ($count > 2) {
					
// // 					break;
					
// // 				}//$count > 5
				
// // 			}
			
			/*******************************
				pdo => reset
			*******************************/
			$file_db = null;
			
			/*******************************
				return
			*******************************/
			foreach ($result as $row) {
				
				return $row;
				
			}
// 			return $result;
// 			return null;
					
		}//find_Image_ById

		public static function
		find_Image_First_By__MYSQL
		($tname, $col_Name, $direction) {

			/*******************************
				model
			*******************************/
			$model = ClassRegistry::init('Image');
			
			$opt = array(
				
				"order"		=> 'local_created_at DESC'
					
			);
			
			$image = $model->find('first', $opt);
					
			
			return $image;
			
		}//find_Image_First_By__MYSQL

		public static function
		get_Latest_File__By_FileName($dpath) {
		
			/*******************************
			 dir list
			*******************************/
			//REF array_values http://stackoverflow.com/questions/7536961/reset-php-array-index Jeremy Banks♦
			//REF scan dir http://php.net/manual/en/function.scandir.php#107215
			$scanned_directory = array_values(array_diff(scandir($dpath), array('..', '.')));
			// 			$scanned_directory = array_diff(scandir($dpath), array('..', '.'));
				
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
			
// 			debug($scanned_directory);
			
			$tmp_fname = implode(
								DIRECTORY_SEPARATOR, 
								array($dpath, $scanned_directory[0])
						);
// 			$tmp_fname = $scanned_directory[0];
			
			$len_list = count($scanned_directory);
			
			for ($i = 1; $i < $len_list; $i++) {
				
// 				debug("\$tmp_fname[$i] => $tmp_fname");
				
				//ref http://php.net/manual/en/function.is-file.php
				if (is_dir($tmp_fname)) {
// 				if (is_file($tmp_fname)) {

// 					debug("is_dir => $tmp_fname");
// 					debug("is_file => $tmp_fname");

// 					debug("\$tmp_fname => $tmp_fname");
						
// 					$tmp_fname = $scanned_directory[$i];
					$tmp_fname = implode(
									DIRECTORY_SEPARATOR, 
									array($dpath, $scanned_directory[$i]));
						
// 					debug("\$tmp_fname is now => $tmp_fname");
					
// 					break;
					
				} else {//if (!is_file($tmp_fname))
					
// 					debug("not a dir => $tmp_fname");
// 					debug("\$tmp_fname => $tmp_fname");

					break;
// 					$tmp_fname = $scanned_directory[$i];
					
// 					debug("\$tmp_fname is now => $tmp_fname");

// 					debug(is_file($tmp_fname) ? "is a file" : "not a file");
					
				}//if (!is_file($tmp_fname))
				
			}
			
// 			debug("\$tmp_fname is now => $tmp_fname");
			
			if (!is_file($tmp_fname)) {
				
				debug("no file exists in: $dpath");
				
				return null;
				
			}//!is_file($tmp_fname)
			
			/*******************************
			 return
			*******************************/
// 			debug("basename(\$tmp_fname) => ".basename($tmp_fname));
			
			return basename($tmp_fname);
// 			return $tmp_fname;
				
		}//get_Latest_File__By_FileName($dpath)

		/*******************************
			@return
			true => update done<br>
			false => update not done
		*******************************/
		public static function
		update_Image($image) {
			
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
			
//				debug("data folder => not exist: $fpath");
				
				$msg = "db file => not exist: $fpath";
					
				write_Log(
						CONS::get_dPath_Log(),
						// 				$this->get_dPath_Log(),
						$msg,
						__FILE__,
						__LINE__
				);
					
				return false;
			
			} else {
				
//				debug("data folder => exists: $fpath");
				
			}
				
			/*******************************
			 get: the latest db file
			*******************************/
			$fname = Utils::get_Latest_File__By_FileName($fpath);

			$fpath .= DIRECTORY_SEPARATOR.$fname;
				
//			debug("fpath => $fpath");
			
			/*******************************
			 pdo: setup
			*******************************/
			//REF http://www.if-not-true-then-false.com/2012/php-pdo-sqlite3-example/
			$file_db = new PDO("sqlite:$fpath");
				
			if ($file_db === null) {
					
//				debug("pdo => null");

				$msg = "pdo => null";
					
				write_Log(
					CONS::get_dPath_Log(),
					$msg,
					__FILE__,
					__LINE__
				);
				
				return false;
					
			} else {
				
//				debug("pdo => created");
				
			}
				
			// Set errormode to exceptions
			$file_db->setAttribute(PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEPTION);

			/*******************************
				update
			*******************************/
			// new data
// 			$title = 'PHP Pattern';
// 			$author = 'Imanda';
// 			$id = 3;

			$id = $image['_id'];
			
			$memos = $image['memos'];

			$modified_at = Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]);
			
			//ref http://www.phpeveryday.com/articles/PDO-Insert-and-Update-Statement-Use-Prepared-Statement-P552.html
			// query
			$sql = "UPDATE "
					.CONS::$tname_IFM11
					." " 
			        ."SET memos=? "
			        		
			       	.", "
// 			       	." "
			        ."modified_at=? "
// 			        ."modified_at = ? "

					." "			        		
			        ."WHERE _id=?";
// 			        ."SET memos=? WHERE id=?";
// 			        ."SET memos=?
// 						WHERE id=?";
			
			$q = $file_db->prepare($sql);
// 			$q = $conn->prepare($sql);
			
			$result = $q->execute(array($memos, $modified_at, $id));
// 			$result = $q->execute(array($memos, $id));
			
// 			debug("execute result => ".$result);
			
// 			$q->execute(array($title,$author,$id));
			
			/*******************************
				pdo => reset
			*******************************/
			$file_db = null;

			/*******************************
				return
			*******************************/
			return true;
			
		}//update_Image($image)

		/*******************************
			@return<br>
			array(
				"total_data"<br>		
				"new_data_Success"<br>	
				"new_data_Failed"<br>	
					
				"existing_data_Success"<br>	
				"existing_data_Failed"<br>
			)
		*******************************/
		public static function
		add_ImageData_From_DB_File($images, $numOf_Images) {
// 		add_ImageData_From_DB_File() {

			$model = ClassRegistry::init('Image');

			$result = array(
				"total_data"		=> 0,
				"new_data_Success"	=> 0,
				"new_data_Failed"	=> 0,
					
				"existing_data_Success"	=> 0,
				"existing_data_Failed"	=> 0,
					
			);
			
			//debug
			$count = 0;
			
			$max = 10;
			
			foreach ($images as $img) {
			
// 				if ($count > $max) {
// // 				if ($count > 5) {
					
// 					break;
					
// 				}//$count 

				/*******************************
					judge: data already in the mysql table
				*******************************/
				$file_name = $img['file_name'];
				
				$res_B = Utils::isIn_DB_Image_Data_By_FileName($file_name);
				
// 				debug($img);
				
				if ($res_B == false) {	// new image data
				
					$tmp_B = Utils::add_ImageData_From_DB_File__NewData($model, $img);
// 					Utils::add_ImageData_From_DB_File__NewData($img);

					if ($tmp_B == true) {
					
						$result['new_data_Success'] += 1;
					
					} else {
					
						$result['new_data_Failed'] += 1;
						
					}//if ($tmp_B == true)
					
				} else {				// existing image data
				
// 					debug("is in DB => ".$img['file_name']);
					
					$tmp_B = Utils::add_ImageData_From_DB_File__UpdateData($model, $img);

					if ($tmp_B == true) {
							
						$result['existing_data_Success'] += 1;
							
					} else {
							
						$result['existing_data_Failed'] += 1;
					
					}//if ($tmp_B == true)
								
				}//if ($res_B == false)
				
				// count
				$count = $count + 1;
				
			}//foreach ($images as $img)
			
			$result['total_data'] = $count;

			/*******************************
				log
			*******************************/
// 			"total_data"		=> 0,
// 			"new_data_Success"	=> 0,
// 			"new_data_Failed"	=> 0,
				
// 			"existing_data_Success"	=> 0,
// 			"existing_data_Failed"	=> 0,
				
			//ref http://php.net/manual/en/function.serialize.php
// 			$msg = serialize($result);
			$msg = sprintf(
					"update: total = %d, "
					."new.success = %d, new.failed = %d"
					.", "
					."existing.success = %d, existing.failed = %d",
					$result['total_data'],
					$result['new_data_Success'], $result['new_data_Failed'],
					$result['existing_data_Success'], $result['existing_data_Failed']
					);
			
			Utils::write_Log(
			
						Utils::get_dPath_Log(),
// 						CONS::get_dPath_Log(),
						$msg,
						__FILE__,
						__LINE__
						
			);
			
			/*******************************
				return
			*******************************/
			return $result;
// 			return true;
			
		}//add_ImageData_From_DB_File

		/*******************************
			@return<br>
			array(
				"total_data"<br>		
				"new_data_Success"<br>	
				"new_data_Failed"<br>	
					
				"existing_data_Success"<br>	
				"existing_data_Failed"<br>
			)
		*******************************/
		public static function
		add_ImageData__MySQL_NotInCSV_2_CSV($images) {
// 		add_ImageData_From_DB_File() {

// 			$model = ClassRegistry::init('Image');

			$result = array(
				"total_data"		=> 0,
				"new_data_Success"	=> 0,
				"new_data_Failed"	=> 0,
					
				"existing_data_Success"	=> 0,
				"existing_data_Failed"	=> 0,
					
			);
			
			//debug
			$count = 0;
			
			$max = 10;
			
			foreach ($images as $img) {
			
// 				if ($count > $max) {
// // 				if ($count > 5) {
					
// 					break;
					
// 				}//$count 

				/*******************************
					judge: data already in the mysql table
				*******************************/
// 				$file_name = $img['file_name'];
				
// 				$res_B = Utils::isIn_DB_Image_Data_By_FileName($file_name);
				
// // 				debug($img);
				
// 				if ($res_B == false) {	// new image data
				
					$tmp_B = Utils::add_ImageData__MySQL_NotInCSV_2_CSV__NewData($img);
// 					$tmp_B = Utils::add_ImageData_From_DB_File__NewModel($model, $img);
// 					$tmp_B = Utils::add_ImageData_From_DB_File__NewData($model, $img);
// 					Utils::add_ImageData_From_DB_File__NewData($img);

					if ($tmp_B == true) {
					
						$result['new_data_Success'] += 1;
					
					} else {
					
						$result['new_data_Failed'] += 1;
						
					}//if ($tmp_B == true)
					
// 				} else {				// existing image data
				
// // 					debug("is in DB => ".$img['file_name']);
					
// 					$tmp_B = Utils::add_ImageData_From_DB_File__UpdateData($model, $img);

// 					if ($tmp_B == true) {
							
// 						$result['existing_data_Success'] += 1;
							
// 					} else {
							
// 						$result['existing_data_Failed'] += 1;
					
// 					}//if ($tmp_B == true)
								
// 				}//if ($res_B == false)
				
				// count
				$count = $count + 1;
				
			}//foreach ($images as $img)
			
			$result['total_data'] = $count;

			/*******************************
				log
			*******************************/
// 			"total_data"		=> 0,
// 			"new_data_Success"	=> 0,
// 			"new_data_Failed"	=> 0,
				
// 			"existing_data_Success"	=> 0,
// 			"existing_data_Failed"	=> 0,
				
			//ref http://php.net/manual/en/function.serialize.php
// 			$msg = serialize($result);
			$msg = sprintf(
					"update: total = %d, "
					."new.success = %d, new.failed = %d"
					.", "
					."existing.success = %d, existing.failed = %d",
					$result['total_data'],
					$result['new_data_Success'], $result['new_data_Failed'],
					$result['existing_data_Success'], $result['existing_data_Failed']
					);
			
// 			debug($msg);
			
			Utils::write_Log(
			
						Utils::get_dPath_Log(),
// 						CONS::get_dPath_Log(),
						$msg,
						__FILE__,
						__LINE__
						
			);
			
			/*******************************
				return
			*******************************/
			return $result;
// 			return true;
			
		}//add_ImageData__MySQL_NotInCSV_2_CSV

		/*******************************
			@return<br>
			true	=> data saved<br>
			false	=> data NOT saved<br>
		*******************************/
		public static function
		add_ImageData_From_DB_File__NewData($model, $img) {

			$model->create();
			// 				$model->create();
			
			// 			$this->request->data['Image']['created_at'] =
			// 				Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]);
				
			// 			$this->request->data['Image']['updated_at'] =
			// 				Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]);
			
			$tmp = Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]);
			
			$model->set("created_at", $tmp);
				
			$model->set("updated_at", $tmp);
			
			$model->set("local_id", $img['_id']);
			
			$model->set("local_created_at", $img['created_at']);
				
			$model->set("local_modified_at", $img['modified_at']);
			
			$model->set("file_id", $img['file_id']);
			
			$model->set("file_path", $img['file_path']);
				
			$model->set("file_name", $img['file_name']);
				
			$model->set("local_date_added", $img['date_added']);
				
			$model->set("local_date_modified", $img['date_modified']);
				
			$model->set("memos", $img['memos']);
				
			$model->set("tags", $img['tags']);
				
			$model->set("local_last_viewed_at", $img['last_viewed_at']);
				
			$model->set("table_name", $img['table_name']);
	
			if ($model->save()) {

				debug("image => saved: ".$img['file_name']);

				return true;
				
			} else {

				debug("image => NOT saved: ".$img['file_name']);

				return false;
				
			}
					
		}//add_ImageData_From_DB_File__NewData($img)
		
		/*******************************
		 * @param $model	Image<br>
		 * @param $img		$img['Image'][***]<br>
			@return<br>
			true	=> data saved<br>
			false	=> data NOT saved<br>
		*******************************/
		public static function
		add_ImageData__MySQL_NotInCSV_2_CSV__NewData($img) {
// 		add_ImageData__MySQL_NotInCSV_2_CSV__NewModel($model, $img) {
// 		add_ImageData_From_DB_File__NewModel($model, $img) {

// 			/*******************************
// 				model
// 			*******************************/
// 			$model->create();

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
			
				return false;
// 				return null;
					
			} else {
			
				debug("data folder => exists: $fpath");
			
			}
			
			/*******************************
			 get: the latest db file
			*******************************/
			$fname = Utils::get_Latest_File__By_FileName($fpath);
			
			/*******************************
			 valid: file exists
			*******************************/
			if ($fname == null) {
					
				debug("Utils::get_Latest_File__By_FileName => returned null");
					
				return false;
// 				return null;
					
			}//$fname == null
				
			$fpath .= DIRECTORY_SEPARATOR.$fname;
			
			debug("fpath => $fpath");
				
			/*******************************
			 pdo: setup
			*******************************/
			//REF http://www.if-not-true-then-false.com/2012/php-pdo-sqlite3-example/
			$file_db = new PDO("sqlite:$fpath");
			
			if ($file_db === null) {
					
				debug("pdo => null");
					
				return false;
// 				return null;
					
			} else {
			
				debug("pdo => created");
			
			}
			
			// Set errormode to exceptions
			$file_db->setAttribute(PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEPTION);

			/*******************************
				prep: data for insertion
			*******************************/
			$sql = "INSERT INTO ifm11 ("
						."created_at, modified_at, date_added, "
						."file_id, file_path, file_name"
						.") "
					."VALUES ("
						."?, ?, ?, "
						."?, ?, ?"
						.")";
			
			$time = Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]);
			
			$data = array(
				
					$time,		// created_at
					$time,		// modified_at
					$time,		// date_added
					$img['Image']['file_id'],		// file_id
					$img['Image']['file_path'],		// file_path
					$img['Image']['file_name'],		// file_name
					
			);
			
			/*******************************
				insert data
			*******************************/
			//ref http://stackoverflow.com/questions/1176122/how-do-i-insert-into-pdo-sqllite3 answered Jul 24 '09 at 7:14
			$qry = $file_db->prepare($sql);
// 			$qry = $file_db->prepare(
// 			$qry = $db->prepare(
// 					'INSERT INTO ifm11 (file_name) VALUES (?)');
// 					'INSERT INTO twocents (path, name, message) VALUES (?, ?, ?)');
			
			//ref http://php.net/manual/en/pdostatement.execute.php
			$res = $qry->execute($data);
// 			$res = $qry->execute(array($img['Image']['file_name']));
// 			$qry->execute(array($path, $name, $message));

			//debug
			if ($res === true) {
			
				debug("execute => true: ".$img['Image']['file_name']);
			
			} else {
			
				debug("execute => false: ".$img['Image']['file_name']);
				
			}//if ($res === true)
			
			
			
			/*******************************
			 pdo => reset
			*******************************/
			$file_db = null;
												
			/*******************************
				set values
			*******************************/
			$tmp = Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]);

// 			$model->set("created_at", $tmp);
				
// 			$model->set("updated_at", $tmp);
			
// 			$model->set("local_id", $img['Image']['_id']);
			
// 			$model->set("local_created_at", $img['Image']['created_at']);
				
// 			$model->set("local_modified_at", $img['Image']['modified_at']);
			
// 			$model->set("file_id", $img['Image']['file_id']);
			
// 			$model->set("file_path", $img['Image']['file_path']);
				
// 			$model->set("file_name", $img['Image']['file_name']);
				
// 			$model->set("local_date_added", $img['Image']['date_added']);
				
// 			$model->set("local_date_modified", $img['Image']['date_modified']);
				
// 			$model->set("memos", $img['Image']['memos']);
				
// 			$model->set("tags", $img['Image']['tags']);
				
// 			$model->set("local_last_viewed_at", $img['Image']['last_viewed_at']);
				
// 			$model->set("table_name", $img['Image']['table_name']);
	
			//test
			return false;
			
// 			if ($model->save()) {

// 				debug("image => saved: ".$img['file_name']);

// 				return true;
				
// 			} else {

// 				debug("image => NOT saved: ".$img['file_name']);

// 				return false;
				
// 			}
					
		}//add_ImageData__MySQL_NotInCSV_2_CSV__NewData
		
		/*******************************
			$img	=> data from local sqlite file<br>
			$image	=> data from remote mysql db<br>
			compare	=> $image['Image']['updated_at'], $img['modified_at']
				--> if $image update is later than $img update<br>
					i.e. if the remote data is more update than the local
						=> not updating<br>
		*******************************/
		public static function
		add_ImageData_From_DB_File__UpdateData($model, $img) {

			$file_name = $img['file_name'];
			
			$model = ClassRegistry::init('Image');
				
			$opt = array(
			
					"conditions"	=> "file_name = '$file_name'"
					// 				"conditions"	=> "file_name = $file_name"
						
			);
				
			$image = $model->find('first', $opt);
			
			/*******************************
				valid: local data --> newer
			*******************************/
			if ($image['Image']['updated_at'] > $img['modified_at']) {
				
// 				debug("local => not newer: ".$img['file_name']);
				
				return false;
				
			}//$image['Image']['']
			
// 			debug($image);
			
			$model->create();
			
			$model->id = $image['Image']['id'];
// 			$model->id = $image['id'];
// 			$model->id = $img['id'];
			
			$data = array(
				
					'Image'
					
			);
			
			$tmp = Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]);
			
			$data['Image']['created_at'] = $image['Image']['created_at'];
// 			$data['Image']['created_at'] = $tmp;
			$data['Image']['updated_at'] = $tmp;
			
			$data['Image']['memos'] = $img['memos'];
			
			if ($model->save($data)) {
// 			if ($model->save()) {

// 				debug("image => updated: ".$img['file_name']);

				return true;
				
			} else {

// 				debug("image => NOT updated: ".$img['file_name']);

				return false;
				
			}
					
		}//add_ImageData_From_DB_File__UpdateData
		
		/*******************************
			judge if the image data is in the mysql db table<br>
			@return
			true	=> 'find' command returned 1 image data<br>
			false	=> other than returned 1
		*******************************/
		public static function
		isIn_DB_Image_Data_By_FileName($file_name) {

			$model = ClassRegistry::init('Image');
			
			$opt = array(
				
				"conditions"	=> "file_name = '$file_name'"
// 				"conditions"	=> "file_name = $file_name"
					
			);
			
			$image = $model->find('first', $opt);
			
// 			debug($image);
			
// 			debug(count($image));
			
			/*******************************
				return
			*******************************/
			$len = count($image);
			
			if ($len == 1) {
			
				return true;
			
			} else {
			
				return false;
				
			}//if ($len == 1)
			
			
			
		}//isIn_DB_Image_Data_By_FileName
		
		/*******************************
			@return
			null => if no entry in the admins table, and others
		*******************************/
		public static function
		get_Admin_Value
		($key, $val_1) {
		
			// 			$this->loadModel('Admin');
		
			//REF http://stackoverflow.com/questions/2802677/what-are-the-possible-reasons-for-appimport-not-working answered May 10 '10 at 13:18
			$model = ClassRegistry::init('Admin');
		
			$option = array(
		
					'conditions'	=> array(
							'Admin.name LIKE'	=> $key
					)
			);
		
			// 		$admin = $this->Admin->find('first');
			$admin = $model->find('first', $option);
			// 			$admin = $this->Admin->find('first', $option);
		
			// 		debug($admin);
		
			if ($admin == null) {
					
				return null;
					
			} else if (!isset($admin['Admin'])) {
// 			} else if ($admin['Admin'] == null) {
				
				return  null;
				
				} else if (!isset($admin['Admin'][$val_1])) {
				
				return  null;
				
			} else {
					
				return @$admin['Admin'][$val_1];
		
			}//if ($admin == null)
				
				
				
				// 			return @$admin['Admin'][$val_1];
		
		}//get_Admin_Value

		/*******************************
		 * (1) "images.csv" is created from remote mysql db table<br>
		 * then put in ".../csv" dir<br>
		 * (2) This function then returns the array of the csv lines<br>
			@return
			null	=> fopen --> null returned
		*******************************/
		public static function
		get_CsvLines_Images_FromRemote
		($range_Start, $range_End) {
			
			/*******************************
			 file: path
			*******************************/
			$fpath = "";
			
			$fname = "images.csv";
			
			if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local) {
			
				$fpath .= "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_IFM11"
							."\\app\\Lib\\data"
							."\\csv"
							."\\$fname";
// 				$fpath .= "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\Lib\\data\\$fname";
			
			} else {
			
				$fpath .= "/home/users/2/chips.jp-benfranklin/web"
						."/cake_apps/Cake_IFM11/app/Lib/data"
						."/csv"
						."/$fname";
			
			}//if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local)
			
			/*******************************
			file: open
			*******************************/
			$csv_File = fopen($fpath, "r");
			// 		$csv_File = fopen($fpath_Csv, "r");
			
			// validate: null
			if ($csv_File == null) {
				
				debug("csv file => null");
					
				return null;
							
			}//$csv_File == null
			
			// 		debug("\$csv_File => ".($csv_File == null ? "null" : "NOT null"));
		
			/*******************************
			read lines
			*******************************/
			$csv_Lines = array();
		
			// 		for ($i = 0; $i < 3; $i++) {
		
			// 			fgetcsv($csv_File);
		
				// 		}
		
			//REF fgetcsv http://us3.php.net/manual/en/function.fgetcsv.php
			while ( ($data = fgetcsv($csv_File) ) !== FALSE ) {
	
				array_push($csv_Lines, $data);
	
			}
	
			debug("csv lines => ".count($csv_Lines));

// 			debug($csv_Lines[0]);

// 			debug($csv_Lines[0][4]);
			
// 			debug($csv_Lines[count($csv_Lines) - 1]);

// 			debug($csv_Lines[count($csv_Lines) - 1][4]);
			
			/*******************************
				filter: by range
			*******************************/
			$csv_Lines_Filtered = array();
			
			foreach ($csv_Lines as $line) {
			
				$name = $line[8];
				
				if ($name >= $range_Start 
						&& $name < $range_End) {
// 						&& $name <= $range_End) {
// 				if ($line[4] >= $range_Start 
// 						&& $line[5] <= $range_End) {

					array_push($csv_Lines_Filtered, $line);
					
				}//$line;
				
			}//foreach ($csv_Lines as $line)
			
// 			debug($csv_Lines_Filtered[0]);
			debug("\$csv_Lines_Filtered => ".count($csv_Lines_Filtered));
			
			/*******************************
				return
			*******************************/
// 			return $csv_Lines;
			return $csv_Lines_Filtered;
			
		}//get_CsvLines_Images_FromRemote

		public static function
		get_Remote_ImageList($range_Start, $range_End) {
			
			$dpath = "/home/users/2/chips.jp-benfranklin/web"
					."/cake_apps/images/ifm11";
			
// 			$f = fopen($dpath);
			$scanned_directory = array_values(array_diff(scandir($dpath), array('..', '.')));
			
			debug("images dir => ".count($scanned_directory));
			
			/*******************************
				filter: by range
			*******************************/
			$list_Filtered = array();
			
			foreach ($scanned_directory as $line) {
// 			foreach ($csv_Lines as $line) {
			
				$name = $line;
// 				$name = $line[8];
				
				if ($name >= $range_Start 
						&& $name < $range_End) {
// 						&& $name <= $range_End) {
// 				if ($line[4] >= $range_Start 
// 						&& $line[5] <= $range_End) {

					array_push($list_Filtered, $line);
					
				}//$line;
				
			}//foreach ($csv_Lines as $line)
						
			return $list_Filtered;
// 			return $scanned_directory;
			
		}//get_Remote_ImageList

		/*******************************
			"2015/09/30 00:00:00.000" => ""2015-09-30_00-00-00.000""
		*******************************/
		public static function
		conv_TimeLabel_Standard_2_FileNameFormat
		($fname_orig) {
			
			$tokens = explode(" ", $fname_orig);
			
			$tokens_Date = explode("/", $tokens[0]);
			$tokens_Time = explode(".", $tokens[1]);
			$tokens_Time_Sec = explode(":", $tokens_Time[0]);
			
// 			debug($tokens_Time);
			
			$label_Date = implode("-", $tokens_Date);
			
			$label_Time_Sec = implode("-", $tokens_Time_Sec);
			
// 			debug("\$label_Date => $label_Date || \$label_Time_Sec => $label_Time_Sec");
			
			$label_Full = $label_Date."_$label_Time_Sec"."_".$tokens_Time[1];
			
// 			debug($label_Full);

			return $label_Full;
			
		}//conv_TimeLabel_Standard_2_FileNameFormat($fname_orig)
		
	}//class Utils
	