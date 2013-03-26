<!-- app/View/Users/add.ctp -->
<?php $this->layout = 'login'; ?>  <!-- login Layout laden -->

<div class="container">
	<section id="formular">
<?php echo $this->Form->create('User'); ?>
			<h1>Register</h1>
			<div>
				<?php echo $this->Form->input('username', array(
				'placeholder' => 'Username',
				'label' => ''));?>
			</div>
			<div>
				<?php echo $this->Form->input('password', array(
				'placeholder' => 'Passwort',
				'label' => ''));?>
			</div>
			<div>
				<?php echo $this->Form->end(__('Register')); ?>
			</div>
		</form><!-- form -->
	</section><!-- content -->
</div><!-- container -->