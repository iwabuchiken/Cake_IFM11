<?php

/*
 * 
php C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\others\37_12.8_random-combinations\random-combinations.php

pushd C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\others\37_12.8_random-combinations
php random-combinations.php
	
	at : 2020/11/24 17:21:34
	
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
	
	
	function main_operation() {

		/********************
		* step : 1
		* 		params
		********************/
		/********************
		* step : 1 : 1
		* 		params : keywords
		********************/
		$param_Keywords = "C;D;P;Q;S;U;V";
// 		$param_Keywords = "C;D;L;P;Q;S;U;V";
		
		$charOf_Keywords_Separator	= ";";
		
		$tokensOf_Keywords = explode($charOf_Keywords_Separator, $param_Keywords);
// 		$tokensOf_Keywords = explode(";", $param_Keywords);

		//debug
		$msg	= "\$tokensOf_Keywords =>";
		
		debug_Message($msg, basename(__FILE__), __LINE__);
		
		print_r($tokensOf_Keywords);

		/********************
		 * step : 1 : 2
		 * 		params : num of the source keywords
		 ********************/
		$lenOf_Keywords_Total = count($tokensOf_Keywords);

		//debug
		$msg	= "\$lenOf_Keywords_Total => $lenOf_Keywords_Total";
		
		debug_Message($msg, basename(__FILE__), __LINE__);

		/********************
		 * step : 1 : 3
		 * 		params : num of the keywords to combine
		 ********************/
		$lenOf_Keywords_To_Combine	= 2;
		
		//debug
		$msg	= "\$lenOf_Keywords_To_Combine => $lenOf_Keywords_To_Combine";
		
		debug_Message($msg, basename(__FILE__), __LINE__);

		/********************
		 * step : 1 : 4
		 * 		params : num of the combined sets to generate
		 ********************/
		$numOf_CombinedSet_To_Generate	= 3;
		
		//debug
		$msg	= "\$numOf_CombinedSet_To_Generate => $numOf_CombinedSet_To_Generate";
		
		debug_Message($msg, basename(__FILE__), __LINE__);

		/********************
		 * step : 2
		 * 		gen : rand nums
		 ********************/
		/********************
		 * step : 2 : 1
		 * 		gen : rand nums ==> 2 keywords
		 ********************/
		for ($i = 0; $i < $numOf_CombinedSet_To_Generate; $i++) {
		
			/********************
			 * step : 2 : 1
			 * 		gen : rand nums
			 ********************/
			$rand_Index_1	= -1;
			$rand_Index_2	= -1;
			
			while (true) {
				
				$rand_Index_1	= rand(0, ($lenOf_Keywords_Total - 1));
				$rand_Index_2	= rand(0, ($lenOf_Keywords_Total - 1));
				
				// judge
				if ($rand_Index_1 <> $rand_Index_2) {
				
					break;
					
				}//if ($rand_Index_1 <> $rand_Index_2)
					
			}//while (true) {
			
			//debug
			$msg	= "\$rand_Index_1 = $rand_Index_1 / , \$rand_Index_2 = $rand_Index_2";
			
			$msg	.= "\n";
			
			$msg	.= "1 => " . $tokensOf_Keywords[$rand_Index_1] 
						. " / "
						. "2 => "
						. $tokensOf_Keywords[$rand_Index_2];
// 						. "\n";
			
			debug_Message($msg, basename(__FILE__), __LINE__);
							
			
		}//for ($i = 0; $i < $numOf_CombinedSet_To_Generate; $i++)
		
		
		/********************
		 * step : 2 : 2
		 * 		gen : rand nums ==> 3 keywords
		 ********************/
		for ($i = 0; $i < $numOf_CombinedSet_To_Generate; $i++) {
		
			/********************
			 * step : 2 : 1
			 * 		gen : rand nums
			 ********************/
			$rand_Index_1	= -1;
			$rand_Index_2	= -1;
			$rand_Index_3	= -1;
			
			while (true) {
				
				$rand_Index_1	= rand(0, ($lenOf_Keywords_Total - 1));
				$rand_Index_2	= rand(0, ($lenOf_Keywords_Total - 1));
				$rand_Index_3	= rand(0, ($lenOf_Keywords_Total - 1));
				
				// judge
				$cond_1	= ($rand_Index_1 <> $rand_Index_2);
				$cond_2	= ($rand_Index_2 <> $rand_Index_3);
				$cond_3	= ($rand_Index_3 <> $rand_Index_1);
				
// 				if ($rand_Index_1 <> $rand_Index_2) {
				if ($cond_1 == true && $cond_2 == true && $cond_3 == true) {
				
					break;
					
				}//if ($rand_Index_1 <> $rand_Index_2)
					
			}//while (true) {
			
			//debug
			$msg	= "\$rand_Index_1 = $rand_Index_1 / \$rand_Index_2 = $rand_Index_2 / \$rand_Index_3 = $rand_Index_3";
			
			$msg	.= "\n";
			
			$msg	.= "1 => " . $tokensOf_Keywords[$rand_Index_1] 
						. " / "
						. "2 => "
						. $tokensOf_Keywords[$rand_Index_2]
						. " / "
						. "3 => "
						. $tokensOf_Keywords[$rand_Index_3];
// 						. "\n";
			
			debug_Message($msg, basename(__FILE__), __LINE__);
							
			
		}//for ($i = 0; $i < $numOf_CombinedSet_To_Generate; $i++)
		
		
		
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
	