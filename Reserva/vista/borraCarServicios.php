<?php
	session_start ();
	include("includes/usarBD.php");
	$clave=$_POST["idBorrarServicio"];
	$eliminarDeCanasta="DELETE FROM reserva WHERE idServicio='".$clave."';";
	$scriptEliminarDeCanasta = mysql_query($eliminarDeCanasta, $conexion);
	if($scriptEliminarDeCanasta)
	{
		?>
		<body onLoad="javascript:reload();">
		<form action="clientesReserva.php?<?php echo (session_name());;?>=<?php echo(session_id()); ?>" name="retornar" target="_top">
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