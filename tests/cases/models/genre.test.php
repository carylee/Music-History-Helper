<?php 
/* SVN FILE: $Id$ */
/* Genre Test cases generated on: 2009-12-20 13:02:28 : 1261335748*/
App::import('Model', 'Genre');

class GenreTestCase extends CakeTestCase {
	var $Genre = null;
	var $fixtures = array('app.genre', 'app.response');

	function startTest() {
		$this->Genre =& ClassRegistry::init('Genre');
	}

	function testGenreInstance() {
		$this->assertTrue(is_a($this->Genre, 'Genre'));
	}

	function testGenreFind() {
		$this->Genre->recursive = -1;
		$results = $this->Genre->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Genre' => array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'definition'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created'  => '2009-12-20 13:02:27',
			'modified'  => '2009-12-20 13:02:27'
		));
		$this->assertEqual($results, $expected);
	}
}
?>