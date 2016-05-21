<br>
<br>

<table id="links">
	<tr>
	
		<td>
		
			<?php echo 
					$this->Html->link(
								'Images',
								array('controller' => 'images', 
										'action' => 'index'),
								array('class' => "button"));
			?>
			
		</td>
		
		<td>
		
			<?php echo 
					$this->Html->link(
								'Images(2)',
								array('controller' => 'images', 
										'action' => 'index_2'),
								array('class' => "button"));
			?>
			
		</td>
		
		<td>
		
			<?php echo 
					$this->Html->link(
								'Add Image',
								array('controller' => 'images', 
										'action' => 'add'),
								array('class' => "button"));
			?>
			
		</td>
		
		<td>
		
			<?php echo 
					$this->Html->link(
								'Add Image (From DB file)',
								array('controller' => 'images', 
										'action' => 'add_From_DB_File'),
								array('class' => "button"));
			?>
			
		</td>

	</tr>
	<tr>
		
		<td>
		
			<?php echo $this->Html->link(
								'Image manager',
								array('controller' => 'images', 
										'action' => 'image_manager'),
								array('class' => "button"));
			?>
			
		</td>
		
		<td>
		
			<?php echo $this->Html->link(
								'Admin: Image manager',
								array('controller' => 'admins', 
										'action' => 'index'),
								array('class' => "button"));
			?>
			
		</td>
		
		<td>
		
			<?php echo $this->Html->link(
								'Remote: images',
								'http://benfranklin.chips.jp/cake_apps/Cake_IFM11/images',
								array(
										'class' => "button",
										'target'	=> "_blank"
									)
								);
			?>
			
		</td>
		
	</tr>
	
	<tr>
	
		<td>

			<?php 
				echo $this->Html->link(
							'Admin',
								array('controller' => 'admins', 
										'action' => 'index'),
								array('class' => "button_2")
				);
			
			?>
		
		</td>
	
		<td>

			<?php 
				echo $this->Html->link(
							'Remote',
								'http://benfranklin.chips.jp/cake_apps/Cake_IFM11/images',
								array(
									'class' => "button_2",
									'target'	=> "_blank"
									)
				);
			
			?>
		
		</td>
	
		<td>

			<?php 
				
				$link_Url = "";
				
				//ref http://stackoverflow.com/questions/15845928/determine-if-operating-system-is-mac answered Apr 6 '13 at 1:11
				$user_agent = getenv("HTTP_USER_AGENT");
				
				if (strpos($user_agent, "Win") !== FALSE) {
					
					$link_Url .= "http://localhost/Eclipse_Luna/Cake_IFM11/images";
					
				} else if (strpos($user_agent, "Mac") !== FALSE) {
					
					$link_Url .= "http://localhost:8888/Cake_IFM11/images";
					
				} else {
					
				}

				echo $this->Html->link(
							'Local',
								$link_Url,
								//'http://benfranklin.chips.jp/cake_apps/Cake_IFM11/images',
								array(
									'class' => "button_2",
									'target'	=> "_blank"
									)
				);
			
			?>
		
		</td>
	
		<td>
		
			<?php 
			
				echo $this->Html->link(
							'Memos(remote)',
								'http://benfranklin.chips.jp/cake_apps/Cake_IFM11/memos/index',
								array(
									'class' => "button_2",
									'target'	=> "_blank"
									)
				);
			
			?>
		
		</td>
	
		<td>
		
			<?php 
				
				$link_Url = "";
				
				//ref http://stackoverflow.com/questions/15845928/determine-if-operating-system-is-mac answered Apr 6 '13 at 1:11
				$user_agent = getenv("HTTP_USER_AGENT");
				
				if (strpos($user_agent, "Win") !== FALSE) {
					
					$link_Url .= "http://localhost/Eclipse_Luna/Cake_IFM11/memos/index";
					
				} else if (strpos($user_agent, "Mac") !== FALSE) {
					
					$link_Url .= "http://localhost:8888/Cake_IFM11/memos/index";
					
				} else {
					
				}

				echo $this->Html->link(
							'Memos(local)',
								$link_Url,
								//'http://benfranklin.chips.jp/cake_apps/Cake_IFM11/images',
								array(
									'class' => "button_2",
									'target'	=> "_blank"
									)
				);
			
			?>
				
		</td>
	
	</tr>
	
</table>


