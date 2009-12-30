<?php
class PeriodsController extends AppController {

	var $name = 'Periods';
	var $helpers = array('Html', 'Javascript', 'Ajax', 'Form', 'Player');
  var $uses = array('Period', 'Response');

  function autoComplete() {
    $responses = $this->Response->find('all', array(
      'order' => array('period' => 'asc'),
      'conditions' => array(
        'period LIKE' => $this->data['Response']['period'] .'%' ),
      'fields' => array('period')));
    $periodsFromDb = $this->Period->find('list', array(
      'order' => array('name' => 'asc'),
      'conditions' => array(
        'name LIKE' => $this->data['Response']['period'] . '%' )));
      //'fields' => array('name')));
    $periodsFromDb = array_map('strtolower', $periodsFromDb);
    $periods = array();
    foreach( $responses as $response ) {
      if($response['Response']['period'] != '')
        $periods[] = strtolower($response['Response']['period']);
    }

    $allPeriods = array_map('ucfirst', array_unique(array_merge($periods, $periodsFromDb)));
    natcasesort($allPeriods);
    $this->set('periods', $allPeriods);
    $this->layout = 'ajax';
  }
}
