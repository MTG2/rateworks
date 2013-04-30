<!-- File: /app/View/Entries/add.ctp -->
<?php $this->layout = 'standart'; ?>  <!-- standart Layout laden -->


<?php
	echo $this->html->script('jquery-1.9.1',false); 
	echo $this->html->script('jquery.rateit',true); 
?>

<h1>Projekt anlegen</h1>

<section id="profil">

<?php echo $this->Form->create('Entry'); ?>
Framework auswählen:<?php echo $this->Form->input('framework',array('label'=>'','type'=>'select','options'=>$frameworks));?>
<br>

<p>Name</p>
<?php echo $this->Form->input('name', array('label'=>'','placeholder' =>'Projektname')); ?>

<p>Projekt Link</p>
<?php echo $this->Form->input('projectlink', array('label'=>'','placeholder' =>'Link zur Startseite ihres Projekts')); ?>

<p>Beschreibung</p>
<?php echo $this->Form->input('description', array('rows' => '3', 'label'=>'','placeholder' =>'Kurze Beschreibung des Projektes?')); ?>

<p>Reifegrad</p>
<?php echo $this->Form->input('rdegree',array('type'=>'select', 'label'=>'', 'options'=>range(1,6,1)));?>
<div class="rateit" data-rateit-backingfld="#EntryRdegree" data-rateit-resetable="false" ></div>
<?php echo $this->Form->input('degree', array('label'=>'', 'placeholder' => 'Wie stabil ist die Technologie? Versionszaehler, letzte Aktualisierung...')); ?>

<p>Handhabung</p>
<?php echo $this->Form->input('rusability',array('label'=>'', 'type'=>'select', 'options'=>range(1,6,1)));?>
<div class="rateit" data-rateit-backingfld="#EntryRusability" data-rateit-resetable="false"></div>
<?php echo $this->Form->input('usability', array('label'=>'', 'rows' => '3', 'placeholder'=>'Wie schwer ist der Einstieg in die Technologie (unter Beruecksichtigung ihres Kenntnisstandes)?')); ?>

<p>Highlights</p>
<?php echo $this->Form->input('highlights', array('label'=>'', 'rows' => '3', 'placeholder'=>'Was war besonders gut oder schlecht?')); ?>

<p>Links(mit Enter trennen)</p>
<?php echo $this->Form->input('links', array('label'=>'', 'rows' => '3', 'placeholder'=>'Buecher, Internet-Ressourcen, Tutorials')); ?>

<p>Einsatzgebiet</p>
<?php echo $this->Form->input('domain', array('label'=>'', 'placeholder'=>'Koennen Sie die Technologie empfehlen? Fuer welche Einsatzbereiche?')); ?>

<p>Komplette Bewertung</p>
<?php echo $this->Form->input('rtotal',array('label'=>'', 'type'=>'select', 'options'=>range(1,6,1)));?>
<div class="rateit" data-rateit-backingfld="#EntryRtotal" data-rateit-resetable="false"></div>


<?php echo $this->Form->end('Save Entry'); ?>

