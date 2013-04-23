<!-- File: /app/View/Posts/edit.ctp -->
<?php $this->layout = 'standart'; ?>  <!-- standart Layout laden -->

<h2>Projekt bearbeiten</h2>
<h3>ID: <?php echo $entry['Entry']['id']; ?> </h3>

<section id="profil">

<?php echo $this->Form->create('Entry'); ?>


<p>Name</p>
<?php echo $this->Form->input('name', array('label'=>'', 'value' => $entry['Entry']['name'])); ?>

<p>Projekt Link</p>
<?php echo $this->Form->input('project_link', array('label'=>'', 'value' => $entry['Entry']['projectlink'])); ?>

<p>Beschreibung</p>
<?php echo $this->Form->input('description', array('rows' => '3', 'label'=>'', 'value' => $entry['Entry']['description'])); ?>

<p>Reifegrad / Bewertung</p>
<?php echo $this->Form->input('degree', array('rows' => '3', 'label'=>'', 'value' => $entry['Entry']['degree'])); ?>

<p>Handhabung</p>
<?php echo $this->Form->input('usability', array('label'=>'', 'rows' => '3', 'value' => $entry['Entry']['usability'])); ?>

<p>Highlights</p>
<?php echo $this->Form->input('highlights', array('label'=>'', 'rows' => '3', 'value' => $entry['Entry']['highlights'])); ?>

<p>Links</p>
<?php echo $this->Form->input('links', array('label'=>'', 'rows' => '3', 'value' => $entry['Entry']['links'])); ?>

<p>Einsatzgebiet</p>
<?php echo $this->Form->input('domain', array('label'=>'', 'rows' => '3', 'value' => $entry['Entry']['domain'])); ?>


<?php echo $this->Form->end('Save'); ?>

</section>