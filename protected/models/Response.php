<?php

/**
 * This is the model class for table "tbl_response".
 *
 * The followings are the available columns in table 'tbl_response':
 * @property integer $id
 * @property string $Intention
 * @property integer $political_party_id
 * @property integer $district_id
 *
 * The followings are the available model relations:
 * @property TblPoliticalParty $politicalParty
 * @property TblDistrict $district
 */
class response extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return response the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_response';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Intention, district_id', 'required'),
            array('political_party_id, district_id', 'numerical', 'integerOnly' => true),
            array('Intention', 'length', 'max' => 10),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, Intention, political_party_id, district_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'politicalParty' => array(self::BELONGS_TO, 'TblPoliticalParty', 'political_party_id'),
            'district' => array(self::BELONGS_TO, 'TblDistrict', 'district_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'Intention' => 'Intention',
            'political_party_id' => 'Political Party',
            'district_id' => 'District',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('Intention', $this->Intention, true);
        $criteria->compare('political_party_id', $this->political_party_id);
        $criteria->compare('district_id', $this->district_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    //get response intetion with group by
    public function responseIntention($attr = array(),$groupBy = array(),$params = array()) {
        
        $attrStr = 'COUNT(id) as total,';
        if ($attr != array()) {
            foreach ($attr as $key => $value) {
                if ($attrStr !== 'COUNT(id) as total,') {
                    $attrStr .= ' , ' . $value;
                } else {
                    $attrStr .= ' ' . $value;
                }
            }
        }
        
        $groupByStr = '';
        if ($groupBy != array()) {
            $groupByStr = 'GROUP BY ';
            foreach ($groupBy as $key => $value) {
                if ($groupByStr !== 'GROUP BY ') {
                    $groupByStr .= ' , ' . $value;
                } else {
                    $groupByStr .= ' ' . $value;
                }
            }
        }

        $where = '';
        if ($params != array()) {
            $where = ' WHERE ';
            foreach ($params as $key => $value) {
                if ($where !== ' WHERE ') {
                    $where .= ' AND ' . $value;
                } else {
                    $where .= ' ' . $value;
                }
            }
        }

        $sql_query = ' SELECT  '.$attrStr.' FROM `tbl_response` ' . $where . ' ' . $groupByStr;

        $responseIntention = Yii::app()->db->createCommand($sql_query)->queryAll();
        return $responseIntention;
    }

}