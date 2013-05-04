<?php

include_once("thumbnail.php");

class FrameworksController extends AppController {

	public function beforeFilter() {
		if($this->Auth->loggedIn()){
			$this->Auth->allow('index', 'view','add');
		}	
    }

    public function index() {
	
		$frameworks = $this->Framework->find('all');
		$this->loadModel('Entry');
	
		foreach ($frameworks as &$framework) {
		
		$entry = $this->Entry->find("all", array(
				"fields"     => array("AVG(rtotal) AS total"),
				'conditions' => array('Entry.framework_id = '.$framework['Framework']['id']
		)));
		
		$values[] = array('framework' => $framework, 'total' => $entry[0][0]);
		
		}
        $this->set('frameworks', $values);
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

				$size = getimagesize($result['urls'][0]);
				$width  = $size[0];     // width as integer
				$height = $size[1];     // height as integer
				$type =   $size[2];
										// $size[2] ist der Dateityp
				
				if($type == 1) {								// Gif ist Typ 1
				
					unlink($result['urls'][0]);				// Löscht das hochgeladene Bild vom Server
					$result = null;							// so bleibt default als Userbild
					
				}else{
				
					$image = imagecreatefrompng($result['urls'][0]);
					imagejpeg($image, $result['urls'][0], 100);
					imagedestroy($image);					

					if($size > 150){
						$thumbnail = new thumbnail();
						$thumbnail->create($result['urls'][0]);
						$thumbnail->setQuality(100);
						$thumbnail->maxSize(150);
						$thumbnail->save($result['urls'][0]);
					}
				}
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
		if ($result != null){
			if ($this->Framework->save($this->request->data)) {
				$this->Session->setFlash('Der Eintrag wurde gespeichert.');
				$this->redirect(array('action' => 'a_edit_frameworks'));
			}
		}else{
			$this->Session->setFlash('Falsches Bildformat.');
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