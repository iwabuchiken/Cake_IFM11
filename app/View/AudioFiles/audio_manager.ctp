<br>
<a name="top"></a><a href="#bottom" class="navi_top_bottom">Bottom</a>
<br>
<br>

<table id="audio_files_data">

	<?php echo $this->element('audio_files/_audio_manager__Header')?>

	<?php 
	
		if (isset($listOf_AMs__SQLITE)) {
	
			$lenOf_AMs__SQLITE = count($listOf_AMs__SQLITE);
			
			for ($i = 0; $i < $lenOf_AMs__SQLITE; $i++) {
	
	?>
	
	<?php 
	
		echo $this->element(
// 						'audio_files/_audio_manager__Row'
						'audio_files/_audio_manager__Row',


						//ref http://book.cakephp.org/2.0/en/views.html#passing-variables-into-an-element
						array(

							"i" => $i, 
							"listOf_AMs__SQLITE" => $listOf_AMs__SQLITE, 


						)

		);
	
	
	?>
	
	<?php
				
			}//for ($i = 0; $i < $lenOf_AMs__SQLITE; $i++)
			
		}//isset($listOf_AMs__SQLITE)
	
	?>
</table>

<br>
<a name="bottom"></a><a href="#top" class="navi_top_bottom">Top</a>
<br>
<br>

<hr>

<?php echo $this->element('layouts/links')?>

<?php echo $this->element('audio_files/links')?>