<!-- File: /app/View/Entries/add.ctp -->

<h1>Add Entry</h1>
<?php
echo $this->Form->create('Entry');
echo $this->Form->input('name');
echo $this->Form->input('description', array('rows' => '3'));
echo $this->Form->end('Save Entry');
?>