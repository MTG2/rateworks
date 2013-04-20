<!-- File: /app/View/Users/a_edit_u.ctp -->
<?php $this->layout = 'admin'; ?>  <!-- admin Layout laden -->

<h1>Benutzer bearbeiten</h1>
<table>
    <tr>
        <td class="firstEntryLine">ID</td>
        <td class="firstEntryLine">Benutzername</td>
        <td class="firstEntryLine">Semester</td>
		<td class="firstEntryLine">Kurs</td>
        <td class="firstEntryLine">Erstellt</td>
		<td class="firstEntryLine">Bild</td>
		<td class="firstEntryLine">Bearbeiten</td>
		<td class="firstEntryLine">Löschen</td>
    </tr>

    <!-- Here is where we loop trough our $ausgabes array, printing out user info -->
	<?php $checker = 0;
    foreach ($users as $ausgabe): //var $users kommt aus dem Controller 

		$checker = $checker +1; 

		if ($checker == 2){
		$bgClass="secondLineAdmin";
		$checker = 0;
		}else{
		$bgClass="firstLineAdmin";
		}
	
    echo "<tr class='".$bgClass."'>";
		echo "<td class='adminLine'>";
			echo $ausgabe['User']['id'];
		echo "</td>";
		
		echo "<td class='adminLine'>";
			echo $ausgabe['User']['username'];
		echo "</td>";
		
		echo "<td class='adminLine'>";
			echo $ausgabe['User']['semester'];
		echo "</td>";
		
		echo "<td class='adminLine'>";
			echo $ausgabe['User']['course'];
		echo "</td>";
		
		echo "<td class='adminLine'>";
			echo $ausgabe['User']['created'];
		echo "</td>";
		
		echo "<td class='adminLine'>";
			echo $ausgabe['User']['pic'];
		echo "</td>";

		echo "<td class='adminLine'>";
			echo $this->Html->link('Edit', array('action' => 'a_edit_u_view', $ausgabe['User']['id']));
		echo "</td>";
		
		echo "<td class='adminLine'>";
			echo $this->Form->PostLink(
                'Delete',
                array('action' => 'delete', $ausgabe['User']['id'], "a_edit_u"),
                array('confirm' => 'Wirklich "'.$ausgabe['User']['username'].'" löschen?'));
        echo "</td>";

    echo "</tr>";
    endforeach;
    unset($ausgabe); 
	?>
</table>




