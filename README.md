Pwede
=====

An access permission plugin for CakePHP. Permission management is centralized. Provides a UI to manage permissions.

Component Dependencies
====
This plugin relies on the Auth component enabled. Make sure you have the Auth component setup and the 'authorize' parameter set to 'Pwede.Pwede'


Usage
=====
Enable the plugin with bootstrap set to true.

    CakePlugin::loadAll(array(
        'Pwede' => array('bootstrap' => true)
    ));

Add in your components:

    public $components = array(
        'RequestHandler',
        // 'Acl',
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'fields' => array(
                        'username' => 'username',
                        'password' => 'password',
                    ),
                    'userModel' => 'User',
                    'contain' => array('Group','Group.Pwederesource'),
                    'recursive' => -1,
                )
            ),
            'loginAction' => array(
                    'plugin' => 'user_manager',
                    'controller' => 'users',
                    'action' => 'login'
            ),
            'logoutRedirect' => array(
                    'plugin' => 'user_manager',
                    'controller' => 'users',
                    'action' => 'login'
            ),
            'authorize' => array(
                'Pwede.Pwede',
            )
        ),
        'Session',
        'Security' => array(
            'csrfUseOnce' => false
        ),
        'Pwede.Access' => array(
            'user_model' => 'UserManager.User',
            'group_model' => 'UserManager.Group',
            'group_model_fk' => 'group_id'
        )
    );

WHERE
'group_model' => 'UserManager.Group'
The Group Model

'group_model_fk' => 'group_id',
The Foreign Key

Make sure your User model has:

    public $actsAs = array(
        'Containable',
    );

Setup the cache. Make sure that this directory exists:

    app/tmp/cache/long

