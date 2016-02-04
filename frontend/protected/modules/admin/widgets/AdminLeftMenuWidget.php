<?php

class AdminLeftMenuWidget extends CWidget {

    //this value sets in view template
    public $controller_name;

    public function run(){
        //render top menu widget
        $this->render('adminLeftMenu',array('current_controller' => $this->controller_name, 'controllers' => AdminFunctions::ListControllers()));
    }

}