<?php
class UsersController extends AppController {

	var $name = 'Users';
	//var $helpers = array('Html', 'Form');
  var $uses = array('User', 'Song', 'Response');
  var $components = array('Email');

  function beforeFilter() {
    $this->Auth->allow('add', 'login', 'feedback');
    $this->Auth->authorize = 'controller';
    //$this->Auth->loginAction = array('controller'=>'users', 'action'=>'login');
    $this->Auth->loginRedirect = array('controller'=>'responses', 'action'=>'index');
    //$this->Auth->logoutRedirect = array('controller'=>'users', 'action'=>'login');
  }

  function isAuthorized() {
    if($this->Auth->user('id') == 17) {
      return true;
    } 
    else
      return false;
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
        $this->_giveUserSongs( $userId, QUARTER, true );
     }
    }
  }

  function _giveUserSongs( $userId, $quarter=QUARTER, $sample=false ) {
    // Conditions for first find
    $conditions = array('Song.quarter'=>$quarter);
    if( $sample ) {
      $conditions['Song.sample'] = 1;
    }
    $songs = $this->Song->find('list', array('conditions'=>$conditions));
    foreach( $songs as $song_id => $song ) {
      if( $this->Response->find('count', array('conditions'=>array(
        'Response.song_id'=>$song_id,
        'Response.user_id'=>$userId))) == 0 ) 
      {
        $this->Response->create();
        $row = array(
          'user_id' => $userId,
          'song_id' => $song_id,
        );
        $this->Response->save($row);
      }
    }
  }
  
  function grantSongs( $userId ) {
    if(!empty($this->data)) {
      $this->_giveUserSongs( $this->data['user_id'], $this->data['quarter'], false);
      $this->redirect(array('action'=>'index'));
    }
    $this->set('userId', $userId);
  }

  function changePassword() {
    $user = $this->User->findById( $this->Auth->user('id'));
    //pr($user);
    if( !empty($this->data)) {
      $this->data['User']['password'] = $this->Auth->password($this->data['User']['password']);
      if ($this->Auth->password($this->data['User']['old_password']) == $user['User']['password']) {
        if( $this->Auth->password($this->data['User']['confirm_password']) == 
            $this->data['User']['password']) {
          pr($this->data);
          $this->User->save($this->data);
        } else {
          echo 'Password don\'t match';
        }
      } else {
        echo 'Old password incorrect';
      }
    }
    $this->set('user', $user);
  }

	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}


	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid User.', true));
			$this->redirect(array('action'=>'index'));
		} else
      $this->set('user', $this->User->read(null, $id));
	}

	/*function add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The User has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
			}
		}
  }*/

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
  }

  function checkUsersOwnRecord($recordId = null) {
    if( $this->Auth->user('id') == $recordId ){
      return TRUE;
    } else {
      return FALSE;
    }
  }

  function feedback() {
    if( !empty($this->data) ) {
      //debug($this->data);
      $this->Email->from = $this->data['User']['name'] . ' <' . $this->data['User']['email'] . '>';
      $this->Email->to = ADMIN_EMAIL;
      $this->Email->subject = 'Music History Feedback';
      //$this->Email->delivery = 'debug';
      $this->Email->send( $this->data['User']['feedback'] );
    }
    $this->set('email', $this->Auth->user('username'));
  }

}
?>
