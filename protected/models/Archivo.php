<?php

/**
 * This is the model class for table "archivo".
 *
 * The followings are the available columns in table 'archivo':
 * @property integer $id_usu
 * @property integer $id_arc
 * @property string $nombre_arc
 * @property string $url_arc
 * @property double $tamano_arc
 * @property double $version_arc
 *
 * The followings are the available model relations:
 * @property Pdf[] $pdfs
 * @property Pdf[] $pdfs1
 * @property Proyecto $idUsu
 * @property Video[] $videos
 * @property Video[] $videos1
 */
class Archivo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Archivo the static model class
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
		return 'archivo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usu, nombre_arc, url_arc', 'required'),
			array('id_usu', 'numerical', 'integerOnly'=>true),
			array('tamano_arc, version_arc', 'numerical'),
			array('nombre_arc', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_usu, id_arc, nombre_arc, url_arc, tamano_arc, version_arc', 'safe', 'on'=>'search'),
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
			'pdfs' => array(self::HAS_ONE, 'Pdf', 'id_usu'),
			'pdfs1' => array(self::HAS_MANY, 'Pdf', 'id_arc'),
			'idUsu' => array(self::BELONGS_TO, 'Proyecto', 'id_usu'),
			'videos' => array(self::HAS_ONE, 'Video', 'id_usu'),
			'videos1' => array(self::HAS_MANY, 'Video', 'id_arc'),
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
			'nombre_arc' => 'Nombre Arc',
			'url_arc' => 'Url Arc',
			'tamano_arc' => 'Tamano Arc',
			'version_arc' => 'Version Arc',
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
		$criteria->compare('nombre_arc',$this->nombre_arc,true);
		$criteria->compare('url_arc',$this->url_arc,true);
		$criteria->compare('tamano_arc',$this->tamano_arc);
		$criteria->compare('version_arc',$this->version_arc);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}