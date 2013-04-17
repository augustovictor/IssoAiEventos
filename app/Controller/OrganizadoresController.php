<?php
App::uses('AppController', 'Controller');
/**
 * Organizadores Controller
 *
 * @property Organizador $Organizador
 */
class OrganizadoresController extends AppController {
	
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->redirect('/');
			}
			$this->Session->setFlash('Usuário ou senha inválidos');
		}
		
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Organizador->recursive = 0;
		$this->set('organizadores', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Organizador->exists($id)) {
			throw new NotFoundException(__('Invalid organizador'));
		}
		$options = array('conditions' => array('Organizador.' . $this->Organizador->primaryKey => $id));
		$this->set('organizador', $this->Organizador->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
            $this->request->data['Usuario']['papel'] = 'organizador';
			$this->Organizador->create();
			if ($this->Organizador->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__('The organizador has been saved'));
				//$user = $this->Organizador->Usuario->read(null, $this->Organizador->data['usuario_id']);
				$this->request->data['Organizador']['id'] = $this->Organizador->id;
				$this->Auth->login(array(
					'id' => $this->Organizador->Usuario->id,
					'nome' => $this->request->data['Usuario']['nome'],
					'email' => $this->request->data['Usuario']['email']
				));
				$this->redirect('/');
			} else {
				$this->Session->setFlash(__('The organizador could not be saved. Please, try again.'));
			}
		}
		$planos = $this->Organizador->Plano->find('list');
		$this->set(compact('planos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit() {
		$usuario_id = $this->Auth->user('id');
        $organizador = $this->Organizador->findByUsuarioId($usuario_id);
        $id = $organizador['Organizador']['id'];
        
		if (!$this->Organizador->exists($id)) {
			throw new NotFoundException(__('Invalid organizador'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Organizador->save($this->request->data)) {
				$this->Session->setFlash(__('The organizador has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organizador could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Organizador.id' => $id));
			$this->request->data = $this->Organizador->find('first', $options);
            unset($this->request->data['Usuario']['senha']);
            $this->request->data['Usuario']['data_nascimento'] =
                    date('d/m/Y', strtotime($this->request->data['Usuario']['data_nascimento']));
		}
		$planos = $this->Organizador->Plano->find('list');
		$this->set(compact('planos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Organizador->id = $id;
		if (!$this->Organizador->exists()) {
			throw new NotFoundException(__('Invalid organizador'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Organizador->delete()) {
			$this->Session->setFlash(__('Organizador deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Organizador was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function painel() {
		
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Organizador->recursive = 0;
		$this->set('organizadores', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Organizador->exists($id)) {
			throw new NotFoundException(__('Invalid organizador'));
		}
		$options = array('conditions' => array('Organizador.' . $this->Organizador->primaryKey => $id));
		$this->set('organizador', $this->Organizador->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Organizador->create();
			if ($this->Organizador->save($this->request->data)) {
				$this->Session->setFlash(__('The organizador has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organizador could not be saved. Please, try again.'));
			}
		}
		$usuarios = $this->Organizador->Usuario->find('list');
		$planos = $this->Organizador->Plano->find('list');
		$this->set(compact('usuarios', 'planos'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Organizador->exists($id)) {
			throw new NotFoundException(__('Invalid organizador'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Organizador->save($this->request->data)) {
				$this->Session->setFlash(__('The organizador has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organizador could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Organizador.' . $this->Organizador->primaryKey => $id));
			$this->request->data = $this->Organizador->find('first', $options);
		}
		$usuarios = $this->Organizador->Usuario->find('list');
		$planos = $this->Organizador->Plano->find('list');
		$this->set(compact('usuarios', 'planos'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Organizador->id = $id;
		if (!$this->Organizador->exists()) {
			throw new NotFoundException(__('Invalid organizador'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Organizador->delete()) {
			$this->Session->setFlash(__('Organizador deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Organizador was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
