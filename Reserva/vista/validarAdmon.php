<?php
	session_start();
	include("includes/usarBD.php");
	$usuario = $_REQUEST['user'];
	$password = $_REQUEST['password'];
	if($usuario == "administrador" && $password == "12345")
	{	
	?>
	<html>
		<head>
		<script language="javascript" type="text/javascript">
		function mandar(){
		document.fEntrar.submit();
		}
		</script>
		</head>
		<body onLoad="javascript:mandar();">
		<form name="fEntrar" id="fEntrar" method="post" action="administrador.php?<?php echo (session_id()); ?>">
			<input type="hidden" name="<?php echo (session_name()); ?>" value="<?php echo (session_id()); ?>">
		</form>
	</body>
	</html>
	<?php
	}
	else
	{
		?>
	<html>
		<head>
		<script language="javascript" type="text/javascript">
		function msj(){
		alert("Error al Logearse-Verifique de Nuevo");
		setTimeout("location.href='index.php'", 1000);
		}
		</script>
		</head>
		<body onLoad="javascript:msj();">
		</body>
	</html>
	<?php
	}
?>