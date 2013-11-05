<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),    
    'focus'=>'input:visible:enabled:first',
)); ?>

	<p class="note">Los siguientes campos que tenga <span class="required">*</span> son requeridos.</p>

	<!--<?php echo $form->errorSummary($model); ?>-->

	<div class="row">
		<?php echo $form->labelEx($model,'cod_juez'); ?>
		<?php echo $form->textField($model,'cod_juez',array('size'=>20,'maxlength'=>20,'style'=>'width:200px')); ?>
		<?php echo $form->error($model,'cod_juez'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'usuario_usu'); ?>
		<?php echo $form->textField($model,'usuario_usu',array('size'=>20,'maxlength'=>20,'style'=>'width:200px')); ?>
		<?php echo $form->error($model,'usuario_usu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contrasena_usu'); ?>
		<?php echo $form->passwordField($model,'contrasena_usu',array('size'=>60,'maxlength'=>200,'style'=>'width:200px')); ?>
		<?php echo $form->error($model,'contrasena_usu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'re_contrasena_usu'); ?>
		<?php echo $form->passwordField($model,'re_contrasena_usu',array('size'=>60,'maxlength'=>200,'style'=>'width:200px')); ?>
		<?php echo $form->error($model,'re_contrasena_usu'); ?>
	</div>

      <div class="row">
        <?php echo $form->labelEx($model, 'ciudad al que pertenece'); ?>
    </div>
    <div class="row">
        <?php echo $form->dropDownList($model, 'id_ciudad', 
                CHtml::listData(Ciudad::model()->findAll(), 'id_ciudad', 'nombre_departamento'),
                array('empty'=>'Seleccione la ciudad al que pertenece el juez')); ?>
        <?php echo $form->error($model,'id_ciudad'); ?>
    </div>
        
         <div class="row">
        <?php echo $form->labelEx($model, 'universidad al que pertenece'); ?>
    </div>
    <div class="row">
        <?php echo $form->dropDownList($model, 'id_uni', 
                CHtml::listData(Universidad::model()->findAll(), 'id_uni', 'nom_uni'),
                array('empty'=>'Seleccione la universidad al que pertenece el juez')); ?>
        <?php echo $form->error($model,'id_uni'); ?>
    </div>
       
	<div class="row">
		<?php echo $form->labelEx($model,'fecha_lim_act_usu'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
		array(
			'name' => 'fecha_lim_act_usu',
			'attribute' => 'fecha_lim_act_usu',
			'model'=>$model,
			'options'=> array(
			'dateFormat' =>'yy-mm-dd',
			'altFormat' =>'yy-mm-dd',
			'changeMonth' => true,
			'changeYear' => true,
			'appendText' => 'aaaa-mm-dd',
	),
));
?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Save'); ?>
		<?php echo CHtml::resetButton('Limpiar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->