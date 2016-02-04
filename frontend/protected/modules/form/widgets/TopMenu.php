<?php

class TopMenu extends CWidget {

    public function run(){
        
        $name = Yii::app()->user->getState('name');
        
        //render top menu widget
        $this->render('top_menu',array('name' => $name));
    }
}