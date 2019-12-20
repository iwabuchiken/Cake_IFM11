<!-- ref http://www.w3schools.com/tags/tag_script.asp -->
<script>

</script>

<h1>

	Articles 
	
	
	<br>
	<a name="top"></a><a href="#bottom" class="navi_top_bottom">Bottom</a>
	
</h1>

<br>

<table>
<!--   <tr> -->
<!--     <th>no.</th> -->
<!--     <th>line</th> -->
<!--   </tr> -->
  
  	<?php 
  	
  		//$lo_Article_Groups = [["main", $lo_Articles]];
  		
	  	$lenOf_LO_Article_Groups = count($lo_Article_Groups);
	  	
// 	  	$cntOf_Loop = 1;
	  	
// 	  	//debug
// 	  	debug("\$lo_Article_Groups[0][0] ==> ");
// 	  	debug($lo_Article_Groups[0][0]);
	  	
	  	// loop : 1
	  	for ($i = 0; $i < $lenOf_LO_Article_Groups; $i++) {
	  		
	  		// counter
	  		$cntOf_Loop = 1;
	  		
	  		// get : a group
	  		$strOf_Group_Title = $lo_Article_Groups[$i][0];
	  		
	  		$lo_Group = $lo_Article_Groups[$i][1];

// 	  		//debug
// 	  		debug("\$lo_Group[0][0] ==> ");
// 	  		debug($lo_Group[0][0]);
	  		 
	  		$lenOf_LO_Group = count($lo_Group);
	  		
	  		?>
	  		
<!-- 	  	<hr> -->
	  	
	  	<tr>
	  		<td>
	  	
		  	<?php 
		  	
		  		echo $strOf_Group_Title;
		  	
		  	?>
	  	
	  		</td>
	  	</tr>

  <tr>
    <th>no.</th>
    <th>line</th>
  </tr>
	  	
<!-- 	  	<hr> -->
	  	
	  		
	<?php 
	  		// loop : 2
	  		for ($j = 0; $j < $lenOf_LO_Group; $j++) {
	  		
	  			$aryOf_Article = $lo_Group[$j];
// 	  			$aryOf_Article = $lenOf_LO_Group[$j];
	  			
  	?>
	
		  <tr>
		    <td>
		    	<?php 
		    	
		    		echo $cntOf_Loop;
		    	
		    	?>
		    </td>
		    
		    <td>
		    	<?php 
		    	
		    		echo $aryOf_Article[0];
		    	
		    	?>
		    </td>
		  </tr>
		  
	<?php   		

				// counter
				$cntOf_Loop += 1;
		
			}//for ($j = 0; $j < $lenOf_LO_Group; $j++)
			
  		}//for ($i = 0; $i < $lenOf_LO_Article_Groups; $i++)
  
  	?>
</table>



<div>

	<a name="bottom"></a><a href="#top" class="navi_top_bottom">Top</a>
	
</div>

<!-- <br> -->
<!-- <br> -->

<?php echo $this->element('layouts/links')?>

<?php echo $this->element('audio_files/links')?>

