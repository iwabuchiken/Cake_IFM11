stats

<hr>

<table>
  <tr>
  
    <th>word</th>
    <th>count</th>
    <th>percent</th>
    
  </tr>
  
  <?php
  
  		foreach ($keywords as $kw) {
  		
  			

  		
  		
  ?> 
	  <tr>
	  
	    <td>
	    		<?php 
	    		
	    			echo $kw['word'];
	    		
	    		?>
	    </td>
	    
	    <td>
	    		<?php 
	    		
	    			echo $kw['count'];
	    		
	    		?>
	    </td>
	    
	    <td>
	    		<?php 
	    		
	    			echo $kw['percent'];
	    		
	    		?>
	    </td>
	    
	  </tr>
	  
  <?php 
  
  		}//foreach ($keywords as $kw)
  			
  ?>
</table>


<hr>

<?php echo $this->element('admins/index/links')?>