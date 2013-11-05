<img
	src="images/fondo.jpg" style="max-width: 100%;">
<h2>Boleta de autorización para el juez.</h2>
<br>
<p>
	El juez <b><?php echo $model->estudiantes[0]->nombre_juez; ?> </b> con codigo de juez
	<b><?php echo $model->estudiantes[0]->cod_juez; ?> </b>.
</p>
<p>
	Notifica que la <b>Universidad Mayor de San Simon</b> le otorga la autorizacion
	de crear sitios de entrenamiento y le otorga posibilidad de subir problemas al sistema
<!--	tiene el título <b><u><?php echo $model->proyecto->nombre_proy; ?> </u>
	</b>, lo cual se hará con fines exclusivamente académicos.-->
</p>
<p>Asimismo se da fe de la veracidad de los datos incluidos en el documento .</p>
<br></br>
<p>
	Firma_______________________________
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fecha:
	<?php
	function convertir_fecha($fecha, $formato_final='') {
if ($formato_final == '') {
/* Si no se ha especificado formato, se devuelve la fecha tal como la teníamos al principio */
return $fecha;
} else {
return date($formato_final, strtotime($fecha));
}
}
/* Aplicación */
echo convertir_fecha(date("d-m-Y "), 'j \\d\e F\\o \\d\e\l Y ');
// Mostrará: Sat 29 de August del 2009 a las 12:45
?>