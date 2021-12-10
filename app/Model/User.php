<?php


App::uses('AppModel', 'Model');

class User extends AppModel {

    public $name ='User';

    var $validate = array(
        'username' => array(           
            
            'rule' => array('email','notBlank'),
            'message' => 'Kindly provide your vaild username.',
            
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'Provided Email already exists.'
            )
        ),
        'password' => array(
            array(
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'Please Enter password'
            ),
            array(                              
            'rule' => array('minLength', 6),
            'message' => 'Passwords must be at least 6 characters long.',
            )
        ),
        'full_name' => array(
            'rule' => 'notBlank',
            'message' => 'Please type full name',
        ),
        
    ); 

   
}
?>
