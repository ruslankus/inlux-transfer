<?php

class FormModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'form.models.*',
			'form.components.*',
		));
        
        
         Yii::app()->setComponents(array(
          
            'user' => array(
                'class' => 'CWebUser',             
                'loginUrl' => Yii::app()->createUrl('form/card/login'),
            )
        ));
        
        $this->layoutPath = Yii::getPathOfAlias('form.views.layouts');
        $this->layout = 'main'; 
        
        
	}//init;

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
