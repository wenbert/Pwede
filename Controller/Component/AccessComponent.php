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

        Configure::write('Pwede.GroupModel', $this->settings['group_model']);
        Configure::write('Pwede.GroupFK', $this->settings['group_model_fk']);

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

        $loggedInUser = $this->User->findById(AuthComponent::user('id'));
        
        // debug(AuthComponent::user());
        // debug($loggedInUser);

        $gids = array();
        foreach($loggedInUser['Group'] AS $group) {
            $gids[] = $group['id'];
        }


        $resources = array();
        $resources = $this->GroupsPwederesource->find('all', 
            array('conditions' => 
                array('group_id' => $gids)
            )
        );

        debug($this->_isAllowed($resources));
     }

     private function _isAllowed($resources) {
        // debug($resources);
        // debug($this->request);

        if(!count($resources)) {
            return false;
        }

        foreach($resources AS $key => $resource) {

            // */*
            if($resource['Pwederesource']['plugin']==="*" && $resource['Pwederesource']['controller'] ==="*") {
                return true;
                //this is the superadmin
            }

            // plugin/*
            if(
                $resource['Pwederesource']['plugin'] === $this->request->params['plugin'] &&
                (
                    $resource['Pwederesource']['controller'] === null || 
                    $resource['Pwederesource']['controller'] === "" || 
                    $resource['Pwederesource']['controller'] === "*"
                )
            ) {
                return true;
            }

            // plugin/controler/*
            if(
                $resource['Pwederesource']['plugin'] === $this->request->params['plugin'] &&
                $resource['Pwederesource']['controller'] === $this->request->params['controller'] &&
                (
                    $resource['Pwederesource']['action'] === "*" ||
                    $resource['Pwederesource']['action'] === "" ||
                    $resource['Pwederesource']['action'] === null
                )
            ) {
                return true;
            }

            // plugin/controller/action/*
            if(
                $resource['Pwederesource']['plugin'] === $this->request->params['plugin'] &&
                $resource['Pwederesource']['controller'] === $this->request->params['controller'] &&
                $resource['Pwederesource']['action'] === $this->request->params['action']
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
