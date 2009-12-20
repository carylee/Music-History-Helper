<?php 
/* SVN FILE: $Id$ */
/* Period Test cases generated on: 2009-12-20 13:04:41 : 1261335881*/
App::import('Model', 'Period');

class PeriodTestCase extends CakeTestCase {
	var $Period = null;
	var $fixtures = array('app.period', 'app.response');

	function startTest() {
		$this->Period =& ClassRegistry::init('Period');
	}

	function testPeriodInstance() {
		$this->assertTrue(is_a($this->Period, 'Period'));
	}

	function testPeriodFind() {
		$this->Period->recursive = -1;
		$results = $this->Period->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Period' => array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created'  => '2009-12-20 13:04:41',
			'modified'  => '2009-12-20 13:04:41'
		));
		$this->assertEqual($results, $expected);
	}
}
?>