<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	
);

$this->widget('zii.widgets.CBreadcrumbs', array(
		'links' => array(
				'Usuarios'=>array('index'),
	'Manage',
		),
		'homeLink' => CHtml::link('Inicio', Yii::app()->homeUrl),
));

$this->menu=array(
		array('label'=>'Lista de Usuario', 'url'=>array('index')),
	array('label'=>'--Usuarios Inactivos', 'url'=>array('inactivos')),
	array('label'=>'--Usuarios Activos', 'url'=>array('activos')),
	array('label'=>'Registrar Usuarios', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuario-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Usuarios</h1>

<p>
También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al principio de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuario-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_usu',
		'usuario_usu',
		'contrasena_usu',
		'fecha_lim_act_usu',
		'activo_usu',
		array( 
			'type'=>'raw',
            'header'=>'Link',
            'value'=>' CHtml::link("$data->usuario_usu",array("site/index",))',
        ),
		
	),

)); ?>
