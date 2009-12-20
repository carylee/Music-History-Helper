<?php 
/* SVN FILE: $Id$ */
/* Composer Fixture generated on: 2009-12-20 12:59:13 : 1261335553*/

class ComposerFixture extends CakeTestFixture {
	var $name = 'Composer';
	var $table = 'composers';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'name'  => 'Lorem ipsum dolor sit amet'
	));
}
?>