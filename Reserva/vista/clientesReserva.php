<?php
	session_start ();
	include("includes/usarBD.php");
	$contar="SELECT * FROM reserva WHERE ci= '".$_SESSION["txUsuario"]."';";
	$contarScript=mysql_query($contar, $conexion);
	$numeroDeRegistros = mysql_num_rows($contarScript);
?>
<style type="text/css">
BODY
{
	background:url('imagenes/bodyppal2.jpg');
	background-repeat:repeat;
}
.salir
{
	background-repeat:no-repeat;
	height:45px;
	width:50px;
}
.sesion
{
	font-family:arial;
	text-decoration: overline;
	font-size:13px;
}
.ssesion
{
	font-family:arial;
	font-style:italic;
	font-size:13px;
}
.linkRegistros
{
	font-family:arial;
	color:black;
	font-size:14px;
}
.mensaje
{
	font-family:arial;
	font-style:bold;
}
option 
{
	font-family: verdana; 
	font-size: 16px; 
	color:black;
	border: 1px solid lightblue;
} 
option.uno {background-color: #CCC}
option.dos {background-color: #666} 
.buscar
{
	height:28px;
	width:120px;
	font-size:18px;
	background-color:transparent;
	background: url('imagenes/fondopsfinal.jpg') no-repeat;
	border: 1px solid black;
}
.boton
{
    border: 1px solid #333;
	border-radius: 10px;
	webkit-box-shadow: 0 1px 1px #fff;
	-moz-box-shadow:    0 1px 1px #fff;
	-box-shadow:         0 1px 1px #fff;
	font: bold 11px Sans-Serif;
	padding: 6px 10px;
	white-space: nowrap;
	vertical-align: middle;
	color: #666;
	background: transparent;
}
.boton:hover {
    border-bottom: 1px solid #cccccc;
    border-top: 2px solid #666666;
    border-right: 1px solid #cccccc;
    border-left: 2px solid #666666; }
.libroNoHay
{
	font: bold 14px Sans-Serif;
	color:white;
	font-style:italic;
}
.contenedor
{
	width:10em;
	border:1px, white;
	text-align:center;
	border-style:double;
}
.dleft
{
	float: left;
	width: 15%;
}
.bsq
{
	font: bold 14px Sans-Serif;
	color:red;
	font-style:italic;
}
</style>
<html>
	<head>
	</head>
	<body>
		<form action="resultadosBusqueda.php" target="contenidoframe" name="formBusqueda" id="formBusqueda" method="post">		
		<?php
		$mostrarNombre="SELECT nombreCliente FROM cliente WHERE ci= '".$_SESSION["txUsuario"]."';";
		$scriptMostrar=mysql_query($mostrarNombre, $conexion);
		while($nombre=mysql_fetch_array($scriptMostrar, MYSQL_ASSOC))
		{
			echo("<div class='dleft'><a href='cerrarSesion.php' target='_top'><img class='salir' src='imagenes/salir.png'/></a><br><a class='ssesion'>Cliente</a><br><a class='sesion'><b>".$nombre["nombreCliente"]. "</b></a>");
			echo("<img src='imagenes/pass.gif'>");
		}
		?>
		<hr width="200"/><hr width="200"/>
		<center><a class="bsq">Realice su Busqueda</a></center>
		<table align="center">
		<tr><td align=""><a class="mensaje">Buscar por:</a>
		<select name="ddSeleccion" class="dropdown">
			<option class="" value="">Selecciona una</option>
			<option class="dos" value="nombre">Nombre de Servicio</option>
			<option class="uno" value="descripcion">Descripcion de Servicio</option>
			<option class="dos" value="caracteristicas">Otras Caracteristicas de Lavado</option>
			<option class="uno" value="idServicio">Codigo de Servicio</option>
		</select></tr>
		<tr></td><td align="center"><input type="text" name="txBuscar" id="txBuscar" class="buscar"><input type="submit" name="btnBuscar" class="boton" value="Buscar"></td></tr>
		</table>
		<hr width="200"/>
		<fieldset class="contenedor">
		<?php
		if($numeroDeRegistros==0)
		{
			?><a class="libroNoHay">&iexcl; A&uacute;n no se ha a&ntilde;adido esos Servicios!</a>
		<?php
		}
		else if($numeroDeRegistros==1)
		{
		?>
		<a class="linkRegistros"><b><?php echo($numeroDeRegistros); ?> Servicio</b> en Canasta</a><a href="verCarritoServicios.php?<?php echo (session_name());;?>=<?php echo(session_id()); ?>" class="linkRegistros"><img src="vercarrito.gif" width="18" height="18" border="0" align="absmiddle"></a>
		<?php
		}
		else if($numeroDeRegistros >=2 && $numeroDeRegistros <=3)
		{
		?>
		<a class="linkRegistros"><b><?php echo($numeroDeRegistros); ?> Servicios</b> en Canasta</a><a href="verCarritoServicios.php?<?php echo (session_name());;?>=<?php echo(session_id()); ?>" class="linkRegistros"><img src="vercarrito.gif" width="18" height="18" border="0" align="absmiddle"></a>
		<?php
		}
		else if($numeroDeRegistros>=4)
		{
		?>
		<a class="linkRegistros"> Demasiados Servicios!... </a><a href="verCarritoServicios.php?<?php echo (session_name());;?>=<?php echo(session_id()); ?>" class="linkRegistros"><b>Elimina Uno</b></a>
		<?php
		}
		?>
		</fieldset>
		</div>
		
		<center>
		<iframe style="background-color:#F9EFFB;" target="_blank" frameborder="0" name="contenidoframe" id="contenidoframe" width="1000" height="610"><h2>El lavado básico de autos se ofrece desde 3 hasta 18 dólares</h2></iframe>
		</center>
		</form>
	</body>
</html>