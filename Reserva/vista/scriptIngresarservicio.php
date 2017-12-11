<?php
	session_start ();
	include("includes/usarBD.php");
	$nombreServicio=$_GET["txNombre"];
	$descripcionServicio=$_GET["txDescripcion"];
	$caracteristicasServicio=$_GET["txCaracteristicas"];
	$presioServicio=$_GET["txPresio"];
        $estadoServicio=$_GET["txEstado"];
        $tipoServicio=$_GET["txTipo"];
	$categoriaServicio=$_GET["ddCategoria"];
	$contenidoServicio=$_GET["txContenido"];
?>
<?php
if($nombreServicio==NULL)
{	
	?>
		<script language="javascript">
			alert("El Campo NOMBRE, esta Vacio");
			setTimeout("location.href='agregarServicio.php'", 200);
		</script>
	<?php
}
if($descripcionServicio==NULL)
{	
	?>
		<script language="javascript">
			alert("El Campo DESCRIPCION, esta Vacio");
			setTimeout("location.href='agregarServicio.php'", 200);
		</script>
	<?php
}
if ( is_numeric($presioServicio)==false) 
{
?>
	<script language="javascript">
	alert("El Campo PRESIO debe ser Numerico");
	setTimeout("location.href='agregarServicio.php'", 200);
	</script>
	<?php
	exit;
}
?>
        <form action="scriptIngresarservicio.php" name="ingresarLibroForm" method="post">
<?php

$buscar="SELECT * FROM servicio;";
$buscarScript=mysql_query($buscar, $conexion);
while($buscarServicio=mysql_fetch_array($buscarScript, MYSQL_ASSOC))
{
	$buscarCampo="SELECT nombre FROM servicio WHERE nombre='".$buscarServicio["nombre"]."';";
	$buscarCampoScript=mysql_query($buscarCampo, $conexion); //OK
	
	
	$consulta= "SELECT nombre FROM servicio WHERE nombre= '".$nombreServicio."';";
	$consultar = mysql_query($consulta, $conexion);
	if($biblio = mysql_fetch_array($consultar))
	{
		?>
		<script language="javascript">		
			alert("El Servicio YA existe");
			setTimeout("location.href='agregarServicio.php'", 20);
		</script>
		<?php
		exit;
	}
	else
	{
	?>
		<script language="javascript">
			alert("Servicio Ingresado de Manera Correcta");
			setTimeout("location.href='agregarServicio.php'", 20);
		</script>
		<?php
		$insercion="INSERT INTO servicio(nombre, descripcion, caracteristicas, presioServicio, estado, tipo, idCategoria, stockServicio) VALUES ('".$nombreServicio."', '".$descripcionServicio."', '".$caracteristicasServicio."', '".$presioServicio."', '".$estadoServicio."', '".$tipoServicio."', '".$categoriaServicio."', '".'1'."');";
		$insertarScript=mysql_query($insercion, $conexion);
		exit;
	}
}
?>
</form>