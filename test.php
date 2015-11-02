<?php 

	//D-4/v-2.0
	function
	combine_arrays() {
	
		$a = array("Image.memos LIKE1", "Image.memos LIKE", "Image.memos LIKE");
		$b = array("a", "b", "c");
		
		$res = array_combine($a, $b);
		
		print_r($res);
		
		echo "done";
		
	}
	
	function
	test_Searialize() {
		
		$tmp = array(
			
				"new" => 30,
				
				"existing_success"	=> 33
				
		);
		
		echo serialize($tmp);
		
	}//test_Searialize
	
	function
	test_Diff() {
		
		require_once 'app/Lib/libs/class.Diff.php';
		
		$f1 = "app/Controller/AdminsController.php";
		$f2 = "app/Controller/ImagesController.php";
		
// 		$f1 = "app/Lib/data/ifm11_backup_20151026_162140.bk";	//=> Fatal error: Allowed memory size of 134217728 bytes exhausted (tried to allocate
																// 	KS\WS\Eclipse_Luna\Cake_IFM11\app\Lib\libs\class.Diff.php on line 141
// 		$f2 = "app/Lib/data/ifm11_backup_20151029_140306.bk";
		
		$diff = Diff::compareFiles($f1, $f2);
		
		print_r(count($diff));	//=> 1458
// 		print_r($diff);

		echo "\n";
		
// 		$diff = Diff::compareFiles($f1, $f2, true);	//=> binary
// 		$diff = Diff::compareFiles('old.bin', 'new.bin', true);
		
		echo "done";
		
		
	}
	
	function
	test_Diff__Binary() {
		
		$f1 = "app/Lib/data/ifm11_backup_20151026_162140.bk";
		$f2 = "app/Lib/data/ifm11_backup_20151029_140306.bk";

		xdiff_file_diff_binary($f1, $f2, 'my_script.bdiff');
// 		xdiff_file_diff_binary($old_version, $new_version, 'my_script.bdiff');
		
		echo "\n";
		
		echo "done";
		
		
	}//test_Diff__Binary
	
	function
	test_Diff__Original_Binary() {
		
		$fname1 = "app/Lib/data/ifm11_backup_20151026_162140.bk";
		$fname2 = "app/Lib/data/ifm11_backup_20151029_140306.bk";

		/*******************************
			read: file 1
		*******************************/
		echo "************ file 1 ******************";
		
		echo "\n";
		
		//ref http://stackoverflow.com/questions/17963110/php-read-file-as-an-array-of-bytes
		$f1 = fopen($fname1, "rb");

		$size_f1 = filesize($fname1);
// 		$size_f1 = filesize($f1);
		
		echo "f1: size => $size_f1";
		
		echo "\n";
		
		$len_Read = 60;
// 		$len_Read = 30;
		
		$contents = fread($f1, $len_Read);
// 		$contents = fread($f1, 10);
		
		print_r($contents);
		
		echo "\n";
		
		//ref http://php.net/manual/en/function.str-split.php
		$ary = str_split($contents);
		
		foreach ($ary as $chr) {
		
			//ref http://php.net/manual/en/function.ord.php
			echo ord($chr).",";
			
// 			echo "$chr => '".ord($chr)."'";
			
// 			echo "\n";
			
		}//foreach ($ary as $chr)
		
		echo "\n";
		
		/*******************************
			read: file 2
		*******************************/
		echo "************ file 2 ******************";
		
		echo "\n";
		
		//ref http://stackoverflow.com/questions/17963110/php-read-file-as-an-array-of-bytes
		$f2 = fopen($fname2, "rb");
		
// 		$len_Read = 30;
		
		$contents = fread($f2, $len_Read);
// 		$contents = fread($f1, 10);
		
		print_r($contents);
		
		echo "\n";
		
		//ref http://php.net/manual/en/function.str-split.php
		$ary = str_split($contents);
		
		foreach ($ary as $chr) {
		
			echo ord($chr).",";
			
// 			echo "$chr => '".ord($chr)."'";
			
// 			echo "\n";
			
		}//foreach ($ary as $chr)
		
		
		
// 		print_r(str_split($contents));
		
// 		print_r(explode("", $contents));

// 		echo get_class($contents);	//=> get_class() expects parameter 1 to be object, string given
		
// 		foreach ($contents as $chr) {	//=> Invalid argument supplied for foreach()
		
// 			echo "$chr,";
			
// 		}//foreach ($contents as $chr)
		
		echo "\n";
		
		/*******************************
			fseek
		*******************************/
		echo "************ fseek ******************";
		
		echo "\n";
		echo "\n";
		
		$seek_point = 56;
// 		$seek_point = 100;
// 		$seek_point = 68;
// 		$seek_point = 24;
		$len_Read = 4;
// 		$len_Read = 40;
		
		fseek($f1, $seek_point);
		$contents = fread($f1, $len_Read);
// 		fseek($f1, 18);
// 		$contents = fread($f1, 1);
// 		fseek($f1, 0);
// 		$contents = fread($f1, 16);
		
// 		fseek($f1, 96);
// 		$contents = fread($f1, 4);
		
		//ref http://php.net/manual/en/function.str-split.php
		$ary = str_split($contents);
		
		foreach ($ary as $chr) {
		
			//ref http://php.net/manual/en/function.ord.php
// 			echo $chr;
			echo ord($chr)." ($chr), ";
				
			// 			echo "$chr => '".ord($chr)."'";
				
			// 			echo "\n";
				
		}//foreach ($ary as $chr)
		
		
// 		/*******************************
// 			"unpack"
// 		*******************************/
// 		//ref http://stackoverflow.com/questions/17963110/php-read-file-as-an-array-of-bytes
// 		$byteArray = unpack("N*",$contents);
		
// 		print_r($byteArray);

		echo "\n";
		echo "\n";
		
		echo "done";
		
		
	}//test_Diff__Original_Binary
	
	function
	execute() {
		
		test_Diff__Original_Binary();
// 		test_Diff__Binary();
// 		test_Diff();
// 		test_Searialize();
		
	}//execute
	
// 	combine_arrays();

	execute();
	
?>
