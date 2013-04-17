<?php
/**
 * ParticipanteFixture
 *
 */
class ParticipanteFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'facebook_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'unique'),
		'genero' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'usuario_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'facebook_id_UNIQUE' => array('column' => 'facebook_id', 'unique' => 1),
			'fk_participantes_usuarios1_idx' => array('column' => 'usuario_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'facebook_id' => '',
			'genero' => 'Lorem ipsum dolor sit ame',
			'usuario_id' => 1
		),
	);

}
