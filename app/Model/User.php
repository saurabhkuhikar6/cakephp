<?php


App::uses('AppModel', 'Model');

class User extends AppModel {

    public $name ='User';

    var $validate = array(
        'login' => array(
            'rule' => 'alphaNumeric'
        ),
        'username' => array(
            'rule' => array('email','notBlank'),
            'message' => 'Kindly provide your vaild username.',
            
            // 'unique' => array(
            //     'rule' => 'isUnique',
            //     'message' => 'Provided Email already exists.'
            // ),
            array('rule' => array('validateUnique', 'username'), 'message'=>'Provided User Name already exists.'),
        ),
        'password' => array(
            'rule' => array('minLength', '8'),
            'message' => 'Minimum 8 characters long'
        ),        
            
        'full_name' => array(
            'rule' => 'notBlank',
            'message' => 'Please type full name',
        ),
        
        
    );  

    function validateUnique($fieldValue, $fieldName) {
       
        if (!$this->isUnique($fieldName)) {
            return false;
        } else {
            return true;
        }
    }
    
}
?>
