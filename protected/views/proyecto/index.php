<?php
/* @var $this UsuarioController */
/* @var $dataProvider CActiveDataProvider */


/*$this->breadcrumbs=array(
	'Proyectos',
);*/
$this->widget('zii.widgets.CBreadcrumbs', array(
		'links' => array('Proyectos'),
		'homeLink' => CHtml::link('Inicio', Yii::app()->homeUrl),		
)); 

$this->menu=array(
	array('label'=>'Lista de Proyectos', 'url'=>array('index')),
	array('label'=>'Lista de Areas', 'url'=>array('areas')),
	);

?>

<h1>Proyectos</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'proyecto-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array( 
			'type'=>'raw',
            'header'=>'Nombre Proyecto',
            'value'=>' CHtml::link(CHtml::encode($data->nombre_proy), array(\'view\', \'id\'=>$data->id_usu))',
        ),
		array(
			'name'=>'propietario',
			'header'=>'Propietario',
			'value'=>'$data->idUsu->usuario_usu',
		),
		array(
			'name'=>'area',
			'header'=>'Area',
			'value'=>'$data->idAre->nombre_are',
		),
            array(
			'name'=>'facha limite',
			'header'=>'Fecha Limite de Modificacion',
			'value'=>'$data->idUsu->fecha_lim_act_usu',
		),
		
	),

)); ?>

