<h1>Blog posts</h1>
<?php echo $this->Flash->render(); ?>
<!-- <p><?php echo $this->Html->link('Add Post', array('action' => 'add')); ?></p> -->
<table>
    <tr>
        <th>Id</th>
        <th>Topic Name</th>
        <th>Body</th>
        <th>Actions</th>
        <th>Created</th>
    </tr>

<!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($post as $posts): ?>
    <tr>
        <td><?= $posts['Post']['id']; ?></td>
        
        <td><?= $posts['Topic']['title']; ?></td>

        <td><?= $posts['Post']['body']; ?>
        
        <td><?= $posts['Post']['created']; ?></td>

        <td><?= $this->Html->link('Edit', array('action' => 'edit', $posts['Post']['id']));?> &nbsp;
            <?= $this->Form->postLink('Delete', array('action' => 'delete', $posts['Post']['id']),array('confirm' => 'Are you sure?'));?> &nbsp;
            <?= $this->Html->link('View', array('action' => 'view', $posts['Post']['id']));?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>