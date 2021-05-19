<?php

/*

pushd C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\others\jve_70-CO2_68_trans-string\
echo =============================== >> log_process-trans-sentences_chinese.log && php process-trans-sentences_chinese.php >> log_process-trans-sentences_chinese.log && echo. >> log_process-trans-sentences_chinese.log

php process-trans-sentences.php

// echo =============================== >> log_process-trans-sentences.log && php process-trans-sentences.php >> log_process-trans-sentences.log && time >>  log_process-trans-sentences.log && echo. >> log_process-trans-sentences.log

	
	at : 20210510_172657
	
	orig : C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\others\jve_37_12.6_keyboard-memo\keyboard-memo.php
	
 */

// 	echo "yes";
	
	require 'C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/utils.php';

	function test_1() {

		$tlabel = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
		
		echo "test_1 ($tlabel)";
// 		echo "test_1";
		echo "\n";
		echo "\n";
		
		echo "CONS::\$charOf_Sort_Delimiter_CSV_Line => " . CONS::$charOf_Sort_Delimiter_CSV_Line;
		echo "\n";
		echo "\n";
		
// 		$tlabel = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
		
// 		echo $tlabel;
// 		echo "\n";
// 		echo "\n";

		// separator
		echo "DIRECTORY_SEPARATOR => " . DIRECTORY_SEPARATOR;
		
		$msg	= "keyboard-memo.php ($tlabel)";
		$msg	.= "\n";
		
		$dpath_Log_File = "C:\\WORKS_2\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\Lib\\others\\jve_37_12.6_keyboard-memo";
		
		$fname_Log_File = "log_keyboard-memo.log";
		
		Utils::write_Log__Simple(
				
				$dpath_Log_File, $fname_Log_File
				, $msg, basename(__FILE__), __LINE__);
// 				, $msg, __FILE__, __LINE__);
		
	}//function test_1() {
	
	function build_Trans_String__Chinese() {
	
		/********************
		* step : 0
		********************/
		$tlabel = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
	
		echo "starting... : build_Trans_String__Chinese ($tlabel)";
		// 		echo "build_Trans_String__Chinese";
		echo "\n";
		echo "\n";
	
// 		echo "CONS::\$charOf_Sort_Delimiter_CSV_Line => " . CONS::$charOf_Sort_Delimiter_CSV_Line;
// 		echo "\n";
// 		echo "\n";
	
		// 		$tlabel = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
	
		// 		echo $tlabel;
		// 		echo "\n";
		// 		echo "\n";
	
// 		// separator
// 		echo "DIRECTORY_SEPARATOR => " . DIRECTORY_SEPARATOR;
// 		echo "\n";
// 		echo "\n";
		
// 		$msg	= "keyboard-memo.php ($tlabel)";
// 		$msg	.= "\n";
	
// 		$dpath_Log_File = "C:\\WORKS_2\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\Lib\\others\\jve_37_12.6_keyboard-memo";
	
// 		$fname_Log_File = "log_keyboard-memo.log";
	
// 		Utils::write_Log__Simple(
	
// 				$dpath_Log_File, $fname_Log_File
// 				, $msg, basename(__FILE__), __LINE__);
// 		// 				, $msg, __FILE__, __LINE__);

		/********************
		 * step : 1
		 * 	prep : vars
		 ********************/
		$dpath_Trans_Dat	= "C:\\WORKS_2\\shortcuts_docs";
		
		$fname_Trans_Dat	= "log-session_JVE_70.[CO2].[trans-sentences].dat";
		
		$fpath_Trans_Dat	= join(
				
				DIRECTORY_SEPARATOR
				, array($dpath_Trans_Dat, $fname_Trans_Dat)
				
				);
		
// 		#debug
// 		$message	= "\$fpath_Trans_Dat : $fpath_Trans_Dat";
// 		printf("[%s : %d] %s", basename(__FILE__), __LINE__, $message);

		/********************
		 * step : 2
		 * 	file : open
		 ********************/
		$linesOf_File = file($fpath_Trans_Dat);

// 		#debug
// 		$message	= "\$linesOf_File =>";
// 		$message	.= "\n";
// 		$message	.= "\n";
		
// 		printf("[%s : %d] %s", basename(__FILE__), __LINE__, $message);

// 		print_r($linesOf_File);

		/********************
		 * step : 3 : 0.1
		 * 	lines : trim
		 ********************/
		$linesOf_File__Trimmed = array();
		
		foreach ($linesOf_File as $line) {
		
			#ref https://www.w3schools.com/PHP/func_string_trim.asp
			$line_Trimmed = trim($line);
			
			array_push($linesOf_File__Trimmed, $line_Trimmed);
			
		}//foreach ($linesOf_File as $line)
		
		/********************
		 * step : 3 : 1
		 * 	lines : join
		 ********************/
		$stringOf_Joined_Lines	= join(" ", $linesOf_File__Trimmed);
// 		$stringOf_Joined_Lines	= join(" ", $linesOf_File);
		
// 		#debug
// 		$message	= "\$stringOf_Joined_Lines =>";
// 		$message	.= "\n";
// 		$message	.= "\n";
		
// 		printf("[%s : %d] %s", basename(__FILE__), __LINE__, $message);
		
// 		print_r($stringOf_Joined_Lines);

		/********************
		 * step : 3 : 2
		 * 	joined lines : split
		 ********************/
		$tokensOf_Split	= explode(" ", $stringOf_Joined_Lines);
		
		#debug
		$message	= "\$tokensOf_Split =>";
		$message	.= "\n";
		$message	.= "\n";
		
		printf("[%s : %d] %s", basename(__FILE__), __LINE__, $message);
		
		print_r($tokensOf_Split);
		
		#code:20210519_153650
		
		/********************
		 * step : 4 : 1
		 * 	tokes : filter : russian chars
		 ********************/
		
		$aryOf_Tokens__Filtered_In	= array();
		$aryOf_Tokens__Filtered_Out	= array();
		
		# vars
		#ref https://stackoverflow.com/questions/9576384/use-regular-expression-to-match-any-chinese-character-in-utf-8-encoding
		$pattern	= "/.+\[.+/";		#=> pat-id:20210519_154337	//=> working
// 		$pattern	= "/\p{Han}/";		#=> pat-id:20210511_113804	//=> not filtered
// 		$pattern	= "/^[ЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮйцукенгшщзхъфывапролджэячсмитьбюäüöß0-9a-zA-Z\s\-,'\.\(\)\­]*$/i";	 // "()­" added

		printf("[%s : %d] filtering.. : pattern = '$pattern'",
					
				basename(__FILE__), __LINE__
		
		);
		
		print ("\n");
		
		# filter
		foreach ($tokensOf_Split as $token) {
		
			#ref https://www.php.net/manual/en/function.preg-match.php
			$result 	= preg_match($pattern, $token, $matches);
			
			// judge
			if ($result == 1) {
			
				printf("[%s : %d] match => ", 
							
						basename(__FILE__)
						, __LINE__
						
						);
				
				print_r($token);
				
				print ("\n");
				
				# to array
				array_push($aryOf_Tokens__Filtered_In, $token);
									
			} else {
			
				printf("[%s : %d] NOT match => (\$result = $result)",
							
						basename(__FILE__)
						, __LINE__
				
				);
				
				print_r($token);
				
				print ("\n");
				
				# to array
				array_push($aryOf_Tokens__Filtered_Out, $token);
				
			}//if ($result == 1)
			
		}//foreach ($tokensOf_Split as $token)

// 		#debug
// 		printf("[%s : %d] returning..."
// 				, basename(__FILE__), __LINE__
// 		);
		
// 		print("\n");
		
// 		return;
		
		/********************
		 * step : 5
		 * 	build : final string
		 ********************/
		$stringOf_Trans_Strings	= join(",", $aryOf_Tokens__Filtered_In);
// 		$stringOf_Trans_Strings	= join(",", $aryOf_Tokens__Filtered_Out);
		
// 		printf("[%s : %d] \$stringOf_Trans_Strings =>",
					
// 				basename(__FILE__), __LINE__);
		
// 		print ("\n");
		
// 		print ($stringOf_Trans_Strings);
// 		print ("\n");
		
		/********************
		 * step : 6
		 * 	string : to file
		 ********************/
		$tlabel = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
		
		$fname_Trans_Out	= "trans_$tlabel.txt";
		
		$dpath_Trans_Out	= "C:\\WORKS_2\\WS\\WS_Others.JVEMV6\\JVEMV6\\70_co2\\trans";
		
		$fpath_Trans_Out	= join(
				
				DIRECTORY_SEPARATOR
				, array($dpath_Trans_Out, $fname_Trans_Out)
				
				);
		
		$fout	= fopen($fpath_Trans_Out, "w");
		
		# write
		$result	= fwrite($fout, $stringOf_Trans_Strings);
		
		# close
		fclose($fout);
		
		printf("[%s : %d] file written =>",
					
				basename(__FILE__), __LINE__);
		
		print ("\n");
		
		print ($fpath_Trans_Out);
		print ("\n");
		
		/********************
		 * step : 7
		 * 	file : open
		 ********************/
		$commnad_line = "start $fpath_Trans_Out";
// 		$commnad_line = "C:\\WORKS_2\\Programs\\sakura\\sakura.exe $fpath_Trans_Out";
		
		//debug
		printf("[%s : %d] opening file... '$fpath_Trans_Out'",
					
				basename(__FILE__), __LINE__);
		
		print ("\n");
		
		exec($commnad_line);
		
				
	}//function build_Trans_String__Chinese() {
	
	
// // 	test_1();
	
// 	//test
// 	var_dump($argv);
	
// 	var_dump("count(\$argv) => ");
// 	var_dump(count($argv));
	
// // 	var_dump(get_class(count($argv)));
	
	
// 	return ;

	function main_operation() {
		
		/********************
		* step : 1
		********************/
// 		test_1();
		build_Trans_String__Chinese();
		
		
	}//function main_operation() {
	
	/********************
	* 	main
	* 
	* 	parameter
	* 		1	==> gen_Memo_String_From_File()
	* 		no param ==> gen_Memo_String_From_File()
	********************/
	//_20200526_095214:next
	main_operation();
	
// 	gen_Memo_String_From_File();
	