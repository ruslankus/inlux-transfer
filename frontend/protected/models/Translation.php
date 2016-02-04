<?php

/**
 * This is the model class for table "translation".
 *
 * The followings are the available columns in table 'translation':
 * @property integer $id
 * @property integer $status
 * @property string $label
 */
class Translation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'translation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status', 'numerical', 'integerOnly'=>true),
			array('label', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, status, label', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'status' => 'Status',
			'label' => 'Label',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('status',$this->status);
		$criteria->compare('label',$this->label,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @return CDbConnection the database connection used for this class
	 */
	public function getDbConnection()
	{
		return Yii::app()->arrington;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Translation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    // A D D I T I O N A L

    public function getLng($strLng)
    {
        $id = $this->id;
        $lng = TranslationLng::model()->findByAttributes(array('object_id' => $id, 'language' => $strLng));

        if($lng == null)
        {
            $lng = new TranslationLng();
            $lng->object_id = $id;
            $lng->language = $strLng;
            return $lng;
        }
        else
        {
            return $lng;
        }

    }

    public function deleteLng()
    {
        $lngObjAll = TranslationLng::model()->findAllByAttributes(array('object_id' => $this->id));
        foreach($lngObjAll as $item)
        {
            $item->delete();
        }
    }


    public function getWordByLng($strLng)
    {
        /* @var $lng TranslationLng */
        $lng = $this->getLng($strLng);
        return $lng->word;
    }

    public static function getTranslationFromWordOnSomeLng($str,$toLng)
    {
        /* @var $lng TranslationLng */
        /* @var $word Translation */
        /* @var $neededWord Translation */

        $ret = "";
        $neededWord = null;

        $allWords = Translation::model()->findAll();

        foreach($allWords as $word)
        {
            foreach(Constants::GetLngArray() as $lngIndex => $lng)
            {
                $strWord = $word->getWordByLng($lng);
                if($str == $strWord)
                {
                    $neededWord = $word;
                }
            }
        }

        if($neededWord != null)
        {
            $ret = $neededWord->getWordByLng($toLng);
        }
        else
        {
            $ret = $str;
        }

        return $ret;
    }

    public static function getTranslationFromDefiniteLng($str,$inputLng,$outputLng)
    {
        /* @var $lng TranslationLng */
        /* @var $lngResult TranslationLng */

        $lng = TranslationLng::model()->findByAttributes(array('language' => $inputLng, 'word' => $str));
        $objId =  $lng->object_id;
        $lngResult = TranslationLng::model()->findByAttributes(array('language' => $outputLng, 'object_id' => $objId));

        if($lngResult == null)
        {
            return $str;
        }
        else
        {
            return $lngResult->word;
        }

    }
}
