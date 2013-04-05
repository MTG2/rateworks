<?php

class Comment extends AppModel {

public $belongsTo = array('User','Entry');
public $validate = array('text' => array(
										'rule' => 'notEmpty', // or: array('ruleName', 'param1', 'param2' ...)
										'required' => true

										));
}

?>