<!-- <tr> -->
<!-- 	<td> -->
<!-- 	Table name -->
	<?php
			//REF get http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html#options-for-create
	// 		echo $this->Form->create('Image',  array('type' => 'get'));
			echo $this->Form->create('Image', 
								array(
// 										'type'=>'post',
										'type'=>'get',
										'action'	=> 'index'
 								)
			);
		
	// 		echo $this->Form->input('Memos', array('class'=>'basic_ta_1'));
			$options_Memo = array(
						'class'=>'basic_ta_1',
						//REF div http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html "Disabling div output:"
						'div'	=> false,
						//REF select http://stackoverflow.com/questions/6912071/select-all-text-on-hover answered Aug 2 '11 at 12:35
						'onmouseover'	=> 'this.select()',
						'name'	=> CONS::$str_Filter_TableName
// 						'name'	=> 'filter_table_name'
			);
			echo $this->Form->input('Table name', $options_Memo);
// 			echo $this->Form->input('Memos', $options_Memo);
// 			echo $this->Form->input('Table name', array('class'=>'basic_ta_1'));
			
			$options = array(
					'label' => 'Filter',
					'div' => array(
							'class' => 'submit_button',
					)
			);
			echo $this->Form->end($options);
			
// 			echo $this->Form->end('Save Image', array('name'=>'submit_button'));
	// 		echo $this->Form->end('Save Image');
	?>
<!-- 	</td> -->
<!-- </tr> -->