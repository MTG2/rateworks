<?php

class Entry extends AppModel {

public $belongsTo = array('User','Framework');
public $hasMany = 'Comment';

 public $validate = array(
        'projectlink' => array(
            'rule' => 'notEmpty'
        ),
        'name' => array(
            'rule' => 'notEmpty'
        ),
		 'description' => array(
            'rule' => 'notEmpty'
        ),
		 'degree' => array(
            'rule' => 'notEmpty'
        ),
		 'rdegree' => array(
            'rule' => 'notEmpty'
        ),
		 'usability' => array(
            'rule' => 'notEmpty'
        ),
		 'rusability' => array(
            'rule' => 'notEmpty'
        ),
		 'highlights' => array(
            'rule' => 'notEmpty'
        ),
		 'links' => array(
            'rule' => 'notEmpty'
        ),
		 'domain' => array(
            'rule' => 'notEmpty'
        ),
		 'rtotal' => array(
            'rule' => 'notEmpty'
        )
    );
	
	public function isOwnedBy($post, $user) {
    return $this->field('id', array('id' => $post, 'user_id' => $user)) === $post;
}
	
}


?>