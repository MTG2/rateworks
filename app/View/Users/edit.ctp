<!-- File: /app/View/Users/edit.ctp -->

<h1>Edit Profile</h1>
<?php


	echo "Username: ".$this->request->data['User']['username']."</br>";
	echo "Role: ".$this->request->data['User']['role']."</br></br>";
    echo $this->Form->create('User');
    echo $this->Form->input('semester', array('maxlength' => '2'));
    echo $this->Form->input('matnr',array('maxlength' => '6'));
	echo $this->Form->input('course');
	echo $this->Form->input('pic', array('type' => 'file'));
    echo $this->Form->end('Save User');
	?>
	