<?php
	session_start ();
	include("includes/usarBD.php");
	if($_GET["bb"]=="Si")
	{
		$seleccionarLibro="SELECT Stock FROM libros WHERE Titulo='".$_SESSION["eliminarUnidad"]."';";
		$seleccionarLibroScript = mysql_query($seleccionarLibro, $conexion);
		while($sl=mysql_fetch_array($seleccionarLibroScript, MYSQL_ASSOC))
		{
			$eliminarUno=$sl["Stock"]-1;
			$restarActualizar= "UPDATE libros SET Stock='".$eliminarUno."' WHERE Titulo= '".$_SESSION["eliminarUnidad"]."';";
			$restarActualizarScript = mysql_query($restarActualizar, $conexion);
			@mysql_free_result ($restarActualizarScript);
		}
		if($restarActualizarScript)
		{
			?>
			<body onload="javascript:reload();">
			<form action="eliminarLibros.php" name="retornar" target="_top">
				<script language="javascript">
				function reload()
				{
					alert("UN Libro fue Eliminado de la Biblioteca");
					document.retornar.submit();
					
				}
				</script>
			</form>
			</body>
		<?php
		}
		else
		{
		?>
			<body onload="javascript:reload();">
			<form action="eliminarLibros.php" name="retornar" target="_top">
				<script language="javascript">
				function reload()
				{
					alert("ERROR");
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
			<form action="eliminarLibros.php" name="retornar2" target="_top">
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