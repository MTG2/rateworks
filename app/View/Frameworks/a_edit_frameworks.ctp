<!-- File: /app/View/Users/a_edit_frameworks.ctp -->
<?php $this->layout = 'admin'; ?>  <!-- admin Layout laden -->

<h1>Edit Frameworks</h1>
<table>
    <tr>
        <th>Name</th>
		<th>Framwork ID</th>
		<th>Rating</th>
        <th>Erstellt</th>
		<th>Delete</th>
    </tr>

    <!-- Here is where we loop trough our $ausgabes array, printing out entries info -->

    <?php foreach ($frameworks as $ausgabe): //var $entries kommt aus dem Controller ?> 
    <tr>
        <td><?php echo $this->Html->link($ausgabe['Framework']['name'], array('controller' => 'entries', 'action' => 'a_edit_rates', $ausgabe['Framework']['id'])); ?></td>
		<td><?php echo $ausgabe['Framework']['id']; ?></td>
		<td><?php echo $ausgabe['Framework']['rating']; ?></td>
		<td><?php echo $ausgabe['Framework']['created']; ?></td>
		<td>
			<?php echo $this->Form->PostLink(
                'Delete',
				array('controller' => 'entries', 'action' => 'deleteAll', $ausgabe['Framework']['id']),
                array('confirm' => 'Beim Löschen eines Frameworks werden die dazugehörigen Einträge ebenfalls gelöscht. Sind sie sicher?'));
            ?>
		</td>
    </tr>
    <?php endforeach; ?>
    <?php unset($ausgabe); ?>
</table>