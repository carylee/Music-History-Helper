<?php
class User extends AppModel {

	var $name = 'User';
	var $validate = array(
		'username' => array('email'),
		'password' => array('between'),
		'verified' => array('boolean')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Response' => array(
			'className' => 'Response',
			'foreignKey' => 'user_id',
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