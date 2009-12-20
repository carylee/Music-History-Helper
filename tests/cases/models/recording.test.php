<?php 
/* SVN FILE: $Id$ */
/* Recording Test cases generated on: 2009-12-20 13:05:34 : 1261335934*/
App::import('Model', 'Recording');

class RecordingTestCase extends CakeTestCase {
	var $Recording = null;
	var $fixtures = array('app.recording', 'app.song');

	function startTest() {
		$this->Recording =& ClassRegistry::init('Recording');
	}

	function testRecordingInstance() {
		$this->assertTrue(is_a($this->Recording, 'Recording'));
	}

	function testRecordingFind() {
		$this->Recording->recursive = -1;
		$results = $this->Recording->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Recording' => array(
			'id'  => 1,
			'url'  => 'Lorem ipsum dolor sit amet',
			'song_id'  => 1,
			'weight'  => 1,
			'cd'  => 1,
			'track'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>