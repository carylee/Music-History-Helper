<?php 
/* SVN FILE: $Id$ */
/* Song Test cases generated on: 2009-12-20 13:07:43 : 1261336063*/
App::import('Model', 'Song');

class SongTestCase extends CakeTestCase {
	var $Song = null;
	var $fixtures = array('app.song', 'app.composer', 'app.recording', 'app.response');

	function startTest() {
		$this->Song =& ClassRegistry::init('Song');
	}

	function testSongInstance() {
		$this->assertTrue(is_a($this->Song, 'Song'));
	}

	function testSongFind() {
		$this->Song->recursive = -1;
		$results = $this->Song->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Song' => array(
			'id'  => 1,
			'title'  => 'Lorem ipsum dolor sit amet',
			'composer_id'  => 1,
			'genre_id'  => 1,
			'period_id'  => 1,
			'created'  => '2009-12-20 13:07:43',
			'modified'  => '2009-12-20 13:07:43',
			'nawm'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>