<?php
class AdminFunctions
{
    const DEFAULT_LANGUAGE = 'en';

    const VALIDATE_TYPES_IMAGE = 0;
    const VALIDATE_TYPES_ARCHIVES = 1;
    const VALIDATE_TYPES_AUDIO_VIDEO = 2;
    const VALIDATE_TYPES_ADOBE = 3;

    public static function GenerateString($length = 8){
        $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        return $string;
    }

    public static function GetControllerNameById($controllerId)
    {
        $arrNames = array(
            'panel' => 'Arrington',
            'lmt' => 'LMT',
            'inlux' => 'INLUX'
        );

        if(array_key_exists($controllerId,$arrNames))
        {
            return $arrNames[$controllerId];
        }
        else
        {
            return "";
        }
    }

    public static function ListControllers()
    {
        /*
        return array(
            'http://arrington.alex.fabricums.com' => 'panel',
            'http://lmt.alex.fabricums.com' => 'lmt',
            'http://inlux.alex.fabricums.com' => 'inlux'
        );
        */

        return array(
            'http://arringtonsg.com' => 'panel',
            'http://lmthk.com' => 'lmt',
            'http://inlux.lt' => 'inlux'
        );

    }

    public static function ListAdminMenuLinks($controller = 'panel')
    {
        $list = array();

        switch($controller)
        {
            case 'panel':
                $list = array(
                    'Приветствие' => array('action' => 'index', 'icon' => 'info-icon'),
                    'Выход' => array('action' => 'logout', 'icon' => 'bin-icon'),
                    'Настройки' => array('icon' => 'settings-icon','links' => array('Seo' => 'seo', 'Языки' => 'languages', 'Переводы' => 'translations', 'Контакты' => 'contacts')),
                    'Категории' => array('icon' => 'lnk-icon', 'action' => 'treelist'),
                    'Блоки' => array('action' => 'pageslist', 'icon' => 'edit-icon'),
                );
                break;
            case 'lmt':
                $list = array(
                    'Приветствие' => array('action' => 'index', 'icon' => 'info-icon'),
                    'Выход' => array('action' => 'logout', 'icon' => 'bin-icon'),
                    'Настройки' => array('icon' => 'settings-icon','links' => array('Seo' => 'seo', 'Языки' => 'languages', 'Переводы' => 'translations', 'Контакты' => 'contacts')),
                    'Категории' => array('icon' => 'lnk-icon', 'action' => 'treelist'),
                    'Блоки' => array('action' => 'pageslist', 'icon' => 'edit-icon'),
                );
                break;
            case 'inlux':
                $list = array(
                    'Приветствие' => array('action' => 'index', 'icon' => 'info-icon'),
                    'Выход' => array('action' => 'logout', 'icon' => 'bin-icon'),
                    'Настройки' => array('icon' => 'settings-icon','links' => array('Seo' => 'seo', 'Языки' => 'languages', 'Переводы' => 'translations', 'Контакты' => 'contacts')),
                    'Категории' => array('icon' => 'lnk-icon', 'action' => 'treelist'),
                    'Блоки' => array('action' => 'pageslist', 'icon' => 'edit-icon'),
                );
                break;
        }

        return $list;
    }

    public static function GetMenuItemNameByActionName($strActionName)
    {
        $arrNames = array
        (
            'index' => array('Приветствие'),

            'seo' => array('Настройки', 'Seo'),

            'contacts' => array('Настройки', 'Контакты'),
            'conedit'=> array('Накстройки', 'Контакты', 'Редактировать'),
            'concreate' => array('Накстройки', 'Контакты', 'Создать'),

            'translations' => array('Настройки', 'Переводы'),
            'languages' => array('Настройки', 'Языки'),

            'treelist' => array('Категории'),
            'createtree' => array('Категории','Создать категорию'),
            'edittree' => array('Категории','Изменить категорию'),

            'lngedit' => array('Настройки', 'Языки', 'Редактировать язык'),
            'createlng' => array('Настройки', 'Языки', 'Создать язык'),

            'transcreate' => array('Настройки', 'Переводы', 'Добавить перевод'),
            'transedit' => array('Настройки', 'Переводы', 'Изменить перевод'),

            'pageslist' => array('Блоки'),
            'createpage' => array('Блоки', 'Создать'),
            'editpage' => array('Блоки', 'Изменить'),
        );

        if(isset($arrNames[$strActionName]))
        {
            return $arrNames[$strActionName];
        }
        else
        {
            return '';
        }
    }

    public static function IsValidFileType($type, $validateType = AdminFunctions::VALIDATE_TYPES_IMAGE)
    {
        $arrTypesImages = array
        (
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp'
        );

        $arrTypesArchives = array
        (
            'zip' => 'application/zip',
            'rar' => 'application/x-rar-compressed',
            'exe' => 'application/x-msdownload',
            'msi' => 'application/x-msdownload',
            'cab' => 'application/vnd.ms-cab-compressed'
        );

        $arrTypesArchives2 = array
        (
            'zip' => 'application/octet-stream',
            'rar' => 'application/octet-stream'
        );

        $arrTypesVideoAudio = array
        (
            'mp3' => 'audio/mpeg',
            'qt' => 'video/quicktime',
            'mov' => 'video/quicktime'
        );

        $arrTypesAdobe = array
        (
            'pdf' => 'application/pdf',
            'psd' => 'image/vnd.adobe.photoshop',
            'ai' => 'application/postscript',
            'eps' => 'application/postscript',
            'ps' => 'application/postscript'
        );

        switch($validateType)
        {
            case AdminFunctions::VALIDATE_TYPES_IMAGE:
                return in_array($type,$arrTypesImages);
                break;

            case AdminFunctions::VALIDATE_TYPES_ARCHIVES:
                return in_array($type,$arrTypesArchives) || in_array($type,$arrTypesArchives2);
                break;

            case AdminFunctions::VALIDATE_TYPES_AUDIO_VIDEO:
                return in_array($type,$arrTypesVideoAudio);
                break;

            case AdminFunctions::VALIDATE_TYPES_ADOBE:
                return in_array($type,$arrTypesAdobe);
                break;

            default:
                return in_array($type,$arrTypesImages);
                break;
        }

    }

    public static function GetAdminActionUrl($controller, $action, $params = array())
    {
        $url =  Yii::app()->request->baseUrl."/admin/".$controller."/".$action;

        if($params != null && !empty($params))
        {
            $paramsStr = "";

            foreach($params as $paramName => $paramValue)
            {
                if($paramName != '')
                {
                    $paramsStr.="/".$paramName."/".$paramValue;
                }
                else
                {
                    $paramsStr.="/".$paramValue;
                }
            }

            $url .= $paramsStr;
        }

        return $url;
    }
}