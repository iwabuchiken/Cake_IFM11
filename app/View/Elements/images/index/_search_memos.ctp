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
// 										'url'	=> "/images/index?".parse_url($_SERVER['REQUEST_URI'])['query'],
// 										'url'	=> "/?".parse_url($_SERVER['REQUEST_URI'])['query'],
// 										'url'	=> "?".parse_url($_SERVER['REQUEST_URI'])['query'],
// 										'url'	=> substr($_SERVER['REQUEST_URI'], 1)
// 										'url'	=> $_SERVER['REQUEST_URI']
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
						'name'	=> CONS::$str_Filter_Memo
					
					
// 						'name'	=> 'filter_memo'
			);
			
			if (isset($filter_memo)) {

				//REF http://stackoverflow.com/questions/6259371/cakephp-this-form-input-how-to-set-a-select-default-option answered Jun 7 '11 at 0:38
				$options_Memo['default'] = $filter_memo;
				
			}
			
			echo $this->Form->input("Memos ('*' for all)", $options_Memo);
// 			echo $this->Form->input('Memos', $options_Memo);
			
			$options = array(
					'label' => 'Filter',
					'div' => array(
							'class' => 'submit_button',
					)
			);
			
			//REF http://www.cakephpexample.com/cakephp/cakephp-radio-button/
// 			echo $this->Form->input('RadioGroup', array(
			echo $this->Form->input(CONS::$str_Filter_RadioButtons_Name_Memo, array(
					'div' => true,
// 					'div' => false,
					'label' => true,
					'type' => 'radio',
					'legend' => false,
					'options' => array(
									CONS::$str_Filter_RadioButtons_Memo_AND 
											=> CONS::$str_Filter_RadioButtons_Memo_AND, 
									CONS::$str_Filter_RadioButtons_Memo_OR 
											=> CONS::$str_Filter_RadioButtons_Memo_OR
					),
					'default'	=> CONS::$str_Filter_RadioButtons_Memo_AND
// 					'options' => array(1 => 'Personal ', 2 => 'Company')
			));
			
			//test
			?>
			
<!-- 			<input type="hidden" name="Language" value="English"> -->
			
			<?php 
			
			
// 			$this->Form->hidden('sort_test', array("value" => "file_name"));	//=> not displayed
// 			$this->Form->hidden('sort_test', array("value" => "file_name", "id" => "sort_name_hidden"));
			
// 			//ref http://stackoverflow.com/questions/19213165/cakephp-hidden-input-field
// 			$this->Form->input('group_id', 
// 						array('type' => 'hidden', 'value' => "aaabbb")
			
// 			);
			
			echo $this->Form->end($options);
			
// 			echo $this->Form->end('Save Image', array('name'=>'submit_button'));
	// 		echo $this->Form->end('Save Image');
	?>
<!-- 	</td> -->
<!-- </tr> -->