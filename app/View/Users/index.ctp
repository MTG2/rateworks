<!-- File: /app/View/Users/index.ctp -->
<?php $this->layout = 'standart'; ?>  <!-- standart Layout laden -->
<h1> Herzlich Wilkommen </h1>
<p>Dieses Projekt dient dazu Frameworks die im Kurs Webanwendungen verwendet wurden zu bewerten und diese Bewertungen mit anderen Kursteilnehmern zu teilen. Zielsetzung unseres Projektes war ein System zu entwickeln das über die kommenden Jahre wachsen kann und Einsteigern einen guten Überblick über verschiedene neue Technologien bietet.</p>
<br>
<p>Nach Abschluss eines Projektes kann unter <?php echo $this->Html->link('Projekt anlegen', array('controller' => 'entries', 'action' => 'add')); ?> die Technologiebewertung aus dem WAN Moodle-Kurs eingetragen werden. Zusätzlich können hier die einzelnen Unterpunkte mit einem Sternesystem bewertet werden. Nachdem das Formular abgeschickt wurde erscheint die Technologiebewertung unter <?php echo $this->Html->link('Frameworks', array('controller' => 'frameworks', 'action' => 'index')); ?> in dem jeweilig ausgewählten Framework.<p>
<br>
<p>Dieses Projekt wurde von Jan Lehnhäuser, Martin Hentzel und Marc Heinisch im Rahmen der WAN-Veranstaltung im Wintersemester 2012 programmiert. Wir wünschen euch genauso viel Spaß bei dem Verwenden von Frameworks wie wir hierbei hatten :)</p>



<div id="aktuellInhalt">
<p><b>Aktuelle Tätigkeiten</b></p>
<?php

$oldEntry = null;
$oldComment = null;
$entryChecker = 0;
$commentDateTime = null;
$commentDate = null;
$entryLeer=0;
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
		
		if (count($entries)>= 1){
			if ($nextEntry == 1){
				$entryDateTime = new DateTime($entryFirst['Entry']['created']);
				$entryDate = $entryFirst;
			}
		}
		
		if (count($entries)>= 2){
			if ($nextEntry == 2){
				$entryDateTime = new DateTime($entrySecond['Entry']['created']);
				$entryDate = $entrySecond;
			}
		}
		
		if (count($entries)>= 3){
			if ($nextEntry == 3){
				$entryDateTime = new DateTime($entryThird['Entry']['created']);
				$entryDate = $entryThird;
			}
		}
		
		
		if (count($comments)>= 1){
			if ($nextComment == 1){
				$commentDateTime = new DateTime($commentFirst['Comment']['created']);
				$commentDate = $commentFirst;
			}
		}
		
		if (count($comments)>= 2){
			if ($nextComment == 2){
				$commentDateTime = new DateTime($commentSecond['Comment']['created']);
				$commentDate = $commentSecond;
			}
		}
		
		if (count($comments)>= 3){
			if ($nextComment == 3){
				$commentDateTime = new DateTime($commentThird['Comment']['created']);
				$commentDate = $commentThird;
			}
		}
		
		if(count($comments)>0){
			$dateComment = new DateTime($comment['Comment']['created']);
		}else{
			$dateComment = new DateTime("0000-00-00 00:00:00");
			$commentDateTime = new DateTime("0000-00-00 00:00:00");
		}
		
		if(count($entries)<1){
			$entryDate = 1337;
			$entryDateTime = new DateTime("0000-00-00 00:00:00");
		}
		
		if($commentDate == $oldComment){
			$commentDateTime = null;
		}
		echo "<div class='indexAktuell'>";		

		if ($commentDateTime > $entryDateTime){
			echo "<div class='newsTitle'>";
				if($commentDate != $oldComment){
					echo $this->Html->image('commentSmall.png', array('border' => '0', 'width'=>'16px'))."<b> ".$this->Html->link($commentDate['User']['username'],array('action' => 'view', $commentDate['User']['id']))." kommentierte ".$this->Html->link($commentDate['Entry']['name'],
					array('controller' => 'comments', 'action' => 'view', $commentDate['Comment']['entry_id']),array('escape' => false))."</b>";
					$oldComment = $commentDate;
				}else{
					echo $this->Html->image('keinEintrag.png', array('border' => '0', 'width'=>'16px'))."<b>Kein Eintrag</b>";
					
				}
			echo "</div>";
			
			echo "<div class='commentInfo'>";
				
				echo "<div class='commentText'>";
					echo $commentDate['Comment']['text'];
				echo "</div>";
				
					$entDate = new DateTime($commentDate['Comment']['created']);
					$entToCompare = $entDate->format('Y-m-d');
					$heute = date('Y-m-d');

					if($heute == $entToCompare){
						echo "<b>heute · ".$entDate->format('H:i')."</b>";
					}else{
						echo "<b>".$entDate->format('d-m-Y')." · ".$entDate->format('H:i')."</b>";
					}
				
			echo "</div>";

			$nextComment = $nextComment + 1;
		}else{
			echo "<div class='newsTitle'>";
				if ((count($entries)<1 && count($comments)<1)){
					echo $this->Html->image('keinEintrag.png', array('border' => '0', 'width'=>'16px'))."<b>Kein Eintrag</b>";
					$entryLeer=1;
				}else{
					if ($oldEntry != $entryDate){
						echo $this->Html->image('entrySmall.png', array('border' => '0', 'width'=>'14px'))."<b> ".$this->Html->link($entryDate['User']['username'],array('action' => 'view', $entryDate['User']['id']))." erstellte ".$this->Html->link($entryDate['Entry']['name'],
						array('controller' => 'comments', 'action' => 'view', $entryDate['Entry']['id']),array('escape' => false))."</b>";
						$oldEntry = $entryDate;
					}else{
						echo $this->Html->image('keinEintrag.png', array('border' => '0', 'width'=>'13px'))."<b> Kein Eintrag</b>";
						$entryLeer=1;
					}
				}
			echo "</div>";
			
			echo "<div class='commentInfo'>";
				if($entryLeer != 1){

					echo "<div class='commentText'>";
					
					echo $entryDate['Entry']['description'];
					
					echo "</div>";
					
					$comDate = new DateTime($entryDate['Entry']['created']);
					$comToCompare = $comDate->format('Y-m-d');
					$heute = date('Y-m-d');

					if($heute == $comToCompare){
						echo "<b>heute · ".$comDate->format('H:i')."</b>";
					}else{
						echo "<b>".$comDate->format('d-m-Y')." · ".$comDate->format('H:i')."</b>";
					}
					
				}else{
					
					echo "<div class='commentText'>";
					echo "  -   ";
					echo "</div>";
					echo " - ";
				}
			echo "</div>";
			$nextEntry = $nextEntry + 1;
		}
		
		echo "</div>";
}

?>
</div>
