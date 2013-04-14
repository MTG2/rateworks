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


<div id="aktuellInhalt">
<p><b>Aktuelle Tätigkeiten</b></p>
<?php

$entryChecker = 0;
foreach ($entries as $entry):
	$entryChecker = $entryChecker +1;
	
	if ($entryChecker == 1){
		$entryFirst = $entry;
	}
	
	if ($entryChecker == 2){
		$entrySecond = $entry;
	}
	
	if ($entryChecker == 3){
		$entryThird = $entry;
	}
endforeach;

$commentChecker = 0;
foreach ($comments as $comment):
	$commentChecker = $commentChecker +1;
	
	if ($commentChecker == 1){
		$commentFirst = $comment;
	}
	
	if ($commentChecker == 2){
		$commentSecond = $comment;
	}
	
	if ($commentChecker == 3){
		$commentThird = $comment;
	}
endforeach;


$nextComment = 1;
$nextEntry = 1;


for($count = 0; $count < 3; $count++){
		
		if ($nextEntry == 1){
			$entryDateTime = new DateTime($entryFirst['Entry']['created']);
			$entryDate = $entryFirst;
		}
		
		if ($nextEntry == 2){
			$entryDateTime = new DateTime($entrySecond['Entry']['created']);
			$entryDate = $entrySecond;
		}
		
		if ($nextEntry == 3){
			$entryDateTime = new DateTime($entryThird['Entry']['created']);
			$entryDate = $entryThird;
		}

		
		
		
		if ($nextComment == 1){
			$commentDateTime = new DateTime($commentFirst['Comment']['created']);
			$commentDate = $commentFirst;
		}
		
		if ($nextComment == 2){
			$commentDateTime = new DateTime($commentSecond['Comment']['created']);
			$commentDate = $commentSecond;
		}
		
		if ($nextComment == 3){
			$commentDateTime = new DateTime($commentThird['Comment']['created']);
			$commentDate = $commentThird;
		}
		
		$dateComment = new DateTime($comment['Comment']['created']);
		
		echo "<div class='indexAktuell'>";		
		
		

		if ($commentDateTime > $entryDateTime){
			echo "Neues Kommentar<br>";
			echo $commentDate['Comment']['created']."<br>";


			
			echo $this->Html->link($commentDate['Entry']['name'],
				array('controller' => 'comments', 'action' => 'view', $commentDate['Comment']['entry_id']),
				array('escape' => false));
			$nextComment = $nextComment + 1;
		}else{
			echo "Neues Projekt<br>";
			echo $this->Html->link($entryDate['Entry']['id'],
				array('controller' => 'comments', 'action' => 'view', $entryDate['Entry']['id']),
				array('escape' => false));	
				
			$nextEntry = $nextEntry + 1;
		}
		
		echo "</div>";
}

?>
</div>
