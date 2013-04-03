<!-- File: /app/View/Comments/view.ctp -->
<?php $this->layout = 'standart'; ?>  <!-- standart Layout laden -->
<?php
 echo $this->html->script('jquery-1.9.1',false); 
  echo $this->html->script('jquery.rateit',true); 
?>

<?php echo $this->Html->image($framework['Framework']['pic'], array('width' => '15%', 'height' => '15%')) ?>
<h1><?php echo ($entry['Entry']['name']); ?></h1>
<p><?php echo '<div class="rateit" data-rateit-value="'.$entry['Entry']['rtotal'].'" data-rateit-ispreset="true" data-rateit-readonly="true"></div>'; ?>
<h3> Description </h3>
<p><?php echo ($entry['Entry']['description']); ?></p>
<h3> Degree </h3>
<p><?php echo '<div class="rateit" data-rateit-value="'.$entry['Entry']['rdegree'].'" data-rateit-ispreset="true" data-rateit-readonly="true"></div>'; ?>
<p><?php echo ($entry['Entry']['degree']); ?></p>
<h3> Usability </h3>
<p><?php echo '<div class="rateit" data-rateit-value="'.$entry['Entry']['rusability'].'" data-rateit-ispreset="true" data-rateit-readonly="true"></div>'; ?>
<p><?php echo ($entry['Entry']['usability']); ?></p>


<h3> Highlights </h3>
<p><?php echo ($entry['Entry']['highlights']); ?></p>


<h3> Links </h3>
<p><?php echo $this->html->link($entry['Entry']['links']); ?></p>
<p><?php echo ($entry['Entry']['links']); ?></p>


<h3> Domain </h3>
<p><?php echo ($entry['Entry']['domain']); ?></p>





</br>
<div id="comment">

<h1>Kommentare</h1>

	 <?php foreach ($comments as $comment): ?>

<p>	 
<table>
<?php	 echo $this->Html->tableCells(array(
							array(array($this->Html->image($comment['User']['pic']), array('rowspan' => 2, 'colspan' => 2)),$comment['User']['username'], $comment['Comment']['created'] ),
							array($comment['Comment']['text'])
							)); 
?>
</table>
</p>

		<?php endforeach; ?>


<section id="profil">
<h2>Kommentar schreiben</h2>
</br>



	<?php echo $this->Html->image($comment['User']['pic']) ?>
	<?php echo $this->Form->create('Comment'); ?>
			<?php echo $this->Form->input('text', array('type' => 'textarea', 'label' => '')); ?>
	<?php echo $this->Form->end('Save Comment'); ?>

</section>
</div>