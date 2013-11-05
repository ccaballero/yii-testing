<?php

/**
 * This is the model class for table "video".
 *
 * The followings are the available columns in table 'video':
 * @property integer $id_usu
 * @property integer $id_arc
 * @property integer $id_for_vid
 * @property string $duracion
 *
 * The followings are the available model relations:
 * @property Archivo $idUsu
 * @property Archivo $idArc
 * @property FormatoVideo $idForV
 */
class Video extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Video the static model class
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
		return 'video';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usu, id_arc, id_for_vid', 'required'),
			array('id_usu, id_arc, id_for_vid', 'numerical', 'integerOnly'=>true),
			array('duracion', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_usu, id_arc, id_for_vid, duracion', 'safe', 'on'=>'search'),
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
			'idUsu' => array(self::BELONGS_TO, 'Archivo', 'id_usu'),
			'idArc' => array(self::BELONGS_TO, 'Archivo', 'id_arc'),
			'idForV' => array(self::BELONGS_TO, 'FormatoVideo', 'id_for_vid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_usu' => 'Id Usu',
			'id_arc' => 'Id Arc',
			'id_for_vid' => 'Id For Vid',
			'duracion' => 'Duracion',
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

		$criteria->compare('id_usu',$this->id_usu);
		$criteria->compare('id_arc',$this->id_arc);
		$criteria->compare('id_for_vid',$this->id_for_vid);
		$criteria->compare('duracion',$this->duracion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}