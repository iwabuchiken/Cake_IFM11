<?php

/*
 * 
php C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\others\37_12.7_convert_time_label\convert_time_label.php

pushd C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\others\37_12.7_convert_time_label
php convert_time_label.php
	
	at : 2020/06/26 18:19:29
	
 */

	require 'C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/utils.php';

	/********************
	* convert_time_label
	* 
	* at : 2020/06/26 18:19:59
	* 
	* <Usage>
	* 
	* <Steps>
	* 
	********************/
	function convert_time_label() {
/*

pushd C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\others\37_12.7_convert_time_label
php convert_time_label.php 2020年6月26日18:10:28

 */
		/******************
		 * step : 1
		 * 		prep
		 ****************/
		//ref https://stackoverflow.com/questions/16429488/undefined-variable-argc-php
		global $argc, $argv;
		
		$tlabel = Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]);
		
		echo $tlabel;
		echo "\n";
		echo "\n";
		
		// separator
		echo "DIRECTORY_SEPARATOR => " . DIRECTORY_SEPARATOR;
		
		$msg	= "keyboard-memo.php ($tlabel)";
		$msg	.= "\n";
		
		$dpath_Log_File = "C:\\WORKS_2\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\Lib\\others\\37_12.7_convert_time_label";
		
		$fname_Log_File = "convert_time_label.log";
		
		Utils::write_Log__Simple(
		
				$dpath_Log_File, $fname_Log_File
				, $msg, basename(__FILE__), __LINE__);
		
		/******************
		 * step : 2
		 * 		vars
		 ****************/
		
		/******************
		 * step : 3
		 * 		ops
		 ****************/
		echo "\n";
		
		echo "[" . basename(__FILE__) . ":" . __LINE__ . "]";
		echo "\n";
		
// 		var_dump($argv);
		
		//ref https://www.php.net/manual/en/reserved.variables.argv.php
		var_dump($argv);
		
// 		// match
// 		//2020年6月26日17:56:15
// 		$regex = '/(\d{4}年)/';
// // 		$regex = '/(\d{4})([ぁ-んァ-ヶー一-龠])(\d*)(.*)/';
// // 		$regex = '/(\d{4})([ぁ-んァ-ヶー一-龠]*)(\d*)(.*)/';
// // 		$regex = '/(\d{4})(.*)(\d*)(.*)/';
// // 		$regex = '/\d{4}(.*)/';
// // 		$regex = '/(\d*{4})[ぁ-んァ-ヶー一-龠]/';
// // 		$regex = '/(\d*)[ぁ-んァ-ヶー一-龠]/';
// // 		$regex = '/(\d*)[ぁ-んァ-ヶー一-龠]+/';
// // 		$regex = '/(\d*)年/';
// // 		$regex = '/(\d*)/';
// // 		$regex = '/(\d*)年(\d*)月(\d*)日/';
		
// 		$target_string = $argv[1];
		
// 		$result_i = preg_match($regex, $target_string, $matches);
// // 		preg_match('/(foo)(bar)(baz)/', 'foobarbaz', $matches, PREG_OFFSET_CAPTURE);
		
		$tokens = preg_split([ぁ-んァ-ヶー一-龠], $argv[1]);
// 		$tokens = explode(":", $argv[1]);
		
		
		echo "\n";
		
		echo "[" . basename(__FILE__) . ":" . __LINE__ . "]";
		echo "\n";
		
		var_dump($tokens);
		
// 		echo "\$regex = $regex";
// 		echo "\n";
		
// 		echo "\$result_i = $result_i";
// 		echo "\n";
		
		
// 		var_dump($matches);
		
		
	}//function convert_time_label()
	
	function main_operation() {

		// exec
		convert_time_label();
		
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
	