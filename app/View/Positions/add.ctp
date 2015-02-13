<h1>Add Position</h1>
	<?php
	echo $this->Form->create('Position');
	
	echo $this->Form->input(
					'Video', 
					array('options' => $video_names));
// 					array('options' => $video_names, 'default' => $video_names->first['id']));
	
	echo $this->Form->input('point');
// 	echo $this->Form->input('body', array('rows' => '3'));
	echo $this->Form->end('Save Position');
	?>