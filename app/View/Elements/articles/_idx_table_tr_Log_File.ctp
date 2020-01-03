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
			
					'type'		=> 'button',
					'onclick'	=> 'process_log_file();'
					, 'class'	=> "btn_Links"
					
			);
			
			//ref https://stackoverflow.com/questions/20740668/creating-buttons-with-links-using-cakephps-html-form-helpers
			echo $this->Form->button(
					'Click me!!!'
					, $optFor_Btn
					
			);
			
		?>

	</td>
	
</tr>