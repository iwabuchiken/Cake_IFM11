<?php

/*

pushd C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\others\jve_70-CO2_68_trans-string\
echo =============================== >> log_process-texts-for-reading_korean.log && php process-texts-for-reading_korean.php >> log_process-texts-for-reading_korean.log && echo. >> log_process-texts-for-reading_korean.log

php process-texts-for-reading_korean.php

// echo =============================== >> log_process-texts-for-reading_korean.log && php process-texts-for-reading_korean.php >> log_process-texts-for-reading_korean.log && time >>  log_process-texts-for-reading_korean.log && echo. >> log_process-texts-for-reading_korean.log

	
	at : 20210510_172657
	
	orig : C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\others\jve_37_12.6_keyboard-memo\keyboard-memo.php
	
 */

// 	echo "yes";
	
	require 'C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/utils.php';

	function test_1() {

		$tlabel = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
		
		echo "test_1 ($tlabel) : " . basename(__FILE__);
// 		echo "test_1 ($tlabel)";
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
	
	function build_Texts_For_Reading() {
	
		/********************
		* step : 0
		********************/
		$tlabel = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
	
		#debug
		printf("[%s : %d] starting... : build_Texts_For_Reading (%s)"
				, basename(__FILE__), __LINE__
				, $tlabel
		);

		print("\n");
		
// 		echo "starting... : build_Texts_For_Reading ($tlabel)";
// 		// 		echo "build_Trans_String";
// 		echo "\n";
// 		echo "\n";

		/********************
		 * step : 1
		 * 	prep : vars
		 ********************/
		#code:20210517_142450
		$dpath_Trans_Dat	= "C:\\WORKS_2\\shortcuts_docs";
		
		//$fname_Trans_Dat	= "log-session_JVE_70.[CO2].[trans-sentences].dat";
		$fname_Trans_Dat	= "log-session_JVE_70-CO2_trans-sentences.dat";
		
		$fpath_Trans_Dat	= join(
				
				DIRECTORY_SEPARATOR
				, array($dpath_Trans_Dat, $fname_Trans_Dat)
				
				);
		
		#debug
		$message	= "\$fpath_Trans_Dat : $fpath_Trans_Dat";
		printf("[%s : %d]\n%s", basename(__FILE__), __LINE__, $message);
// 		printf("[%s : %d] %s", basename(__FILE__), __LINE__, $message);
		
		print("\n");
		
		/********************
		 * step : 2
		 * 	file : open
		 ********************/
		#code:20210517_142744
		$linesOf_File = file($fpath_Trans_Dat);

// 		#debug
// 		$message	= "\$linesOf_File =>";
// 		$message	.= "\n";
// 		$message	.= "\n";
		
// 		printf("[%s : %d] %s", basename(__FILE__), __LINE__, $message);

// 		print_r($linesOf_File);

		/********************
		 * step : 3 : 1
		 * 	regex : paragraph-end return char --> add a new line
		 ********************/
		$pattern = '/\.\r\n/';
		
		#prob:20210517_150538
		$charsOf_Replacement	= ".\r\r\r\r";
// 		$charsOf_Replacement	= ".\R\n\R\n\R\n\R\n";
				// 		잠재적 치료효과 를 나타낸다고 보고된다.\R
				// 		\R
				// 		\R
						
// 		$charsOf_Replacement	= ".\r\n\r\n\r\n\r\n";
// 		$charsOf_Replacement	= ".\r\n\r\n\r\n";
// 		$charsOf_Replacement	= ".\r\n\r\n";
// 		$charsOf_Replacement	= "\.\r\n\r\n";
// 		$charsOf_Replacement	= '\.\r\n\r\n';
		
		$aryOf_1_Matched_Lines__Paragraph_End_Return	= array();
		
		#debug
		printf("[%s : %d]\npattern --> $pattern"
		, basename(__FILE__), __LINE__
		);
		
		print("\n");
		
		foreach ($linesOf_File as $line) {
			
			#code:20210517_144312
			
			$result = preg_match($pattern, $line, $matches);
// 			$result = preg_match('/\.\r\n/', $line, $matches);
// 			$result = preg_match('/\r\n/', $line, $matches);
			
			//judge
			if ($result == 1) {
			
				#debug
#				printf("[%s : %d]\nmatch : line --> '$line'"
#						, basename(__FILE__), __LINE__
#				);
#				
#				print_r($matches);
#				print("\n");
# comment out : 2021年10月21日13:25:32				
				#code:20210517_145120
				# replace
				$line_Replaced	= preg_replace($pattern, $charsOf_Replacement, $line);
				
				array_push($aryOf_1_Matched_Lines__Paragraph_End_Return, $line_Replaced);
			
			} else {
			
// 				#debug
// 				printf("[%s : %d]\nNOT match : line --> '$line'"
// 				, basename(__FILE__), __LINE__
// 				);
				
// 				print_r($matches);
				
// 				print("\n");

				# add line --> to a new array
				array_push($aryOf_1_Matched_Lines__Paragraph_End_Return, $line);
				
			}//if ($result == 1)
			
		}//foreach ($linesOf_File as $line)
		
		#debug
#		printf("[%s : %d]\n\$aryOf_1_Matched_Lines__Paragraph_End_Return ==>"
#		, basename(__FILE__), __LINE__
#		);

#		print_r($aryOf_1_Matched_Lines__Paragraph_End_Return);
#
#		print("\n");
# comment out : 2021年10月21日13:24:57
		/********************
		 * step : 3 : 2
		 * 	regex : non-sentence-end return --> remove
		 ********************/
		$pattern = '/([^\.])\r\n/';
		
		$charsOf_Replacement	= "$1 ";
		// 		$charsOf_Replacement	= '\.\r\n\r\n';
		
		$aryOf_2_Matched_Lines__Nonsentence_End_Return	= array();
		
		#debug
		printf("[%s : %d]\npattern --> $pattern"
		, basename(__FILE__), __LINE__
		);
		
		print("\n");
		
		foreach ($aryOf_1_Matched_Lines__Paragraph_End_Return as $line) {
				
			$result = preg_match($pattern, $line, $matches);
				
			//judge
			if ($result == 1) {
					
				#debug
				//printf("[%s : %d]\nmatch : line --> '$line'"
				//, basename(__FILE__), __LINE__
				//);

				printf("[%s : %d]\nmatch : line -->"
				, basename(__FILE__), __LINE__
				);
				print($line);
				print("\n");
				
				print("\$matches ==>");
				print("\n");
		
				print_r($matches);
				print("\n");
		
				#code:20210517_145120
				# replace
				$line_Replaced	= preg_replace($pattern, $charsOf_Replacement, $line);
		
				array_push($aryOf_2_Matched_Lines__Nonsentence_End_Return, $line_Replaced);
					
			} else {
					
				// 				#debug
				// 				printf("[%s : %d]\nNOT match : line --> '$line'"
				// 				, basename(__FILE__), __LINE__
				// 				);
		
				// 				print_r($matches);
		
				// 				print("\n");
		
				# add line --> to a new array
				array_push($aryOf_2_Matched_Lines__Nonsentence_End_Return, $line);
		
			}//if ($result == 1)
				
		}//foreach ($linesOf_File as $line)
		
		#debug
#		printf("[%s : %d]\n\$aryOf_2_Matched_Lines__Nonsentence_End_Return ==>"
#				, basename(__FILE__), __LINE__
#		);
#		
#		print_r($aryOf_2_Matched_Lines__Nonsentence_End_Return);
#		
#		print("\n");
# commet out : 2021年10月21日13:24:18
		/********************
		 * step : 3 : 3
		 * 	regex : sentence-end period --> add : double return
		 ********************/
		#code:20210517_151904
		#([^0-9]\.) 	$1\r\n\r\n
		$pattern = '/([^0-9]\.) /';
		
		$charsOf_Replacement	= "$1\r\r";
// 		$charsOf_Replacement	= "$1\r\r\r";
		// 		$charsOf_Replacement	= '\.\r\n\r\n';
		
		$aryOf_3_Matched_Lines__Sentence_End_Period	= array();
		
		#debug
		printf("[%s : %d]\npattern --> $pattern"
		, basename(__FILE__), __LINE__
		);
		
		print("\n");
		
		foreach ($aryOf_2_Matched_Lines__Nonsentence_End_Return as $line) {
		
			$result = preg_match($pattern, $line, $matches);
		
			//judge
			if ($result == 1) {
					
				#debug
#				//printf("[%s : %d]\nmatch : line --> '$line'"
#				printf("[%s : %d]\nmatch : line -->"
#				, basename(__FILE__), __LINE__
#				);
#				print($line);
#				print("\n");
				
#				print("\$matches ==>");
#				print("\n");
				
#				print_r($matches);
#				print("\n");
# comment out : 2021年10月21日13:28:18
				#code:20210517_145120
				# replace
				$line_Replaced	= preg_replace($pattern, $charsOf_Replacement, $line);
		
				array_push($aryOf_3_Matched_Lines__Sentence_End_Period, $line_Replaced);
					
			} else {
					
				// 				#debug
				// 				printf("[%s : %d]\nNOT match : line --> '$line'"
				// 				, basename(__FILE__), __LINE__
				// 				);
		
				// 				print_r($matches);
		
				// 				print("\n");
		
				# add line --> to a new array
				array_push($aryOf_3_Matched_Lines__Sentence_End_Period, $line);
		
			}//if ($result == 1)
		
		}//foreach ($linesOf_File as $line)
		
		#debug
		#printf("[%s : %d]\n\$aryOf_3_Matched_Lines__Sentence_End_Period ==>"
		#		, basename(__FILE__), __LINE__
		#);
		### comment out : 2021年10月21日13:21:26
		#print_r($aryOf_3_Matched_Lines__Sentence_End_Period);
		
		#print("\n");
		
		/********************
		 * step : 3 : 4
		 * 	array --> join
		 ********************/
		$stringOf_Replaeced_Lines	= join(
				
				""
				, $aryOf_3_Matched_Lines__Sentence_End_Period
// 				, $aryOf_Matched_Lines__Nonsentence_End_Return
				
				);
		
		#debug
#		printf("[%s : %d] \$stringOf_Replaeced_Lines ==>"
#				, basename(__FILE__), __LINE__
#		);
#		
#		print($stringOf_Replaeced_Lines);
#		print("\n");

		/********************
		 * step : 4
		 * 	processed strings --> to a file
		 ********************/
		/********************
		 * step : 4 : 1
		 * 	vars
		 ********************/
		#code:20210517_151155
		$dpath_Texts_For_Reading__Processed	= "C:\\WORKS_2\\WS\\WS_Others.JVEMV6\\JVEMV6\\70_co2\\texts-for-reading";
		
		$fname_Texts_For_Reading__Processed	= "out.$tlabel.txt";

		$fpath_Texts_For_Reading__Processed	= join(
		
				DIRECTORY_SEPARATOR
				, array($dpath_Texts_For_Reading__Processed, $fname_Texts_For_Reading__Processed)
		
		);
		
		/********************
		 * step : 4 : 2
		 * 	file
		 ********************/
		$f_Out	= fopen($fpath_Texts_For_Reading__Processed, "w");
		
		# write
		$result	= fwrite($f_Out, $stringOf_Replaeced_Lines);
		
		# close
		fclose($f_Out);

		/********************
		 * step : 5
		 * 	file --> open
		 ********************/
		#code:20210518_123133
// 		$commnad_line = $fpath_Texts_For_Reading__Processed;	#=> editor process starts in the same process
		$commnad_line = "start $fpath_Texts_For_Reading__Processed";	#=> editor process starts in a different process
// 		$commnad_line = "C:\\WORKS_2\\Programs\\sakura\\sakura.exe $fpath_Texts_For_Reading__Processed";	#=> using 'sakura', the command line window halts at the calling step
		
		//debug
		printf("[%s : %d] opening file... '$fpath_Texts_For_Reading__Processed'",
					
				basename(__FILE__), __LINE__);
		
		print ("\n");
		
		exec($commnad_line);
		
		#debug
		printf("[%s : %d] file written ==>"
				, basename(__FILE__), __LINE__
		);
		
		print($fpath_Texts_For_Reading__Processed);
		print("\n");

				
		#debug
		printf("[%s : %d] returning..."
				, basename(__FILE__), __LINE__
		);
		
		print("\n");
		
		return;
		
		
				
	}//function build_Texts_For_Reading() {
	
	
	function main_operation() {
		
		/********************
		* step : 1
		********************/
// 		test_1();
		build_Texts_For_Reading();
		
		
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
	