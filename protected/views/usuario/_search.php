<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_usu'); ?>
		<?php echo $form->textField($model,'id_usu'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuario_usu'); ?>
		<?php echo $form->textField($model,'usuario_usu',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contrasena_usu'); ?>
		<?php echo $form->textField($model,'contrasena_usu',array('size'=>60,'maxlength'=>200)); ?>
	</div>
    
    <div class="row">
		<?php echo $form->label($model,'id_ciudad'); ?>
		<?php echo $form->textField($model,'id_ciudad'); ?>
	</div>
     <div class="row">
		<?php echo $form->label($model,'id_uni'); ?>
		<?php echo $form->textField($model,'id_uni'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_lim_act_usu'); ?>
		<?php echo $form->textField($model,'fecha_lim_act_usu'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activo_usu'); ?>
		<?php echo $form->checkBox($model,'activo_usu'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->