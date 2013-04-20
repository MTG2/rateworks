<!-- File: /app/View/Comments/a_edit_comment.ctp -->
<?php $this->layout = 'admin'; ?>  <!-- admin Layout laden -->

<h1>Kommentare verwalten</h1>
<table width="100%">
    <tr>
        <td class="firstEntryLine">ID</td>
        <td class="firstEntryLine">Text</td>
		<td class="firstEntryLine">Positive Votes</td>
        <td class="firstEntryLine">Negative Votes</td>
		<td class="firstEntryLine">Erstellt von</td>
		<td class="firstEntryLine">User ID</td>
		<td class="firstEntryLine">Entry ID</td>
		<td class="firstEntryLine">Created</td>
		<td class="firstEntryLine">Bearbeitet</td>
		<td class="firstEntryLine">Delete</td>
 </tr>
 
 
<?php
$checker = 0;

foreach ($allComments as $ausgabe): //var $users kommt aus dem Controller 

$checker = $checker +1; 

if ($checker == 2){
	$bgClass="secondLineAdmin";
	$checker = 0;
}else{
	$bgClass="firstLineAdmin";
}

    echo "<tr class='".$bgClass."'>";
		echo "<td class='adminLine'>";
			echo $ausgabe['Comment']['id'];
		echo "</td>";
			
		echo "<td class='adminLine'>";
			echo $ausgabe['Comment']['text'];
		echo "</td>";
			
		echo "<td class='adminLine'>";
			echo $ausgabe['Comment']['upvote'];
		echo "</td>";
			
		echo "<td class='adminLine'>";
			echo $ausgabe['Comment']['downvote'];
		echo "</td>";
			
		echo "<td class='adminLine'>";
			echo $ausgabe['User']['username'];
		echo "</td>";
			
		echo "<td class='adminLine'>";
			echo $ausgabe['Comment']['user_id'];
		echo "</td>";
			
		echo "<td class='adminLine'>";
			echo $ausgabe['Comment']['entry_id'];
		echo "</td>";
			
		echo "<td class='adminLine'>";
			echo $ausgabe['Comment']['created'];
		echo "</td>";
			
		echo "<td class='adminLine'>";
			echo $ausgabe['Comment']['modified'];
		echo "</td>";
			
		echo "<td class='adminLine'>";
			echo $this->Form->PostLink(
				'Delete',
				array('action' => 'delete', $ausgabe['Comment']['id'], "a_edit_comment", $ausgabe['Comment']['entry_id']),
				array('confirm' => 'Are you sure to delete the Comment?'));
		echo "</td>";

    echo "</tr>";
	endforeach; ?>
</table>