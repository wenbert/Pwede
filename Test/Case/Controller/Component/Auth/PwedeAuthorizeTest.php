<?php

/**
 * PwedeAuthorizeTest file
 */

App::uses('Controller', 'Controller');
App::uses('PwedeAuthorize', 'Pwede.Controller/Component/Auth');
App::uses('ComponentCollection', 'Controller');
App::uses('AclComponent', 'Controller/Component');
App::uses('CakeRequest', 'Network');
App::uses('CakeResponse', 'Network');

class PwedeAuthorizeTest extends CakeTestCase  {

    public function testSuperAdmin() {
        
        // array(
        //     'id' => '1',
        //     'username' => 'superadmin',
        //     'email' => 'wenbert@gmail.com',
        //     'password_token' => null,
        //     'password_token_expiry' => null,
        //     'created' => '2013-07-08 01:19:32',
        //     'modified' => '2013-08-13 02:55:26',
        //     'Group' => array(
        //         (int) 0 => array(
        //             'id' => '1',
        //             'name' => 'SuperAdmin',
        //             'level' => '1',
        //             'default_pwederesource_id' => null,
        //             'created' => '2013-07-08 01:19:24',
        //             'modified' => '2013-07-08 01:19:24',
        //             'UsersGroup' => array(
        //                 'id' => '1',
        //                 'user_id' => '1',
        //                 'group_id' => '1'
        //             ),
        //             'Pwederesource' => array(
        //                 (int) 0 => array(
        //                     'id' => '1',
        //                     'plugin' => '*',
        //                     'controller' => '*',
        //                     'action' => '',
        //                     'named' => null,
        //                     'pass' => null,
        //                     'query' => null,
        //                     'GroupsPwederesource' => array(
        //                         'id' => '1',
        //                         'group_id' => '1',
        //                         'pwederesource_id' => '1'
        //                     )
        //                 )
        //             )
        //         )
        //     )
        // )
        
        $request = new CakeRequest('/pwede/dummy/index', false);
        $request->params['plugin'] = 'pwede';
        $request->params['controller'] = 'dummy';
        $request->params['action'] = 'index';

        $user = array('User' => array(
                    'id' => '1',
                    'username' => 'superadmin',
                    'email' => 'wenbert@gmail.com'
                ),
                'Group' => array(
                    array(
                        'id' => '1', 
                        'name' => 'superadmin',
                        'Pwederesource' => array(
                            array(
                                'id' => '1',
                                'plugin' => '*',
                                'controller' => '*',
                                'action' => '*'
                            )
                        )
                    )
                )
            );

        $this->Acl = $this->getMock('AclComponent', array(), array(), '', false);
        $this->Components = $this->getMock('ComponentCollection');

        $this->auth = new PwedeAuthorize($this->Components);
        
        $result = $this->auth->authorize($user, $request);
        $this->assertTrue($result);
        
    }

    public function testNonSuperAdminAndHasAccess() {
        $request = new CakeRequest('/pwede/dummy/index', false);
        $request->params['plugin'] = 'pwede';
        $request->params['controller'] = 'dummy';
        $request->params['action'] = 'index';

        $user = array('User' => array(
                    'id' => '1',
                    'username' => 'nonsuperadmin',
                    'email' => 'wenbert@gmail.com'
                ),
                'Group' => array(
                    array(
                        'id' => '1', 
                        'name' => 'nonsuperadmin',
                        'Pwederesource' => array(
                            array(
                                'id' => '1',
                                'plugin' => 'pwede',
                                'controller' => 'dummy',
                                'action' => 'index'
                            )
                        )
                    )
                )
            );

        $this->Acl = $this->getMock('AclComponent', array(), array(), '', false);
        $this->Components = $this->getMock('ComponentCollection');

        $this->auth = new PwedeAuthorize($this->Components);
        
        $result = $this->auth->authorize($user, $request);
        $this->assertTrue($result);
    }

    public function testNonSuperAdminAndHasNoAccess() {
        $request = new CakeRequest('/pwede/dummy/index', false);
        $request->params['plugin'] = 'pwede';
        $request->params['controller'] = 'dummy';
        $request->params['action'] = 'index';

        $user = array('User' => array(
                    'id' => '1',
                    'username' => 'nonsuperadmin',
                    'email' => 'wenbert@gmail.com'
                ),
                'Group' => array(
                    array(
                        'id' => '1', 
                        'name' => 'nonsuperadmin',
                        'Pwederesource' => array(
                            array(
                                'id' => '1',
                                'plugin' => 'pwede',
                                'controller' => 'dashboards',
                                'action' => 'index'
                            )
                        )
                    )
                )
            );

        $this->Acl = $this->getMock('AclComponent', array(), array(), '', false);
        $this->Components = $this->getMock('ComponentCollection');

        $this->auth = new PwedeAuthorize($this->Components);
        
        $result = $this->auth->authorize($user, $request);
        $this->assertFalse($result);
    }

}