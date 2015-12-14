<!-- <div> -->

	<h1>
	
		Images (total=<?php echo $numOf_images; ?>)
	
		<a name="top"></a><a href="#bottom" class="navi_top_bottom">Bottom</a>
	
	</h1>
	
<!-- </div> -->
<br>
<!-- body ------------------------------------------->

<?php echo $this->element('image_manager/result_rows')?>

<?php 

// 	$count = 0;
	
// 	foreach ($result as $row) {
		
// 		debug($row);
		
// 		$count += 1;
		
// 		if ($count > 5) {
			
// 			break;
			
// 		}//$count > 5
		
// 	}



?>


<!-- body /------------------------------------------->

<div>

	<a name="bottom"></a><a href="#top" class="navi_top_bottom">Top</a>
	
</div>

<?php echo $this->element('layouts/links')?>