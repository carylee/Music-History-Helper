<?php
class ResponsesController extends AppController {
	var $name = 'Responses';
	var $helpers = array('Html', 'Form', 'Javascript', 'Player');

	function index() {
		$this->Response->recursive = 0;
    $info = $this->paginate();
    $this->attachMp3Lists( $info );
    $info = $this->filterByCurrentUser( $info );
		$this->set('responses', $info);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Response.', true));
			$this->redirect(array('action'=>'index'));
		}
    $this->attachMp3Lists( $info );
    $info = $this->Response->read(null, $id);
    $this->attachMp3Lists( $info );
		$this->set('response', $info );
	}

	function add() {
		if (!empty($this->data)) {
			$this->Response->create();
			if ($this->Response->save($this->data)) {
				$this->Session->setFlash(__('The Response has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Response could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Response->User->find('list');
		$songs = $this->Response->Song->find('list');
		$genres = $this->Response->Genre->find('list');
		$periods = $this->Response->Period->find('list');
		$languages = $this->Response->Language->find('list');
		$this->set(compact('users', 'songs', 'genres', 'periods', 'languages'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Response', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Response->save($this->data)) {
				$this->Session->setFlash(__('The Response has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Response could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Response->read(null, $id);
		}
		$users = $this->Response->User->find('list');
		$songs = $this->Response->Song->find('list');
		$genres = $this->Response->Genre->find('list');
		$periods = $this->Response->Period->find('list');
		$languages = $this->Response->Language->find('list');
		$this->set(compact('users','songs','genres','periods','languages'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Response', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Response->del($id)) {
			$this->Session->setFlash(__('Response deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

  function beforeFilter() {
    //pr( $this->Session->read('Auth') );
    //$this->params['user'] = $this->Session->read('Auth.User') ;
    //pr( $this->params );
    //pr( $this->Response );
  }

  function filterByCurrentUser( $responses ) {
    // This is probably inefficient, but I haven't figured out a better way yet
    $returnArray = array();
    foreach( $responses as $key=>$response ) {
      if( $response['Response']['user_id'] 
        == $this->Session->read('Auth.User.id') ) {
          $returnArray[] = $response;
        }
    }
    return $returnArray;
  }

  function attachMp3Lists( &$responses ) {
    $returnArray = array();
    foreach( $responses as $key=>&$response ) {
      /*$recordings = $this->Response->Song->Recording->findAllBySongId( $response['Song']['id'] );
      $urls = array();
      foreach( $recordings as $recording ) {
        $urls[] = $recording['Recording']['url'];
      }
      //$responses[$key]['Song']['mp3list'] = implode(",", $urls);
      $response['Song']['mp3list'] = implode(",", $urls);*/
      $this->attachMp3List( $response );
    }
  }

  function attachMp3List( &$response ) {
    $recordings = $this->Response->Song->Recording->findAllBySongId( $response['Song']['id'] );
    $urls = array();
    foreach( $recordings as $recording ) {
      $urls[] = $recording['Recording']['url'];
    }
    $response['Song']['mp3list'] =  implode(",", $urls);
  }
}
?>
