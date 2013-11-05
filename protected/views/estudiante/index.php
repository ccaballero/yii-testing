<?php
/* @var $this EstudianteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Jueces',
);

$this->menu=array(
	array('label'=>'Crear Juez', 'url'=>array('create')),
	array('label'=>'Actualizar Juez', 'url'=>array('admin')),
);
?>

<h1>Jueces</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
