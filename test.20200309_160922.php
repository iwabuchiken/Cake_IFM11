<?php 

/********************
//ref https://stackoverflow.com/questions/10262532/running-php-script-from-the-command-line
php -f C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\test.20200309_160922.php

********************/

	/********************
	* function test_Get_Info_From_Csv_File_Name() {
	* 
	* 	get info
	* 	==> from file name "(AUDJPY).(M5).20200227_131436.[20200115_0005-20200115_2355].csv"
	* 
	* 		==> [AUDJPY, M5]
	* 
	* 	at : 20200325_152912
	*  
	********************/
	//_20200309_162909:ref
	function test_Get_Info_From_Csv_File_Name() {
		
		$msg = "[" . basename(__FILE__) . ":" . __LINE__ . "]";
// 		$msg = "[" . __FILE__ . ":" . __LINE__ . "]";
		
		print($msg);
		
		/********************
		* step : 1
		********************/
		$fname = "(AUDJPY).(M5).20200227_131436.[20200115_0005-20200115_2355].csv";
		
		$tokens = explode(".", $fname);
		
		print_r($tokens);
		// 		[test.20200309_160922.php:23]Array
		// 		(
		// 				[0] => (AUDJPY)
		// 				[1] => (M5)
		// 				[2] => 20200227_131436
		// 				[3] => [20200115_0005-20200115_2355]
		// 				[4] => csv
		// 		)
		
	}//function test_Get_Info_From_Csv_File_Name() {
	
	
	
	/********************
	* function test_Slice_Array() {
	* 
	* 	$lo_BDs = [1,2,3,4,5,6,7,8,9]
	* 
	* 	array_slice($lo_BDs, (4 - 3), (3 + 1))
	* 		==> [2,3,4,5]
	* 	
	* array_slice($lo_BDs, ($i - $x), ($x + 1))
	* 
	* 		==> slice out --> the bar $lo_BDs[$i] and the previous $x num of bars, ($x + 1) in total
	*  
	********************/
	//_20200309_162909:ref
	function test_Slice_Array() {
		
		$msg = "[" . basename(__FILE__) . ":" . __LINE__ . "]";
// 		$msg = "[" . __FILE__ . ":" . __LINE__ . "]";
		
		print($msg);
		
		/********************
		* step : 1
		********************/
		$lo_Chars = str_split("123456789abcde");
		
		$lenOf_LO_Chars = count($lo_Chars);
		
		$msg = "[" . basename(__FILE__) . ":" . __LINE__ . "]";
		$msg .= "\n";
		
		print($msg);
		
		print("\$lo_Chars");
		
		//ref https://stackoverflow.com/questions/9816889/how-to-echo-or-print-an-array-in-php#9816958
		print_r($lo_Chars);
		
		print ("array_slice(\$lo_Chars, 1, 3)");
		
		print_r(array_slice($lo_Chars, 1, 3));
		
		/********************
		* step : 1 : 2
		********************/
		print ("array_slice(\$lo_Chars, (6 - 3), 4)");
		
		print_r(array_slice($lo_Chars, (6 - 3), 4));
		
		/********************
		* step : 1 : 2
		********************/
		print ("array_slice(\$lo_Chars, (8 - 4), (4 + 1))");
		
		print_r(array_slice($lo_Chars, (8 - 4), (4 + 1)));
		
	}//test_Slice_Array()

	
	
	/********************
	* execute()
	* 	at : 2020/03/09 16:24:18
	* 	res free# JVEMV6 44#10.2_44 / 44. currency / 10. prog-php / 2. tester /  XXXX
	********************/
	function
	execute() {
		
		test_Get_Info_From_Csv_File_Name();
		
// 		test_Slice_Array();
		
	}//execute
	
// 	combine_arrays();

	execute();
	
?>
