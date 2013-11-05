<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
$arr = array();
$label = '';
if($model->activo_usu){
	$label = 'Activos';
	$arr[] = 'activos';
}else{
	$label = 'Inactivos';
	$arr[] = 'inactivos';
}
 
$this->breadcrumbs=array(
);
$this->widget('zii.widgets.CBreadcrumbs', array(
	'links' => array(
	'Usuarios'=>array('index'),
	$label => $arr,
	$model->usuario_usu,
		),
		'homeLink' => CHtml::link('Inicio', Yii::app()->homeUrl),
));

$this->menu=array(
	array('label'=>'Lista de Usuarios Comites', 'url'=>array('index')),
	array('label'=>'--Usuarios Comites Inactivos', 'url'=>array('inactivos')),
	array('label'=>'--Usuarios Comites Activos', 'url'=>array('activos')),
	array('label'=>'Registrar Usuarios Comites', 'url'=>array('create')),
	array('label'=>'Generar Boleta', 'url'=>array('boleta','id'=>$model->id_usu),'linkOptions' => array('target'=>'_blank')),
);
?>

<h3>Usuario Comite<?php echo $model->usuario_usu; ?></h3>
<?php 
echo "<b>Para modificar el estado del comite presione </b>";
if($model->activo_usu){
	echo CHtml::link('actualizar',
					array('cambiarEstado','id'=>$model->id_usu),
					array('confirm'=>'¿Este comite esta activo,Desea poner inactivo a este comite?'));
}else{
	echo CHtml::link('actualizar',
					array('cambiarEstado','id'=>$model->id_usu),
					array('confirm'=>'¿Este comite esta inactivo,Desea poner activo a este comite?'));
}
echo '</br></br>';
?>
<?php

	$project = $model->proyecto != null ? CHtml::link($model->proyecto->nombre_proy,
								array('proyecto/view','id'=>$model->id_usu)):
								"";
	
 	$integrantes = '';
 	foreach ($model->estudiantes as $estudiante){
 		$integrantes = $integrantes == '' ? $estudiante->nombre_juez : $integrantes.', '.$estudiante->nombre_juez;
 	}
 	
	$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,

	'attributes'=>array(
 	//	'id_usu',
		'usuario_usu',
             //   'id_ciudad',//=>$model->ciudad->nombre_departamento,   
	//	'contrasena_usu',
		
            array(
			'name'=>'ciudad',
			'value'=>$model->ciudad->nombre_departamento, ///ojssss
		),
            array(
			'name'=>'Entidad Perteneciente',
			'value'=>$model->universidad->nom_uni, ///ojssss
		),
		array(
			'name'=>'Activo',
			'value'=>$model->nombreActivo(),
		),
//		array(
//			'type'=>'html',
///			'name'=>'Proyecto',
///			'value'=>$project,
///		),
		array(
			'name'=>'Integrante(s)',
		///	'header'=>'Activo',
			'value'=>$integrantes,
		),
            'fecha_lim_act_usu',
	),
));

?>

<br><h2>Integrante(s) del Comite</h2>
<?php
$dataProvider=new CActiveDataProvider('estudiante', array(
    'criteria'=>array(
  'alias'=>'es',
'join'=>'inner join usuario_estudiante as ue on (ue.id_est = es.id_est) 
         inner join usuario as us on (us.id_usu = ue.id_usu)',
        'condition'=>'us.id_usu = :idUsuario',
        'params'=>array(':idUsuario'=>$model->id_usu)
    )
));
?>

<?php 	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuario-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'nombre_juez',///importante para cambiar el nombre
		'nombre_universidad',
                'nivel_academico',
		array(
			'name'=>'Integrantes',
			'header'=>'Carrera',
			'value'=>'$data->nombreCarrera()',
		),
	),
)); ?>