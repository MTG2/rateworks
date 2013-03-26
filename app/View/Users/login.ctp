
<!-- File: /app/View/Users/login.ctp -->
<?php $this->layout = 'login'; ?>  <!-- login Layout laden -->

<div class="container">
	<section id="formular">
<?php echo $this->Form->create('User'); ?>
			<h1>Login Form</h1>
			<div>
				<?php echo $this->Form->input('username');?>
			</div>
			<div>
				<?php echo $this->Form->input('password');?>
			</div>
			<div>
				<?php echo $this->Form->end(__('Login')); ?>
				<?php echo $this->Html->link('Registrieren', array('controller' => 'users', 'action' => 'register')); ?>
			</div>
		</form><!-- form -->
	</section><!-- content -->
</div><!-- container -->