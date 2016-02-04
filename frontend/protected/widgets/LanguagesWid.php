<?php

class LanguagesWid extends CWidget {

    public function run(){
        //render top menu widget
        $this->render('languages',array('languages' => Constants::GetLngArray()));
    }
}