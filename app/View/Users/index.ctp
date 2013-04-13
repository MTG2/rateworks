<!-- File: /app/View/Users/index.ctp -->
<?php $this->layout = 'standart'; ?>  <!-- standart Layout laden -->
<h1> Herzlich Wilkommen </h1>
Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor 
invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et 
justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum 
dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor 
invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo 
duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit 
amet.


<div>
<p>Aktuelle Tätigkeiten</p>
<?php
$checker = 0;

foreach ($comments as $comment):
	if ($checker < 3){
	
		echo "<div class='indexAktuell'>";
		$checker = $checker + 1;
		
		echo $this->Html->link($comment['Comment']['id'],
			array('controller' => 'comments', 'action' => 'view', $comment['Comment']['entry_id']),
			array('escape' => false));
		
		echo "</div>";
	}
endforeach;

?>
</div>
