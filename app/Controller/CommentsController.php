<?php

class CommentsController extends AppController {


	public function beforeFilter() {
		if($this->Auth->loggedIn()){
			$this->Auth->allow('index', 'view');
		}	
    }
	
public function view($id) {

      $comment = $this->Comment->find('all', array(
		'contain' => array('Comment'),
		'conditions' => array('Comment.entry_id = '.$id)	
		));
		
		$this->loadModel('Entry');
		$entry = $this->Entry->find('first', array('conditions' => array('Entry.id' => $id)));
		
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
		
}
