<!-- File: /app/View/Users/a_edit_u.ctp -->
<?php $this->layout = 'admin'; ?>  <!-- admin Layout laden -->

<h1>Table users</h1>
<table>
    <tr>
        <th>id</th>
        <th>username</th>
		<th>password</th>
        <th>semester</th>
		<th>course</th>
        <th>create_date</th>
		<th>pic</th>
		<th>delete</th>
    </tr>

    <!-- Here is where we loop trough our $ausgabes array, printing out user info -->

    <?php foreach ($users as $ausgabe): //var $users kommt aus dem Controller ?> 
    <tr>
        <td><?php echo $ausgabe['User']['id']; ?></td>
        <td><?php echo $ausgabe['User']['username']; ?></td>
		<td><?php echo $ausgabe['User']['password']; ?></td>
		<td><?php echo $ausgabe['User']['semester']; ?></td>
		<td><?php echo $ausgabe['User']['course']; ?></td>
		<td><?php echo $ausgabe['User']['created']; ?></td>
		<td><?php echo $ausgabe['User']['pic']; ?></td>
		<td>
			<?php echo $this->Form->PostLink(
                'Delete',
                array('action' => 'delete', $ausgabe['User']['id'], "a_edit_u"),
                array('confirm' => 'Are you sure?'));
            ?>
		</td>
    </tr>
    <?php endforeach; ?>
    <?php unset($ausgabe); ?>
</table>




