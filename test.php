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
	
	
	combine_arrays();

?>
