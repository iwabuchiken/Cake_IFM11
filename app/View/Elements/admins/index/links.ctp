<br>
<hr>

<br>

		<?php 
		
			echo $this->Html->link(
					'Admin',
					array('controller' => 'admins',
							'action' => 'index'),
					array('class' => "button_2"));
		
		?>
		
		<?php 
		
			echo $this->Html->link(
					'Add admin data',
					array('controller' => 'admins',
							'action' => 'add'),
					array('class' => "button_2"));
		
		?>
		
		<?php 
		
			echo $this->Html->link(
					'Stats',
					array('controller' => 'admins',
							'action' => 'stats'),
					array('class' => "button_2"));
		
		?>

<br>
<br>

<hr>
