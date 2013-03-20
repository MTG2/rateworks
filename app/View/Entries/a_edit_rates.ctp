<!-- File: /app/View/Users/a_edit_rates.ctp -->
<?php $this->layout = 'admin'; ?>  <!-- admin Layout laden -->

<h1>Table Rates</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
		<th>Text</th>
        <th>Datum</th>
		<th>Rating</th>
        <th>Framework</th>
		<th>Created from</th>
		<th>Delete</th>
    </tr>

    <!-- Here is where we loop trough our $ausgabes array, printing out entries info -->

	<?php echo $frameworkid ?> 
	
    <?php foreach ($entries as $ausgabe): //var $entries kommt aus dem Controller ?> 
	
    <tr>
        <td><?php echo $ausgabe['Entry']['id']; ?></td>
        <td><?php echo $ausgabe['Entry']['name']; ?></td>
		<td><?php echo $ausgabe['Entry']['text']; ?></td>
		<td><?php echo $ausgabe['Entry']['created']; ?></td>
		<td><?php echo $ausgabe['Entry']['rating']; ?></td>
		<td><?php echo $ausgabe['Entry']['framework_id']; ?></td>
		<td><?php echo $ausgabe['Entry']['user_id']; ?></td>
		<td>
			<?php echo $this->Form->PostLink(
                'Delete',
                array('action' => 'delete', $ausgabe['Entry']['id'], "a_edit_rates"),
                array('confirm' => 'Are you sure?'));
            ?>
		</td>
    </tr>
    <?php endforeach; ?>
    <?php unset($ausgabe); ?>
</table>



