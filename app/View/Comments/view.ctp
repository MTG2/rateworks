<!-- File: /app/View/Comments/view.ctp -->
<?php $this->layout = 'standart'; ?>  <!-- standart Layout laden -->
<?php
 echo $this->html->script('jquery-1.9.1',false); 
  echo $this->html->script('jquery.rateit',true); 
?>

<?php echo $this->Html->image($entry['Framework']['pic'], array('width' => '15%', 'height' => '15%', 'class' => 'alignright')) ?>
<h1><?php echo ($entry['Entry']['name']); ?></h1>
<p><?php echo '<div class="rateit" data-rateit-value="'.$entry['Entry']['rtotal'].'" data-rateit-ispreset="true" data-rateit-readonly="true"></div>'; ?>
<h2> Description </h2>
<p><?php echo ($entry['Entry']['description']); ?></p>
<h2> Degree </h2>
<p><?php echo '<div class="rateit" data-rateit-value="'.$entry['Entry']['rdegree'].'" data-rateit-ispreset="true" data-rateit-readonly="true"></div>'; ?>
<p><?php echo ($entry['Entry']['degree']); ?></p>
<h2> Usability </h2>
<p><?php echo '<div class="rateit" data-rateit-value="'.$entry['Entry']['rusability'].'" data-rateit-ispreset="true" data-rateit-readonly="true"></div>'; ?>
<p><?php echo ($entry['Entry']['usability']); ?></p>


<h2> Highlights </h2>
<p><?php echo ($entry['Entry']['highlights']); ?></p>


<h2> Links </h2>
<p><?php echo $this->html->link($entry['Entry']['links']); ?></p>
<p><?php echo ($entry['Entry']['links']); ?></p>


<h2> Domain </h2>
<p><?php echo ($entry['Entry']['domain']); ?></p>

</br>
<div id="commentArea">

<section id="profil">

<h3>Kommentar schreiben</h3>
</br>
	<?php echo $this->Html->image($user['User']['pic']) ?>
<div id="commentText">
	<?php echo $this->Form->create('Comment'); ?>
	<?php echo $this->Form->input('text', array('type' => 'textarea', 'label' => '', 'rows' => 2, 'cols' => 10)); ?>
	<?php echo $this->Form->end('Save Comment'); ?>
</div>
</section>
<hr>


<h3>Kommentare anderer User</h3>
<?php foreach ($comments as $comment): ?>
<p>	 
	<div id="comment">
			
	<?php echo $this->Html->image($comment['User']['pic']); ?>
						
<div id="commentAuthor">
<?php echo $comment['User']['username'];?> 
	<div id="commentDate"> 
	am <?php echo $comment['Comment']['created'];?></div>
</div>

<div id="commentText">	<?php echo nl2br($comment['Comment']['text']);?> 
</div>
		

	</div>

</p>
<hr>
		<?php endforeach; ?>
