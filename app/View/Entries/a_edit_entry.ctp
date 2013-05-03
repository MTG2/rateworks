<!-- File: /app/View/Entries/a_edit_entry.ctp -->
<?php $this->layout = 'admin'; ?>  <!-- admin Layout laden -->

<?php
	echo $this->html->script('jquery-1.9.1',false); 
	echo $this->html->script('jquery.rateit',true); 
?>


<h2>Projekt bearbeiten</h2>
<h3>ID: <?php echo $thisEntry['Entry']['id']; ?> </h3>

<section id="profil">

<?php echo $this->Form->create('Entry'); ?>


<p>Name</p>
<?php echo $this->Form->input('name', array('label'=>'', 'value' => $thisEntry['Entry']['name'])); ?>

<p>Projekt Link</p>
<?php echo $this->Form->input('projectlink', array('label'=>'', 'value' => $thisEntry['Entry']['projectlink'])); ?>

<p>Beschreibung</p>
<?php echo $this->Form->input('description', array('rows' => '3', 'label'=>'', 'value' => $thisEntry['Entry']['description'])); ?>

<p>Reifegrad / Bewertung</p>
<?php echo $this->Form->input('rdegree',array('type'=>'select', 'label'=>'', 'options'=>range(1,6,1), 'selected'=> $thisEntry['Entry']['rdegree']));?>
<div class="rateit" data-rateit-backingfld="#EntryRdegree" data-rateit-resetable="false" ></div>
<?php echo $this->Form->input('degree', array('rows' => '3', 'label'=>'', 'value' => $thisEntry['Entry']['degree'])); ?>

<p>Handhabung</p>
<?php echo $this->Form->input('rusability',array('label'=>'', 'type'=>'select', 'options'=>range(1,6,1), 'selected'=> $thisEntry['Entry']['rusability']));?>
<div class="rateit" data-rateit-backingfld="#EntryRusability" data-rateit-resetable="false"></div>
<?php echo $this->Form->input('usability', array('label'=>'', 'rows' => '3', 'value' => $thisEntry['Entry']['usability'])); ?>

<p>Highlights</p>
<?php echo $this->Form->input('highlights', array('label'=>'', 'rows' => '3', 'value' => $thisEntry['Entry']['highlights'])); ?>

<p>Links</p>
<?php echo $this->Form->input('links', array('label'=>'', 'rows' => '3', 'value' => $thisEntry['Entry']['links'])); ?>

<p>Einsatzgebiet</p>
<?php echo $this->Form->input('domain', array('label'=>'', 'rows' => '3', 'value' => $thisEntry['Entry']['domain'])); ?>

<p>Komplette Bewertung</p>
<?php echo $this->Form->input('rtotal',array('label'=>'', 'type'=>'select', 'options'=>range(1,6,1), 'selected'=> $thisEntry['Entry']['rtotal']));?>
<div class="rateit" data-rateit-backingfld="#EntryRtotal" data-rateit-resetable="false"></div>

<?php echo $this->Form->end('Save'); ?>

</section>