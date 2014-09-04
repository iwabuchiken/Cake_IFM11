<h1>

	Images (<?php echo count($images)?>)
	
	<a name="top"></a><a href="#bottom" class="navi_top_bottom">Bottom</a>
	
</h1>
<table>

	<?php echo $this->element('images/index/index_t_headers')?>

		<!-- Here is where we loop through our $images array, printing out post info -->
		
	<?php echo $this->element('images/index/_search_memos')?>

	<?php echo $this->element('images/index/index_t_entries')?>
	

</table>

<div>

	<a name="bottom"></a><a href="#top" class="navi_top_bottom">Top</a>
	
</div>

<br>
<br>

<?php echo $this->Html->link(
    'Add Image',
    array('controller' => 'images', 'action' => 'add')
); ?>
