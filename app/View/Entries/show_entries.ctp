<?php $this->layout = 'standart'; ?>  <!-- standart Layout laden -->


<div style="float: right">
	<?php  echo $this->Html->image($framework['Framework']['pic'], array('width'=>'150px')); ?></p>
</div>

<h1>Projekte</h1>

<p><h3 id="entryH3"><?php  echo $framework['Framework']['name']; ?></h3></p>


<?php if($entries == null)
	{
		echo " </br> Noch keine Eintr&auml;ge vorhanden" ;
	
	} 
else
{ ?>
<table id="showEntryTable">
    <tr>
        <th class="firstEntryLine">Projektname</th>
        <th class="firstEntryLine">Erstellt von</th>
        <th class="firstEntryLine">Datum</th>
    </tr>
	
<?php 
	$checker=1; 
	$bgClass="secondLine";
?>	

<?php foreach ($entries as $entry):

$checker = $checker +1; 

if ($checker == 2){
	$bgClass="firstLine";
	$checker = 0;
}else{
	$bgClass="secondLine";
}


    echo "<tr class='".$bgClass."'>";
        echo "<td><b>";
			echo $this->Html->link($entry['Entry']['name'], array('controller' => 'comments', 'action' => 'view', $entry['Entry']['id']));
        echo "</b></td>";
        echo "<td class='".$bgClass."'>";
			echo $entry['User']['username'];
        echo "</td>";
		echo "<td class='".$bgClass."'>";
			echo $entry['Entry']['created'];
        echo "</td>";
    echo "</tr>";
endforeach; }	?>
</table>