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
		echo $this->Html->css('rateit');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>	
		
	<?php echo $this->html->script('jquery-1.9.1',true); ?>
	
	<script type="text/javascript">
	$(document).ready(function(){
		setTimeout(function(){$("#flashMessage").slideUp(250);},2000);	
		});
	</script>
	
 <?php
 echo $scripts_for_layout;
 ?>

</head>
<body>


		
	<div id="navigationAdmin">
		<div id="navigationMitte">
				<div id="naviLinkAdmin"><?php echo $this->Html->image('zahnrad_klein.png')?> <?php echo $this->Html->link('Adminindex', '/users/a_main'); ?></div>
				<div id="naviLinkAdmin"><?php echo $this->Html->image('zahnrad_klein.png')?> <?php echo $this->Html->link('User verwalten', '/users/a_edit_u'); ?></div>
				<div id="naviLinkAdmin"><?php echo $this->Html->image('zahnrad_klein.png')?> <?php echo $this->Html->link('Frameworks verwalten', '/frameworks/a_edit_frameworks'); ?></div>
				<div id="naviLinkAdmin"><?php echo $this->Html->image('zahnrad_klein.png')?> <?php echo $this->Html->link('Key verwalten', '/users/a_edit_key'); ?></div>
											
			<div id="usernav">
				<div id="navPicAdmin"><?php echo		
					$this->Html->link(
						$this->Html->image('back.png', array('border' => '0')),
							array('controller' => 'users', 'action' => 'index'),
							array('escape' => false));
					?></div>
				<div id="navPicAdmin"><?php echo		
					$this->Html->link(
						$this->Html->image('profil_logo_kleiner.png', array('border' => '0')),
							array('controller' => 'users', 'action' => 'edit', 'class' => 'navigation'),
							array('escape' => false));
					?></div>
				<div id="naviLinkAdmin"><?php echo $this->Html->link('Logout', '/users/logout', array('class'=>'navigation')); ?></div>
					
			</div>
		</div>
	</div>
			
			
			
			
			
		<div id="content">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
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
