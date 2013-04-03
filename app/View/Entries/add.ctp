<!-- File: /app/View/Entries/add.ctp -->
<?php $this->layout = 'standart'; ?>  <!-- standart Layout laden -->


<?php
	echo $this->html->script('jquery-1.9.1',false); 
	echo $this->html->script('jquery.rateit',true); 
?>

<h1>Projekt anlegen</h1>

<div class="profilcontainer">
<section id="profil">

<?php echo $this->Form->create('Entry'); ?>
<?php echo $this->Form->input('framework',array('type'=>'select','options'=>$frameworks));?>
<br>

<p>Name</p>
<?php echo $this->Form->input('name', array('label'=>'')); ?>

<p>Projekt Link</p>
<?php echo $this->Form->input('Projekt Link', array('label'=>'')); ?>

<p>Beschreibung</p>
<?php echo $this->Form->input('description', array('rows' => '3', 'label'=>'')); ?>

<p>Reifegrad / Bewertung</p>
<?php echo $this->Form->input('rdegree',array('type'=>'select', 'label'=>'', 'options'=>range(1,6,1)));?>
<div class="rateit" data-rateit-backingfld="#EntryRdegree" data-rateit-resetable="false" ></div>
<?php echo $this->Form->input('degree', array('rows' => '3', 'label'=>'')); ?>

<p>Handhabung</p>
<?php echo $this->Form->input('rusability',array('label'=>'', 'type'=>'select', 'options'=>range(1,6,1)));?>
<div class="rateit" data-rateit-backingfld="#EntryRusability" data-rateit-resetable="false"></div>
<?php echo $this->Form->input('usability', array('label'=>'', 'rows' => '3')); ?>

<p>Highlights</p>
<?php echo $this->Form->input('highlights', array('label'=>'', 'rows' => '3')); ?>

<p>Links</p>
<?php echo $this->Form->input('links', array('label'=>'', 'rows' => '3')); ?>

<p>Einsatzgebiet</p>
<?php echo $this->Form->input('domain', array('label'=>'', 'rows' => '3')); ?>

<p>Komplette Bewertung</p>
<?php echo $this->Form->input('rtotal',array('label'=>'', 'type'=>'select', 'options'=>range(1,6,1)));?>
<div class="rateit" data-rateit-backingfld="#EntryRtotal" data-rateit-resetable="false"></div>


<?php echo $this->Form->end('Save Entry'); ?>
</div>
