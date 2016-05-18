<tr>
		
		<?php 
		
			$param = array(
						'controller' => 'images', 
						'action' => 'index',);
		
		?>
		
		<th colspan="1" class="th_images_blue">

			<?php echo $this->Html->link(
					'ID',
					array('controller' => 'images', 
							'action' => 'index',
							'?' => "sort=id"),
					array(
						'class'	=> 'has_link',
						'method'	=> 'post',
					)
				);
// 				array('class'	=> 'has_link'));
			?>
		
<!-- 			ID -->
			
		</th>
		
		<th colspan="3" class="th_images_green">

			File name
		
			<?php 
			
// 					debug($_SERVER['REQUEST_URI']);

					// sort => asc
					$direction = "asc";
					$key = CONS::$key_Build_URL__Column_FileName;
						
					echo $this->Html->link(
						'△',
							
						Utils::build_URL__Sort($key, $direction),
// 						array('controller' => 'images', 
// 								'action' => 'index',
// 								'?' => "sort=file_name&direction=asc"),

						array('class'	=> 'has_link'));

					// sort => desc
					$direction = "desc";
					$key = CONS::$key_Build_URL__Column_FileName;
					
					echo $this->Html->link(
						'▽',
						Utils::build_URL__Sort($key, $direction),
// 						"http://localhost/Eclipse_Luna/Cake_IFM11/?sort=file_name&direction=desc",
// 						array('url' => "http://localhost/Eclipse_Luna/Cake_IFM11/?sort=file_name&direction=desc")
// 						array('controller' => 'images', 
// 								'action' => 'index',
// 								'?' => "sort=file_name&direction=desc"),

						array('class'	=> 'has_link'));

// 					echo $this->Html->link(
// 						'File name',
// 						array('controller' => 'images', 
// 								'action' => 'index',
// 								'?' => "sort=file_name"),
// 						array('class'	=> 'has_link'));
			?>
		
<!-- 			File name -->
			
		</th>

		<th colspan="3" class="th_images_green">

			<?php 
			
				$param['?'] = "sort=table_name";
			
				echo $this->Html->link(
							'Table name',
							$param,
			// 				array('controller' => 'images', 
			// 						'action' => 'index',
			// 						'?' => "sort=id"),
							array('class'	=> 'has_link'));
			?>
		
		
<!-- 			Table name -->
			
		</th>
		
		
</tr>

<tr>
		<th colspan="5" rowspan="2" class="th_images_Teal">

			<?php 
			
				$param['?'] = "sort=memos";
			
				echo $this->Html->link(
							'Memos',
							$param,
			// 				array('controller' => 'images', 
			// 						'action' => 'index',
			// 						'?' => "sort=id"),
							array('class'	=> 'has_link'));
			?>
		
		
<!-- 			Memo -->
			
		</th>
		
		<th colspan="2" class="th_images_Olive">

			<?php 
			
				$param['?'] = "sort=created_at";
			
				echo $this->Html->link(
							'Created',
							$param,
							array('class'	=> 'has_link'));
			?>
		
<!-- 			Created -->
			
		</th>
		
</tr>

<tr>
		<th colspan="2" class="th_images_Olive">

			<?php 
			
				$param['?'] = "sort=updated_at";
			
				echo $this->Html->link(
							'Modified',
							$param,
							array('class'	=> 'has_link'));
			?>

<!-- 			Modified -->
			
		</th>
		
</tr>