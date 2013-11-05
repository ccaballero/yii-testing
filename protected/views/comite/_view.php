<?php
/* @var $this ComiteController */
/* @var $data Comite */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo_comite')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codigo_comite), array('view', 'id'=>$data->codigo_comite)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_comite')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_comite); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido_comite')); ?>:</b>
	<?php echo CHtml::encode($data->apellido_comite); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('carrera')); ?>:</b>
	<?php echo CHtml::encode($data->carrera); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />

</div>