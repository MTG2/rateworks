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
				<?php echo $this->Form->input('registrationkey', array(
				'placeholder' => 'Zugangsschluessel',
				'label' => '',
				'id' => 'Schlüssel'));?>
			</div>
			<h1>Zusätzliche Informationen</h1>
			<div>
				<?php echo $this->Form->input('email', array(
				'placeholder' => 'E-Mail',
				'label' => '',
				'id' => 'email'));?>
			</div>
			<div>
				<?php echo $this->Form->input('semester', array(
				'placeholder' => 'Semester',
				'label' => '',
				'id' => 'semester'));?>
			</div>
			<div>
				<?php echo $this->Form->input('course', array(
				'placeholder' => 'Studiengang',
				'label' => '',
				'id' => 'course'));?>
			</div>

			<div>
				<?php echo $this->Form->end(__('Register')); ?>
			</div>
		</form><!-- form -->
	</section><!-- content -->
</div><!-- container -->