<?php 
/* SVN FILE: $Id$ */
/* Response Test cases generated on: 2009-12-20 13:06:23 : 1261335983*/
App::import('Model', 'Response');

class ResponseTestCase extends CakeTestCase {
	var $Response = null;
	var $fixtures = array('app.response', 'app.user', 'app.song', 'app.genre', 'app.period', 'app.language');

	function startTest() {
		$this->Response =& ClassRegistry::init('Response');
	}

	function testResponseInstance() {
		$this->assertTrue(is_a($this->Response, 'Response'));
	}

	function testResponseFind() {
		$this->Response->recursive = -1;
		$results = $this->Response->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Response' => array(
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
		$this->assertEqual($results, $expected);
	}
}
?>