<?php
/* @var $this EstudianteController */
/* @var $data Estudiante */
?>

<div class="view">	

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_juez')); ?>:</b>
	<?php echo CHtml::encode($data->cod_juez); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_juez')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_juez); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('Carrera')); ?>:</b>
	<?php echo CHtml::encode($data->nombreCarrera()); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('nombre_universidad')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_universidad); ?>
	<br />
        
         <b><?php echo CHtml::encode($data->getAttributeLabel('nivel_academico')); ?>:</b>
	<?php echo CHtml::encode($data->nivel_academico); ?>
	<br />

</div>