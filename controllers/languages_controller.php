<?php
class LanguagesController extends AppController {

	var $name = 'Languages';
	var $helpers = array('Html', 'Javascript', 'Ajax', 'Form', 'Player');
  var $uses = array('Language', 'Response');

  function autoComplete() {
    $responses = $this->Response->find('all', array(
      'order' => array('language' => 'asc'),
      'conditions' => array(
        'language LIKE' => $this->data['Response']['language'] .'%' ),
      'fields' => array('language')));
    $languagesFromDb = $this->Language->find('list', array(
      'order' => array('name' => 'asc'),
      'conditions' => array(
        'name LIKE' => $this->data['Response']['language'] . '%' )));
      //'fields' => array('name')));
    $languagesFromDb = array_map('strtolower', $languagesFromDb);
    $languages = array();
    foreach( $responses as $response ) {
      if($response['Response']['language'] != '')
        $languages[] = strtolower($response['Response']['language']);
    }

    $allLanguages = array_map('ucfirst', array_unique(array_merge($languages, $languagesFromDb)));
    natcasesort($allLanguages);
    $this->set('languages', $allLanguages);
    $this->layout = 'ajax';
  }
}
