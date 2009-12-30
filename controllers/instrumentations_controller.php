<?php
class InstrumentationsController extends AppController {

	var $name = 'Instrumentations';
	var $helpers = array('Html', 'Javascript', 'Ajax', 'Form', 'Player');
  var $uses = array('Response');

  function autoComplete() {
    $responses = $this->Response->find('all', array(
      'order' => array('instrumentation' => 'asc'),
      'conditions' => array(
        'instrumentation LIKE' => $this->data['Response']['instrumentation'] .'%' ),
      'fields' => array('instrumentation')));
    $instrumentations = array();
    foreach( $responses as $response ) {
      if($response['Response']['instrumentation'] != '')
        $instrumentations[] = strtolower($response['Response']['instrumentation']);
    }

    $allInstrumentations = array_unique($instrumentations);
    $this->set('instrumentations', $allInstrumentations);
    $this->layout = 'ajax';
  }
}
