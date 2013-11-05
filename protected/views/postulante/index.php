<?php
/* @var $this PostulanteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Olimpistas',///il indce
);

$this->menu=array(
	array('label'=>'Registrar Olimpista', 'url'=>array('create')),
	array('label'=>'Manage Postulante', 'url'=>array('admin')),
);
?>

<h1>Olimpistas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
