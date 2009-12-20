<?php 
/* SVN FILE: $Id$ */
/* Recording Fixture generated on: 2009-12-20 13:05:34 : 1261335934*/

class RecordingFixture extends CakeTestFixture {
	var $name = 'Recording';
	var $table = 'recordings';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'url' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'song_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
		'weight' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 5),
		'cd' => array('type'=>'integer', 'null' => true, 'default' => NULL),
		'track' => array('type'=>'integer', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'url'  => 'Lorem ipsum dolor sit amet',
		'song_id'  => 1,
		'weight'  => 1,
		'cd'  => 1,
		'track'  => 1
	));
}
?>