<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create New Topics</h1>
    <?php
        echo $this->Form->create('Topic');   //model name
        echo $this->Form->input('title');//write here tables fields for filling
        echo $this->Form->select('visible',array('1'=>'Published','2'=>'Hidden'),array('empty'=>false));
      
        echo $this->Form->end('Save Post');
    ?>  
</body>
</html>