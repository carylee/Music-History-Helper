<?php
class TexturesController extends AppController {

	var $name = 'Textures';
	var $helpers = array('Html', 'Javascript', 'Ajax', 'Form', 'Player');
  var $uses = array('Response');

  function autoComplete() {
    $responses = $this->Response->find('all', array(
      'order' => array('texture' => 'asc'),
      'conditions' => array(
        'texture LIKE' => $this->data['Response']['texture'] .'%' ),
      'fields' => array('texture')));
    $textures = array();
    foreach( $responses as $response ) {
      if($response['Response']['texture'] != '')
        $textures[] = ucfirst(strtolower($response['Response']['texture']));
    }

    $allTextures = array_unique($textures);
    $this->set('textures', $allTextures);
    $this->layout = 'ajax';
  }
}
