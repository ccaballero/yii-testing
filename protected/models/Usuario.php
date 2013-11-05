<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $id_usu
 * @property string $usuario_usu
 * @property string $contrasena_usu
 * @property string $fecha_lim_act_usu
 * @property boolean $activo_usu
 *
 * The followings are the available model relations:
 * @property Estudiante[] $estudiantes
 * @property Rol[] $rols
 * @property Proyecto $proyecto
 */
class Usuario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	var $cod_juez;
	var $banderaActualizar=false;
	var $re_contrasena_usu;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario_usu,cod_juez,contrasena_usu, fecha_lim_act_usu, re_contrasena_usu', 'required','message'=>'El campo no puede estar vacio.'),
			
			
			//array('cod_sis','numero' ),
			//array('cod_sis','exist','attributeName' => 'cod_sis_est', 'className' => 'Estudiante','message'=>'El estudiante no existe','allowEmpty' => false),
			//array('cod_sis','numerical','integerOnly'=>true,'message'=>'debes de introducir un numero'),

			array('cod_juez','validSis'),
			array('usuario_usu','validCharacter'),
			array('usuario_usu','unique','allowEmpty' => false, 'attributeName' => 'usuario_usu', 'className' => 'Usuario','message'=>'La cuenta con ese nombre de juez ya existe.'),
			array('re_contrasena_usu','compare','compareAttribute'=>'contrasena_usu','message'=>'Las contrasenas no son identicas'),
			array('usuario_usu', 'length', 'max'=>20),
			array('contrasena_usu', 'length', 'max'=>200),
			//array('fecha_lim_act_usu', 'length', 'max'=>200),
			array('fecha_lim_act_usu', 'date', 'format' => 'yyyy-mm-dd', 'message' => 'La fecha parece inválida.'),
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_usu, usuario_usu, contrasena_usu, fecha_lim_act_usu, id_ciudad,id_uni, activo_usu', 'safe', 'on'=>'search'),
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
			'estudiantes' => array(self::MANY_MANY, 'Estudiante', 'usuario_estudiante(id_usu, id_est)'),
			'rols' => array(self::MANY_MANY, 'Rol', 'usuario_rol(id_usu, id_rol)'),
			'proyecto' => array(self::HAS_ONE, 'Proyecto', 'id_usu'),
                  'ciudad' => array(self::BELONGS_TO, 'Ciudad', 'id_ciudad'),
                      'universidad' => array(self::BELONGS_TO, 'Universidad', 'id_uni'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_usu' => 'Id Usuario',
			'usuario_usu' => 'Nombre Juez',
			'contrasena_usu' => 'Contraseña',
			'fecha_lim_act_usu' => 'Fecha Limite de Actividad',
			'activo_usu' => 'Usuario activo',
			're_contrasena_usu' =>'Repita Contraseña',
                        'id_are' => 'NOMBRE AREA',
			'cod_juez' => 'Codigo Juez',
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
		$criteria->compare('usuario_usu',$this->usuario_usu,true);
		$criteria->compare('contrasena_usu',$this->contrasena_usu,true);
		$criteria->compare('id_ciudad',$this->id_ciudad);
                $criteria->compare('id_uni',$this->id_uni);
                
                $criteria->compare('fecha_lim_act_usu',$this->fecha_lim_act_usu,true);
		
                $criteria->compare('activo_usu',$this->activo_usu);
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function nombreActivo (){
		return $this->activo_usu == 1 ? 'Activo':'Inactivo';
	}
	
	public function getId (){
		return $this->id_usu;
	}



	public function validCharacter($attribute ,$params)
	{
		$valid = true;
		$valor = preg_match('/^[a-z]/', $this->$attribute);
		$valor1 = preg_match('/^[A-Z]/', $this->$attribute);
		if($valor or $valor1){
		$valid = $valid && preg_match('/^[a-z\d]{4,28}$/i', $this->$attribute);
		
		}else 				
			$this->addError($attribute, "Tiene que empezar con una letra su nombre de usuario.");
			
		if (!$valid)
				$this->addError($attribute, "El nombre de usuario {$this->$attribute} debe ser mayor a 3 caracteres y \nsolo contener letras mayusculas, minusculas y numeros.");
		return $valid;

}
	
	public function Pass($attribute, $params)
	{
		// default to true
		$valid = true;
		
		// at least one number
		$valid = $valid && preg_match('/.*[\d].*/', $this->$attribute);
		
		// at least one non-word character
		$valid = $valid && preg_match('/.*[\W].*/', $this->$attribute);
		
		// at least one capital letter
		$valid = $valid && preg_match('/.*[A-Z].*/', $this->$attribute);
		
		if (!$valid)
				$this->addError($attribute, "No cumple con los requerimientos.");
		return $valid;
	}

	public function numeroTelf($attribute,$params='')
	{
	    if(preg_match("/^\(?\d{3}\)?[\s-]?\d{3}[\s-]?\d{4}$/",$this->$attribute) === 0)
	    {   
	        $this->addError($attribute,
	            'Contact phone number is required and  may contain only these characters: "0123456789()- " in a form like (858) 555-1212 or 8585551212 or (213)555 1212' );  
	        return false;
	    }
	    return true; 
	}

	public function validSis($attribute,$params)
	{

		$res = true;
		// $val  = intval($this->$attribute);
		if(!$this->banderaActualizar){
			$val = preg_match('/^[\d_]{0,28}$/i', $this->$attribute);
			if($this->$attribute != '' ) {
				if($val){
				 	$model = Estudiante::model()->findByAttributes(array('cod_juez'=>$this->$attribute));
					
					if ($model == null ) $this->addError($attribute, "Es codigo del juez {$this->$attribute} no es valido.");
					else if(count($model->usuarios) != 0) $this->addError($attribute, "El juez con este codigo {$this->$attribute} ya fue registrado.");
				}else{
					$this->addError($attribute, 'El codigo de este juez debe contener solo numeros.');
				}
				
			}
		}
	}

}