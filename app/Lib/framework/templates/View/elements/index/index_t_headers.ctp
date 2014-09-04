<tr>
		<th>
		
			<?php

				echo $this->Html->link(
						'Memo',
						$this->Mytest->build_Path_ContActionParam(
								'videos', 'index', 'sort=id')
				);
					
			?>
			
		</th>
		
		<th>
		
			<?php

				echo $this->Html->link(
						'Title',
						$this->Mytest->build_Path_ContActionParam(
								'videos', 'index', 'sort=title')
				);
				
			?>
			
		</th>
		
		<th>
		
			<?php

				echo $this->Html->link(
						'Genre',
						$this->Mytest->build_Path_ContActionParam(
								'videos', 'index', 'sort=genre_id')
				);
					
			?>
			
		</th>
		
		<th>
		
			<?php

				echo $this->Html->link(
						'URL',
						$this->Mytest->build_Path_ContActionParam(
								'videos', 'index', 'sort=url')
				);
					
			?>
			
		</th>
		
		<th>
		
			<?php 
				echo $this->Html->link(
				    'Memo',
				    $this->Mytest->build_Path_ContActionParam(
										'videos', 'index', 'sort=memo')
				);
			
			?>
			
		</th>
		
		<th>
		
			<?php

				echo $this->Html->link(
						'Created at',
						$this->Mytest->build_Path_ContActionParam(
								'videos', 'index', 'sort=created_at')
				);
					
			?>
			
		</th>
		
		<th>
		
			<?php

				echo $this->Html->link(
						'Updated at',
						$this->Mytest->build_Path_ContActionParam(
								'videos', 'index', 'sort=updated_at')
				);
					
			?>
			
		</th>
		
</tr>
