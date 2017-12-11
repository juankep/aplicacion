<?php
	session_start ();
	include("includes/usarBD.php");
	if($_GET["bb"]=="Si")
	{
		$eliminarA="DELETE FROM alumnos WHERE nombreAlumno='".$_SESSION["ckA"]."';";
		$eliminarAScript = mysql_query($eliminarA, $conexion);
		if($eliminarAScript)
		{
			?>
			<body onload="javascript:reload();">
			<form action="administrador.php" name="retornar" target="_top">
				<script language="javascript">
				function reload()
				{
					alert("Alumno Eliminado Completamente");
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
		<body onload="javascript:reload2();">
			<form action="administrador.php" name="retornar2" target="_top">
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