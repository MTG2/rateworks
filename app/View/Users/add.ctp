
<?php $this->layout = 'login'; ?>  <!-- login Layout laden -->


<?php echo $this->Form->create('User') ?>

<h1>Sign-up</h1>
<p>Bitte geben Sie ihre Daten ein</p>

<?php echo $this->Form->input('username');?>

<?php echo $this->Form->input('password');?>

<?php echo $this->Form->end(__('Submit'));?>

