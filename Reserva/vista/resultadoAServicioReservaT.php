<?php
session_start();
include("includes/usarBD.php");
$cedula=$_POST['txCedula'];
$_SESSION["txCedula"]=$cedula;
if(isset($cedula))
{
$selectNombre="SELECT * FROM cliente WHERE ci='".$cedula."';";
$selectNombreScript=mysql_query($selectNombre, $conexion);
$reservasCount="SELECT * FROM reserva WHERE ci='".$cedula."';";
$reservasCountScript=mysql_query($reservasCount, $conexion);
$numeroDeReservas = mysql_num_rows($reservasCountScript);
$servicioCanasta="SELECT * FROM servicio s INNER JOIN reserva r ON (s.idServicio = r.idServicio) WHERE ci='".$cedula."';";
$servicioCanastaScript=mysql_query($servicioCanasta, $conexion);
$activar="document.formAServicioReserva.sbEnviar.disabled=!document.formAServicioReserva.sbEnviar.disabled";

?>
<script type="text/javascript" language="javascript">
function mostrarBuscado(str)
	{
		if (str=="")
		{			
			document.getElementById("matrizDatos").innerHTML="";
			return;
		}
		if (window.XMLHttpRequest)
		{
			xmlhttp=new XMLHttpRequest();
		}
		else
		{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("matrizDatos").innerHTML=xmlhttp.responseText;				
			}
		}	
		xmlhttp.open("GET","aServicioReservaScript.php?q="+str,true);
		xmlhttp.send();
	}
</script>
<form name="formAServicioReserva" action="aServicioReservaScript.php" method="post">
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
	echo("<table border='0'><tr><td><a class='tit'>Nombre del Cliente:</a></td><td><a class='nom'><b>".$al["nombreCliente"]."</b></a></td></tr>");
	echo("<tr><td><a class='tit'>Reservas Atendidos Realizados:</a></td><td><a class='nom'><b><i>".$numeroDeReservas."<i></b></a></td></tr></table>");
	?>
	<br>
	<center>
		<table border="1" name="matrizDatos">
		<tr bgcolor="#EDA">		
			<td align="center" width="200"><a class="encabezadoTabla">Estado</a></td>
			<td align="center"><a class="encabezadoTabla">Servicio</a></td>
			<td align="center"><a class="encabezadoTabla">Fecha para la Atencion</a></td>
			<td align="center"><a class="seleccionar">---</a></td>
		</tr>
		<tr>
		<?php 
		while($pr=mysql_fetch_array($reservasCountScript, MYSQL_ASSOC))
		{
			while($can=mysql_fetch_array($servicioCanastaScript, MYSQL_ASSOC))
			{
			?>
			<td>
			<?php 
			if($can["estado"]=="En Canasta")
			{
				?>
					<a class="cuerpoTablaEC"><?php echo($can["estado"]);?></a></td>
				<?php
			}
			else
			{
				?>
					<a class="cuerpoTablaA"><?php echo($can["estado"]);?></a></td>
				<?php
			}
			?>
			<td><a class="cuerpoTabla"><?php echo($can["nombre"]);?></a></td>
			<?php
			if($can["estado"]!='Autorizado' && $can["estado"]!='Autorizado para Mañana')
			{
			?>
			<td align="center">
			<select multiple size="2" name="ddEstado">
				<option value="Hoy">- Hoy</option>
				<option value="Maniana">- Ma&ntilde;ana</option>
			</select>
			</td>
			<td align="center"><a class="cuerpoTabla"><?php echo("<input type='radio' id='seleccionServicio' name='seleccionServicio' value='".$can["nombre"]."' onClick='".$activar."'/>"); ?></a></td>
		</tr>
			<?php
			}
			else
			{
			?>
			<td align="center">
			<b><i>Aun no se le a atendido</i></b>
			</td>
			<td align="center">----</td>
		</tr>
		<?php
			
			}
			}
			
		}
		?>
		</table>
		<input type="submit" name="sbEnviar" value="Autorizar" disabled="disabled" class="botonS" onClick="mostrarBuscado(this.value)">
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
	font-size:14px;
	font-family:verdana;
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
</style>