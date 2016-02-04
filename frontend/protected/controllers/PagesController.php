<?php
class PagesController extends Controller
{
    public $defaultAction='index';

    public function actionIndex()
    {
        $error = Yii::app()->request->getParam('error',null);

        if($error == null){$this->render('contacts_form', array('error' => false));}
        else{$this->render('contacts_form', array('error' => true));}
    }
}