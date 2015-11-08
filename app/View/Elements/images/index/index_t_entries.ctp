<?php foreach ($images as $image): ?>

	<tr>
		<td colspan="1" class="td_images_ID">
		
			<?php echo $this->Html->link($image['Image']['id'],
							array(
								'controller' => 'images', 
								'action' => 'view', 
								$image['Image']['id'])
							); ?>
			
		</td>
		
		<td colspan="3" class="td_images_FileName">
		
			<?php echo $image['Image']['file_name']
							; ?>
							
		</td>
	
		<td colspan="3" class="td_images_TableName">
		
			<?php echo $image['Image']['table_name']
							; ?>
							
		</td>
		
	</tr>
	
	<tr>
		<td colspan="5" rowspan="2" class="td_images_Memo">
			<?php echo $image['Image']['memos']; ?>
		</td>
		
		<td colspan="2" class="td_images_CreatedAt">
			<?php echo $image['Image']['created_at']; ?>
		</td>
		
	</tr>
	
	<tr>
		<td colspan="2" class="td_images_ModifiedAt">
			<?php echo $image['Image']['updated_at']; ?>
		</td>
		
	</tr>

	<td colspan="7">
	
<!-- 			/cake_apps/images/ifm11 -->
		<!-- REF height http://stackoverflow.com/questions/3903656/cakephp-i-want-to-display-the-image-with-specifec-height-n-width answered Oct 11 '10 at 6:16 -->
		<?php //echo $this->Html->image(
// 						"http://benfranklin.chips.jp/cake_apps/images/ifm11/"
// 						.$image['Image']['file_name'], 
// 						array(
// 								'fullBase'	=> true,
// 								'height'	=> "300px"
// 						)
// 					); 
		?>
		
		<?php echo $this->Html->link($this->Html->image(
						"http://benfranklin.chips.jp/cake_apps/images/ifm11/"
						.$image['Image']['file_name'], 
						array(
								'fullBase'	=> true,
								'height'	=> "300px"
						)
					),
							array(
								'controller' => 'images', 
								'action' => 'view', 
								$image['Image']['id']
								),
						//REF escapse http://simultechnology.blendmix.jp/blog/archives/749
						array('escape' => false)
							); ?>
	
	</td>
	
	<tr>
	
	</tr>
	
<?php endforeach; ?>
<?php unset($image); ?>