
<h1>Entries</h1>
<p>Framework: <?php  echo $framework['Framework']['name']; ?></p>

<table>
    <tr>
        <th>Name</th>
        <th>User</th>
        <th>Date</th>
    </tr>

    <?php foreach ($entries as $entry): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($entry['Entry']['name'], array('controller' => 'comments', 'action' => 'view', $entry['Entry']['id'])); ?>
        </td>
        <td>
            <?php echo $entry['User']['username']; ?>
        </td>
		<td>
            <?php echo $entry['Entry']['created']; ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>