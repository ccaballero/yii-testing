<?php
/* @var $this EstudianteController */
/* @var $model Estudiante */

$this->breadcrumbs=array(
	'Comites'=>array('index'),
	$model->id_est=>array('view','id'=>$model->id_est),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Comite', 'url'=>array('index')),
	array('label'=>'Crear Comite', 'url'=>array('create')),
	array('label'=>'View Comite', 'url'=>array('view', 'id'=>$model->id_est)),
	array('label'=>'Manage Comite', 'url'=>array('admin')),
);
?>

<h1>Update Estudiante <?php echo $model->id_est; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>