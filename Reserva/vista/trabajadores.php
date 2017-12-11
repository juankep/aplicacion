<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Reservacion Lavado para AUTOS</title>
	<center><h1>Area Trabajador</h1><img src="imagenes/banner_biblioteca.jpg" /></center>
</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="cs/demo.css" />
	<script type="text/javascript" src="js/demo.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
<body>
<?php
include("includes/usarBD.php");
$mostrarNombre="SELECT nombreEmpleado FROM trabajador WHERE user= '".$_SESSION["txUsuario"]."';";
$scriptMostrar=mysql_query($mostrarNombre, $conexion);
while($nombre=mysql_fetch_array($scriptMostrar, MYSQL_ASSOC))
{
	echo("<div class='dleft'><a href='cerrarSesion.php' target='_top'><img class='salir' src='imagenes/salir.png'/></a><br><fieldset class='contenedor'>");
	echo("<a class='sesion'>Sesion Iniciada Como:</a> <a class='nsesesion'><b><u>".$nombre["nombreEmpleado"]. "</u></b></a>");
	echo("<img src='imagenes/pass.gif'>");
	echo("</fieldset></div>");
}
	
?>
<style type="text/css">
body
{
	background: #17a;
}
.dleft
{
	float: left;
	width: 30%;
}
.contenedor
{
	width:18em;
	color:white;
	border-color:blue;
}
.sesion
{
	font-family:arial;
	font-size:12px;
	color: black;
}
.nsesesion
{
	font-weight: bold;
	font: 13px arial, white, sans-serif;
	color: black;
}
#navlist
{
	color: white;
	background: #fff;
	border-bottom: 0.2em solid #17a;
	border-right: 0.2em solid #17a;
	padding: 0 1px;
	margin-left: 0;
	width: 28em;
	font: normal 15px Verdana, sans-serif;
}

#navlist li
{
	list-style: none;
	margin: 0;
	font-size: 1.2em;
}

#navlist a
{
	display: block;
	margin-top: 0.2em;
	color: red;
	background: #39c;
	border-width: 2px;
	border-style: solid;
	border-color: #5bd #035 #068 #6cf;
	border-left: 1em solid #fc0;
	padding: 0.25em 0.5em 0.4em 0.75em;
	text-decoration: none;
}

#navlist a#current { border-color: #5bd #035 #068 #f30; }

#navlist a
{
	width: 100%;
}

#navlist a
{
	voice-family: "\"}\"";
	voice-family: inherit;
	width: 9em;
}

#navcontainer>#navlist a
{
	width: auto;
}

#navlist a:hover, #navlist a#current:hover
{
	background: #28b;
	border-color: #069 #6cf #5bd white;
	padding: 0.2em 0.35em 0.25em 0.9em;
}

</style>

<center>
	<input type="hidden" name="<?php echo (session_name()); ?>" value="<?php echo (session_id()); ?>">
	<div id="navcontainer">
		<ul id="navlist">		
			
			<li id="active"><a href="agregarServicioT.php?<?php echo (session_name()); ?>=<?php echo (session_id()); ?>" id="current">Agregar Servicio</a></li>
			<li><a href="autorizarServiciosReservaT.php?<?php echo (session_name()); ?>=<?php echo (session_id()); ?>">Autorizar Servicio Reserva</a></li>
			<li><a href="devolucionAtendidoServicioT.php?<?php echo (session_name()); ?>=<?php echo (session_id()); ?>">Atencion a la Reserva(FACTURA)</a></li>
			<li><a href="consultarDisponibilidadServicioT.php?<?php echo(session_name());?>=<?php echo(session_id());?>">Consultar Disponibilidad</a></li>
		</ul>
	</div>
</center>

</body>