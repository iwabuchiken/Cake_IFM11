audio manager

<br>
<br>

<table>
	<tr>
		<th>No</th>
		<th>File name</th>
		<th>Text</th>
	</tr>
	
	<?php 
	
		if (isset($listOf_AMs__SQLITE)) {
	
			$lenOf_AMs__SQLITE = count($listOf_AMs__SQLITE);
			
			for ($i = 0; $i < $lenOf_AMs__SQLITE; $i++) {
	
	?>
		<tr>
			<td>
				<?php echo $i + 1; ?>
			</td>
			
			<td>
				<?php echo $listOf_AMs__SQLITE[$i]['file_name'] ?>
			</td>
			
			<td>
				<?php 
				
// 					echo $listOf_AMs__SQLITE[$i]['text'] 
					$opt = array(
								
							'value' => $listOf_AMs__SQLITE[$i]['text'],
// 							'value' => $row['memos'],
					
							'onmouseover'	=> 'this.select()',
							// 							'onmouseover'	=> 'this.focus()'
					// 								'type'			=> 'input',
							'type'		=> 'textarea',
					
							'id'		=> "audil_file_Text_".$listOf_AMs__SQLITE[$i]['_id'],
// 							'id'			=> "image_data_Memo_".$row['_id'],
					
							// 								'height'		=> '100px'
					
					);
					
					//ref http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html
					echo $this->Form->input('', $opt);
					
					
				?>
			</td>
			
		</tr>
	
	<?php
// 				echo $listOf_AMs__SQLITE[$i]['file_name'];
				
// 				echo "<br>";
				
			}//for ($i = 0; $i < $lenOf_AMs__SQLITE; $i++)
			
			
		}//isset($listOf_AMs__SQLITE)
	
	?>
</table>


<hr>

<?php echo $this->element('layouts/links')?>

<?php echo $this->element('audio_files/links')?>