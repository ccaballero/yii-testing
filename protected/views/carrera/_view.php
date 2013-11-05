<?php
/* @var $this CarreraController */
/* @var $data Carrera */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_car')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_car), array('view', 'id'=>$data->id_car)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_car')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_car); ?>
	<br />


</div>