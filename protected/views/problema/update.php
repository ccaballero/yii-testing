<?php
/* @var $this ProblemaController */
/* @var $model Problema */

$this->breadcrumbs=array(
	'Problemas'=>array('index'),
	$model->codigo=>array('view','id'=>$model->codigo),
	'Update',
);

$this->menu=array(
	array('label'=>'List Problema', 'url'=>array('index')),
	array('label'=>'Create Problema', 'url'=>array('create')),
	array('label'=>'View Problema', 'url'=>array('view', 'id'=>$model->codigo)),
	array('label'=>'Manage Problema', 'url'=>array('admin')),
);
?>

<h1>Update Problema <?php echo $model->codigo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>