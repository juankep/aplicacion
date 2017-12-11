<?php
session_start ();
	include("includes/usarBD.php");
	$clave=$_POST["identificadorServicio"];
	$dia=$_POST["ddSeleccionDia"];
	$fecha = date('Y-m-d');
	
	$insertarCanasta="INSERT INTO reserva (ci,fechaReserva,fechaAtencion,idServicio,estado,dia) VALUES ('".$_SESSION["txUsuario"]."','".$fecha."','".$fecha."','".$clave."', 'En Canasta','".$dia."');";
	$scriptInsertarCanasta = mysql_query($insertarCanasta, $conexion);
	if($scriptInsertarCanasta)
	{
	echo($fecha);
		?>
		<body onLoad="javascript:reload();">
		<form action="clientesReserva.php?<?php echo (session_name());;?>=<?php echo(session_id()); ?>" name="retornar" target="_top">
			<script language="javascript">
			function reload()
			{
				alert("Servicio Agregado Exitosamente a Canasta");
				document.retornar.submit();	
			}
			</script>
		</form>
		</body>
	<?php
	}
?>