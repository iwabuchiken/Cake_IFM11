<!-- ref http://www.w3schools.com/tags/tag_script.asp -->
<h1>

	Eqs : add_epicenter_names
	
	
</h1>

<hr>

<table>
  <tr>
    <th>id</th>
    <th>Epicenter</th>
  </tr>
  
  <?php 
  	
  		for ($i = 0; $i < $lenOf_NamesList; $i++) {
  	
	?>
	
  <tr>
    <td>
    	<?php 
    	
    		echo $i;
//     		echo $i + 1;
    		
    	?>
    </td>
    
    <td>
    	<?php 
    	
    		echo $aryOf_EpicenterNames[$i];
    	
    	?>
    
    </td>
  </tr>
  
	<?php 	  		
	
  		}//for ($i = 0; $i < $lenOf_NamesList; $i++)
  
	  ?>
  
</table>


<hr>

