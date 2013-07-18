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
	public $displayField = 'id';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	// This is bound on the fly in AccessComponent.

	// public $hasAndBelongsToMany = array(
	// 	'Group' => array(
	// 		'className' => Configure::read('Pwede.GroupModel'),
	// 		// 'className' => 'UserManager.Group',
	// 		'joinTable' => 'groups_pwederesources',
	// 		'foreignKey' => 'pwederesource_id',
	// 		'associationForeignKey' => 'group_id',
	// 		'unique' => 'keepExisting',
	// 		'conditions' => '',
	// 		'fields' => '',
	// 		'order' => '',
	// 		'limit' => '',
	// 		'offset' => '',
	// 		'finderQuery' => '',
	// 		'deleteQuery' => '',
	// 		'insertQuery' => ''
	// 	)
	// );

}
