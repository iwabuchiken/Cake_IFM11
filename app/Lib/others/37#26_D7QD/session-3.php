<?php

/*

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
	
	require 'C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/utils.php';
// 	require 'C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/cons.php';

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
	
	function test_2_Multi_Ops($aryOf_SetOf_Ops, $aryOf_Op_Nums) {
		
		/********************
		* step : 1
		* 	prep
		********************/
		$lenOf_AryOf_SetOf_Ops	= count($aryOf_SetOf_Ops);
		$lenOf_AryOf_Op_Nums	= count($aryOf_Op_Nums);
		
		// vars
		global $dpath_Log_File, $fname_Log_File;
		
		// target string
		$strOf_Target	= "1234";
		
		$strOf_Target__tmp = $strOf_Target;

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
	