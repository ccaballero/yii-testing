<?php

/**
 * This is the model class for table "estudiante".
 *
 * The followings are the available columns in table 'estudiante':
 * @property integer $id_est
 * @property integer $id_car
 * @property integer $cod_sis_est
 * @property string $nombre_est
 *
 * The followings are the available model relations:
 * @property Carrera $idCar
 * @property Usuario[] $usuarios
 */
class Estudiante extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Estudiante the static model class
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
		return 'estudiante';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
            //////ak es importante estooooooooooooooooo para l abse de datos
		return array(
			array('id_car, cod_juez, nombre_juez,nombre_universidad,nivel_academico', 'required'),
			array('id_car, cod_juez', 'numerical', 'integerOnly'=>true,'message'=>'tiene que introducir un numero'),
			array('nombre_juez', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_est, id_car, cod_juez, nombre_juez', 'safe', 'on'=>'search'),
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
			'idCar' => array(self::BELONGS_TO, 'Carrera', 'id_car'),
			'usuarios' => array(self::MANY_MANY, 'Usuario', 'usuario_estudiante(id_est, id_usu)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{////esto se muestra en la formato de registrar
            //ak se muestra par alos no puede ser nulo
		return array(
			'id_est' => 'Id Est',
			'id_car' => 'Carrera perteneciente del Juez',
			'cod_juez' => 'Codigo Juez',
			'nombre_juez' => 'Nombre Juez',
                    'nombre_universidad' => 'Nombre Universidad',
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

		$criteria->compare('id_est',$this->id_est);
		$criteria->compare('id_car',$this->id_car);
		$criteria->compare('cod_juez',$this->cod_juez);
		$criteria->compare('nombre_juez',$this->nombre_juez,true);
                $criteria->compare('nombre_universidad',$this->nombre_universidad,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function nombreCarrera(){
		return $this->idCar->nombre_car;
	}
}