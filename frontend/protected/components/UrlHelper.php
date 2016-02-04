<?php
class UrlHelper
{
    public static function GetImageUrl($fineName)
    {
        $url = Yii::app()->request->baseUrl.'/'.Constants::IMG_DIR.$fineName;
        return $url;
    }

    public static function GetUploadedImageUrl($fineName)
    {
        $url = Yii::app()->request->baseUrl.'/'.Constants::UPLOAD_IMG_DIR.$fineName;

        if(!file_exists(Constants::UPLOAD_IMG_DIR.$fineName) || $fineName == "")
        {
            $url = Yii::app()->request->baseUrl.'/'.'img/no-photo.jpg';
        }

        return $url;
    }

    public static function GetUploadedFileUrl($fineName,$default='#')
    {
        $url = Yii::app()->request->baseUrl.'/'.Constants::UPLOAD_FILE_DIR.$fineName;

        if(!file_exists(Constants::UPLOAD_FILE_DIR.$fineName) || $fineName == "")
        {
            $url = $default;
        }

        return $url;
    }

    public static function GetIndexUrl()
    {
        $url =  Yii::app()->request->baseUrl."/".Constants::MODULE_PREFIX_FOR_URL;
        return $url;
    }

    public static function GetPagesSeoUrl($cat_id,$name,$slug = false)
    {
        $title = $name;
        if($slug){$title = DwHelper::url_slug($name);}
        $url = Yii::app()->request->baseUrl."/".Yii::app()->language."/page/".$cat_id."/".$title;
        return $url;
    }

    public static function GetActionUrl($controller, $action, $params = array())
    {
        $url = Yii::app()->request->baseUrl."/".Constants::MODULE_PREFIX_FOR_URL.Yii::app()->language."/".$controller."/".$action;

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

    public static function GetChangingLanguageUrl($lang)
    {
        $current_url = Yii::app()->request->requestUri;
        $explodedUrl = explode("/",$current_url);
        if(Constants::MODULE_PREFIX_FOR_URL != ''){$explodedUrl[2] = $lang;}else{$explodedUrl[1] = $lang;}
        $finalString = implode("/",$explodedUrl);
        return $finalString;
    }

    public static function GetParamVal($paramName, $default = '')
    {
        return Yii::app()->request->getParam($paramName,$default);
    }
}