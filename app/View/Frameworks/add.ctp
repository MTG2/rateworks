<!-- File: /app/View/Frameworks/add.ctp -->
<?php $this->layout = 'admin'; ?>  <!-- admin Layout laden -->
<h1>Add Framework</h1>
<?php
	echo $this->Form->create('Framework', array('action' => 'add', 'type' => 'file'));
	echo "Name";
	echo $this->Form->input('name', array('label' => ''));
	echo "Link zum Framework";
	echo $this->Form->input('link', array('rows' => '3', 'label' => ''));
	echo "<b>Maximal 3Mb sollte das Bild gross sein.</b></br>";
	echo $this->form->file('file');
	echo $this->Form->end('Save Framework');
?>