<?php
session_start();
include("includes/usarBD.php");
$categoria=$_GET["txCat"];
$catM=ucwords($categoria);
if($categoria=="")
{
	?>
	<script language="javascript">
		alert("Ingrese una Categoria"); 
		setTimeout("location.href='administrador.php'", 500);
	</script>
	<?php
}
else
{
	$insertar="INSERT INTO Categoria(nombreCategoria) VALUES ('".$catM."');";
	$comparar="SELECT * FROM Categoria WHERE nombreCategoria='".$catM."';";
	$compararScript=mysql_query($comparar, $conexion);
	if($wor=mysql_fetch_array($compararScript))
	{
	?>
	<script language="javascript">
		alert("Esa Categoria Ya Existe"); 
		setTimeout("location.href='administrador.php'", 500);
	</script>
	<?php
	}
	else
	{
	$insertarScript=mysql_query($insertar, $conexion);
	?>
	<script language="javascript">
		alert("Ingresado al Sistema"); 
		setTimeout("location.href='administrador.php'", 500);
	</script>
	<?php
	}
}
