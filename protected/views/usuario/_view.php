<?php
/* @var $this UsuarioController */
/* @var $data Usuario */
?>

<div class="view">

	<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('id_usu')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_usu), array('view', 'id'=>$data->id_usu)); ?>
	<br /> -->	

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_usu')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->usuario_usu),array('view','id'=>$data->id_usu)); ?>
	<br />

	<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('contrasena_usu')); ?>:</b>
	<?php echo CHtml::encode($data->contrasena_usu); ?>
	<br /> -->

       <b><?php echo CHtml::encode($data->getAttributeLabel('id_ciudad')); ?>:</b>
	<?php echo CHtml::encode($data->ciudad->nombre_departamento); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_lim_act_usu')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_lim_act_usu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo_usu')); ?>:</b>
	<?php echo CHtml::encode($data->nombreActivo()); ?>
	<br />


</div>