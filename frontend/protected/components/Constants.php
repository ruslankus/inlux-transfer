<?php
class Constants
{
    const STATUS_VISIBLE = 1;
    const STATUS_HIDDEN = 0;
    const STATUS_DELETED = -1;

    const CURRENTLY_USED_MODULE = "application"; /* if used as module - write module name */
    const MODULE_PREFIX_FOR_URL = ''; /* write module name with slash '/' - used in url forming */

    const IMG_DIR = 'images/';
    const UPLOAD_IMG_DIR = 'img/uploaded/';
    const UPLOAD_FILE_DIR = 'uploaded/';

    const TYPE_TEXT_PAGE_1_ARRINGTON = 5;
    const TYPE_TEXT_PAGE_2_ARRINGTON = 9;
    const TYPE_CONTACT_FORM_ONLY_ARRINGTON = 12;
    const TYPE_TITLE_PAGE_ARRINGTON = 8;


    const LUX_TYPE_HOME_PAGE_1 = 95;
    const LUX_TYPE_HOME_PAGE_2 = 85;

    const LUX_TYPE_SERVICE_PAGE_1 = 53;
    const LUX_TYPE_SERVICE_PAGE_2 = 43;

    const LUX_TYPE_ABOUT_PAGE_1 = 23;
    const LUX_TYPE_ABOUT_PAGE_2 = 34;

    const LUX_TYPE_CONTACTS_1 = 55;
    const LUX_TYPE_CONTACTS_2 = 66;


    const TYPE_GALLERY = 3;
    const TYPE_PRODUCTS = 7;

    const TYPE_TEXT_BLOCK = 5;

    public static function TypesArray()
    {
        $array = array(
            'LMT & Arrington - Текстовые блоки (тип 1)' => self::TYPE_TEXT_PAGE_1_ARRINGTON,
            'LMT & Arrington - Текстовые блоки (тип 2)' => self::TYPE_TEXT_PAGE_2_ARRINGTON,
            'LMT & Arrington - Титульная страница' => self::TYPE_TITLE_PAGE_ARRINGTON,
            'LMT & Arrington - Форма контактов' => self::TYPE_CONTACT_FORM_ONLY_ARRINGTON,

            'INLUX - главная страница (половина 1)' => self::LUX_TYPE_ABOUT_PAGE_1,
            'INLUX - главная страница (половина 2)' => self::LUX_TYPE_ABOUT_PAGE_2,
            'INLUX - страница услуг (половина 1)' => self::LUX_TYPE_SERVICE_PAGE_1,
            'INLUX - страница услуг (половина 2)' => self::LUX_TYPE_SERVICE_PAGE_2,
            'INLUX - страница "О нас" (половина 1)' => self::LUX_TYPE_SERVICE_PAGE_1,
            'INLUX - страница "О нас" (половина 2)' => self::LUX_TYPE_SERVICE_PAGE_2,
            'INLUX - страница контактов (половина 1)' => self::LUX_TYPE_CONTACTS_1,
            'INLUX - страница контактов (половина 2)' => self::LUX_TYPE_CONTACTS_2,
        );

        return $array;
    }

    public static function TypesArrayForContent()
    {
        $array = array(
            'Текстовый блок' => self::TYPE_TEXT_BLOCK,
        );

        return $array;
    }

    /* get list of used on site languages from database */
    public static function GetLngArray()
    {
        /* @var $item Languages */
        $lngArr = array();

        //if admin controller - arrington controller
        if(Yii::app()->controller->id == 'panel')
        {
            $all = Languages::model()->findAllByAttributes(array('status' => Constants::STATUS_VISIBLE),array('order' => 'priority ASC'));
        }
        //if admin controller - lmt controller
        elseif(Yii::app()->controller->id == 'lmt')
        {
            $all = LmtLanguages::model()->findAllByAttributes(array('status' => Constants::STATUS_VISIBLE),array('order' => 'priority ASC'));
        }
        //if admin controller - inlux(this site) controller
        else
        {
            $all = LuxLanguages::model()->findAllByAttributes(array('status' => Constants::STATUS_VISIBLE),array('order' => 'priority ASC'));
        }

        foreach($all as $item)
        {
            $lngArr[$item->notification] = $item->prefix;
        }

        if(empty($lngArr) || count($lngArr) == 0){$lngArr[strtoupper(DEFAULT_LANGUAGE)] = DEFAULT_LANGUAGE;}

        return $lngArr;
    }
}