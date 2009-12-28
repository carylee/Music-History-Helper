<?php
class SongsController extends AppController {

	var $name = 'Songs';
	var $helpers = array('Html', 'Form', 'Player');
  var $uses = array('Song', 'Response');

	function index() {
		$this->Song->recursive = 0;
    $songs = $this->paginate();
		$this->set('songs', $songs);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Song.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('song', $this->Song->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Song->create();
			if ($this->Song->save($this->data)) {
				$this->Session->setFlash(__('The Song has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Song could not be saved. Please, try again.', true));
			}
		}
		$composers = $this->Song->Composer->find('list');
		$this->set(compact('composers'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Song', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Song->save($this->data)) {
				$this->Session->setFlash(__('The Song has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Song could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Song->read(null, $id);
		}
		$composers = $this->Song->Composer->find('list');
		$this->set(compact('composers'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Song', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Song->del($id)) {
			$this->Session->setFlash(__('Song deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
