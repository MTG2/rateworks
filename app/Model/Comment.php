<?php

class Comment extends AppModel {

public $belongsTo = array('User','Entry');
public $validate = array('text' => array(
										'rule' => 'notEmpty', 
										'required' => true

										));
}

?>