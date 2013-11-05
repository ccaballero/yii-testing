<?php
/* @var $this EstudianteController */
/* @var $model Estudiante */

$this->breadcrumbs=array(
	'Comites'=>array('index'),
	$model->id_est,
);

$this->menu=array(
	array('label'=>'Listar Comite', 'url'=>array('index')),
	array('label'=>'Create Comite', 'url'=>array('create')),
	array('label'=>'Update Comite', 'url'=>array('update', 'id'=>$model->id_est)),
	array('label'=>'Delete Comite', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_est),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Comite', 'url'=>array('admin')),
);
?>

<h1>Vista de Comite #<?php echo $model->id_est; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_est',
		'id_car',
		'cod_juez',
		'nombre_juez',
                'nombre_universidad',
                'nivel_academico',
	),
)); ?>
