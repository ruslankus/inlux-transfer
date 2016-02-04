<?php
class Translations
{
   public static function Translate($strWord)
   {
       //must specify the source language and word to get translation
       return LuxTranslation::getTranslationFromDefiniteLng($strWord,INPUT_LANGUAGE,$language = Yii::app()->language);

       //must just specify word on any language to get translation (eats lots of server resources - low performance)
//       return Translation::getTranslationFromWordOnSomeLng($strWord,Yii::app()->language);
   }
}