<?php
class Composer extends AppModel {

	var $name = 'Composer';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Song' => array(
			'className' => 'Song',
			'foreignKey' => 'composer_id',
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