<h1>

	Admins 
	
	 (<a name="top"></a><a href="#bottom" class="navi_top_bottom">Bottom</a>)
	
</h1>


<table id="admins">

	<?php echo $this->element('admins/index/_index_t_headers')?>
	<?php echo $this->element('admins/index/_index_t_entries')?>

</table>

<div>

	<a name="bottom"></a><a href="#top" class="navi_top_bottom">Top</a>
	
</div>

<br>
<hr>

<br>
<?php 

	echo $this->Html->link(
			'Add admin data',
			array('controller' => 'admins',
					'action' => 'add'),
			array('class' => "button"));

?>

<br>

<br>
<hr>
<?php echo $this->element('layouts/links')?>