simple
<hr>

<?php 

	if (isset($lo_URLs)) {
	
// 		echo "yes";
		
		foreach ($lo_URLs as $setOf_Vals) {
		
// 			debug($setOf_Vals);
			$line = "<a href=\"" . $setOf_Vals[1] . "\" target=\"_blank\">" . $setOf_Vals[0] . "</a>";
// 			$line = "<a href=\"" . $setOf_Vals[1] . "\">" . $setOf_Vals[0] . "</a>";
			
			echo $line;
			
			echo "<br>";
			
		}//foreach ($lo_URLs as $name => $val)
		
		
		
	}//if (isset($lo_URLs))
	;

?>