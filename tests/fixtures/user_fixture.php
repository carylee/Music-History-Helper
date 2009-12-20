<?php 
/* SVN FILE: $Id$ */
/* User Fixture generated on: 2009-12-20 13:08:30 : 1261336110*/

class UserFixture extends CakeTestFixture {
	var $name = 'User';
	var $table = 'users';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'username' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 50),
		'password' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'verified' => array('type'=>'boolean', 'null' => false, 'default' => '0'),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'username'  => 'Lorem ipsum dolor sit amet',
		'password'  => 'Lorem ipsum dolor sit amet',
		'verified'  => 1,
		'created'  => '2009-12-20 13:08:30',
		'modified'  => '2009-12-20 13:08:30'
	));
}
?>