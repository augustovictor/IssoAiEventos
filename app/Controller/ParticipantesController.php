<?php

App::uses('AppController', 'Controller');

/**
 * Participantes Controller
 *
 * @property Participante $Participante
 */
class ParticipantesController extends AppController {
    
    private function base64_url_decode($input) {
        return base64_decode(strtr($input, '-_', '+/'));
    }
    
    private function parse_signed_request($signed_request, $secret) {
        list($encoded_sig, $payload) = explode('.', $signed_request, 2);

        // decode the data
        $sig = $this->base64_url_decode($encoded_sig);
        $data = json_decode($this->base64_url_decode($payload), true);

        if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
            error_log('Unknown algorithm. Expected HMAC-SHA256');
            return null;
        }

        // check sig
        $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
        if ($sig !== $expected_sig) {
            error_log('Bad Signed JSON signature!');
            return null;
        }

        return $data;
    }
    
    public function login() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $this->layout = 'ajax';
            
            $user = $this->Participante->findByFacebookId($this->request->data['userID']);
            if (!$user) {
                echo Router::url(array('controller' => 'participantes', 'action' => 'register'), true);
                exit;
            }
            
            $this->Auth->login(array(
                'id' => $user['Usuario']['id'],
                'nome' => $user['Usuario']['nome'],
                'email' => $user['Usuario']['email'],
                'facebook_id' => $user['Participante']['facebook_id']
            ));
            
            echo Router::url('/', true);
        }
    }

    public function register() {
        if ($this->request->is('post')) {
            Configure::load('facebook');
            $secret = Configure::read('Facebook.secret');
            
            $fb_response_data = $this->parse_signed_request($this->request->data['signed_request'], $secret);
            $registration = $fb_response_data['registration'];
            $participante = array(
                'Participante' => array(
                    'facebook_id' => $fb_response_data['user_id'],
                    'genero' => $registration['gender']
                ),
                'Usuario' => array(
                    'nome' => $registration['name'],
                    'email' => $registration['email'],
                    'data_nascimento' => date('Y-m-d', strtotime($registration['birthday'])),
                    'papel' => 'participante'
                )
            );
            unset($this->Participante->Usuario->validate['senha']);
            unset($this->Participante->Usuario->validate['confirmar_senha']);
            if ($this->Participante->saveAssociated($participante)) {
                $this->Session->setFlash('Você se registrou em IssoAiEventos');
                $this->Auth->login(array(
                    'id' => $this->Participante->Usuario->id,
                    'nome' => $participante['Usuario']['nome'],
                    'email' => $participante['Usuario']['email'],
                    'facebook_id' => $participante['Participante']['facebook_id'],
                ));
            } else {
                $this->Session->setFlash('Não foi possível completar o registro');
            }
            $this->redirect('/');
        }
    }
    
    public function logout() {
        $this->Auth->logout();
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
