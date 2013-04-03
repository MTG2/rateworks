<!-- File: /app/View/Comments/a_edit_comment.ctp -->
<?php $this->layout = 'admin'; ?>  <!-- admin Layout laden -->

<h1>Edit Comments</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Text</th>
		<th>Positive Votes</th>
        <th>Negative Votes</th>
		<th>Erstellt von</th>
		<th>User ID</th>
		<th>Entry ID</th>
		<th>Created</th>
		<th>Bearbeitet</th>
		<th>Delete</th>
 </tr>
	
<?php foreach ($allComments as $ausgabe): //var $users kommt aus dem Controller ?> 
    <tr>
		<td><?php echo $ausgabe['Comment']['id']; ?></td>
		<td><?php echo $ausgabe['Comment']['text']; ?></td>
		<td><?php echo $ausgabe['Comment']['upvote']; ?></td>
		<td><?php echo $ausgabe['Comment']['downvote']; ?></td>
		<td><?php echo $ausgabe['User']['username']; ?></td>
		<td><?php echo $ausgabe['Comment']['user_id']; ?></td>
		<td><?php echo $ausgabe['Comment']['entry_id']; ?></td>
		<td><?php echo $ausgabe['Comment']['created']; ?></td>
		<td><?php echo $ausgabe['Comment']['modified']; ?></td>
		<td>
			<?php echo $this->Form->PostLink(
                'Delete',
                array('action' => 'delete', $ausgabe['Comment']['id'], "a_edit_comment", $ausgabe['Comment']['entry_id']),
                array('confirm' => 'Are you sure to delete the Comment?'));
            ?>
		</td>
    </tr>
 <?php endforeach; ?>
</table>