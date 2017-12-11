<?php
	session_start ();
	include("includes/usarBD.php");
	if($_GET["bb"]=="Si")
	{
		$eliminarLibro="DELETE FROM servicio WHERE nombre='".$_SESSION["eliminarServicioTodo"]."';";
		$eliminarServicioScript = mysql_query($eliminarServicio, $conexion);
		if($eliminarServicioScript)
		{
			?>
			<body onLoad="javascript:reload();">
			<form action="eliminarServicios.php" name="retornar" target="_top">
				<script language="javascript">
				function reload()
				{
					alert("Servicio Eliminado Completamente de la Lavadora");
					document.retornar.submit();
					
				}
				</script>
			</form>
			</body>
		<?php
		}
	}
	else
	{
	?>
		<body onLoad="javascript:reload2();">
			<form action="eliminarServicios.php" name="retornar2" target="_top">
				<script language="javascript">
				function reload2()
				{
					document.retornar2.submit();
					
				}
				</script>
			</form>
		</body>
	<?php
	}
?>