<?php
class functionsController extends AppController {

	var $name = 'functions';
	var $helpers = array('Html', 'Javascript', 'Ajax', 'Form', 'Player');
  var $uses = array('Response');

  function autoComplete() {
    $responses = $this->Response->find('all', array(
      'order' => array('function' => 'asc'),
      'conditions' => array(
        'function LIKE' => $this->data['Response']['function'] .'%' ),
      'fields' => array('function')));
    $functions = array();
    foreach( $responses as $response ) {
      if($response['Response']['function'] != '')
        $functions[] = ucfirst(strtolower($response['Response']['function']));
    }

    $allfunctions = array_unique($functions);
    $this->set('functions', $allfunctions);
    $this->layout = 'ajax';
  }
}
