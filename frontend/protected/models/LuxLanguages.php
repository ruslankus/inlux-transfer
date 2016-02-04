<?php

/**
 * This is the model class for table "languages".
 *
 * The followings are the available columns in table 'languages':
 * @property integer $id
 * @property string $label
 * @property string $original_language_name
 * @property string $english_language_name
 * @property string $russian_language_name
 * @property string $notification
 * @property string $prefix
 * @property integer $priority
 * @property integer $status
 */
class LuxLanguages extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'languages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('priority, status', 'numerical', 'integerOnly'=>true),
			array('label, original_language_name, english_language_name, russian_language_name, notification, prefix', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, label, original_language_name, english_language_name, russian_language_name, notification, prefix, priority, status', 'safe', 'on'=>'search'),
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
			'label' => 'Label',
			'original_language_name' => 'Original Language Name',
			'english_language_name' => 'English Language Name',
			'russian_language_name' => 'Russian Language Name',
			'notification' => 'Notification',
			'prefix' => 'Prefix',
			'priority' => 'Priority',
			'status' => 'Status',
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
		$criteria->compare('label',$this->label,true);
		$criteria->compare('original_language_name',$this->original_language_name,true);
		$criteria->compare('english_language_name',$this->english_language_name,true);
		$criteria->compare('russian_language_name',$this->russian_language_name,true);
		$criteria->compare('notification',$this->notification,true);
		$criteria->compare('prefix',$this->prefix,true);
		$criteria->compare('priority',$this->priority);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @return CDbConnection the database connection used for this class
	 */
	public function getDbConnection()
	{
		return Yii::app()->lux;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LuxLanguages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    //A D D I T I O N A L
    public static function getLngNameByPrefix($prefix)
    {
        /* @var $lngObj LuxLanguages */

        $lngObj = LuxLanguages::model()->findByAttributes(array('prefix' => $prefix));
        if($lngObj != null){return $lngObj->label;}
    }

    public static function getFlagUrlByPrefix($prefix)
    {
        /* @var $lngObj LuxLanguages */
        $flag = Yii::app()->request->baseUrl.'/'.Constants::IMG_DIR."flags/".$prefix.".jpg";
        return $flag;
    }

}
