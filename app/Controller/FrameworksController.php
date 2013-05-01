<?php

include_once("thumbnail.php");

class FrameworksController extends AppController {

	public function beforeFilter() {
		if($this->Auth->loggedIn()){
			$this->Auth->allow('index', 'view','add');
		}	
    }

    public function index() {
         $this->set('frameworks', $this->Framework->find('all'));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

		$framework = $this->Framework->findById($id);
		$this->set('framework', $framework);
    }
	
	public function add() {

    if ($this->request->is('post')) {
	
	if (isset($this->request->data['file'])) {
	
			$files = array(0 => $this->request->data['file']);
			
			if($files[0]['size'] <= 3500000 && strpos($files[0]['type'],'image') !== false)
			{

				$result = $this->uploadFiles('img/frameworks', $files);
				
				echo $result['urls'][0];
				
				$thumbnail = new thumbnail();
				$thumbnail->create($result['urls'][0]);
				$thumbnail->setQuality(100);
				$thumbnail->minSize(150);
				$thumbnail->save($result['urls'][0]);
		
			}
			else
			{
				$this->Session->setFlash(__('Falsche Bildgröße / Falscher Dateityp.'));
			}
		}
		
	if($result != null){
			$data = $this->request->data['Framework']['pic'] = substr($result['urls'][0],4);
		}
	
        $this->request->data['Framework']['user_id'] = $this->Auth->user('id'); //Added this line
        if ($this->Framework->save($this->request->data)) {
            $this->Session->setFlash('Der Eintrag wurde gespeichert.');
            $this->redirect(array('action' => 'a_edit_frameworks'));
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
            $this->Session->setFlash('Änderungen wurden gespeichert.');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('Änderungen konnten nicht gespeichert werden.');
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

	$framework = $this->Framework->find('first', array('conditions' => array('Framework.id' => $id)));
	
   if ($this->Framework->delete($id)) {
        $this->Session->setFlash('Framework mit id: ' . $id . ' wurde gelöscht.');
		
		$file = new File(WWW_ROOT.'img/'.$framework['Framework']['pic']);
		$file->delete();
        
    }else{
		 $this->Session->setFlash('ID: '.$id.' Page: '.$page);
	} 

	$this->redirect(array('action' => $page));
}

public function isAuthorized($user) {

    // Only admin can edit Frameworks
    if (in_array($this->action, array('edit', 'delete'))) {
        if ($user['role'] == "admin") {
            return true;
        }
    }

    return parent::isAuthorized($user);
	

}

	//ab hier martins kram
	public function a_edit_frameworks() {
		//$this->set('frameworks', $this->paginate());
		$allFrameworks = $this->Framework->find('all');
		$this->set('frameworks', $allFrameworks);
	}


}

?>