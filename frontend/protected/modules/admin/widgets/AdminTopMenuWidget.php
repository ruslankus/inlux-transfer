<?php

class AdminTopMenuWidget extends CWidget {

    //this value sets in view template
    public $current_action;
    public $controller_name;

    public function run(){

        //render top menu widget
        $this->render('adminTopMenu',array('current_action' => $this->current_action, 'controller_name' => $this->controller_name));
    }

}