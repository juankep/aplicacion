<?php
session_start();
?>
<style type="text/css">
BODY
{
	background:url('imagenes/bodyppal.jpg');
	background-repeat:repeat-x;
}
.botonImagen
{
	background-image:url(imagenes/regresar.png);
	background-repeat:no-repeat;
	height:75px;
	width:150px;
	background-position:center;
}
.contenedor
{
	width:22em;
	color:black;
	border-color:blue;
	font-family:arial;
}
.sal
{
	text-decoration:overline;
	font-weight:bold;
	font-size:25px;
	font-family:arial;
}
#cabecera
{
	float: left;
	width: 20%;
}
#menu
{
	float: right;
	width: 80%;
}
	</style>
<html>
<head>
	<title>Consultar Disponibilidad de Servicio</title>
</head>
<div id="cabecera">
<a href="cerrarSesion.php" target="_top" class="sal">Salir</a>
<?php
include("includes/usarBD.php");
$busqueda = "SELECT * FROM servicio order by idServicio;";
$scriptBusqueda = mysql_query($busqueda, $conexion);
$numeroServicios = mysql_num_rows($scriptBusqueda);
$mostrarNombre = "SELECT nombreEmpleado FROM trabajador WHERE user = '".$_SESSION["txUsuario"]."';";
$scriptMostrar = mysql_query($mostrarNombre, $conexion);
while($nombre = mysql_fetch_array($scriptMostrar, MYSQL_ASSOC))
{
	echo("<fieldset class='contenedor'>");
	echo("<a>Sesion Iniciada Como:</a> <a class='nsesesion'><b><u>".$nombre["nombreEmpleado"]. "</u></b></a>");
	echo("<img src='imagenes/pass.gif'>");
	echo("</fieldset>");
}
?>
<!-- MANTIENE LA SESION! -->
<form action="administrador.php?<?php echo (session_name()); ?>=<?php echo (session_id()); ?>">
		<center><input type="hidden" name="<?php echo (session_name()); ?>" value="<?php echo (session_id()); ?>">
		<input type="submit" value="" class="botonImagen"/></center>
</form>
</div>


<body>
<div id="menu">
	<form action="" method="post" name="consultarLibrosForm">
	<script language="javascript">
	function mostrarBuscado(str)
	{
		if (str=="")
		{			
			document.getElementById("tablaServicios").innerHTML="";
			return;
		}
		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("tablaServicios").innerHTML=xmlhttp.responseText;				
			}
		}	
		xmlhttp.open("GET","includes/busquedaServicio.php?q="+str,true);
		xmlhttp.send();
	}
	</script>
	<table align="center">
	<tr>
		<td><a class="contenedor">Buscar:</a></td>
		<td><input type="text" name="txBuscarServicio" onKeyDown="mostrarBuscado(this.value)"></td>
	</tr>
	</table>
	<br>
	<center> �Se encuentran <font color="red"><b><u><?php echo($numeroServicios)?> Servicios </u></b></font>en la Base de Datos!
	<br><br>
	<table name="tablaServicios" id="tablaServicios" border="1" align="center">
	<tr bgcolor="A0A7CC">
		<th align="center" width="30">Codigo</th>
		<th align="center" width="250">Nombre</th>
		<th align="center" width="150">Descripcion</th>
		<th align="center" width="100">Caracteristicas</th>
		<th align="center" width="100">Presio</th>
		<th align="center" width="100">Estado</th>
		<th align="center" width="100">Tipo</th>
		<th align="center" width="100">Categoria</th>
		<th align="center" width="70">StockServicio</th>
	</tr>
		<?php 
		while($electro=mysql_fetch_array($scriptBusqueda, MYSQL_ASSOC))
		{
			echo ("<tr><td align='center'><b>".$electro["idServicio"]."</b></td>");
			echo ("<td>".$electro["nombre"]."</td>");
			echo ("<td>".$electro["descripcion"]."</td>");
			echo ("<td>".$electro["caracteristicas"]."</td>");
			echo ("<td>".$electro["presioServicio"]."</td>");
			echo ("<td>".$electro["estado"]."</td>");
			echo ("<td>".$electro["tipo"]."</td>");
			echo ("<td>".$electro["idCategoria"]."</td>");
			echo ("<td align='center'>".$electro["stockServicio"]."</td></tr>");
		}
		?>
	</table> 
</form>
</div>
</body>
</html>