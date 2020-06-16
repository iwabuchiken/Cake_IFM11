<?php

/*

	php C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\others\jve_37_12.6_keyboard-memo\keyboard-memo.php
	
	at : 2020/05/26 08:07:35
	
	[1] res free# JVEMV6 37#12.6_XX / 37. miscs / 12. programming / 6. keyboard-memo-file /  20200526_080752
	
 */

// 	echo "yes";
	
	require 'C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/utils.php';
// 	require 'C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/cons.php';

	function test_1() {
		
		echo "test_1";
		echo "\n";
		echo "\n";
		
		echo "CONS::\$charOf_Sort_Delimiter_CSV_Line => " . CONS::$charOf_Sort_Delimiter_CSV_Line;
		echo "\n";
		echo "\n";
		
		$tlabel = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
		
		echo $tlabel;
		echo "\n";
		echo "\n";

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
	
	function show_Usage_Message() {
		
		// message
		debug_Message("\n<Usage>", basename(__FILE__), __LINE__);
		
		$msg = "\t1\tgen_Memo_String_From_File";
		
		echo $msg;
	}
	
	function debug_Message
	($message, $file, $line, $flag_Separator_Line = true) {

		//debug
		$msg_tmp = "[" . $file . ":" . $line . "] $message";
		
		// separator
		if ($flag_Separator_Line == true) {
		
			$msg_tmp .= "\n";
			
		}//if ($flag_Separator_Line == true)
		;
		
		echo $msg_tmp;
	
	}//function debug_Message

	/********************
	* gen_Memo_String_From_File
	* 
	* at : 2020/05/26 09:39:28
	* 
	* <Usage>
	* 
	* 	target memo file : C:\WORKS_2\WS\WS_Others.Art\JVEMV6\46_art\8_kb
	* 	
	* <Steps>
	* 	1. enter stings to the memo file
	* 	2. save the file
	* 	3. run this file
	* 		php C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\others\jve_37_12.6_keyboard-memo\keyboard-memo.php
	* 
	********************/
	function gen_Memo_String_From_File() {
		
		/******************
		 * step : 1
		 * 		prep
		 ****************/
		//debug
		$msg_tmp = "gen_Memo_String_From_File ==> starting...";
		
		debug_Message($msg_tmp, basename(__FILE__), __LINE__);
		
// 		$msg_tmp = "[" . basename(__FILE__) . ":" . __LINE__ . "]";
// 		$msg_tmp .= " "
// 				. "gen_Memo_String_From_File ==> starting...";
		
// 		echo $msg_tmp;
		
		/******************
		 * step : 1 : 1
		 * 		vars
		 ****************/
		//C:\WORKS_2\WS\WS_Others.Art\JVEMV6\46_art\8_kb
		//$dpath_Memo_File = "C:\\WORKS_2\\WS\\WS_Others.Art\\JVEMV6\\46_art\\8_kb";
		$dpath_Memo_File = "C:\\WORKS_2\\WS\\WS_Others.Art\\JVEMV6\\46_art\\8_kb\\memo_string";
		
		$fname_Memo_File = "kb_memo_template.txt";
		
		// fpath
		$fpath_Memo_File = join(DIRECTORY_SEPARATOR, array($dpath_Memo_File, $fname_Memo_File));
		
		debug_Message($fpath_Memo_File, basename(__FILE__), __LINE__);

		/******************
		 * step : 2
		 * 		load : file content
		 ****************/
		$linesOf_File = file($fpath_Memo_File);
		
// 		debug_Message("\$linesOf_File =>", basename(__FILE__), __LINE__);
		
// 		print_r($linesOf_File);
		
		/******************
		 * step : 3
		 * 		lines ==> filter
		 ****************/
		/******************
		 * step : 3 : 1
		 * 		lines : equal value lines
		 ****************/
		$linesOf_File__Filtered = array();
		
		// prep
		$p = "/\d+\t(.+)=/";
// 		$p = "^\\d+\\t(.+)=";
		
		foreach ($linesOf_File as $entry) {
		
			if (preg_match($p, $entry)) {
			
				array_push($linesOf_File__Filtered, $entry);
				
			}//if (preg_match($p, $entry))
			;
			
		}//foreach ($linesOf_File as $entry)
		
		//debug
			
// 		debug_Message("\$linesOf_File__Filtered", basename(__FILE__), __LINE__);
		
// 		print_r($linesOf_File__Filtered);

		/******************
		 * step : 3 : 2
		 * 		lines : values-set lines
		 ****************/
		$linesOf_File__Filtered_Has_Values = array();
		
		// prep
		$p = "/\d+\t(.+)=\r\n/";
		// 		$p = "^\\d+\\t(.+)=";
		
		foreach ($linesOf_File__Filtered as $entry) {
		
			if (!preg_match($p, $entry)) {
// 			if (preg_match($p, $entry)) {
					
				array_push($linesOf_File__Filtered_Has_Values, $entry);
		
			}//if (preg_match($p, $entry))
			;
				
		}//foreach ($linesOf_File as $entry)
		
		//debug
			
// 		debug_Message("\$linesOf_File__Filtered_Has_Values", basename(__FILE__), __LINE__);
		
// 		print_r($linesOf_File__Filtered_Has_Values);
		
		/******************
		 * step : 3 : 3
		 * 		lines : extract values
		 ****************/
		//prep
		$lo_Values = array();
		
		$p = "/\t/";
		
		// iterate
		foreach ($linesOf_File__Filtered_Has_Values as $entry) {
		
			// tokens : 1
			//ref https://www.php.net/manual/en/function.preg-split.php
			$tokens = preg_split($p, $entry);
				// 			[0] => 5
				// 			[1] => RH=grip+melody			
			// tokens : 2
			$tokens_2 = explode("=", $tokens[1]);
			
			
			//debug
// // 			debug_Message("\$tokens_2", basename(__FILE__), __LINE__);
// 			debug_Message("\$tokens", basename(__FILE__), __LINE__);
			
// 			print_r($tokens);
// 			print_r($tokens_2);
			
			// append
			$string_Cropped = preg_replace("/\r\n/", "", $tokens[1]);
// 			$string_Cropped = preg_replace("\r\n", "", $tokens[1]);
			
			
			
// 			array_push($lo_Values, $tokens_2[1]);
			array_push($lo_Values, $string_Cropped);
// 			array_push($lo_Values, $tokens[1]);
			
		}//foreach ($linesOf_File__Filtered_Has_Values as $entry)
		
		//debug
		debug_Message("\$lo_Values", basename(__FILE__), __LINE__);
		
		print_r($lo_Values);
		
		/******************
		 * step : 4
		 * 		vals ==> join
		 ****************/
		$string_Final = join(",", $lo_Values);
		
		/******************
		 * step : 5
		 * 		to clipboard
		 ****************/
		$tlabel = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
		
		$fpath_Tmp = join(DIRECTORY_SEPARATOR, array($dpath_Memo_File, "memo_string.($tlabel).txt"));
		
		$fout = fopen($fpath_Tmp, "w");
		
		fwrite($fout, $string_Final);
		
		fclose($fout);
		
		$commnad_line = "C:\\WORKS_2\\Programs\\sakura\\sakura.exe $fpath_Tmp";
		//$commnad_line = "call C:\\WORKS_2\\Programs\\sakura\\sakura.exe $fpath_Tmp";
		//$commnad_line = "start C:\\WORKS_2\\Programs\\sakura\\sakura.exe $fpath_Tmp";

		//debug
		debug_Message("commnad_line : $commnad_line", basename(__FILE__), __LINE__);

		//debug
		debug_Message("opening file : $fpath_Tmp", basename(__FILE__), __LINE__);
		
		exec($commnad_line);
		
// 		//debug
// 		debug_Message("clipboard ==> prep...", basename(__FILE__), __LINE__);
// 				//sc=dorian,key=C,chor=C;F;E笙ｭ,RH=grip+melody,LH=grip
		
// 		//
// 		$command_line = "echo $string_Final | clip";
// // 		$command_line = "echo $string_Final | clip";
		
// 		echo $command_line;
		
// 		exec($command_line);
		
// 		//ref https://www.php.net/manual/en/function.preg-replace.php
// 		$pattern		= "^\\d+\\t(.+)=\\r\\n";
// 		$replacement	= "";
		
// 		echo preg_replace($pattern, $replacement, $string);
		
	}//function gen_Memo_String_From_File() {
	
// // 	test_1();
	
// 	//test
// 	var_dump($argv);
	
// 	var_dump("count(\$argv) => ");
// 	var_dump(count($argv));
	
// // 	var_dump(get_class(count($argv)));
	
	
// 	return ;

	function main_operation() {

		if (count($argv) > 1) {
		
			if ($argv[1] == 1) {
			
				debug_Message("\n", basename(__FILE__), __LINE__);
				
				echo "param is 1; starting ==> gen_Memo_String_From_File()";
				
				gen_Memo_String_From_File();
			
			} else {
			
				echo "unknown parameter : " . $argv[1];
				echo "\n";
				
				show_Usage_Message();
				
			}//if ($argv[1] == 1)
			
		} else {
		
			gen_Memo_String_From_File();
			
		}//if (count($argv) > 1)
		
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
	