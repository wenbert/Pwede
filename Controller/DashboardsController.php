<?php
App::uses('PwedeAppController', 'Pwede.Controller');

class DashboardsController extends PwedeAppController {

    public function beforeFilter() {
        parent::beforeFilter();
    }

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->set('page_title', 'Dashboard');
    }
}
