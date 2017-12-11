<?php
session_start();
include("includes/usarBD.php");
$cedula=$_GET['txDev'];
$_SESSION["txDev"]=$cedula;
if(isset($cedula))
{
$selectNombre="SELECT nombreCliente FROM cliente WHERE ci='".$cedula."';";
$selectNombreScript=mysql_query($selectNombre, $conexion);
$prestamosCount="SELECT * FROM reserva WHERE ci='".$cedula."' AND estado!='En Canasta';";
$prestamosCountScript=mysql_query($prestamosCount, $conexion);
$numeroDePrestamos = mysql_num_rows($prestamosCountScript);
$servicioCanasta="SELECT * FROM reserva r INNER JOIN servicio s ON (s.idServicio = r.idServicio) WHERE r.ci='".$cedula."';";
$servicioCanastaScript=mysql_query($servicioCanasta, $conexion);
$activar="document.formDevolucion.sbEnviar.disabled=!document.formDevolucion.sbEnviar.disabled";
if($numeroDePrestamos==0)
{
	$cc1=substr($cedula, 0,2);
	$cc2=substr($cedula, 2,4);
	$cc3=substr($cedula, 6,8);
?>
	<center>El Usuario: <b><?php echo($cc1."-".$cc2."-".$cc3);?></b> No realiz&oacute; Servicios</center>
<?php
}
else
{
?>	
<form name="formDevolucion" action="devolucionScript.php" method="post">
<?php
	$fechaEnCurso=date("Y-m-d");
	$annioActual=substr($fechaEnCurso,0,4);
	$mesActual=substr($fechaEnCurso,5,2);
	$diaActual=substr($fechaEnCurso,8);
	switch($mesActual)
	{	
		case 1:
		{
			$mesActual="Enero";
			break;
		}
		case 2:
		{
			$mesActual="Febrero";
			break;
		}
		case 3:
		{
			$mesActual="Marzo";
			break;
		}
		case 4:
		{
			$mesActual="Abril";
			break;
		}
		case 5:
		{
			$mesActual="Mayo";
			break;
		}
		case 6:
		{
			$mesActual="Junio";
			break;
		}
		case 7:
		{
			$mesActual="Julio";
			break;
		}
		case 8:
		{
			$mesActual="Agosto";
			break;
		}
		case 9:
		{
			$mesActual="Septiembre";
			break;
		}
		case 10:
		{
			$mesActual="Octubre";
		break;
		}
		case 11:
		{
			$mesActual="Noviembre";
			break;
		}
		case 12:
		{
			$mesActual="Diciembre";
			break;
		}	
	}
	
	echo("<center><a class='fecha'>Fecha Actual: <i>".$diaActual." de ".$mesActual." del ".$annioActual."</i></a></center>");
	if($al=mysql_fetch_array($selectNombreScript, MYSQL_ASSOC))
	{
	echo("<center><table border='0'><tr><td colspan='2' align='center'><a class='tit'>Nombre del Cliente</a></td></tr><tr><td colspan='2' align='center'><a class='nom'><b>".$al["nombreCliente"]."</b></a></td></tr>");
	echo("<tr><td><a class='tit'>Servicios Realizados:</a></td><td><a class='nom'><b><i>".$numeroDePrestamos." Libro/s<i></b></a></td></tr></table></center>");
	?>
	<br>
	<center>
		<table border="1" name="matrizDatos">
		<tr bgcolor="#EDA">
			<td align="center"><a class="encabezadoTabla">Estado</a></td>
			<td align="center"><a class="encabezadoTabla">Libro</a></td>
			<td align="center"><a class="encabezadoTabla">Editorial</a></td>
			<td align="center"><a class="encabezadoTabla">Autor</a></td>
			<td align="center"><a class="encabezadoTabla">Fecha de Salida</a></td>
			<td align="center"><a class="encabezadoTabla">Fecha a entregar</a></td>
			<td align="center"><a class="encabezadoTabla">Agregar<br>Mora</a></td>
			<td align="center" bgcolor="#a12"><a class="encabezadoTabla">---</a></td>
		</tr>
		<tr>
		<?php 
		while($pr=mysql_fetch_array($prestamosCountScript, MYSQL_ASSOC))
		{
		$can=mysql_fetch_array($servicioCanastaScript, MYSQL_ASSOC);
			$ffDiaS=substr($can["fechaSalida"], 8,2);
			$ffMesS=substr($can["fechaSalida"], 5,2);
			switch($ffMesS)
			{
				case 1:
				{
					$ffMesS="Enero";
					break;
				}
				case 2:
				{
					$ffMesS="Febrero";
					break;
				}
				case 3:
				{
					$ffMesS="Marzo";
					break;
				}
				case 4:
				{
					$ffMesS="Abril";
					break;
				}
				case 5:
				{
					$ffMesS="Mayo";
					break;
				}
				case 6:
				{
					$ffMesS="Junio";
					break;
				}
				case 7:
				{
					$ffMesS="Julio";
					break;
				}
				case 8:
				{
					$ffMesS="Agosto";
					break;
				}
				case 9:
				{
					$ffMesS="Septiembre";
					break;
				}
				case 10:
				{
					$ffMesS="Octubre";
				break;
				}
				case 11:
				{
					$ffMesS="Noviembre";
					break;
				}
				case 12:
				{
					$ffMesS="Diciembre";
					break;
				}	
			}
			$ffAnnioD=substr($can["fechaDevolucion"], 0,4);
			$ffDiaD=substr($can["fechaDevolucion"], 8,2);
			$ffMesD=substr($can["fechaDevolucion"], 5,2);
			switch($ffMesD)
			{
				case 1:
				{
					$ffMesD="Enero";
					break;
				}
				case 2:
				{
					$ffMesD="Febrero";
					break;
				}
				case 3:
				{
					$ffMesD="Marzo";
					break;
				}
				case 4:
				{
					$ffMesD="Abril";
					break;
				}
				case 5:
				{
					$ffMesD="Mayo";
					break;
				}
				case 6:
				{
					$ffMesD="Junio";
					break;
				}
				case 7:
				{
					$ffMesD="Julio";
					break;
				}
				case 8:
				{
					$ffMesD="Agosto";
					break;
				}
				case 9:
				{
					$ffMesD="Septiembre";
					break;
				}
				case 10:
				{
					$ffMesD="Octubre";
				break;
				}
				case 11:
				{
					$ffMesD="Noviembre";
					break;
				}
				case 12:
				{
					$ffMesD="Diciembre";
					break;
				}	
			}
			$ffAnnioS=substr($can["fechaSalida"], 0,4);
			?>
			<td align="center"><a class="cuerpoTablaA"><?php echo($can["Estado"]);?></a></td>
			<td align="center"><a class="cuerpoTabla"><?php echo($can["Titulo"]);?></a></td>
			<td align="center"><a class="cuerpoTabla"><?php echo($can["Editorial"]);?></a></td>
			<td align="center"><a class="cuerpoTabla"><?php echo($can["Autor"]);?></a></td>
			<td align="center"><a class="cuerpoTabla"><?php echo($ffDiaS."/".$ffMesS."/".$ffAnnioS);?></a></td>
			<td align="center"><a class="cuerpoTabla"><?php echo($ffDiaD."/".$ffMesD."/".$ffAnnioD);?></a></td>
			<td align="center"><a class="cuerpoTabla"><?php echo("<input type='checkbox' class='ckk' id='moraLibro' name='moraLibro' value='".$can["idLibro"]."'/>"); ?></a></td>
			<td align="center" bgcolor="#a12"><a class="cuerpoTabla"><?php echo("<input type='radio' id='seleccionLibro' name='seleccionLibro' value='".$can["idLibro"]."' onClick='".$activar."'/>"); ?></a></td>
		</tr>
			<?php
			
		}
		?>
		</table>
		<input type="submit" name="sbEnviar" value="Atencion Al Servicio" disabled="disabled" class="botonS">
		<hr color='#C3A' width="80%"/>
		</center>
	<?php
	}
	else
	{
		echo("<center><h3>Usuario Inexistente</h3></center>");
	}
?>
</form>
<?php
}
}
else
{
	echo("<center><a class='nom'><b>Ingrese su Numero de Cedula <br>en la Parte Izquierda<b></a></center>");
}
?>
<style type="text/css">
BODY
{
	background:url('imagenes/bodyppal.jpg');
	background-repeat:repeat-x;
}
.fecha
{
	font-size:14px;
	font-family:verdana;
	color:black;
}
.tit
{
	font-size:16px;
	font-family:arial;
	color:black;
}
.encabezadoTabla
{
	font-size:14px;
	font-family:verdana;
	color:blue;
	font-weight:bold;
}
.seleccionar
{
	font-size:12px;
	font-family:verdana;
	color:black;
	font-weight:bold;
}
.cuerpoTablaEC
{
	font-size:12px;
	font-family:verdana;
	font-weight:bold;
	color:red;
}
.cuerpoTablaA
{
	font-size:12px;
	font-family:verdana;
	font-weight:bold;
	color: green;
}
.cuerpoTabla
{
	font-size:16px;
	font-family:times;
	font-weight:bold;
}
.nom
{
	font-size:16px;
	font-family:verdana;
}
.botonS
{
	font: bold 13px Verdana;
	padding: 5px 10px;
	color: #1AF;
}
.ckk
{
	background-color: red;
    border: 2px solid blue;
    color: yellow;
}
</style>