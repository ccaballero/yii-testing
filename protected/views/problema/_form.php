<?php
/* @var $this ProblemaController */
/* @var $model Problema */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'problema-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'nombre') ?>
        <?php echo $form->textField($model, 'nombre', array('size' => 60, 'maxlength' => 128)) ?>
        <?php echo $form->error($model, 'nombre') ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'cpu_max'); ?>
        <?php echo $form->textField($model, 'cpu_max'); ?>
        <?php echo $form->error($model, 'cpu_max'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'mem_max'); ?>
        <?php echo $form->textField($model, 'mem_max'); ?>
        <?php echo $form->error($model, 'mem_max'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'path_descripcion'); ?>
        <?php echo $form->fileField($model, 'path_descripcion'); ?>
        <?php echo $form->error($model, 'path_descripcion'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'path_entrada'); ?>
        <?php echo $form->fileField($model, 'path_entrada'); ?>
        <?php echo $form->error($model, 'path_entrada'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'path_salida'); ?>
        <?php echo $form->fileField($model, 'path_salida'); ?>
        <?php echo $form->error($model, 'path_salida'); ?>
    </div>
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>
<?php $this->endWidget(); ?>
</div><!-- form -->