<?php 
/* SVN FILE: $Id$ */
/* ResponsesController Test cases generated on: 2009-12-20 13:30:06 : 1261337406*/
App::import('Controller', 'Responses');

class TestResponses extends ResponsesController {
	var $autoRender = false;
}

class ResponsesControllerTest extends CakeTestCase {
	var $Responses = null;

	function startTest() {
		$this->Responses = new TestResponses();
		$this->Responses->constructClasses();
	}

	function testResponsesControllerInstance() {
		$this->assertTrue(is_a($this->Responses, 'ResponsesController'));
	}

	function endTest() {
		unset($this->Responses);
	}
}
?>