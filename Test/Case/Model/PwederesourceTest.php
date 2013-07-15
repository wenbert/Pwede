<?php
App::uses('Pwederesource', 'Pwede.Model');

/**
 * Pwederesource Test Case
 *
 */
class PwederesourceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.pwede.pwederesource',
		'plugin.pwede.group',
		'plugin.pwede.groups_pwederesource'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Pwederesource = ClassRegistry::init('Pwede.Pwederesource');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pwederesource);

		parent::tearDown();
	}

}
