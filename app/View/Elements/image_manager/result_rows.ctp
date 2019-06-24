<table id="image_data">
  <tr>
    <th>No</th>
    <th>ID</th>
    <th>Ops</th>
    
    <th colspan="3" rowspan="2">Memos</th>
  </tr>
  
  <tr>
    <th colspan="3">File name</th>
  </tr>

  <?php 

	$count = 1;
// 	$count = 0;

// 	$max = 50;
	
	foreach ($images as $row) {
?>

	<tr>
		<td class="image_data_No">
			<?php 
			
				echo $count;
			
			?>
		</td>
		
		<td>
			<?php 

				echo $this->Html->link(
						$row['_id'],
						array(
								'controller' => 'images',
								'action' => 'edit_image_data',
								$row['_id'])
						,
						//ref http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html
						array(
							'target'		=> '_blank',
							'class'			=> 'image_data_ID'
						)
// 						,
// 						array('class' => 'button')
				);
				
// 				echo $row['_id'];
// 				echo $count;
			
			?>
		</td>

		<td>	<!-- Ops -->
	
			<?php 
			
				$options = array(
						'label' => 'Update',
						'id' => 'submit',
						'onclick' => "update_Image_Data__FromList("
									.$row['_id']
									.")",
// 						'class'		=> "submit_image_data_FromList"
				);
				echo $this->Form->end($options);
			
			?>
		
		</td>

		<td colspan="3" rowspan="2">
	<!-- 		<textarea> -->
				<?php 
				// 		echo "<td>"
						$opt = array(
							
								'value' => $row['memos'],
	
								'onmouseover'	=> 'this.select()',
	// 							'onmouseover'	=> 'this.focus()'
// 								'type'			=> 'input',
								'type'			=> 'textarea',
	
								'id'			=> "image_data_Memo_".$row['_id'],

// 								'height'		=> '100px'
	
						);
						
						//ref http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html
				    	echo $this->Form->input('', $opt);
	// 			    	echo $row['memos'];
				//     			.$row['memos']
				//     			."</td>";
				?>
	<!-- 		</textarea> -->
		</td>
			
	</tr>
	
	<tr>
		<td class="image_data_File_Name" colspan="3">
			<?php 
			
				echo $row['file_name'];
			
			?></td>
		
<?php 
// 		debug($row);
// 		echo "<tr>";
// 		echo "<td>"
//     			.$row['file_name']
//     			."</td>";
		
// 		echo "<td>"
//     			.$row['date_added']
//     			."</td>";
		
// 		echo "<td>"
//     			.$row['date_modified']
//     			."</td>";
?>

<?php 
  		echo "</tr>";

		$count += 1;

// 		if ($count > $max) {
// // 		if ($count > 5) {
	
// 			break;
	
// 		}//$count > 5

	}//foreach ($result as $row)



?>
  
</table>

