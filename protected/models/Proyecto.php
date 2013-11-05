<?php

/**
 * This is the model class for table "proyecto".
 *
 * The followings are the available columns in table 'proyecto':
 * @property integer $id_usu
 * @property integer $id_are
 * @property string $nombre_proy
 *
 * The followings are the available model relations:
 * @property Area $idAre
 * @property Usuario $idUsu
 * @property Tag[] $tags
 * @property Archivo[] $archivos
 */
class Proyecto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Proyecto the static model class
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
		return 'proyecto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usu, id_are, nombre_proy', 'required'),
			array('id_usu, id_are', 'numerical', 'integerOnly'=>true),
			array('nombre_proy', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_usu, id_are, nombre_proy', 'safe', 'on'=>'search'),
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
			'idAre' => array(self::BELONGS_TO, 'Area', 'id_are'),
			'idUsu' => array(self::BELONGS_TO, 'Usuario', 'id_usu'),
			'tags' => array(self::MANY_MANY, 'Tag', 'usuario_tag(id_usu, id_tag)'),
			'archivos' => array(self::HAS_MANY, 'Archivo', 'id_usu'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_usu' => 'Id Usu',
			'id_are' => 'Id Are',
			'nombre_proy' => 'Nombre Proy',
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
		$criteria->compare('id_are',$this->id_are);
		$criteria->compare('nombre_proy',$this->nombre_proy,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}