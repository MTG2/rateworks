<?php

class FrameworksController extends AppController {


    public function index() {
         $this->set('frameworks', $this->Framework->find('all'));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $framework = $this->Framework->findById($id);
        if (!$framework) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('framework', $framework);
    }
	
	public function add() {
    if ($this->request->is('post')) {
        $this->request->data['Framework']['user_id'] = $this->Auth->user('id'); //Added this line
        if ($this->Framework->save($this->request->data)) {
            $this->Session->setFlash('Your post has been saved.');
            $this->redirect(array('action' => 'index'));
        }
    }
	}
	
	public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Invalid post'));
    }

    $framework = $this->Framework->findById($id);
    if (!$framework) {
        throw new NotFoundException(__('Invalid post'));
    }

    if ($this->request->is('post') || $this->request->is('put')) {
        $this->Framework->id = $id;
        if ($this->Framework->save($this->request->data)) {
            $this->Session->setFlash('Your post has been updated.');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('Unable to update your post.');
        }
    }

    if (!$this->request->data) {
        $this->request->data = $framework;
    }
}

public function delete($id, $page) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    if ($this->Framework->delete($id)) {
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
        if ($this->Framework->isOwnedBy($entryId, $user['id'])) {
            return true;
        }
    }


	
    return parent::isAuthorized($user);
	

}

	//ab hier martins kram
	public function a_edit_frameworks() {
		$this->set('frameworks', $this->paginate());
	}	
}

?>