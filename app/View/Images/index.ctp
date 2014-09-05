<h1>

	Images (<?php echo count($images)?>)
	
	<a name="top"></a><a href="#bottom" class="navi_top_bottom">Bottom</a>
	
</h1>
<table>

	<?php echo $this->element('images/index/index_t_headers')?>

		<!-- Here is where we loop through our $images array, printing out post info -->
		
	<?php echo $this->element('images/index/_search_memos')?>

	<?php echo $this->element('images/index/index_t_entries')?>
	

</table>

<div>

	$images2[0]['Image']['file_name'] => <?php echo $images2[0]['Image']['file_name']; ?>

</div>

<div>
	<?php 

		$paginator = $this->Paginator;
	
		echo $paginator->first("First");
		
		echo " | ";
		
		if($paginator->hasPrev()){
			echo $paginator->prev("Prev");
		} else {
		
			echo "Prev";

		}
		
		echo " | ";
		
		echo $paginator->numbers(array('modulus' => 2));
		
		echo " | ";
		
		// for the 'next' button

        if($paginator->hasNext()){
            echo $paginator->next("Next");
        } else {
		
			echo "Next";

		}
		
		echo " | ";
		
		echo $paginator->last("Last");
        
    ?>

</div>

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
