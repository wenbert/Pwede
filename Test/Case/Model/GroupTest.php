<?php
App::uses('Group', 'Pwede.Model');

/**
 * Group Test Case
 *
 */
class GroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.pwede.group',
		'plugin.pwede.user',
		'plugin.pwede.pwederesource',
		'plugin.pwede.groups_pwederesource'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Group = ClassRegistry::init('Pwede.Group');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Group);

		parent::tearDown();
	}

}
