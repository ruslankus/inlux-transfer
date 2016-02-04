<?php

/**
 * This is the model class for table "seo".
 *
 * The followings are the available columns in table 'seo':
 * @property string $site_title
 * @property string $site_keywords
 * @property string $site_description
 * @property integer $id
 * @property string $label
 */
class LmtSeo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'seo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('site_title, site_keywords, site_description, label', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('site_title, site_keywords, site_description, id, label', 'safe', 'on'=>'search'),
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
			'site_title' => 'Site Title',
			'site_keywords' => 'Site Keywords',
			'site_description' => 'Site Description',
			'id' => 'ID',
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

		$criteria->compare('site_title',$this->site_title,true);
		$criteria->compare('site_keywords',$this->site_keywords,true);
		$criteria->compare('site_description',$this->site_description,true);
		$criteria->compare('id',$this->id);
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
		return Yii::app()->lmt;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LmtSeo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /* A D D I T I O N A L */

    public static function getParam($type = 'title')
    {
        /* @var $seo LmtSeo */

        $seoArr = LmtSeo::model()->findAll();
        $seo = $seoArr[0];

        $result = "";

        if($seo != null)
        {
            switch($type)
            {
                case 'title':
                    $jsonArr = $seo->site_title;
                    $arr = json_decode($jsonArr,true);
                    $result = $arr[$language = Yii::app()->language];
                    break;
                case 'keywords':
                    $jsonArr = $seo->site_keywords;
                    $arr = json_decode($jsonArr,true);
                    $result = $arr[$language = Yii::app()->language];
                    break;
                case 'description':
                    $jsonArr = $seo->site_description;
                    $arr = json_decode($jsonArr,true);
                    $result = $arr[$language = Yii::app()->language];
                    break;
            }
        }

        return $result;
    }

}
