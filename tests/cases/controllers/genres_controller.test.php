<?php 
/* SVN FILE: $Id$ */
/* GenresController Test cases generated on: 2009-12-20 13:12:49 : 1261336369*/
App::import('Controller', 'Genres');

class TestGenres extends GenresController {
	var $autoRender = false;
}

class GenresControllerTest extends CakeTestCase {
	var $Genres = null;

	function startTest() {
		$this->Genres = new TestGenres();
		$this->Genres->constructClasses();
	}

	function testGenresControllerInstance() {
		$this->assertTrue(is_a($this->Genres, 'GenresController'));
	}

	function endTest() {
		unset($this->Genres);
	}
}
?>