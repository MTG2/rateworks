<!-- File: /app/View/Frameworks/index.ctp -->
<?php $this->layout = 'standart'; ?>  <!-- standart Layout laden -->
<h1>Frameworks</h1>
<p><?php echo $this->Html->link('Add Framework', array('action' => 'add')); ?></p>
<p><?php  echo $this->Session->read('Auth.User.username');?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Created</th>
    </tr>

<!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($frameworks as $framework): ?>
    <tr>
        <td><?php echo $framework['Framework']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($framework['Framework']['name'], array('controller' => 'entries', 'action' => 'show_entries', $framework['Framework']['id'])); ?>
        </td>

        <td>
            <?php echo $framework['Framework']['created']; ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>