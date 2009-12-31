<?php
class AppController extends Controller {
  var $helpers = array('Form', 'Html', 'Javascript', 'Time');
  var $components = array('Auth');

  function beforeFilter(){
    $this->Auth->authorize = 'controller';
    $this->Auth->loginAction = array('controller'=>'users', 'action'=>'login');
    $this->Auth->loginRedirect = array('controller'=>'responses', 'action'=>'index');
    $this->Auth->logoutRedirect = array('controller'=>'users', 'action'=>'login');

    //if( !isAuthorized() ){
      //$this->redirect->(

  }

  function isAuthorized() {
    //return $this->Session->read('Auth.User.id');
    return true;
  }
}
?>
