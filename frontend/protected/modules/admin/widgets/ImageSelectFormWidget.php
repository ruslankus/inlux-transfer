<?php

class ImageSelectFormWidget extends CWidget {

    //this value sets in view template
    public $imageTypes;

    public $parentType;
    public $parentId;

    public function run(){
        //render top menu widget
        $this->render('imageSelectForm',array('types' => $this->imageTypes,'parentType' => $this->parentType, 'parentId' => $this->parentId));
    }

}