<?php foreach ($images as $image): ?>

	<tr>
		<td colspan="1">
		
			<?php echo $this->Html->link($image['Image']['id'],
							array(
								'controller' => 'images', 
								'action' => 'view', 
								$image['Image']['id'])
							); ?>
			
		</td>
		
		<td colspan="3">
		
			<?php echo $image['Image']['table_name']
							; ?>
							
		</td>
		
		<td colspan="3">
		
			<?php echo $image['Image']['file_name']
							; ?>
							
		</td>
	
	</tr>
	
	<tr>
		<td colspan="5" rowspan="2">
			<?php echo $image['Image']['memos']; ?>
		</td>
		
		<td colspan="2">
			<?php echo $image['Image']['created_at']; ?>
		</td>
		
	</tr>
	
	<tr>
		<td colspan="2"><?php echo $image['Image']['updated_at']; ?></td>
		
	</tr>

		<td colspan="7">
		
<!-- 			/cake_apps/images/ifm11 -->
			<?php echo $this->Html->image(
						"http://benfranklin.chips.jp/cake_apps/images/ifm11/"
						.$image['Image']['file_name'], 
						array('fullBase' => true)); ?>
		
		</td>
	
	<tr>
	
	</tr>
	
<?php endforeach; ?>
<?php unset($image); ?>