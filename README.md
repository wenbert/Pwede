Pwede
=====

An authorization plugin for CakePHP. Permission management is centralized. Provides a UI to manage permissions.

Component Dependencies
====
This plugin relies on the Auth component enabled. Make sure you have the Auth component setup and the 'authorize' parameter set to 'Pwede.Pwede'


Usage
=====
Enable the plugin with bootstrap set to true.

    CakePlugin::loadAll(array(
        'Pwede' => array('bootstrap' => true)
    ));

Just add in your components:

	public $components = array(
        'RequestHandler',
        'Session',
        'Auth' => array(
            'loginAction' => array(
                    //'plugin' => 'user_manager',
                    'controller' => 'users',
                    'action' => 'login'
            ),
            'logoutRedirect' => array(
                    //'plugin' => 'user_manager',
                    'controller' => 'users',
                    'action' => 'login'
            ),
            'loginRedirect' => array(
                    //'plugin' => 'content',
                    'controller' => 'articles',
                    'action' => 'index'
            ),
            'authorize' => array(
                'Pwede.Pwede',
            )
        ),
        'Pwede.Access' => array(
            'group_model' => 'Group', //'Plugin.Group' if you group model is in a plugin
            'group_model_fk' => 'group_id'
        )
    );

WHERE
'group_model' => 'UserManager.Group'
The Group Model

'group_model_fk' => 'group_id',
The Foreign Key

