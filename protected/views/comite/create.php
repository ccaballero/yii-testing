<?php
/* @var $this ComiteController */
/* @var $model Comite */

$this->breadcrumbs=array(
	'Comites'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Comite', 'url'=>array('index')),
	array('label'=>'Actualizar Comite', 'url'=>array('admin')),
);
?>

<h1>Crear Comite</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>