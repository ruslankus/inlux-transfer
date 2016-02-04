<?php

/**
 * This is the model class for table "content_unit".
 *
 * The followings are the available columns in table 'content_unit':
 * @property integer $id
 * @property integer $tree_id
 * @property string $branch
 * @property string $type
 * @property integer $price
 * @property integer $price_disscount
 * @property integer $price_sale
 * @property string $thumb
 * @property string $label
 * @property integer $priority
 * @property integer $status
 * @property integer $date_created
 * @property integer $date_changed
 */
class LmtContentUnit extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'content_unit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tree_id, price, price_disscount, price_sale, priority, status, date_created, date_changed', 'numerical', 'integerOnly'=>true),
			array('branch, type, thumb, label', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tree_id, branch, type, price, price_disscount, price_sale, thumb, label, priority, status, date_created, date_changed', 'safe', 'on'=>'search'),
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
			'tree_id' => 'LmtTree',
			'branch' => 'Branch',
			'type' => 'Type',
			'price' => 'Price',
			'price_disscount' => 'Price Disscount',
			'price_sale' => 'Price Sale',
			'thumb' => 'Thumb',
			'label' => 'Label',
			'priority' => 'Priority',
			'status' => 'Status',
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
		$criteria->compare('tree_id',$this->tree_id);
		$criteria->compare('branch',$this->branch,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('price_disscount',$this->price_disscount);
		$criteria->compare('price_sale',$this->price_sale);
		$criteria->compare('thumb',$this->thumb,true);
		$criteria->compare('label',$this->label,true);
		$criteria->compare('priority',$this->priority);
		$criteria->compare('status',$this->status);
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
		return Yii::app()->lmt;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LmtContentUnit the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /* A D D I T I O N A L */

    // get or create language object

    public function getLngObject($lng)
    {
        /* @var $lngObject LmtContentUnitLng */

        $lngObject = LmtContentUnitLng::model()->findByAttributes(array('object_id' => $this->id, 'language' => $lng));
        if($lngObject == null)
        {
            $lngObject = new LmtContentUnitLng();
            $lngObject->object_id = $this->id; $lngObject->language = $lng;
        }
        return $lngObject;
    }


    // delete language objects

    public function deleteLng()
    {
        /* @var $lngObject LmtContentUnitLng */

        $all = LmtContentUnitLng::model()->findAllByAttributes(array('object_id' => $this->id));
        foreach($all as $lngObject){$lngObject->delete();}
    }
}
