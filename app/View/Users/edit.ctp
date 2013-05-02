<!-- File: /app/View/Users/edit.ctp -->
<?php $this->layout = 'standart'; ?>  <!-- standart Layout laden -->
<h1>Edit Profile</h1>

<section id="profil">
<?php

echo "<b>Profilbild</b><br>";

echo $this->Html->image($entry['User']['pic'], array('alt' => 'Cakephp', 'border' => '0'))."</br>";
echo $this->Form->create('User', array('action' => 'edit', 'type' => 'file'));

echo $this->form->file('file')."<br><br>";
	echo "Username: ".$entry['User']['username']."</br>";
	echo "Role: ".$entry['User']['role']."</br></br>";
    echo $this->Form->create('User', array('action' => 'edit', 'type' => 'file'));?>

Semester	
  <div> <?php echo $this->Form->input('semester', array('maxlength' => '2', 'label' => '')); ?> </div>
Studiengang
  <div> <?php echo $this->Form->input('course', array('maxlength' => '30', 'label' => '')); ?> </div>
E-Mail
  <div> <?php echo $this->Form->input('email', array('maxlength' => '30', 'label' => '')); ?> </div>

  <div> <?php echo $this->Form->end('Save User'); ?> </div>
	
	</section>
