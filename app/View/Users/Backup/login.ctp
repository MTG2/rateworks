
<!-- File: /app/View/Users/login.ctp -->
<?php $this->layout = 'login'; ?>  <!-- login Layout laden -->

<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
<p><?php echo $this->Html->link('Registrieren', array('controller' => 'users', 'action' => 'register')); ?></p>
</div>
