<!-- File: /app/View/Entries/a_edit_entry.ctp -->
<?php $this->layout = 'admin'; ?>  <!-- admin Layout laden -->



<h2>Projekt bearbeiten</h2>
<h3>ID: <?php echo $thisEntry['Entry']['id']; ?> </h3>



<?php echo $this->Form->create('Entry'); ?>


<p>Name</p>
<?php echo $this->Form->input('name', array('label'=>'', 'value' => $thisEntry['Entry']['name'])); ?>

<p>Projekt Link</p>
<?php echo $this->Form->input('project_link', array('label'=>'', 'value' => $thisEntry['Entry']['project_link'])); ?>

<p>Beschreibung</p>
<?php echo $this->Form->input('description', array('rows' => '3', 'label'=>'', 'value' => $thisEntry['Entry']['description'])); ?>

<p>Reifegrad / Bewertung</p>
<?php echo $this->Form->input('degree', array('rows' => '3', 'label'=>'', 'value' => $thisEntry['Entry']['degree'])); ?>

<p>Handhabung</p>
<?php echo $this->Form->input('usability', array('label'=>'', 'rows' => '3', 'value' => $thisEntry['Entry']['usability'])); ?>

<p>Highlights</p>
<?php echo $this->Form->input('highlights', array('label'=>'', 'rows' => '3', 'value' => $thisEntry['Entry']['highlights'])); ?>

<p>Links</p>
<?php echo $this->Form->input('links', array('label'=>'', 'rows' => '3', 'value' => $thisEntry['Entry']['links'])); ?>

<p>Einsatzgebiet</p>
<?php echo $this->Form->input('domain', array('label'=>'', 'rows' => '3', 'value' => $thisEntry['Entry']['domain'])); ?>


<?php echo $this->Form->end('Save'); ?>

