<!-- File: /app/View/Posts/add.ctp -->

<h1>Edit Image</h1>

<table id="tbl_Edit_Image">

  <tr style="width: 50%;">
    <td class="td_id" style="width: 20px;">ID</td>
    <td><?php echo $image['Image']['id']?></td>
  </tr>
  
  <tr>
    <td>Local ID</td>
    <td><?php echo $image['Image']['local_id']?></td>
  </tr>
  
  <tr>
    <td>File path</td>
    <td><?php echo $image['Image']['file_path']?></td>
  </tr>
  
  <tr>
    <td>File name</td>
    <td><?php echo $image['Image']['file_name']?></td>
  </tr>
  
</table>

<?php

	

?>

<?php

	$opt_input = array(
			'type'	=> 'input',
			// 						'type'	=> 'textarea',
			'cols'	=> 5,
			'rows'	=> 3,
				
			'style'	=> "width: 60%; background-color: bisque;",

			'onmouseover' => 'this.select()',
	
			// 						'class'		=> 'select_genre'
	);

	$opt_input_tags = array(
			'type'	=> 'input',
			// 						'type'	=> 'textarea',
			'cols'	=> 5,
			'rows'	=> 1,
				
			'style'	=> "width: 60%; background-color: bisque;",

			'onmouseover' => 'this.select()',
	
			// 						'class'		=> 'select_genre'
	);


	echo $this->Form->create('Image');
	echo $this->Form->input('memos', $opt_input);
	echo $this->Form->input('tags', $opt_input_tags);
	
	
	echo $this->Form->end('Update image');
?>

<br>

<?php echo $this->Html->link(
    'Back to list',
    array('controller' => 'images', 'action' => 'index')
); ?>
