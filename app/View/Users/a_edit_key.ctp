<!-- File: /app/View/Users/a_edit_key.ctp -->
<?php $this->layout = 'admin'; ?>  <!-- admin Layout laden -->
<h1>Zugangsschlüssel verwalten</h1>


<div>


<?php 
	echo "<div id='key'>";
		echo "Aktueller Regestrationskey: ";
		echo "<b>".$key['Registrationkey']['key']."</b><br><br><br><br>";
		
		echo $this->Form->create('Registrationkey');
		echo "Neuer Zugangsschlüssel eingeben:<br>";
		echo $this->Form->input('id', array('maxlength' => '1', 'label' => '', 'disabled' => 'true', 'value'=> $key['Registrationkey']['id'])); 
		echo $this->Form->input('key', array('maxlength' => '6', 'label' => '', 'value'=> $key['Registrationkey']['key'])); 
		echo $this->Form->end('Save Key');
	echo "</div>";
?>

</div>