<table>
  <tr>
    <th>File name</th>
    <th>date_added</th>
    <th>date_modified</th>
    <th>Memos</th>
  </tr>

  <?php 

	$count = 0;

	$max = 50;
	
	foreach ($images as $row) {

// 		debug($row);
		echo "<tr>";
		echo "<td>"
    			.$row['file_name']
    			."</td>";
		
		echo "<td>"
    			.$row['date_added']
    			."</td>";
		
		echo "<td>"
    			.$row['date_modified']
    			."</td>";
		
		echo "<td>"
    			.$row['memos']
    			."</td>";
		
  		echo "</tr>";

		$count += 1;

		if ($count > $max) {
// 		if ($count > 5) {
	
			break;
	
		}//$count > 5

	}//foreach ($result as $row)



?>
  
</table>

