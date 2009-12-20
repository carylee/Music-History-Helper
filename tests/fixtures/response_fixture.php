<?php 
/* SVN FILE: $Id$ */
/* Response Fixture generated on: 2009-12-20 13:06:22 : 1261335982*/

class ResponseFixture extends CakeTestFixture {
	var $name = 'Response';
	var $table = 'responses';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'user_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'song_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'genre_id' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'period_id' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'language_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
		'instrumentation' => array('type'=>'string', 'null' => true, 'default' => NULL),
		'texture' => array('type'=>'string', 'null' => true, 'default' => NULL),
		'notes' => array('type'=>'text', 'null' => true, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'genre_id' => array('column' => 'genre_id', 'unique' => 0), 'genre_id_2' => array('column' => 'genre_id', 'unique' => 0), 'song_id' => array('column' => 'song_id', 'unique' => 0), 'period_id' => array('column' => 'period_id', 'unique' => 0))
	);
	var $records = array(array(
		'id'  => 1,
		'user_id'  => 1,
		'song_id'  => 1,
		'genre_id'  => 1,
		'period_id'  => 1,
		'language_id'  => 1,
		'instrumentation'  => 'Lorem ipsum dolor sit amet',
		'texture'  => 'Lorem ipsum dolor sit amet',
		'notes'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'created'  => '2009-12-20 13:06:22',
		'modified'  => '2009-12-20 13:06:22'
	));
}
?>