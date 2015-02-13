		<?php foreach ($videos as $video): ?>
		<tr>
				<td><?php echo $video['Video']['id']; ?></td>
				<td>
					<?php echo $this->Html->link($video['Video']['title'],
									array(
										'controller' => 'videos', 
										'action' => 'view', 
										$video['Video']['id'])
									); ?>
				</td>
				<td><?php echo $video['Genre']['name']; ?></td>
				
				<td>
					<?php //echo $video['Video']['url']; ?>
					<?php echo $this->Html->link($video['Video']['url'],
									$url = $video['Video']['url']
									); ?>
				</td>
				
				<td><?php echo $video['Video']['memo']; ?></td>
				
				<td><?php echo $video['Video']['created_at']; ?></td>
				
				<td><?php echo $video['Video']['updated_at']; ?></td>
				
		</tr>
		<?php endforeach; ?>
		<?php unset($video); ?>