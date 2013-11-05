<?php
/* @var $this PostulanteController */
/* @var $data Postulante */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idpostulante')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idpostulante), array('view', 'id'=>$data->idpostulante)); ?>
	<br />

        <?php
            $nombres = explode(';', CHtml::encode($data->nombreautor));
            $apellidos = explode(';', CHtml::encode($data->apellidoautor));
            $autores = array();
            
            for ($i = 0; $i < count($apellidos); $i++) {
                $autores[] = $nombres[$i] . ' ' . $apellidos[$i];
            }
        ?>        
	<b><?php echo CHtml::encode($data->getAttributeLabel('Olimpista(s)')); ?>:</b>
	<?php echo implode(' - ', $autores) ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefonocontacto')); ?>:</b>
	<?php echo CHtml::encode($data->telefonocontacto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correoelectronico')); ?>:</b>
	<?php echo CHtml::encode($data->correoelectronico); ?>
	<br />

	
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_are')); ?>:</b>
	<?php echo CHtml::encode($data->area->nombre_are); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechacreacion')); ?>:</b>
	<?php echo CHtml::encode($data->fechacreacion); ?>
	<br />

	

</div>