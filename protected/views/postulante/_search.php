<?php
/* @var $this PostulanteController */
/* @var $model Postulante */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idpostulante'); ?>
		<?php echo $form->textField($model,'idpostulante'); ?>
	
        </div>

	<div class="row">
		<?php echo $form->label($model,'nombreautor'); ?>
		<?php echo $form->textField($model,'nombreautor',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apellidoautor'); ?>
		<?php echo $form->textField($model,'apellidoautor',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'direccion'); ?>
		<?php echo $form->textField($model,'direccion',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefonocontacto'); ?>
		<?php echo $form->textField($model,'telefonocontacto',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'correoelectronico'); ?>
		<?php echo $form->textField($model,'correoelectronico',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tituloproyecto'); ?>
		<?php echo $form->textField($model,'tituloproyecto',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_are'); ?>
		<?php echo $form->textField($model,'id_are'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechacreacion'); ?>
		<?php echo $form->textField($model,'fechacreacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->