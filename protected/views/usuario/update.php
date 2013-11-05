<?php
/* @var $this UsuarioController */
/* @var $model Usuario */


$this->widget('zii.widgets.CBreadcrumbs', array(
		'links' => array(
				'Usuarios'=>array('index'),
	$model->id_usu=>array('view','id'=>$model->id_usu),
	'Update',
		),
		'homeLink' => CHtml::link('Inicio', Yii::app()->homeUrl),
));

$this->menu=array(
	array('label'=>'List Usuario', 'url'=>array('index')),
	array('label'=>'Create Usuario', 'url'=>array('create')),
	array('label'=>'View Usuario', 'url'=>array('view', 'id'=>$model->id_usu)),
	array('label'=>'Manage Usuario', 'url'=>array('admin')),
);
?>

<h1>Update Usuario <?php echo $model->id_usu; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>