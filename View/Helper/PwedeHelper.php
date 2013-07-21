<?php

App::uses('AppHelper', 'View/Helper');

class PwedeHelper extends AppHelper {
    public $helpers = array('Html', 'Grid.Nav');

    /**
     *  sets the class of the nav to "selected"
     */
    public function highlightCurrentTab($text, $options = array()) {
        $class = array();
        // debug($this->request->params['controller']);
        // debug($options['controller']);
        if($this->request->params['controller'] == $options['controller']) {
            $class = array('class' => 'selected');
        }
        echo $this->Html->link($text, $options, $class);
    }

    /**
     * an alias of the $this->Html->link() helper
     * only that this does not display the link if the current logged in user
     * does not have access to the target resource
     */
    public function link($text, $options) {

        $hasAccess = false;

        $resources = CakeSession::read('Auth.User.AllowedResource');

        foreach($resources AS $key => $resource) {

            // */*
            if($resource['Pwederesource']['plugin']==="*" && $resource['Pwederesource']['controller'] ==="*") {
                $hasAccess = true;
                //this is the superadmin
            }

            // plugin/*
            if(
                $resource['Pwederesource']['plugin'] === $options['plugin'] &&
                (
                    $resource['Pwederesource']['controller'] === null || 
                    $resource['Pwederesource']['controller'] === "" || 
                    $resource['Pwederesource']['controller'] === "*"
                )
            ) {
                // debug('a');
                $hasAccess = true;
            }

            // plugin/controler/*
            if(
                $resource['Pwederesource']['plugin'] === $options['plugin'] &&
                $resource['Pwederesource']['controller'] === $options['controller'] &&
                (
                    $resource['Pwederesource']['action'] === "*" ||
                    $resource['Pwederesource']['action'] === "" ||
                    $resource['Pwederesource']['action'] === null
                )
            ) {
                 // debug('b');
                $hasAccess = true;
            }

            // plugin/controller/action/*
            if(
                $resource['Pwederesource']['plugin'] === $options['plugin'] &&
                $resource['Pwederesource']['controller'] === $options['controller'] &&
                $resource['Pwederesource']['action'] === $options['action']
            ) {
                // debug('c');
                $hasAccess = true;
            }

            //TODO:
            //named
            //query
        }

        if($hasAccess) {

            return $this->Nav->highlightCurrentTab(__($text), $options);

            // return $this->Html->link(__($text), $options);
        }
        return false;
    }
}