<?php
include_once("thumbnail.php");
// app/Controller/UsersController.php
class UsersController extends AppController {


	public function beforeFilter() {
        $this->Auth->allow('login','register','restore_password');
		
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
		$idSave = $id;
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
		
			$picOld = null;
			$picOld = $this->User->find('first', array('conditions' => array('User.id' => $idSave)));
			
			if (isset($this->request->data['file'])) {
		
				$files = array(0 => $this->request->data['file']);
				
				$filecheck = 1;
				
				
				if($files[0]['size'] <= 850000 && strpos($files[0]['type'],'image') !== false)
				{
					$datum = new DateTime();
					$timestamp = $datum->getTimestamp().rand(1000, 389234);
					
					$result = $this->uploadFiles('img/uploads', $files);
					
					$size = getimagesize($result['urls'][0]);
					$width  = $size[0];     // width as integer
					$height = $size[1];     // height as integer
					$type =   $size[2];		// $size[2] ist der Dateityp					
					
					if(($width/$height >= 0.95) && ($width/$height <= 1.05)){
						if($type == 1 || $type == 2 || $type == 3){
							if($type == 1) {								// gif = 1, jpg = 2, png =3
								if (($width > 160 && $height > 160)){
									unlink($result['urls'][0]);				// Löscht das hochgeladene Bild vom Server
									$result = null;							// so bleibt default als Userbild
									$filecheck = 0;	
								}else{
									copy($result['urls'][0],"img/uploads/".$timestamp.".gif");
									unlink($result['urls'][0]);
									$result['urls'][0] = "img/uploads/".$timestamp.".gif";
									
									if($picOld["User"]['pic'] != 'default.png'){
										unlink("img/".$picOld["User"]['pic']);
									}
								}
								

							}else{
								
								if ($type == 3){
									$input = imagecreatefrompng($result['urls'][0]);
									list($width, $height) = getimagesize($result['urls'][0]);
									$output = imagecreatetruecolor($width, $height);
									$white = imagecolorallocate($output,  255, 255, 255);
									imagefilledrectangle($output, 0, 0, $width, $height, $white);
									imagecopy($output, $input, 0, 0, 0, 0, $width, $height);
									$toDelete = $result['urls'][0];
									$result['urls'][0] = $result['urls'][0].".jpg";
									imagejpeg($output, $result['urls'][0]);
									unlink($toDelete);								//löscht das alte Bild
								}

								if($size > 150){
									$thumbnail = new thumbnail();
									$thumbnail->create($result['urls'][0]);
									$thumbnail->setQuality(100);
									$thumbnail->minSize(150);
									$thumbnail->save($result['urls'][0]);
								}
								
								copy($result['urls'][0],"img/uploads/".$timestamp.".jpg");
								unlink($result['urls'][0]);
								$result['urls'][0] = "img/uploads/".$timestamp.".jpg";
								
								if($picOld["User"]['pic'] != 'default.png'){
									unlink("img/".$picOld["User"]['pic']);
								}
								
								
							}
						}else{
							unlink($result['urls'][0]);				// Löscht das hochgeladene Bild vom Server
							$result = null;							// so bleibt default als Userbild
							$filecheck = 0;
						}
					}else{
						unlink($result['urls'][0]);				// Löscht das hochgeladene Bild vom Server
						$result = null;							// so bleibt default als Userbild
						$filecheck = 0;
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
				
				if ($filecheck == 0){
					$this->Session->setFlash(__('Bild falsch formatiert.'));
				}else{
					$this->Session->setFlash(__('Änderung gespeichert.'));
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

	public function restore_password(){

	if ($this->request->is('post') || $this->request->is('put')) {

			$Email = new CakeEmail('default');
				
			
			$Email->sender('pejujani@onlinehome.de', 'MyApp emailer');
			$Email->from(array('pejujani@onlinehome.de' => 'My Site'));
			$Email->to('jan46@onlinehome.de');
			$Email->subject('About');
			$Email->send('My message');
			$this->Session->setFlash('Mail gesendet');
			

			
			
		/*	$email = new CakeEmail('default');
		$email->from(array('dachsmensch@gmail.com' => __('Recruitment Job App')))
      ->to('jan46@onlinehome.de')
          ->subject(__('Recruitment Status Update'))
          ->send(__('Dear, ReynierPM this is a testing email'));*/
		  
		
		
		
	}
	
	
	
	}
	
	
	
}
	
?>