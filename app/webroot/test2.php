<?php 

/*
pushd C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\webroot
php test2.php

*/
	echo "hi";

	#ref https://2a17-blog.phpnuke.org/en/c387937/php-proc-open-example
	$descr = array(
			
			#ref https://www.sitepoint.com/proc-open-communicate-with-the-outside-world/
			0 => array('pipe', 'r'), // 0 is STDIN for process
			
// 			0 => array(
// 					'test.py'
// 			)
	);
	
	$pipes = array();
	
	$cmd = "python test.py";
	
	$process = proc_open($cmd, $descr, $pipes);
	
	proc_close($process);
	
	echo "";
	echo "done";
	
?>