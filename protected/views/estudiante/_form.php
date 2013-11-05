<?php
/* @var $this EstudianteController */
/* @var $model Estudiante */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'estudiante-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">los cuadros <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	  <div class="row">
        <?php echo $form->labelEx($model, 'Elegir la carrera perteneciente el juez'); ?>
    </div>
    <div class="row">
        <?php echo $form->dropDownList($model, 'id_car', 
                CHtml::listData(Carrera::model()->findAll(), 'id_car', 'nombre_car'),
                array('empty'=>'Seleccione la carrera del juez')); ?>
        <?php echo $form->error($model,'id_car'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'cod_juez'); ?>
		<?php echo $form->textField($model,'cod_juez'); ?>
		<?php echo $form->error($model,'cod_juez'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_juez'); ?>
		<?php echo $form->textField($model,'nombre_juez',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nombre_juez'); ?>
	</div>
        
        
        <div class="row">
		<?php echo $form->labelEx($model,'nombre_universidad'); ?>
		<?php echo $form->textField($model,'nombre_universidad',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nombre_universidad'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'nivel_academico'); ?>
		<?php echo $form->textField($model,'nivel_academico',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nivel_academico'); ?>
	</div>
        
        

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear Juez' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->