<!-- File: /app/View/Frameworks/add.ctp -->
<?php $this->layout = 'standart'; ?>  <!-- standart Layout laden -->
<h1>Add Framework</h1>
<?php
echo $this->Form->create('Framework', array('action' => 'add', 'type' => 'file'));
echo $this->Form->input('name');
echo $this->Form->input('text', array('rows' => '3'));
echo $this->form->file('file');
echo $this->Form->end('Save Framework');
?>