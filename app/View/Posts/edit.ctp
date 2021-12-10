<!-- File: /app/View/Posts/edit.ctp -->

<h1>Edit Post</h1>
<?php
    echo $this->Form->create('Post');

    echo $this->Form->input('topic_id');
    echo $this->Form->input('body', array('rows' => '3'));
    echo $this->Form->end('Save Post');
?>