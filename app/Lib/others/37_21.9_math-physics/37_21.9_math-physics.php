<?php

/*

pushd C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\others\37_21.9_math-physics
php 37_21.9_math-physics.php

php C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\others\37_21.9_math-physics\37_21.9_math-physics.php
	
	at : 2020/10/30 16:06:29

<usage>

pushd C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\others\37#26_D7QD

 */

// 	echo "yes";
	
	require 'C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/cons.php';
	require 'C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/utils.php';

	$dpath_Log_File = "C:\\WORKS_2\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\Lib\\others\\37_21.9_math-physics";
	
	$fname_Log_File = "37_21.9_math-physics.log";
	
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
	
	//next:20201030_163448
	function test_1() {
//head:20201030_163520
//caller:20201030_163529

		/********************
		* step : 0
		* 	get_Wilcockson_Data
		********************/
		/********************
		* step : 0 : 1
		* 	prep : vars
		********************/
		//code:20201031_171707
// 		$num_Iteratetion	= 5;
		$num_Iteratetion	= 50;
// 		$num_Iteratetion	= 20;
// 		$num_Iteratetion	= 4;
		
		// array
		$lo_Wilcockson_Data	= array();
		
		// global
		global $dpath_Log_File, $fname_Log_File;
		
		/********************
		* step : 0 : 2
		* 	iterate
		********************/
		for ($i = 0; $i < $num_Iteratetion; $i++) {
		
			// gen : data
			$valOf_Ret__Rcvd	= get_Wilcockson_Data();
			// 		* 	array(
					
			// 				$cntOf_0, $cntOf_1
			// 				, $sumOf_Order_0, $sumOf_Order_1
			// 		);
			
			
			
			// append
			array_push($lo_Wilcockson_Data, $valOf_Ret__Rcvd);
			
		}//for ($i = 0; $i < $num_Iteratetion; $i++)

		/********************
		 * step : 0 : 3
		 * 	write to file
		 ********************/
		/********************
		 * step : 0 : 3 : 1
		 * 	build : lines
		 ********************/
		$msg	= "\n";
		
		$msg	.= "\$num_Iteratetion\t$num_Iteratetion";
		$msg	.= "\n";

		$msg	.= "sn.\t\$cntOf_0\t\$cntOf_1\t\$sumOf_Order_0\t\$sumOf_Order_1"
				
					. "\t" . "ratio_cnt_0/1"
					. "\t" . "ratio_sum_0/1"
				;
		$msg	.= "\n";
		
		for ($i = 0; $i < $num_Iteratetion; $i++) {
		
			// get : entry
			$entry	= $lo_Wilcockson_Data[$i];
			
			// unpack
			$cntOf_0		= $entry[0];
			$cntOf_1		= $entry[1];
			$sumOf_Order_0	= $entry[2];
			$sumOf_Order_1	= $entry[3];
			
			// build : data
			$line	= sprintf("%d\t", ($i + 1));
			
			$line	.= join("\t", $entry);
			
// 			$msg	.= $line;
			
// 			$msg	.= "\t";
			
			$line	.= "\t";
			
// 			//debug
// 			print("\$cntOf_0 => " .  $cntOf_0);
// 			print("print_r(\$cntOf_0 / \$cntOf_1)");
// 			print("\n");
// 			print_r($cntOf_0 / $cntOf_1);
			
			// stats
			$line	.= sprintf("%.02f\t%.02f"
					
					, ($cntOf_0 / $cntOf_1)
					, ($sumOf_Order_0 / $sumOf_Order_1)
// 					, ($cntOf_0 * 1.0 / $cntOf_1)
// 					, ($sumOf_Order_0 * 1.0 / $sumOf_Order_1)
					
					);
			
			// wilcockson detection
			//next:20201031_182057	
			
			// line ==> to $msg
			$msg	.= $line;
			
			// separator
			$msg	.= "\n";
			
		}//for ($i = 0; $i < $num_Iteratetion; $i++)
		
		// write
		Utils::write_Log__Simple(
				$dpath_Log_File, $fname_Log_File
				, $msg, basename(__FILE__), __LINE__);
		
		//debug
		$msg	= "file ==> written : $fname_Log_File";
		
		debug_Message($msg, basename(__FILE__), __LINE__);
		
		return ;
		
		
		/********************
		* step : 0
		* 	prep
		********************/
		// vars
		global $dpath_Log_File, $fname_Log_File;
		
		$msg = "test_1";
		$msg .= "\n";
		
		debug_Message($msg, basename(__FILE__), __LINE__);
		
		Utils::write_Log__Simple(
				
				$dpath_Log_File, $fname_Log_File
				, $msg, basename(__FILE__), __LINE__);

		/********************
		 * step : 1
		 * 	gen : rand integers
		 ********************/
		//ref https://www.php.net/manual/en/function.random-int.php
		$aryOf_Random_Integers_0_1 = array();
		
		$numOf_Random_Integers_Target	= 20;
		$numOf_Random_Integers_Genned	= 0;
		
		// gen
		for ($i = 0; $i < $numOf_Random_Integers_Target; $i++) {
		
			// gen
			$num_Random = rand(0, 1);
// 			$num_Random = random_int(0, 1);
			
			// push
			array_push($aryOf_Random_Integers_0_1, $num_Random);
			
		}//for ($i = 0; $i < $numOf_Random_Integers_Target; $i++)
		
		//report
		$msg	= "\$aryOf_Random_Integers_0_1";
		$msg	.= "\n";
		
		$msg	.= join("\t", $aryOf_Random_Integers_0_1);
		$msg	.= "\n";
		
		Utils::write_Log__Simple(
				$dpath_Log_File, $fname_Log_File
				, $msg, basename(__FILE__), __LINE__);		
// 		debug_Message($msg, basename(__FILE__), __LINE__);
		
// 		print_r($aryOf_Random_Integers_0_1);

		/********************
		 * step : 2
		 * 	count
		 ********************/
		/********************
		 * step : 2 : 1
		 * 	prep
		 ********************/
		$char_0 = 0;
		$char_1 = 1;
		
		$cntOf_0	= 0;
		$cntOf_1	= 0;
		
		// sum of order number
		$sumOf_Order_0	= 0;
		$sumOf_Order_1	= 0;
		
		/********************
		 * step : 2 : 2
		 * 	iterate
		 ********************/
		for ($i = 0; $i < $numOf_Random_Integers_Target; $i++) {
// 		foreach ($aryOf_Random_Integers_0_1 as $val) {

			// val
			$val	= $aryOf_Random_Integers_0_1[$i];
			
			// judge
			if ($val == $char_0) {
			
				//count
				$cntOf_0	+= 1;
				
				// sum
				$sumOf_Order_0	+= $i;
			
			} else {
			
				//count
				$cntOf_1	+= 1;

				// sum
				$sumOf_Order_1	+= $i;
				
			}//if ($val == $char_0)
			
// 		}//foreach ($aryOf_Random_Integers_0_1 as $val)
		}//for ($i = 0; $i < $numOf_Random_Integers_Target; $i++)

		/********************
		 * step : 2 : 3
		 * 	report
		 ********************/
		$msg	= "\n";
		
		$msg	.= sprintf(
					"\$cntOf_0\t%d\n\$cntOf_1\t%d\n" . "\$sumOf_Order_0\t%d\n\$sumOf_Order_1\t%d"
					, $cntOf_0, $cntOf_1
					, $sumOf_Order_0, $sumOf_Order_1
				);
		
		Utils::write_Log__Simple(
				$dpath_Log_File, $fname_Log_File
				, $msg, basename(__FILE__), __LINE__);
		
	}//function test_1() {
	
	/********************
	* get_Wilcockson_Data
	* 	at : 2020/10/31 17:11:55
	* 	@param :
	* 	
	* @return
	* 	array(
				
				$cntOf_0, $cntOf_1
				, $sumOf_Order_0, $sumOf_Order_1
				
		);
		 
	********************/
	function get_Wilcockson_Data() {
//head:20201031_171036
//caller:20201031_171041
				
		/********************
		* step : 0
		* 	prep
		********************/
		// vars
		global $dpath_Log_File, $fname_Log_File;
		
		$msg = "test_1";
		$msg .= "\n";
		
		debug_Message($msg, basename(__FILE__), __LINE__);
		
		Utils::write_Log__Simple(
				
				$dpath_Log_File, $fname_Log_File
				, $msg, basename(__FILE__), __LINE__);

		/********************
		 * step : 1
		 * 	gen : rand integers
		 ********************/
		//ref https://www.php.net/manual/en/function.random-int.php
		$aryOf_Random_Integers_0_1 = array();
		
		$numOf_Random_Integers_Target	= 20;
		$numOf_Random_Integers_Genned	= 0;
		
		// gen
		for ($i = 0; $i < $numOf_Random_Integers_Target; $i++) {
		
			// gen
			$num_Random = rand(0, 1);
// 			$num_Random = random_int(0, 1);
			
			// push
			array_push($aryOf_Random_Integers_0_1, $num_Random);
			
		}//for ($i = 0; $i < $numOf_Random_Integers_Target; $i++)
		
		//report
		$msg	= "\$aryOf_Random_Integers_0_1";
		$msg	.= "\n";
		
		$msg	.= join("\t", $aryOf_Random_Integers_0_1);
		$msg	.= "\n";
		
		Utils::write_Log__Simple(
				$dpath_Log_File, $fname_Log_File
				, $msg, basename(__FILE__), __LINE__);		

		/********************
		 * step : 2
		 * 	count
		 ********************/
		/********************
		 * step : 2 : 1
		 * 	prep
		 ********************/
		$char_0 = 0;
		$char_1 = 1;
		
		$cntOf_0	= 0;
		$cntOf_1	= 0;
		
		// sum of order number
		$sumOf_Order_0	= 0;
		$sumOf_Order_1	= 0;
		
		/********************
		 * step : 2 : 2
		 * 	iterate
		 ********************/
		for ($i = 0; $i < $numOf_Random_Integers_Target; $i++) {
// 		foreach ($aryOf_Random_Integers_0_1 as $val) {

			// val
			$val	= $aryOf_Random_Integers_0_1[$i];
			
			// judge
			if ($val == $char_0) {
			
				//count
				$cntOf_0	+= 1;
				
				// sum
				$sumOf_Order_0	+= $i;
			
			} else {
			
				//count
				$cntOf_1	+= 1;

				// sum
				$sumOf_Order_1	+= $i;
				
			}//if ($val == $char_0)
			
// 		}//foreach ($aryOf_Random_Integers_0_1 as $val)
		}//for ($i = 0; $i < $numOf_Random_Integers_Target; $i++)

		/********************
		 * step : 2 : 3
		 * 	report
		 ********************/
		$msg	= "\n";
		
		$msg	.= sprintf(
					"\$cntOf_0\t%d\n\$cntOf_1\t%d\n" . "\$sumOf_Order_0\t%d\n\$sumOf_Order_1\t%d"
					, $cntOf_0, $cntOf_1
					, $sumOf_Order_0, $sumOf_Order_1
				);
		
		Utils::write_Log__Simple(
				$dpath_Log_File, $fname_Log_File
				, $msg, basename(__FILE__), __LINE__);

		//code:20201031_171441
		/********************
		 * step : 3
		 * 	return
		 ********************/
		/********************
		 * step : 3 : 1
		 * 	prep : vals
		 ********************/
		$aryOf_Data = array(
				
				$cntOf_0, $cntOf_1
				, $sumOf_Order_0, $sumOf_Order_1
				
		);
		
		$valOf_Ret = $aryOf_Data;
		
		/********************
		 * step : 3 : 2
		 * 	return
		 ********************/
		return $valOf_Ret;
		
	}//get_Wilcockson_Data
	
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
		
		test_1();

		/********************
		********************/
		
	}//function main_operation() {
	
	/********************
	* 	main
	* 
	********************/
	//_20200526_095214:next
	main_operation();
	
// 	gen_Memo_String_From_File();
	