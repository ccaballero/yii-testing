<?php
/* @var $this ComiteController */
/* @var $model Comite */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'codigo_comite'); ?>
		<?php echo $form->textField($model,'codigo_comite'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_comite'); ?>
		<?php echo $form->textField($model,'nombre_comite',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apellido_comite'); ?>
		<?php echo $form->textField($model,'apellido_comite',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'carrera'); ?>
		<?php echo $form->textField($model,'carrera',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'direccion'); ?>
		<?php echo $form->textField($model,'direccion',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_ciudad'); ?>
		<?php echo $form->textField($model,'id_ciudad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_uni'); ?>
		<?php echo $form->textField($model,'id_uni'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->