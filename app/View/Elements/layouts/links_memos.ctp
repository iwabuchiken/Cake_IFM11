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
	
	</tr>
	
</table>
