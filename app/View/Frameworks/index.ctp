<!-- File: /app/View/Frameworks/index.ctp -->
<?php $this->layout = 'standart'; ?>  <!-- standart Layout laden -->

<h1>Frameworks</h1>
<p><?php echo $this->Html->link('Add Framework', array('action' => 'add')); ?></p>
<p><?php  echo $this->Session->read('Auth.User.username');?></p>


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
	
		echo "<td><div id='frameBase'>";
			echo $this->Html->link(
				$this->Html->image($framework['Framework']['pic'], array('border' => '0', 'width'=>'150px')),
				array('controller' => 'entries', 'action' => 'show_entries', $framework['Framework']['id']),
				array('escape' => false));
	
			echo "<div id='frameChild'>";
				echo $this->Html->link($framework['Framework']['name'],
					array('controller' => 'entries', 'action' => 'show_entries', $framework['Framework']['id']),
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