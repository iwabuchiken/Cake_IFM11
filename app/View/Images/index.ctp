<h1>

	Images (<?php echo "total = $total_num_of_images"; ?>)
		<?php if (@$num_of_images_filtered) echo "(filtered = $num_of_images_filtered)"?>
	<!-- Images (<?php //echo count($images)?>) -->
	
	<a name="top"></a><a href="#bottom" class="navi_top_bottom">Bottom</a>
	
</h1>

<br>

<?php echo $this->element('images/index/_index_pagination')?>

<br>

<table>

	<?php echo $this->element('images/index/index_t_headers')?>

		<!-- Here is where we loop through our $images array, printing out post info -->
		
	<?php //echo $this->element('images/index/_search_memos')?>
	<?php echo $this->element('images/index/_searchs')?>

	<?php echo $this->element('images/index/index_t_entries')?>
	

</table>

<div>

	<!-- $images2[0]['Image']['file_name'] => <?php //echo $images2[0]['Image']['file_name']; ?> -->

</div>

<?php echo $this->element('images/index/_index_pagination')?>

<br>
<br>

<div>

	<a name="bottom"></a><a href="#top" class="navi_top_bottom">Top</a>
	
</div>

<br>
<br>

<?php echo $this->Html->link(
    'Add Image',
    array('controller' => 'images', 'action' => 'add')
); ?>
