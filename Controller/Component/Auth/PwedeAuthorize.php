<?php

App::uses('BaseAuthorize', 'Controller/Component/Auth');
// App::uses('CakeSession', 'Model/Datasource');

class PwedeAuthorize extends BaseAuthorize {
    public function authorize($user, CakeRequest $request) {
        // return false;
        $this->GroupsPwederesource = ClassRegistry::init('GroupsPwederesource');

        $loggedInUser = $user;
        
        $gids = array();
        foreach($loggedInUser['Group'] AS $group) {
            $gids[] = $group['id'];
        }

        //Cache this longterm. We clear the cache everytime we change permissions
        $resources = Cache::read('pwederesources', 'long');

        if(!$resources) {
            $resources = $this->GroupsPwederesource->find('all');
            Cache::write('pwederesources', $resources, 'long');
        }

        $groupresources = array();
        foreach($resources AS $resource) {
            foreach($gids AS $group_id) {
                if($group_id == $resource['Group']['id']) {
                    $groupresources[] = $resource;
                }
            }
        }
        
        if($this->_isAllowed($groupresources, $request)) {
            return true;
        }

        SessionComponent::setFlash('You are not allowed to access the requested page');
        return false;
    }

    private function _isAllowed($resources,$request) {

        if(!count($resources)) {
            return false;
        }

        foreach($resources AS $key => $resource) {

            // */*
            if($resource['Pwederesource']['plugin']==="*" && $resource['Pwederesource']['controller'] ==="*") {
                return true;
                //this is the superadmin
            }

            // plugin/*
            if(
                $resource['Pwederesource']['plugin'] === $request->params['plugin'] &&
                (
                    $resource['Pwederesource']['controller'] === null || 
                    $resource['Pwederesource']['controller'] === "" || 
                    $resource['Pwederesource']['controller'] === "*"
                )
            ) {
                // debug('a');
                return true;
            }

            // plugin/controler/*
            if(
                $resource['Pwederesource']['plugin'] === $request->params['plugin'] &&
                $resource['Pwederesource']['controller'] === $request->params['controller'] &&
                (
                    $resource['Pwederesource']['action'] === "*" ||
                    $resource['Pwederesource']['action'] === "" ||
                    $resource['Pwederesource']['action'] === null
                )
            ) {
                 // debug('b');
                return true;
            }

            // plugin/controller/action/*
            if(
                $resource['Pwederesource']['plugin'] === $request->params['plugin'] &&
                $resource['Pwederesource']['controller'] === $request->params['controller'] &&
                $resource['Pwederesource']['action'] === $request->params['action']
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