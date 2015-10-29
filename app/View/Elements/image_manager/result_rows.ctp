<table id="image_data">
  <tr>
    <th>ID</th>
<!--     <th>No</th> -->
    <th>File name</th>
    <th>date_added</th>
    <th>date_modified</th>
    <th>Memos</th>
  </tr>

  <?php 

	$count = 1;
// 	$count = 0;

	$max = 50;
	
	foreach ($images as $row) {
?>

	<tr>
		<td>
			<?php 

				echo $this->Html->link(
						$row['_id'],
						array(
								'controller' => 'images',
								'action' => 'edit_image')
// 						,
// 						array('class' => 'button')
				);
				
// 				echo $row['_id'];
// 				echo $count;
			
			?>
		</td>
		
		<td>
			<?php 
			
				echo $row['file_name'];
			
			?>
		</td>
		
<?php 
// 		debug($row);
// 		echo "<tr>";
// 		echo "<td>"
//     			.$row['file_name']
//     			."</td>";
		
		echo "<td>"
    			.$row['date_added']
    			."</td>";
		
		echo "<td>"
    			.$row['date_modified']
    			."</td>";
?>

	<td>
<!-- 		<textarea> -->
			<?php 
			// 		echo "<td>"
					$opt = array(
						
							'value' => $row['memos'],

							'onmouseover'	=> 'this.select()'
// 							'onmouseover'	=> 'this.focus()'

					);
					
					//ref http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html
			    	echo $this->Form->input('', $opt);
// 			    	echo $row['memos'];
			//     			.$row['memos']
			//     			."</td>";
			?>
<!-- 		</textarea> -->
	</td>
<?php 
  		echo "</tr>";

		$count += 1;

		if ($count > $max) {
// 		if ($count > 5) {
	
			break;
	
		}//$count > 5

	}//foreach ($result as $row)



?>
  
</table>

