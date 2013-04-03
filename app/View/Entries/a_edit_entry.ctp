<!-- File: /app/View/Entries/add.ctp -->
<?php $this->layout = 'admin'; ?>  <!-- admin Layout laden -->



<h1>Projekt bearbeiten</h1>

<div class="profilcontainer">
<section id="profil">



<H2>ID: <?php echo $entryID; ?></H2>


<p>Framework ID</p>
<?php echo $this->Form->input('domain', array('label'=>'', 'rows' => '3', 'value' => $entryFrameworkID)); ?>

<p>Name</p>
<?php echo $this->Form->input('name', array('label'=>'', 'value' => $entryName)); ?>

<p>Projekt Link</p>
<?php echo $this->Form->input('project_link', array('label'=>'', 'value' => $entryProjectLink)); ?>

<p>Beschreibung</p>
<?php echo $this->Form->input('description', array('rows' => '3', 'label'=>'', 'value' => $entryDescription)); ?>

<p>Reifegrad / Bewertung</p>
<?php echo $this->Form->input('degree', array('rows' => '3', 'label'=>'', 'value' => $entryDegree)); ?>

<p>Handhabung</p>
<?php echo $this->Form->input('usability', array('label'=>'', 'rows' => '3', 'value' => $entryUsability)); ?>

<p>Highlights</p>
<?php echo $this->Form->input('highlights', array('label'=>'', 'rows' => '3', 'value' => $entryHighlights)); ?>

<p>Links</p>
<?php echo $this->Form->input('links', array('label'=>'', 'rows' => '3', 'value' => $entryLinks)); ?>

<p>Einsatzgebiet</p>
<?php echo $this->Form->input('domain', array('label'=>'', 'rows' => '3', 'value' => $entryDomain)); ?>

<p>_______________________________________________________________________________________________________</p>
<?php echo $this->Form->PostLink(
	'Save',
	array('action' => 'a_save_entry', $ausgabe['Entry']['id'], "a_edit_rates", $ausgabe['Entry']['framework_id']),
	array('confirm' => 'Are you sure?'));
?>
</div>
