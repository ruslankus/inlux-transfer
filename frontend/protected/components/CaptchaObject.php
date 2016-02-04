<?php

class CaptchaObject
{
    private $fileName;
    private $uniqueId;
    private $value;

    public function __construct($filename, $id, $value)
    {
        $this->fileName = $filename;
        $this->uniqueId = $id;
        $this->value = $value;
    }

    public function GetImgUrl()
    {
        $url = $url = Yii::app()->request->baseUrl.'/img/captcha/'.$this->fileName;
        return $url;
    }

    public function GetImgFile()
    {
        return $this->fileName;
    }

    public function GetId()
    {
        return $this->uniqueId;
    }

    public function GetValue()
    {
        return $this->value;
    }
}