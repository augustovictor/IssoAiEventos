<?php

App::uses('AppController', 'Controller');

/**
 * Participantes Controller
 *
 * @property Participante $Participante
 */
class ParticipantesController extends AppController {
    
    public function login() {
        $this->redirect('/');
    }
    
    public function logout() {
        $this->Auth->logout();
        $this->Session->destroy();
        $this->redirect('/');
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Participante->recursive = 0;
        $this->set('participantes', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Participante->exists($id)) {
            throw new NotFoundException(__('Invalid participante'));
        }
        $options = array('conditions' => array('Participante.' . $this->Participante->primaryKey => $id));
        $this->set('participante', $this->Participante->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Participante->create();
            if ($this->Participante->save($this->request->data)) {
                $this->Session->setFlash(__('The participante has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The participante could not be saved. Please, try again.'));
            }
        }
        $usuarios = $this->Participante->Usuario->find('list');
        $eventos = $this->Participante->Evento->find('list');
        $this->set(compact('usuarios', 'eventos'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Participante->exists($id)) {
            throw new NotFoundException(__('Invalid participante'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Participante->save($this->request->data)) {
                $this->Session->setFlash(__('The participante has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The participante could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Participante.' . $this->Participante->primaryKey => $id));
            $this->request->data = $this->Participante->find('first', $options);
        }
        $usuarios = $this->Participante->Usuario->find('list');
        $eventos = $this->Participante->Evento->find('list');
        $this->set(compact('usuarios', 'eventos'));
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
        $this->Participante->id = $id;
        if (!$this->Participante->exists()) {
            throw new NotFoundException(__('Invalid participante'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Participante->delete()) {
            $this->Session->setFlash(__('Participante deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Participante was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
