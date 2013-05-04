<!-- File: /app/View/Users/view.ctp -->
<?php $this->layout = 'standart'; ?> 
<div id="user">
<h3><?php echo "Profil von ".$user['User']['username'].""; ?></h3>
<?php echo $this->Html->image($user['User']['pic'], array('class'=>'alignleft', 'width'=>'150px', 'height'=>'150px'));  ?>
<p>Rolle: <?php echo $user['User']['role']; ?> </p>
<p>E-Mail: <?php echo $user['User']['email']; ?> </p>
<p>Semester: <?php echo $user['User']['semester']; ?> </p>
<p>Studiengang: <?php echo $user['User']['course']; ?> </p>
<p>Anzahl Kommentare: <?php echo count($comments) ?>
<p>Anzahl Projekte: <?php echo count($entries) ?>
</div>
<h3>Letze Tätigkeiten</h3>
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

<?php endforeach; ?>


</div>

