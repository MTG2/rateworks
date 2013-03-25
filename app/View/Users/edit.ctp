<!-- File: /app/View/Users/edit.ctp -->
<?php $this->layout = 'standart'; ?>  <!-- standart Layout laden -->
<h1>Edit Profile</h1>
<?php


	echo "Username: ".$this->request->data['User']['username']."</br>";
	echo "Role: ".$this->request->data['User']['role']."</br></br>";
    echo $this->Form->create('User', array('action' => 'edit', 'type' => 'file'));
    echo $this->Form->input('semester', array('maxlength' => '2'));
    echo $this->Form->input('matnr',array('maxlength' => '6'));
	echo $this->Form->input('course');
	echo $this->form->file('file');
    echo $this->Form->end('Save User');
	?>
	