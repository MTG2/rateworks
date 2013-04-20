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
		<th>edit</th>
		<th>delete</th>
    </tr>

    <!-- Here is where we loop trough our $ausgabes array, printing out user info -->
	<?php $checker = 0;
    foreach ($users as $ausgabe): //var $users kommt aus dem Controller 

		$checker = $checker +1; 

		if ($checker == 2){
		$bgClass="firstLine";
		$checker = 0;
		}else{
		$bgClass="secondLine";
		}
	
    echo "<tr class='".$bgClass."'>";
		echo "<td>";
			echo $ausgabe['User']['id'];
		echo "</td>";
		
		echo "<td>";
			echo $ausgabe['User']['username'];
		echo "</td>";
		
		echo "<td>";
			echo $ausgabe['User']['password'];
		echo "</td>";
		
		echo "<td>";
			echo $ausgabe['User']['semester'];
		echo "</td>";
		
		echo "<td>";
			echo $ausgabe['User']['course'];
		echo "</td>";
		
		echo "<td>";
			echo $ausgabe['User']['created'];
		echo "</td>";
		
		echo "<td>";
			echo $ausgabe['User']['pic'];
		echo "</td>";

		echo "<td>";
			echo $this->Html->link('Edit', array('action' => 'a_edit_u_view', $ausgabe['User']['id']));
		echo "</td>";
		
		echo "<td>";
			echo $this->Form->PostLink(
                'Delete',
                array('action' => 'delete', $ausgabe['User']['id'], "a_edit_u"),
                array('confirm' => 'Are you sure?'));
        echo "</td>";

    echo "</tr>";
    endforeach;
    unset($ausgabe); 
	?>
</table>




