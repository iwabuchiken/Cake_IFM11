<h1>

	Images 
	
	<br>
	
	<?php //echo $this->element('images/index_2/index_2_metainfo')?>
	<?php 
	
// 		$total_num_of_images = "abc";
		
		//ref pass data http://stackoverflow.com/questions/5523162/cakephp-passing-data-to-element answered Apr 2 '11 at 12:51
		echo $this->element('images/index_2/index_2_metainfo', 
					array(
						'total_num_of_images' => $total_num_of_images,
						'num_of_pages' => $num_of_pages,
						'current_page' => $current_page,
		
					)
		);
		
	?>
	
	<br>
	<br>
	<a name="top"></a><a href="#bottom" class="navi_top_bottom">Bottom</a>
	
</h1>

<br>

<?php echo $this->element('images/index_2/_index_pagination')?>

<br>

<table>

	<?php echo $this->element('images/index_2/index_t_headers')?>

		<!-- Here is where we loop through our $images array, printing out post info -->
		
	<?php //echo $this->element('images/index/_search_memos')?>
	<?php echo $this->element('images/index_2/_searchs')?>

	<?php echo $this->element('images/index_2/index_t_entries')?>
	

</table>

<div>

	<!-- $images2[0]['Image']['file_name'] => <?php //echo $images2[0]['Image']['file_name']; ?> -->

</div>

<?php echo $this->element('images/index_2/_index_pagination')?>

<br>
<br>

<div>

	<a name="bottom"></a><a href="#top" class="navi_top_bottom">Top</a>
	
</div>

<!-- <br> -->
<!-- <br> -->

<?php echo $this->element('layouts/links')?>

<?php echo $this->element('audio_files/links')?>

<?php 
// 	echo $this->Html->link(
// 	    'Add Image',
// 	    array('controller' => 'images', 'action' => 'add')
// 	); 
?>
