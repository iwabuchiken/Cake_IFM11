<!-- add memos -->

<br>
<br>

<?php 

	if (isset($message)) {
		
		echo "message => '$message'";
		
	} else {//isset($message)

		echo "no message";
		
	}//isset($message)

?>

<br>
<br>

<hr>

<?php echo $this->element('layouts/links_memos')?>