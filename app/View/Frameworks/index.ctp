<!-- File: /app/View/Frameworks/index.ctp -->
<?php $this->layout = 'standart'; ?>  <!-- standart Layout laden -->

<h1>Frameworks</h1>
<p><?php echo $this->Html->link('Add Framework', array('action' => 'add')); ?></p>
<p><?php  echo $this->Session->read('Auth.User.username');?></p>

<?php  $check = 1?>


    <?php foreach ($frameworks as $framework): ?>
		<div align="center" class="frameEntry"">
			<?php echo		
				$this->Html->link(
					$this->Html->image($framework['Framework']['pic'], array('border' => '0', 'width'=>'150px')),
						array('controller' => 'entries', 'action' => 'show_entries', $framework['Framework']['id']),
						array('escape' => false));
			?>
						
			<?php 			
				echo "<div class='frameEntryName'>";
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