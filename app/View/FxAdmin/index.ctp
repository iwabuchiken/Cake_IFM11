<!-- ref http://www.w3schools.com/tags/tag_script.asp -->
<script>

</script>

<h1>

	Fx admin
	
	<!-- //_20191231_173717:next -->

</h1>

<hr>

<table>

	<?php echo $this->element('articles/_idx_table_tr_Log_File')?>
	
<!--   <tr> -->
<!--     <td>Row 1: Col 1</td> -->
<!--     <td>Row 1: Col 2</td> -->
<!--   </tr> -->
</table>

	<?php 
		
// 		$optFor_Link = array(
				
// 					'class' => 'button'
// 					, 'onclick' => 'test()'
				
// 		);
		
// 		//ref https://stackoverflow.com/questions/13491421/cakephp-create-simple-buttons-that-redirects-to-views
// // 		echo $this->Html->link('Click Here', '', $optFor_Link);	//=> href="/Eclipse_Luna/Cake_IFM11/fx_admin"
	
		
// 		$optFor_Btn = array(
		
// 				'type'		=> 'button',
// 				'onclick'	=> 'process_log_file();'
// 				, 'class'	=> "btn_Links"
				
// 		);
		
// 		//ref https://stackoverflow.com/questions/20740668/creating-buttons-with-links-using-cakephps-html-form-helpers
// 		echo $this->Form->button(
// 				'Click me'
// 				, $optFor_Btn
				
// 		);
		
	?>
	
	<div id="area_result">
		
		result
	
	</div>
<hr>

<?php echo $this->element('layouts/links')?>

<?php echo $this->element('audio_files/links')?>

