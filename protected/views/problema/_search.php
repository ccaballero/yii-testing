<?php
/* @var $this ProblemaController */
/* @var $model Problema */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cpu_max'); ?>
		<?php echo $form->textField($model,'cpu_max'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mem_max'); ?>
		<?php echo $form->textField($model,'mem_max'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'path_descripcion'); ?>
		<?php echo $form->textField($model,'path_descripcion',array('size'=>60,'maxlength'=>258)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'path_entrada'); ?>
		<?php echo $form->textField($model,'path_entrada',array('size'=>60,'maxlength'=>258)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'path_salida'); ?>
		<?php echo $form->textField($model,'path_salida',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->