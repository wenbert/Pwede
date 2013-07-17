<?php
App::uses('PwedeAppController', 'Pwede.Controller');
/**
 * GroupsPwederesources Controller
 *
 * @property GroupsPwederesource $GroupsPwederesource
 */
class GroupsPwederesourcesController extends PwedeAppController {

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->GroupsPwederesource->recursive = 0;
        $this->set('groupsPwederesources', $this->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {

        if (!$this->GroupsPwederesource->exists($id)) {
            throw new NotFoundException(__('Invalid groups pwederesource'));
        }
        $options = array('conditions' => array('GroupsPwederesource.' . $this->GroupsPwederesource->primaryKey => $id));
        $result = $this->GroupsPwederesource->find('first', $options);
        debug($result);
        // debug($this->GroupsPwederesource->Pwederesource->find('list'));
        $this->set('groupsPwederesource', $result);
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->GroupsPwederesource->create();
            debug($this->request->data);
            if ($this->GroupsPwederesource->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The groups pwederesource has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The groups pwederesource could not be saved. Please, try again.'));
            }
        }

        $groups = $this->GroupsPwederesource->Group->find('list');
        $this->set(compact('groups'));

        $resources = $this->GroupsPwederesource->Pwederesource->find('all');
        $tmp = array();
        // debug($resources);
        foreach($resources AS $resource) {
            $tmp[$resource['Pwederesource']['id']] = $resource['Pwederesource']['plugin'].'/'.$resource['Pwederesource']['controller'].'/'.$resource['Pwederesource']['action'];
        }
        // debug($tmp);
        $this->set('resources',$tmp);
        // $this->set(compact('pwederesource'));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        if (!$this->GroupsPwederesource->exists($id)) {
            throw new NotFoundException(__('Invalid groups pwederesource'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            // debug($this->request->data);
            // die();
            if ($this->GroupsPwederesource->save($this->request->data)) {
                $this->Session->setFlash(__('The groups pwederesource has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The groups pwederesource could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('GroupsPwederesource.' . $this->GroupsPwederesource->primaryKey => $id));
            $this->request->data = $this->GroupsPwederesource->find('first', $options);
        }
        $resources = $this->GroupsPwederesource->Pwederesource->find('all');
        // debug($resources);
        $resources_array = array();
        foreach($resources AS $resource) {
            $resources_array[$resource['Pwederesource']['id']] = $resource['Pwederesource']['plugin'].'/'.$resource['Pwederesource']['controller'].'/'.$resource['Pwederesource']['action'];
        }
        $this->set('resources',$resources_array);
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function delete($id = null) {
        $this->GroupsPwederesource->id = $id;
        if (!$this->GroupsPwederesource->exists()) {
            throw new NotFoundException(__('Invalid groups pwederesource'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->GroupsPwederesource->delete()) {
            $this->Session->setFlash(__('Groups pwederesource deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Groups pwederesource was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}
