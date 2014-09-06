<div class="pagination">
	<?php 

		$paginator = $this->Paginator;
	
		echo $paginator->first(
							"First",
							array('class' => 'Pg_first'),
							"No first",
							array('class' => 'Pg_prev')
		);
		
		echo " | ";
		
		echo $paginator->prev(
						"Prev",
						array('class' => 'Pg_prev'),
						"No Prev",
						array('class' => 'Pg_prev')
		);

			
// 		if($paginator->hasPrev()){
// 			echo $paginator->prev("Prev");
// 		} else {
		
// 			echo "Prev";

// 		}
		
		echo " | ";
		
		echo $paginator->numbers(array('modulus' => 6));
		
		echo " | ";
		
		// for the 'next' button

        echo $paginator->next(
							"Next",
							array('class' => 'Pg_next'),
							"No next",
							array('class' => 'Pg_next')

		);
		
		echo " | ";
		
		echo $paginator->last("Last",
				array('class' => 'Pg_last'),
				"No next",
				array('class' => 'Pg_last')
				
        );
        
    ?>

</div>

