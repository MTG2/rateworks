<!-- File: /app/View/Comments/view.ctp -->
<?php $this->layout = 'standart'; ?>  <!-- standart Layout laden -->
<?php
 echo $this->html->script('jquery-1.9.1',false); 
  echo $this->html->script('jquery.rateit',true); 
?>

<h1><?php echo h($entry['Entry']['name']); ?></h1>
<p><?php echo '<div class="rateit" data-rateit-value="'.$entry['Entry']['rtotal'].'" data-rateit-ispreset="true" data-rateit-readonly="true"></div>'; ?>
<h3> Description </h3>
<p><?php echo h($entry['Entry']['description']); ?></p>
<h3> Degree </h3>
<p><?php echo '<div class="rateit" data-rateit-value="'.$entry['Entry']['rdegree'].'" data-rateit-ispreset="true" data-rateit-readonly="true"></div>'; ?>
<p><?php echo h($entry['Entry']['degree']); ?></p>
<h3> Usability </h3>
<p><?php echo '<div class="rateit" data-rateit-value="'.$entry['Entry']['rusability'].'" data-rateit-ispreset="true" data-rateit-readonly="true"></div>'; ?>
<p><?php echo h($entry['Entry']['usability']); ?></p>


<h3> Highlights </h3>
<p><?php echo h($entry['Entry']['highlights']); ?></p>


<h3> Links </h3>
<p><?php echo h($entry['Entry']['links']); ?></p>


<h3> Domain </h3>
<p><?php echo h($entry['Entry']['domain']); ?></p>





</br></br></br></br>
<table>
 <?php foreach ($comments as $comment): ?>
    <tr>
        <td><?php echo $comment['User']['username']; ?></td>
        <td><?php echo $comment['User']['created']; ?></td>
    </tr>
	<tr>
		<td><?php echo $comment['Comment']['text']; ?></td>
	</tr>
    <?php endforeach; ?>
</table>

<?php echo $this->Form->create('Comment'); ?>
        <?php echo $this->Form->input('text'); ?>
<?php echo $this->Form->end('Save Comment'); ?>
