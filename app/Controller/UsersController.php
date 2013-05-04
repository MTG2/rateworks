﻿<?php
include_once("thumbnail.php");
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
				$this->Session->setFlash(__('Falscher Benutzername oder Passwort.'));
			}
			}
		}
	}

	public function logout() {
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
		
		$this->loadModel('Entry');
		$entries = $this->Entry->find('all',
			array(
				'order' => array(
					'Entry.created' => 'DESC',
				)
			)
		);		
		
		
		$this->set('comments', $comments);
		$this->set('entries', $entries);
		
        $this->set('users', $this->paginate());
    }
	


    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
		
		$this->loadModel('Comment');
		$comments = $this->Comment->find('all',
			array(
			'conditions' => array('Comment.user_id = '.$id),
				'order' => array(
					'Comment.created' => 'DESC',
				)
			)
		);
		
		$this->loadModel('Entry');
		$entries = $this->Entry->find('all',
			array(
			'conditions' => array('Entry.user_id = '.$id),
				'order' => array(
					'Entry.created' => 'DESC',
				)
			)
		);		
		
		$activities = array();
		foreach ($comments as $comment) {
			$activities[] = array('type' => 'comment', 'value' => $comment);
		}
		
		foreach ($entries as $entry) {
			$activities[] = array('type' => 'entry', 'value' => $entry);
		}
		
		$dates = array();
		foreach ($activities as $s) {
		
			if($s['type'] == 'comment')
			{
				$dates[] = $s['value']['Comment']['created'];
			}
			else
			{
				$dates[] = $s['value']['Entry']['created'];
			}
		}

		array_multisort($dates, SORT_DESC, $activities);
		
		$this->set('activities', $activities);
		$this->set('comments', $comments);
		$this->set('entries', $entries);
        $this->set('user', $this->User->read(null, $id));
    }

    public function register() {
        if ($this->request->is('post')) {	
		$this->loadModel('Registrationkey');
			$username=$this->request->data['User']['username'];
			if($username=$this->User->find('first', array('conditions' => array('User.username' => $username)))){
				$this->Session->setFlash(__('User bereits vorhanden.'));
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
						$this->Session->setFlash(__('Registrierung fehlgeschlagen, bitte erneut versuchen.'));
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
	 $this->Session->setFlash(__('Der Benutzer wurde gespeichert'));
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

		$this->loadModel('Comment');
		$comments = $this->Comment->find('all',
			array(
			'conditions' => array('Comment.user_id = '.$id),
				'order' => array(
					'Comment.created' => 'DESC',
				)
			)
		);
		
		$this->loadModel('Entry');
		$entries = $this->Entry->find('all',
			array(
			'conditions' => array('Entry.user_id = '.$id),
				'order' => array(
					'Entry.created' => 'DESC',
				)
			)
		);		
		
		$activities = array();
		foreach ($comments as $comment) {
			$activities[] = array('type' => 'comment', 'value' => $comment);
		}
		
		foreach ($entries as $entry) {
			$activities[] = array('type' => 'entry', 'value' => $entry);
		}
		
		$dates = array();
		foreach ($activities as $s) {
		
			if($s['type'] == 'comment')
			{
				$dates[] = $s['value']['Comment']['created'];
			}
			else
			{
				$dates[] = $s['value']['Entry']['created'];
			}
		}

		array_multisort($dates, SORT_DESC, $activities);
		
		$this->set('activities', $activities);
		
		$entry = $this->User->find('first', array('conditions' => array('User.id' => $id)));
		$this->set('entry', $entry);
		
        if ($this->request->is('post') || $this->request->is('put')) {
		
		if (isset($this->request->data['file'])) {
	
			$files = array(0 => $this->request->data['file']);
			
			
			if($files[0]['size'] <= 3500000 && strpos($files[0]['type'],'image') !== false)
			{
				$result = $this->uploadFiles('img/uploads', $files);
				
				$size = getimagesize($result['urls'][0]);
				$width  = $size[0];     // width as integer
				$height = $size[1];     // height as integer
				$type =   $size[2];
										// $size[2] ist der Dateityp
				
				if($type == 1) {								// Gif ist Typ 1
					if (($width > 160) && ($height > 160)){
						unlink($result['urls'][0]);				// Löscht das hochgeladene Bild vom Server
						$result = null;							// so bleibt default als Userbild
					}
				}else{
				
					$image = imagecreatefrompng($result['urls'][0]);
					imagejpeg($image, $result['urls'][0], 100);
					imagedestroy($image);					

					if($size > 150){
						$thumbnail = new thumbnail();
						$thumbnail->create($result['urls'][0]);
						$thumbnail->setQuality(100);
						$thumbnail->minSize(150);
						$thumbnail->save($result['urls'][0]);
					}
				}
				
 
			}
			else
			{
				$this->Session->setFlash(__('Falsche Bildgröße / Falscher Dateityp.'));
			}
		}
		
			if($result != null)
			{
				$data = $this->request->data['User']['pic'] = substr($result['urls'][0],4);
			}else{
				$this->Session->setFlash(__('Falsche Bildgröße / Falscher Dateityp.'));
			}
				
			//passwort ändern
			if($this->Auth->password($this->data['User']['oldpassword']) == $this->Auth->user('password'))
			{
				$this->request->data['User']['password'] = $this->data['User']['newpassword'];	
			}

            if ($this->User->save($this->request->data)) {
				if ($result == null){
					$this->Session->setFlash(__('Bildformat falsch formatiert'));
				}else{
					$this->Session->setFlash(__('Änderungen gespeichert.'));
				}
                
               $this->redirect(array('controller' => 'users', 'action' => 'edit', $id));
            } else {
                $this->Session->setFlash(__('Änderungen konnten nicht gespeichert werden.'));
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
			
			if (strcmp ($user['User']['pic'] , "default.png" )  != 0){
			$file = new File(WWW_ROOT.'img/'.$user['User']['pic']);
			$file->delete();
			}
            $this->redirect(array('action' => $page));
        }
        $this->Session->setFlash(__('Benutzer konnte nicht gelöscht werden'));
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
				$this->Session->setFlash('Änderungen gespeichert.');
				$this->redirect(array('action' => 'a_edit_u'));
			} else {
				$this->Session->setFlash('Änderungen konnten nicht gespeichert werden.');
			}
		}
	}
	
	public function a_edit_key(){
		$this->loadModel('Registrationkey');
		$key = $this->Registrationkey->find('first');
		$this->set('key', $key);	
		
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->Registrationkey->id = 1;
			if ($this->Registrationkey->save($this->request->data)) {
				$this->Session->setFlash('Zugangsschlüssel geändert.');
				$this->redirect(array('action' => 'a_edit_key'));
			} else {
				$this->Session->setFlash('Änderungen konnten nicht gespeichert werden.');
			}
		}
		
	}
}
	
?>