<?php

class Comment extends AppModel {

public $belongsTo = array('User','Entry');
public $validate = array(
						'text' => array('allowEmpty' => false,
										'required'   => true,));


}

?>