<!-- File: /app/View/Users/a_edit_frameworks.ctp -->
<?php $this->layout = 'admin'; ?>  <!-- admin Layout laden -->

<h1>Frameworks verwalten</h1>
<table width="100%">
    <tr>
        <td class="firstEntryLine">Name</td>
		<td class="firstEntryLine">ID</td>
		<td class="firstEntryLine">Rating</td>
        <td class="firstEntryLine">Erstellt</td>
		<td class="firstEntryLine">Delete</td>
    </tr>

    <!-- Here is where we loop trough our $ausgabes array, printing out entries info -->
	<div id="addFramework">
	<p><?php echo $this->Html->image('add.png', array('alt' => 'Cakephp', 'border' => '0', 'class' => 'floatleft', 'width' => '16px')); ?>  <b><?php echo $this->Html->link('Framework hinzufügen', array('action' => 'add')); ?></b></p>
	</div>
	
	<?php $checker = 0; ?>

    <?php foreach ($frameworks as $ausgabe): //var $entries kommt aus dem Controller 

		$checker = $checker +1; 

		if ($checker == 2){
		$bgClass="secondLineAdmin";
		$checker = 0;
		}else{
		$bgClass="firstLineAdmin";
		}

    echo "<tr class='".$bgClass."'>";
		echo "<td class='adminLine'>";
			echo $this->Html->link($ausgabe['Framework']['name'], array('controller' => 'entries', 'action' => 'a_edit_rates', $ausgabe['Framework']['id']));
		echo "</td>";
			
		echo "<td class='adminLine'>";
			echo $ausgabe['Framework']['id'];
		echo "</td>";
		
		echo "<td class='adminLine'>";
			echo $ausgabe['Framework']['rating'];
		echo "</td>";
		
		echo "<td class='adminLine'>";
			echo $ausgabe['Framework']['created'];
		echo "</td>";

		
		echo "<td class='adminLine'>";
			 echo $this->Form->PostLink(
                'Delete',
				array('controller' => 'comments', 'action' => 'deleteByFramework', $ausgabe['Framework']['id']),
                array('confirm' => 'Beim Löschen eines Frameworks werden die dazugehörigen Einträge und Kommentare ebenfalls gelöscht. Sind sie sicher?'));
        echo "</td>";
		
    echo "</tr>";
    endforeach;
    unset($ausgabe);
?>
</table>