<?php

class CommentsController extends AppController {

public function view($id) {

		
      $comment = $this->Comment->find('all', array(
		'contain' => array('Comment'),
		'conditions' => array('Comment.entry_id = '.$id)	
		));
		
		$entry = $comment[0];

		$this->set('comments', $comment); 
		$this->set('entry', $entry); 
		
		if ($this->request->is('post')) {
        $this->request->data['Comment']['user_id'] = $this->Auth->user('id'); 
		$this->request->data['Comment']['entry_id'] = $entry['Entry']['id']; 
		
        if ($this->Comment->save($this->request->data)) {
            $this->Session->setFlash('Your post has been saved.');
            $this->redirect(array('action' => 'view', $id));
        }
    }
		
		
	
    }
	
public function add($id){


}
	
}
