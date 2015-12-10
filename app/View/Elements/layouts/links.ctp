<br>
<br>

<table id="links">
	<tr>
	
		<td>
		
			<?php echo 
					$this->Html->link(
								'Images',
								array('controller' => 'images', 
										'action' => 'index'),
								array('class' => "button"));
			?>
			
		</td>
		
		<td>
		
			<?php echo 
					$this->Html->link(
								'Add Image',
								array('controller' => 'images', 
										'action' => 'add'),
								array('class' => "button"));
			?>
			
		</td>
		
		<td>
		
			<?php echo 
					$this->Html->link(
								'Add Image (From DB file)',
								array('controller' => 'images', 
										'action' => 'add_From_DB_File'),
								array('class' => "button"));
			?>
			
		</td>

	</tr>
	<tr>
		
		<td>
		
			<?php echo $this->Html->link(
								'Image manager',
								array('controller' => 'images', 
										'action' => 'image_manager'),
								array('class' => "button"));
			?>
			
		</td>
		
		<td>
		
			<?php echo $this->Html->link(
								'Admin: Image manager',
								array('controller' => 'admins', 
										'action' => 'index'),
								array('class' => "button"));
			?>
			
		</td>
		
		<td>
		
			<?php echo $this->Html->link(
								'Remote: images',
								'http://benfranklin.chips.jp/cake_apps/Cake_IFM11/images',
								array(
										'class' => "button",
										'target'	=> "_blank"
									)
								);
			?>
			
		</td>
		
	</tr>
	
	<tr>
	
		<td>

			<?php 
				echo $this->Html->link(
							'Admin',
								array('controller' => 'admins', 
										'action' => 'index'),
								array('class' => "button_2")
				);
			
			?>
		
		</td>
	
	</tr>
	
</table>
