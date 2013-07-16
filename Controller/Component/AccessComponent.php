<?php
App::uses('Component', 'Controller');
class AccessComponent extends Component {

    /**
     * Settings array
     * group_model  The classname of the Group (defaults to "Group")
     * group_model_fk  The foreign key (defaults to "group_id")
     * auth_group_id    The Group ID of the currently logged in user
     * 
     * @var array
     */
    var $settings = array(
        'group_model' => 'Group',
        'group_model_fk' => 'group_id',
        'auth_group_id' => 'group_id'
    );

    public function __construct(ComponentCollection $collection, $settings = array()) {
        $this->settings = $settings;

        if(!isset($this->settings['group_model'])) {
            $this->settings['group_model'] = 'Group';
        }

        if(!isset($this->settings['group_model_fk'])) {
            $this->settings['group_model_fk'] = 'group_id';
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

        // debug(AuthComponent::user());

        //I'm not sure if this is the best way to do this.
        //We are assuming that a "group id" exists in the Auth object
        //of the currently logged in user.
        //For now, we are restricted to have ONE GROUP per user.
        $gid = AuthComponent::user($this->settings['auth_group_id']);

        //After login, fetch all 
        $resources = $this->GroupsPwederesource->findAllByGroupId(AuthComponent::user('group_id'));
        // debug($this->request->params);
        // debug($resources);
        foreach($resources AS $key => $resource) {
            if (
                $resource['Pwederesources']['plugin'] === $this->request->params['plugin'] &&
                $resource['Pwederesources']['controller'] === $this->request->params['controller'] &&
                $resource['Pwederesources']['action'] === "*"
            ) {
                //allow all actions for plugin-controller combination
            }
        }
     }
}
