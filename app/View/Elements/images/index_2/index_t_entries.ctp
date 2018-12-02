<?php 
//----------------------------------
//	set : dir path for image files
//----------------------------------
// 	// local server ?
// 	if ($_SERVER['SERVER_NAME'] == CONS::$name_Server_Local) {
		
// 		debug("local server : ".$_SERVER['SERVER_NAME']);
			
// 	} else {
		
// 		debug("NOT local server : ".$_SERVER['SERVER_NAME']);
		
		
		
// 	}
	
// 	debug(__FILE__);
	// '/home/users/2/chips.jp-benfranklin/web/cake_apps/Cake_IFM11/app/View/Elements/images/index_2/index_t_entries.ctp'


?>

<?php foreach ($images as $image): ?>

	<?php 
	
		// local server ?
		if ($_SERVER['SERVER_NAME'] != CONS::$name_Server_Local) {
		
// 			debug("NOT local server : ".$_SERVER['SERVER_NAME']);
			
			// dpath
			$dpath_Image__Temp = "/home/users/2/chips.jp-benfranklin/web/cake_apps/images/ifm11_2/";
			
			$fpath_Image__Temp = $dpath_Image__Temp.$image['Image']['file_name'];
			
// 			echo $fpath_Image__Temp;
			
			//ref https://secure.php.net/manual/ja/function.file-exists.php
			$res = file_exists($fpath_Image__Temp);
			
			if ($res == true) {
			
// 				debug("file exists => $fpath_Image__Temp");
			
				// modify dir path
				$dpath_Image_File = "http://benfranklin.chips.jp/cake_apps/images/ifm11_2/";
				
			} else {
			
// 				debug("file NOT exists => $fpath_Image__Temp");
				
			}//if ($res == true)
			
			
			
		}
		
	
	
	?>

	<tr>
		<td colspan="1" class="td_images_ID">
		
			<?php echo $this->Html->link($image['Image']['id'],
							array(
								'controller' => 'images', 
								'action' => 'view', 
								$image['Image']['id'])
							); ?>
			
		</td>
		
		<td colspan="3" class="td_images_FileName">
		
			<?php echo $image['Image']['file_name']
							; ?>
							
		</td>
	
		<td colspan="3" class="td_images_TableName">
		
			<?php echo $image['Image']['table_name']
							; ?>
							
		</td>
		
	</tr>
	
	<tr>
		<td colspan="5" rowspan="2" class="td_images_Memo">
			<?php echo $image['Image']['memos']; ?>
		</td>
		
		<td colspan="2" class="td_images_CreatedAt">
			<?php echo $image['Image']['created_at']; ?>
		</td>
		
	</tr>
	
	<tr>
		<td colspan="2" class="td_images_ModifiedAt">
			<?php echo $image['Image']['updated_at']; ?>
		</td>
		
	</tr>

	<td colspan="7">
	
<!-- 			/cake_apps/images/ifm11 -->
		<!-- REF height http://stackoverflow.com/questions/3903656/cakephp-i-want-to-display-the-image-with-specifec-height-n-width answered Oct 11 '10 at 6:16 -->
		<?php //echo $this->Html->image(
// 						"http://benfranklin.chips.jp/cake_apps/images/ifm11/"
// 						.$image['Image']['file_name'], 
// 						array(
// 								'fullBase'	=> true,
// 								'height'	=> "300px"
// 						)
// 					); 
		?>
		
		<?php echo $this->Html->link($this->Html->image(
// 						"http://benfranklin.chips.jp/cake_apps/images/ifm11/"
						$dpath_Image_File
						.$image['Image']['file_name'], 
						array(
								'fullBase'	=> true,
								'height'	=> "300px"
						)
					),
							array(
								'controller' => 'images', 
								'action' => 'view', 
								$image['Image']['id']
								),
						//REF escapse http://simultechnology.blendmix.jp/blog/archives/749
						array('escape' => false)
							); ?>
				
	
	</td>
	
	<tr>
	
	</tr>
	
<?php endforeach; ?>
<?php unset($image); ?>