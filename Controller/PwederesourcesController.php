<?php
App::uses('PwedeAppController', 'Pwede.Controller');
/**
 * Pwederesources Controller
 *
 * @property Pwederesource $Pwederesource
 */
class PwederesourcesController extends PwedeAppController {

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->Pwederesource->recursive = 0;
        $this->set('pwederesources', $this->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        if (!$this->Pwederesource->exists($id)) {
            throw new NotFoundException(__('Invalid pwederesource'));
        }
        $options = array('conditions' => array('Pwederesource.' . $this->Pwederesource->primaryKey => $id));
        $result = array();
        $result = $this->Pwederesource->find('first', $options);

        $this->set('pwederesource', $result);
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Pwederesource->create();
            if ($this->Pwederesource->save($this->request->data)) {
                $this->Session->setFlash(__('The pwederesource has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The pwederesource could not be saved. Please, try again.'));
            }
        }
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        if (!$this->Pwederesource->exists($id)) {
            throw new NotFoundException(__('Invalid pwederesource'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Pwederesource->save($this->request->data)) {
                $this->Session->setFlash(__('The pwederesource has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The pwederesource could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Pwederesource.' . $this->Pwederesource->primaryKey => $id));
            $this->request->data = $this->Pwederesource->find('first', $options);
        }
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function delete($id = null) {
        $this->Pwederesource->id = $id;
        if (!$this->Pwederesource->exists()) {
            throw new NotFoundException(__('Invalid pwederesource'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Pwederesource->delete()) {
            $this->Session->setFlash(__('Pwederesource deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Pwederesource was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function groupresource() {

    }
}
