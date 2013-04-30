<!-- File: /app/View/Users/view.ctp -->
<?php $this->layout = 'standart'; ?> 
<div id="user">
<h3><?php echo $user['User']['username']; ?></h3>
<?php echo $this->Html->image($user['User']['pic'], array('class'=>'alignleft', 'width'=>'150px', 'height'=>'150px'));  ?>
<p>Rolle: <?php echo $user['User']['role']; ?> </p>
<p>E-Mail: <?php echo $user['User']['email']; ?> </p>
<p>Semester: <?php echo $user['User']['semester']; ?> </p>
<p>Kurs: <?php echo $user['User']['course']; ?> </p>
<p>Anzahl Kommentare: <?php echo count($comments) ?>
<p>Anzahl Projekte: <?php echo count($entries) ?>
</div>
<h2>Letze Tätigkeiten</h2>
<div id="commentArea">

<?php
$i=0; // Variable für Anzahl der Einträge
foreach ($activities as $activity): 
$i=$i+1;
?>

<div id="comment">

<?php 
if ($activity['type']=='comment'){
echo "Hat ".$activity['value']['Entry']['name']." kommentiert <p>";
echo $activity['value']['Comment']['text'];
}
?>
<?php
if ($activity['type']=='entry'){
echo "Hat Projekt ";
echo $activity['value']['Entry']['name'];
echo " angelegt.";
}
if ($i==10)break; 
?>

</div>




<hr>

<?php endforeach; ?>


</div>

