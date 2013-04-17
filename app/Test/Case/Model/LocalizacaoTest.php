<?php
App::uses('Localizacao', 'Model');

/**
 * Localizacao Test Case
 *
 */
class LocalizacaoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.localizacao',
		'app.evento',
		'app.organizador',
		'app.usuario',
		'app.administrador',
		'app.plano',
		'app.participante',
		'app.eventos_participante'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Localizacao = ClassRegistry::init('Localizacao');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Localizacao);

		parent::tearDown();
	}

}
