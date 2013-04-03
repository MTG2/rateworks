<!-- File: /app/View/Users/a_edit_rates.ctp -->
<?php $this->layout = 'admin'; ?>  <!-- admin Layout laden -->

<h1>Edit Frameworkentries</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
		<th>Description</th>
        <th>Degree</th>
		<th>Usability</th>
		<th>Highlight</th>
		<th>Quellen</th>
		<th>Projekt Link</th>
		<th>Domain</th>
		<th>Created</th>
		<th>Framework</th>
        <th>Framework ID</th>
		<th>Created from</th>
		<th>Edit</th>
		<th>Delete</th>
    </tr>

    <!-- Here is where we loop trough our $ausgabes array, printing out entries info -->
	
    <?php foreach ($entries as $ausgabe): //var $entries kommt aus dem Controller ?> 
	
	
	
    <tr>
        <td><?php echo $ausgabe['Entry']['id']; ?></td>
        <td><?php echo $ausgabe['Entry']['name']; ?></td>
		<td><?php echo $ausgabe['Entry']['description']; ?></td>
		<td><?php echo $ausgabe['Entry']['degree']; ?></td>
		<td><?php echo $ausgabe['Entry']['usability']; ?></td>
		<td><?php echo $ausgabe['Entry']['highlights']; ?></td>
		<td><?php echo $ausgabe['Entry']['links']; ?></td>
		<td><?php echo $ausgabe['Entry']['project_link']; ?></td>
		<td><?php echo $ausgabe['Entry']['domain']; ?></td>
		<td><?php echo $ausgabe['Entry']['created']; ?></td>
		<td><?php echo $ausgabe['Framework']['name']; ?></td>
		<td><?php echo $ausgabe['Entry']['framework_id']; ?></td>
		<td><?php echo $ausgabe['User']['username']; ?></td>
		<td>
			<?php echo $this->Form->PostLink(
                'Edit',
                array('action' => 'a_edit_entry', 
													$ausgabe['Entry']['name'], $ausgabe['Entry']['description'], $ausgabe['Entry']['degree'],
													$ausgabe['Entry']['usability'], $ausgabe['Entry']['highlights'], $ausgabe['Entry']['links'],
													$ausgabe['Entry']['domain'], $ausgabe['Entry']['framework_id'], $ausgabe['Entry']['id'], $ausgabe['Entry']['project_link']),
													
                array('confirm' => 'Are you sure to Edit?'));
            ?>
		</td>
		<td>
			<?php echo $this->Form->PostLink(
                'Delete',
                array('action' => 'delete', $ausgabe['Entry']['id'], "a_edit_rates", $ausgabe['Entry']['framework_id']),
                array('confirm' => 'Are you sure?'));
            ?>
		</td>
    </tr>
    <?php endforeach; ?>
    <?php unset($ausgabe); ?>
</table>



