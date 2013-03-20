<?php

class EntriesController extends AppController {


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
    if ($this->request->is('post')) {
        $this->request->data['Entry']['user_id'] = $this->Auth->user('id'); //Added this line
        if ($this->Entry->save($this->request->data)) {
            $this->Session->setFlash('Your post has been saved.');
            $this->redirect(array('action' => 'index'));
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

    if ($this->request->is('post') || $this->request->is('put')) {
        $this->Entry->id = $id;
        if ($this->Entry->save($this->request->data)) {
            $this->Session->setFlash('Your post has been updated.');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('Unable to update your post.');
        }
    }

    if (!$this->request->data) {
        $this->request->data = $entry;
    }
}

public function delete($id, $page) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    if ($this->Entry->delete($id)) {
        $this->Session->setFlash('The post with id: ' . $id . ' has been deleted.');
        $this->redirect(array('action' => $page));
    }
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
    }


	
    return parent::isAuthorized($user);
	

}

	//ab hier martins kram
	public function a_edit_rates($lol) {
		$this->set('entries', $this->paginate());
		$this->set('frameworkid', $lol); //in controller
	}	
	

}

?>