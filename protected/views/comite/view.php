<?php
/* @var $this ComiteController */
/* @var $model Comite */

$this->breadcrumbs=array(
	'Comites'=>array('index'),
	$model->codigo_comite,
);

$this->menu=array(
	array('label'=>'Listar Comite', 'url'=>array('index')),
	array('label'=>'Crear Comite', 'url'=>array('create')),
	array('label'=>'Actualizar datos Comite', 'url'=>array('update', 'id'=>$model->codigo_comite)),
	array('label'=>'Eliminar Comite', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codigo_comite),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manejar datos Comite', 'url'=>array('admin')),
);
?>

<h1>Vistas Comite #<?php echo $model->codigo_comite; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codigo_comite',
		'nombre_comite',
		'apellido_comite',
		'carrera',
		'direccion',
		'telefono',
		
	),
)); ?>
