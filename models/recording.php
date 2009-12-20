<?php
class Recording extends AppModel {

	var $name = 'Recording';
	var $validate = array(
		'url' => array('notempty'),
		'weight' => array('numeric'),
		'cd' => array('numeric'),
		'track' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Song' => array(
			'className' => 'Song',
			'foreignKey' => 'song_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>