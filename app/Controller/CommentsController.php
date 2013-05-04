<?php

class CommentsController extends AppController {


	public function beforeFilter() {
		if($this->Auth->loggedIn()){
			$this->Auth->allow('index', 'view', 'delete');
		}	
    }
		
	public function view($id) {
		$edit_entry = 0;
      $comment = $this->Comment->find('all', array(
		'contain' => array('Comment'),
		'conditions' => array('Comment.entry_id = '.$id),
		'order' => array('Comment.created' => 'DESC')

		));
		
		$this->loadModel('User');
		$user = $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id'))));
		
		$this->loadModel('Entry');
		$entry = $this->Entry->find('first', array('conditions' => array('Entry.id' => $id)));
		
	//	$this->loadModel('Framework');
	//	$framework = $this->Entry->find('first', array('conditions' => array('Framework.id' => $id)));
		
		$this->set('user', $user);
		$this->set('comments', $comment); 
		$this->set('entry', $entry); 
		// $this->set('framework', $framework);
		
		if ($this->request->is('post')) {
        $this->request->data['Comment']['user_id'] = $this->Auth->user('id'); 
		$this->request->data['Comment']['entry_id'] = $entry['Entry']['id']; 
		
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash('Kommentar wurde gespeichert.');
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
			$comment = $this->Comment->find('first', array(
			'contain' => array('Comment'),
			'conditions' => array('Comment.id = '.$id)));
		
			if($comment['Comment']['user_id'] == $this->Auth->user('id'))
			{
				if ($this->Comment->delete($id)) {	
					$this->Session->setFlash('Kommentar wurde gelöscht');		
				}
			}
			else
			{
				$this->Session->setFlash('Keine Berechtigung zum löschen');		
			}
		$this->redirect(array('action' => $page, $entryID));
	}
		
		
	public function deleteByEntry($id, $frameworkID){
	
		$comments = $this->Comment->find('all', array(
			'contain' => array('Comment'),
			'conditions' => array('Comment.entry_id = '.$id)	
		));
		
		foreach($comments as $inhalt){
			if ($this->Comment->delete($inhalt['Comment']['id'])) {
			}
		}
		
		$this->requestAction(array('controller' => 'entries', 'action' => 'delete', $id, 'a_edit_rates', $frameworkID));
		
	}
		
		
		
	public function deleteByFramework($id){
	
		$this->loadModel('Entry');
		
		$entries = $this->Entry->find('all', array(
			'contain' => array('Entry'),
			'conditions' => array('Entry.framework_id = '.$id)	
		));
		
		
		foreach($entries as $inhalt){
			
			$comments = $this->Comment->find('all', array(
				'contain' => array('Comment'),
				'conditions' => array('Comment.entry_id = '.$inhalt['Entry']['id'])	
			));
			

			foreach ($comments as $thisComment){
				if ($this->Comment->delete($thisComment['Comment']['id'])) {
				}
			}
			
			if ($this->Entry->delete($inhalt['Entry']['id'])) {
			}
		}
		
		$this->requestAction(array('controller' => 'frameworks', 'action' => 'delete', $id, "a_edit_frameworks"));
	}
	
	
}
