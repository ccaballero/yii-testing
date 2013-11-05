<?php
/* @var $this UsuarioController */
/* @var $dataProvider CActiveDataProvider */


$this->widget('zii.widgets.CBreadcrumbs', array(
		'links' => array('Proyectos' => array('index'),
	'Areas'=> array('index',array('id'=>$model->id_are)),
	$model->idAre->nombre_are,),
		'homeLink' => CHtml::link('Inicio', Yii::app()->homeUrl),
));

$this->menu=array(
	array('label'=>'Lista de Proyectos', 'url'=>array('index')),
	array('label'=>'Lista de Areas', 'url'=>array('areas')),
);
?>

<h1>Proyectos del Area de <?php echo $model->idAre->nombre_are ?></h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'proyecto-grid',
	'dataProvider'=>$model->search(),
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
		
	),

)); ?>
