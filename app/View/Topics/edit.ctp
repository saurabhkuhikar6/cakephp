<!-- File: /app/View/Posts/edit.ctp -->

<h1>Edit Post</h1>
<?php
echo $this->Form->create('Topic');
echo $this->Form->input('title');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->select('visible',array('1'=>'Published','2'=>'Hidden'),array('empty'=>false));
echo $this->Form->end('Edit topics ');
?>