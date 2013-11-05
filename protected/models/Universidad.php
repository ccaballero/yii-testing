<?php

/**
 * This is the model class for table "universidad".
 *
 * The followings are the available columns in table 'universidad':
 * @property integer $id_uni
 * @property string $nom_uni
 *
 * The followings are the available model relations:
 * @property Usuario[] $usuarios
 */
class Universidad extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Universidad the static model class
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
		return 'universidad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nom_uni', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_uni, nom_uni', 'safe', 'on'=>'search'),
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
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'id_uni'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_uni' => 'Id Uni',
			'nom_uni' => 'Nom Uni',
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

		$criteria->compare('id_uni',$this->id_uni);
		$criteria->compare('nom_uni',$this->nom_uni,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}