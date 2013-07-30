<?php
App::uses('PwedeAppModel', 'Pwede.Model');
/**
 * Pwederesource Model
 *
 * @property Group $Group
 */
class Pwederesource extends PwedeAppModel {

/**
 * Display field
 *
 * @var string
 */
    // public $displayField = 'id';

    public $validate = array(
        'plugin' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'This field is required',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'controller' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'This field is required',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'action' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'This field is required',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        )
    );


    public function beforeFind($queryData) {
        $user = AuthComponent::user();
        $is_super_admin = false;
        foreach($user['Group'] AS $group) {
            if(strtolower($group['name']) === 'superadmin') {
                $is_super_admin = true;
                break;
            }
        }
        if(!$is_super_admin) {
            $queryData['conditions'] = array("NOT" => array(
                    "plugin" => "*",
                    "controller" => "*",
                    // "plugin" => "pwede",
                )
            );
        }

        // debug($queryData);
        
        // $queryData['conditions']['id'] = AuthComponent::user('account_id');

        // debug($queryData);
        return $queryData;
    }
    //The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
    // This is bound on the fly in AccessComponent.

    // public $hasAndBelongsToMany = array(
    //  'Group' => array(
    //      'className' => Configure::read('Pwede.GroupModel'),
    //      // 'className' => 'UserManager.Group',
    //      'joinTable' => 'groups_pwederesources',
    //      'foreignKey' => 'pwederesource_id',
    //      'associationForeignKey' => 'group_id',
    //      'unique' => 'keepExisting',
    //      'conditions' => '',
    //      'fields' => '',
    //      'order' => '',
    //      'limit' => '',
    //      'offset' => '',
    //      'finderQuery' => '',
    //      'deleteQuery' => '',
    //      'insertQuery' => ''
    //  )
    // );

// public $actsAs = array(
//         'Containable',
//     );

}
