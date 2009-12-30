<?php
class GenresController extends AppController {

	var $name = 'Genres';
	var $helpers = array('Html', 'Javascript', 'Ajax', 'Form', 'Player');
  var $uses = array('Response');

  function autoComplete() {
    $genres = $this->Response->find('all', array(
      'fields' => array('genre')));
    $this->set('genres', $genres);
    $this->layout = 'ajax';
  }
}
