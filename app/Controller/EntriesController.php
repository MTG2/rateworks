<?php

class EntriesController extends AppController {

	public function beforeFilter() {
		if($this->Auth->loggedIn()){
			$this->Auth->allow('index', 'view', 'show_entries');
		}	
    }

    public function index() {
         $this->set('entries', $this->Entry->find('all'));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $entry = $this->Entry->findById($id);
        if (!$entry) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('entry', $entry);
    }
	
	public function add() {
	$this->loadModel('Framework');
		$frameworks =  $this->Framework->find('list', array('fields' => 'Framework.name'));
		$this->set('frameworks',$frameworks);
		
    if ($this->request->is('post')) {
        $this->request->data['Entry']['user_id'] = $this->Auth->user('id'); 
		$this->request->data['Entry']['framework_id'] = $this->request->data['Entry']['framework'];
		

        if ($this->Entry->save($this->request->data)) {
            $this->Session->setFlash('Eintrag wurde gespeichert.');
            $this->redirect(array('controller' => 'comments', 'action' => 'view',$this->Entry->id));

        }
    }
	}
	
	public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Invalid post'));
    }

    $entry = $this->Entry->findById($id);
    if (!$entry) {
        throw new NotFoundException(__('Invalid post'));
    }

	$this->set('entry', $entry);
	
    if ($this->request->is('post') || $this->request->is('put')) {
        $this->Entry->id = $id;
        if ($this->Entry->save($this->request->data)) {
            $this->Session->setFlash('Änderungen wurden gespeichert.');
            $this->redirect(array('controller' => 'comments','action' => 'view', $entry['Entry']['id']));
        } else {
            $this->Session->setFlash('Änderungen konnten nicht gespeichert werden.');
        }
    }

    if (!$this->request->data) {
        $this->request->data = $entry;
    }
}

	
	public function show_entries($id)
	{
	
		$entry = $this->Entry->find('all', array(
		'contain' => array('Entry'),
		'conditions' => array('Entry.framework_id = '.$id)	
		));
		
		
		$this->loadModel('Framework');
		$framework = $this->Framework->find('first', array('conditions' => array('Framework.id' => $id)));
		
		$this->set('entries', $entry);
		$this->set('framework', $framework);
	
	}
	
	
public function delete($id, $page, $frameworkid) {

	echo $id;
	echo $page;
	echo $frameworkid;
	
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    if ($this->Entry->delete($id)) {
        $this->Session->setFlash('Eintrag mit id: ' . $id . ' wurde gelöscht.');
    }
		
	$this->redirect(array('action' => $page, $frameworkid));
}




public function isAuthorized($user) {
    // All registered users can add posts
    if ($this->action === 'add') {
        return true;
    }
	
    // The owner of a post can edit and delete it
    if (in_array($this->action, array('edit', 'delete'))) {
        $entryId = $this->request->params['pass'][0];
        if ($this->Entry->isOwnedBy($entryId, $user['id'])) {
            return true;
        }
		else
		{
		    $this->Session->setFlash('Keine Berechtigung.');
		}
    }

    return parent::isAuthorized($user);

}

	//ab hier martins kram
	public function a_edit_rates($id) {
	//	$this->set('entries', $this->paginate());

		$entry = $this->Entry->find('all', array(
			'contain' => array('Entry'),
			'conditions' => array('Entry.framework_id = '.$id)	
		));
			
		$this->set('entries', $entry);

	}


	public function a_edit_entry($id) {
	
		
		$entry = $this->Entry->find('first', array(
			'contain' => array('Entry'),
			'conditions' => array('Entry.id = '.$id)	
		));
		
		$this->set('thisEntry', $entry);	
		
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->Entry->id = $id;
			if ($this->Entry->save($this->request->data)) {
				$this->Session->setFlash('Änderungen wurden gespeichert.');
				$this->redirect(array('action' => 'a_edit_rates', $id));
			} else {
				$this->Session->setFlash('Änderungen konnten nicht gespeichert werden.');
			}
		}
	
	
	
	}

}

?>