<?php
/* @var $this EstudianteController */
/* @var $model Estudiante */

$this->breadcrumbs=array(
	'Jueces'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Jueces', 'url'=>array('index')),
	array('label'=>'Actualizar Jueces', 'url'=>array('admin')),
);
?>

<h1>Crear Juez</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>