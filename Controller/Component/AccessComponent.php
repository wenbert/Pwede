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
        'group_model_fk' => 'group_id'
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

        $this->User = ClassRegistry::init('UserManager.User');
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

        $loggedInUser = $this->User->findById(AuthComponent::user('id'));
        
        // debug(AuthComponent::user());
        // debug($loggedInUser);

        $gids = array();
        foreach($loggedInUser['Group'] AS $group) {
            $gids[] = $group['id'];
        }

        // debug($gids);

        //Loop through the $gids and find all the "resources" for those groups
        $resources = array();

        $resources = $this->GroupsPwederesource->find('all', 
            array('conditions' => 
                array('group_id' => $gids)
            )
        );

        // $this->User->find('all', array('conditions' => array('id' => array(1, 5, 7))));
        // debug($resources);

        debug($this->_isAllowed($resources));

        
     }

     private function _isAllowed($resources) {
        // debug($resources);
        // debug($this->request->params);

        if(!count($resources)) {
            return false;
        }

        foreach($resources AS $key => $resource) {

            // */*
            if($resource['Pwederesources']['plugin']==="*" && $resource['Pwederesources']['controller'] ==="*") {
                return true;
                //this is the superadmin
            }

            // plugin/*
            if(
                $resource['Pwederesources']['plugin'] === $this->request->params['plugin'] &&
                (
                    $resource['Pwederesources']['controller'] === null || 
                    $resource['Pwederesources']['controller'] === "" || 
                    $resource['Pwederesources']['controller'] === "*"
                )
            ) {
                return true;
            }

            // plugin/controler/*
            if(
                $resource['Pwederesources']['plugin'] === $this->request->params['plugin'] &&
                $resource['Pwederesources']['controller'] === $this->request->params['controller'] &&
                (
                    $resource['Pwederesources']['action'] === "*" ||
                    $resource['Pwederesources']['action'] === "" ||
                    $resource['Pwederesources']['action'] === null
                )
            ) {
                return true;
            }

            // plugin/controller/action/*
            if(
                $resource['Pwederesources']['plugin'] === $this->request->params['plugin'] &&
                $resource['Pwederesources']['controller'] === $this->request->params['controller'] &&
                $resource['Pwederesources']['action'] === $this->request->params['action']
            ) {
                return true;
            }

            //TODO:
            //named
            //query
        }

        return false;
     }
}
