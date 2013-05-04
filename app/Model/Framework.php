<?php

class Framework extends AppModel {

public $hasMany = 'Entry';

 public $validate = array(
        'name' => array(
            'rule' => 'notEmpty'
        ),
        'link' => array(
            'rule' => 'notEmpty'
        )
    );

}



?>