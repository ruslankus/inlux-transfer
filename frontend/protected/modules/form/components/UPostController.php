<?php 
class UPostController extends Controller {
 
   	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	 public $layout='main';
    
    protected function beforeAction($action) {
        
       
        //$this->d(Yii::app()->user->getState('role'));
        if (Yii::app()->controller->action->id !=='login' && Yii::app()->controller->action->id !=='pass')                       
            if (Yii::app()->user->isGuest || Yii::app()->user->getState('role') !== 'auth_user'){
                
                $this->redirect(Yii::app()->user->loginUrl);
            }
                

        return parent::beforeAction($action);
    }
   
}
?>