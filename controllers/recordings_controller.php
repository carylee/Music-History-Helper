<?php
class RecordingsController extends AppController {

	var $name = 'Recordings';
	var $scaffold;
  function beforeFilter() {
    $this->Auth->authorize = 'controller';
  }

  function isAuthorized() {
    return ($this->Session->read('Auth.User.id') == 17);
  }

}
?>
