<?php foreach ($memos as $memo): ?>

	<tr>
		<td>
		
			<?php 

				echo $memo['Memo']['id'];
				
			?>
			
		</td>
		
		<td>
		
			<?php 

				echo $memo['Memo']['title'];
				 
			?>
							
		</td>
	
	</tr>
	
<?php endforeach; ?>
<?php unset($memo); ?>