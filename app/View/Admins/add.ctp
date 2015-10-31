<h1>Add Admin</h1>
<?php
	
	$opt_input = array(
				
			'onmouseover' => 'this.select()',
			'rows' => '1',
			'cols'	=> '5'
			
	);

	echo $this->Form->create('Admin');
	
	echo $this->Form->input('name', $opt_input);
	echo $this->Form->input('val1', $opt_input);
	echo $this->Form->input('val2', $opt_input);
	
	echo $this->Form->end('Save Admin');
	
?>