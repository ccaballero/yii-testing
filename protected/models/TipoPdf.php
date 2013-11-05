<?php

/**
 * This is the model class for table "tipo_pdf".
 *
 * The followings are the available columns in table 'tipo_pdf':
 * @property integer $id_tip_pdf
 * @property string $nombre_tip_pdf
 *
 * The followings are the available model relations:
 * @property Pdf[] $pdfs
 */
class TipoPdf extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TipoPdf the static model class
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
		return 'tipo_pdf';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_tip_pdf', 'required'),
			array('nombre_tip_pdf', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_tip_pdf, nombre_tip_pdf', 'safe', 'on'=>'search'),
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
			'pdfs' => array(self::HAS_MANY, 'Pdf', 'id_tip_pdf'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_tip_pdf' => 'Id Tip Pdf',
			'nombre_tip_pdf' => 'Nombre Tip Pdf',
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

		$criteria->compare('id_tip_pdf',$this->id_tip_pdf);
		$criteria->compare('nombre_tip_pdf',$this->nombre_tip_pdf,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}