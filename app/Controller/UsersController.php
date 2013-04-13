<?php

// app/Controller/UsersController.php
class UsersController extends AppController {


 public function beforeFilter() {
        $this->Auth->allow('login','register');
		
		if($this->Auth->loggedIn()){
			$this->Auth->allow('edit','logout', 'login', 'index', 'view');
		}	
		
    }


public function login() {
	if($this->Auth->loggedIn()){
		$this->redirect($this->Auth->redirect());
	}

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
		
		$this->loadModel('Comment');
		$comments = $this->Comment->find('all',
			array(
				'order' => array(
					'Comment.created' => 'DESC',
				)
			)
		);
		
		
		$this->set('comments', $comments);
		
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
		$this->loadModel('Registrationkey');
			$username=$this->request->data['User']['username'];
			if($username=$this->User->find('first', array('conditions' => array('User.username' => $username)))){
				$this->Session->setFlash(__('User bereits vorhanden'));
			}
			else {
				$key = $this->Registrationkey->find('first');
				if(strcmp($this->request->data['User']['registrationkey'], $key['Registrationkey']['key']) == 0){ 
					$this->request->data['User']['role'] = 'author';
					$this->request->data['User']['pic'] = 'default.png';
					$this->User->create();
					if ($this->User->save($this->request->data)) {
						$this->Session->setFlash(__('The user has been saved'));
						$user = $this->User->read();
						if ($this->Auth->login($user['User'])) {
						   $this->redirect($this->Auth->redirect());
						}
					} else {
						$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
					}
				}
				else{
					$this->Session->setFlash(__('Falschen Zugangsschl&uuml;ssel eingeben.'));
				}	
			}
		}
    }
	
	public function upload(){
	 if ($this->request->is('post') || $this->request->is('put')) {
	 if (isset($this->request->data['Users']['file'])) {
	 $this->Session->setFlash(__('The user has been saved'));
     $result = $this->uploadFiles('img/uploads', $this->request->data['Users']);
    }
	}
	
	}
	
	public function impressum(){
	
	}
	
    public function edit() {
		$id =  $this->Auth->user('id');
        $this->User->id = $id;
		$result = null;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }

		$entry = $this->User->find('first', array('conditions' => array('User.id' => $id)));
		
		
		$this->set('entry', $entry);
		
        if ($this->request->is('post') || $this->request->is('put')) {
		
		if (isset($this->request->data['file'])) {
	
			$files = array(0 => $this->request->data['file']);
			
			if($files[0]['size'] <= 128000 && strpos($files[0]['type'],'image') !== false)
			{
				$result = $this->uploadFiles('img/uploads', $files);
			}
			else
			{
				$this->Session->setFlash(__('Wrong size or file type'));
			}
		}
		
			if($result != null)
			{
				$data = $this->request->data['User']['pic'] = substr($result['urls'][0],4);
			}
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
               $this->redirect(array('controller' => 'users', 'action' => 'edit', $id));
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
		
		$user = $this->User->find('first', array('conditions' => array('User.id' => $id)));
	
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
			
			$file = new File(WWW_ROOT.'img/'.$user['User']['pic']);
			$file->delete();
			
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
	
	public function a_edit_u_view($id){
		
		$user = $this->User->find('first', array(
			'contain' => array('User'),
			'conditions' => array('User.id = '.$id)	
		));
		
		$this->set('thisUser', $user);	
		
		
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->User->id = $id;
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('The User has been updated.');
				$this->redirect(array('action' => 'a_edit_u'));
			} else {
				$this->Session->setFlash('Unable to update the User.');
			}
		}
	}
	
	/**
 * uploads files to the server
 * @params:
 *    $folder  = the folder to upload the files e.g. 'img/files'
 *    $formdata   = the array containing the form files
 *    $itemId  = id of the item (optional) will create a new sub folder
 * @return:
 *    will return an array with the success of each file upload
 */

	
	

}
	
?>