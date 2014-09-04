<!-- File: /app/View/Posts/add.ctp -->

<h1>Edit Video</h1>
<?php
echo $this->Form->create('Video');
echo $this->Form->input('title');
echo $this->Form->input('url');

echo $this->Form->input('memo');
echo $this->Form->input('tag');

echo $this->Form->input(
						'genre_id'
// 						'genre_id',
// // 						'Lang id',
// 						array(
// 								'type' => 'select',
// 								'options' => $select_Langs
// 						)
		
		
		);

echo $this->Form->end('Update video');
?>

<br>

<?php echo $this->Html->link(
    'Back to list',
    array('controller' => 'videos', 'action' => 'index')
); ?>
