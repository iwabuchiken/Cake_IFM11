<h1>

	Memos
		
	<a name="top"></a><a href="#bottom" class="navi_top_bottom">Bottom</a>
	
</h1>


<?php echo $this->element('memos/index/_index_search_string')?>

<br>
<br>

<?php 

	if (isset($message_2)) {
		
		//ref color http://www.w3schools.com/tags/att_font_color.asp
		echo "conditions => '<font color='blue'>$message_2</font>'";
		
	}//isset($message_2)
?>

<br>

<?php 

	if (isset($metadata)) {
	
		//ref color http://www.w3schools.com/tags/att_font_color.asp
		echo "page => <font color='green'>".$metadata['page']."</font>"
			."/".$metadata['totalpage']
			." (memos => <font color='green'>".$metadata['total memos']."</font>)"
		;
	
	}//isset($message_2)

?>


<br>
<br>

<?php echo $this->element('memos/index/_index_pagination')?>

<br>
<br>

<table>

	<?php echo $this->element('memos/index/index_t_headers')?>

		<!-- Here is where we loop through our $images array, printing out post info -->
		
	<?php //echo $this->element('images/index/_search_memos')?>
	<?php //echo $this->element('images/index/_searchs')?>

	<?php 
	
		echo $this->element('memos/index/index_t_entries')
		
	?>
	

</table>


<br>
<br>

<?php echo $this->element('memos/index/_index_pagination')?>

<br>
<br>

<div>

	<a name="bottom"></a><a href="#top" class="navi_top_bottom">Top</a>
	
</div>

<?php echo $this->element('layouts/links_memos')?>
