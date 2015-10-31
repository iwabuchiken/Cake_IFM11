<table class="table_Generic_1">

	<tr>
		<th>
			Column
		</th>
	
		<th>
			Value
		</th>
	
	</tr>

  <tr>
    <td class="td_label_narrow">ID</td>
    <td class="td_value_mideum"><?php echo $admin['Admin']['id']; ?></td>
  </tr>
  
  <tr>
    <td class="td_label_narrow">
    
    				name
    				
    </td>
    
    <td class="td_value_mideum"><?php echo $admin['Admin']['name']; ?></td>
    
  </tr>
  
  <tr>
    <td class="td_label_narrow">
    
    				val 1
    				
    </td>
    
    <td class="td_value_mideum"><?php echo $admin['Admin']['val1']; ?></td>
    
  </tr>
  
  <tr>
    <td class="td_label_narrow">
    
    				val 2
    				
    </td>
    
    <td class="td_value_mideum"><?php echo $admin['Admin']['val2']; ?></td>
    
  </tr>
  
  <tr>
    <td class="td_label_narrow">Created at</td>
    <td class="td_value_mideum"><?php echo $admin['Admin']['created_at']; ?></td>
  </tr>
  
  <tr>
    <td class="td_label_narrow">Updated at</td>
    <td class="td_value_mideum"><?php echo $admin['Admin']['updated_at']; ?></td>
  </tr>
  
</table>

<p>
	<?php echo $this->Html->link(
					'Delete Admin',
					array(
							'controller' => 'admins', 
							'action' => 'delete', 
							$admin['Admin']['id']
					),
					array(
							// 							'style'	=> 'color: blue'
// 							'class'		=> 'link_word_alert'
					),
						
					//REF http://stackoverflow.com/questions/22519966/cakephp-delete-confirmation answered Mar 19 at 23:18
					__("Delete? => %s", $admin['Admin']['name'])
	
				);
	?>

</p>

<span>&nbsp;&nbsp;&nbsp;</span>

<p>
	<?php echo $this->Html->link(
					'Update Admin',
					array(
							'controller' => 'admins', 
							'action' => 'edit', 
							$admin['Admin']['id']
					),
					array(
							// 							'style'	=> 'color: blue'
// 							'class'		=> 'link_word_alert'
					)
	
				);
	?>

</p>

<p>
	<?php echo $this->Html->link(
				    'Back to list',
				    array('controller' => 'admins', 'action' => 'index')
				); 
	?>

</p>