<?php
	// Simpler way of making sure all no-cache headers get sent
	// and understood by all browsers, including IE.
// 	session_cache_limiter('nocache');
// 	header('Expires: ' . gmdate('r', 0));
	
	header('Content-type: text/html');
?>

<?php 
  	
	  		$count = 0;
	  	
			foreach ($positions as $position):
			
				echo "<tr>";
			
// 				$url = $video['Video']['url'];
				
// 				parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
				
// 				$tag_Point = "<td onclick=\"seek("
				$tag_Point = "<td onclick=\"seek_v2("
						.$position['Position']['point']
						.", "
						."'position_$count'"
						.")"."\""
						." id=\"position_$count\""
						.">"
						.$this->Mytest->testFunction($position['Position']['point'])
						."</td>";
// 						." class=\"pos_chosen\""
		
				echo $tag_Point;
				
				
// 				$tag_Memo = "<td>"
				$tag_Memo = "<td onclick='edit_memo("
						."\""
						.$position['Position']['id']
						."\""
						.", "
						."\""
						.$position['Position']['point']
						."\""
						.", "
						."\""
						.$position['Position']['memo']
						."\""
						.")'"
						.">"
						.$position['Position']['memo']
						."</td>"
						;
		
				echo $tag_Memo;
				
				/******************************
				
					delete
				
				******************************/
				echo "<td class='delete_position'>";
				
				//REF http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html
				echo $this->Html->image("/img/delete_position_v2.png", 
							array(
								"alt"		=> "Brownies",
								"onclick"	=> 
										"delete_position(".$position['Position']['point']
										.", "
										.$position['Position']['id']
										.")",
								"class"		=> "delete_position"
							)
				);
				echo "</td>";
				
				echo "</tr>"
					."\n";
			
				$count ++;
				
	  		endforeach;
  	
  	?>
