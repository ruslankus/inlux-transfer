<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
    public $layout= '//layouts/main_layout';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
    
    public $lng_pref;

    // meta data
    public $keywords;
    public $title;
    public $description;

    public function __construct($id,$module=null){

        $language = Yii::app()->request->getParam('language',DEFAULT_LANGUAGE);
        DwHelper::SetLanguage($language);

        //set meta data
        $this->keywords = LuxSeo::getParam('keywords');
        $this->title = LuxSeo::getParam('title');
        $this->description = LuxSeo::getParam('description');

        parent::__construct($id,$module);
    }

}