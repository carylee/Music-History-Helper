<?php
class UsersController extends AppController {

	var $name = 'Users';
	//var $helpers = array('Html', 'Form');
  var $uses = array('User', 'Song', 'Response');
  var $components = array('Email', 'SwiftMailer');

  function beforeFilter() {
    $this->Auth->allow('pay', 'register', 'login', 'feedback', 'requestAccount', 'unlock');
    $this->Auth->authorize = 'controller';
   // $this->Auth->loginAction = array('controller'=>'users', 'action'=>'login');
    $this->Auth->autoRedirect = true;
    //$this->Auth->loginRedirect = array('controller'=>'responses', 'action'=>'index');
    $this->Auth->loginRedirect = '/users/login';
    $this->Auth->authError = 'You must be logged in to do that.';
    //$this->Auth->logoutRedirect = array('controller'=>'users', 'action'=>'');
  }

  function isAuthorized() {
    if(is_numeric($this->Auth->user('id'))) {
      if($this->Auth->user('id') == ADMIN_ID) {
        return true;
      } 
    }
    else
      return false;
  }

  function isVerified() {
    $userid = $this->Auth->user('id');
    $verified = $this->User->find('first', array(
      'conditions' => array('User.id' => $userid),
      'fields' => array('User.verified'))
    );
    //pr($verified);
    return $verified['User']['verified'];
  }

  function login( $email='' ) {
    $this->set('email', $email );
    //$this->layout = 'anonymous';
    //$this->redirect(array('controller' => 'responses', 'action'=>'index'));
  }

  function logout() {
    $this->redirect($this->Auth->logout());
  }

  function register( $op='try') {
    //echo $op;
    $this->set('op', $op );
    $this->layout = 'anonymous';
    if( !empty($this->data)) {
      $this->User->set( $this->data );

      if( $this->User->validates() ) {

        $userId = $this->_add($this->data);
        $this->_mail(ADMIN_EMAIL, 'users@caryme.com', 'New User', 
          'New User Registration', 'A new user registered. Go check it out');

        if( $this->data['User']['account'] == 'buy' ) {
        //if( $op == 'buy' ) {
          $this->redirect(array('controller'=>'users', 'action'=>'pay', $userId));
        }

        else {
          // Add all songs to user's responses (empty)
          $this->_giveUserSongs( $userId, QUARTER, true );
          $this->flash("Thanks for registering! You will be redirected to the login page.", array('controller'=>'users', 'action'=>'login', $this->data['User']['username']), '4');
        }
      }
    }
  }

  function pay( $userId ) {
    $user = $this->User->findById($userId);
  }
  
  function _emailExists( $email ) {
    return $this->User->find('count', array('conditions'=> array('User.username'=>$email)));
  }

    

  function _add( $data ) {
    $this->User->create();
    $this->User->save($data);
    $userId = $this->User->getLastInsertId(); // Get user id
    return $userId;
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
          //pr($this->data);
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

  function unlock($id = null ){
    $jpeg_data = file_get_contents('php://input');
    if(!empty($this->data) ) {
      if(!empty($this->data['User']['file']['tmp_name'])) {
        //$dest_dir = '/Users/cary/Sites/cakephp/app/webroot/files/';
        $dest_dir = '/home/carylee/webapps/cakephp/app/webroot/scripts/images/';
        $tmpname = $this->data['User']['file']['tmp_name'];
        $allowedExtensions = array('jpeg', 'jpg');
        $newname = date('YmdHis') . '.jpg';
        $dest_name = $dest_dir . $newname;
        if(move_uploaded_file($tmpname, $dest_name))
          echo "Moved file.";
        else
          echo "Didn't move file.";
      }
      //logic
      if(empty($newname))
        $url = $this->data['User']['imageUrl'];
      else
        $url = 'http://musichistory.caryme.com/scripts/images/' . $newname;
      $subject = 'Salute from ' . $this->Auth->user('name');
      $this->_mail(
        ADMIN_EMAIL,
        $this->Auth->user('username'),
        $this->Auth->user('name'),
        $subject,
        '',
        'salute',
        array('name'=>$this->Auth->user('name'),
          'email'=>$this->Auth->user('username'),
          'image'=>$url,
          'id'=>$this->Auth->user('id'),
        )
      );

    }
    else {
      //$this->set('email', $this->Auth->user('username'));
      //$this->set('name', $this->Auth->user('name'));
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
      /*$this->Email->from = $this->data['User']['name'] . ' <' . $this->data['User']['email'] . '>';
      $this->Email->to = 'Cary Lee <' . ADMIN_EMAIL . '>';
      $this->Email->subject = 'Music History Feedback';
      $this->Email->delivery = 'smtp';
      $this->Email->smtpOptions = array(
        'port'=>'465',
        'timeout'=>'30',
        'host'=>'ssl://smtp.gmail.com',
        'username'=>'web@caryme.com',
        'password'=>'Cqv7wG>djVhc'
      );
      $this->Email->delivery = 'debug';
      pr($this->Session->read('Message.email'));
      $this->Email->send( $this->data['User']['feedback'] );
      pr($this->Email->smtpError);*/
      $this->_mail(ADMIN_EMAIL, $this->data['User']['email'],
        $this->data['User']['name'],
        "Feedback",
        $this->data['User']['feedback']);
      $this->redirect($this->referer(), null, true);
    }
    //pr($this->Auth->user());
    $this->set('email', $this->Auth->user('username'));
    $this->set('name', $this->Auth->user('name'));
  }

  function requestAccount() {
    $this->layout = 'anonymous';
    if( !empty($this->data) ) {
      debug($this->data);
      $this->_mail(
        ADMIN_EMAIL,
        $this->data['User']['email'],
        $this->data['User']['name'],
        'Music History Account Request',
        "Account requested for " . $this->data['User']['name'] 
      );
    }
  }

  function _mail($to, $from, $fromName, $subject, $body, $template='default', $args=NULL) {
    $this->SwiftMailer->smtpType = 'tls';
    $this->SwiftMailer->smtpHost = 'smtp.gmail.com';
    $this->SwiftMailer->smtpPort = 465;
    $this->SwiftMailer->smtpUsername = 'web@caryme.com';
    $this->SwiftMailer->smtpPassword = 'Cqv7wG>djVhc';
    $this->SwiftMailer->sendAs = 'html';
    $this->SwiftMailer->from = $from;
    $this->SwiftMailer->replyTo = $from;
    $this->SwiftMailer->fromName = $fromName;
    $this->SwiftMailer->to = $to;
    $this->set('message', $body );

    if(!empty($args)) {
      foreach( $args as $key=>$value ) {
        $this->set($key, $value );
      }
    }

    try {
      if(!$this->SwiftMailer->send($template, $subject)) {
        $this->log("Error sending email");
      }
    }
    catch(Exception $e) {
      $this->log("Failed to send email: ".$e->getMessage());
    }
  }


}
?>
