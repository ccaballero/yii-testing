<?php
/* @var $this PostulanteController */
/* @var $model Postulante */
/* @var $form CActiveForm */
?>

<div class="form">
<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'postulante-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true
)); ?>

    <p class="note"> los espacios marcados<span class="required">*</span> son obligados a llenar.</p>
    <?php echo $form->errorSummary($model); ?>

    <script type="text/javascript">
        var item1='<div id="item-';
        var item2='"><input type="text" name="nombres[]" value="" />'+
            '<input type="text" name="apellidos[]" value="" />'+
            '<a href="" onclick="return quitarPostulante(';
        var item3=');">[Quitar]</a></div>';
        var count=0;
        
        function agregarPostulante() {
            count++;
            $('#list').html($('#list').html()+item1+count+item2+count+item3);
            return false;
        }
        
        function quitarPostulante(numero) {
            $('#item-'+numero).remove();
            return false;
        }
    </script>
    
    <div>
        <div class="row">
            <label>NOMBRES           APELLIDOS DEL OLMPISTA(S)</label>
            <a href="" onclick="return agregarPostulante();">[Agregar Otro olimpista]</a>
            <br />
            <div id="list">
                <div id="item-0">
                    <input type="text" name="nombres[]" value="" /><input type="text" name="apellidos[]" value="" /><a href="" onclick="return quitarPostulante();">[Quitar]</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'direccion'); ?>
        <?php echo $form->textField($model, 'direccion', array(
            'size' => 20,
            'maxlength' => 20
        )); ?>
        <?php echo $form->error($model, 'direccion'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'telefonocontacto'); ?>
        <?php echo $form->textField($model, 'telefonocontacto', array(
            'size' => 20,
            'maxlength' => 20
        )); ?>
        <?php echo $form->error($model, 'telefonocontacto'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'correoelectronico'); ?>
        <?php echo $form->textField($model, 'correoelectronico', array(
            'size' => 20,
            'maxlength' => 20
        )); ?>
        <?php echo $form->error($model, 'correoelectronico'); ?>
    </div>
   
    <div class="row">
        <?php echo $form->labelEx($model, 'Nivel de estudio del olimpista'); ?>
    </div>
    <div class="row">
        <?php echo $form->dropDownList($model, 'id_are', 
                CHtml::listData(Area::model()->findAll(), 'id_are', 'nombre_are'),
                array('empty'=>'Seleccione el nivel del olimpista')); ?>
        <?php echo $form->error($model,'id_are'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'descripcion'); ?>
        <?php echo $form->textArea($model, 'descripcion', array(
            'rows' => 6,
            'cols' => 50
        )); ?>
        <?php echo $form->error($model, 'descripcion'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'fechacreacion'); ?>
    </div>
    <div class="row">
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'fechacreacion',
            'language' => 'es',
            'options' => array(
                'dateFormat' => 'yy-mm-dd',
                'constrainInput' => 'false',
                'duration' => 'fast',
                'showAnim' => 'slide',
            ),
        )); ?>
        <?php echo $form->error($model, 'fechacreacion'); ?>
    </div>
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar Olimpista' : 'Save'); ?>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->
