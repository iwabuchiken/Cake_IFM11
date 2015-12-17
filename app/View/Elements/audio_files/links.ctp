<br>
<br>

<hr>

<table id="links">
	<tr>
	
		<td>
		
			<?php echo 
					$this->Html->link(
								'Audio files',
								array('controller' => 'audio_files', 
										'action' => 'index'),
								array('class' => "button"));
			?>
			
		</td>
		
		<td>
		
			<?php echo 
					$this->Html->link(
								'Audio manager',
								array('controller' => 'audio_files', 
										'action' => 'audio_manager'),
								array('class' => "button"));
			?>
			
		</td>

		<td>
		
			<?php echo 
					$this->Html->link(
								'Add audio files (from sqlite file)',
								array('controller' => 'audio_files', 
										'action' => 'add_AudioFiles_From_DB_File'),
								array('class' => "button"));
			?>
			
		</td>

	</tr>
	
</table>
