<!-- File: /app/View/Frameworks/edit.ctp -->

<h1>Edit Frameworks</h1>
<?php
    echo $this->Form->create('Framework');
    echo $this->Form->input('name');
    echo $this->Form->input('text', array('rows' => '3'));
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end('Save Framework');