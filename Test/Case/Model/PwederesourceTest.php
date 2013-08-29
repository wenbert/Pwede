<?php
App::uses('Pwederesource', 'Pwede.Model');
App::uses('AuthComponent', 'Controller/Component');
App::uses('CakeSession', 'Model/Datasource');

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
        CakeSession::delete('Auth.User');
    }

    public function testIfPwedeIsDetectingSuperAdminCorrectly() {
        $group_id = 1;
        $group_name = 'superadmin';
        CakeSession::write('Auth.User', 
            array(
                'Group'=> array(
                    array('name' => $group_name)
                )
        ));
        $result = $this->Pwederesource->findById($group_id);
        $this->assertTrue(is_array($result['Pwederesource']));
        $this->assertEquals($result['Pwederesource']['plugin'],"*");
        $this->assertEquals($result['Pwederesource']['controller'],"*");
        $this->assertEquals($result['Pwederesource']['action'],"*");


        CakeSession::delete('Auth.User');
        CakeSession::write('Auth.User', 
            array(
                'Group'=> array(
                    array('name' => 'dummygroup')
                )
        ));
        $result = $this->Pwederesource->findByController('dashboards');
        $this->assertTrue(is_array($result['Pwederesource']));
        $this->assertEquals($result['Pwederesource']['controller'],"dashboards");
    }

}
