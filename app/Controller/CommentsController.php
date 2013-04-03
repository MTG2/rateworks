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
		
		$this->loadModel('Framework');
		$framework = $this->Entry->find('first', array('conditions' => array('Framework.id' => $id)));
		
		$this->set('comments', $comment); 
		$this->set('entry', $entry); 
		$this->set('framework', $framework);
		
		if ($this->request->is('post')) {
        $this->request->data['Comment']['user_id'] = $this->Auth->user('id'); 
		$this->request->data['Comment']['entry_id'] = $entry['Entry']['id']; 
		
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash('Your post has been saved.');
				$this->redirect(array('action' => 'view', $id));
			}
		}
    }
	
	
	public function a_edit_comment($id){
	
		$comments = $this->Comment->find('all', array(
			'contain' => array('Comment'),
			'conditions' => array('Comment.entry_id = '.$id)	
		));
		
		$this->set('allComments', $comments);	
		
	}
	
	
	public function delete($id, $page, $entryID) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		if ($this->Comment->delete($id)) {
			$this->Session->setFlash('The Comment with id: ' . $id . ' has been deleted.');
		}
			
		$this->redirect(array('action' => $page, $entryID));
	}
	
	public function delbyframework($id) {
		echo $id;
	
	$this->redirect(array('action' => ''));
	}
	
	public function deleteByFramework($id){
	echo $id;
	}
	
	
}
