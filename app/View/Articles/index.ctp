<!-- ref http://www.w3schools.com/tags/tag_script.asp -->
<script>

</script>

<h1>

	Articles (<?php echo $query_Article_Genre; ?>)
	
	<?php 
	
	
	echo $this->Html->link(
						"national",
						"http://localhost/Eclipse_Luna/Cake_IFM11/articles/index?query_Article_Genre=national",
						array('class'	=> 'has_link')
				);
	
	echo "  ";
	
	echo $this->Html->link(
						"Int'l",
						"http://localhost/Eclipse_Luna/Cake_IFM11/articles/index?query_Article_Genre=international",
						array('class'	=> 'has_link')
				);
	
	echo "  ";
	
	echo $this->Html->link(
						"politics",
						"http://localhost/Eclipse_Luna/Cake_IFM11/articles/index?query_Article_Genre=politics",
						array('class'	=> 'has_link')
				);
	
	echo "  ";
	
	echo $this->Html->link(
						"business",
						"http://localhost/Eclipse_Luna/Cake_IFM11/articles/index?query_Article_Genre=business",
						array('class'	=> 'has_link')
				);
	
	?>
	
	<br>
	<br>
	<textarea style="width:30%; height:50px;" onmouseover="this.select();">$strOf_Article_Type =</textarea>
	<br>
	<textarea style="width:100%; height:50px" onmouseover="this.select();">sakura C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Controller\ArticlesController.php
</textarea>
	
	<br>
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
	  	
	  	$lenOf_Articles_ALL = 0;
	  	
	  	foreach ($lo_Article_Groups as $group) {
	  	
// 	  		foreach ($group as $article) {
	  		foreach ($group[1] as $article) {
	  		
	  			$lenOf_Articles_ALL += 1;
	  			
	  		}//foreach ($group as $article)
	  		
	  		;
	  		
	  	}//foreach ($lo_Article_Groups as $group)
	  	
	  	debug("\$lenOf_Articles_ALL => " . $lenOf_Articles_ALL);
	  	
	  	
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
		  		echo " ($lenOf_LO_Group / " . round($lenOf_LO_Group / $lenOf_Articles_ALL, 2) . ")";
		  	
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

			    	echo $this->Html->link(
			    			$aryOf_Article[0],
			    			$aryOf_Article[1],
			    			array('class'	=> 'has_link'
			    					, 'target'	=> '_blank'
				    				
			    			)
			    	);
// 		    		echo $aryOf_Article[0];
		    	
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

