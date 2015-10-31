<?php foreach ($admins as $admin): ?>

	<tr>
		<td>
		
			<?php 
				echo $this->Html->link($admin['Admin']['id'],
							array(
								'controller' => 'admins', 
								'action' => 'view', 
								$admin['Admin']['id'])
							); ?>
			
		</td>
		
		<td>
		
			<?php 
				echo $admin['Admin']['name']; 
			?>
							
		</td>
		
		<td>
		
			<?php 
				echo $admin['Admin']['val1']; 
			?>
							
		</td>
		
		<td>
		
			<?php 
				echo $admin['Admin']['val2']; 
			?>
							
		</td>
		
	</tr>
	
<?php endforeach; ?>
<?php unset($admin); ?>