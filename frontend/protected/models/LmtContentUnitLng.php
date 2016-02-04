<?php

/**
 * This is the model class for table "content_unit_lng".
 *
 * The followings are the available columns in table 'content_unit_lng':
 * @property integer $id
 * @property integer $object_id
 * @property string $language
 * @property string $description
 * @property string $text
 * @property string $additional_text
 * @property string $title
 * @property string $thumb
 * @property string $settings_json
 */
class LmtContentUnitLng extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'content_unit_lng';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('object_id', 'numerical', 'integerOnly'=>true),
			array('language, description, text, additional_text, title, thumb, settings_json', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, object_id, language, description, text, additional_text, title, thumb, settings_json', 'safe', 'on'=>'search'),
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
			'object_id' => 'Object',
			'language' => 'Language',
			'description' => 'Description',
			'text' => 'Text',
			'additional_text' => 'Additional Text',
			'title' => 'Title',
			'thumb' => 'Thumb',
			'settings_json' => 'Settings Json',
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
		$criteria->compare('object_id',$this->object_id);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('additional_text',$this->additional_text,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('thumb',$this->thumb,true);
		$criteria->compare('settings_json',$this->settings_json,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @return CDbConnection the database connection used for this class
	 */
	public function getDbConnection()
	{
		return Yii::app()->lmt;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LmtContentUnitLng the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

}
