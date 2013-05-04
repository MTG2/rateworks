<!-- File: /app/View/Frameworks/add.ctp -->
<?php $this->layout = 'admin'; ?>  <!-- admin Layout laden -->
<h1>Add Framework</h1>
<section id="profil">
	<?php
		echo $this->Form->create('Framework', array('action' => 'add', 'type' => 'file'));
		echo "Name";
		echo $this->Form->input('name', array('label' => ''));
		echo "Link zur Framework-Homepage";
		echo $this->Form->input('link', array('rows' => '3', 'label' => ''));
		echo "<p><small>Bildformate: jpg, png<br>";
		echo "Maximal 3Mb sollte das Bild gross sein.</small></p><br>";
		echo $this->form->file('file');
		echo "<br><br>";
		echo $this->Form->end('Save Framework');
	?>
</section>