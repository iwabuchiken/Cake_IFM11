<!-- File: /app/View/Posts/add.ctp -->

<h1>Edit image data</h1>

<div id="image_data">

	<table id="edit_image_data">
	  <tr>
	  	<td class="col_title">
	  		id
	  	</td>
	    <td class="col_value" id="image_data_id">
	    	<?php 
	    	
	    		echo $image['_id'];
	    	
	    	?>
	    </td>
	  </tr>
	  
	  <tr>
	  	<td class="col_title">
	  		File name
	  	</td>
	    <td>
	    	<?php 
	    	
	    		echo $image['file_name'];
	    	
	    	?>
	    </td>
	  </tr>
	  
	  <tr>
	  	<td class="col_title">
	  		Memos
	  	</td>
	    <td class="col_value" id="image_data_id">
	    	<?php 
	    	
		    	$opt = array(
		    	
		    			'value' => $image['memos'],
		    	
		    			'onmouseover'	=> 'this.select()'
		    			// 							'onmouseover'	=> 'this.focus()'
		    	
		    	);
		    		
		    	//ref http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html
		    	echo $this->Form->input('', $opt);
		    	 
	//     		echo $image['memos'];
	    	
	    	?>
	    </td>
	  </tr>
	  
	</table>

</div><!-- <div id="image_data"> -->

<!-- http://stackoverflow.com/questions/25987076/how-to-add-onclick-event-in-cakephp-submit-button answered Sep 23 '14 at 4:57 -->
<?php
	$options = array(
	    'label' => 'Submit',
	    'id' => 'submit',
	    'onclick' => 'alert(123)'
// 	    'onclick' => 'myfunc()'
	);
	echo $this->Form->end($options);
?>

<hr/>

<?php echo $this->element('layouts/links')?>