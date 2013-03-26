<?php
App::uses('AppModel', 'Model');
/**
 * Participante Model
 *
 * @property Evento $Evento
 */
class Participante extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'facebook_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nome';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Evento' => array(
			'className' => 'Evento',
			'joinTable' => 'eventos_participantes',
			'foreignKey' => 'participante_id',
			'associationForeignKey' => 'evento_id',
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
	);

}
