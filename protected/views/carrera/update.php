<?php
/* @var $this CarreraController */
/* @var $model Carrera */

$this->breadcrumbs=array(
	'Carreras'=>array('index'),
	$model->id_car=>array('view','id'=>$model->id_car),
	'Update',
);

$this->menu=array(
	array('label'=>'List Carrera', 'url'=>array('index')),
	array('label'=>'Create Carrera', 'url'=>array('create')),
	array('label'=>'View Carrera', 'url'=>array('view', 'id'=>$model->id_car)),
	array('label'=>'Manage Carrera', 'url'=>array('admin')),
);
?>

<h1>Update Carrera <?php echo $model->id_car; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>