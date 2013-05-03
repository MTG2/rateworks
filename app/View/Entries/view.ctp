<!-- File: /app/View/Posts/view.ctp -->
<p><small>Created: <?php echo $entry['Entry']['created']; ?></small></p>
<h1><?php echo h($entry['Entry']['name']); ?></h1>
<p><?php echo h($entry['Entry']['text']); ?></p>
<?php echo $this->Form->create('Comment'); ?>
        <?php echo $this->Form->input('text'); ?>
<?php echo $this->Form->end('Save Comment'); ?>