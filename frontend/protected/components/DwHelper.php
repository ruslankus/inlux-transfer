<?php

class DwHelper
{
    public static function debugvar($var, $title = '')
    {
        ob_start();
        if( $title )
            echo "$title\n";
        print_r($var);
        $out = ob_get_clean();
        echo "<pre>";
        echo htmlentities($out);
        echo "</pre>";
    }


    public  static function swapPriorities($object1, $object2)
    {
        //if objects not null
        if($object1 != null && $object2 != null)
        {
            //store first object's priority
            $pr1 = $object1->priority;
            //assign to first object priority pf second
            $object1->priority = $object2->priority;
            //assign to second object stored first object's priority
            $object2->priority = $pr1;

            //update both
            $object1->update();
            $object2->update();
        }
    }

    public static function url_slug($str, $options = array()) {
        // Make sure string is in UTF-8 and strip invalid UTF-8 characters
        $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());

        $defaults = array(
            'delimiter' => '-',
            'limit' => null,
            'lowercase' => true,
            'replacements' => array(),
            'transliterate' => true,
        );

        // Merge options
        $options = array_merge($defaults, $options);

        $char_map = array(
            // Latin
            'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
            'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
            'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
            'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
            'ß' => 'ss',
            'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
            'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
            'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
            'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
            'ÿ' => 'y',

            // Latin symbols
            '©' => '(c)',

            // Greek
            'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
            'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
            'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
            'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
            'Ϋ' => 'Y',
            'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
            'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
            'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
            'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
            'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',

            // Turkish
            'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
            'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',

            // Russian
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
            'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
            'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
            'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
            'Я' => 'Ya',
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
            'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
            'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
            'я' => 'ya',

            // Ukrainian
            'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
            'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',

            // Czech
            'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
            'Ž' => 'Z',
            'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
            'ž' => 'z',

            // Polish
            'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
            'Ż' => 'Z',
            'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
            'ż' => 'z',

            // Latvian
            'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
            'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
            'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
            'š' => 's', 'ū' => 'u', 'ž' => 'z'
        );

        // Make custom replacements
        $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);

        // Transliterate characters to ASCII
        if ($options['transliterate']) {
            $str = str_replace(array_keys($char_map), $char_map, $str);
        }

        // Replace non-alphanumeric characters with our delimiter
        $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);

        // Remove duplicate delimiters
        $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);

        // Truncate slug to max. characters
        $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');

        // Remove delimiter from ends
        $str = trim($str, $options['delimiter']);

        return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
    }

    public static function SetLanguage($lng = DEFAULT_LANGUAGE)
    {

        /* set language in config */
        Yii::app()->language = $lng;

        /* set language in user state */
        Yii::app()->user->setState('language', $lng);

        /* set language in cookie */
        Yii::app()->request->cookies['language'] = new CHttpCookie('lng', $lng);

        /* if user has language - set it*/
        if (Yii::app()->user->hasState('language')){Yii::app()->language = Yii::app()->user->getState('language');}

        /* if not, but if have in cookie - set from cookie */
        elseif(isset(Yii::app()->request->cookies['language'])){Yii::app()->language = Yii::app()->request->cookies['language']->value;}
    }

    public static function isJson($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }


    // W O R K  W I T H  P R I O R I T I E S

    public static function movePriorityComplex($movingObject,$direction,$criteria_value,$criteria_field_name,$className,$order_by = 'priority')
    {
        /* @var $className CActiveRecord */

        $all = $className::model()->findAllByAttributes(array($criteria_field_name => $criteria_value),array('order' => $order_by.' ASC'));

        foreach($all as $index => $obj)
        {
            if($obj == $movingObject)
            {
                if($direction == 'up' && isset($all[$index - 1]))
                {
                    DwHelper::swapPriorities($all[$index-1],$obj);
                }

                if($direction == 'down' && isset($all[$index + 1]))
                {
                    DwHelper::swapPriorities($all[$index+1],$obj);
                }
            }
        }
    }

    public static function movePriority($movingObject,$direction,$className,$order_by = 'priority')
    {
        /* @var $className CActiveRecord */

        $all = $className::model()->findAll(array('order' => $order_by.' ASC'));

        foreach($all as $index => $obj)
        {
            if($obj == $movingObject)
            {
                if($direction == 'up' && isset($all[$index - 1]))
                {
                    DwHelper::swapPriorities($all[$index-1],$obj);
                }

                if($direction == 'down' && isset($all[$index + 1]))
                {
                    DwHelper::swapPriorities($all[$index+1],$obj);
                }
            }
        }
    }

    public static function getNextPriorityComplex($className,$criteria_value,$criteria_field_name)
    {
        /* @var $className CActiveRecord */

        $all = $className::model()->findAllByAttributes(array($criteria_field_name => $criteria_value));

        $max = 0;

        foreach($all as $item)
        {
            if($item->priority > $max){$max = $item->priority;}
        }

        return $max+1;
    }

    public static function getNextPriority($className)
    {
        /* @var $className CActiveRecord */

        $all = $className::model()->findAll();

        $max = 0;

        foreach($all as $item)
        {
            if($item->priority > $max){$max = $item->priority;}
        }

        return $max+1;
    }


    // W O R K  W I T H  F I L E  U P L O A D S

    public static function uploadPicAndGetPath($FILES,$fieldName,$delete_old,$returnFullPath = false)
    {
        if($FILES[$fieldName]['size'] > 0)
        {
            //get type
            $mimeType = $FILES[$fieldName]['type'];
            //explode name string to get extension
            $extensionArr = explode(".",$_FILES[$fieldName]['name']);
            //get temp name
            $tmp_name = $FILES[$fieldName]['tmp_name'];

            //if type is valid
            if(AdminFunctions::IsValidFileType($mimeType,AdminFunctions::VALIDATE_TYPES_IMAGE))
            {
                //empty extension by default
                $extension = '';

                //get extension from exploded string-array if possible
                if(count($extensionArr) > 1)
                {
                    $extension = $extensionArr[count($extensionArr)-1];
                }

                //make random file name and add extension to it
                $randomFileName = AdminFunctions::generateString(15).".".$extension;
                //make new file path
                $newFilePath = Constants::UPLOAD_IMG_DIR.$randomFileName;

                //try to copy
                if(copy($tmp_name, $newFilePath))
                {
                    DwHelper::deletePicture($delete_old);
                    if($returnFullPath){return $newFilePath;}
                    else{return $randomFileName;}
                }
                else
                {
                    return "";
                }
            }
            else
            {
                return "";
            }
        }
        else
        {
            return "";
        }
    }


    public static function uploadFileAndGetPath($FILES,$fieldName,$delete_old,$type = AdminFunctions::VALIDATE_TYPES_ADOBE,$returnFullPath = false, &$size = null)
    {
        if($FILES[$fieldName]['size'] > 0)
        {
            //get type
            $mimeType = $FILES[$fieldName]['type'];
            //explode name string to get extension
            $extensionArr = explode(".",$_FILES[$fieldName]['name']);
            //get temp name
            $tmp_name = $FILES[$fieldName]['tmp_name'];

            //if type is valid
            if(AdminFunctions::IsValidFileType($mimeType,$type))
            {
                //empty extension by default
                $extension = '';

                //get extension from exploded string-array if possible
                if(count($extensionArr) > 1)
                {
                    $extension = $extensionArr[count($extensionArr)-1];
                }

                //make random file name and add extension to it
                $randomFileName = AdminFunctions::generateString(15).".".$extension;
                //make new file path
                $newFilePath = Constants::UPLOAD_FILE_DIR.$randomFileName;

                //try to copy
                if(copy($tmp_name, $newFilePath))
                {
                    if($size != null){$size = $FILES[$fieldName]['size'];}
                    DwHelper::deleteFile($delete_old);
                    if($returnFullPath){return $newFilePath;}
                    else{return $randomFileName;}
                }
                else
                {
                    return "";
                }
            }
            else
            {
                return "";
            }
        }
        else
        {
            return "";
        }
    }

    public static function deleteFile($file_name)
    {
        if($file_name != "" && $file_name != '')
        {
            $rel_path = "uploaded/".$file_name;
            if(file_exists($rel_path)){unlink($rel_path);}
        }
    }

    public static function deletePicture($image_name)
    {
        if($image_name != "" && $image_name != '')
        {
            $rel_path = "img/".$image_name;
            if(file_exists($rel_path)){unlink($rel_path);}
        }
    }

}