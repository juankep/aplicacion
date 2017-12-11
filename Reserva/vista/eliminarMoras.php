<?php
	session_start ();
	include("includes/usarBD.php");
	$clave=$_GET["ckMora"];
	if($clave=="")
	{
		?>
		<body onload="javascript:reload();">
		<form action="administrador.php" name="retornar" target="_top">
			<script language="javascript">
			function reload()
			{
				alert("Inserte el Carnet");
				document.retornar.submit();
				
			}
			</script>
		</form>
		</body>
	<?php
	}
	else
	{
	$buscarMoras="SELECT * FROM mora WHERE carnet='".$clave."';";
	$bMScript=mysql_query($buscarMoras, $conexion);
	if(!$wor=mysql_fetch_array($bMScript))
	{
	?>
	<form action="administrador.php" name="retornar" target="_top">
		<script language="javascript">
			alert("Ese Carnet NO Existe");
			document.retornar.submit();
		</script>
	</form>
	<?
	}
	else
	{
	$eliminarMoras="UPDATE mora SET estadoMora='Inactiva' WHERE carnet='".$clave."';";
	$eliminarMorasScript = mysql_query($eliminarMoras, $conexion);
	if($eliminarMorasScript)
	{
		?>
		<body onload="javascript:reload();">
		<form action="administrador.php" name="retornar" target="_top">
			<script language="javascript">
			function reload()
			{
				alert("Mora Eliminada");
				document.retornar.submit();
				
			}
			</script>
		</form>
		</body>
	<?php
	}
	}
	}
?>