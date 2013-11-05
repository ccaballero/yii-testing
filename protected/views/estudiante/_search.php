<?php
/* @var $this EstudianteController */
/* @var $model Estudiante */
/* @var $form CActiveForm */

/*akkkkkkkkk espara la base de datos*/



?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_est'); ?>
		<?php echo $form->textField($model,'id_est'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_car'); ?>
		<?php echo $form->textField($model,'id_car'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cod_juez'); ?>
		<?php echo $form->textField($model,'cod_juez'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_juez'); ?>
		<?php echo $form->textField($model,'nombre_juez',array('size'=>50,'maxlength'=>50)); ?>
	</div>
        <div class="row">
		<?php echo $form->label($model,'nombre_universidad'); ?>
		<?php echo $form->textField($model,'nombre_universidad',array('size'=>50,'maxlength'=>50)); ?>
	</div>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->