<?php
/* @var $this PostulanteController */
/* @var $model Postulante */

$this->breadcrumbs=array(
	'Postulantes'=>array('index'),
	$model->idpostulante,
);


?>

<h1>CODIGO DE PLANTILLA <?php echo $model->idpostulante; ?></h1>


<div class="view">

	<b><?php echo CHtml::encode($model->getAttributeLabel('idpostulante')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($model->idpostulante), array('view', 'id'=>$model->idpostulante)); ?>
	<br />

        <?php
            $nombres = explode(';', CHtml::encode($model->nombreautor));
            $apellidos = explode(';', CHtml::encode($model->apellidoautor));
            $autores = array();
            
            for ($i = 0; $i < count($apellidos); $i++) {
                $autores[] = $nombres[$i] . ' ' . $apellidos[$i];
            }
        ?>        
	<b><?php echo CHtml::encode($model->getAttributeLabel('autores')); ?>:</b>
	<?php echo implode(' - ', $autores) ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($model->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('telefonocontacto')); ?>:</b>
	<?php echo CHtml::encode($model->telefonocontacto); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('correoelectronico')); ?>:</b>
	<?php echo CHtml::encode($model->correoelectronico); ?>
	<br />

	
	
	<b><?php echo CHtml::encode($model->getAttributeLabel('id_are')); ?>:</b>
	<?php echo CHtml::encode($model->area->nombre_are); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($model->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('fechacreacion')); ?>:</b>
	<?php echo CHtml::encode($model->fechacreacion); ?>
	<br />

      