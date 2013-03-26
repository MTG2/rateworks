<!-- app/View/Users/add.ctp -->
<?php $this->layout = 'login'; ?>  <!-- login Layout laden -->

<div class="container">
	<section id="formular">
<?php echo $this->Form->create('User'); ?>
			<h1>Register</h1>
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
				<?php echo $this->Form->end(__('Register')); ?>
			</div>
		</form><!-- form -->
	</section><!-- content -->
</div><!-- container -->