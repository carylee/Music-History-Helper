<?php 
/* SVN FILE: $Id$ */
/* Language Fixture generated on: 2009-12-20 13:01:27 : 1261335687*/

class LanguageFixture extends CakeTestFixture {
	var $name = 'Language';
	var $table = 'languages';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 40),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('id' => array('column' => 'id', 'unique' => 0))
	);
	var $records = array(array(
		'id'  => 1,
		'name'  => 'Lorem ipsum dolor sit amet',
		'created'  => '2009-12-20 13:01:27',
		'modified'  => '2009-12-20 13:01:27'
	));
}
?>