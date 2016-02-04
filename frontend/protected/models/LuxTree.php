<?php

/**
 * This is the model class for table "tree".
 *
 * The followings are the available columns in table 'tree':
 * @property integer $id
 * @property integer $parent_id
 * @property string $branch
 * @property string $label
 * @property integer $type
 * @property integer $status
 * @property integer $priority
 * @property string $access
 * @property integer $user_id
 * @property integer $date_created
 * @property integer $date_changed
 */
class LuxTree extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tree';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_id, type, status, priority, user_id, date_created, date_changed', 'numerical', 'integerOnly'=>true),
			array('branch, label, access', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, parent_id, branch, label, type, status, priority, access, user_id, date_created, date_changed', 'safe', 'on'=>'search'),
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
			'parent_id' => 'Parent',
			'branch' => 'Branch',
			'label' => 'Label',
			'type' => 'Type',
			'status' => 'Status',
			'priority' => 'Priority',
			'access' => 'Access',
			'user_id' => 'User',
			'date_created' => 'Date Created',
			'date_changed' => 'Date Changed',
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
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('branch',$this->branch,true);
		$criteria->compare('label',$this->label,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('status',$this->status);
		$criteria->compare('priority',$this->priority);
		$criteria->compare('access',$this->access,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('date_created',$this->date_created);
		$criteria->compare('date_changed',$this->date_changed);

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
	 * @return LuxTree the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /* A D D I T I O N A L */

    // get or create language object

    public function getLngObject($lng)
    {
        /* @var $lngObject LuxTreeLng */

        $lngObject = LuxTreeLng::model()->findByAttributes(array('object_id' => $this->id, 'language' => $lng));
        if($lngObject == null)
        {
            $lngObject = new LuxTreeLng();
            $lngObject->object_id = $this->id; $lngObject->language = $lng;
        }
        return $lngObject;
    }


    // delete language objects

    public function deleteLng()
    {
        /* @var $lngObject LuxTreeLng */

        $all = LuxTreeLng::model()->findAllByAttributes(array('object_id' => $this->id));
        foreach($all as $lngObject){$lngObject->delete();}
    }
}
