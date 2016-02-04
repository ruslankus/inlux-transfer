<?php

/**
 * This is the model class for table "contact_info".
 *
 * The followings are the available columns in table 'contact_info':
 * @property integer $id
 * @property string $label
 * @property string $email_1
 * @property string $email_2
 * @property string $phone_1
 * @property string $phone_2
 * @property string $phone_3
 * @property string $administrator_email
 * @property string $moderator_email
 * @property string $feedback_restricted_ips
 * @property string $map_image
 * @property string $map_link
 */
class LuxContactInfo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contact_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('label, email_1, email_2, phone_1, phone_2, phone_3, administrator_email, moderator_email, feedback_restricted_ips, map_image, map_link', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, label, email_1, email_2, phone_1, phone_2, phone_3, administrator_email, moderator_email, feedback_restricted_ips, map_image, map_link', 'safe', 'on'=>'search'),
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
			'email_1' => 'Email 1',
			'email_2' => 'Email 2',
			'phone_1' => 'Phone 1',
			'phone_2' => 'Phone 2',
			'phone_3' => 'Phone 3',
			'administrator_email' => 'Administrator Email',
			'moderator_email' => 'Moderator Email',
			'feedback_restricted_ips' => 'Feedback Restricted Ips',
			'map_image' => 'Map Image',
			'map_link' => 'Map Link',
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
		$criteria->compare('email_1',$this->email_1,true);
		$criteria->compare('email_2',$this->email_2,true);
		$criteria->compare('phone_1',$this->phone_1,true);
		$criteria->compare('phone_2',$this->phone_2,true);
		$criteria->compare('phone_3',$this->phone_3,true);
		$criteria->compare('administrator_email',$this->administrator_email,true);
		$criteria->compare('moderator_email',$this->moderator_email,true);
		$criteria->compare('feedback_restricted_ips',$this->feedback_restricted_ips,true);
		$criteria->compare('map_image',$this->map_image,true);
		$criteria->compare('map_link',$this->map_link,true);

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
	 * @return LuxContactInfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /* A D D I T I O N A L */

    // get or create language object

    public function getLngObject($lng)
    {
        /* @var $lngObject LuxContactInfoLng */

        $lngObject = LuxContactInfoLng::model()->findByAttributes(array('object_id' => $this->id, 'language' => $lng));
        if($lngObject == null)
        {
            $lngObject = new LuxContactInfoLng();
            $lngObject->object_id = $this->id; $lngObject->language = $lng;
        }
        return $lngObject;
    }


    // delete language objects

    public function deleteLng()
    {
        /* @var $lngObject LuxContactInfoLng */

        $all = LuxContactInfoLng::model()->findAllByAttributes(array('object_id' => $this->id));
        foreach($all as $lngObject){$lngObject->delete();}
    }
}
