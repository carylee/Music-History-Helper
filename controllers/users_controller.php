<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $helpers = array('Html', 'Form');
	var $components = array('Auth');
  var $uses = array('User', 'Song', 'Response');

  function beforeFilter() {
    $this->Auth->allow('add', 'login');

  }

  function login() {
    //$this->redirect(array('controller' => 'responses', 'action'=>'index'));
  }

  function logout() {
    $this->redirect($this->Auth->logout());
  }

  function add() {
    if( !empty($this->data)) {
      if ($this->data['User']['password'] == $this->Auth->password($this->data['User']['password_confirm'])) {
        $this->User->create();
        $this->User->save($this->data);

        $userId = $this->User->getLastInsertId(); // Get user id

        // Add all songs to user's responses (empty)
        $songs = $this->Song->find('list');
        foreach( $songs as $song_id => $song ) {
          $this->Response->create();
          $row = array(
            'user_id' => $userId,
            'song_id' => $song_id,
          );
          $this->Response->save($row);
        }
      }
    }
  }

	/*function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid User.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The User has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid User', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The User has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for User', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->del($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
  }*/

  function checkUsersOwnRecord($recordId = null) {
    if( $this->Auth->user('id') == $recordId ){
      return TRUE;
    } else {
      return FALSE;
    }
  }

}
?>
