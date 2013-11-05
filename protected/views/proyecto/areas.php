<?php
/* @var $this UsuarioController */
/* @var $dataProvider CActiveDataProvider */


$this->widget('zii.widgets.CBreadcrumbs', array(
		'links' => array('Proyectos' => array('index'),
		'Areas',),
		'homeLink' => CHtml::link('Inicio', Yii::app()->homeUrl),
));

$this->menu=array(
		array('label'=>'Lista de Proyectos', 'url'=>array('index')),
		array('label'=>'Lista de Areas', 'url'=>array('areas')),
);

?>

<h1>Lista de Areas</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'proyecto-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
			'type'=>'raw',
            'header'=>'Area',
            'value'=>' CHtml::link(CHtml::encode($data->nombre_are), array(\'area\', \'id\'=>$data->id_are))',
        ),
		/*array(
			'name'=>'propietario',
			'header'=>'Propietario',
			'value'=>'$data->idUsu->usuario_usu',
		),
		array(
			'name'=>'area',
			'header'=>'Area',
			'value'=>'$data->idAre->nombre_are',
		),*/
		
	),

)); ?>

