<?php 
/* SVN FILE: $Id$ */
/* User Test cases generated on: 2009-12-20 13:08:30 : 1261336110*/
App::import('Model', 'User');

class UserTestCase extends CakeTestCase {
	var $User = null;
	var $fixtures = array('app.user', 'app.response');

	function startTest() {
		$this->User =& ClassRegistry::init('User');
	}

	function testUserInstance() {
		$this->assertTrue(is_a($this->User, 'User'));
	}

	function testUserFind() {
		$this->User->recursive = -1;
		$results = $this->User->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('User' => array(
			'id'  => 1,
			'username'  => 'Lorem ipsum dolor sit amet',
			'password'  => 'Lorem ipsum dolor sit amet',
			'verified'  => 1,
			'created'  => '2009-12-20 13:08:30',
			'modified'  => '2009-12-20 13:08:30'
		));
		$this->assertEqual($results, $expected);
	}
}
?>