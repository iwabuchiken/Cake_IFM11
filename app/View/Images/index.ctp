<h1>Videos</h1>
<table>

	<?php echo $this->element('images/index/index_t_headers')?>

		<!-- Here is where we loop through our $images array, printing out post info -->

	<?php //echo $this->element('images/index/index_t_entries')?>
	

</table>

<?php echo $this->Html->link(
    'Add Image',
    array('controller' => 'images', 'action' => 'add')
); ?>
