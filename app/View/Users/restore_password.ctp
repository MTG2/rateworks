<!-- app/View/Users/add.ctp -->
<?php $this->layout = 'login'; ?>  <!-- login Layout laden -->

<div class="container">
	<section id="formular">
<?php echo $this->Form->create('User'); ?>
			<h1>Passwort vergessen</h1>
			<h2>Bitte geben Sie ihre E-Mail Adresse an</h2>
			<div>
				<?php echo $this->Form->input('email', array(
				'placeholder' => 'E-Mail',
				'label' => '',
				'id' => 'email'));?>
			</div>
			<div>
				<?php echo $this->Form->end(__('Bestätigen')); ?>
				<?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login')); ?>
			</div>
		</form><!-- form -->
	</section><!-- content -->
</div><!-- container -->