<?php
/* @var $this ComiteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Comites',
);

$this->menu=array(
	array('label'=>'Crear Comite', 'url'=>array('create')),
	array('label'=>'Actualizar datos Comite', 'url'=>array('admin')),
);
?>

<h1>Comites</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
