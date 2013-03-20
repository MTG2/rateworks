<!-- File: /app/View/Frameworks/index.ctp -->

<h1>Frameworks</h1>
<p><?php echo $this->Html->link('Add Framework', array('action' => 'add')); ?></p>
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

    <?php foreach ($frameworks as $framework): ?>
    <tr>
        <td><?php echo $framework['Framework']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($framework['Framework']['name'], array('action' => 'view', $framework['Framework']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $framework['Framework']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $framework['Framework']['id'])); ?>
        </td>
        <td>
            <?php echo $framework['Framework']['created']; ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>