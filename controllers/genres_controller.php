<?php
class GenresController extends AppController {

	var $name = 'Genres';
	var $helpers = array('Html', 'Javascript', 'Ajax', 'Form', 'Player');
  var $uses = array('Genre', 'Response');

  function autoComplete() {
    $responses = $this->Response->find('all', array(
      'order' => array('genre' => 'asc'),
      'conditions' => array(
        'genre LIKE' => $this->data['Response']['genre'] .'%' ),
      'fields' => array('genre')));
    $genresFromDb = $this->Genre->find('list', array(
      'order' => array('name' => 'asc'),
      'conditions' => array(
        'name LIKE' => $this->data['Response']['genre'] . '%' )));
      //'fields' => array('name')));
    $genresFromDb = array_map('strtolower', $genresFromDb);
    $genres = array();
    foreach( $responses as $response ) {
      if($response['Response']['genre'] != '')
        $genres[] = strtolower($response['Response']['genre']);
    }

    $allGenres = array_map('ucfirst', array_unique(array_merge($genres, $genresFromDb)));
    natcasesort($allGenres);
    $this->set('genres', $allGenres);
    $this->layout = 'ajax';
  }
}
