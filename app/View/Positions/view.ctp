<h1><?php echo h($position['Position']['video_id']); ?></h1>


<p>
	<small>
		ID: <?php echo $position['Position']['id']; ?>
	</small>
</p>

<p>
	<small>
		Video title: <?php echo $position['Video']['title']; ?>
		<!-- Video id: <?php //echo $position['Position']['video_id']; ?> -->
	</small>
</p>

<p>
	<small>
		Position: <?php echo $position['Position']['point']; ?>
	</small>
</p>

<p>
	<?php echo $this->Html->link(
					'Delete Position',
					array(
							'controller' => 'positions', 
							'action' => 'delete', 
							$position['Position']['id']
					),
					array(
							// 							'style'	=> 'color: blue'
// 							'class'		=> 'link_word_alert'
					),
						
					//REF http://stackoverflow.com/questions/22519966/cakephp-delete-confirmation answered Mar 19 at 23:18
					__("Delete? => %s", $position['Position']['point'])
	
				);
	?>

</p>
