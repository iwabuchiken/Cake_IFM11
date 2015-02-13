<div id="div_poslist">
	<table id="table_poslist">
	  	
	  	<?php 
	  	
	  		$count = 0;
	  	
			foreach ($positions as $position):
			
				echo "<tr>";
			
				$url = $video['Video']['url'];
				
				parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
				
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
						."</td>";
		
				echo $tag_Memo;
				
				/******************************
				
					delete
				
				******************************/
				echo "<td class='delete_position'>";
// 				echo "<td class='delete_position' style='width: 20px;'>";
				
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
				
				echo "</tr>";
			
				$count ++;
				
	  		endforeach;
	  	
	  	?>
	  		
	  	</table>
	  	
</div>

<div>
<?php 	$hostname = Utils::get_HostName();
	
// 	echo $hostname;
	
	if ($hostname == "localhost") {
	
		$url_src = "/VM_Cake/img";
		
	} else {
	
		$url_src = "/cake_apps/VM_Cake/img";
	
	}
	;
?>
	

</div>