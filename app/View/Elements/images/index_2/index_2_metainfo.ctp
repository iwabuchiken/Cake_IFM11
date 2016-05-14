		<font color="black">
		(
			total = 
<!-- 			total images =  -->
			
			<?php echo $total_num_of_images; ?>
			
			<?php if (@$num_of_images_filtered) 
				
						echo "/ filtered = <font color='blue'><b>$num_of_images_filtered</b></font>";
// 						echo "/ filtered images = <font color='blue'><b>$num_of_images_filtered</b></font>";
			
					else
						
						echo "/ filtered images = <font color='red'><b>0</b></font>";
					
			?>
			
			<?php 
				if (isset($num_of_pages)) 
					
					echo "/ page = <font color='blue'><b>$current_page</b></font>";
// 					echo "/ page = $current_page";
// 					echo "/ current page = $current_page";
				
				else 
					
					echo "/ page =";
// 					echo "/ current page =";
			?>
			
			<?php 
				if (isset($num_of_pages)) 
// 				if (@$num_of_pages) 
	
					echo " of $num_of_pages";
// 					echo "/ total pages = $num_of_pages";

				else 
					
					echo " of ?";
// 					echo "/ total pages =";
			?>
			
		)
			
	<!-- Images (<?php //echo count($images)?>) -->
	
	<br>
	
	(
		<?php 
			if(isset($filter_memo)) 
				
				echo "filter_memo => <font color='blue'><b>$filter_memo</b></font>";
// 				echo "filter_memo => $filter_memo";
			
			else
				echo "filter_memo =>";
		?>
		
		<?php 
			if(isset($filter_table_name)) 
				
				echo " / filter_table_name => <font color='blue'><b>$filter_table_name</b></font>";
// 				echo " / filter_table_name => $filter_table_name";
			
			else 
				
				echo " / filter_table_name =>";
		?>
		
		<?php 
			if(isset($filter_file_name)) 
				
				echo " / filter_file_name => <font color='blue'><b>$filter_file_name</b></font>";
// 				echo " / filter_file_name => $filter_file_name";
			
			else 
				
				echo " / filter_file_name =>";
		?>
	)

	</font>
	
	<font color="black">
	<br>
	(
		<?php 
		
			if(isset($sort))
				echo "sort => <font color='green'><b>$sort</b></font>";
// 				echo "sort => $sort";
			else
				echo "sort => no";
		
		?>
		/
		<?php 
		
			if(isset($direction))
				
				echo "direction => <font color='green'><b>$direction</b></font>";
// 				echo "direction => $direction";
			
			else {
				echo "<font color='black'>";
				echo "direction => no";
				echo "</font>";
			}
			
		?>
	)
	
	</font>
