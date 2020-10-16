<?php

/*

pushd C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\others\37#26_D7QD
php session-3.php

php C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\others\37#26_D7QD\session-3.php
	
	at : 2020/10/13 14:46:04

<usage>
	test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums)
	
	==> 		$aryOf_SetOf_Ops = array(
				
						array	(0,	1)		//=> transpose : index 0 and 1
						, array	(1,	2)		//=> transpose : index 1 and 2
						, array	(2,	3)		//=> transpose : index 2 and 3
				);

pushd C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\others\37#26_D7QD

 */

// 	echo "yes";
	
	require 'C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/cons.php';
	require 'C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/utils.php';

	$dpath_Log_File = "C:\\WORKS_2\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\Lib\\others\\37#26_D7QD";
	
	$fname_Log_File = "D7QD.log";
	
	/********************
	* transposition($strOf_Target, $aryOf_Position_Pair)
	* 
	* at : 2020/10/13 14:51:50
	* 
	********************/
	function transposition($strOf_Target, $aryOf_Position_Pair) {
		
		/********************
		* step : 1
		* 	get : indices
		********************/
		$idx_1 = $aryOf_Position_Pair[0];
		$idx_2 = $aryOf_Position_Pair[1];
		
		/********************
		* step : 2
		* 	transpose
		********************/
		/********************
		* step : 2 : 1
		* 	prep : store char
		********************/
		$charOf_tmp = $strOf_Target[$idx_1];
		
		/********************
		 * step : 2 : 2
		 * 	transpose
		 ********************/
		$strOf_Target[$idx_1]	= $strOf_Target[$idx_2];
		
		$strOf_Target[$idx_2]	= $charOf_tmp;
		
		/********************
		 * step : 3
		 * 	return
		 ********************/
		$valOf_Ret = $strOf_Target;
		
		// return
		return $valOf_Ret;
		
		
		
	}//function transposition($strOf_Target, $aryOf_Position_Pair) {
	
	function test_1() {
		
		/********************
		* step : 1
		* 	prep
		********************/
		echo "test_1";
		echo "\n";
		echo "\n";
		
// 		$dpath_Log_File = "C:\\WORKS_2\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\Lib\\others\\37#26_D7QD";
		
// 		$fname_Log_File = "D7QD.log";
		
		$msg = "log file ==> $fname_Log_File";
		
		Utils::write_Log__Simple(
				
				$dpath_Log_File, $fname_Log_File
				, $msg, basename(__FILE__), __LINE__);
		
		$msg = "log written ==> $fname_Log_File";
		
		debug_Message($msg, basename(__FILE__), __LINE__);

		/********************
		 * step : 2
		 * 	transpose : A-B-C
		 ********************/
		$strOf_Target = "1234";
		
		$aryOf_Position_Pair__1_2	= array(0, 1);
		$aryOf_Position_Pair__2_3	= array(1,2);
		$aryOf_Position_Pair__3_4	= array(2,3);
		
		//debug
		$msg = "\$strOf_Target : $strOf_Target";
		$msg .= "\n";
		
		$msg .= "position pair : " . $aryOf_Position_Pair__1_2[0] . "/" . $aryOf_Position_Pair__1_2[1];
		$msg .= "\n";
		
		$strOf_Target__Transposed_1_2 = transposition($strOf_Target, $aryOf_Position_Pair__1_2);
		$strOf_Target__Transposed_2_3 = transposition($strOf_Target__Transposed_1_2, $aryOf_Position_Pair__2_3);
		$strOf_Target__Transposed_3_4 = transposition($strOf_Target__Transposed_2_3, $aryOf_Position_Pair__3_4);

		// debug
		$msg .= "\n";
		
		$msg .= "transposed : ";
		$msg .= "\n";
		
		$msg .= "\$strOf_Target__Transposed_1_2\t$strOf_Target__Transposed_1_2";
		$msg .= "\n";
		
		$msg .= "\$strOf_Target__Transposed_2_3\t$strOf_Target__Transposed_2_3";
		$msg .= "\n";
		
		$msg .= "\$strOf_Target__Transposed_3_4\t$strOf_Target__Transposed_3_4";
		$msg .= "\n";
		
		debug_Message($msg, basename(__FILE__), __LINE__);
		
		Utils::write_Log__Simple(
				
				$dpath_Log_File, $fname_Log_File
				, $msg, basename(__FILE__), __LINE__);
		
	}//function test_1() {

	/********************
	* test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums)
	* 
	* @return
	* 	array(
	* 		$strOf_Target = 1234
	* 		, $aryOf_Op_Nums	1-2-1
			, $strOf_Target__tmp = 1432
	********************/
	function test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums, $_strOf_Target	= "1234") {
		/********************
		* step : 1
		* 	prep
		********************/
		$lenOf_AryOf_SetOf_Ops	= count($aryOf_SetOf_Ops);
		$lenOf_AryOf_Op_Nums	= count($aryOf_Op_Nums);
		
		// vars
		global $dpath_Log_File, $fname_Log_File;
		
		// target string
		$strOf_Target	= $_strOf_Target;
// 		$strOf_Target	= "1234";
		
		$strOf_Target__tmp = $strOf_Target;

		// list
		$aryOf_Results = array();
		
		//debug
		$msg	= "\n";
		
		$msg	.= "========================================= test_2_Multi_Ops";
		$msg	.= "\n";
		
		$msg	.= "\$strOf_Target\t$strOf_Target";
		$msg	.= "\n";
		
		$msg	.= "\$aryOf_Op_Nums\t" . join("-", $aryOf_Op_Nums);
		$msg	.= "\n";
		
			
// 		//debug
// 		debug_Message($msg, basename(__FILE__), __LINE__);
			
		Utils::write_Log__Simple(
				$dpath_Log_File, $fname_Log_File
				, $msg, basename(__FILE__), __LINE__);
		
		
		/********************
		 * step : 2
		 * 	iterate : 
		 ********************/
		for ($i = 0; $i < $lenOf_AryOf_SetOf_Ops; $i++) {
			/********************
			 * step : 2 : 1
			 * 	get : prep
			 ********************/
			$aryOf_Position_Pair_Traget = $aryOf_SetOf_Ops[$aryOf_Op_Nums[$i]];
// 			$aryOf_Position_Pair_Traget = $aryOf_SetOf_Ops[$i];
			
			$msg	= "\n";
			
			$msg	.= "\$i\t$i";
			$msg	.= "\n";
			
			$msg	.= "target position pair\t" . $aryOf_Position_Pair_Traget[0] . " / " . $aryOf_Position_Pair_Traget[1];
			$msg	.= "\n";
			
			// separator line
			$msg	.= "\n;";
		
// 			//debug
// 			debug_Message($msg, basename(__FILE__), __LINE__);
			
			Utils::write_Log__Simple(
					$dpath_Log_File, $fname_Log_File
					, $msg, basename(__FILE__), __LINE__);

			/********************
			 * step : 2 : 2
			 * 	transpose
			 ********************/
			//debug
			$msg	= "\n;";
			
			$msg	.= "(before)\$strOf_Target__tmp\t$strOf_Target__tmp";
			$msg	.= "\n;";
			
			$msg	.= "transposing... (" . $aryOf_Position_Pair_Traget[0] . " / " . $aryOf_Position_Pair_Traget[1] . ")";
			$msg	.= "\n;";
			
			// execute
			$strOf_Target__tmp = transposition($strOf_Target__tmp, $aryOf_Position_Pair_Traget);

			$msg	.= "(after)\$strOf_Target__tmp\t$strOf_Target__tmp";
			$msg	.= "\n;";
			
			// separator line
			$msg	.= "\n;";
				
// 			//debug
// 			debug_Message($msg, basename(__FILE__), __LINE__);
			
			Utils::write_Log__Simple(
					$dpath_Log_File, $fname_Log_File
					, $msg, basename(__FILE__), __LINE__);
			
		}//for ($i = 0; $i < $lenOf_AryOf_SetOf_Ops; $i++)

		/********************
		* report : final products
		********************/
		$msg	= "\n;";
		$msg	.= "--------------------- final report";
		$msg	.= "\n;";

		$msg	.= "\$aryOf_Op_Nums\t" . join("-", $aryOf_Op_Nums);
		$msg	.= "\n";
				
		$msg	.= "\$strOf_Target = $strOf_Target / \$strOf_Target__tmp = $strOf_Target__tmp";
		$msg	.= "\n;";
			
		// separator line
		$msg	.= "\n;";
		
		//debug
		debug_Message($msg, basename(__FILE__), __LINE__);
			
		Utils::write_Log__Simple(
				$dpath_Log_File, $fname_Log_File
				, $msg, basename(__FILE__), __LINE__);

		/********************
		 * return
		 ********************/
		// prep : val
		$valOf_Ret = array($strOf_Target, join("-", $aryOf_Op_Nums), $strOf_Target__tmp);
		
		// return
		return $valOf_Ret;
		
	}//function test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums) {
	
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

	function main_operation() {
		
// 		test_1();

		/********************
		* test_2_Multi_Ops
		* 		prep
		********************/
		$aryOf_SetOf_Ops = array(
				
				array	(0,	1)
				, array	(1,	2)
				, array	(2,	3)
		);
		
		$aryOf_Op_Nums__AAA	= array(0, 0, 0);
		$aryOf_Op_Nums__AAB	= array(0, 0, 1);
		$aryOf_Op_Nums__AAC	= array(0, 0, 2);
		
		$aryOf_Op_Nums__ABA	= array(0, 1, 0);
		$aryOf_Op_Nums__ABB	= array(0, 1, 1);
		$aryOf_Op_Nums__ABC	= array(0, 1, 2);
		
		$aryOf_Op_Nums__ACA	= array(0, 2, 0);
		$aryOf_Op_Nums__ACB	= array(0, 2, 1);
		$aryOf_Op_Nums__ACC	= array(0, 2, 2);
		
		$aryOf_Op_Nums__BAA	= array(1, 0, 0);
		$aryOf_Op_Nums__BAB	= array(1, 0, 1);
		$aryOf_Op_Nums__BAC	= array(1, 0, 2);
		
		$aryOf_Op_Nums__BCA	= array(1, 2, 0);
		$aryOf_Op_Nums__BCB	= array(1, 2, 1);
		$aryOf_Op_Nums__BCC	= array(1, 2, 2);
		
		$aryOf_Op_Nums__CAA	= array(2, 0, 0);
		$aryOf_Op_Nums__CAB	= array(2, 0, 1);
		$aryOf_Op_Nums__CAC	= array(2, 0, 2);
		
		$aryOf_Op_Nums__CBA	= array(2, 1, 0);
		$aryOf_Op_Nums__CBB	= array(2, 1, 1);
		$aryOf_Op_Nums__CBC	= array(2, 1, 2);
		
		/********************
		* test_2_Multi_Ops
		* 		execute
		********************/
		// 		test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums__AAA);
// 		test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums__AAB);
// 		test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums__AAC);

// 		test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums__ABA);
// 		test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums__ABB);
// 		test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums__ABC);

// 		test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums__ACA);
// 		test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums__ACB);
// 		test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums__ACC);
		
// 		test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums__BAA);
// 		test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums__BAB);
// 		test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums__BAC);
		
		test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums__BCA);
		test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums__BCB);
		test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums__BCC);
		
// 		test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums__CAA);
// 		test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums__CAB);
// 		test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums__CAC);
		
// 		test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums__CBA);
// 		test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums__CBB);
// 		test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums__CBC);
		
	}//function main_operation() {
	
	function get_AryOf_Op_Nums() {

		$aryOf_Op_Nums	= array(
		
				/********************
				 * AXX
		********************/
				array(0, 0, 0)
				, array(0, 0, 1)
				, array(0, 0, 2)
		
				, array(0, 1, 0)
				, array(0, 1, 1)
				, array(0, 1, 2)
		
				, array(0, 2, 0)
				, array(0, 2, 1)
				, array(0, 2, 2)
		
				/********************
				 * BXX
		********************/
				, array(1, 0, 0)			//$aryOf_Op_Nums__BAA
				, array(1, 0, 1)
				, array(1, 0, 2)
		
				, array(1, 1, 0)
				, array(1, 1, 1)
				, array(1, 1, 2)
		
				, array(1, 2, 0)
				, array(1, 2, 1)
				, array(1, 2, 2)
		
				/********************
				 * CXX
		********************/
				, array(2, 0, 0)
				, array(2, 0, 1)
				, array(2, 0, 2)
		
				, array(2, 1, 0)
				, array(2, 1, 1)
				, array(2, 1, 2)
		
				, array(2, 2, 0)
				, array(2, 2, 1)
				, array(2, 2, 2)
		
		);
		
		// return
		return $aryOf_Op_Nums;

	}//function get_AryOf_Op_Nums() {
	
	/********************
	* get_AryOf_Op_Nums__V2
	* at : 2020/10/15 15:52:18
	********************/
	function conv_Hex_2_Three($num, $numOf_Digits) {
		
		/********************
		* step : 0
		********************/
		/********************
		* step : 0 : 1
		* 	vars
		********************/
		$aryOf_Digits = array();
		
		$numOf_Current_Digit = 0;
		
		$num_tmp = $num;
		
		/********************
		* step : 0 : 2
		* 	init
		********************/
		for ($i = 0; $i < $numOf_Digits; $i++) {
		
			array_push($aryOf_Digits, 0);
			
		}//for ($i = 0; $i < $numOf_Digits; $i++)
		
		/********************
		* step : 1
		********************/
		$base_num = 3;
		
// 		$div		= $num_tmp / $base_num;
		$div		= (int)($num_tmp / $base_num);
		$residue	= $num_tmp % $base_num;
		
		//debug
		$message = sprintf("\$num_tmp = %d\n\$base_num = %d\n\$div = %d\n\$residue = %d\n\$numOf_Current_Digit = %d"
						, $num_tmp, $base_num, $div, $residue, $numOf_Current_Digit);
		debug_Message($message, basename(__FILE__), __LINE__);

		/********************
		* j1
		********************/
		if ($div == 0) {
			/********************
			 * j1 : Y : 1
			 ********************/
			$aryOf_Digits[$numOf_Current_Digit] = $residue;
			
			//debug
			$message	= "(j1 : Y : 1)";
			$message	.= "\n";
			
			$message	.= "\$aryOf_Digits : " . join("-", $aryOf_Digits);
			$message	.= "\n";
			
			debug_Message($message, basename(__FILE__), __LINE__);

			/********************
			 * j1 : Y : 2
			 ********************/
			$numOf_Current_Digit	+= 1;

			//debug
			$message	= "(j1 : Y : 2)";
			$message	.= "\n";
				
			$message	.= "\$numOf_Current_Digit ==> incremented : $numOf_Current_Digit";
			$message	.= "\n";
				
			debug_Message($message, basename(__FILE__), __LINE__);
				
			//debug
			break;
			
		} else {//if ($div == 0)
			/********************
			 * j1 : N : 1
			 ********************/
			$aryOf_Digits[$numOf_Current_Digit] = $residue;
				
			//debug
			$message	= "(j1 : N : 1)";
			$message	.= "\n";
				
			$message	.= "\$aryOf_Digits : " . join("-", $aryOf_Digits);
			$message	.= "\n";
				
			debug_Message($message, basename(__FILE__), __LINE__);

			/********************
			 * j1 : N : 2
			 * 		target ==> update
			 ********************/			
			$num_tmp	= $div;

			//debug
			$message	= "(j1 : N : 2)";
			$message	.= "\n";
			
			$message	.= "\$num_tmp ==> updated : $num_tmp";
			$message	.= "\n";
			
			debug_Message($message, basename(__FILE__), __LINE__);

			/********************
			 * j1 : N : 3
			 * 		index ==> increment
			 ********************/
			$numOf_Current_Digit	+= 1;

			//debug
			$message	= "(j1 : N : 3)";
			$message	.= "\n";
				
			$message	.= "\$numOf_Current_Digit ==> updated : $numOf_Current_Digit";
			$message	.= "\n";
				
			debug_Message($message, basename(__FILE__), __LINE__);
				
					
		}//if ($div == 0)
		;
		
	}//function conv_Hex_2_Three($num) {

	/********************
	* get_AryOf_Op_Nums__V2
	* at : 2020/10/15 15:52:18
	********************/
	function get_AryOf_Op_Nums__V2() {

		/********************
		* step : 1
		* 		prep : vars
		********************/
		$aryOf_Op_Nums	= array();
		
		$numOf_Digits = 4;
// 		$numOf_Digits = 3;
		
		/********************
		 * step : 2
		 * 		gen
		 ********************/
		$aryOf_Tmp = array();

// 		$k = 1;
// 		$k = 0;

		// v-5.0	// 20201016_143012
		$i		= 0;
		$j		= 0;
		
		$a1		= array();
// 		$a2		= array();
		
		$maxOf_Num_Val	= 2;

		// v-6.0	// 20201016_145540
		$num			= 11;
		$numOf_Digits	= 4;
		
		$strOf_Num = conv_Hex_2_Three($num, $numOf_Digits);
		
// 		// v-5.0	// 20201016_143012
// 		while ($i <= $maxOf_Num_Val) {
			
// 			while ($j <= $maxOf_Num_Val) {
				
// 				// push
// 				array_push($a1, $i);
				
// 				// increment
// 				$j += 1;
				
// 			}//while ($j <= $maxOf_Num_Val) {
			
// 			// increment
// 			$i += 1;
			
// 		}//while ($i <= $maxOf_Num_Val) {
		
// 		// v-4.1	// 20201016_142102
// 		for ($m = 0; $m < 3; $m ++) {
			
// 			for ($l = 0; $l < 3; $l ++) {
					
// 				for ($k = 0; $k < 3; $k++) {
						
// 					for ($j = 0; $j < 3; $j++) {
							
// 	// 					// digit : 0
// 	// 					for ($i = 0; $i < 1; $i++) {
// 	// 						// 					for ($i = 0; $i < 2; $i++) {
								
// 	// 						array_push($aryOf_Tmp, 0);
								
// 	// 					}//for ($i = 0; $i < 4; $i++)
							
// 						// digit : 0
// 						array_push($aryOf_Tmp, $m);
							
// 						// digit : 1
// 						array_push($aryOf_Tmp, $l);
							
// 						// digit : 2
// 						array_push($aryOf_Tmp, $k);
// 						// 			array_push($aryOf_Tmp, 0);
							
// 						array_push($aryOf_Tmp, $j);
			
// 						// push ==> to : $aryOf_Op_Nums
// 						array_push($aryOf_Op_Nums, $aryOf_Tmp);
			
// 						// $aryOf_Tmp ==> clear
// 						$aryOf_Tmp = array();
			
// 					}//for ($j = 0; $j < 3; $j++)
						
// 				}//for ($k = 0; $k < 3; $k++)
			
// 			}//for ($l = 0; $l < 3; $l ++) {		
		
// 		}//for ($m = 0; $m < 3; $m ++) {
			
// 		// v-4.0	// 20201016_142102
// 		for ($l = 0; $l < 3; $l ++) {
			
// 			for ($k = 0; $k < 3; $k++) {
			
// 				for ($j = 0; $j < 3; $j++) {
			
// 					// digit : 0
// 					for ($i = 0; $i < 1; $i++) {
// // 					for ($i = 0; $i < 2; $i++) {
			
// 						array_push($aryOf_Tmp, 0);
			
// 					}//for ($i = 0; $i < 4; $i++)
			
// 					// digit : 1
// 					array_push($aryOf_Tmp, $l);
					
// 					// digit : 2
// 					array_push($aryOf_Tmp, $k);
// 					// 			array_push($aryOf_Tmp, 0);
			
// 					array_push($aryOf_Tmp, $j);
						
// 					// push ==> to : $aryOf_Op_Nums
// 					array_push($aryOf_Op_Nums, $aryOf_Tmp);
						
// 					// $aryOf_Tmp ==> clear
// 					$aryOf_Tmp = array();
						
// 				}//for ($j = 0; $j < 3; $j++)
			
// 			}//for ($k = 0; $k < 3; $k++)

// 		}//for ($l = 0; $l < 3; $l ++) {
		
// 		// v-3.0
// 		for ($k = 0; $k < 3; $k++) {
		
// 			for ($j = 0; $j < 3; $j++) {
// 	// 		for ($j = 0; $j < 2; $j++) {
// 				// 			for ($j = 0; $j < 3; $j++) {
					
// 	// 			// digit : 0
// 	// 			array_push($aryOf_Tmp, $k);
// 	// // 			array_push($aryOf_Tmp, 0);
				
// 				for ($i = 0; $i < 2; $i++) {
// 	// 			for ($i = 0; $i < 3; $i++) {
		
// 					array_push($aryOf_Tmp, 0);
						
// 				}//for ($i = 0; $i < 4; $i++)
	
// 				// digit : 2
// 				array_push($aryOf_Tmp, $k);
// 				// 			array_push($aryOf_Tmp, 0);
						
// 				array_push($aryOf_Tmp, $j);
					
// 				// push ==> to : $aryOf_Op_Nums
// 				array_push($aryOf_Op_Nums, $aryOf_Tmp);
					
// 				// $aryOf_Tmp ==> clear
// 				$aryOf_Tmp = array();
					
// 			}//for ($j = 0; $j < 3; $j++)

// 		}//for ($k = 0; $k < 3; $k++)
			
					
		// v-2.0
// 		for ($k = 0; $k < 2; $k++) {
		
// 			// push : 0
// 			array_push($aryOf_Tmp, 0);
			
// 			for ($j = 0; $j < 2; $j++) {
// // 			for ($j = 0; $j < 3; $j++) {
			
// 				for ($i = 0; $i < 3; $i++) {
						
// 					array_push($aryOf_Tmp, 0);
			
// 				}//for ($i = 0; $i < 4; $i++)
					
// 				array_push($aryOf_Tmp, $j);
					
// 				// push ==> to : $aryOf_Op_Nums
// 				array_push($aryOf_Op_Nums, $aryOf_Tmp);
					
// 				// $aryOf_Tmp ==> clear
// 				$aryOf_Tmp = array();
					
// 			}//for ($j = 0; $j < 3; $j++)

// 		}//for ($k = 0; $k < 2; $k++)
		
		
		
		// v-1.0
// 		for ($j = 0; $j < 3; $j++) {
		
// 			for ($i = 0; $i < 3; $i++) {
			
// 				array_push($aryOf_Tmp, 0);
				
// 			}//for ($i = 0; $i < 4; $i++)
			
// 			array_push($aryOf_Tmp, $j);
			
// 			// push ==> to : $aryOf_Op_Nums
// 			array_push($aryOf_Op_Nums, $aryOf_Tmp);
			
// 			// $aryOf_Tmp ==> clear
// 			$aryOf_Tmp = array();
			
// 		}//for ($j = 0; $j < 3; $j++)
		
// 		for ($i = 0; $i < $numOf_Digits; $i++) {
		
// 			for ($j = 0; $j < $numOf_Digits; $j++) {
			
// 				for ($k = 0; $k < $numOf_Digits; $k++) {
				
// 					// append
// 					array_push($aryOf_Op_Nums, array($i, $j, $k));
					
// 				}//for ($k = 0; $k < $numOf_Digits; $k++)
// 				;
				
// 			}//for ($j = 0; $j < $numOf_Digits; $j++)
// 			;
			
// 		}//for ($i = 0; $i < $numOf_Digits; $i++)
		
		
		
		// return
		return $aryOf_Op_Nums;

	}//function get_AryOf_Op_Nums__V2() {
	
	function main_operation__V2() {
		
		/********************
		* test_2_Multi_Ops
		* 		prep
		********************/
		/********************
		* test_2_Multi_Ops
		* 		prep : 1. set of ops
		********************/
		$aryOf_SetOf_Ops = array(
				
				array	(0,	1)
				, array	(1,	2)
				, array	(2,	3)
		);

		/********************
		* test_2_Multi_Ops
		* 		prep : 2. set of sequence nums
		********************/
		//code:20201015_151422
		$aryOf_Op_Nums__BXX	= get_AryOf_Op_Nums__V2();
// 		$aryOf_Op_Nums__BXX	= get_AryOf_Op_Nums();
		
		//debug
		$message = "calling ==> get_AryOf_Op_Nums__V2";
		debug_Message($message, basename(__FILE__), __LINE__);

		print_r($aryOf_Op_Nums__BXX);
		return;
		

		$lenOf_AryOf_Op_Nums__BXX = count($aryOf_Op_Nums__BXX);
		
		/********************
		 * test_2_Multi_Ops
		 * 		prep : 3. vars
		 ********************/
		$aryOf_Log_Lines = array();
		
		global $dpath_Log_File;

		// target string
// 		$strOf_Target	= "abcd";
		$strOf_Target	= "1234";
		
		/********************
		* test_2_Multi_Ops
		* 		execute
		********************/
		// execute : iteration
		for ($i = 0; $i < $lenOf_AryOf_Op_Nums__BXX; $i++) {
		
			/********************
			* step : 1
			* 		get : entry
			********************/
			$aryOf_Op_Nums = $aryOf_Op_Nums__BXX[$i];
			
			$tmp = test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums, $strOf_Target);
// 			$tmp = test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums);
			$tmp_new = join("\t", $tmp);
			
			array_push($aryOf_Log_Lines, $tmp_new);
			
		}//for ($i = 0; $i < $lenOf_AryOf_Op_Nums__BXX; $i++)
		
		// build : log string
		$strOf_Log_Lines	=	"\n";
		$strOf_Log_Lines	.=	join("\n", $aryOf_Log_Lines);
		
		// file name
		$fname_Dat = "D7QD.data.[" . Utils::get_CurrentTime2(CONS::$timeLabelTypes["serial"]) . "]" . ".dat";
		
		Utils::write_Log__Simple(
				$dpath_Log_File, $fname_Dat
				, $strOf_Log_Lines, basename(__FILE__), __LINE__);
// 				, $tmp, basename(__FILE__), __LINE__);
		
		
	}//function main_operation__V2() {
	
	/********************
	* 	main
	* 
	* 	parameter
	* 		1	==> gen_Memo_String_From_File()
	* 		no param ==> gen_Memo_String_From_File()
	********************/
	//_20200526_095214:next
	main_operation__V2();
// 	main_operation();
	
// 	gen_Memo_String_From_File();
	