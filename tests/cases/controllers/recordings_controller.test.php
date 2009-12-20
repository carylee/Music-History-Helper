<?php 
/* SVN FILE: $Id$ */
/* RecordingsController Test cases generated on: 2009-12-20 13:14:55 : 1261336495*/
App::import('Controller', 'Recordings');

class TestRecordings extends RecordingsController {
	var $autoRender = false;
}

class RecordingsControllerTest extends CakeTestCase {
	var $Recordings = null;

	function startTest() {
		$this->Recordings = new TestRecordings();
		$this->Recordings->constructClasses();
	}

	function testRecordingsControllerInstance() {
		$this->assertTrue(is_a($this->Recordings, 'RecordingsController'));
	}

	function endTest() {
		unset($this->Recordings);
	}
}
?>