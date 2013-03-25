<?php

// app/Controller/UsersController.php
class UsersController extends AppController {


 public function beforeFilter() {
        $this->Auth->allow('login','register','index');
		
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
	 if ($this->request->is('post') || $this->request->is('put')) {
	 if (isset($this->request->data['Users']['file'])) {
	 $this->Session->setFlash(__('The user has been saved'));
     $result = $this->uploadFiles('img/uploads', $this->request->data['Users']);
    }
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
		
		if (isset($this->request->data['file'])) {
			$files = array(0 => $this->request->data['file']);
			$result = $this->uploadFiles('img/uploads', $files);
		}
		$this->User->pic = (string)$result['urls'][0];

		$data = $this->request->data['user']['pic'] = (string)$result['urls'][0];

		echo print_r($this->request->data);
		
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
              //  $this->redirect(array('controller' => 'entries', 'action' => 'index'));
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
	
	/**
 * uploads files to the server
 * @params:
 *    $folder  = the folder to upload the files e.g. 'img/files'
 *    $formdata   = the array containing the form files
 *    $itemId  = id of the item (optional) will create a new sub folder
 * @return:
 *    will return an array with the success of each file upload
 */
function uploadFiles($folder, $formdata, $itemId = null)
{
   // setup dir names absolute and relative
   $folder_url = WWW_ROOT.$folder;
   $rel_url = $folder;
    
   // create the folder if it does not exist
   if(!is_dir($folder_url)) {
      mkdir($folder_url);
   }
       
   // if itemId is set create an item folder
   if($itemId)
   {
      // set new absolute folder
      $folder_url = WWW_ROOT.$folder.'/'.$itemId;
      // set new relative folder
      $rel_url = $folder.'/'.$itemId;
      // create directory
      if(!is_dir($folder_url)) {
         mkdir($folder_url);
      }
   }
    
   // list of permitted file types, this is only images but documents can be added
   $permitted = array('image/gif','image/jpeg','image/pjpeg','image/png');
    
   // loop through and deal with the files
   foreach($formdata as $file)
   {
      // replace spaces with underscores
      $filename = str_replace(' ', '_', $file['name']);
      // assume filetype is false
      $typeOK = false;
      // check filetype is ok
      foreach($permitted as $type)
      {
         if($type == $file['type']) {
            $typeOK = true;
            break;
         }
      }
       
      // if file type ok upload the file
      if($typeOK) {
         // switch based on error code
         switch($file['error']) {
            case 0:
               // check filename already exists
               if(!file_exists($folder_url.'/'.$filename)) {
                  // create full filename
                  $full_url = $folder_url.'/'.$filename;
                  $url = $rel_url.'/'.$filename;
                  // upload the file
                  $success = move_uploaded_file($file['tmp_name'], $url);
               } else {
                  // create unique filename and upload file
                  ini_set('date.timezone', 'Europe/London');
                  $now = date('Y-m-d-His');
                  $full_url = $folder_url.'/'.$now.$filename;
                  $url = $rel_url.'/'.$now.$filename;
                  $success = move_uploaded_file($file['tmp_name'], $url);
               }
               // if upload was successful
               if($success) {
                  // save the url of the file
                  $result['urls'][] = $url;
               } else {
                  $result['errors'][] = "Error uploaded $filename. Please try again.";
               }
               break;
            case 3:
               // an error occured
               $result['errors'][] = "Error uploading $filename. Please try again.";
               break;
            default:
               // an error occured
               $result['errors'][] = "System error uploading $filename. Contact webmaster.";
               break;
         }
      } elseif($file['error'] == 4) {
         // no file was selected for upload
         $result['nofiles'][] = "No file Selected";
      } else {
         // unacceptable file type
         $result['errors'][] = "$filename cannot be uploaded. Acceptable file types: gif, jpg, png.";
      }
   }
return $result;
}
	
	

}
	
?>