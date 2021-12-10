<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>User Table</h2>
  <p><?php echo $this->Html->link('Add New User', array('action' => 'add'),array('class' => 'btn btn-info')); ?></p>
  <table class="table table-bordered">
    <thead>
      <tr>
      
        <th>User Name</th>
        <th>Role</th>   
        <th>Created</th>
        <th>Modified</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
    <tr>
      <td>
        <?= $this->Html->link(
          $user['User']['username'],array('action' => 'view', $user['User']['id']));
        ?>
      </td> 
      <td><?= $user['User']['role']; ?></td>
      <td><?= $user['User']['created']; ?></td>
      <td><?= $user['User']['modified']; ?></td>
      <td>
        <?= $this->Html->link('Edit', array('controller'=>'users','action' => 'edit', $user['User']['id']));?>
          
        <?= $this->Form->postlink('Delete',array('controller'=>'users','action' => 'delete', $user['User']['id']), array('confirm' => 'Are you sure?'));?>
          
        <?= $this->Html->link('View', array('controller'=>'users','action' => 'view', $user['User']['id']));?>          
      </td>
    </tr>
    <?php endforeach; ?>
     
    </tbody>
  </table>
</div>

</body>
</html>
