<!-- File: /app/View/Entries/add.ctp -->
<?php $this->layout = 'standart'; ?>  <!-- standart Layout laden -->
<h1>Add Entry</h1>
<div id="entry">



<?php echo $this->Form->create('Entry'); ?>
<?php echo $this->Form->input('framework',array('type'=>'select','options'=>$frameworks));?>
<?php echo $this->Form->input('name'); ?>
<?php echo $this->Form->input('Projekt Link'); ?>
<?php echo $this->Form->input('description', array('rows' => '3')); ?>
<?php echo $this->Form->input('degree', array('rows' => '3')); ?>
<?php echo $this->Form->input('usability', array('rows' => '3')); ?>
<?php echo $this->Form->input('highlights', array('rows' => '3')); ?>
<?php echo $this->Form->input('links', array('rows' => '3')); ?>
<?php echo $this->Form->input('domain', array('rows' => '3')); ?>


<?php echo $this->Form->end('Save Entry'); ?>

</div>