<!DOCTYPE html>
<html lang="en">
<head>
  <title>Topics</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Topics</h2>
<?php echo $this->Flash->render(); ?>
<?php $paginator = $this->Paginator; ?>
  <?php if(AuthComponent::user()){  ?>
    <p><?php echo $this->Html->link('Add New Topic', array('action' => 'add'),array('class' => 'btn btn-info')); ?></p>
    <br>
    <p><?php echo $this->Html->link('Logout', array('controller'=>'users','action' => 'logout'),array('class' => 'btn btn-warm')); ?> (<?=AuthComponent::user('username') ?>)</p>
    <?php } else{ ?>

       <p><?php echo $this->Html->link('Login', array('controller'=>'users','action' => 'login'),array('class' => 'btn btn-primary')); ?></p>

    <?php  }
  ?>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th><?= $paginator->sort('title', 'Title') ?></th>
        <th><?= $paginator->sort('username', 'User Name') ?></th>
        <th><?= $paginator->sort('created', 'Created') ?></th>
        <th><?= $paginator->sort('modified', 'Modified') ?></th>
        
        <?php if(AuthComponent::User('role') == 2 ):?>
        <th><?= $paginator->sort('visible', 'Published') ?></th>
        <th>Action</th>
        <?php endif; ?>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($topic as $topics): ?>
        <tr>
          <?php if(AuthComponent::User('role') == 1 || !AuthComponent::User() ):  ?>
            <?php if ($topics['Topic']['visible'] == 1):  ?>         
              <td><?php echo $this->Html->link($topics['Topic']['title'],array('action' => 'view', $topics['Topic']['id'])); ?></td>
              <td><?= $topics['User']['username']; ?></td>
              <td><?= $topics['Topic']['created']; ?></td>
              <td><?= $topics['Topic']['updated']; ?></td>
              <?php if(AuthComponent::User('role') == 2 ):?>
                <td><?= $topics['Topic']['visible']; ?></td>
                <td>
                  <?php echo $this->Html->link('Edit', array('controller'=>'topics','action' => 'edit', $topics['Topic']['id']));?>
                  <?php echo $this->Form->postlink('Delete',array('controller'=>'topics','action' => 'delete', $topics['Topic']['id']),array('confirm' => 'Are you sure?'));?>
                </td>
              <?php endif; ?>
            <?php endif; ?>
          <?php endif; ?>       
          <?php if(AuthComponent::User('role') == 2):  ?>
            <td><?php echo $this->Html->link($topics['Topic']['title'],array('action' => 'view', $topics['Topic']['id']));?></td>
            <td><?= $topics['User']['username']; ?></td>
            <td><?= $topics['Topic']['created']; ?></td>
            <td><?= $topics['Topic']['updated']; ?></td>
            <td><?= $topics['Topic']['visible']; ?></td>
            <td>
                <?php
                  echo $this->Html->link(
                    'Edit', array('controller'=>'topics','action' => 'edit', $topics['Topic']['id'])
                  );
                ?>
                <?php
                  echo $this->Form->postlink(
                    'Delete',
                    array('controller'=>'topics','action' => 'delete', $topics['Topic']['id']),
                    array('confirm' => 'Are you sure?')
                  );
                ?>

            </td>
          </tr>
        <?php endif ;?>
      <?php endforeach; ?>
     
    </tbody>
  </table>

<?php  
if($topic){ 
    
    // pagination section
    echo "<div class='paging'>";
  
      // the 'first' page button
      echo $paginator->first("First");        
      
      if($paginator->hasPrev()){
          echo $paginator->prev("Prev");
      }        
      // the 'number' page buttons
      echo $paginator->numbers(array('modulus' => 2));
        
      // for the 'next' button
      if($paginator->hasNext()){
        echo $paginator->next("Next");
      }
        
      // the 'last' page button
      echo $paginator->last("Last");
      
    echo "</div>";
      
}  
// tell the user there's no records found
else{
    echo "No users found.";
}
?>
</div>
</body>
</html>
