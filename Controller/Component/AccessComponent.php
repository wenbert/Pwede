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
    var $settings = array();

    public function __construct(ComponentCollection $collection, $settings = array()) {
        $this->settings = $settings;

        if(!isset($this->settings['group_model'])) {
            $this->settings['group_model'] = 'Group';
        }

        if(!isset($this->settings['group_model_fk'])) {
            $this->settings['group_model'] = 'group_id';
        }
    }

    /**
     * initialize component
     */
    public function initialize(Controller $controller) {
        $this->request = $controller->request;

        //Load the GroupsPwederesource Model and create a relationship
        //to the "Group" model in the settings on the fly
        $this->GroupsPwederesource = ClassRegistry::init('GroupsPwederesource');
        $this->GroupsPwederesource->bindModel(
            array('belongsTo' => array(
                'Group' => array(
                 'className' => $this->settings['group_model'],
                 'foreignKey' =>  $this->settings['group_model_fk'],
                 'conditions' => '',
                 'fields' => '',
                 'order' => ''
                ),
                'Pwederesources' => array(
                    'className' => 'Pwederesources',
                    'foreignKey' => 'pwederesources_id',
                    'conditions' => '',
                    'fields' => '',
                    'order' => ''
                )
            ))
        );

        $this->GroupsPwederesource->recursive = 0;
        debug($this->GroupsPwederesource->find('all'));
     }
}
