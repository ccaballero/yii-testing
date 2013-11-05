<?php
/* @var $this PostulanteController */
/* @var $model Postulante */

$this->breadcrumbs=array(
	'Olimpistas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Olimpistas', 'url'=>array('index')),
	array('label'=>'Actualizar Olimpista', 'url'=>array('admin')),
);
?>

<h1>Registrar Olimpista</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>