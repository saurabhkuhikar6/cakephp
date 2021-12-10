
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
        <th>Created</th>
        <th>Modified</th>
     
      </tr>
    </thead>
    <tbody>           
        <tr>
            <td><?= $post['Post']['body']; ?></td>
            <td><?= $post['Post']['created']; ?></td>
            <td><?= $post['Post']['modified']; ?></td>   
        </tr>
     
    </tbody>
  </table>
</div>

</body>
</html>
