<?php


	$a = "123.5";
	
	echo "a is $a\n";
	
	echo (float)$a;
	
	echo "\n";
	
	
//	echo is_int($a) ? "a is int" : "a is NOT int";	//=> NOT
//	echo is_int((float)$a) ? "a is int" : "a is NOT int";	//=> NOT

	
	echo is_int((int)$a) ? "a is int ==> ".(int)$a : "a is NOT int";	//=> is
	echo "\n";
	
		//echo is_float((float)$a) ? "a is float ==> ".(float)$a : "a is NOT float";	//=> 
		echo is_float($a) ? "a is float ==> ".(float)$a : "a is NOT float";	//=> 
	
	echo "\n";


	$a2 = ((float)$a) / 1;
	echo "a2 ==> $a2";
	
	echo "\n";

	echo "yes";
	

?>
