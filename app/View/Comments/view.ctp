﻿<!-- File: /app/View/Comments/view.ctp -->
<?php $this->layout = 'standart'; ?>  <!-- standart Layout laden -->
<?php
 echo $this->html->script('jquery-1.9.1',false); 
  echo $this->html->script('jquery.rateit',true); 
?>

<h1><?php echo ($entry['Entry']['name']); ?></h1>
	<?php  
	$image = $this->Html->image($entry['Framework']['pic'], array('width'=>'150px', 'class' => 'alignright'));
	echo $this->html->link($image, $entry['Framework']['link'], array('class'=>'ext', 'target'=>'_blank', 'escape' => false)); ?>
<h2> Beschreibung </h2>
<p><?php echo ($entry['Entry']['description']); ?></p>
<h2> Projekt Link </h2>
<p><?php echo $this->html->link($entry['Entry']['projectlink'], $entry['Entry']['projectlink'], array('class'=>'ext', 'target'=>'_blank')); ?></p>
<h2> Reifegrad</h2>
<p><?php echo ($entry['Entry']['degree']); ?></p>
<p><?php echo '<div class="rateit" data-rateit-value="'.$entry['Entry']['rdegree'].'" data-rateit-ispreset="true" data-rateit-readonly="true"></div>'; ?>
<h2> Handhabung </h2>
<p><?php echo ($entry['Entry']['usability']); ?></p>
<p><?php echo '<div class="rateit" data-rateit-value="'.$entry['Entry']['rusability'].'" data-rateit-ispreset="true" data-rateit-readonly="true"></div>'; ?>

<h2> Highlights </h2>
<p><?php echo ($entry['Entry']['highlights']); ?></p>


<h2> Links </h2>

<?php 

$links = explode("\n", $entry['Entry']['links']);

foreach ($links as $link):

echo $this->html->link($link, $link, array('class'=>'ext', 'target'=>'_blank')).'</br>';

endforeach; ?>



<h2> Einsatzgebiet </h2>
<p><?php echo ($entry['Entry']['domain']); ?></p>

<h2>Gesamtbewertung</h2>
<p><?php echo '<div class="rateit" data-rateit-value="'.$entry['Entry']['rtotal'].'" data-rateit-ispreset="true" data-rateit-readonly="true"></div>'; ?>

<?php if($entry['Entry']['user_id'] == $user['User']['id'])
{
echo $this->Html->link('Eintrag bearbeiten', array('controller' => 'entries', 'action' => 'edit', $entry['Entry']['id'])); 
}
?>

<div id="commentArea">
<section id="profil">
<h3>Kommentar schreiben</h3>
</br>
	<?php echo $this->Html->image($user['User']['pic']) ?>
<div id="commentText">
	<?php echo $this->Form->create('Comment'); ?>
	<?php echo $this->Form->input('text', array('type' => 'textarea', 'label' => '', 'rows' => 2, 'cols' => 10)); ?>
	<?php echo $this->Form->end('Post'); ?>
</div>
</section>

<?php if($comments == null){
	
	} 
else
{ ?>
<h3>Kommentare anderer User</h3>

<?php foreach ($comments as $comment): ?>
<p><div id="comment">

<?php if($comment['User']['id'] == null){
echo $this->Html->image('deleted.png',array("alt" => "User"))?>
					
<div id="commentAuthor">
<?php echo "Gelöschter Benutzer"; 

}
else{

echo $this->Html->image($comment['User']['pic'],array("alt" => "Bild",'url' => array('controller' => 'users', 'action' => 'view', $comment['User']['id']))) ?>		
		
<div id="commentAuthor">
<?php echo $this->Html->link($comment['User']['username'],array('controller' => 'users', 'action' => 'view', $comment['User']['id']));
}?> 
						
<div id="commentDate"> 
am <?php echo $comment['Comment']['created'];?></div>

</div>

<div id="commentText">	<?php echo nl2br($comment['Comment']['text']);?> 

</div>

	</div>
<?php	

if($comment['Comment']['user_id'] == $id){

echo $this->Form->PostLink(	'Kommentar loeschen',array('action' => 'delete', $comment['Comment']['id'], "view", $entry['Entry']['id']),
				array('confirm' => 'Wollen Sie die Kommentar wirklich loeschen?')); 
			}				
?>
</p>
<hr>

		<?php endforeach; }?>

</table>









