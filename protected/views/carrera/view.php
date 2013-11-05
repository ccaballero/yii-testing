<?php
/* @var $this CarreraController */
/* @var $model Carrera */

$this->breadcrumbs=array(
	'Carreras'=>array('index'),
	$model->id_car,
);

$this->menu=array(
	array('label'=>'List Carrera', 'url'=>array('index')),
	array('label'=>'Create Carrera', 'url'=>array('create')),
	array('label'=>'Update Carrera', 'url'=>array('update', 'id'=>$model->id_car)),
	array('label'=>'Delete Carrera', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_car),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Carrera', 'url'=>array('admin')),
);
?>

<h1>View Carrera #<?php echo $model->id_car; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_car',
		'nombre_car',
	),
)); ?>
