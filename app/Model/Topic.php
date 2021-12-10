<?php


App::uses('AppModel', 'Model');


class Topic extends AppModel {

    public $validate = array(
        'title' => array(
            'rule' => 'notBlank'            
        ),
        
    );
    public  $displayfield ='title';

    public $belongsTo = array(
        'User' =>  array(
            'className' => 'User',
            'foreignKey' => 'user_id',
                'conditions'=>'',
                'fields'=>'',
                'order'=>'',
                'dependent'=>'',
      
        )
    );

    public $hasMany = array(
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'topic_id',
                'conditions'=>'',
                'fields'=>'',
                'order'=>'',
                'dependent'=>'',
        )
    );
   
}
?>  
