<?php
/* @var $this ComiteController */
/* @var $model Comite */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comite-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los espacios marcados con <span class="required">*</span> son necesarios llenar.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_comite'); ?>
		<?php echo $form->textField($model,'nombre_comite',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nombre_comite'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellido_comite'); ?>
		<?php echo $form->textField($model,'apellido_comite',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'apellido_comite'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'carrera'); ?>
		<?php echo $form->textField($model,'carrera',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'carrera'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'direccion'); ?>
		<?php echo $form->textField($model,'direccion',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'direccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono'); ?>
		<?php echo $form->error($model,'telefono'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear Comite' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->