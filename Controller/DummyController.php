<?php
App::uses('PwedeAppController', 'Pwede.Controller');
/**
 * Pwederesources Controller
 *
 * @property Pwederesource $Pwederesource
 */
class DummyController extends PwedeAppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Security->unlockedActions = array('delete');
    }

    public function index() {
        
    }
}