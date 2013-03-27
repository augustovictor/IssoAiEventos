<?php
App::uses('Organizador', 'Model');

/**
 * Organizador Test Case
 *
 */
class OrganizadorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.organizador',
		'app.usuario',
		'app.administrador',
		'app.plano'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Organizador = ClassRegistry::init('Organizador');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Organizador);

		parent::tearDown();
	}

}
