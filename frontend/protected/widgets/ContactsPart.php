<?php

class ContactsPart extends CWidget {

    public $part;

    public function run()
    {
        $contacts = null;

        if($this->part == 'left')
        {
            $contacts = LuxContactInfo::model()->findByAttributes(array('label' => '[LEFT]'));
        }
        if($this->part == 'right')
        {
            $contacts = LuxContactInfo::model()->findByAttributes(array('label' => '[RIGHT]'));
        }

        $this->render('contacts',array('contacts' => $contacts));
    }
}