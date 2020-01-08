<!-- ref http://www.w3schools.com/tags/tag_script.asp -->
<script>

</script>

<h1>

	Ifm
	
	<!-- //_20191231_173717:next -->

</h1>

<hr>

	<table id="tbl_ifm_index_main">
	
	        <tr>
	            
	            <th>
	                No.
	            </th>
	                
	            <th>
	            
	                File
	                
	            </th>
	        
	            <th>
	            
	                Action
	            
	            </th>
	            
	        </tr>
	
	
	</table>

<!-- <div id="div_IM_Update_Date"> -->
<div id="div_Ifm_Index_Input_Area">

    Update date
    
    <input 
        id="ipt_Ifm_Index_Input_Area"
        onmouseover="this.select()"
        />

</div>

<div id="div_Ifm_Index_Actions__Entries">

	<!-- <table id="tbl_Im_Actions"> -->
	
	<table id="tbl_Im_Actions__Body">
	     
	    <?php 
	    	
	    	$cntOf_Loop = 1;
	    
	    	foreach ($lo_Commands as $item) {
	    	
	    		;
	    		
	    	
	    
	    ?>
	        <tr>
	        
	            <td>
	            
	                <?php echo $cntOf_Loop; ?>
	            
	            </td>
	            
	            <td id="<?php echo $item[0]; ?>" name="<?php echo $item[1]; ?>">
	            
	                <?php echo $item[2]; ?>
	                
	            </td>
	            
	            <td>
	            
	                <button 
	                       onclick="im_Action('<?php echo $item[0]; ?>')"
	                       class="bt_Basic_2_Size20"
	                       >
	                   GO
	                   </button>
	                
	            </td>
	            
	        </tr>
	    <?php 
	    	
	    	// count
	    	$cntOf_Loop += 1;
	    
	    	}//foreach ($lo_Commands as $item)
	    
	    ?>

	</table>

</div><!-- <div id="div_Ifm_Index_Actions__Entries"> -->

<hr>

	
	<div id="area_result">
		
		result
	
	</div>
<hr>

<?php echo $this->element('layouts/links')?>

<?php echo $this->element('audio_files/links')?>

