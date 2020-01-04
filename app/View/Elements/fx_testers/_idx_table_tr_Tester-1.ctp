<tr>

	<td>

		<?php 
			
			$optFor_Link = array(
					
						'class' => 'button'
						, 'onclick' => 'test()'
					
			);
			
			//ref https://stackoverflow.com/questions/13491421/cakephp-create-simple-buttons-that-redirects-to-views
	// 		echo $this->Html->link('Click Here', '', $optFor_Link);	//=> href="/Eclipse_Luna/Cake_IFM11/fx_admin"
		
			
			$optFor_Btn = array(
			
					'type'		=> 'button'
					//_20200104_155203:caller
					, 'onclick'	=> 'fx_tester_T_1();'
					, 'class'	=> "btn_Links"
					
			);
			
			$labelOf_Button = "Click me";
			
			//ref https://stackoverflow.com/questions/20740668/creating-buttons-with-links-using-cakephps-html-form-helpers
			echo $this->Form->button(
					$labelOf_Button
// 					'Click me'
					, $optFor_Btn
					
			);
			
		?>

	</td>
	
	<td class="fx-tester_index_td_title">
		Tester-1
	</td>
	
</tr>