<?php
/* @var $this UsuarioController */
/* @var $dataProvider CActiveDataProvider */

$this->widget('zii.widgets.CBreadcrumbs', array(
		'links' => array(
					'Usuarios' => array('index'),
	'Inactivos',
		),
		'homeLink' => CHtml::link('Inicio', Yii::app()->homeUrl),
));


$this->menu=array(
		array('label'=>'Lista de Usuario', 'url'=>array('index')),
	array('label'=>'--Usuarios Inactivos', 'url'=>array('inactivos')),
	array('label'=>'--Usuarios Activos', 'url'=>array('activos')),
	array('label'=>'Registrar Usuarios', 'url'=>array('create')),
	
);
?>

<h1>Usuarios Inactivos</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuario-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		array( 
			'type'=>'raw',
            'header'=>'Nombre Usuario',
            'value'=>' CHtml::link(CHtml::encode($data->usuario_usu), array(\'view\', \'id\'=>$data->id_usu))',
        ),
		'fecha_lim_act_usu',
		array(
			'name'=>'Activo',
			'header'=>'Usuario Activo',
			'value'=>'$data->nombreActivo()',
		),
		
	),

)); ?>

