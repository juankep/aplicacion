<?php
session_start();
include("includes/usarBD.php");
$cedula=$_GET["btnGenerar"];
?><body onLoad="javascript:imprimir()">
<center>
	<a class="titulo"><b>EMPRESA LAVADO DE AUTOS GONLADY "S.A"</b></a><br>
	Sistema Reservacion gonlady.com<br>
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
?>
Fecha Actual: <i><?php echo($diaActual." de ".$mesActual." del ".$annioActual);?></i>
<?php
$mostrarMoras="SELECT m.ci, m.cantidad, m.fechaEmitida, a.nombreCliente FROM cliente a INNER JOIN mora m ON(a.ci = m.ci) WHERE estadoMora='Activa' AND m.ci='".$cedula."';";
$mostrarMorasScript=mysql_query($mostrarMoras, $conexion);
echo("<table border='1' align='center'>");
while($mrInd=mysql_fetch_array($mostrarMorasScript, MYSQL_ASSOC))
{
	$cc1=substr($mrInd["ci"], 0,2);
	$cc2=substr($mrInd["ci"], 2,4);
	$cc3=substr($mrInd["ci"], 6,8);
	echo("<tr><td><b>Cedula:</b></td><td align='center'>".$cc1."-".$cc2."-".$cc3. "</td></tr>");
	echo("<tr><td><b>Nombre:</b></td><td>".$mrInd["nombreCliente"]. "</td></tr>");
	echo("<tr><td><b>Total a pagar:</b></td><td align='center'>=><i><b><font color='red'>$ ".$mrInd["cantidad"]. "</font></b></i><=</td></tr>");
	$annioMora=substr($mrInd["fechaEmitida"],0,4);
	$mesMora=substr($mrInd["fechaEmitida"],5,2);
	$diaMora=substr($mrInd["fechaEmitida"],8);
	switch($mesMora)
	{	
		case 1:
		{
			$mesMora="Enero";
			break;
		}
		case 2:
		{
			$mesMora="Febrero";
			break;
		}
		case 3:
		{
			$mesMora="Marzo";
			break;
		}
		case 4:
		{
			$mesMora="Abril";
			break;
		}
		case 5:
		{
			$mesMora="Mayo";
			break;
		}
		case 6:
		{
			$mesMora="Junio";
			break;
		}
		case 7:
		{
			$mesMora="Julio";
			break;
		}
		case 8:
		{
			$mesMora="Agosto";
			break;
		}
		case 9:
		{
			$mesMora="Septiembre";
			break;
		}
		case 10:
		{
			$mesMora="Octubre";
		break;
		}
		case 11:
		{
			$mesMora="Noviembre";
			break;
		}
		case 12:
		{
			$mesMora="Diciembre";
			break;
		}	
	}
	echo("<tr><td><b>Fecha de la Mora:</b></td><td align='center'>".$diaMora."/".$mesMora."/".$annioMora. "</td></tr>");
}
?>
</table>
<font face="arial">F:</font><font face="arial"><b>____________</b></font>
</center>
</body>
<SCRIPT language="javascript">
function imprimir()
{
	if ((navigator.appName == "Netscape")) 
	{
		window.print();
	}
	else
	{
		var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=5 HEIGHT=4 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
		document.body.insertAdjacentHTML('beforeEnd', WebBrowser); 
		WebBrowser1.ExecWB(6, -1); 
		WebBrowser1.outerHTML = "";
	}
}
</SCRIPT>

<style type="text/css">
	.titulo{ font-family:verdana; font-size:12px; }
	.numeros{ font-family:verdana; font-size:12px; font-weight:bold; }
	.alumno{ font-family:arial; font-size:15px; font-weight:bold; }
	.definicion{ font-family:arial; font-size:15px; }
</style>