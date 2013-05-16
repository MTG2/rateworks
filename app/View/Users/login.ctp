
<!-- File: /app/View/Users/login.ctp -->
<?php $this->layout = 'login'; ?>  <!-- login Layout laden -->

<div class="container">
	<section id="formular">
<?php echo $this->Form->create('User'); ?>
			<h1>Login</h1>
			<div>
				<?php echo $this->Form->input('username', array(
				'placeholder' => 'Username',
				'label' => '',
				'id' => 'username'));?>
			</div>
			<div>
				<?php echo $this->Form->input('password', array(
				'placeholder' => 'Passwort',
				'label' => '',
				'id' => 'password'));?>
			</div>
			<div>
				<?php echo $this->Form->end(__('Login')); ?>
				<?php echo $this->Html->link('Registrieren', array('controller' => 'users', 'action' => 'register')); ?>
				<?php echo $this->Html->link('Passwort vergessen', array('controller' => 'users', 'action' => 'restore_password')); ?>
			</div>
		</form><!-- form -->
	</section><!-- content -->
</div><!-- container -->