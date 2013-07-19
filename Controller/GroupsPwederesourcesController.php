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
        $this->set('page_title', 'Group-Resource Access');

        $conditions = array();
        $limit = Configure::read('Grid.RESULTS_PER_PAGE');

        if(isset($_GET['search'])) {
            $conditions = array('OR' => array(
                array('Pwederesource.plugin LIKE' => '%'.$this->request->query['search'].'%'),
                array('Pwederesource.controller LIKE' => '%'.$this->request->query['search'].'%'),
                array('Pwederesource.action LIKE' => '%'.$this->request->query['search'].'%'),
                array('Pwederesource.named LIKE' => '%'.$this->request->query['search'].'%'),
                array('Pwederesource.pass LIKE' => '%'.$this->request->query['search'].'%'),
                array('Pwederesource.query LIKE' => '%'.$this->request->query['search'].'%'),
            ));
        }

        $this->paginate = array(
            'conditions' => $conditions,
            'limit' => $limit,
            // 'order' => array('Pwederesource.id'=> 'DESC'),
            'paramType' => 'querystring'
        );

        try {
            $groupsPwederesources = $this->paginate('GroupsPwederesource');
        } catch (NotFoundException $e) {
            $groupsPwederesources = array('message' => 'No results');
        }

        $this->set('groupsPwederesources', $groupsPwederesources);
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
        // debug($result);
        // debug($this->GroupsPwederesource->Pwederesource->find('list'));
        $this->set('groupsPwederesource', $result);
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        $this->set('page_title', 'Add Group-Resource Access');
        if ($this->request->is('post')) {
            $this->GroupsPwederesource->create();
            // debug($this->request->data);
            if ($this->GroupsPwederesource->saveAll($this->request->data)) {
                Cache::delete('pwederesources','long');
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
        $this->set('page_title', 'Edit Group-Resource Access');
        if (!$this->GroupsPwederesource->exists($id)) {
            throw new NotFoundException(__('Invalid groups pwederesource'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            // debug($this->request->data);
            // die();
            if ($this->GroupsPwederesource->save($this->request->data)) {
                Cache::delete('pwederesources','long');
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
        Cache::delete('pwederesources','long');
        
        if($this->request->is('ajax')) {
            $this->set('result', $this->GroupsPwederesource->delete());
            $this->Session->setFlash(__('Group-Resource deleted'));
        } else {
            if ($this->GroupsPwederesource->delete()) {
                $this->Session->setFlash(__('Group-Resource deleted'));
                $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Group-Resource was not deleted'));
            $this->redirect(array('action' => 'index'));
        }
    }
}
