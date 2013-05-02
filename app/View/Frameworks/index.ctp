<!-- File: /app/View/Frameworks/index.ctp -->
<?php $this->layout = 'standart'; ?>  <!-- standart Layout laden -->
<?php
 echo $this->html->script('jquery-1.9.1',false); 
  echo $this->html->script('jquery.rateit',true); 
?>
<h1>Frameworks</h1>




<table>
<?php 
	$zaehler = 3;
 ?>
 
<?php foreach ($frameworks as $framework): ?>
<?php $zaehler = $zaehler+1 ?>

<?php 

	if ($zaehler == 4){
		echo "<tr>";
	}

	echo '<div class="rateit" data-rateit-value="'.$framework['total']['total'].'" data-rateit-ispreset="true" data-rateit-readonly="true"></div>';
		echo "<td><div align='center' id='frameBase'>";
			echo $this->Html->link(
				$this->Html->image($framework['framework']['Framework']['pic'], array('border' => '0')),
				array('controller' => 'entries', 'action' => 'show_entries', $framework['framework']['Framework']['id']),
				array('escape' => false));
	
			echo "<div id='frameChild'>";
				echo $this->Html->link($framework['framework']['Framework']['name'],
					array('controller' => 'entries', 'action' => 'show_entries', $framework['framework']['Framework']['id']),
					array('escape' => false));
			
			echo "</div>";
		echo "</div></td>";	
		
		
	if ($zaehler == 7){
		echo "</tr>";
		$zaehler = 3;
	}
	

?>
	
<?php endforeach; ?>
</table>