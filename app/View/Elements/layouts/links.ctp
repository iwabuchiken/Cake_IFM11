<br>
<br>

<table id="links">
	<tr>
	
		<td>
		
			<?php echo $this->Html->link(
								'Add Image',
								array('controller' => 'images', 
										'action' => 'add'),
								array('class' => "button"));
			?>
			
		</td>
		
		<td>
		
			<?php echo $this->Html->link(
								'Image manager',
								array('controller' => 'images', 
										'action' => 'image_manager'),
								array('class' => "button"));
			?>
			
		</td>
		
	</tr>
	
</table>
