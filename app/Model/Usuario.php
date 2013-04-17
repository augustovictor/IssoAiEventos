<?php
App::uses('AppModel', 'Model');
/**
 * Usuario Model
 *
 * @property Administrador $Administrador
 * @property Organizador $Organizador
 */
class Usuario extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nome';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nome' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'senha' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'confirmar_senha' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
			'confirmarSenha' => array(
				'rule' => array('confirmarSenha'),
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Administrador' => array(
			'className' => 'Administrador',
			'foreignKey' => 'usuario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Organizador' => array(
			'className' => 'Organizador',
			'foreignKey' => 'usuario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public function confirmarSenha($check) {
		return $this->data['Usuario']['senha'] == $this->data['Usuario']['confirmar_senha'];
	}
	
    public function beforeValidate($options = array()) {
		parent::beforeValidate($options);
        if ($this->data['Usuario']['data_nascimento'][2] == '/') {
            // Converter a data de nascimento para formato do banco de dados
            $data_nascimento = $this->data['Usuario']['data_nascimento'];
            $data = explode('/', $data_nascimento);
            $this->data['Usuario']['data_nascimento'] = implode('-', array_reverse($data));
        }
	}
    
	public function beforeSave($options = array()) {
		parent::beforeSave($options);
        if (!empty($this->data['Usuario']['senha'])) {
            $this->data['Usuario']['senha'] = AuthComponent::password($this->data['Usuario']['senha']);
        }
	}
}
