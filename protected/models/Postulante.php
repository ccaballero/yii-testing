<?php

/**
 * This is the model class for table "postulante".
 *
 * The followings are the available columns in table 'postulante':
 * @property integer $idpostulante
 * @property string $nombreautor
 * @property string $apellidoautor
 * @property string $direccion
 * @property string $telefonocontacto
 * @property string $correoelectronico
 * @property string $tituloproyecto
 * @property integer $id_are
 * @property string $descripcion
 * @property string $fechacreacion
 *
 * The followings are the available model relations:
 * @property Area $idAre
 */
class Postulante extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Postulante the static model class
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
		return 'postulante';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombreautor, apellidoautor, direccion, correoelectronico,  descripcion, fechacreacion', 'required'),
			array('nombreautor, apellidoautor, direccion, telefonocontacto, correoelectronico, ', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idpostulante, apellidoautor, direccion, telefonocontacto, correoelectronico, id_are, descripcion, fechacreacion', 'safe', 'on'=>'search'),
	                
                    
                    
                        array('nombreautor', 'length', 'max'=>20),
			array('nombreautor','match','pattern'=>'/^[a-zA-ZñÑ\s;]*$/','message'=>'El nombre de autor es invalido solo se reciben letras',),
			array('apellidoautor', 'length', 'max'=>20),
			array('apellidoautor','match','pattern'=>'/^[a-zA-ZñÑ\s;]*$/','message'=>'El apellido de autor es invalido solo se reciben letras',),
			
                    
                    
                    
                      //  array('telefonocontacto', 'numerical', 'integerOnly'=>true,'on'=>'create'),    
                        array('telefonocontacto','numerical','integerOnly'=>true),
			//validar email
			array('correoelectronico','length','max'=>20),
			array('correoelectronico','email'),
                      
                        
                        array('descripcion', 'length', 'max'=>20),
			array('descripcion','match','pattern'=>'/^[a-zA-ZñÑ\s]*$/','message'=>'La descripcion de Area es invalido solo se reciben letras',),
			
                    
                      array('fechacreacion', 'required',),
			array('fechacreacion','controlFechaCreate',),
                    
           	
                    );
	}
  public function controlFechaCreate($attribute,$params){
        ///    echo 'asdf';
          //  die;
		$dateActual=date("Y-m-d"); 
		if($this->fechacreacion > $dateActual || $this->fechacreacion < $dateActual){
			$this->addError('fechacreacion','ERROR!!, la fecha no es la  actual!');
		}
	}
        
        
  
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'area' => array(self::BELONGS_TO, 'Area', 'id_are'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idpostulante' => 'numero unico de olimpista',
			'nombreautor' => 'nombre de olimpista(s)',
			'apellidoautor' => 'apellido del olimpista',
			'direccion' => 'direccion',
			'telefonocontacto' => 'telefono de contacto',
			'correoelectronico' => 'correo electronico',
			//'tituloproyecto' => 'titulo del proyecto',
			'id_are' => 'nivel de estudio',
			'descripcion' => 'descripcion',
			'fechacreacion' => 'fecha de nacimiento',
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

		$criteria->compare('idpostulante',$this->idpostulante);
		$criteria->compare('nombreautor',$this->nombreautor,true);
		$criteria->compare('apellidoautor',$this->apellidoautor,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefonocontacto',$this->telefonocontacto,true);
		$criteria->compare('correoelectronico',$this->correoelectronico,true);
		//$criteria->compare('tituloproyecto',$this->tituloproyecto,true);
		$criteria->compare('id_are',$this->id_are);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('fechacreacion',$this->fechacreacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}