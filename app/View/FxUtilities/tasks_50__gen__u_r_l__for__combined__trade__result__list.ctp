
<br>
time = <?php echo $time_Current; ?>

<br>
<br>
url_built = 

<br>

<?php 
		
		//code:20200927_112743
		$lenOf_Url_built = count($url_built);
?>

<table>

<?php
		for ($i = 0; $i < $lenOf_Url_built; $i ++) {
	?>

	<tr>
		<td>

<?php 
// 		foreach ($url_built as $strOf_Url) {
		
			/********************
			* step : 1
			* 		get : entry
			********************/
			// url
			$strOf_Url = $url_built[$i];
			
			// dir name
			$strOf_Dir_Name = $aryOf_Dir_Names[$i];
			
			// build : link string
			$tag_Url_Link = "<a href='$strOf_Url' target=_blank>$strOf_Dir_Name</a>";;
// 			$strOf_Url__Full = "<a href='$strOf_Url' target=_blank>link</a>";;

			echo $tag_Url_Link;
// 			echo $strOf_Url__Full;
			
			echo "<br>";

?>
		</td>
	</tr>

<?php
		}//foreach ($url_built as $strOf_Url)
		
		

		//$strOf_Url_Link = "<a href='$url_built' target=_blank>link</a>";
// 		echo $url_built; 

// 		echo $strOf_Url_Link;
		
		?>
  
  
  </tr>
</table>



<br>
<br>
<?php //echo $url; ?>