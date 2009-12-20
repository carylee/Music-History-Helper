<?php 
/* SVN FILE: $Id$ */
/* Composer Test cases generated on: 2009-12-20 12:59:14 : 1261335554*/
App::import('Model', 'Composer');

class ComposerTestCase extends CakeTestCase {
	var $Composer = null;
	var $fixtures = array('app.composer', 'app.song');

	function startTest() {
		$this->Composer =& ClassRegistry::init('Composer');
	}

	function testComposerInstance() {
		$this->assertTrue(is_a($this->Composer, 'Composer'));
	}

	function testComposerFind() {
		$this->Composer->recursive = -1;
		$results = $this->Composer->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Composer' => array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>