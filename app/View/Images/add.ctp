<h1>Add Image</h1>
	<?php
		//REF get http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html#options-for-create
// 		echo $this->Form->create('Image',  array('type' => 'get'));
		echo $this->Form->create('Image');
		echo $this->Form->input('file_name');
		echo $this->Form->input('table_name');
		echo $this->Form->input('memos');
	
		echo $this->Form->end('Save Image');
	?>