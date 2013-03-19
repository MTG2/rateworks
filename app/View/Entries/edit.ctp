<!-- File: /app/View/Posts/edit.ctp -->

<h1>Edit Entry</h1>
<?php
    echo $this->Form->create('Entry');
    echo $this->Form->input('name');
    echo $this->Form->input('text', array('rows' => '3'));
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end('Save Entry');