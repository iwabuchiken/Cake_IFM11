<h1>Genres</h1>
<table>

	<?php echo $this->element('genres/index_t_headers'); ?>

		<!-- Here is where we loop through our $genres array, printing out post info -->

	<?php echo $this->element('genres/index_t_entries'); ?>
		
</table>

<?php echo $this->Html->link(
    'Add Genre',
    array('controller' => 'genres', 'action' => 'add')
); ?>
