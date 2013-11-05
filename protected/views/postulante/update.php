<?php
/* @var $this PostulanteController */
/* @var $model Postulante */

$this->breadcrumbs=array(
	'Postulantes'=>array('index'),
	$model->idpostulante=>array('view','id'=>$model->idpostulante),
	'Update',
);

$this->menu=array(
	array('label'=>'List Postulante', 'url'=>array('index')),
	array('label'=>'Create Postulante', 'url'=>array('create')),
	array('label'=>'View Postulante', 'url'=>array('view', 'id'=>$model->idpostulante)),
	array('label'=>'Manage Postulante', 'url'=>array('admin')),
);
?>

<h1>Update Postulante <?php echo $model->idpostulante; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>