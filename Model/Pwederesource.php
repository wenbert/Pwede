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
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'controller' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'action' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        )
    );

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

}
