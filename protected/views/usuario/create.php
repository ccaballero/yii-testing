<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	
);


$this->widget('zii.widgets.CBreadcrumbs', array(
		'links' => array(
	'Usuarios'=>array('index'),
	'Registro Usuario',
		),
		'homeLink' => CHtml::link('Inicio', Yii::app()->homeUrl),
));

$this->menu=array(
		array('label'=>'Lista de Usuario Comites', 'url'=>array('index')),
	array('label'=>'--Usuarios Comites Inactivos', 'url'=>array('inactivos')),
	array('label'=>'--Usuarios Comites Activos', 'url'=>array('activos')),
	array('label'=>'Registrar Usuarios Comites', 'url'=>array('create')),
	);
?>

<h1>Registro de Usuario Juez</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>