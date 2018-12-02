<!-- Current => <?php //echo @$current_url; ?> -->
<?php 
	
	// local server ?
	if ($_SERVER['SERVER_NAME'] != CONS::$name_Server_Local) {
	
		// dpath
		$dpath_Image__Temp = "/home/users/2/chips.jp-benfranklin/web/cake_apps/images/ifm11_2/";
		
		$fpath_Image__Temp = $dpath_Image__Temp.$image['Image']['file_name'];
		
		//ref https://secure.php.net/manual/ja/function.file-exists.php
		$res = file_exists($fpath_Image__Temp);
		
		if ($res == true) {
		
// 			debug("file exists => $fpath_Image__Temp");
		
			// modify dir path
			$url_Dpath_Image_File = "http://benfranklin.chips.jp/cake_apps/images/ifm11_2/";
			
		}//if ($res == true)
		
	}//if ($_SERVER['SERVER_NAME'] != CONS::$name_Server_Local) {
	
?>

<div>

	<?php echo $this->element('images/view/_view_rotate_image')?>

</div>

<br>

<div>

	<?php echo $this->element('images/view/view_zoom')?>

</div>

<br>

<div id="container" style="height: 50%;">
	
	<div>
			<?php echo $this->Html->image(
// 						"http://benfranklin.chips.jp/cake_apps/images/ifm11/"
						$url_Dpath_Image_File
						.$image['Image']['file_name'], 
						array(
								'fullBase'	=> true,
								'height'	=> "300px",
								'id'		=> 'image'
						)
					); 
		?>
	
	
	</div>

	<div>
	
		<?php echo $this->element('images/view/_view_file_info')?>
		
	</div>

</div>

<br>
<br>

<div>

	<?php echo $this->element('images/view/_view_Footer')?>

</div>