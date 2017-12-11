<?php
session_start();
include("includes/usarBD.php");
$dia=$_POST["diaPrestamo"];
$mes=$_POST["mesPrestamo"];
$annio=$_POST["annioPrestamo"];
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
		$buscarHistorial="SELECT DISTINCT nombreAlumno, fechaPrestamoLibro FROM comprobante WHERE fechaPL='".$annio."-".$mes."-".$dia."';";
		$buscarHistorialScript=mysql_query($buscarHistorial, $conexion);
		$contar=mysql_num_rows($buscarHistorialScript);
		if($contar==0)
		{
		?><table align='center'><tr><td><b><font color="red">Ese dia no se hizo Prestamos!</font></b></td></tr></table>
		<?php
		}
		else
		{
			echo("<center><a class='pr' href='imprimirHistorialMoras.php' target='_top'>Imprimir</a></center><br>");
			while($word=mysql_fetch_array($buscarHistorialScript, MYSQL_ASSOC))
			{
				$horaPrestamo=substr($word["fechaPrestamoLibro"],11);
				$consultarTabla="SELECT * FROM comprobante WHERE nombreAlumno='".$word["nombreAlumno"]."'";
				$consultarTablaScript=mysql_query($consultarTabla, $conexion);
				$contarTablasScript=mysql_num_rows($consultarTablaScript);
				echo("<center><a class='letras'><b>".$word["nombreAlumno"]."</b> Realiz&oacute; ".$contarTablasScript." Prestamos a las <font color='blue'><b>".$horaPrestamo."</b></font></a></center><br>");
				?>
				<table align="center" border="2">
				<tr bgcolor="#aff"><th align="center">Titulo</th><th>Autor</th><th>Editorial</th></tr>
				<?php
				while($cont=mysql_fetch_array($consultarTablaScript, MYSQL_ASSOC))
				{
				?>
					<tr><td align="center"><?php echo($cont["Titulo"]); ?></td><td><?php echo($cont["Autor"]); ?></td><td><?php echo($cont["Editorial"]); ?></td></tr>
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


