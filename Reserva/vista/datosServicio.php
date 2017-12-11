<?php
	session_start ();
	include("includes/usarBD.php");
	$clave=$_POST["dL"];
	$seleccionIndividual="SELECT * FROM servicio WHERE nombre='".$clave."';";
	$seleccionIndividualScript=mysql_query($seleccionIndividual, $conexion);
	$numeroDeRegistros = mysql_num_rows($seleccionIndividualScript);
	$mostrar=mysql_fetch_array($seleccionIndividualScript);
	echo("<center>");
	echo("<table width='40%' cellspacing='1' cellpadding='2'>");
	echo("<tr><td align='right' colspan='2'><a class='rs'>Codigo: </a><a class='pr'>".$mostrar["idServicio"]."</a></td></tr>");
	echo("<tr><td colspan='2' align='center'><h2>".$mostrar["nombre"]."</h2></td></tr>");
	echo("<tr><td width='60'><a class='pr'>Descripcion:</a></td> <td><a class='rs'>".$mostrar["descripcion"]."</a></td></tr>");
	echo("<tr><td><a class='pr'>Caracteristicas:</a> </td> <td><a class='rs'>".$mostrar["caracteristicas"]."</a></td></tr>");
	echo("<tr><td align='center' colspan='2'><a class='pr'>Cantidad de Presio: </a><br><a class='rs'>".$mostrar["presioServicio"]." Dolares</a><br></td></tr>");
	echo("<tr><td colspan='2' align='center'><font color='blue'><a class='pr'>".$mostrar["stockServicio"]." Ejemplares</font></a></td></tr>");
	echo("<tr><td colspan='2'><a class='pr'>Estado: </a> </td> </tr><tr><td colspan='2'><a class='cont'>".$mostrar["estado"]."</a></td></tr>");
	echo("</table>");
	echo("</center>");
?>
<style type="text/css">
.pr
{
	font-family: verdana;
	font-weight: bold;
}
.rs
{
	font-family: verdana;
}
.cont
{
	font-family: courier;
}
</style>