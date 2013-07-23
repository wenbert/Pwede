<?php
// App::uses('AppController', 'Controller');
// class PwedeAppController extends AppController {
App::uses('GridAppController', 'Grid.Controller');
class PwedeAppController extends GridAppController {
    
    public function beforeFilter() {
        parent::beforeFilter();
    
    }

}
