<?php
App::import('Controller','Users');

?>

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
  <h2>Topics View</h2>
            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Title</th>
        <th>User Name</th>
        <th>Published</th>
        <th>Created</th>
        <th>Modified</th>     
        <th>link</th>     
      </tr>
    </thead>
    <tbody>           
      <tr>
          <td><?= $topic['Topic']['title']; ?></td>
          <td><?= $topic['User']['username']; ?></td>
          <td><?= $topic['Topic']['visible']; ?></td>
          <td><?= $topic['Topic']['created']; ?></td>
          <td><?= $topic['Topic']['updated']; ?></td>   
          <td>
          <?php
            echo $this->Html->link(
              'Create Post in this topic', array('controller'=>'posts','action' => 'add', $topic['Topic']['id'])
            );
            ?>
          </td>
      </tr>
     
    </tbody>
  </table>
</div>

<div class="container">
<h2>Post Related to topics</h2>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Sr No</th>
        <th>User Name</th>
        <th>Body</th>
        <th>Created</th>
        <th>Modified</th> 
          
      </tr>
    </thead>
    <tbody> 
      <?php $count = 1;?>  
      <?php foreach( $topic['Post'] as $post): ?>
        <?php $userController = new UsersController;
        $username = $userController->getUserNameById([$post['user_id']]) ?>
        <tr>
            <td><?= $count++ ?></td>  
            <td><?= $username['User']['username']; ?></td>   
            <td><?= $post['body']; ?></td>     
            <td><?= $post['created']; ?></td>     
            <td><?= $post['modified']; ?></td>     
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

</body>
</html>
