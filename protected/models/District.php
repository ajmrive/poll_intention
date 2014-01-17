<?php

/**
 * This is the model class for table "tbl_district".
 *
 * The followings are the available columns in table 'tbl_district':
 * @property string $id
 * @property string $Name
 * @property string $Population
 *
 * The followings are the available model relations:
 * @property TblResponse[] $tblResponses
 */
class District extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return District the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_district';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, Name, Population', 'required'),
			array('id', 'length', 'max'=>5),
			array('Name', 'length', 'max'=>45),
			array('Population', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Name, Population', 'safe', 'on'=>'search'),
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
			'tblResponses' => array(self::HAS_MANY, 'TblResponse', 'district_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Name' => 'Name',
			'Population' => 'Population',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Population',$this->Population,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}