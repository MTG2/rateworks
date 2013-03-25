<?php

// app/Controller/UsersController.php
class UsersController extends AppController {


 public function beforeFilter() {
        $this->Auth->allow('login','register');
		
		if($this->Auth->loggedIn()){
			$this->Auth->allow('edit','logout', 'login');
		}	
		
    }


public function login() {
    if ($this->request->is('post')) {
		if(!$this->Auth->loggedIn()){
			if ($this->Auth->login()) {
            $this->redirect($this->Auth->redirect());
        } else {
            $this->Session->setFlash(__('Invalid username or password, try again'));
        }
		}
    }
}

public function logout() {
$this->Session->setFlash('Sie wurden ausgeloggt');
    $this->redirect($this->Auth->logout());
}

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function register() {
        if ($this->request->is('post')) {
		
		$username=$this->request->data['User']['username'];
		if($username=$this->User->find('first', array('conditions' => array('User.username' => $username))))
		 $this->Session->setFlash(__('User bereits vorhanden'));
		 else {
				$this->User->create();
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('The user has been saved'));

					//$this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
					// if ($this->Auth->login($this->request->data)) {
					//   $this->Session->setFlash(__('eingeloggt'));  //nur um zu sehn obs geklappt hat
					// }
					
					$this->redirect(array('action' => 'login'));
					
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				}
			}
		}
    }
	

	public function upload(){
	
	 if (isset($this->params['form']['save'])) {
	 $this->Session->setFlash(__('The user has been saved'));
       // $result = $this->uploadFiles('img/uploads', $this->data['Files']);
        // TODO: $result verarbeiten
    }
	
	}
	
	
	public function impressum(){
	
	}
	
    public function edit($id = null) {
        $this->User->id = $id;
				
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
               // $this->redirect(array('controller' => 'entries', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null, $page) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => $page));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => $page));
    }
	
	//Ab hier martins kram

	public function a_main($id = null) {
	}
	
	public function a_edit_u() {
		$this->set('users', $this->paginate());
	}

}
	
?>