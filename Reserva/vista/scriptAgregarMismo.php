<?php
	session_start ();
	include("includes/usarBD.php");
	$nombreServicioDD=$_GET["ddServicioNombre"];
	$masUnoCK=$_GET["ckAgregar"];
	$seleccionar="SELECT stockServicio FROM servicio WHERE nombre= '".$nombreServicioDD."';";
	$seleccionarScript=mysql_query($seleccionar, $conexion);
	while($sl=mysql_fetch_array($seleccionarScript, MYSQL_ASSOC))
	{
		$add=$sl["stockServicio"]+1;
		$consulta= "SELECT nombre FROM servicio WHERE nombre= '".$nombreServicioDD."';";
		$consultar = mysql_query($consulta, $conexion);
		$consulta2= "UPDATE servicio SET stockServicio='".$add."' WHERE nombre= '".$nombreServicioDD."';";
		$consultar2 = mysql_query($consulta2, $conexion);
		if($consultar2)
		{
			?>
		<body onLoad="javascript:reload();">
		<form action="agregarServicio.php" name="retornar" target="_top">
			<script language="javascript">
			function reload()
			{
				alert("Servicio Agregado Exitosamente");
				document.retornar.submit();
				
			}
			</script>
		</form>
		</body>
	<?php
		}
	}
?>