<h1>

	Images 
	
	<br>
	
		(
		<font color="black">
			total images = <?php echo $total_num_of_images; ?>
			
			<?php if (@$num_of_images_filtered) 
						echo "/ filtered images = $num_of_images_filtered";
					else
						echo "/ filtered images = ";
			?>
			
			<?php 
				if (@$num_of_pages) 
					echo "/ pages = $num_of_pages";
				else 
					echo "/ pages =";
			?>
		)
			
	<!-- Images (<?php //echo count($images)?>) -->
	
	<br>
	
	(
		<?php 
			if(isset($filter_memo)) 
				echo "filter_memo => $filter_memo";
			else
				echo "filter_memo =>";
		?>
		
		<?php 
			if(isset($filter_table_name)) 
				echo " / filter_table_name => $filter_table_name";
			else 
				echo " / filter_table_name =>";
		?>
		
		<?php 
			if(isset($filter_file_name)) 
				echo " / filter_file_name => $filter_file_name";
			else 
				echo " / filter_file_name =>";
		?>
	)

	</font>
	
	<br>
	<br>
	<a name="top"></a><a href="#bottom" class="navi_top_bottom">Bottom</a>
	
</h1>

<br>

<?php echo $this->element('images/index/_index_pagination')?>

<br>

<table>

	<?php echo $this->element('images/index/index_t_headers')?>

		<!-- Here is where we loop through our $images array, printing out post info -->
		
	<?php //echo $this->element('images/index/_search_memos')?>
	<?php echo $this->element('images/index/_searchs')?>

	<?php echo $this->element('images/index/index_t_entries')?>
	

</table>

<div>

	<!-- $images2[0]['Image']['file_name'] => <?php //echo $images2[0]['Image']['file_name']; ?> -->

</div>

<?php echo $this->element('images/index/_index_pagination')?>

<br>
<br>

<div>

	<a name="bottom"></a><a href="#top" class="navi_top_bottom">Top</a>
	
</div>

<br>
<br>

<?php echo $this->Html->link(
    'Add Image',
    array('controller' => 'images', 'action' => 'add')
); ?>
