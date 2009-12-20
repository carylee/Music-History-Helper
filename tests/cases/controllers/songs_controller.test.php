<?php 
/* SVN FILE: $Id$ */
/* SongsController Test cases generated on: 2009-12-20 13:12:14 : 1261336334*/
App::import('Controller', 'Songs');

class TestSongs extends SongsController {
	var $autoRender = false;
}

class SongsControllerTest extends CakeTestCase {
	var $Songs = null;

	function startTest() {
		$this->Songs = new TestSongs();
		$this->Songs->constructClasses();
	}

	function testSongsControllerInstance() {
		$this->assertTrue(is_a($this->Songs, 'SongsController'));
	}

	function endTest() {
		unset($this->Songs);
	}
}
?>