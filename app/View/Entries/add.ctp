<!-- File: /app/View/Entries/add.ctp -->
<?php $this->layout = 'standart'; ?>  <!-- standart Layout laden -->


<?php
 echo $this->html->script('jquery-1.9.1',false); 
  echo $this->html->script('jRating.jquery',false); 
?>

<script type="text/javascript">
  $(document).ready(function(){
	$(".stars").jRating({
		rateMax : 5,
		step : true,
		length : 5,
		bigStarsPath: '../app/webroot/img/icons/stars.png',
		showRateInfo: false
	});
  });
</script>





<h1>Add Entry</h1>

<div class="profilcontainer">
<section id="profil">



<?php echo $this->Form->create('Entry'); ?>
<?php echo $this->Form->input('framework',array('type'=>'select','options'=>$frameworks));?>
<?php echo $this->Form->input('name'); ?>
<?php echo $this->Form->input('Projekt Link'); ?>
<?php echo $this->Form->input('description', array('rows' => '3')); ?>
<?php echo $this->Form->input('degree', array('rows' => '3')); ?>
<div class="stars" data-average="10" data-id="1"></div></br>
<?php echo $this->Form->input('usability', array('rows' => '3')); ?>
<div class="stars" data-average="10" data-id="2"></div></br>
<?php echo $this->Form->input('highlights', array('rows' => '3')); ?>
<?php echo $this->Form->input('links', array('rows' => '3')); ?>
<?php echo $this->Form->input('domain', array('rows' => '3')); ?>
<div class="stars" data-average="10" data-id="3"></div></br>


<?php echo $this->Form->end('Save Entry'); ?>

</div>
