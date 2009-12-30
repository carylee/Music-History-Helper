<?php
class Song extends AppModel {

	var $name = 'Song';
	var $validate = array(
		'title' => array('notempty'),
		'nawm' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Recording' => array(
			'className' => 'Recording',
			'foreignKey' => 'song_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Response' => array(
			'className' => 'Response',
			'foreignKey' => 'song_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
?>
