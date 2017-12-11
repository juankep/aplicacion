<?php
session_start();
include("includes/usarBD.php");
$dia=$_POST["diaReserva"];
$mes=$_POST["mesReserva"];
$annio=$_POST["annioReserva"];
$_SESSION["dia"]=$dia;
$_SESSION["mes"]=$mes;
$_SESSION["annio"]=$annio;
?>

<style type="text/css">
.letras
{
	font-size:17px;
}
.pr
{
	text-decoration:none;
	font-size:18px;
}
.pr:hover
{
	text-decoration:overline;
	color:red;
	font-size:24px;
	font-weight:bold;
}
</style>
<?php
if($dia!="1" && $mes!="Enero" && $annio!="")
	{
		$buscarHistorial="SELECT DISTINCT nombreCliente, fechaReservaServicio FROM comprobante WHERE fechaRS='".$annio."-".$mes."-".$dia."';";
		$buscarHistorialScript=mysql_query($buscarHistorial, $conexion);
		$contar=mysql_num_rows($buscarHistorialScript);
		if($contar==0)
		{
		?><table align='center'><tr><td><b><font color="red">Ese dia no se hizo Reservas!</font></b></td></tr></table>
		<?php
		}
		else
		{
			echo("<center><a class='pr' href='imprimirHistorialMoras.php' target='_top'>Imprimir</a></center><br>");
			while($word=mysql_fetch_array($buscarHistorialScript, MYSQL_ASSOC))
			{
				$horaReserva=substr($word["fechaReservaServicio"],11);
				$consultarTabla="SELECT * FROM comprobante WHERE nombreCliente='".$word["nombreCliente"]."'";
				$consultarTablaScript=mysql_query($consultarTabla, $conexion);
				$contarTablasScript=mysql_num_rows($consultarTablaScript);
				echo("<center><a class='letras'><b>".$word["nombreCliente"]."</b> Realiz&oacute; ".$contarTablasScript." Reservas a las <font color='blue'><b>".$horaReserva."</b></font></a></center><br>");
				?>
				<table align="center" border="2">
				<tr bgcolor="#aff"><th align="center">Nombre Servicio</th><th>Descripcion</th><th>Nombre del Cliente</th></tr>
				<?php
				while($cont=mysql_fetch_array($consultarTablaScript, MYSQL_ASSOC))
				{
				?>
					<tr><td align="center"><?php echo($cont["tituloServicio"]); ?></td><td><?php echo($cont["descripcion"]); ?></td><td><?php echo($cont["nombreCliente"]); ?></td></tr>
				<?php
				}
				?>
				</table>
				<br>
		<?php
		;
			}
			?>
		<?php
		}
	}
	else
	{
		echo("<center><font color='red'><b></b></font></center>");
	}
	?>


