<!-- File: /app/View/Users/a_main.ctp -->
<?php $this->layout = 'admin'; ?>  <!-- admin Layout laden -->
<h1>Admin Interface</h1>



<?php 
		echo "<div align='center' id='adminEditUser'>";
			echo $this->Html->link(
				$this->Html->image('default.png', array('border' => '0', 'width'=>'100px')),
				array('controller' => 'users', 'action' => 'a_edit_u'),
				array('escape' => false));
	
			echo "<div id='adminChild'>";
				echo $this->Html->link('User verwalten',
					array('controller' => 'users', 'action' => 'a_edit_u'),
					array('escape' => false));
			
			echo "</div>";
		echo "</div>";	
		
		
		
		echo "<div align='center' id='adminEditFramework'>";
			echo $this->Html->link(
				$this->Html->image('editFramework.png', array('border' => '0', 'width'=>'150px')),
				array('controller' => 'frameworks', 'action' => 'a_edit_frameworks'),
				array('escape' => false));
	
			echo "<div id='adminChild'>";
				echo $this->Html->link('Frameworks verwalten',
					array('controller' => 'frameworks', 'action' => 'a_edit_frameworks'),
					array('escape' => false));
			
			echo "</div>";
		echo "</div>";	
		
		
		echo "<div align='center' id='adminEditFramework'>";
			echo $this->Html->link(
				$this->Html->image('editKey.png', array('border' => '0', 'width'=>'95px')),
				array('controller' => 'users', 'action' => 'a_edit_key'),
				array('escape' => false));
	
			echo "<div id='adminChild'>";
				echo $this->Html->link('Zugangsschlüssel verwalten',
					array('controller' => 'users', 'action' => 'a_edit_key'),
					array('escape' => false));
			
			echo "</div>";
		echo "</div>";	
?>
