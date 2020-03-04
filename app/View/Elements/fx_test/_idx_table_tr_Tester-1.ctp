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
		<textarea 
				rows="2" cols="30"
				onmouseover="this.select();"
				id="ta_Fx_Test_Index_Tester_1"
			>(AUDJPY).(M5).20200227_131436.[20200109_0005-20200109_2355].csv</textarea>
	</td>
	
</tr>