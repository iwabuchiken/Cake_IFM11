<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

// $cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
// $cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php //echo $cakeDescription ?>
		<?php //echo $title_for_layout; ?>
		Cake_IFM11
	</title>
	
	<meta name="viewport"
           content="width=device-width,
			user-scalable=yes,
			initial-scale=0.30,
			minimum-scale=0.01,
                    maximum-scale=3.0" />
	
	<?php
		echo $this->Html->meta('icon');

		
		echo $this->Html->css('cake.generic');
		echo $this->Html->css('main');
		echo $this->Html->css('jquery-ui.structure');
		echo $this->Html->css('jquery-ui.theme');
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
		echo $this->Html->script('http://code.jquery.com/jquery-1.10.2.min.js');
		echo $this->Html->script('jquery-ui.js');
		
		echo $this->Html->script('main');

		// d3
		echo $this->Html->script('http://d3js.org/d3.v3.min.js');
		
	?>
</head>
<body>

	<div id="container">
	
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	
	<?php //echo $this->element('sql_dump'); ?>
	
</body>
</html>
