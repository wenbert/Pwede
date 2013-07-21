<?php
App::uses('Component', 'Controller');
class AccessComponent extends Component {

    /**
     * Settings array
     * group_model  The classname of the Group (defaults to "Group")
     * group_model_fk  The foreign key (defaults to "group_id")
     * 
     * @var array
     */
    var $settings = array(
        'group_model' => 'Group',
        'group_model_fk' => 'group_id',
        'user_model' => 'User'
    );

    public function __construct(ComponentCollection $collection, $settings = array()) {
        $this->settings = $settings;

        if(!isset($this->settings['group_model'])) {
            $this->settings['group_model'] = 'Group';
        }

        if(!isset($this->settings['group_model_fk'])) {
            $this->settings['group_model_fk'] = 'group_id';
        }

        if(!isset($this->settings['user_model'])) {
            $this->settings['user_model'] = 'User';
        }
    }

    /**
     * initialize component
     */
    public function initialize(Controller $controller) {
        $this->request = $controller->request;

        $this->User = ClassRegistry::init($this->settings['user_model']);
        // $this->User = ClassRegistry::init('UserManager.User');
        $this->GroupsPwederesource = ClassRegistry::init('GroupsPwederesource');

        Configure::write('Pwede.GroupModel', $this->settings['group_model']);
        Configure::write('Pwede.GroupFK', $this->settings['group_model_fk']);
        Configure::write('Pwede.UserModel', $this->settings['user_model']);

        $this->GroupsPwederesource->bindModel(
            array('belongsTo' => array(
                'Group' => array(
                 'className' => $this->settings['group_model'],
                 'foreignKey' =>  $this->settings['group_model_fk'],
                 'conditions' => '',
                 'fields' => '',
                 'order' => ''
                ),
                'Pwederesource' => array(
                    'className' => 'Pwederesource',
                    'foreignKey' => 'pwederesource_id',
                    'conditions' => '',
                    'fields' => '',
                    'order' => ''
                )
            )),
            false
        );

        $this->Pwederesource = ClassRegistry::init('Pwederesource');
        $this->Pwederesource->bindModel(
            array('hasAndBelongsToMany' => 
                array(
                    'Group' => array(
                        'className' => Configure::read('Pwede.GroupModel'),
                        // 'className' => 'UserManager.Group',
                        'joinTable' => 'groups_pwederesources',
                        'foreignKey' => 'pwederesource_id',
                        'associationForeignKey' => 'group_id',
                        'unique' => 'keepExisting',
                        'conditions' => '',
                        'fields' => '',
                        'order' => '',
                        'limit' => '',
                        'offset' => '',
                        'finderQuery' => '',
                        'deleteQuery' => '',
                        'insertQuery' => ''
                    )
                )   
            ),
            false
        );
    }
}
