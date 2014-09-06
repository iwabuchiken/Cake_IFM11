<!-- Current => <?php //echo @$current_url; ?> -->

<div>
	
	<div>
			<?php echo $this->Html->image(
						"http://benfranklin.chips.jp/cake_apps/images/ifm11/"
						.$image['Image']['file_name'], 
						array(
								'fullBase'	=> true,
								'height'	=> "300px"
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