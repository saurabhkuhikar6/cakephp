<?php


App::uses('AppModel', 'Model');

class User extends AppModel {

    public $validate = array(
        'username' => array(
            // 'required' => true,
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A username is required',
            )
        ),
       
        'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A password is required'
            )
        ),
        'full_name' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A full name is required'
            )
        ),
        // 'role' => array(
        //     'valid' => array(
        //         'rule' => array('inList', array('admin', 'author')),
        //         'message' => 'Please enter a valid role',
        //         'allowEmpty' => false
        //     )
        // )
    );

   
}
?>
