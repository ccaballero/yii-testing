<?php
/* @var $this ProyectoController */
/* @var $model Proyecto */


$this->widget('zii.widgets.CBreadcrumbs', array(
		'links' => array(
				'Proyectos'=>array('index'),
				$model->nombre_proy,
				),
		'homeLink' => CHtml::link('Inicio', Yii::app()->homeUrl),
));

$this->menu=array(
	array('label'=>'Lista de Proyectos', 'url'=>array('index')),
	array('label'=>'Lista de Areas', 'url'=>array('areas')),
);
?>

<h3>Proyecto : <?php echo $model->nombre_proy; ?></h3>

<?php
$archivoVideo = null;
foreach($model->archivos as $archivo){
	if(count($archivo->videos) > 0){
		$archivoVideo = $archivo;
		break;
	}
}

if($archivoVideo != null){
?>

<embed type="application/x-mplayer2" pluginspage="http://www.microsoft.com/Windows/MediaPlayer/" 
	src="video/<?php echo $archivoVideo->url_arc ?>" width="480px" height="360px" autostart="0" 
	ShowStatusBar="1" ShowControls="1" DisplaySize="4">;
</embed>

<?php
}else{
	echo "<img src = 'images/videoNoEncontrado2.jpg' height = '360' width = '480'/>";
}

?>

<?php
 	
	$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		           'nombre_proy',
		       array(
			'label'=>'Propietario',
			'value'=>$model->idUsu->usuario_usu,
		       ),
		       array(
			'label'=>'Area',
			'value'=>$model->idAre->nombre_are,
		),
             array(
			'label'=>'Fecha Limite',
			'value'=>$model->idUsu->fecha_lim_act_usu,
		),
	),

));

?>
<form id="tareas-form" action="/videoteca/index.php?r=/proyecto/fechalimite/&id=<?php echo $model->id_usu ?>" method="post">
        <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker',
				array(
                                    'model'=>$model->idUsu,
                                    'attribute'=>'fecha_lim_act_usu',
                                    'language' => 'es',
                                    'options' =>
                                    array(
                                        'dateFormat'=>'yy-mm-dd',
                                        'constrainInput' => 'true',
                                        'duration'=>'fast',
                                        'showAnim' =>'slide',
                                    ),
			)
		);
             if (date("Y-m-d") < $model->idUsu->fecha_lim_act_usu)
            echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Modificar fecha limite');
            else{
            echo CHtml::submitButton('Modificar fecha limite');
             echo ('Error no puede Modificar fecha limite por que la esta fecha ya paso');
            }
        ?>
        
        
       
    </form>
<br><h2>Archivo(s) PDF</h2>
<?php
$dataProvider=new CActiveDataProvider('Pdf', array(
    'criteria'=>array(
    	'alias'=>'pd',
    	'join'=>'inner join archivo as a on (a.id_arc = pd.id_arc)
				inner join tipo_pdf as tp on (tp.id_tip_pdf = pd.id_tip_pdf)',
        'condition'=>'a.id_usu = :idUsuario',
        'params'=>array(':idUsuario'=>$model->id_usu)
    )
));
?>

<?php 	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuario-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
			'name'=>'nombreArchivoPdf',
			'header'=>'Nombre Archivo',
			'value'=>'$data->idArc->nombre_arc',
		),
		array(
			'name'=>'codigoPdf',
			'header'=>'Codigo',
			'value'=>'$data->cod_pdf',
		),
		array(
			'name'=>'nombreTipoPdf',
			'header'=>'Tipo',
			'value'=>'$data->idTipPdf->nombre_tip_pdf',
		),
           array(
                'name'=>'habilitar',
                'header'=>'Estado Modificacion',
                'value' => '$data->idArc->habilitar?\'habilitado\':\'deshabilitado\'',
            ),
           
            array(
         //       <?php if (date("Y-m-d") < $model->idUsu->fecha_lim_act_usu) { ///
                'type' => 'raw',
                'name' => 'nombreTipoPdf',
                'header' => 'Modificar Archivo pdf',
                'value' => 'CHtml::link(CHtml::encode(\'modificar\'), array(\'deshabilitar\', \'id\'=>$data->idArc->id_arc))',
            ),
	),
)); ?>


<?php

/*echo "<br><h2>Archivo(s) de VIDEO</h2>";
$dataProvider=new CActiveDataProvider('Video', array(
    'criteria'=>array(
    	'alias'=>'v',
    	'join'=>'inner join archivo as a on (v.id_arc = a.id_arc) 
				inner join formato_video as fv on (fv.id_for_vid = v.id_for_vid)',
        'condition'=>'v.id_usu = :idUsuario',
        'params'=>array(':idUsuario'=>$model->id_usu)
    )
));
?>

<?php 	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuario-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
			'name'=>'nombreArchivoVideo',
			'header'=>'Nombre Archivo',
			'value'=>'$data->idArc->nombre_arc',
		),
		array(
			'name'=>'duracionVideo',
			'header'=>'Duracion',
			'value'=>'$data->duracion',
		),
		array(
			'name'=>'formatoVid',
			'header'=>'Formato',
			'value'=>'$data->idForV->nombre_for_vid',
		),
	),
)); 
*/
?>