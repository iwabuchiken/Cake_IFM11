<br>
<br>

<button id="btn_Links_EQs" onclick="show_hide_Links_EQs();" value="push">

Push(EQs)
</button>

<table id="tbl_Links_Eqs" style="display : none;">
	<tr>
	
		<td>
		
			<?php echo 
					$this->Html->link(
								'EQs',
								array('controller' => 'eqs', 
										'action' => 'index_2'),
								array('class' => "button"));
			?>
			
		</td>
		
	</tr>
	
</table>


