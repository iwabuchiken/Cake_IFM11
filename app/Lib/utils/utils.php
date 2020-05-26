<?php

require_once 'cons.php';
	
class Utils {

	static $listOf_EQ_Lables = array(
			
			"time_Occurred" => 0,		// 0
			"time_Announced" => 1,		// 1
			"epicenter" => 2,			// 2
			
			"magnitude" => 3,			// 3
			"max_Intensity" => 4,		// 4
			// 			'td' => array(
			// 					(int) 0 => '2017年9月28日 16時11分ごろ',
			// 					(int) 1 => '2017年9月28日 16時15分',
			// 					(int) 2 => '福島県沖',
			// 					(int) 3 => '4.9',
			// 					(int) 4 => '3'
			// 			),
			
	);
	
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

	/********************
	* write_Log__Simple
	* at : 2020/05/26 08:20:58
	* caller
	* 		
	* @return
	********************/
	public static function
	write_Log__Simple($dpath, $fname, $text, $file, $line) {
// 	write_Log__Simple($dpath, $text, $file, $line) {
	
		$max_LineNum = CONS::$logFile_maxLineNum;
	
		$path_LogFile = join(
				//ref https://stackoverflow.com/questions/26881333/when-to-use-directory-separator-in-php-code
				DIRECTORY_SEPARATOR,
// 				DS,
				array($dpath, $fname));
// 				array($dpath, CONS::$fname_Log));
		// 					array($dpath, "log.txt"));
	
		//debug
		$msg_tmp = "[" . basename(__FILE__) . ":" . __LINE__ . "]";
		$msg_tmp .= " "
					. "\$path_LogFile => $path_LogFile";
		
		echo $msg_tmp;
		
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
	
// 		/****************************************
// 		 * File => longer than the max num?
// 			****************************************/
// 		//REF read content http://www.php.net/manual/en/function.file.php
// 		$lines = file($path_LogFile);
	
// 		$file_Length = count($lines);
	
// 		$log_File = null;
	
// 		if ($file_Length > $max_LineNum) {
	
// 			$dname = dirname($path_LogFile);
				
// 			$fname = null;
				
// 			if (Utils::get_HostName() == "localhost") {
	
// 				$fname = CONS::$fname_Log_trunk
// 				.CONS::$fname_Log_Suffix_Local
// 				."_".Utils::get_CurrentTime2(
// 						CONS::$timeLabelTypes['serial'])
// 						.CONS::$fname_Log_ext;
	
// 			} else {
	
// 				$fname = CONS::$fname_Log_trunk
// 				.CONS::$fname_Log_Suffix_Remote
// 				."_".Utils::get_CurrentTime2(
// 						CONS::$timeLabelTypes['serial'])
// 						.CONS::$fname_Log_ext;
	
// 			}
	
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
	
// 			$res = rename($path_LogFile, $new_name);
	
// 		} else {
	
// 		}
	
// 		/******************************
	
// 		modify: file name
	
// 		******************************/
// 		$tmp = strpos(strtolower($file), "c");
	
// 		if ($tmp == 0) {
				
// 			$file = str_replace(ROOT, "", $file);
				
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
	
		$time = Utils::get_CurrentTime();
	
		// 		$full_Text = "[$time : $file : $line] %% $text"."\n";
		$full_Text = "[$time : $file : $line] $text"."\n";
	
		$res = fwrite($log_File, $full_Text);
	
		/****************************************
		 * File: Close
		****************************************/
		fclose($log_File);
			
	}//write_Log__Simple($dpath, $text, $file, $line)
	
	
	
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
// 	write_Log__Fx_Admin($dpath_Log, $fname_Log, $text, $fname_Working, $line) {
	write_Log__Fx_Admin
	(
			$dpath_Log, $fname_Log, $text
			, $fname_Working, $line
			, $flg_Add_File_Line = true) {
	
		$max_LineNum = CONS::$logFile_maxLineNum;
	
		$path_LogFile = join(
				DS,
				array($dpath_Log, $fname_Log));
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
			
			if (Utils::get_HostName() == "localhost") {
				
				//_20200128_171830:tmp
				$fname = $fname_Log
							.".(".Utils::get_CurrentTime2(
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
		$tmp = strpos(strtolower($fname_Working), "c");
		
		if ($tmp == 0) {
			
			$fname_Working = str_replace(ROOT, "", $fname_Working);
			
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
	conv_Microtime_to_Float ($micro_time) {
		//_20200205_144001:caller
		//_20200205_144005:head
		//_20200205_144007:wl
		//ref https://stackoverflow.com/questions/16825240/how-to-convert-microtime-to-hhmmssuu
		list($usec, $sec) = explode(' ', $micro_time);
		
		//ref test_codes_20200205_144054 (FxTestController)
		$val_Usec = (float) $usec;
		$val_Sec = (int) $sec;
		
		return $val_Sec + $val_Usec;
		
	}//conv_Microtime_to_Float ($micro_time) {
		
	public static function
	conv_Microtime_to_TimeLabel ($micro_time) {
		//_20200205_141903:caller
		//_20200205_141906:head
		//_20200205_141910:wl
		
		list($usec, $sec) = explode(' ', $micro_time); //split the microtime on space
// 		list($usec, $sec) = explode(' ', microtime()); //split the microtime on space
		//with two tokens $usec and $sec
		
		$usec = str_replace("0.", ".", $usec);     //remove the leading '0.' from usec
		
		return date('Y/d/m H:i:s', $sec) . $usec;
		
	}//conv_Microtime_to_TimeLabel ($micro_time) {
	
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
	
	/********************
	* conv_Float_to_TimeLabel_2
	* 
	* at 2020/02/05 15:02:49
	* @return "2020/02/05 15:02:49.000"
	********************/
	public static function
	conv_Float_to_TimeLabel_2 ($float_time, $numOf_Digits = 4) {
		//_20200205_150055:caller
		//_20200205_150058:head
		//_20200205_150101:wl
		
		$int = floor($float_time);
		
		$float = $float_time - $int;
		
		$float_digits = explode(".", sprintf("%." . $numOf_Digits . "f", $float))[1];
// 		$float_digits = explode(".", sprintf("%.$numOf_Digitsf", $float))[1];
// 		$float_digits = explode(".", sprintf("%.4f", $float))[1];
		
		//ref https://stackoverflow.com/questions/12291195/trying-to-convert-from-seconds-to-date
		$time = date('Y/m/d H:i:s', floor($float_time)) . "." . $float_digits;
// 		$time = date('Y/m/d H:i:s', floor($float_time)) . "." . $float;
			
		return $time;
			
	}//conv_Float_to_TimeLabel ($float_time)
	
	public static function
	find_All_Images
	($sort_ColName = "_id", $sort_Direction = "ASC",
		$limit = "50") {
		
		//ref C:\WORKS\WS\Eclipse_Luna\Cake_TA2\app\Lib\utils\utils.php
		
		/*******************************
		 PDO file
		*******************************/
		$fpath = Utils::get_fpath();
				
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
		 validate: db file exists
		*******************************/
		$res = file_exists($fpath);
		
		if ($res == false) {
		
			debug("file => not exist: $fpath");
			
			return null;
		
		}
			
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
		$fpath = Utils::get_fpath();
				
		//debug
// 			debug("fpath => $fpath");
		
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
		debug("db file name => $fname");
		
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
		
// 			debug("val1 => $tmp");
		
		if ($tmp != null) {
			
			$range_Start = $tmp
			;
		}//$tmp != null

		/*******************************
			prep: range data: End
		*******************************/
		$tmp = Utils::get_Admin_Value(CONS::$adminData_Image_data_Range_End, "val1");
		
// 			debug("End => $tmp");
		
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
		
		debug("query => $query");

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
		
		//debug
// 			debug("query => done");
		
		//ref http://stackoverflow.com/questions/883365/row-count-with-pdo answered May 19 '09 at 15:16
		$cnt_Images = $images->fetchColumn();	//=> w
		// 			$cnt_Images = count($images);
			
// 			debug("cnt_Images => ".$cnt_Images);

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
	find_All_Images__From_MySQL__Range_By_FileName
	($sort_ColName = "_id", $sort_Direction = "ASC",
// 			$limit = "50", 
		$range_Start = "2015-08-01",
		$range_End = "2015-09-03"
		) {
// 			$limit = "50", $range_Start = "2015/10/01 00:00:00.000") {
		
		//ref C:\WORKS\WS\Eclipse_Luna\Cake_TA2\app\Lib\utils\utils.php
		$model = ClassRegistry::init('Image');
	
		$opt = array(
			
				'conditions' => array(
	
						'AND' => array(
					
								"Image.file_name >=" => $range_Start,
								
								"Image.file_name <=" => $range_End,
						)
				)
		);
		
		$listOf_Images_From_MySQL = $model->find('all', $opt);
// 			$listOf_Images_From_MySQL = $this->Image->find('all', $opt);
					
		/*******************************
			return
		*******************************/
		return $listOf_Images_From_MySQL;
// 			return $result;
// 			return null;
				
	}//find_All_Images__Range_By_FileName

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
		$fpath = Utils::get_fpath();

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
				//ref http://stackoverflow.com/questions/3620828/sqlite-select-where-empty answered Sep 1 '10 at 18:06
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
		$fpath = Utils::get_fpath();
			
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
	 * find records in sqlite 'bk' file
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
// 			$fpath = "";
		$fpath = Utils::get_fpath();
		
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
		//ccc
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
		
// 		foreach ($result as $row) {
		
// 			debug($row);
		
// 			$count += 1;
		
// // 			if ($count > 2) {
			
// // 				break;
			
// // 			}//$count > 5
		
// 		}

		debug("\$count => $count");
			
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
		$fpath = Utils::get_fpath();
				
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
		//REF array_values http://stackoverflow.com/questions/7536961/reset-php-array-index Jeremy Banks笙ｦ
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
	 * update => 'memos' column value of the image from csv file
		@return
		true => update done<br>
		false => update not done
	*******************************/
	public static function
	update_Image($image) {
		
		/*******************************
		 PDO file
		*******************************/
		$fpath = Utils::get_fpath();
				
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
	 * update => sqlite db file data
		@return
		true => update done<br>
		false => update not done
	*******************************/
	public static function
	update_AudioFile__SQLITE($af) {
		
		/*******************************
		 PDO file
		*******************************/
		$fpath = Utils::get_fpath();
		
		$dpath = $fpath.DIRECTORY_SEPARATOR."ta";
			
		/*******************************
		 validate: db file exists
		*******************************/
		$res = file_exists($dpath);
		
		if ($res == false) {
		
//				debug("data folder => not exist: $dpath");
			
			$msg = "db file => not exist: $dpath";
				
			write_Log(
					CONS::get_dPath_Log(),
					// 				$this->get_dPath_Log(),
					$msg,
					__FILE__,
					__LINE__
			);
				
			return false;
		
		} else {
			
//				debug("data folder => exists: $dpath");
			
		}
			
		/*******************************
		 get: the latest db file
		*******************************/
		$fname = Utils::get_Latest_File__By_FileName($dpath);
// 			$fname = Utils::get_Latest_File__By_FileName($fpath);

		$fpath = $dpath.DIRECTORY_SEPARATOR.$fname;
// 			$fpath .= DIRECTORY_SEPARATOR.$fname;
			
// 			debug("fpath => $fpath");
		
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

		$id = $af['_id'];
		
		$text = $af['text'];

		$modified_at = Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]);
		
		//ref http://www.phpeveryday.com/articles/PDO-Insert-and-Update-Statement-Use-Prepared-Statement-P552.html
		// query
		$sql = "UPDATE "
				.CONS::$tname_SQLITE_AudioFiles
// 					.CONS::$tname_IFM11
				." " 
		        ."SET text=? "
		        		
		       	.", "
// 			       	." "
		        ."modified_at=? "
// 			        ."modified_at = ? "

				." "			        		
// 			        ."WHERE id=?";
		        ."WHERE _id=?";
// 			        ."SET memos=? WHERE id=?";
// 			        ."SET memos=?
// 						WHERE id=?";
		
		$q = $file_db->prepare($sql);
// 			$q = $conn->prepare($sql);
		
		$result = $q->execute(array($text, $modified_at, $id));
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
		
	}//update_AudioFile__SQLITE

	/*******************************
	 * add csv records into the remote mysql table
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
			
			//debug
			if ($res_B == true) {
			
				debug("\$res_B => true : $file_name");
			
			} else {
			
				debug("\$res_B => false : $file_name");
				
			}//if ($res_B == true)
			
			
			
			
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
		$fpath = Utils::get_fpath();
			
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
											
		//test
		return false;
		
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
		$fpath = Utils::get_fpath();
// 			$fpath = "";
		
		$fname = "images.csv";
		
		$fpath .= DIRECTORY_SEPARATOR."csv".DIRECTORY_SEPARATOR.$fname;
		
		
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

	/*******************************
	 	@return an instance of Cake model Image
		@param<br> 
		listOf_Images --> array of CakePHP model Image instances<br>
	*******************************/
	public static function
	find_Image_From_ArrayOf_Images__By_FileName
	($file_Name, $listOf_Images) {
		
		foreach ($listOf_Images as $elem) {
		
			$name = $elem['Image']['file_name'];
			
			// if same name => return
			if ($file_Name == $name) {
				
				return $elem;
			}//$file_Name == $name
			
		}//foreach ($listOf_Images as $elem)
		
		// return default => null
		return null;
		
	}//find_Image_From_Array__By_FileName

	public static function
	find_AudioFiles__MySQL__Latest() {
		
		$af = ClassRegistry::init('AudioFile');
// 			$model = ClassRegistry::init('Image');
		
		$opt = array(
			
			"order"		=> 'created_at DESC'
				
		);
		
		return $af->find('first', $opt);
// 			$af_Latest = $af->find('first', $opt);
		
		
		
	}//find_AudioFiles__MySQL__Latest
	
	public static function
	find_AudioFiles__SQLITE__Latest() {
		
		$dpath_Src = Utils::get_fpath();
		
		$dpath_Src .= DIRECTORY_SEPARATOR."ta";
// 			$dpath_Src = "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\Lib\\data\\ta";
	// 		$dpath_Src = "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_IFM11\\Lib\\data\\ta";
	// 		$dpath_Src = "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_IFM11\\lib\\data\\csv";
	// 				$dpath_Src = "lib\\data\\csv";
	
		$fname_Src = Utils::get_Latest_File__By_FileName($dpath_Src);
	// 		$fname_Src = "images.csv";
	
		debug("\$fname_Src => ".$fname_Src);
		
		$fpath_Src = implode(DIRECTORY_SEPARATOR, array($dpath_Src, $fname_Src));
	
		debug("\$fpath_Src => ".$fpath_Src);
	
		/*******************************
		 pdo: setup
		*******************************/
		//REF http://www.if-not-true-then-false.com/2012/php-pdo-sqlite3-example/
		$file_db = new PDO("sqlite:$fpath_Src");
	// 		$file_db = new PDO("sqlite:$fpath");
			
		if ($file_db === null) {
		
			debug("pdo => null");
		
			return null;
		
		} else {
		
			// 			debug("pdo => created");
		
		}
			
		// Set errormode to exceptions
		$file_db->setAttribute(PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION);
		
		/*******************************
		 params
		*******************************/
		$sort_ColName = "_id";
		
		$sort_Direction = "DESC";
		
		/*******************************
		 build list: from CSV
		*******************************/
	// 		$where_Col = "file_name";
		
		$q = "SELECT * FROM ".CONS::$tname_SQLITE_AudioFiles
	// 		$q = "SELECT * FROM ".CONS::$tname_IFM11
	// 		." "."WHERE"." "
	// 				.$where_Col." ".">="." "."'$start'"
	// 				." "."AND"." "
	// 						.$where_Col." "."<="." "."'$end'"
	// 						." "."AND"." "
	// 								."memos is null"
			
										//ref http://www.tutorialspoint.com/sqlite/sqlite_order_by.htm
		." "."ORDER BY"." "
				.$sort_ColName." ".$sort_Direction
				;
					
		debug("q => $q");
		
		$result = $file_db->query($q);
		
		// 		debug(get_class($result));
	
	// 		foreach ($result as $elem) {
		
	// 			debug($elem);
	
	// 			break;
			
	// 		}//foreach ($result as $elem)
	
	// 		/*******************************
	// 			build: array of PDO elems
	// 		*******************************/
	// 		$arrayOf_AMs__SQLITE = array();
		
	// 		foreach ($result as $elem) {
		
	// 			array_push($arrayOf_AMs__SQLITE, $elem);
			
	// 		}//foreach ($result as $elem)
		
	// 		debug("\$arrayOf_AMs__SQLITE => ".count($arrayOf_AMs__SQLITE));
		
		/*******************************
		 get: num of images
		*******************************/
		$q_Count = "SELECT Count(*) FROM ".CONS::$tname_SQLITE_AudioFiles
	// 		$q_Count = "SELECT Count(*) FROM ".CONS::$tname_IFM11
	// 		." "."WHERE"." "
	// 				.$where_Col." ".">="." "."'$start'"
	// 				." "."AND"." "
	// 						.$where_Col." "."<="." "."'$end'"
	// 						." "."AND"." "
	// 								."memos is null"
										//ref http://www.tutorialspoint.com/sqlite/sqlite_order_by.htm
		." "."ORDER BY"." "
				.$sort_ColName." ".$sort_Direction
				;
		
				$result_Num = $file_db->query($q);
		
				$numOf_Images = $result_Num->fetchColumn();
		
		debug("\$q_Count => ".$q_Count);
		
		$result_Num = $file_db->query($q_Count);
		
		$numOf_AudioFiles = $result_Num->fetchColumn();
	// 		$numOf_Images = $result_Num->fetchColumn();
		
		debug("\$numOf_AudioFiles => ".$numOf_AudioFiles);
		
		/*******************************
		 pdo => reset
		*******************************/
		$file_db = null;
	
		/*******************************
			return
		*******************************/
		if ($numOf_AudioFiles > 0) {
		
			$am_First = null;
			
			foreach ($result as $elem) {
			
				$am_First = $elem;
				
				break;
				
			}//foreach ($result as $elem)
			
			return $am_First;
		
		} else {
		
			return null;
			
		}//if ($numOf_AudioFiles > 0)
		
		
		
	
	}//find_AudioFiles__SQLITE__Latest
	
	public static function
	find_AudioFile__SQLITE($id) {

		/*******************************
			dpath
		*******************************/
		$dpath_Src = Utils::get_fpath();
		
		$dpath_Src .= DIRECTORY_SEPARATOR."ta";
	
		$fname_Src = Utils::get_Latest_File__By_FileName($dpath_Src);
		
		$fpath_Src = implode(DIRECTORY_SEPARATOR, array($dpath_Src, $fname_Src));
	
		/*******************************
		 pdo: setup
		*******************************/
		//REF http://www.if-not-true-then-false.com/2012/php-pdo-sqlite3-example/
		$file_db = new PDO("sqlite:$fpath_Src");
			
		if ($file_db === null) {
		
			debug("pdo => null");
		
			return null;
		
		} else {
		
			// 			debug("pdo => created");
		
		}
			
		// Set errormode to exceptions
		$file_db->setAttribute(PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION);
		
		/*******************************
		 params
		*******************************/
		$sort_ColName = "_id";
		
		$sort_Direction = "DESC";

		/*******************************
		 get: num of images
		*******************************/
		$q_Count = "SELECT Count(*) FROM ".CONS::$tname_SQLITE_AudioFiles
		// 		$q_Count = "SELECT Count(*) FROM ".CONS::$tname_IFM11
		." "."WHERE"." "
				."_id = "
				.$id
					
				// 			." "."WHERE"." "
		// 				.$where_Col." ".">="." "."'$start'"
		// 				." "."AND"." "
		// 						.$where_Col." "."<="." "."'$end'"
		// 						." "."AND"." "
		// 								."memos is null"
		//ref http://www.tutorialspoint.com/sqlite/sqlite_order_by.htm
		." "."ORDER BY"." "
				.$sort_ColName." ".$sort_Direction
				;
					
// 					$result_Num = $file_db->query($q);
					
// 					$numOf_Images = $result_Num->fetchColumn();
					
// 					debug("\$q_Count => ".$q_Count);
					
				$result_Num = $file_db->query($q_Count);
					
				$numOf_AudioFiles = $result_Num->fetchColumn();
// 					// 		$numOf_Images = $result_Num->fetchColumn();
					
// 					debug("\$numOf_AudioFiles => ".$numOf_AudioFiles);
					
				
		/*******************************
			valid: any entry
		*******************************/
		if ($numOf_AudioFiles < 1) {
			
			/*******************************
			 pdo => reset
			*******************************/
			$file_db = null;

			// log
			$msg = "\$numOf_AudioFiles => < 1";
			
			write_Log(
				CONS::get_dPath_Log(),
				// 				$this->get_dPath_Log(),
				$msg,
				__FILE__,
				__LINE__);
			
			return null;
			
		}//$numOf_AudioFiles < 1
					
		/*******************************
		 build list: from CSV
		*******************************/
	// 		$where_Col = "file_name";
		
		$q = "SELECT * FROM ".CONS::$tname_SQLITE_AudioFiles
	// 		$q = "SELECT * FROM ".CONS::$tname_IFM11
		." "."WHERE"." "
				."_id = "
				.$id
				
	// 				.$where_Col." ".">="." "."'$start'"
	// 				." "."AND"." "
	// 						.$where_Col." "."<="." "."'$end'"
	// 						." "."AND"." "
	// 								."memos is null"
			
										//ref http://www.tutorialspoint.com/sqlite/sqlite_order_by.htm
		." "."ORDER BY"." "
				.$sort_ColName." ".$sort_Direction
				;
					
// 			debug("q => $q");
		
		$result = $file_db->query($q);
		
		// 		debug(get_class($result));
	

		/*******************************
			get: first instance
		*******************************/
		$af = null;
		
		foreach ($result as $elem) {
	
			$af = $elem;
// 				debug($elem);

			break;

		}//foreach ($result as $elem)
				
		
// 	// 		/*******************************
// 	// 			build: array of PDO elems
// 	// 		*******************************/
// 	// 		$arrayOf_AMs__SQLITE = array();
		
// 	// 		foreach ($result as $elem) {
		
// 	// 			array_push($arrayOf_AMs__SQLITE, $elem);
			
// 	// 		}//foreach ($result as $elem)
		
// 	// 		debug("\$arrayOf_AMs__SQLITE => ".count($arrayOf_AMs__SQLITE));
		
// 			/*******************************
// 			 get: num of images
// 			*******************************/
// 			$q_Count = "SELECT Count(*) FROM ".CONS::$tname_SQLITE_AudioFiles
// 	// 		$q_Count = "SELECT Count(*) FROM ".CONS::$tname_IFM11
// 			." "."WHERE"." "
// 				."_id = "
// 				.$id
		
// // 			." "."WHERE"." "
// 	// 				.$where_Col." ".">="." "."'$start'"
// 	// 				." "."AND"." "
// 	// 						.$where_Col." "."<="." "."'$end'"
// 	// 						." "."AND"." "
// 	// 								."memos is null"
// 											//ref http://www.tutorialspoint.com/sqlite/sqlite_order_by.htm
// 			." "."ORDER BY"." "
// 					.$sort_ColName." ".$sort_Direction
// 					;
		
// 					$result_Num = $file_db->query($q);
		
// 					$numOf_Images = $result_Num->fetchColumn();
		
// 			debug("\$q_Count => ".$q_Count);
		
// 			$result_Num = $file_db->query($q_Count);
		
// 			$numOf_AudioFiles = $result_Num->fetchColumn();
// 	// 		$numOf_Images = $result_Num->fetchColumn();
		
// 			debug("\$numOf_AudioFiles => ".$numOf_AudioFiles);
		
		/*******************************
		 pdo => reset
		*******************************/
		$file_db = null;
	
		/*******************************
			return
		*******************************/
		//test
// 			return null;

		return $af;
		
		
// 			if ($numOf_AudioFiles > 0) {
		
// 				$am_First = null;
			
// 				foreach ($result as $elem) {
			
// 					$am_First = $elem;
				
// 					break;
				
// 				}//foreach ($result as $elem)
			
// 				return $am_First;
		
// 			} else {
		
// 				return null;
			
// 			}//if ($numOf_AudioFiles > 0)
		
		
		
	
	}//find_AudioFiles__SQLITE__Latest
	
	public static function
	find_AudioFiles__SQLITE
	($sort_ColName = "_id", $sort_Direction = "DESC") {
		
		/*******************************
			get: dpath
		*******************************/
		$dpath_Src = Utils::get_fpath();
		
		$dpath_Src .= DIRECTORY_SEPARATOR."ta";
		
		$fname_Src = Utils::get_Latest_File__By_FileName($dpath_Src);
	
// 			debug("\$fname_Src => ".$fname_Src);
		
		$fpath_Src = implode(DIRECTORY_SEPARATOR, array($dpath_Src, $fname_Src));
	
		debug("\$fpath_Src => ".$fpath_Src);
	
		/*******************************
		 pdo: setup
		*******************************/
		//REF http://www.if-not-true-then-false.com/2012/php-pdo-sqlite3-example/
		$file_db = new PDO("sqlite:$fpath_Src");
			
		if ($file_db === null) {
		
			debug("pdo => null");
		
			return null;
		
		} else {
		
		}
			
		// Set errormode to exceptions
		$file_db->setAttribute(PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION);
		
		/*******************************
		 params
		*******************************/
// 			$sort_ColName = "_id";
		
// 			$sort_Direction = "DESC";
		
		/*******************************
		 build list: from CSV
		*******************************/
	// 		$where_Col = "file_name";
		
		$q = "SELECT * FROM ".CONS::$tname_SQLITE_AudioFiles
	// 		$q = "SELECT * FROM ".CONS::$tname_IFM11
	// 		." "."WHERE"." "
	// 				.$where_Col." ".">="." "."'$start'"
	// 				." "."AND"." "
	// 						.$where_Col." "."<="." "."'$end'"
	// 						." "."AND"." "
	// 								."memos is null"
			
										//ref http://www.tutorialspoint.com/sqlite/sqlite_order_by.htm
		." "."ORDER BY"." "
				.$sort_ColName." ".$sort_Direction
				;
					
// 			debug("q => $q");
		
		$result = $file_db->query($q);
		
		// 		debug(get_class($result));
	
	// 		foreach ($result as $elem) {
		
	// 			debug($elem);
	
	// 			break;
			
	// 		}//foreach ($result as $elem)
	
		/*******************************
		 get: num of images
		*******************************/
		$q_Count = "SELECT Count(*) FROM ".CONS::$tname_SQLITE_AudioFiles
	// 		$q_Count = "SELECT Count(*) FROM ".CONS::$tname_IFM11
	// 		." "."WHERE"." "
	// 				.$where_Col." ".">="." "."'$start'"
	// 				." "."AND"." "
	// 						.$where_Col." "."<="." "."'$end'"
	// 						." "."AND"." "
	// 								."memos is null"
										//ref http://www.tutorialspoint.com/sqlite/sqlite_order_by.htm
		." "."ORDER BY"." "
				.$sort_ColName." ".$sort_Direction
				;
		
				$result_Num = $file_db->query($q);
		
				$numOf_Images = $result_Num->fetchColumn();
		
// 			debug("\$q_Count => ".$q_Count);
		
		$result_Num = $file_db->query($q_Count);
		
		$numOf_AudioFiles = $result_Num->fetchColumn();
	// 		$numOf_Images = $result_Num->fetchColumn();
		
// 			debug("\$numOf_AudioFiles => ".$numOf_AudioFiles);
		
		/*******************************
		 pdo => reset
		*******************************/
		$file_db = null;
	
		/*******************************
			return
		*******************************/
		if ($numOf_AudioFiles > 0) {
		
			/*******************************
				build: array of PDO elems
			*******************************/
			$arrayOf_AMs__SQLITE = array();
			
			foreach ($result as $elem) {
			
				array_push($arrayOf_AMs__SQLITE, $elem);
				
			}//foreach ($result as $elem)
			
// 				debug("\$arrayOf_AMs__SQLITE => ".count($arrayOf_AMs__SQLITE));
		
			return $arrayOf_AMs__SQLITE;
						
		} else {
		
			return null;
			
		}//if ($numOf_AudioFiles > 0)
		
		
		
	
	}//find_AudioFiles__SQLITE

	/*******************************
		@return array of AudioFile models
	*******************************/
	public static function
	find_All_AudioFiles__CakeModel
	($sortColumn = "created_at", $direction = "DESC") {

		$af = ClassRegistry::init('AudioFile');
// 			$model = ClassRegistry::init('Image');
		
		$opt = array(
			
			"order"		=> "$sortColumn $direction"
// 				"order"		=> 'created_at DESC'
				
		);
		
		return $af->find('all', $opt);
// 			return $af->find('first', $opt);
// 			$af_Latest = $af->find('first', $opt);
		
		
	}//find_All_AudioFiles__CakeModel

	public static function
	insert_Data__AudioFile($instance) {
		
		$model = ClassRegistry::init('AudioFile');
		
		$model->create();
		
// 			created_at,
// 			updated_at,
		
// 			local_id,
// 			local_created_at,
// 			local_modified_at,
		
// 			text,
		
// 			file_name,
// 			dir,
		
// 			local_last_modified,
		
// 			audio_length,
			
		
		$tmp = Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]);
		
		$model->set("created_at", $tmp);
			
		$model->set("updated_at", $tmp);

		$model->set("local_id", $instance['_id']);
		$model->set("local_created_at", $instance['created_at']);
		$model->set("local_modified_at", $instance['modified_at']);
		
		$model->set("text", $instance['text']);
		$model->set("file_name", $instance['file_name']);
		$model->set("dir", $instance['dir']);
		
		$model->set("local_last_modified", $instance['last_modified']);

// 			$audio_Length = Utils::get_AudioLength($instance['file_name']);
		
		$model->set("audio_length", $instance['audio_length']);
// 			$model->set("audio_length", $instance['audio_length']);
		
		if ($model->save()) {

			debug("audio file => saved: ".$instance['file_name']);

			return true;
			
		} else {

			debug("audio file => NOT saved: ".$instance['file_name']);

			return false;
			
		}
		
		
	}//insert_Data__AudioFile

	public static function
	get_AudioLength($file_name) {
		
		/*******************************
			local server
		*******************************/
		if (Utils::get_HostName() == "localhost") {

			return Utils::get_AudioLength__LOCAL($file_name);
			
		} else {

			return -1;
// 				return get_AudioLength__REMOTE($file_name);
			
		}
		
		
	}//get_AudioLength

	public static function
	get_AudioLength__LOCAL($file_name) {		
		
		$dpath = "C:\\Users\\kbuchi\\Desktop\\data\\audios\\done";
		
		$fpath = implode(
							DIRECTORY_SEPARATOR, 
							array($dpath, $file_name)
					);
		
		// file exists
		if (file_exists($fpath) == true) {
// 			if (file_exists($fpath)) {
		
			$mp3file = new MP3File($fpath);
		
			return  $mp3file->getDuration();
// 				$duration2 = $mp3file->getDuration();
			
		} else {
		
			debug("audio file => NOT exists --> $fpath");
			
			return -1;
			
		}//if (file_exists($fpath))
		
	}//get_AudioLength__LOCAL
	
	/*
		@return
		path to "app/Lib/data"
	*/
	public static function
	get_fpath() {
		
		$fpath = "";
			
		if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local) {
			
			//ref http://stackoverflow.com/questions/15845928/determine-if-operating-system-is-mac answered Apr 6 '13 at 1:11
			$user_agent = getenv("HTTP_USER_AGENT");
			
			if (strpos($user_agent, "Win") !== FALSE) {
				
				$fpath .= "C:\\WORKS_2\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\Lib\\data";
				
			} else if (strpos($user_agent, "Mac") !== FALSE) {
				
				$fpath .= "/Users/mac/Desktop/works/WS/Cake_IFM11/app/Lib/data";
				
			} else {
				
			}
			
		} else {
				
			$fpath .= "/home/users/2/chips.jp-benfranklin/web/cake_apps/Cake_IFM11/app/Lib/data";
// 				$fpath .= "/cake_apps/Cake_IFM11/app/Lib/data";
// 				$fpath .= "/home/users/2/chips.jp-benfranklin/web/android_app_data/IFM11";
				
		}//if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local)
	
		return $fpath;
		
	}//get_fpath()
	
	/*
		@return
		path to "lib/data/sqlite"
	*/
	public static function
	get_dpath__lib() {
		
		$fpath = "";
			
		if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local) {
			
			//ref http://stackoverflow.com/questions/15845928/determine-if-operating-system-is-mac answered Apr 6 '13 at 1:11
			$user_agent = getenv("HTTP_USER_AGENT");
			
			if (strpos($user_agent, "Win") !== FALSE) {
				
				$fpath .= "C:\\WORKS_2\\WS\\Eclipse_Luna\\Cake_IFM11\\lib\\data\\sqlite";
// 					$fpath .= "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\Lib\\data";
				
			} else if (strpos($user_agent, "Mac") !== FALSE) {
				
				$fpath .= "/Users/mac/Desktop/works/WS/Cake_IFM11/lib/data/sqlite";
// 					$fpath .= "/Users/mac/Desktop/works/WS/Cake_IFM11/app/Lib/data";
				
			} else {
				
			}
			
		} else {
				
			$fpath .= "/home/users/2/chips.jp-benfranklin/web/cake_apps/Cake_IFM11/lib/data/sqlite";
// 				$fpath .= "/home/users/2/chips.jp-benfranklin/web/cake_apps/Cake_IFM11/app/Lib/data";
				
		}//if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local)
	
		return $fpath;
		
	}//get_fpath()
	
	/*
		@return
		path to "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_IFM11"
	*/
	public static function
	get_dpath__Project_Root() {
		
		$fpath = "";
			
		if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local) {
			
			//ref http://stackoverflow.com/questions/15845928/determine-if-operating-system-is-mac answered Apr 6 '13 at 1:11
			$user_agent = getenv("HTTP_USER_AGENT");
			
			if (strpos($user_agent, "Win") !== FALSE) {
				
				$fpath .= "C:\\WORKS_2\\WS\\Eclipse_Luna\\Cake_IFM11";
// 					$fpath .= "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\Lib\\data";
				
			} else if (strpos($user_agent, "Mac") !== FALSE) {
				
				$fpath .= "/Users/mac/Desktop/works/WS/Cake_IFM11";
// 					$fpath .= "/Users/mac/Desktop/works/WS/Cake_IFM11/app/Lib/data";
				
			} else {
				
			}
			
		} else {
				
			$fpath .= "/home/users/2/chips.jp-benfranklin/web/cake_apps/Cake_IFM11";
// 				$fpath .= "/home/users/2/chips.jp-benfranklin/web/cake_apps/Cake_IFM11/app/Lib/data";
				
		}//if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local)
	
		return $fpath;
		
	}//get_fpath()
	
	/*
		@return
		path to "C:\WORKS\WS\Eclipse_Luna\Cake_IFM11\app\Lib\data\csv\xcode_memos"
	*/
	public static function
	get_dpath__Realm_DB_Files() {
		
		$fpath = "";
			
		if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local) {
			
			//ref http://stackoverflow.com/questions/15845928/determine-if-operating-system-is-mac answered Apr 6 '13 at 1:11
			$user_agent = getenv("HTTP_USER_AGENT");
			
			if (strpos($user_agent, "Win") !== FALSE) {
				
				$fpath .= implode(
						DIRECTORY_SEPARATOR,
						array(
							"C:", "WORKS", "WS", "Eclipse_Luna", "Cake_IFM11",
							"app", "Lib", "data", "csv", "xcode_memos"
						)
				);
// 					$fpath .= "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_IFM11";
// 					$fpath .= "C:\\WORKS\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\Lib\\data";
				
			} else if (strpos($user_agent, "Mac") !== FALSE) {

				$fpath .= implode(
						DIRECTORY_SEPARATOR,
						array(
								"/Users", "mac", "Desktop", "works", "WS", "Cake_IFM11",
								"app", "Lib", "data", "csv", "xcode_memos"
						)
				);
					
// 					$fpath .= "/Users/mac/Desktop/works/WS/Cake_IFM11";
// 					$fpath .= "/Users/mac/Desktop/works/WS/Cake_IFM11/app/Lib/data";
				
			} else {
				
			}
			
		} else {

			$fpath .= implode(
					DIRECTORY_SEPARATOR,
					array(
							"/home", "users", "2", "chips.jp-benfranklin", 
									"web", "cake_apps", "Cake_IFM11",
							"app", "Lib", "data", "csv", "xcode_memos"
					)
			);
			
// 				$fpath .= "/home/users/2/chips.jp-benfranklin/web/cake_apps/Cake_IFM11";
// 				$fpath .= "/home/users/2/chips.jp-benfranklin/web/cake_apps/Cake_IFM11/app/Lib/data";
				
		}//if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local)
	
		return $fpath;
		
	}//get_fpath()
	
	// ref http://stackoverflow.com/questions/834303/startswith-and-endswith-functions-in-php answered May 6 '12 at 18:22
	static function startsWith($haystack, $needle) {
		// search backwards starting from haystack length characters from the end
		return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
	}
	static function endsWith($haystack, $needle) {
		// search forward starting from end minus needle length characters
		return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
	}
	
	static function find_All_Realm_DBFiles_Names($dpath_Data) {
		
// 			$dpath_Data = Utils::get_fpath();

		$dpath_DB = "$dpath_Data".DIRECTORY_SEPARATOR."csv".DIRECTORY_SEPARATOR."xcode_memos";

		debug("\$dpath_DB => ".$dpath_DB);
		
		$fname_Latest = Utils::get_Latest_File__By_FileName($dpath_DB);
		
		debug($fname_Latest);
		
		return $fname_Latest;
// 			return "$dpath_Data\\csv\\xcode_memos";
// 			return $dpath_Data;
// 			return "yes";
		
	}//find_All_Realm_DBFiles_Names()
	
	/*
	 * @param
	 * $fname_Realm_DBFile_Latest
	 * 		==> file name (NOT the file full path)
	 * @return
	 * 	array(Memo(),Memo(),Memo(),...)
	 * 
	 * ==> object(Memo) {
				name => 'Memo'
				r_id => '137'
				title => ':end :log 逅ｴ'
				body => '魑･縺ｮ繧医≧縺ｫ
			蜊�魑･縺ｮ譖ｲ'
				r_created_at => '2016/02/21 14:17:32'
				r_modified_at => '2016/02/21 14:17:59'
				[protected] _schema => null
	 */
	static function 
	find_All_Memos__From_CSV($fname_Realm_DBFile_Latest) {

// 			$model = ClassRegistry::init('Image');

		/*******************************
		file: open
		*******************************/
		$dpath_Data = Utils::get_fpath();
		
		$fpath_DB = "$dpath_Data"
					.DIRECTORY_SEPARATOR."csv"
					.DIRECTORY_SEPARATOR."xcode_memos"
					.DIRECTORY_SEPARATOR.$fname_Realm_DBFile_Latest
					;
			
		debug("\$fpath_DB => ".$fpath_DB);
					
		$csv_File = fopen($fpath_DB, "r");
// 			$csv_File = fopen($fpath, "r");
		// 		$csv_File = fopen($fpath_Csv, "r");
		
		// validate: null
		if ($csv_File == null) {
			
			debug("csv file => null ($fpath_DB)");
				
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

		// headers
		$data = fgetcsv($csv_File);	// header 1
		
		if ($data == FALSE) {

			debug("csv file => header 1 --> missing ($fpath_DB)");
				
			return null;
		
		}
		
		$data = fgetcsv($csv_File);	// header 2
		
		if ($data == FALSE) {

			debug("csv file => header 2 --> missing ($fpath_DB)");
				
			return null;
		
		}
		
		//REF fgetcsv http://us3.php.net/manual/en/function.fgetcsv.php
		while ( ($data = fgetcsv($csv_File) ) !== FALSE ) {
	
			array_push($csv_Lines, $data);
	
		}
	
// 			debug("csv lines => ".count($csv_Lines));

		// validate
		if (count($csv_Lines) < 1) {

			debug("csv line => no entries ($fpath_DB)");
				
			return null;
		
		}
					
// 			//debug
// 			if (count($csv_Lines) > 0) {
			
// 				debug("\$csv_Lines[0] => ");
// 				debug($csv_Lines[0]);
			
// 			}
		
		// convert: csv lines --> ary of memos
		$aryOf_Memos = array();
		
		$lenOf_csv_lines = count($csv_Lines);
		
		for ($i = 0; $i < $lenOf_csv_lines; $i ++) {
			
			$memo = new Memo();
			
			$line = $csv_Lines[$i];
			
			$memo->r_id = $line[0];
			$memo->title = $line[1];
			$memo->body = $line[2];
			
			$memo->r_created_at = $line[3];
			$memo->r_modified_at = $line[4];
			
// 				$memo['r_id'] = $line[0];
			
			array_push($aryOf_Memos, $memo);
			
		}
		
		debug("count(\$aryOf_Memos) => ".count($aryOf_Memos));
		
// 			debug($aryOf_Memos[0]);
// 			debug($aryOf_Memos[1]);
		
		// return
		return count($aryOf_Memos) > 0 ? $aryOf_Memos : null;
// 			return null;
		
	}//find_All_Memos__From_CSV()

	/*
	 * @return
	 * 	array(array("id","title","body","created_at","modified_at"),array(),...)
	 */
	static function 
	filter_Memos_From_CSVFile__NotIn_CakeDB($aryOf_Memos__CSV_File) {

		$filtered = array();
		
		$lenOf_AryOf_Memos__CSV_File = count($aryOf_Memos__CSV_File);
		
		for ($i = 0; $i < $lenOf_AryOf_Memos__CSV_File; $i++) {
		
			$memo_csv = $aryOf_Memos__CSV_File[$i];

			$res = Utils::isIn_DB_Memo__By_ID($memo_csv);
			
			if ($res == FALSE) {
				
				array_push($filtered, $memo_csv);
				
			}//$res == FALSE
			
		}//for ($i = 0; $i < $lenOf_AryOf_Memos__CSV_File; $i++)
		
// 			debug("count(\$filtered) => ".count($filtered));
		
		// return
		return $filtered;
		
	}//filter_Memos_From_CSVFile__NotIn_CakeDB($aryOf_Memos__CSV_File)
	
	/*
	 * by ID => 'r_id'
	 * @param
	 *
	 *	==> 
	 	object(Memo) {
			name => 'Memo'
			useDbConfig => 'default'
			useTable => 'memos'
			 r_id => '137'
			title => ':end :log 逅ｴ'
			body => '魑･縺ｮ繧医≧縺ｫ
		蜊�魑･縺ｮ譖ｲ'
			r_created_at => '2016/02/21 14:17:32'
			r_modified_at => '2016/02/21 14:17:59'
			[protected] _schema => null
	 */
	static function isIn_DB_Memo__By_ID($memo_csv) {

		// memo from => Cake db
		$model = ClassRegistry::init('Memo');
		
		$memos = $model->find('all',
				array(
					'conditions' =>
						array(
							'Memo.r_id' => $memo_csv->r_id)
				)
		);
	
// 			//
// 			debug("count(\$memos) => "
// 					.count($memos)
// 					."(\$memo_csv.r_id => ".$memo_csv->r_id.")");
		
		
		// return
		return count($memos) > 0 ? true : false;
// 			return false;
		
	}//isIn_DB_Memo__By_ID($memo_csv)

	static function isIn_CakeDB_Memo__By_R_ID($r_id) {

		// memo from => Cake db
		$model = ClassRegistry::init('Memo');
		
		// options
		$opt = array(
					'conditions' =>
						array(
// 								'Memo.r_id' => $r_id)
							'Memo.r_id' => $r_id),
// 								'Memo.r_id' => $memo_csv->r_id)
					'order'		=> "id DESC"
// 						'order'		=> "id ASC"
				);
		
		debug($opt);
		
		$memos = $model->find('all',
						$opt
// 					array(
// 						'conditions' =>
// 							array(
// // 								'Memo.r_id' => $r_id)
// 								'Memo.r_id' => $r_id),
// // 								'Memo.r_id' => $memo_csv->r_id)
// 						'order'		=> "id ASC"
// 					)
		);
	
		//
		debug("count(\$memos) => "
				.count($memos));
// 					."(\$memo_csv.r_id => ".$memo_csv->r_id.")");

// 			//debug
// 			if (count($memos) > 0) {
			
// 				debug("\$memos[0] =>");
// 				debug($memos[0]);
			
// 			}//count($memos) > 0
		
		
		// return
		return count($memos) > 0 ? $memos[0] : null;
// 			return count($memos) > 0 ? true : false;
// 			return false;
		
	}//isIn_CakeDB_Memo__By_R_ID

	static function 
	insert_Memos_From_CSVFile($aryOf_Memos__CSV_File) {

		/*
		 * prep
		 */
		// num of memos
		$numOf_Memos = count($aryOf_Memos__CSV_File);
		
		// date
		$date_label = Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]);
		
// 			//debug
// 			debug($aryOf_Memos__CSV_File[0]);

		/*
		 * Memo
		 */
		$memo = $aryOf_Memos__CSV_File[0];
		
		$model = ClassRegistry::init('Memo');

		$model->create();
		
		$model->set("created_at", $date_label);
		$model->set("updated_at", $date_label);
// 			$model->set("modified_at", $date_label);
		
		$model->set("r_id", $memo->r_id);
		$model->set("r_created_at", $memo->r_created_at);
		$model->set("r_modified_at", $memo->r_modified_at);
		
		$model->set("title", $memo->title);
		$model->set("body", $memo->body);
					
// 			debug("\$model => ");
// 			debug("\$model => ");
// 			debug($model);
		debug("\$model->data['Memo']['r_id'] => ");
		debug($model->data['Memo']['r_id']);
// 			debug("\$model->data['Memo'] => ");
// 			debug($model->data['Memo']);
// 			debug("\$model->data => ");
// 			debug($model->data);
// 			debug("\$model->data->r_id => ");	//=> Notice (8): Trying to get property of non-object
// 			debug($model->data->r_id);
// 			debug("\$model->data->Memo => ");	//=> Notice (8): Trying to get property of non-object 
// 			debug($model->data->Memo);
// 			debug($model);

		debug("\$model->r_id => '".$model->r_id."'");			
		debug("\$model->data['Memo']['r_id'] => '".$model->data['Memo']['r_id']."'");			
		
		/*
		 * is in DB
		 */
		$res = Utils::isIn_CakeDB_Memo__By_R_ID($model->data['Memo']['r_id']);
// 			$res = Utils::isIn_CakeDB_Memo__By_R_ID($model->r_id);
		
// 			debug("\$res => ".$res);

// 			debug($res == true ? "is in Cake DB" : "is NOT in Cake DB");
		debug($res == null ? "is NOT in Cake DB" : "is in Cake DB");
// 			debug($res == null ? "is in Cake DB" : "is NOT in Cake DB");
		
		
		
// 			// build a Memo instance
// 			$data = array("Memo");
		
		
// 			debug("\$data => ");
// 			debug($data);

		/*
		 * save
		 */
		if ($res == null) {
// 			if ($res == false) {
// 			if ($res == true) {
		
			$res2 = $model->save();
		
		} else {
		
// 				debug("\$res => ");
// 				debug($res);
			debug("\$res['Memo']['id'] => ");
			debug($res['Memo']['id']);
			
			// update id
			$model->set("id", $res['Memo']['id']);
// 				$model->set("id", $res['Memo']['r_id']);
			$model->set("created_at", $res['Memo']['created_at']);
			
			$res2 = $model->save($model->data);
			
		}//if ($res == true)
		
		debug($res2 == true ? "res2 => true" : "res2 => false");
// 			debug($res2 == true ? "res2 => true" : "res2 => false");
		
		if ($res2) {
// 			if ($model->save()) {
		
			debug("memo => saved/updated: ");
// 				debug("memo => saved: ");
			debug($model->data);
// 				debug("memo => saved: ".$model->data->r_id);
// 				debug("memo => saved: ".$model->data->Memo->r_id);
		
// 				return true;
		
		} else {
		
			debug("memo => NOT saved/updated: ".$model->data->Memo->r_id);
// 				debug("memo => NOT saved: ".$model->data->Memo->r_id);
// 				debug("image => NOT saved: ".$img['file_name']);
		
// 				return false;
		
		}
			
// 			$model->save();
			
// 			debug("saved");
		
	}//insert_Memos_From_CSVFile($aryOf_Memos__CSV_File)
	
	static function 
	insert_Memos_From_CSVFile__V2($aryOf_Memos__CSV_File) {

		/*
		 * prep
		 */
		// num of memos
		$numOf_Memos = count($aryOf_Memos__CSV_File);
		
		// date
		$date_label = Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]);
		
// 			//debug
// 			debug($aryOf_Memos__CSV_File[0]);

		/*
		 * insert
		*/
		$numOf_Memos__Saved = 0;
		$numOf_Memos__Updated = 0;
		$numOf_Memos__NotSaved = 0;
		
		for ($i = 0; $i < $numOf_Memos; $i++) {
				
			$memo = $aryOf_Memos__CSV_File[$i];
			
			$res = Utils::insert_Memos_From_CSVFile__Insert_1_Memo($memo);
		
			if ($res == 1) {
// 				if ($res == true) {
				
				$numOf_Memos__Saved += 1;
				
			} else if ($res == 0) {
				
				$numOf_Memos__Updated += 1;
				
			} else if ($res == -1) {
				
				$numOf_Memos__NotSaved += 1;
				
			} else {//$res == true
				
				debug("insert_Memos_From_CSVFile__Insert_1_Memo => unknown");
				
			}//$res == true
		
		}//for ($i = 0; $i < $numOf_Memos; $i++)
			
		debug("\$numOf_Memos__Saved => ".$numOf_Memos__Saved);
		debug("\$numOf_Memos__Updated => ".$numOf_Memos__Updated);
		debug("\$numOf_Memos__NotSaved => ".$numOf_Memos__NotSaved);
		
		// return
		return $numOf_Memos__Saved;
		
// 			/*
// 			 * Memo
// 			 */
// 			$memo = $aryOf_Memos__CSV_File[0];
		
// 			$model = ClassRegistry::init('Memo');

// 			$model->create();
		
// 			$model->set("created_at", $date_label);
// 			$model->set("updated_at", $date_label);
// // 			$model->set("modified_at", $date_label);
		
// 			$model->set("r_id", $memo->r_id);
// 			$model->set("r_created_at", $memo->r_created_at);
// 			$model->set("r_modified_at", $memo->r_modified_at);
		
// 			$model->set("title", $memo->title);
// 			$model->set("body", $memo->body);
					
// // 			debug("\$model => ");
// // 			debug("\$model => ");
// // 			debug($model);
// 			debug("\$model->data['Memo']['r_id'] => ");
// 			debug($model->data['Memo']['r_id']);
// // 			debug("\$model->data['Memo'] => ");
// // 			debug($model->data['Memo']);
// // 			debug("\$model->data => ");
// // 			debug($model->data);
// // 			debug("\$model->data->r_id => ");	//=> Notice (8): Trying to get property of non-object
// // 			debug($model->data->r_id);
// // 			debug("\$model->data->Memo => ");	//=> Notice (8): Trying to get property of non-object 
// // 			debug($model->data->Memo);
// // 			debug($model);

// 			debug("\$model->r_id => '".$model->r_id."'");			
// 			debug("\$model->data['Memo']['r_id'] => '".$model->data['Memo']['r_id']."'");			
		
// 			/*
// 			 * is in DB
// 			 */
// 			$res = Utils::isIn_CakeDB_Memo__By_R_ID($model->data['Memo']['r_id']);
// // 			$res = Utils::isIn_CakeDB_Memo__By_R_ID($model->r_id);
		
// // 			debug("\$res => ".$res);

// // 			debug($res == true ? "is in Cake DB" : "is NOT in Cake DB");
// 			debug($res == null ? "is NOT in Cake DB" : "is in Cake DB");
// // 			debug($res == null ? "is in Cake DB" : "is NOT in Cake DB");
		
		
		
// // 			// build a Memo instance
// // 			$data = array("Memo");
		
		
// // 			debug("\$data => ");
// // 			debug($data);

// 			/*
// 			 * save
// 			 */
// 			if ($res == null) {
// // 			if ($res == false) {
// // 			if ($res == true) {
		
// 				$res2 = $model->save();
		
// 			} else {
		
// // 				debug("\$res => ");
// // 				debug($res);
// 				debug("\$res['Memo']['id'] => ");
// 				debug($res['Memo']['id']);
			
// 				// update id
// 				$model->set("id", $res['Memo']['id']);
// // 				$model->set("id", $res['Memo']['r_id']);
// 				$model->set("created_at", $res['Memo']['created_at']);
			
// 				$res2 = $model->save($model->data);
			
// 			}//if ($res == true)
		
// 			debug($res2 == true ? "res2 => true" : "res2 => false");
// // 			debug($res2 == true ? "res2 => true" : "res2 => false");
		
// 			if ($res2) {
// // 			if ($model->save()) {
		
// 				debug("memo => saved/updated: ");
// // 				debug("memo => saved: ");
// 				debug($model->data);
// // 				debug("memo => saved: ".$model->data->r_id);
// // 				debug("memo => saved: ".$model->data->Memo->r_id);
		
// // 				return true;
		
// 			} else {
		
// 				debug("memo => NOT saved/updated: ".$model->data->Memo->r_id);
// // 				debug("memo => NOT saved: ".$model->data->Memo->r_id);
// // 				debug("image => NOT saved: ".$img['file_name']);
		
// // 				return false;
		
// 			}
			
// 			$model->save();
			
// 			debug("saved");
		
	}//insert_Memos_From_CSVFile($aryOf_Memos__CSV_File)
	
	static function 
	insert_Memos_From_CSVFile__Insert_1_Memo($memo) {

		/*
		 * prep
		 */
					// date
		$date_label = Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]);
		
		/*
		 * Memo
// 			*/
// 			$memo = $aryOf_Memos__CSV_File[0];
			
		$model = ClassRegistry::init('Memo');
		
		$model->create();
			
		$model->set("created_at", $date_label);
		$model->set("updated_at", $date_label);
		// 			$model->set("modified_at", $date_label);
			
		$model->set("r_id", $memo->r_id);
		$model->set("r_created_at", $memo->r_created_at);
		$model->set("r_modified_at", $memo->r_modified_at);
			
		$model->set("title", $memo->title);
		$model->set("body", $memo->body);
		
		// 			debug("\$model => ");
		// 			debug("\$model => ");
		// 			debug($model);
		debug("\$model->data['Memo']['r_id'] => ");
		debug($model->data['Memo']['r_id']);
		// 			debug("\$model->data['Memo'] => ");
		// 			debug($model->data['Memo']);
		// 			debug("\$model->data => ");
		// 			debug($model->data);
		// 			debug("\$model->data->r_id => ");	//=> Notice (8): Trying to get property of non-object
		// 			debug($model->data->r_id);
		// 			debug("\$model->data->Memo => ");	//=> Notice (8): Trying to get property of non-object
		// 			debug($model->data->Memo);
		// 			debug($model);
		
		debug("\$model->r_id => '".$model->r_id."'");
		debug("\$model->data['Memo']['r_id'] => '".$model->data['Memo']['r_id']."'");
			
		/*
		 * is in DB
		*/
		$res = Utils::isIn_CakeDB_Memo__By_R_ID($model->data['Memo']['r_id']);
		// 			$res = Utils::isIn_CakeDB_Memo__By_R_ID($model->r_id);
			
		// 			debug("\$res => ".$res);
		
		// 			debug($res == true ? "is in Cake DB" : "is NOT in Cake DB");
		debug($res == null ? "is NOT in Cake DB" : "is in Cake DB");
		// 			debug($res == null ? "is in Cake DB" : "is NOT in Cake DB");
			
			
			
		// 			// build a Memo instance
		// 			$data = array("Memo");
			
			
		// 			debug("\$data => ");
		// 			debug($data);
		
		/*
		 * save
		*/
		$numOf_Memos__Saved = 0;
		$numOf_Memos__Updated = 0;
		$numOf_Memos__NotSaved = 0;
		
		if ($res == null) {
			// 			if ($res == false) {
			// 			if ($res == true) {
				
			$res2 = $model->save();
				
			if ($res2 == true) {
			
				debug("memo => saved: ");
				// 				debug("memo => saved: ");
				debug($model->data);

				// return
				return 1;
				
			} else {
			
				debug("memo => NOT saved: ");
				// 				debug("memo => saved: ");
				debug($model->data);
				
				// return
				return -1;
										
			}//if ($res2 == true)
			
		} else {
				
			// 				debug("\$res => ");
			// 				debug($res);
			debug("\$res['Memo']['id'] => ");
			debug($res['Memo']['id']);
		
			// update id
			$model->set("id", $res['Memo']['id']);
			// 				$model->set("id", $res['Memo']['r_id']);
			$model->set("created_at", $res['Memo']['created_at']);
		
			$res2 = $model->save($model->data);

			if ($res2 == true) {
			
				debug("memo => updated: ");
				// 				debug("memo => saved: ");
				debug($model->data);
			
				// return
				return 0;
					
			} else {
			
				debug("memo => NOT updated: ");
				// 				debug("memo => saved: ");
				debug($model->data);
					
				// return
				return -1;
					
			}//if ($res2 == true)
			
		}//if ($res == true)
			
// 			debug($res2 == true ? "res2 => true" : "res2 => false");
// 				// 			debug($res2 == true ? "res2 => true" : "res2 => false");
			
// 			if ($res2) {
// 				// 			if ($model->save()) {
				
// 				debug("memo => saved/updated: ");
// 				// 				debug("memo => saved: ");
// 				debug($model->data);
// 				// 				debug("memo => saved: ".$model->data->r_id);
// 				// 				debug("memo => saved: ".$model->data->Memo->r_id);
				
// 				// 				return true;
				
// 			} else {
				
// 				debug("memo => NOT saved/updated: ".$model->data->Memo->r_id);
// 				// 				debug("memo => NOT saved: ".$model->data->Memo->r_id);
// 				// 				debug("image => NOT saved: ".$img['file_name']);
				
// 				// 				return false;
				
// 			}
			
	}//insert_Memos_From_CSVFile__Insert_1_Memo($memo)
	
	/*
	 * @return
	 * array(
			(int) 0 => 'aaa',
			(int) 1 => 'bbb',
			(int) 2 => 'ccc',
			(int) 3 => 'realm_data_20160221_163645.csv'
		)
	 */
	static function 
// 		find_All_Realm_DBFile_Names__UnInserted() {
	find_All_Realm_DBFile_Names__From_SqliteDB() {

		/*
		 * setup => directory
		 */
		$res_i = Utils::_find_All_Realm_DBFile_Names__UnInserted__Setup_Directory();
		
		if ($res_i == -1) {
			
			return null;
			
		} else {//$res_i == -1

// 				debug("setup directory => $res_i");
			
		}
		
		/*
		 * setup: PDO
		 */
		/*******************************
		 pdo: setup
		*******************************/
		$file_db = Utils::_find_All_Realm_DBFile_Names__UnInserted__Setup_PDO();

		// validate
		if ($file_db == null) {
			
			return null;
			
		} else {//

// 				debug("setup PDO => done");
			
		}//$file_db == null

		/*******************************
			get: db file names => from sqlite db
		*******************************/
		$realm_db_file_names__db = Utils::_find_All_DBFile_Names__FromSqliteDB();

// 			debug($realm_db_file_names__db);
		
		/*******************************
			pdo => reset
		*******************************/
		$file_db = null;
		
		// return
		return $realm_db_file_names__db;
// 			return array();
		
	}//find_All_Realm_DBFile_Names__UnInserted()

	/*
	 * @return
	 * 	null	=>	1. PDO		--> null
	 * 				2. fetch	--> returned 0
	 */
	static function
	_find_All_DBFile_Names__FromSqliteDB() {
		
		$dpath_lib = Utils::get_dpath__lib();
			
		//REF http://www.if-not-true-then-false.com/2012/php-pdo-sqlite3-example/
		$fname = "db_admin.sqlite3";
			
		$fpath = $dpath_lib.DIRECTORY_SEPARATOR.$fname;

// 			// get: number of entries in the table
// 			$numOf_Entries =
// 				Utils::get_NumOfEntries_InTheTable(
// 						$fpath, CONS::$tname_Realm_DB_File_Names);
			
		
		$file_db = new PDO("sqlite:$fpath");
		
		if ($file_db === null) {
				
			debug("pdo => null");
				
			return null;
				
		} else {
		
// 				debug("pdo => created ($fpath)");
		
		}
		
		// Set errormode to exceptions
		$file_db->setAttribute(PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION);

		/*******************************
			get: number of entries in the table
		*******************************/
		$numOf_Entries = 
				Utils::get_NumOfEntries_InTheTable(
							$fpath, CONS::$tname_Realm_DB_File_Names);
		
		// validate
		if ($numOf_Entries < 1) {
			
			return null;
			
		}//$numOf_Entries < 1
		
		/*******************************
			get: file names
		*******************************/
// 			$q = "SELECT Count(*) FROM ".CONS::$tname_IFM11
// 			$q = "SELECT Count(*) FROM "."realm_db_file_names"
		$q = "SELECT * FROM "."realm_db_file_names"
			." "
			."ORDER BY"
			." "
			."id"
			." "
			."ASC"
			;

		$st = $file_db->prepare($q);
		$st->execute();
			
		//ref fetchAll http://php.net/manual/en/pdostatement.fetchall.php
		$result = $st->fetchAll(PDO::FETCH_ASSOC);
// 			$result = $st->fetch(PDO::FETCH_ASSOC);


// 			debug("\$result[0] =>");
// 			debug($result[0]);
		
		/*******************************
			build => array
		*******************************/
		$aryOf_Names = array();
		
		for ($i = 0; $i < $numOf_Entries; $i++) {
		
			$item = $result[$i];

			$name = $item['fname'];
			
			array_push($aryOf_Names, $name);
			
		}//for ($i = 0; $i < $numOf_Entries; $i++)
		
// 			debug("\$aryOf_Names =>");
// 			debug($aryOf_Names);
		
		/*******************************
			reset pdo
		*******************************/
		$file_db = null;
		
		
		/*******************************
			return
		*******************************/
		return $aryOf_Names;
		
	}//_find_All_DBFile_Names__FromSqliteDB()

	static function
	get_NumOfEntries_InTheTable($fpath, $tname) {

		$file_db = new PDO("sqlite:$fpath");
		
		if ($file_db === null) {
				
			debug("pdo => null");
				
			return null;
				
		} else {
		
// 				debug("pdo => created ($fpath)");
		
		}
		
		// Set errormode to exceptions
		$file_db->setAttribute(PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION);

		/*******************************
			get: file names
		*******************************/
		$q = "SELECT Count(*) FROM ".$tname
			;

		$st = $file_db->prepare($q);
		$st->execute();
			
		//ref fetchAll http://php.net/manual/en/pdostatement.fetchall.php
		$result = $st->fetch(PDO::FETCH_BOTH);

		$numOfEntries = $result[0];
		
// 			debug("\$result(fetch) =>");
// 			debug($result);			

// 			debug("\$numOfEntries => $numOfEntries");
		
		/*******************************
			reset pdo
		*******************************/
		$file_db = null;
		
		/*******************************
			return
		*******************************/
		return $numOfEntries;
		
	}//get_NumOfEntries_InTheTable(CONS::$tname_Realm_DB_File_Names)
	
	/*
	 * @return
	 * 	1		=> dir created
	 * 	0		=> dir exists
	 * 	-1		=> dir can't be created
	 */
	static function 
	_find_All_Realm_DBFile_Names__UnInserted__Setup_Directory() {

		$dpath_lib = Utils::get_dpath__lib();
			
// 			debug("\$dpath_lib => ".$dpath_lib);
		
		/*
		 * dir --> exists
		*/
		//ref http://stackoverflow.com/questions/5425891/how-do-i-check-with-php-if-directory-exists answered Jun 8 '11 at 10:50
		if (!file_exists($dpath_lib)) {
		
			$res = mkdir($dpath_lib, 0755, true);
			// 				$res = mkdir($dpath_lib);
		
			if ($res == true) {
		
				debug("dir created => $dpath_lib");

				// return
				return 1;
				
			} else {
		
				debug("can't create => $dpath_lib");

				// return
				return -1;
					
			}//if ($res == true)
		
		
		} else {//condition
		
			debug("dir exists => $dpath_lib");
		
			// return
			return 0;
			
		}//condition
				
	}//_find_All_Realm_DBFile_Names__UnInserted__Setup_Directory()
	
	static function 
	_find_All_Realm_DBFile_Names__UnInserted__Setup_PDO() {

		$dpath_lib = Utils::get_dpath__lib();
			
		//REF http://www.if-not-true-then-false.com/2012/php-pdo-sqlite3-example/
		$fname = "db_admin.sqlite3";
			
		$fpath = $dpath_lib.DIRECTORY_SEPARATOR.$fname;
			
		$file_db = new PDO("sqlite:$fpath");
		
		if ($file_db === null) {
				
			debug("pdo => null");
				
			return null;
				
		} else {
		
// 				debug("pdo => created");
		
		}
		
		// Set errormode to exceptions
		$file_db->setAttribute(PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION);
		
		/*
		 * create table: if not exists
		*/
		$stmnt = "CREATE TABLE IF NOT EXISTS
			realm_db_file_names (
		
			id			INTEGER PRIMARY KEY  AUTOINCREMENT	NOT NULL,
			created_at			VARCHAR(30),
			updated_at			VARCHAR(30),
		
			fname				TEXT,
			numof_items			INT
		
		)";
			
		$res = $file_db->exec($stmnt);
			
// 			debug("statement => executed ($res)");
			
		/*
		 * table info
		*/
		$stmt = $file_db->prepare("SELECT name FROM sqlite_master WHERE type='table'");
		// 			$stmt = $file_db->prepare("SELECT name FROM my_db.sqlite_master WHERE type='table'");
		// 			$stmt = $file_db->prepare(".tables");
		// 			$stmt = $file_db->prepare("pragma table_info(realm_db_file_names)");
			
		$stmt->execute();
		// 			$stmt->execute(['200']);
			
		$r2 = $stmt->fetchAll();
			
// 			debug($r2);
			
		// return
		return $file_db;
		
	}//_find_All_Realm_DBFile_Names__UnInserted__Setup_PDO()

	/*
	 * @return
	* array(
			(int) 0 => 'aaa',
			(int) 1 => 'bbb',
			(int) 2 => 'ccc',
			(int) 3 => 'realm_data_20160221_163645.csv'
	)
	*/
	static function
	// 		find_All_Realm_DBFile_Names__UnInserted() {
	find_All_Realm_DBFile_Names__From_Directory() {

		$dpath = Utils::get_dpath__Realm_DB_Files();
		
		$scanned_directory = array_values(array_diff(scandir($dpath), array('..', '.')));
			
// 			debug($scanned_directory);
		
		// return
		return $scanned_directory;
// 			return $realm_db_file_names__db;
// 			return array();
			
	}//find_All_Realm_DBFile_Names__From_Directory
	
	
	/*
	 * @param
	 * $fname		=> file name only; no file path
	 */
	static function 
	insert_Data__Realm_DBFiles($fname, $numOf_Memos) {
		
		/*******************************
		 pdo: setup
		*******************************/
		$file_db = Utils::_find_All_Realm_DBFile_Names__UnInserted__Setup_PDO();

		// validate
		if ($file_db == null) {
			
			return null;
			
		} else {//

// 				debug("setup PDO => done");
			
		}//$file_db == null

// 			debug($realm_db_file_names__db);

		/*******************************
			inset data
		*******************************/
		$sql = "INSERT INTO ".
					CONS::$tname_Realm_DB_File_Names
					." ("
					."created_at, updated_at, "
					."fname, numof_items"
					.") "
				."VALUES ("
					."?, ?, "
					."?, ?"
					.")";
		
		$time = Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"]);
		
		$data = array(
			
				$time,		// created_at
				$time,		// modified_at
				$fname,
				$numOf_Memos
				
		);
		
		/*******************************
			insert data
		*******************************/
		//ref http://stackoverflow.com/questions/1176122/how-do-i-insert-into-pdo-sqllite3 answered Jul 24 '09 at 7:14
		$qry = $file_db->prepare($sql);
		
		//ref http://php.net/manual/en/pdostatement.execute.php
		$res = $qry->execute($data);

		//debug
		if ($res === true) {
		
			debug("execute => true: ".$fname);
		
		} else {
		
			debug("execute => false: ".$fname);
			
		}//if ($res === true)			
			
		/*******************************
			pdo => reset
		*******************************/
		$file_db = null;
		
	}//insert_Data__Realm_DBFiles($fname, $numOf_Memos)

	static function build_URL__Sort($key, $direction) {

		/*******************************
			setup
		*******************************/
		$uri = $_SERVER['REQUEST_URI'];

// 			debug("\$_SERVER['REQUEST_URI'] => ".$uri);
		
		$path_and_query = parse_url($uri);

		$path = $path_and_query['path'];
		
		$query = @$path_and_query['query'];
// 			$query = $path_and_query['query'];
		
		$new_url = "";
		
		$output = array();
// 	
		/*******************************
			build
		*******************************/
		if ($key == CONS::$key_Build_URL__Column_FileName) {

			if (isset($query)) {
			
// 					debug("\$query => set");
				
				//ref http://php.net/manual/en/function.parse-str.php
				parse_str($query, $output);

				/*******************************
					setup: sort name
				*******************************/
				if (array_key_exists("sort", $output) == true) {
						
					$output['sort'] = CONS::$key_Param__Column_FileName;	//=> 'file_name 
					
				} else {//if (array_key_exists("sort", $output) == true)
					
					$output['sort'] = CONS::$key_Param__Column_FileName;	//=> 'file_name
					
				}//if (array_key_exists("sort", $output) == true)
			
				/*******************************
					setup: sort direction
				*******************************/
				if (array_key_exists("direction", $output) == true) {
					
					$output['direction'] = $direction;	//=> 'file_name 
					
				} else {//if (array_key_exists("direction", $output) == true)
					
					$output['direction'] = $direction;	//=> 'asc'
// 						$output['direction'] = CONS::$dflt_SortDirection;	//=> 'asc'
					
				}//if (array_key_exists("direction", $output) == true)
			
				/*******************************
					setup: filter => memo
							--> if the value is '*'
								--> then, remove the entry
				*******************************/
				if (array_key_exists(CONS::$str_Filter_Memo, $output) == true) {
					
					 $val = $output[CONS::$str_Filter_Memo];
					 
					 if ($val == CONS::$str_Filter_Memo_all) {
					 
					 	//ref http://php.net/manual/en/function.unset.php
					 	unset($output[CONS::$str_Filter_Memo]);
					 	
// 						 	debug("\$output[".CONS::$str_Filter_Memo."] => unset");
// // 						 	debug("\$output[".$output[CONS::$str_Filter_Memo]."] => unset");
// 						 	debug("\$output is now ...");
// 						 	debug($output);
					 
					 } else {
					 	
					 }//if ($val == CONS::$str_Filter_Memo_all)
					
				}//if (array_key_exists("direction", $output) == true)
			
				/*******************************
					setup: filter => file_name
							--> if the value is '*'
								--> then, remove the entry
				*******************************/
				if (array_key_exists(CONS::$str_Filter_File_Name, $output) == true) {
					
					 $val = $output[CONS::$str_Filter_File_Name];
					 
					 if ($val == CONS::$str_Filter_File_Name_all) {
					 
					 	unset($output[CONS::$str_Filter_File_Name]);
					 	
// 						 	debug("\$output[".$output[CONS::$str_Filter_File_Name]."] => unset");
// 						 	debug("\$output is now ...");
// 						 	debug($output);
					 
					 } else {
					 	
					 }//if ($val == CONS::$str_Filter_Memo_all)
					
				}//if (array_key_exists("direction", $output) == true)
			
			} else {//isset($query)
			
// 					debug("\$query => NOT set");
				
				/*******************************
					build: param
				*******************************/
// 					$output = array();
				
				$output['sort'] = $key;
// 					$output['sort'] = CONS::$key_Param__Column_FileName;
			
				$output['direction'] = $direction;
// 					$output['direction'] = CONS::$key_Param__Sort_Direction__DEFAULT;	//=> 'asc'
			
			}//isset($query)

			/*******************************
				build: url
			*******************************/
			//ref http://stackoverflow.com/questions/13276226/generate-url-with-parameters-from-an-array answered Nov 7 '12 at 18:59
			$new_query = http_build_query($output);
		
// 				$new_url = $_SERVER['HTTP_REFERER']."?$new_query";
			$new_url = "?$new_query";
			//ref substr http://php.net/manual/en/function.substr.php
// 				$new_url = substr($path,1)."?$new_query";
// 				$new_url = "$path?$new_query";
			
		} else if ($key == CONS::$key_Build_URL__Column_ID) {
			
			if (isset($query)) {
	
				//ref http://php.net/manual/en/function.parse-str.php
				parse_str($query, $output);

				/*******************************
					setup: sort name
				*******************************/
				if (array_key_exists("sort", $output) == true) {
						
					$output['sort'] = CONS::$key_Param__Column_ID;	//=> 'file_name 
					
				} else {//if (array_key_exists("sort", $output) == true)
					
					$output['sort'] = CONS::$key_Param__Column_ID;	//=> 'file_name
					
				}//if (array_key_exists("sort", $output) == true)
			
				/*******************************
					setup: sort direction
				*******************************/
				if (array_key_exists("direction", $output) == true) {
					
					$output['direction'] = $direction;
					
				} else {//if (array_key_exists("direction", $output) == true)
					
					$output['direction'] = $direction;
					
				}//if (array_key_exists("direction", $output) == true)
			
				/*******************************
					setup: filter => memo
							--> if the value is '*'
								--> then, remove the entry
				*******************************/
				if (array_key_exists(CONS::$str_Filter_Memo, $output) == true) {
					
					 $val = $output[CONS::$str_Filter_Memo];
					 
					 if ($val == CONS::$str_Filter_Memo_all) {
					 
					 	//ref http://php.net/manual/en/function.unset.php
					 	unset($output[CONS::$str_Filter_Memo]);
					 	
// 						 	debug("\$output[".CONS::$str_Filter_Memo."] => unset");
// // 						 	debug("\$output[".$output[CONS::$str_Filter_Memo]."] => unset");
// 						 	debug("\$output is now ...");
// 						 	debug($output);
					 
					 } else {
					 	
					 }//if ($val == CONS::$str_Filter_Memo_all)
					
				}//if (array_key_exists("direction", $output) == true)
			
				/*******************************
					setup: filter => file_name
							--> if the value is '*'
								--> then, remove the entry
				*******************************/
				if (array_key_exists(CONS::$str_Filter_File_Name, $output) == true) {
					
					 $val = $output[CONS::$str_Filter_File_Name];
					 
					 if ($val == CONS::$str_Filter_File_Name_all) {
					 
					 	unset($output[CONS::$str_Filter_File_Name]);
					 	
// 						 	debug("\$output[".$output[CONS::$str_Filter_File_Name]."] => unset");
// 						 	debug("\$output is now ...");
// 						 	debug($output);
					 
					 } else {
					 	
					 }//if ($val == CONS::$str_Filter_Memo_all)
					
				}//if (array_key_exists("direction", $output) == true)
			
			} else {//isset($query)
			
				/*******************************
					build: param
				*******************************/
				$output['sort'] = $key;
			
				$output['direction'] = $direction;
			
			}//isset($query)

			/*******************************
				build: url
			*******************************/
			//ref http://stackoverflow.com/questions/13276226/generate-url-with-parameters-from-an-array answered Nov 7 '12 at 18:59
			$new_query = http_build_query($output);
		
			$new_url = "?$new_query";
			
		} else {
		
			debug("unknown key => $key");
			
		}//if ($key == CONS::$key_Build_URL__Column_FileName)

		/*******************************
			return
		*******************************/
// 			debug("\$new_url => ".$new_url);
		
		return $new_url;
// 			return "";
		
	}//static function build_URL($key)
	
	/******************** (20 '*'s)
	*
	* @return array of TRs
	* 			==> array(
	* 					array(	// TR
	* 						"td" => array(string, string, ...),
	* 						"hrefs" => array(string, string, ...),
	* 					)
	* 					...
	* 				)
	* 
	* array(
		(int) 0 => array(
			'td' => array(
				(int) 0 => '2017年9月21日 21時35分ごろ',
				(int) 1 => '2017年9月21日 21時38分',
				(int) 2 => '福島県沖',
				(int) 3 => '4.2',
				(int) 4 => '1'
			),
			'hrefs' => array(
				(int) 0 => '/weather/jp/earthquake/20170921213534.html?e=289'
			)
		),
		(int) 1 => array(
			'td' => array(
				(int) 0 => '2017年9月20日 5時42分ごろ',
				(int) 1 => '2017年9月20日 5時44分',
				(int) 2 => '福島県沖',
				(int) 3 => '3.9',
				(int) 4 => '1'
			),
			'hrefs' => array(
				(int) 0 => '/weather/jp/earthquake/20170920054217.html?e=289'
			)
		),
	*
	********************/
	static function get_EQs__ALL() {
		
		/******************** (20 '*'s)
		* get : html
		********************/
		$id_Location = 289;
		
		$url = "https://typhoon.yahoo.co.jp/weather/jp/earthquake/list/?e=$id_Location";
		
		//ref C:\WORKS_2\WS\Eclipse_Luna\Cake_NR5\app\Controller\Articles2Controller.php
		$html = file_get_html($url);
		
		/******************** (20 '*'s)
		* get : ary of TRs
		********************/
		$aryOf_TR_Nodes = $html->find('table tr');

		$aryOf_TRs = array();
		
		/******************** (20 '*'s)
		* get : TDs
		********************/
		$aryOf_TDs = array();

		$countOf_TRs = 0;
		
		foreach ($aryOf_TR_Nodes as $tr) {
			
			/******************** (20 '*'s)
			* vars
			********************/
			$ary_Temp = array();
			// 				(int) 1 => array(
			// 						(int) 0 => '2017年9月21日 21時35分ごろ',
			// 						(int) 1 => '2017年9月21日 21時38分',
			// 						(int) 2 => '福島県沖',
			// 						(int) 3 => '4.2',
			// 						(int) 4 => '1'
			// 				),

			$ary_Temp__Hrefs = array();
			
			/******************** (20 '*'s)
			* count
			********************/
			$countOf_TRs += 1;
			
// 				debug("TR => $countOf_TRs");
			
			/******************** (20 '*'s)
			* TDs
			********************/
			$tds = $tr->find('td');

			foreach ($tds as $td) {

				/******************** (20 '*'s)
				* td : text
				********************/
				array_push($ary_Temp, $td->plaintext);
				
				/******************** (20 '*'s)
				* hrefs : if any
				********************/
				$res = $td->find("a");
				
				if (count($res) > 0) {
				
					foreach ($res as $a) {
					
						array_push($ary_Temp__Hrefs, $a->href);;
						
					}//foreach ($res as $a)
					
					;
					
				}//if (count($res) > 0)
				;
				
// 					debug("<a> : ".count($res)." / "
// 							.(count($res) > 0 ? 
// // 											"get_class(\$res[0]) : ".get_class($res[0])
// // 												.
// 												" '".$res[0]->href."'"
// // 												.
// // 												" || "."get_class(\$res[0]->href) : "
// // 												.get_class($res[0]->href)	//=> string
											
// 											: "-"
// 							)
// 					);	//=> '<a> : 1 / get_class($res[0]) : simple_html_dom_node'
// 					//=> '<a> : 1 / get_class($res[0]) : simple_html_dom_node '/weather/jp/earthquake/20170911184102.html?e=289''
				
// 					debug("<a> : ".count($res)." / ".get_class($res));	//=> Array
// 					debug("<a> : ".count($res));
// 					debug($res);
				
// 					debug($td->plaintext);
				
			}//foreach ($tds as $td)

			/******************** (20 '*'s)
			* temp array ---> to TDs
			********************/
			array_push(
					$aryOf_TRs, 
// 						$aryOf_TDs, 
					
					array(
							"td" => $ary_Temp,
							"hrefs" => $ary_Temp__Hrefs
					)
			
			);
			
// 				array_push($aryOf_TDs, array("td" => $ary_Temp));
			
// 				array_push($aryOf_TDs, array("hrefs" => $ary_Temp__Hrefs));
			
// 				array_push($aryOf_TDs, $ary_Temp);
			
// 				debug("get_class(\$tds[0]) : ".get_class($tds[0]));	//=> 'get_class($tds[0]) : simple_html_dom_node'

// 				debug($tds[0]->plaintext);	//=> '2017年7月20日 9時57分ごろ'
			
// 				debug("get_class(\$tds) : ".get_class($tds));	//=> Array
			
// 				debug($tr->plaintext);	//=> '     2017年5月2日 7時47分ごろ     2017年5月2日 7時50分     福島県沖     3.9     1   '

// 				debug("count(\$tds) : ".count($tds));	//=> 'count($tds) : 5'
		
// 				debug("get_class(\$tr) : ".get_class($tr));	//=> 'get_class($tr) : simple_html_dom_node'
			
		}//foreach ($aryOf_TR_Nodes as $tr)
		
		/******************** (20 '*'s)
		* processing
		********************/
		$aryOf_TRs__1_Last = array_slice($aryOf_TRs, 1);
// 			$aryOf_TDs__1_Last = array_slice($aryOf_TDs, 1);
		
		/******************** (20 '*'s)
		* report
		********************/
// 			debug("count(\$aryOf_TDs) : ".count($aryOf_TDs));
		
		$aryOf_TRs__0_3 = array_slice($aryOf_TRs__1_Last, 0, 5);
// 			$aryOf_TDs__0_3 = array_slice($aryOf_TDs, 0, 3);
		
// 		debug($aryOf_TRs__0_3);
		
		/******************** (20 '*'s)
		*
		* return
		*
		********************/
		return $aryOf_TRs__1_Last;
// 			return null;
		
	}//get_EQs__ALL()
	
	/******************** (20 '*'s)
	* @param $numOf_Records
	*			1. Get first N records
	*			2. Dflt ==> 5
	* @param $id_Epicenter
	* 			1. e.g. 289 ('福島県沖')
	*
	* @return array of TRs
	* 			==> array(
	* 					array(	// TR
	* 						"td" => array(string, string, ...),
	* 						"hrefs" => array(string, string, ...),
	* 					)
	* 					...
	* 				)
	* 
	* array(
		(int) 0 => array(
			'td' => array(
				(int) 0 => '2017年9月21日 21時35分ごろ',
				(int) 1 => '2017年9月21日 21時38分',
				(int) 2 => '福島県沖',
				(int) 3 => '4.2',
				(int) 4 => '1'
			),
			'hrefs' => array(
				(int) 0 => '/weather/jp/earthquake/20170921213534.html?e=289'
			)
		),
		(int) 1 => array(
			'td' => array(
				(int) 0 => '2017年9月20日 5時42分ごろ',
				(int) 1 => '2017年9月20日 5時44分',
				(int) 2 => '福島県沖',
				(int) 3 => '3.9',
				(int) 4 => '1'
			),
			'hrefs' => array(
				(int) 0 => '/weather/jp/earthquake/20170920054217.html?e=289'
			)
		),
	*
	********************/
	static function get_EQs__NRecords
	($id_Epicenter, $numOf_Records = 5) {
		
		/******************** (20 '*'s)
		* get : html
		********************/
		$id_Location = $id_Epicenter;
		
		$url = "https://typhoon.yahoo.co.jp/weather/jp/earthquake/list/?e=$id_Location";
		
		/******************** (20 '*'s)
		* validate
		********************/
		//ref https://stackoverflow.com/questions/6857392/check-whether-a-html-page-exists "answered Jul 28 '11 at 10:41"
		$res = get_headers($url);
		
		if ($res[0] == 'HTTP/1.0 404 Not Found') {
		
// 			debug("page not found : epicenter id = $id_Location");
			
			return null;
			
		}//if ($res[0] == 'HTTP/1.0 404 Not Found')
		;
		
// 		debug($res);
		
		//ref C:\WORKS_2\WS\Eclipse_Luna\Cake_NR5\app\Controller\Articles2Controller.php
		$html = file_get_html($url);
		
		/******************** (20 '*'s)
		* validate
		********************/
		if ($html == false) {
		
			debug("url ==> returned false: epicenter id = $id_Epicenter");

			return null;
			
		}//if ($html == false)
		;
		
		/******************** (20 '*'s)
		* get : ary of TRs
		********************/
		$aryOf_TR_Nodes = $html->find('table tr');

		$aryOf_TRs = array();
		
		/******************** (20 '*'s)
		* get : TDs
		********************/
		$aryOf_TDs = array();

		$countOf_TRs = 0;
		
		foreach ($aryOf_TR_Nodes as $tr) {
			
			/******************** (20 '*'s)
			* vars
			********************/
			$ary_Temp = array();
			// 				(int) 1 => array(
			// 						(int) 0 => '2017年9月21日 21時35分ごろ',
			// 						(int) 1 => '2017年9月21日 21時38分',
			// 						(int) 2 => '福島県沖',
			// 						(int) 3 => '4.2',
			// 						(int) 4 => '1'
			// 				),

			$ary_Temp__Hrefs = array();
			
			/******************** (20 '*'s)
			* count
			********************/
			$countOf_TRs += 1;

			/******************** (20 '*'s)
			* validate : more than number of records required?
			********************/
			if ($countOf_TRs > $numOf_Records + 1) {
// 			if ($countOf_TRs > $numOf_Records) {
			
				break;
				
			}//if ($countOf_TRs > $numOf_Records)
			
			/******************** (20 '*'s)
			* TDs
			********************/
			$tds = $tr->find('td');
			
			$numOf_TDs = count($tds);

			for ($i = 0; $i < $numOf_TDs; $i ++) {
// 			foreach ($tds as $td) {

				$td = $tds[$i];
				
				/******************** (20 '*'s)
				* td : text
				********************/
// 				array_push($ary_Temp, array(Utils::$listOf_EQ_Lables[$i] => $td->plaintext));
				array_push($ary_Temp, $td->plaintext);
				
				/******************** (20 '*'s)
				* hrefs : if any
				********************/
				$res = $td->find("a");
				
				if (count($res) > 0) {
				
					foreach ($res as $a) {
					
						array_push($ary_Temp__Hrefs, $a->href);;
						
					}//foreach ($res as $a)
					
					;
					
				}//if (count($res) > 0)
				
			}//foreach ($tds as $td)

			/******************** (20 '*'s)
			* temp array ---> to TDs
			********************/
			array_push(
					$aryOf_TRs, 
// 						$aryOf_TDs, 
					
					array(
							"td" => $ary_Temp,
							"hrefs" => $ary_Temp__Hrefs
					)
			
			);
			
// 				array_push($aryOf_TDs, array("td" => $ary_Temp));
			
// 				array_push($aryOf_TDs, array("hrefs" => $ary_Temp__Hrefs));
			
// 				array_push($aryOf_TDs, $ary_Temp);
			
// 				debug("get_class(\$tds[0]) : ".get_class($tds[0]));	//=> 'get_class($tds[0]) : simple_html_dom_node'

// 				debug($tds[0]->plaintext);	//=> '2017年7月20日 9時57分ごろ'
			
// 				debug("get_class(\$tds) : ".get_class($tds));	//=> Array
			
// 				debug($tr->plaintext);	//=> '     2017年5月2日 7時47分ごろ     2017年5月2日 7時50分     福島県沖     3.9     1   '

// 				debug("count(\$tds) : ".count($tds));	//=> 'count($tds) : 5'
		
// 				debug("get_class(\$tr) : ".get_class($tr));	//=> 'get_class($tr) : simple_html_dom_node'
			
		}//foreach ($aryOf_TR_Nodes as $tr)
		
		/******************** (20 '*'s)
		* processing
		********************/
		$aryOf_TRs__1_Last = array_slice($aryOf_TRs, 1);
// 			$aryOf_TDs__1_Last = array_slice($aryOf_TDs, 1);
		
		/******************** (20 '*'s)
		* report
		********************/
// 			debug("count(\$aryOf_TDs) : ".count($aryOf_TDs));
		
		$aryOf_TRs__0_3 = array_slice($aryOf_TRs__1_Last, 0, 5);
// 			$aryOf_TDs__0_3 = array_slice($aryOf_TDs, 0, 3);
		
// 		debug($aryOf_TRs__0_3);
		
		/******************** (20 '*'s)
		*
		* return
		*
		********************/
		return $aryOf_TRs__1_Last;
// 			return null;
		
	}//static function get_EQs__NRecords
	
	/******************** (20 '*'s)
	* static function get_EQs__NPages
	* @param $numOf_Pages
	*			1. Get all records in N pages starting with $numOf_Pages
	*			2. Dflt ==> 1
	* @param $id_Epicenter
	* 			1. e.g. 289 ('福島県沖')
	*
	* @return 
	* 		null	==> page not found
	* 		null	==> file_get_html() returned false
	* 		array of TRs
	* 			==> array(
	* 					array(	// TR
	* 						"td" => array(string, string, ...),
	* 						"hrefs" => array(string, string, ...),
	* 					)
	* 					...
	* 				)
	* 
	* <Description>
	* 
	* array(
		(int) 0 => array(
			'td' => array(
				(int) 0 => '2017年9月21日 21時35分ごろ',
				(int) 1 => '2017年9月21日 21時38分',
				(int) 2 => '福島県沖',
				(int) 3 => '4.2',
				(int) 4 => '1'
			),
			'hrefs' => array(
				(int) 0 => '/weather/jp/earthquake/20170921213534.html?e=289'
			)
		),
		(int) 1 => array(
			'td' => array(
				(int) 0 => '2017年9月20日 5時42分ごろ',
				(int) 1 => '2017年9月20日 5時44分',
				(int) 2 => '福島県沖',
				(int) 3 => '3.9',
				(int) 4 => '1'
			),
			'hrefs' => array(
				(int) 0 => '/weather/jp/earthquake/20170920054217.html?e=289'
			)
		),
	*
	********************/
	static function get_EQs__NPages
	($id_Epicenter, $numOf_Pages = 1) {
		
		/******************** (20 '*'s)
		* get : html
		********************/
		$id_Location = $id_Epicenter;
		
		$url = "https://typhoon.yahoo.co.jp/weather/jp/earthquake/list/?e=$id_Location";
		
		/******************** (20 '*'s)
		* validate
		********************/
		//ref https://stackoverflow.com/questions/6857392/check-whether-a-html-page-exists "answered Jul 28 '11 at 10:41"
		$res = get_headers($url);
		
		if ($res[0] == 'HTTP/1.0 404 Not Found') {
		
// 			debug("page not found : epicenter id = $id_Location");
			
			return null;
			
		}//if ($res[0] == 'HTTP/1.0 404 Not Found')
		;
		
		//ref C:\WORKS_2\WS\Eclipse_Luna\Cake_NR5\app\Controller\Articles2Controller.php
		$html = file_get_html($url);
		
		/******************** (20 '*'s)
		* validate
		********************/
		if ($html == false) {
		
			debug("url ==> returned false: epicenter id = $id_Epicenter");

			return null;
			
		}//if ($html == false)
		;
		
		/******************** (20 '*'s)
		* get : ary of TRs
		********************/
		$aryOf_TR_Nodes = $html->find('table tr');

		debug("count(\$aryOf_TR_Nodes) : ".count($aryOf_TR_Nodes));
		
		$aryOf_TRs = array();
		
		/******************** (20 '*'s)
		* get : TDs
		********************/
		$aryOf_TDs = array();

		$countOf_TRs = 0;
		
		foreach ($aryOf_TR_Nodes as $tr) {
			
			/******************** (20 '*'s)
			* vars
			********************/
			$ary_Temp = array();
			// 				(int) 1 => array(
			// 						(int) 0 => '2017年9月21日 21時35分ごろ',
			// 						(int) 1 => '2017年9月21日 21時38分',
			// 						(int) 2 => '福島県沖',
			// 						(int) 3 => '4.2',
			// 						(int) 4 => '1'
			// 				),

			$ary_Temp__Hrefs = array();
			
			/******************** (20 '*'s)
			* count
			********************/
			$countOf_TRs += 1;

// 			/******************** (20 '*'s)
// 			* validate : more than number of records required?
// 			********************/
// 			if ($countOf_TRs > $numOf_Records + 1) {
// // 			if ($countOf_TRs > $numOf_Records) {
			
// 				break;
				
// 			}//if ($countOf_TRs > $numOf_Records)
			
			/******************** (20 '*'s)
			* TDs
			********************/
			$tds = $tr->find('td');
			
			$numOf_TDs = count($tds);

			for ($i = 0; $i < $numOf_TDs; $i ++) {

				$td = $tds[$i];
				
				/******************** (20 '*'s)
				* td : text
				********************/
				array_push($ary_Temp, $td->plaintext);
				
				/******************** (20 '*'s)
				* hrefs : if any
				********************/
				$res = $td->find("a");
				
				if (count($res) > 0) {
				
					foreach ($res as $a) {
					
						array_push($ary_Temp__Hrefs, $a->href);;
						
					}//foreach ($res as $a)
					
				}//if (count($res) > 0)
				
			}//foreach ($tds as $td)

			/******************** (20 '*'s)
			* temp array ---> to TDs
			********************/
			array_push(
					$aryOf_TRs, 
					
					array(
							"td" => $ary_Temp,
							"hrefs" => $ary_Temp__Hrefs
					)
			
			);
			
		}//foreach ($aryOf_TR_Nodes as $tr)
		
		/******************** (20 '*'s)
		* processing
		********************/
		$aryOf_TRs__1_Last = array_slice($aryOf_TRs, 1);
		
		/******************** (20 '*'s)
		* report
		********************/
// 			debug("count(\$aryOf_TDs) : ".count($aryOf_TDs));
		debug("\$countOf_TRs =>  ".$countOf_TRs);
		
// 		$aryOf_TRs__0_3 = array_slice($aryOf_TRs__1_Last, 0, 5);
// // 			$aryOf_TDs__0_3 = array_slice($aryOf_TDs, 0, 3);
		
// // 		debug($aryOf_TRs__0_3);
		
		/******************** (20 '*'s)
		*
		* return
		*
		********************/
		return $aryOf_TRs__1_Last;
		
	}//static function get_EQs__NPages
	
	static function get_ListOf_EpicenterNames() {

		/******************** (20 '*'s)
		* vars
		********************/
		//ref http://php.net/manual/en/function.array-fill.php
		$aryOf_Epicenter_Pairs = array_fill(0, 400, null);
		
		/******************** (20 '*'s)
		* processing
		********************/
		for ($i = 280; $i < 300; $i++) {
		
			$data = Utils::get_EQs__NRecords($i, 5);;

			if ($data == null) {
			
// 				debug("data ===> returned null (\$i = $i)");
				
				continue;
			
			} else {
			
// 				debug("\$i : $i / ".count($data)
// 						." / name = "
// 						.$data[0]['td'][Utils::$listOf_EQ_Lables['epicenter']]);

// 				debug($data[0]['td']);
							// array(
							// 		(int) 0 => '2017年9月27日 5時22分ごろ',
							// 		(int) 1 => '2017年9月27日 5時26分',
							// 		(int) 2 => '岩手県沖',
							// 		(int) 3 => '6.0',
							// 		(int) 4 => '4'
							// )
				
				// add data
				$aryOf_Epicenter_Pairs[$i] = $data[0]['td'][Utils::$listOf_EQ_Lables['epicenter']];
				
			}//if ($data == null)
			
// 			debug("\$i : $i / ".count($data));
			
		}//for ($i = 0; $i < 300; $i++)
		
// 		$data = Utils::get_EQs__NRecords(289, 5);

// 		debug($data);
		
// 		debug(array_slice($aryOf_Epicenter_Pairs, 280, 20));
					// array(
					// 		(int) 0 => '津軽海峡',
					// 		(int) 1 => '山形県沖',
					// 		(int) 2 => '秋田県沖',
					// 		(int) 3 => '青森県西方沖',
					// 		(int) 4 => '陸奥湾',
					// 		(int) 5 => '青森県東方沖',
					// 		(int) 6 => '岩手県沖',
					// 		(int) 7 => '宮城県沖',
					// 		(int) 8 => '三陸沖',
					// 		(int) 9 => '福島県沖',
					// 		(int) 10 => null,
					// 		(int) 11 => null,
					// 		(int) 12 => null,
					// 		(int) 13 => null,
					// 		(int) 14 => null,
					// 		(int) 15 => null,
					// 		(int) 16 => null,
					// 		(int) 17 => null,
					// 		(int) 18 => null,
					// 		(int) 19 => null
					// )
		/******************** (20 '*'s)
		* return
		********************/
		return null;
		
	}//get_ListOf_EpicenterNames()
	
	static function 
	get_ListOf_EpicenterNames__Range
	($id_Epicenter_Start = 280, $id_Epicenter_End = 300, $lenOf_NamesList = 400) {

		/******************** (20 '*'s)
		* vars
		********************/
		//ref http://php.net/manual/en/function.array-fill.php
		
		$aryOf_Epicenter_Pairs = array_fill(0, $lenOf_NamesList, null);
// 		$aryOf_Epicenter_Pairs = array_fill(0, 400, null);
		
		/******************** (20 '*'s)
		* processing
		********************/
		for ($i = $id_Epicenter_Start; $i < $id_Epicenter_End; $i++) {
// 		for ($i = 280; $i < 300; $i++) {
		
			$data = Utils::get_EQs__NRecords($i, 5);;

			if ($data == null) {
			
// 				debug("data ===> returned null (\$i = $i)");
				
				continue;
			
			} else {
			
				// add data
				$aryOf_Epicenter_Pairs[$i] = $data[0]['td'][Utils::$listOf_EQ_Lables['epicenter']];
				
			}//if ($data == null)
			
		}//for ($i = $id_Epicenter_Start; $i < $id_Epicenter_End; $i++)
		
		/******************** (20 '*'s)
		* return
		********************/
		return $aryOf_Epicenter_Pairs;
		
	}//get_ListOf_EpicenterNames__Range($id_Epicenter_Start, $id_Epicenter_End)
	
	/******************** (20 '*'s)
	* at : 2018/12/07 13:32:38
	* 
	* @return
		* 		array(
					(int) 0 => array(
						(int) 0 => '小学校',
						(int) 1 => 'しょうがっこう'
					),
					(int) 1 => array(
						(int) 0 => '学習指導',
						(int) 1 => 'がくしゅうしどう'
					),
					(int) 2 => array(
						(int) 0 => '要領',
						(int) 1 => 'ようりょう'
					)
				)
	* 
	********************/
	static function get_Rubis($txt) {
		
		$url_Request = "https://jlp.yahooapis.jp/FuriganaService/V1/furigana?appid=dj00aiZpPXlIWUpoTVpGSVFBRiZzPWNvbnN1bWVyc2VjcmV0Jng9N2E-&grade=1&sentence=$txt";

		$xml = simplexml_load_file($url_Request);
		
		$lo_Words = $xml->Result->WordList->Word;
		
		$aryOf_WordPair = array();
		
// 		debug("\$lo_Words => " . count($lo_Words));
// 		debug($lo_Words);
		
		foreach ($lo_Words as $item) {
			
			/******************** (20 '*'s)
			* push
			********************/
			array_push($aryOf_WordPair, array((string)($item->Surface), (string)($item->Furigana)));
			
// 			debug($item);
			/******************** (20 '*'s)
			* surface : defined?
			********************/
// 			//ref defined https://secure.php.net/manual/en/function.defined.php
// 			//ref string casting https://stackoverflow.com/questions/28098/tostring-equivalent-in-php
// 			$condition_1 = defined((string)($item->Surface));
// 			$condition_2 = defined($item->Furigana);
// // 			$condition_1 = defined($item->Surface);
// // 			$condition_2 = defined($item->Furigana);
			
// 			$surface = $condition_1 ? (string)($item->Surface) : "NULL";
// 			$furigana = $condition_2 ? (string)($item->Furigana) : "NULL";
			
// 			debug(($condition_1) ? "yes 1" : "no 1");
			
// 			debug($surface);
// 			debug($furigana);
			
// 			debug((string)($item->Surface));
// // 			debug($item->Furigana);
			
// // 			if ($condition_1 && $condition_2) {
			
// // 				array_push($aryOf_WordPair, array((string)($item->Surface), (string)($item->Furigana)));

// // 			} else if ($condition_1) {
				
// // 				array_push($aryOf_WordPair, array((string)($item->Surface), (string)($item->Furigana)));
				
// // 			}//if ($item->)
// // 			;
			
		}//foreach ($lo_Words as $item)
		
		//debug
// 		debug($aryOf_WordPair);
		
		/******************** (20 '*'s)
		* return
		********************/
		return $aryOf_WordPair;
		
		
	}//static function get_Rubis($txt) {
	
	static function has_String($haystack, $needle) {
	
		$judge = (strpos( $haystack, $needle ) !== false);
	
		return $judge;
	
		// 	if( strpos( $haystack, $needle ) !== false) {
		// 		echo "\"bar\" exists in the haystack variable";
		// 	}
	
	}//function has_String($haystack, $needle) {	
	
}//class Utils
	