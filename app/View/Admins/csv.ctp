<table>

	<tr>
		
		<th class="csv_maintable">
		<!-- <th style="width: 20%;"> -->

			Create CSV
		
		</th>
	
		<th class="csv_maintable">
		<!-- <th style="width: 100px;"> -->

			Download CSV
		
		</th>
	
	</tr>

	<!-- Tokens ------------------------------------------>
	<tr>
		
		<td class="csv_maintable">
		
			<?php echo $this->Html->link("Tokens",
								array(
									'controller' => 'admins', 
									'action' => 'csv_Tokens_create',
									'tokens'
									)
								); 
			?>
		
		</td>
	
		<td class="csv_maintable">
		
			<?php echo $this->Html->link("Tokens",	
								array(
									'controller' => 'admins', 
									'action' => 'csv_Tokens_dl',
									'tokens')
// 									'name')
// 									'name' => 'index')
// 									'action' => 'csv_Tokens_dl')
								); 
			?>
		
		</td>
	
	</tr>

	<!-- Categories ------------------------------------------>
	<tr>
		
		<td class="csv_maintable">
		
			<?php echo $this->Html->link("Categories",
								array(
									'controller' => 'admins', 
									'action' => 'csv_Tokens_create',
									'categorys'
									)
								); 
			?>
		
		</td>
	
		<td class="csv_maintable">
		
			<?php echo $this->Html->link("Categories",
								array(
									'controller' => 'admins', 
									'action' => 'csv_Tokens_dl',
									'categorys')
// 									'name')
// 									'name' => 'index')
// 									'action' => 'csv_Tokens_dl')
								); 
			?>
		
		</td>
	
	</tr>

	<!-- Genres ------------------------------------------>
	<tr>
		
		<td class="csv_maintable">
		
			<?php echo $this->Html->link("Genres",
								array(
									'controller' => 'admins', 
									'action' => 'csv_Tokens_create',
									'genres'
									)
								); 
			?>
		
		</td>
	
		<td class="csv_maintable">
		
			<?php echo $this->Html->link("Genres",
								array(
									'controller' => 'admins', 
									'action' => 'csv_Tokens_dl',
									'genres')
// 									'name')
// 									'name' => 'index')
// 									'action' => 'csv_Tokens_dl')
								); 
			?>
		
		</td>
	
	</tr>

	<!-- Historys ------------------------------------------>
	<tr>
		
		<td class="csv_maintable">
		
			<?php echo $this->Html->link("Histories",
								array(
									'controller' => 'admins', 
									'action' => 'csv_Tokens_create',
									'historys'
									)
								); 
			?>
		
		</td>
	
		<td class="csv_maintable">
		
			<?php echo $this->Html->link("Histories",
								array(
									'controller' => 'admins', 
									'action' => 'csv_Tokens_dl',
									'historys')
// 									'name')
// 									'name' => 'index')
// 									'action' => 'csv_Tokens_dl')
								); 
			?>
		
		</td>
	
	</tr>

</table>