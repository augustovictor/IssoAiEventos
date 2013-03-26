<?php
/**
 * EventoFixture
 *
 */
class EventoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'titulo' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'descricao' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'data_inicio' => array('type' => 'date', 'null' => false, 'default' => null),
		'data_fim' => array('type' => 'date', 'null' => false, 'default' => null),
		'vagas' => array('type' => 'integer', 'null' => false, 'default' => null),
		'localizacao_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'organizador_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_evento_localizacao1_idx' => array('column' => 'localizacao_id', 'unique' => 0),
			'fk_eventos_organizadores1_idx' => array('column' => 'organizador_id', 'unique' => 0)
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
			'titulo' => 'Lorem ipsum dolor sit amet',
			'descricao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'data_inicio' => '2013-03-27',
			'data_fim' => '2013-03-27',
			'vagas' => 1,
			'localizacao_id' => 1,
			'organizador_id' => 1
		),
	);

}
