<h1>Videos</h1>
<table>

	<?php echo $this->element('videos/index/index_t_headers')?>
<!-- 		<tr> -->
<!-- 				<th>Id</th> -->
<!-- 				<th>Title</th> -->
<!-- 				<th>Genre</th> -->
<!-- 				<th>Url</th> -->
<!-- 		</tr> -->

		<!-- Here is where we loop through our $videos array, printing out post info -->

	<?php echo $this->element('videos/index/index_t_entries')?>
	

</table>

<?php echo $this->Html->link(
    'Add Video',
    array('controller' => 'videos', 'action' => 'add')
); ?>
