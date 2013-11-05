<?php
/* @var $this ProblemaController */
/* @var $data Problema */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codigo), array('view', 'id'=>$data->codigo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cpu_max')); ?>:</b>
	<?php echo CHtml::encode($data->cpu_max); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mem_max')); ?>:</b>
	<?php echo CHtml::encode($data->mem_max); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('path_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->path_descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('path_entrada')); ?>:</b>
	<?php echo CHtml::encode($data->path_entrada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('path_salida')); ?>:</b>
	<?php echo CHtml::encode($data->path_salida); ?>
	<br />


</div>