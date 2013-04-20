<!-- File: /app/View/Users/a_edit_rates.ctp -->
<?php $this->layout = 'admin'; ?>  <!-- admin Layout laden -->

<h1>Projekte verwalten</h1>
<table width="100%">
    <tr>
        <td class="firstEntryLine">Name</td>
        <td class="firstEntryLine">ID</td>
		<td class="firstEntryLine">Projekt Link</td>
		<td class="firstEntryLine">Created</td>
		<td class="firstEntryLine">Framework</td>
        <td class="firstEntryLine">Framework ID</td>
		<td class="firstEntryLine">Created from</td>
		<td class="firstEntryLine">Edit</td>
		<td class="firstEntryLine">Delete</td>
    </tr>

    <!-- Here is where we loop trough our $ausgabes array, printing out entries info -->
	<?php 
	$checker = 0;
	
    foreach ($entries as $ausgabe): //var $entries kommt aus dem Controller  
		$checker = $checker +1; 

		if ($checker == 2){
		$bgClass="secondLineAdmin";
		$checker = 0;
		}else{
		$bgClass="firstLineAdmin";
		}

    echo "<tr class='".$bgClass."'>";
		echo "<td class='adminLine'>";
		echo $this->Html->link($ausgabe['Entry']['name'], array('controller' => 'comments', 'action' => 'a_edit_comment', $ausgabe['Entry']['id']));
		
		
		echo "<td class='adminLine'>";
        echo $ausgabe['Entry']['id'];
		echo "</td>";
		
		echo "<td class='adminLine'>";
		echo $ausgabe['Entry']['projectlink'];
		echo "</td>";
		
		echo "<td class='adminLine'>";
		echo $ausgabe['Entry']['created'];
		echo "</td>";
		
		echo "<td class='adminLine'>";
		echo $ausgabe['Framework']['name'];
		echo "</td>";
		
		echo "<td class='adminLine'>";
		echo $ausgabe['Entry']['framework_id'];
		echo "</td>";
		
		echo "<td class='adminLine'>";
		echo $ausgabe['User']['username'];
		echo "</td>";
		
		
		echo "<td class='adminLine'>";
		echo $this->Html->link('Edit', array('action' => 'a_edit_entry', $ausgabe['Entry']['id']));
		echo "</td>";
		
		
		echo "<td class='adminLine'>";
		echo $this->Form->PostLink(
            'Delete',
            array('controller' => 'comments', 'action' => 'deleteByEntry', $ausgabe['Entry']['id'], $ausgabe['Entry']['framework_id']),
            array('confirm' => 'Alle dazugehoerigen Kommentare werden geloescht.'));
		echo "</td>";
    echo "</tr>";
    endforeach;
    unset($ausgabe); ?>
</table>





