<?php 

	$opt_create = array(
			'div' => false,
			//REF http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html#options-for-create
			'type' => 'get',
	
			//ref http://stackoverflow.com/questions/21736612/how-to-reset-cakephp-paginator-to-page-1
			'url' => ''
	
	);
	
	$opt_input = array(
// 			'type'		=> 'select',
// 			'options'	=> $select_Genres,
// 			//REF http://satussy.blogspot.jp/2011/07/cakephp-select.html "見つけた方法は"
// 			'selected'	=> $genre_id,
				
// 			'name'		=> "genre_id",

			'onmouseover'	=> 'this.select()',
			
			'label'		=> false,
			'div'		=> false,
				
			'class'		=> 'input_search_string'
	);
	
	// search string
	if (isset($search_string)) {
		
		$opt_input['value'] = $search_string;
		
	}//isset($search_string)
	
	
	$opt_end = array(
			'div' => false,
				
			'class'	=> 'submit_go'
	
	);

	echo $this->Form->create('', $opt_create);
	echo $this->Form->input(
			'search_string', $opt_input
	
	);
	
	//REF http://stackoverflow.com/questions/6360767/form-end-without-a-div-in-cakephp answered Jun 15 '11 at 17:06
	echo $this->Form->submit("search", $opt_end);

?>
