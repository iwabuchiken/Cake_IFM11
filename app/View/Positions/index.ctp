
<h1>Positions (<a name="top"></a>
<a href="#bottom">Bottom</a>
)</h1>

<table>

	<?php echo $this->element('positions/index/index_t_headers')?>

		<!-- Here is where we loop through our $positions array, printing out post info -->

	<?php echo $this->element('positions/index/index_t_entries')?>
	
</table>

<br>
<?php echo $this->Html->link(
    'Add Position',
    array('controller' => 'positions', 'action' => 'add')
); ?>

<br>
<br>
<a name="bottom"></a>
(<a href="#top">Top</a>)