<?php
/**
 * OrganizadorFixture
 *
 */
class OrganizadorFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'usuario_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'data_nascimento' => array('type' => 'date', 'null' => true, 'default' => null),
		'plano_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'usuario_id', 'unique' => 1),
			'fk_organizador_plano1_idx' => array('column' => 'plano_id', 'unique' => 0)
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
			'usuario_id' => 1,
			'data_nascimento' => '2013-03-19',
			'plano_id' => 1
		),
	);

}
