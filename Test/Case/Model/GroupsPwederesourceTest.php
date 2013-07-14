<?php
App::uses('GroupsPwederesource', 'Pwede.Model');

/**
 * GroupsPwederesource Test Case
 *
 */
class GroupsPwederesourceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.pwede.groups_pwederesource',
		'plugin.pwede.group',
		'plugin.pwede.pwederesources'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->GroupsPwederesource = ClassRegistry::init('Pwede.GroupsPwederesource');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GroupsPwederesource);

		parent::tearDown();
	}

}
