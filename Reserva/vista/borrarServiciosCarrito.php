<?php
	session_start ();
	include("includes/usarBD.php");
	$clave=$_POST["idCarrito"];
	$eliminarDeCanasta="DELETE FROM reserva WHERE idServicio='".$clave."';";
	$scriptEliminarDeCanasta = mysql_query($eliminarDeCanasta, $conexion);
	if($scriptEliminarDeCanasta)
	{
		?>
		<body onLoad="javascript:reload();">
		<form action="verCarritoServicios.php" name="retornar" target="_top">
			<script language="javascript">
			function reload()
			{
				alert("Eliminado de Canasta");
				document.retornar.submit();
				
			}
			</script>
		</form>
		</body>
	<?php
	}
?>