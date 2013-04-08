<!-- File: /app/View/Frameworks/index.ctp -->
<?php $this->layout = 'standart'; ?>  <!-- standart Layout laden -->

<h1>Frameworks</h1>
<p><?php echo $this->Html->link('Add Framework', array('action' => 'add')); ?></p>
<p><?php  echo $this->Session->read('Auth.User.username');?></p>

<?php  $check = 1?>


    <?php foreach ($frameworks as $framework): ?>
		<div align="center" style="float:left; width: 250px; height: 250px; position: relative;">
			<?php echo		
				$this->Html->link(
					$this->Html->image($framework['Framework']['pic'], array('border' => '0', 'width'=>'150px')),
						array('controller' => 'entries', 'action' => 'show_entries', $framework['Framework']['id']),
						array('escape' => false));
			?>
						
			<?php 			
				echo "<div style='position:absolute; bottom:0; width:80%; background-color:#ffce99; margin-left:25px;'>";
			?>
			
			<b>
			<?php 
				echo $this->Html->link($framework['Framework']['name'],
						array('controller' => 'entries', 'action' => 'show_entries', $framework['Framework']['id']),
						array('escape' => false));
				echo "</div>";
			?>
			</b>
			
			
		</div>	
		
    <?php endforeach; ?>