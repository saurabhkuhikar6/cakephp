<?php


App::uses('AppModel', 'Model');


class Post extends AppModel {

    public $validate = array(        
        'body' => array(
            'rule' => 'notBlank'
        )
    );
    

    public $belongsTo = 'Topic';
}
?>
