<?php 
/* SVN FILE: $Id$ */
/* ComposersController Test cases generated on: 2009-12-20 13:12:39 : 1261336359*/
App::import('Controller', 'Composers');

class TestComposers extends ComposersController {
	var $autoRender = false;
}

class ComposersControllerTest extends CakeTestCase {
	var $Composers = null;

	function startTest() {
		$this->Composers = new TestComposers();
		$this->Composers->constructClasses();
	}

	function testComposersControllerInstance() {
		$this->assertTrue(is_a($this->Composers, 'ComposersController'));
	}

	function endTest() {
		unset($this->Composers);
	}
}
?>