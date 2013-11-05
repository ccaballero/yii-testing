<?php

/**
 * This is the model class for table "carrera".
 *
 * The followings are the available columns in table 'carrera':
 * @property integer $id_car
 * @property string $nombre_car
 *
 * The followings are the available model relations:
 * @property Estudiante[] $estudiantes
 */
class Carrera extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Carrera the static model class
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
		return 'carrera';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_car', 'required'),
			array('nombre_car', 'length', 'max'=>60),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_car, nombre_car', 'safe', 'on'=>'search'),
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
			'estudiantes' => array(self::HAS_MANY, 'Estudiante', 'id_car'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_car' => 'Id Carrera',
			'nombre_car' => 'Nombre Carrera',
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

		$criteria->compare('id_car',$this->id_car);
		$criteria->compare('nombre_car',$this->nombre_car,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}