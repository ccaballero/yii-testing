<?php
/* @var $this ProblemaController */
/* @var $model Problema */

$this->breadcrumbs=array(
	'Problemas'=>array('index'),
	$model->codigo,
);

$this->menu=array(
	array('label'=>'List Problema', 'url'=>array('index')),
	array('label'=>'Create Problema', 'url'=>array('create')),
	array('label'=>'Update Problema', 'url'=>array('update', 'id'=>$model->codigo)),
	array('label'=>'Delete Problema', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codigo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Problema', 'url'=>array('admin')),
);
?>

<h1>View Problema #<?php echo $model->codigo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codigo',
		'nombre',
		'cpu_max',
		'mem_max',
		'path_descripcion',
		'path_entrada',
		'path_salida',
	),
)); ?>
