<?php
App::uses('Component', 'Controller');
class AccessComponent extends Component {

    /**
     * initialize component
     */
    public function initialize(Controller $controller) {
        $this->request = $controller->request;
        debug($this->request);
    }
}