<?php

App::uses('BaseAuthorize', 'Controller/Component/Auth');
// App::uses('CakeSession', 'Model/Datasource');

class PwedeAuthorize extends BaseAuthorize {
    public function authorize($user, CakeRequest $request) {
        $loggedInUser = $user;
        $groupresources = array();

        // debug($loggedInUser);
        // die();

        foreach($loggedInUser['Group'] AS $group) {
            if(isset($group['Pwederesource'])) {
                $groupresources = $group['Pwederesource'];
            }
        }
        if($this->_isAllowed($groupresources, $request)) {
            return true;
        }
        // SessionComponent::setFlash('You are not allowed to access the requested page');
        return false;
    }

    private function _isAllowed($resources,$request) {

        if(!count($resources)) {
            return false;
        }

        foreach($resources AS $key => $resource) {

            // */*
            if($resource['plugin']==="*" && $resource['controller'] ==="*") {
                return true;
                //this is the superadmin
            }

            // plugin/*
            if(
                $resource['plugin'] === $request->params['plugin'] &&
                (
                    $resource['controller'] === null || 
                    $resource['controller'] === "" || 
                    $resource['controller'] === "*"
                )
            ) {
                // debug('a');
                return true;
            }

            // plugin/controler/*
            if(
                $resource['plugin'] === $request->params['plugin'] &&
                $resource['controller'] === $request->params['controller'] &&
                (
                    $resource['action'] === "*" ||
                    $resource['action'] === "" ||
                    $resource['action'] === null
                )
            ) {
                 // debug('b');
                return true;
            }

            // plugin/controller/action/*
            if(
                $resource['plugin'] === $request->params['plugin'] &&
                $resource['controller'] === $request->params['controller'] &&
                $resource['action'] === $request->params['action']
            ) {
                // debug('c');
                return true;
            }

            //TODO:
            //named
            //query
        }

        return false;
     }
}