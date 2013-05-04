<!-- File: /app/View/Users/edit.ctp -->
<?php $this->layout = 'standart'; ?>  <!-- standart Layout laden -->



<section id="profil">

<div id="userForm">
<?php

echo $this->Form->create('User', array('action' => 'edit', 'type' => 'file'));	

	echo "Username: ".$entry['User']['username']."</br>";
	echo "Rolle: ".$entry['User']['role']."</br></br>";

?>
		

<b>Semester</b>	
   <?php echo $this->Form->input('semester', array('maxlength' => '2', 'label' => '')); ?> 
<b>Studiengang</b>
   <?php echo $this->Form->input('course', array('maxlength' => '30', 'label' => '')); ?> 
<b>E-Mail Adresse</b>
   <?php echo $this->Form->input('email', array('maxlength' => '30', 'label' => '')); ?> 
<b>Altes Passwort</b>
  <?php echo $this->Form->input('oldpassword', array('placeholder' => 'Passwort','label' => '','id' => 'oldpassword'));?>
<b>Neues Passwort</b>
   <?php echo $this->Form->input('newpassword', array('placeholder' => 'Passwort','label' => '','id' => 'newpassword'));?>


  <div id="profilPic">
  <b>Profilbild</b><br>
  <?php
  echo $this->Html->image($entry['User']['pic'], array('alt' => 'Cakephp', 'border' => '0'))."</br>";
  echo "<p><small>Dateityp: <b>jpg, png, gif</b><br>";
  echo "Bildformat <b>1:1</b><br>";
  echo "max. <b>0,8 Mb</b><br>";
  echo "gif-Bildformate maximal 150x150 pixel</small></p><br>";
  echo $this->form->file('file')."<br><br>";

  echo '</div>';
  echo $this->Form->end('Save User');  
  ?>
  </section>
<?php if($activities != null){ ?>

	
<h2>Letze Tätigkeiten</h2>
<div id="commentArea">

<?php
$i=0; // Variable für Anzahl der Einträge
foreach ($activities as $activity): 
$i=$i+1;
?>

<div id="activity">

<?php 
if ($activity['type']=='comment'){
echo "".$this->Html->image('commentSmall.png', array('border' => '0',))." ".$this->Html->link($activity['value']['Entry']['name'], array('controller' => 'comments', 'action' => 'view/'.$activity['value']['Entry']['id'].''))." am ".$activity['value']['Entry']['created']." kommentiert: <p>";
echo nl2br($activity['value']['Comment']['text']);
}
?>
<?php
if ($activity['type']=='entry'){
echo "".$this->Html->image('entrySmall.png', array('border' => '0', 'width'=>''))." Projekt ".$this->Html->link($activity['value']['Entry']['name'], array('controller' => 'comments', 'action' => 'view/'.$activity['value']['Entry']['id'].''))." am ".$activity['value']['Entry']['created']." angelegt. <p>";
}
if ($i==10)break; 
?>

</div>




<hr>

<?php endforeach;} ?>


</div>

