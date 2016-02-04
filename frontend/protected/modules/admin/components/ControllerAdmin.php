<?php

class ControllerAdmin extends CController
{

    public $layout= '/layout/base_admin';

    public function __construct($id,$module=null){

        parent::__construct($id,$module);
    }

    protected function beforeAction($action) {

        /* @var $user_record UsersYii */

        /* L O G I N  B Y  T O K E N */

        //if guest
        if(Yii::app()->user->isGuest)
        {
            //get token form url (or post)
            $token =  Yii::app()->request->getParam('token',null);

            $userIdentity = new UserIdentity(null,null,$token);
            if($userIdentity->authenticate()){Yii::app()->user->login($userIdentity);}
        }

        /* L O G I N  B Y  P A S S W O R D  F R O M  L O G I N  F O R M */

        if (Yii::app()->controller->action->id!=='login')
        {
            if (Yii::app()->user->isGuest)
            {
                $this->redirect($this->createUrl('/admin/inlux/login'));
            }
        }

        return parent::beforeAction($action);
    }
}