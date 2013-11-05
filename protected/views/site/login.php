<?php /* @var $this SiteController */
      /* @var $model LoginForm */
      /* @var $form CActiveForm  */ ?>

<?php
    $this->pageTitle = Yii::app()->name . ' - Inicio Sesion';
    $this->widget('zii.widgets.CBreadcrumbs', array(
        'links' => array('Inicio Sesion'),
        'homeLink' => CHtml::link('Inicio', Yii::app()->homeUrl),
    ));
?>

<h1>Inicio</h1>
<p>Por favor llene los siguientes campos para iniciar sesion:</p>

<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id' => 'login-form',
	'enableClientValidation' => true,
	'clientOptions' => array(
            'validateOnSubmit' => true,
	),
    )); ?>
        <p class="note">Campos con <span class="required">*</span>
            son requeridos.</p>
        <div class="row">
            <?php echo $form->labelEx($model,'Usuario'); ?>
            <?php echo $form->textField($model,'username'); ?>
            <?php echo $form->error($model,'username'); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'Contraseña'); ?>
            <?php echo $form->passwordField($model,'password'); ?>
            <?php echo $form->error($model,'password'); ?>
        </div>	
        <div class="row buttons">
            <?php echo CHtml::submitButton('Login'); ?>
        </div>
    <?php $this->endWidget(); ?>
</div>
