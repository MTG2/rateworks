<!-- File: /app/View/Posts/index.ctp -->

<h1>Frameworks</h1>
<p><?php echo $this->Html->link('Add Entry', array('action' => 'add')); ?></p>
<p><?php echo $this->Html->link('Log out', array('controller' => 'users', 'action' => 'logout')); ?></p>
<p><?php  echo $this->Session->read('Auth.User.username');?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Actions</th>
        <th>Created</th>
    </tr>

<!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($entries as $entry): ?>
    <tr>
        <td><?php echo $entry['Entry']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($entry['Entry']['name'], array('action' => 'view', $entry['Entry']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $entry['Entry']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $entry['Entry']['id'])); ?>
        </td>
        <td>
            <?php echo $entry['Entry']['created']; ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>