<?php
/* @var $this ComiteController */
/* @var $model Comite */

$this->breadcrumbs=array(
	'Comites'=>array('index'),
	$model->codigo_comite=>array('view','id'=>$model->codigo_comite),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Comite', 'url'=>array('index')),
	array('label'=>'Crear Comite', 'url'=>array('create')),
	array('label'=>'Vistas Comite', 'url'=>array('view', 'id'=>$model->codigo_comite)),
	array('label'=>'Actualizar datos Comite', 'url'=>array('admin')),
);
?>

<h1>Actualizar datos Comite <?php echo $model->codigo_comite; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>