<?php

/**
 * This is the model class for table "pdf".
 *
 * The followings are the available columns in table 'pdf':
 * @property integer $id_usu
 * @property integer $id_arc
 * @property integer $id_tip_pdf
 * @property string $cod_pdf
 *
 * The followings are the available model relations:
 * @property TipoPdf $idTipPdf
 * @property Archivo $idUsu
 * @property Archivo $idArc
 */
class Pdf extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pdf the static model class
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
		return 'pdf';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usu, id_arc, id_tip_pdf', 'required'),
			array('id_usu, id_arc, id_tip_pdf', 'numerical', 'integerOnly'=>true),
			array('cod_pdf', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_usu, id_arc, id_tip_pdf, cod_pdf', 'safe', 'on'=>'search'),
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
			'idTipPdf' => array(self::BELONGS_TO, 'TipoPdf', 'id_tip_pdf'),
			'idUsu' => array(self::BELONGS_TO, 'Archivo', 'id_usu'),
			'idArc' => array(self::BELONGS_TO, 'Archivo', 'id_arc'),
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
			'id_tip_pdf' => 'Id Tip Pdf',
			'cod_pdf' => 'Cod Pdf',
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
		$criteria->compare('id_tip_pdf',$this->id_tip_pdf);
		$criteria->compare('cod_pdf',$this->cod_pdf,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}