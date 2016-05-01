<table id="view_file_info">

  <tr>
  
    <td class="label">File name</td>
    
    <td colspan="3">
    
    	<?php echo $image['Image']['file_name']; ?>
    
    </td>
    
  </tr>
  
  <tr>
  
    <td class="label">Table name</td>
    
    <td colspan="3">
    
    	<?php echo $image['Image']['table_name']; ?>
    
    </td>
    
  </tr>
  
  <tr>
  
    <td class="label">
    		Memos
    		
   			<?php echo $this->Html->link("(Edit)",
				array(
					'controller' => 'images', 
					'action' => 'edit', 
					$image['Image']['id'])
				); ?>
    		
    		
    </td>
    
    <td colspan="3">
    
    	<?php echo $image['Image']['memos']; ?>
    
    </td>
    
  </tr>
  
  <tr>
  
    <td class="label">
    		Tags
    		
   			<?php echo $this->Html->link("(Edit)",
				array(
					'controller' => 'images', 
					'action' => 'edit', 
					$image['Image']['id'])
				); ?>
    		
    		
    </td>
    
    <td colspan="3">
    
    	<?php echo $image['Image']['tags']; ?>
    
    </td>
    
  </tr>
  
  <tr>
  
    <td class="label">Created</td>
    
    <td colspan="1">
    
    	<?php echo $image['Image']['created_at']; ?>
    
    </td>
    
    <td class="label">Updated</td>
    
    <td colspan="1">
    
    	<?php echo $image['Image']['updated_at']; ?>
    
    </td>
    
  </tr>
  
</table>

