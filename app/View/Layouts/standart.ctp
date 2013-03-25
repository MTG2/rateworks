<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */


?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.site');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>

		
			<div id="navigation">
			<?php echo $this->Html->link('Index', '/entries/index'); ?>
			<?php echo $this->Html->link('Frameworks', ''); ?>
			<?php echo $this->Html->link('Logout', '/users/logout'); ?>
			<?php echo $this->Html->link('Profil', array(
								   		'controller' => 'users',
										'action' => 'edit',
										$id));?>
			</div>
			
			
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
			
		<div id="content">
			<?php echo 'test' ?>
		</div>
		<div id="footer">
		<?php echo $this->Html->link('Impressum', array(
								   		'controller' => 'users',
										'action' => 'impressum')) ?>
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => 'Cakephp', 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>

</body>
</html>
