<!-- File: /app/View/Users/a_edit_u_view.ctp -->
<?php $this->layout = 'admin'; ?>  <!-- admin Layout laden -->



<h1>Profile bearbeiten</h1>

<?php

	echo $this->Html->image($thisUser['User']['pic'], array('alt' => 'Cakephp', 'border' => '0', 'width' => '15%', 'height' => '15%'))."</br>";

	echo "<b>Username: ".$thisUser['User']['username']."</br></b>";
    echo $this->Form->create('User');
	
	$role = "admin";
	if ($thisUser['User']['role'] == $role){
		$role = "author";
	}
		
	echo "<b>Rolle: </b>".$this->Form->input('role', array('label'=>'', 'type' => 'select', 'options' => array($thisUser['User']['role'] => $thisUser['User']['role'], $role => $role)));
	//echo "<b>Rolle: </b>".$this->Form->input('role', array('label' => '', 'value'=> $thisUser['User']['role']));
	?>
	

Semester	
  <div> <?php echo $this->Form->input('semester', array('maxlength' => '2', 'label' => '', 'value'=> $thisUser['User']['semester'])); ?> </div>
Studiengang
  <div> <?php echo $this->Form->input('course', array('maxlength' => '30', 'label' => '', 'value'=> $thisUser['User']['course'])); ?> </div>
E-Mail
  <div> <?php echo $this->Form->input('email', array('maxlength' => '30', 'label' => '', 'value'=> $thisUser['User']['email'])); ?> </div>
  <div> <?php echo $this->Form->end('Save User'); ?> </div>
	






