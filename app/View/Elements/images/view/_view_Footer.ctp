<?php 

// 	$data = array('controller' => 'images', 'action' => 'index');
	$data = $current_url;
// 	$data = array('url' => $current_url);

	echo $this->Html->link(
	    'Images', $data
); ?>
