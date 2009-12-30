<?php
class Response extends AppModel {

	var $name = 'Response';
	var $validate = array(
		'user_id' => array('numeric'),
		'song_id' => array('numeric'),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Song' => array(
			'className' => 'Song',
			'foreignKey' => 'song_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

 /* function beforeFind( $queryData ) {
    echo $session->read('Auth.User.id');
    pr( $this->Auth->user() );
    $queryData['conditions'] = array('User.id' => 1);
    pr($queryData);
 }*/

}
?>
