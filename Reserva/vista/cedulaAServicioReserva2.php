<?php
session_start();
include("includes/usarBD.php");
?>
<form target="_top" action="administrador.php?<?php echo (session_name()); ?>=<?php echo (session_id()); ?>">
		<center><input type="hidden" name="<?php echo (session_name()); ?>" value="<?php echo (session_id()); ?>">
		<input type="submit" value="" class="botonImagen"/></center>
</form>
<?php
echo("<form target='cuerpo' action='resultadoAServicioReserva.php' method='post' name='formCedula'>");
echo("<hr color='#C3A' width=80%/>");
echo("<br>");
echo("<center><a class='texto'><b>Numero de Cedula:</b></a>");
echo("<input type='text' placeholder='Sin guiones' name='txCedula' class='cajaCedula' maxlength='10' title='Ingresarlo SIN GUIONES'><br>");
echo("<input type='submit' name='sbCedula' value='Consultar' class='sb'></center>");
echo("<br>");
echo("<hr color='#C3A' width=80%/>");
echo("</form>");
?>
<style type="text/css">
.botonImagen
{
	background-image:url(imagenes/regresar.png);
	background-repeat:no-repeat;
	height:75px;
	width:150px;
	background-position:center;
}
.texto
{
	font-family:verdana;
	
}
.cajaCedula
{
	font-family:verdana;
	width:100px;
	border-radius: 10px;
	text-align:center;
}
.sb
{
    border: 1px solid #333;
	border-radius: 10px;
	webkit-box-shadow: 0 1px 1px #fff;
	-moz-box-shadow:    0 1px 1px #fff;
	-box-shadow:         0 1px 1px #fff;
	font: bold 11px Sans-Serif;
	padding: 6px 10px;
	white-space: nowrap;
	vertical-align: middle;
	color: #C3A;
	background: transparent;
}
</style>
<input type="text" 

