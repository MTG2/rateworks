<?php $this->layout = 'standart'; ?>  <!-- standart Layout laden -->


<div style="float: right">
	<?php  echo $this->Html->image($framework['Framework']['pic'], array('width'=>'150px')); ?></p>
</div>

<h1>Projekte</h1>

<p><h3><?php  echo $framework['Framework']['name']; ?></h3></p>


<?php if($entries == null)
	{
		echo " </br> Noch keine Eintr&auml;ge vorhanden" ;
	
	} 
else
{ ?>
<table style="width: 100%; text-align: left;">
    <tr>
        <th style="border-bottom: solid 1px;">Projektname</th>
        <th style="border-bottom: solid 1px;">Erstellt von</th>
        <th style="border-bottom: solid 1px;">Datum</th>
    </tr>
	
<?php 
	$checker=1; 
	$bgColor="#FFFFFF";
?>	

<?php foreach ($entries as $entry):
$checker = $checker +1; 
if ($checker == 2){
	$bgColor="#ffebd6";
	$checker = 0;
}else{
	$bgColor="#FFFFFF";
}
    echo "<tr>";
        echo "<td style='background-color:".$bgColor."; height: 40px; vertical-align: middle;'><b>";
			echo $this->Html->link($entry['Entry']['name'], array('controller' => 'comments', 'action' => 'view', $entry['Entry']['id']));
        echo "</b></td>";
        echo "<td style='background-color:".$bgColor."; height: 40px; vertical-align: middle;'>";
			echo $entry['User']['username'];
        echo "</td>";
		echo "<td style='background-color:".$bgColor."; height: 40px; vertical-align: middle;'>";
			echo $entry['Entry']['created'];
        echo "</td>";
    echo "</tr>";
endforeach; }	?>
</table>