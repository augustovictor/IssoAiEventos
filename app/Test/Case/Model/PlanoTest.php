<?php
App::uses('Plano', 'Model');

/**
 * Plano Test Case
 *
 */
class PlanoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.plano',
		'app.organizador',
		'app.usuario',
		'app.administrador'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Plano = ClassRegistry::init('Plano');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Plano);

		parent::tearDown();
	}

}
