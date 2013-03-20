<!-- File: /app/View/Users/a_main.ctp -->
<?php $this->layout = 'admin'; ?>  <!-- admin Layout laden -->
<p><?php echo $this->Html->link('User verwalten', array('controller' => 'users', 'action' => 'a_edit_u')); ?></p>
<p><?php echo $this->Html->link('Entries verwalten', array('controller' => 'entries', 'action' => 'a_edit_rates')); ?></p>
<p><?php echo $this->Html->link('Frameworks verwalten', array('controller' => 'frameworks', 'action' => 'a_edit_frameworks')); ?></p>
