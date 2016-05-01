<?php foreach ($memos as $memo): ?>

	<tr>
	
		<td  colspan="1" class="td_memos_ID">
		
			<?php 

				echo $memo['Memo']['id'];
				
			?>
			
		</td>
		
		<td colspan="2" class="td_images_CreatedAt">
		
			<?php 

				echo $memo['Memo']['created_at'];
				 
			?>
							
		</td>
	
<!-- 		<td> -->
		<td colspan="2" class="td_images_CreatedAt">
			<?php 

				echo $memo['Memo']['updated_at'];
				 
			?>
							
		</td>
	
	</tr>
	
	<tr>
	
		<td colspan="2" class="td_memos_title">
		
			<?php 

				echo $memo['Memo']['title'];
				 
			?>
							
		</td>
	
		<td colspan="3" class="td_memos_title">
<!-- 		<td colspan="3" class="td_images_FileName"> -->
		
			<?php 

				echo $memo['Memo']['body'];
				 
			?>
							
		</td>
	
	</tr>
	
	<tr>
	
		<td colspan="1" class="td_border_black">
		
			<?php 

				echo $memo['Memo']['r_id'];
				 
			?>
							
		</td>
	
<!-- 		<td colspan="2" class="td_border_black"> -->
		<td colspan="2" class="td_memos_border_black_bg_gray">
		
			<?php 

				echo $memo['Memo']['r_created_at'];
				 
			?>
							
		</td>
	
		<td colspan="2" class="td_memos_border_black_bg_gray">
		
			<?php 

				echo $memo['Memo']['r_modified_at'];
				 
			?>
							
		</td>
	
	</tr>
	
<?php endforeach; ?>
<?php unset($memo); ?>