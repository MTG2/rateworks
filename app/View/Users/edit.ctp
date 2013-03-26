<!-- File: /app/View/Users/edit.ctp -->
<?php $this->layout = 'standart'; ?>  <!-- standart Layout laden -->
<h1>Edit Profile</h1>
<div class="profilcontainer">
<section id="profil">
<?php

echo $this->Html->image($entry['User']['pic'], array('alt' => 'Cakephp', 'border' => '0', 'width' => '15%', 'height' => '15%'))."</br>";

	echo "Username: ".$entry['User']['username']."</br>";
	echo "Role: ".$entry['User']['role']."</br></br>";
    echo $this->Form->create('User', array('action' => 'edit', 'type' => 'file'));?>
	
  <div> <?php echo $this->Form->input('semester', array('maxlength' => '2')); ?> </div>
  <div> <?php echo $this->Form->input('matnr', array('maxlength' => '6'));?> </div>
  <div> <?php echo $this->Form->input('course');?> </div>
  <div> <?php echo $this->form->file('file');?>	   </div>
  <div> <?php echo $this->Form->end('Save User'); ?> </div>
	
	</section>
	</div>