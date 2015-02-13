<h1><?php echo h($genre['Genre']['name']); ?></h1>

<table class="table_show">
  <tr>
    <td class="td_label_narrow">ID</td>
    <td class="td_value_mideum"><?php echo $genre['Genre']['id']; ?></td>
  </tr>
  <tr>
    <td class="td_label_narrow">name</td>
    <td class="td_value_mideum"><?php echo $genre['Genre']['name']; ?></td>
  </tr>
  
  <tr>
    <td class="td_label_narrow">Created at</td>
    <td class="td_value_mideum"><?php echo $genre['Genre']['name']; ?></td>
  </tr>
  
</table>

<p>
	<?php echo $this->Html->link(
					'Delete Genre',
					array(
							'controller' => 'genres', 
							'action' => 'delete', 
							$genre['Genre']['id']
					),
					array(
							// 							'style'	=> 'color: blue'
// 							'class'		=> 'link_word_alert'
					),
						
					//REF http://stackoverflow.com/questions/22519966/cakephp-delete-confirmation answered Mar 19 at 23:18
					__("Delete? => %s", $genre['Genre']['name'])
	
				);
	?>

</p>
