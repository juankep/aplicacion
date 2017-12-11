<?php
	session_start ();
	include("includes/usarBD.php");
	$seleccionar="SELECT * FROM servicio ORDER BY idServicio";
	$seleccionarServicioScript=mysql_query($seleccionar, $conexion);
?>
<script language="javascript">
	function ir(pagina)
	{
		document.formEliminarservicio.action=pagina;
		document.formEliminarservicio.submit();
	}
</script>
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
<form target="_top" action="administrador.php?<?php echo (session_name()); ?>=<?php echo (session_id()); ?>">
		<input type="hidden" name="<?php echo (session_name()); ?>" value="<?php echo (session_id()); ?>">
		<input type="submit" value="" class="botonImagen"/>
	</form>
<form action="" method="get" name="formEliminarservicio">
	<table align="center" border="1">
	<tr bgcolor="#aaa"><th>Cod.</th><th>Nombre del Servicio</th><th>Eliminar<br>Completo</th><th>Eliminar <br>Unidad</th></tr>
	<?php
	while($del=mysql_fetch_array($seleccionarServicioScript, MYSQL_ASSOC))
	{
		echo("<tr><td align='center'>".$del['idServicio']."</td>");
		echo("<td>".$del['nombre']."</td>");
		?><td align="center"><input type='checkbox' name='eliminarServicioTodo' value="<?php echo($del['nombre']); ?>" onClick="javascript:ir('eliminarServicioScript.php');" title="Eliminar '<?php echo($del['nombre']); ?>' de la lavadora"></td>
		<?php
		if($del['stockServicio']==1)
		{
			$lib="servicio";
		}
		else
		{
			$lib="servicios";
		}
		?><td align="center"><input type='checkbox' name='eliminarUnidad' value="<?php echo($del['nombre']); ?>" onClick="javascript:ir('eliminarUnidadServicio.php');" title="<?php echo($del['stockServicio']); ?><?php echo(" ".$lib); ?>"></td></tr>
		<?php
	}
	?>
	</table>
</form>