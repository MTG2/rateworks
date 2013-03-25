<!-- File: /app/View/Comments/view.ctp -->


<h1><?php echo h($entry['Entry']['name']); ?></h1>
<p><?php echo h($entry['Entry']['description']); ?></p>
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
