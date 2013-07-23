<?php
App::uses('PwedeAppController', 'Pwede.Controller');
/**
 * Pwederesources Controller
 *
 * @property Pwederesource $Pwederesource
 */
class PwederesourcesController extends PwedeAppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Security->unlockedActions = array('delete');
    }
/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->set('page_title', 'Resources');

        $conditions = array();
        $limit = Configure::read('Pwede.RESULTS_PER_PAGE');

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
            $pwederesources = $this->paginate('Pwederesource');
        } catch (NotFoundException $e) {
            $pwederesources = array('message' => 'No results');
        }

        $this->set('pwederesources', $pwederesources);
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
        $this->set('page_title', 'Add Resource');
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
        $this->set('page_title', 'Edit Resource');
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
        
        if($this->request->is('ajax')) {
            $this->set('result', $this->Pwederesource->delete());
            $this->Session->setFlash(__('Resource deleted'));
        } else {
            if ($this->Pwederesource->delete()) {
                $this->Session->setFlash(__('Resource deleted'));
                $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Resource was not deleted'));
            $this->redirect(array('action' => 'index'));
        }
    }

    public function groupresource() {

    }
}
