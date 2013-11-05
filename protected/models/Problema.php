<?php

/**
 * This is the model class for table "problema".
 *
 * The followings are the available columns in table 'problema':
 * @property integer $codigo
 * @property string $nombre
 * @property integer $cpu_max
 * @property integer $mem_max
 * @property string $path_descripcion
 * @property string $path_entrada
 * @property string $path_salida
 */
class Problema extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Problema the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'problema';
    }

    public $image;

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nombre, cpu_max, mem_max, path_descripcion, path_entrada, path_salida', 'required'),
            array('cpu_max, mem_max', 'numerical', 'integerOnly' => true),
            array('nombre', 'length', 'max' => 128),
            array('path_descripcion, path_entrada', 'length', 'max' => 258),
            array('path_salida', 'length', 'max' => 256),
            array('image', 'file', 'types' => 'jpg, gif, png'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(
                'codigo, nombre, cpu_max, mem_max, path_descripcion, path_entrada, path_salida',
                'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'codigo' => 'Codigo',
            'nombre' => 'Nombre del problema',
            'cpu_max' => 'Maximo tiempo de ejecución',
            'mem_max' => 'Maximo uso de memoria',
            'path_descripcion' => 'Archivo de descripción del problema',
            'path_entrada' => 'Archivo de entradas',
            'path_salida' => 'Archivo de salidas',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('codigo', $this->codigo);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('cpu_max', $this->cpu_max);
        $criteria->compare('mem_max', $this->mem_max);
        $criteria->compare('path_descripcion', $this->path_descripcion, true);
        $criteria->compare('path_entrada', $this->path_entrada, true);
        $criteria->compare('path_salida', $this->path_salida, true);

        return new CActiveDataProvider($this, array('criteria' => $criteria));
    }
}
