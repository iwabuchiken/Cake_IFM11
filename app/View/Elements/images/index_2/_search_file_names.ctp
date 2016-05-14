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
			$options_File_Name = array(
						'class'=>'basic_ta_1',
						//REF div http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html "Disabling div output:"
						'div'	=> false,
						//REF select http://stackoverflow.com/questions/6912071/select-all-text-on-hover answered Aug 2 '11 at 12:35
						'onmouseover'	=> 'this.select()',
						'name'	=> CONS::$str_Filter_File_Name
					
					
// 						'name'	=> 'filter_memo'
			);
			
			if (isset($filter_memo)) {

				//REF http://stackoverflow.com/questions/6259371/cakephp-this-form-input-how-to-set-a-select-default-option answered Jun 7 '11 at 0:38
				$options_File_Name['default'] = $filter_file_name;
// 				$options_File_Name['default'] = $filter_memo;
				
			}
			
			echo $this->Form->input("File name ('*' for all)", $options_File_Name);
// 			echo $this->Form->input('Memos', $options_Memo);
			
			$options = array(
					'label' => 'Filter',
					'div' => array(
							'class' => 'submit_button',
					)
			);
			
			//REF http://www.cakephpexample.com/cakephp/cakephp-radio-button/
// 			echo $this->Form->input('RadioGroup', array(
			echo $this->Form->input(CONS::$str_Filter_RadioButtons_Name_File_Name, array(
					'div' => true,
// 					'div' => false,
					'label' => true,
					'type' => 'radio',
					'legend' => false,
					'options' => array(
									CONS::$str_Filter_RadioButtons_File_Name_AND 
											=> CONS::$str_Filter_RadioButtons_File_Name_AND, 
									CONS::$str_Filter_RadioButtons_File_Name_OR 
											=> CONS::$str_Filter_RadioButtons_File_Name_OR
					),
					'default'	=> CONS::$str_Filter_RadioButtons_File_Name_AND
// 					'options' => array(1 => 'Personal ', 2 => 'Company')
			));
			
			echo $this->Form->end($options);
			
// 			echo $this->Form->end('Save Image', array('name'=>'submit_button'));
	// 		echo $this->Form->end('Save Image');
	?>
<!-- 	</td> -->
<!-- </tr> -->