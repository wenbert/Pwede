<?php
App::uses('DummyController', 'Pwede.Controller');
App::uses('AuthComponent', 'Controller/Component');

/**
 * PwederesourcesController Test Case
 *
 */
class DummyControllerTest extends ControllerTestCase {

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
        CakeSession::delete('Auth');
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

        $result = $this->testAction('/pwede/dummy',
            array('method' => 'get', 'return' => 'contents')
        );

        $this->assertContains('This is a dummy controller.',$result);
    }

/**
 * testIfNotLoggedIn method
 * If the user is not logged in and trying to access a page.
 */
    public function testIfNotLoggedIn() {
        CakeSession::delete('Auth');
        $result = $this->testAction('/pwede/dashboards',
            array('method' => 'get', 'return' => 'contents')
        );

        // $this->assertContains('You are not authorized',CakeSession::read('Message.auth.message'));
        $this->assertNull($result);
        $this->assertContains('You are not authorized',CakeSession::read('Message.auth.message'));
    }

/**
 * testIfNoAccess
 * Test if the group of the user does not contain entries in the GroupsPwederesource table
 * A user who does not belong to any group and trying to access Dashboard.
 */
    public function testIfNoAccess() {
        CakeSession::delete('Auth');
        $group_id = '1';
        $group_name = 'testgroup';
        CakeSession::write('Auth.User.id', '1'); 
        CakeSession::write('Auth.User.username', 'testuser'); 
        CakeSession::write('Auth.User.email', 'wenbert@gmail.com'); 
        CakeSession::write('Auth.User.Group.0', 
                array(
                    'id' => $group_id,
                    'name' => $group_name,
        ));

        $result = $this->testAction('/pwede/dummy',
            array('method' => 'get', 'return' => 'contents')
        );

        $this->assertContains('You are not authorized to access that location',CakeSession::read('Message.auth.message'));
        $this->assertNull($result);
    }

/**
 * testIfHasEntryButNoAccess
 * A user who belongs in a group trying to access Dashboard but has no access to it.
 */
    public function testIfHasEntryButNoAccess() {
        CakeSession::delete('Auth');
        $group_id = '1';
        $group_name = 'testgroup';
        CakeSession::write('Auth.User.id', '1'); 
        CakeSession::write('Auth.User.username', 'testuser'); 
        CakeSession::write('Auth.User.email', 'wenbert@gmail.com'); 
        CakeSession::write('Auth.User.Group.0', 
                array(
                    'id' => $group_id,
                    'name' => $group_name,
        ));

        $result = $this->testAction('/pwede/dashboards',
            array('method' => 'get', 'return' => 'contents')
        );

        $this->assertContains('You are not authorized to access that location',CakeSession::read('Message.auth.message'));
        $this->assertNull($result);
    }

/**
 * testGroupHasAccessToDashboard
 * A user who belongs to a group trying to access Dummy index. 
 * The group is allowed to view the Dummy index
 */
    public function testGroupHasAccessToDashboard() {
        CakeSession::delete('Auth');
        $group_id = '3';
        $group_name = 'dummygroup';
        CakeSession::write('Auth.User.id', '1'); 
        CakeSession::write('Auth.User.username', 'testuser'); 
        CakeSession::write('Auth.User.email', 'wenbert@gmail.com'); 
        CakeSession::write('Auth.User.Group.0', 
                array(
                    'id' => $group_id,
                    'name' => $group_name,
        ));
        CakeSession::write('Auth.User.Group.0.Pwederesource.0', 
                array(
                    'id' => $group_id,
                    'plugin' => 'pwede',
                    'controller' => 'dummy',
                    'action' => 'index'
                )
        );

        $result = $this->testAction('/pwede/dummy',
            array('method' => 'get', 'return' => 'contents')
        );

        
        $this->assertContains('This is a dummy controller.', $result);
    }

// /**
//  * testView method
//  *
//  * @return void
//  */
//     public function testView() {
//     }

// /**
//  * testAdd method
//  *
//  * @return void
//  */
//     public function testAdd() {
//     }

// /**
//  * testEdit method
//  *
//  * @return void
//  */
//     public function testEdit() {
//     }

// /**
//  * testDelete method
//  *
//  * @return void
//  */
//     public function testDelete() {
//     }

}
