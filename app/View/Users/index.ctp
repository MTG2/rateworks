<!-- File: /app/View/Users/index.ctp -->

<h1>Table users</h1>
<table>
    <tr>
        <th>id</th>
        <th>username</th>
		<th>password</th>
        <th>semester</th>
		<th>matnr</th>
		<th>course</th>
        <th>entry_count</th>
		<th>comment_count</th>
        <th>create_date</th>
		<th>pic</th>
    </tr>

    <!-- Here is where we loop trough our $ausgabes array, printing out user info -->

    <?php foreach ($users as $ausgabe): //var $users kommt aus dem Controller ?> 
    <tr>
        <td><?php echo $ausgabe['User']['id']; ?></td>
        <td><?php echo $ausgabe['User']['username']; ?></td>
		<td><?php echo $ausgabe['User']['password']; ?></td>
		<td><?php echo $ausgabe['User']['semester']; ?></td>
		<td><?php echo $ausgabe['User']['matnr']; ?></td>
		<td><?php echo $ausgabe['User']['course']; ?></td>
		<td><?php echo $ausgabe['User']['entry_count']; ?></td>
		<td><?php echo $ausgabe['User']['comment_count']; ?></td>
		<td><?php echo $ausgabe['User']['created']; ?></td>
		<td><?php echo $ausgabe['User']['pic']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($ausgabe); ?>
</table>