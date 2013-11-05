<?php

/**
 * This is the model class for table "comite".
 *
 * The followings are the available columns in table 'comite':
 * @property integer $codigo_comite
 * @property string $nombre_comite
 * @property string $apellido_comite
 * @property string $carrera
 * @property string $direccion
 * @property integer $telefono
 * @property integer $id_ciudad
 * @property integer $id_uni
 *
 * The followings are the available model relations:
 * @property Universidad $idUni
 * @property Ciudad $idCiudad
 */
class Comite extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Comite the static model class
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
		return 'comite';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                    array('nombre_comite,apellido_comite,carrera,direccion,telefono', 'required','message'=>'El campo no puede estar vacio.'),
			array('telefono', 'numerical', 'integerOnly'=>true),
			array('nombre_comite, carrera', 'length', 'max'=>20),
			array('apellido_comite, direccion', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('codigo_comite, nombre_comite, apellido_comite, carrera, direccion, telefono, id_ciudad, id_uni', 'safe', 'on'=>'search'),
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
			'idUni' => array(self::BELONGS_TO, 'Universidad', 'id_uni'),
			'idCiudad' => array(self::BELONGS_TO, 'Ciudad', 'id_ciudad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codigo_comite' => 'Codigo Comite',
			'nombre_comite' => 'Nombre Comite',
			'apellido_comite' => 'Apellido Comite',
			'carrera' => 'Carrera',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'id_ciudad' => 'Id Ciudad',
			'id_uni' => 'Id Uni',
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

		$criteria->compare('codigo_comite',$this->codigo_comite);
		$criteria->compare('nombre_comite',$this->nombre_comite,true);
		$criteria->compare('apellido_comite',$this->apellido_comite,true);
		$criteria->compare('carrera',$this->carrera,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono);
		$criteria->compare('id_ciudad',$this->id_ciudad);
		$criteria->compare('id_uni',$this->id_uni);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}