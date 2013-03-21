<!-- app/View/Users/add.ctp -->
<?php $this->layout = 'login'; ?>  <!-- login Layout laden -->
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
	<?php echo $id ?>
        <legend><?php echo __('Add User'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'author' => 'Author')
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>