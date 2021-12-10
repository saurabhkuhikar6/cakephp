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
  <h2>Users View</h2>
            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>User Name</th>
        <th>Role</th>   
        <th>Full Name</th>   
        <th>Created</th>
        <th>Modified</th>
      </tr>
    </thead>
    <tbody>           
      <tr>
          <td><?= $users['User']['username']; ?></td>
          <td><?= $users['User']['role']; ?></td>
          <td><?= $users['User']['full_name']; ?></td>
          <td><?= $users['User']['created']; ?></td>
          <td><?= $users['User']['modified']; ?></td>   
     
      </tr>
     
    </tbody>
  </table>
</div>

</body>
</html>
