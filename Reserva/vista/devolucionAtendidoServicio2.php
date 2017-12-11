<?php
session_start();
include("includes/usarBD.php");


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
.caja
{
	border: 3px;
    border-color: #a9e36b;
    border-style: solid;
    border-radius: 5px;
    width: 140px;
    height: 30px;
    padding-left: 7px;
    font-family: Georgia;
    font-size: 12px;
    font-style: italic;
    color: #bcbcbc;
    background-image: url(imagenes/bien.png);
    background-repeat: no-repeat;
    background-position: right;
    padding-right: 25px; 
}
.enlaceboton {    font-family: verdana, arial, sans-serif;
    font-size: 10pt;
    font-weight: bold;
    padding: 4px;
    background-color: #46F;
    color: #FFF;
    text-decoration: none;
}
.enlaceboton:link,
.enlaceboton:visited {
    border-top: 1px solid #cccccc;
    border-bottom: 2px solid #666666;
    border-left: 1px solid #cccccc;
    border-right: 2px solid #666666;
}
.enlaceboton:hover {
    border-bottom: 1px solid #cccccc;
    border-top: 2px solid #666666;
    border-right: 1px solid #cccccc;
    border-left: 2px solid #666666;
	border-radius: 5px;
} 
</style>
	
	<form target="_top" action="administrador.php?<?php echo (session_name()); ?>=<?php echo (session_id()); ?>">
		<center><input type="hidden" name="<?php echo (session_name()); ?>" value="<?php echo (session_id()); ?>">
		<input type="submit" value="" class="botonImagen"/></center>
	</form>
	
	<form action="resultadoAtencionServicioAtendido.php" method="get" name="devolucion" target="devolucionFrame">
		<table align="center" border="0">
		<tr><td align="center"><hr color="#c1f"/><b>Num de Cedula:</b></td></tr>
		<tr><td align="center"><input type="text" placeholder="Ej: '2523782007'" class="caja" name="txAten"></td></tr>
		<tr><td align="center"><input type="submit" class="enlaceboton" value="Consultar"><br><hr color="#c1f"/></td></tr>
		</table>
	</form>
	<center><iframe name="devolucionFrame" frameborder="0" width="1000" height="400"></iframe></center>
	<?
?>


