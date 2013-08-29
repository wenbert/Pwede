<?php
App::uses('DashboardsController', 'Pwede.Controller');
App::uses('AuthComponent', 'Controller/Component');

/**
 * PwederesourcesController Test Case
 *
 */
class PwederesourcesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
    public $fixtures = array(
        'plugin.pwede.pwederesource'
    );

/**
 * testIndex method
 *
 * @return void
 */
    public function testIndexIfSuperAdmin() {
        /*
        A sample AuthComponent::user() would be:
        array(
            'id' => '1',
            'username' => 'superadmin',
            'email' => 'wenbert@gmail.com',
            'password_token' => null,
            'password_token_expiry' => null,
            'created' => '2013-07-08 01:19:32',
            'modified' => '2013-08-13 02:55:26',
            'Group' => array(
                (int) 0 => array(
                    'id' => '1',
                    'name' => 'SuperAdmin',
                    'level' => '1',
                    'default_pwederesource_id' => null,
                    'created' => '2013-07-08 01:19:24',
                    'modified' => '2013-07-08 01:19:24',
                    'UsersGroup' => array(
                        'id' => '1',
                        'user_id' => '1',
                        'group_id' => '1'
                    ),
                    'Pwederesource' => array(
                        (int) 0 => array(
                            'id' => '1',
                            'plugin' => '*',
                            'controller' => '*',
                            'action' => '',
                            'named' => null,
                            'pass' => null,
                            'query' => null,
                            'GroupsPwederesource' => array(
                                'id' => '1',
                                'group_id' => '1',
                                'pwederesource_id' => '1'
                            )
                        )
                    )
                )
            )
        )
        */
        CakeSession::delete('Auth.User');
        $group_id = '1';
        $group_name = 'SuperAdmin';
        CakeSession::write('Auth.User.id', '1'); 
        CakeSession::write('Auth.User.username', 'superadmin'); 
        CakeSession::write('Auth.User.email', 'wenbert@gmail.com'); 
        CakeSession::write('Auth.User.Group.0', 
                array(
                    'id' => $group_id,
                    'name' => $group_name,
        ));
        CakeSession::write('Auth.User.Group.0.Pwederesource.0', 
                array(
                    'id' => $group_id,
                    'plugin' => '*',
                    'controller' => '*',
                    'action' => '*'
                )
        );
        // debug(AuthComponent::user());
        // die();

        $result = $this->testAction('/pwede/dashboards',
            array('method' => 'get', 'return' => 'contents')
        );

        $this->assertContains('<h2>Dashboard</h2>',$result);

        // $result = $this->testAction('/pwede/dashboards');

    }

/**
 * testView method
 *
 * @return void
 */
    public function testView() {
    }

/**
 * testAdd method
 *
 * @return void
 */
    public function testAdd() {
    }

/**
 * testEdit method
 *
 * @return void
 */
    public function testEdit() {
    }

/**
 * testDelete method
 *
 * @return void
 */
    public function testDelete() {
    }

}
