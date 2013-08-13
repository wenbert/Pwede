<?php

App::uses('AppHelper', 'View/Helper');

class PwedeHelper extends AppHelper {
    public $helpers = array('Html', 'Grid.Nav', 'Form');

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
    public function link($text, $options, $isTab = false) {

        $hasAccess = false;

        $loggedInUser = AuthComponent::user();

        $resources = array();
        if(isset($loggedInUser['Group'])) {
            foreach($loggedInUser['Group'] AS $group) {
                $resources = $group['Pwederesource'];
            }
        }

        // $resources = CakeSession::read('Auth.User.AllowedResource');

        if(!isset($options['plugin'])) {
            // $options['plugin'] = "";
            $options['plugin'] = $this->request->params['plugin'];
        }

        if(!isset($options['controller'])) {
            // $options['controller'] = "";
            $options['controller'] = $this->request->params['controller'];
        }

        // debug($this->request->params);

        foreach($resources AS $key => $resource) {

            // */*
            if($resource['plugin']==="*" && $resource['controller'] ==="*") {
                $hasAccess = true;
                //this is the superadmin
            }

            // plugin/*
            if(
                $resource['plugin'] === $options['plugin'] &&
                (
                    $resource['controller'] === null || 
                    $resource['controller'] === "" || 
                    $resource['controller'] === "*"
                )
            ) {
                // debug('a');
                $hasAccess = true;
            }

            // plugin/controler/*
            if(
                $resource['plugin'] === $options['plugin'] &&
                $resource['controller'] === $options['controller'] &&
                (
                    $resource['action'] === "*" ||
                    $resource['action'] === "" ||
                    $resource['action'] === null
                )
            ) {
                 // debug('b');
                $hasAccess = true;
            }

            // plugin/controller/action/*
            if(
                $resource['plugin'] === $options['plugin'] &&
                $resource['controller'] === $options['controller'] &&
                $resource['action'] === $options['action']
            ) {
                // debug('c');
                $hasAccess = true;
            }

            //TODO:
            //named
            //query
        }

        if($hasAccess) {
            if($isTab) {
                return $this->Nav->highlightCurrentTab(__($text), $options);
            } else {
                return $this->Nav->highlightCurrentLink(__($text), $options);
            }

            // return $this->Html->link(__($text), $options);
        }
        return false;
    }

    public function buttonLink($text, $options, $html_options) {
        $hasAccess = false;

        $loggedInUser = AuthComponent::user();

        $resources = array();
        if(isset($loggedInUser['Group'])) {
            foreach($loggedInUser['Group'] AS $group) {
                $resources = $group['Pwederesource'];
            }
        }

        // $resources = CakeSession::read('Auth.User.AllowedResource');

        if(!isset($options['plugin'])) {
            // $options['plugin'] = "";
            $options['plugin'] = $this->request->params['plugin'];
        }

        if(!isset($options['controller'])) {
            // $options['controller'] = "";
            $options['controller'] = $this->request->params['controller'];
        }

        // debug($this->request->params);

        foreach($resources AS $key => $resource) {

            // */*
            if($resource['plugin']==="*" && $resource['controller'] ==="*") {
                $hasAccess = true;
                //this is the superadmin
            }

            // plugin/*
            if(
                $resource['plugin'] === $options['plugin'] &&
                (
                    $resource['controller'] === null || 
                    $resource['controller'] === "" || 
                    $resource['controller'] === "*"
                )
            ) {
                // debug('a');
                $hasAccess = true;
            }

            // plugin/controler/*
            if(
                $resource['plugin'] === $options['plugin'] &&
                $resource['controller'] === $options['controller'] &&
                (
                    $resource['action'] === "*" ||
                    $resource['action'] === "" ||
                    $resource['action'] === null
                )
            ) {
                 // debug('b');
                $hasAccess = true;
            }

            // plugin/controller/action/*
            if(
                $resource['plugin'] === $options['plugin'] &&
                $resource['controller'] === $options['controller'] &&
                $resource['action'] === $options['action']
            ) {
                // debug('c');
                $hasAccess = true;
            }

            //TODO:
            //named
            //query
        }

        if($hasAccess) {
            //return $this->Nav->highlightCurrentLink(__($text), $options);
            return $this->Html->link(__($text), $options, $html_options);
        }
        return false;
    }

    public function postLink($title, $options = null, $html_options = array(), $confirmMessage = false) {
        $hasAccess = false;
        $loggedInUser = AuthComponent::user();

        $resources = array();
        if(isset($loggedInUser['Group'])) {
            foreach($loggedInUser['Group'] AS $group) {
                $resources = $group['Pwederesource'];
            }
        }

        // $resources = CakeSession::read('Auth.User.AllowedResource');

        if(!isset($options['plugin'])) {
            // $options['plugin'] = "";
            $options['plugin'] = $this->request->params['plugin'];
        }

        if(!isset($options['controller'])) {
            // $options['controller'] = "";
            $options['controller'] = $this->request->params['controller'];
        }

        // debug($this->request->params);

        foreach($resources AS $key => $resource) {

            // */*
            if($resource['plugin']==="*" && $resource['controller'] ==="*") {
                $hasAccess = true;
                //this is the superadmin
            }

            // plugin/*
            if(
                $resource['plugin'] === $options['plugin'] &&
                (
                    $resource['controller'] === null || 
                    $resource['controller'] === "" || 
                    $resource['controller'] === "*"
                )
            ) {
                // debug('a');
                $hasAccess = true;
            }

            // plugin/controler/*
            if(
                $resource['plugin'] === $options['plugin'] &&
                $resource['controller'] === $options['controller'] &&
                (
                    $resource['action'] === "*" ||
                    $resource['action'] === "" ||
                    $resource['action'] === null
                )
            ) {
                 // debug('b');
                $hasAccess = true;
            }

            // plugin/controller/action/*
            if(
                $resource['plugin'] === $options['plugin'] &&
                $resource['controller'] === $options['controller'] &&
                $resource['action'] === $options['action']
            ) {
                // debug('c');
                $hasAccess = true;
            }

            //TODO:
            //named
            //query
        }

        if($hasAccess) {
            echo $this->Form->postLink(
            __($title), 
            $options,
            $html_options, 
            $confirmMessage
            );
        } else {
            return false;
        }
    }
}