<?php

class DwCaptcha
{
    private $arrCaptcha = array();

    private function InitCaptchaArray()
    {
        $this->arrCaptcha = array(
            new CaptchaObject('cap1.jpg','hfuyukg54xx4','9020'),
            new CaptchaObject('cap2.jpg','dsafsedrhf','5731'),
            new CaptchaObject('cap3.jpg','sfesfsvrsgz','90314'),
            new CaptchaObject('cap4.jpg','dfefsefdf566','8042'),
            new CaptchaObject('cap5.jpg','sadweda25d','62373'),
            new CaptchaObject('cap6.jpg','sad8675ddsdf8','0301'),
            new CaptchaObject('cap7.jpg','sad68dfs8675d','57710'),
            new CaptchaObject('cap8.jpg','zdf4f8esf','37142'),
            new CaptchaObject('cap9.jpg','zdf4hgjf8esf','56133'),
            new CaptchaObject('cap10.jpg','zlkgy874gkj','9370'),
            new CaptchaObject('cap11.jpg','zlksdf78645','6214'),
            new CaptchaObject('cap12.jpg','zlhgu6875dswe','0931'),
            new CaptchaObject('cap13.jpg','zlhxc48gu687sdf','40344'),
        );
    }

    public function GetRandomCaptcha()
    {
        $length = count($this->arrCaptcha);

        $currentCaptchaIndex = rand(1, $length) - 1;
        $currentCaptcha = $this->arrCaptcha[$currentCaptchaIndex];

        return $currentCaptcha;
    }

    public function CheckCaptcha($value,$id)
    {
        $passed = false;

        /* @var $item CaptchaObject*/
        foreach($this->arrCaptcha as $item)
        {
            if($item->GetId() == $id && $item->GetValue() == $value)
            {
                $passed = true;
            }
        }
        return $passed;
    }

    public function __construct()
    {
        $this->InitCaptchaArray();
    }
}

