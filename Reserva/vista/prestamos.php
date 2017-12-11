<?php
session_start();
include("includes/usarBD.php");
?>
<form target="_top" action="administrador.php?<?php echo (session_name()); ?>=<?php echo (session_id()); ?>">
		<center><input type="hidden" name="<?php echo (session_name()); ?>" value="<?php echo (session_id()); ?>">
		<input type="submit" value="" class="botonImagen"/></center>
</form>
<style type="text/css">
.botonImagen
{
	background-image:url(imagenes/regresar.png);
	background-repeat:no-repeat;
	height:75px;
	width:150px;
	background-position:center;
}
</style>
<body background="imagenes/bodyppal.jpg">
<form target="resultadosFechas" method="post" name="formFechas" action="historialPrestamos.php">
<table align="center">
<tr><td align="center"><font face="verdana"><b>Ingrese la Fecha para ver el historial:</b></font></td></tr>
<tr><td align="center">
	<select name="diaPrestamo" id="diaPrestamo"><?php for($j=1; $j<=31; $j++){ echo("<option value=" .$j. ">".$j. "</option>");}?></select>
		<select name="mesPrestamo" id="mesPrestamo">
        <option value="01">Enero</option>
        <option value="02">Febrero</option>
        <option value="03">Marzo</option>
        <option value="04">Abril</option>
        <option value="05">Mayo</option>
        <option value="06">Junio</option>
        <option value="07">Julio</option>
        <option value="08">Agosto</option>
        <option value="09">Septiembre</option>
        <option value="10">Octubre</option>
        <option value="11">Noviembre</option>
        <option value="12">Diciembre</option>
      </select>
		<input type="text" name="annioPrestamo" id="annioPrestamo" style="width:50px;" placeholder="Año">
</td></tr>
<tr><td align="center"><input type="submit" class="boton" value="Examinar >>"></td></tr>
</table>
<br>
<center><iframe name="resultadosFechas" frameborder="0" src="historialPrestamos.php" width="800" height="500"></iframe></center>
</form>
<body>