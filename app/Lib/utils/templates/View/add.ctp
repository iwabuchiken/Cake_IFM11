<h1>Add Video</h1>
	<?php
	echo $this->Form->create('Video');
	echo $this->Form->input('title');
	echo $this->Form->input('url');
	
	echo $this->Form->input('genre_id',
			array('options' => $genre_names)
	
	);
	
// 	echo $this->Form->input('body', array('rows' => '3'));
	echo $this->Form->end('Save Video');
	?>