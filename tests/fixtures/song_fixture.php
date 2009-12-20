<?php 
/* SVN FILE: $Id$ */
/* Song Fixture generated on: 2009-12-20 13:07:43 : 1261336063*/

class SongFixture extends CakeTestFixture {
	var $name = 'Song';
	var $table = 'songs';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'title' => array('type'=>'string', 'null' => true, 'default' => NULL),
		'composer_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
		'genre_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
		'period_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'nawm' => array('type'=>'integer', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'title'  => 'Lorem ipsum dolor sit amet',
		'composer_id'  => 1,
		'genre_id'  => 1,
		'period_id'  => 1,
		'created'  => '2009-12-20 13:07:43',
		'modified'  => '2009-12-20 13:07:43',
		'nawm'  => 1
	));
}
?>