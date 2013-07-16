Pwede
=====

An authorization plugin for CakePHP. Permission management is centralized. Provides a UI to manage permissions.


Usage
=====
Just add in your components:

	public $components = array(
        'RequestHandler',
        'Session',
        'Pwede.Access' => array(
            'group_model' => 'UserManager.Group',
            'group_model_fk' => 'group_id'
        )
    );

    /*
    WHERE
        'group_model' => 'UserManager.Group'
        The Group Model

        'group_model_fk' => 'group_id',
        The Foreign Key
    */

