<?php
session_start();
include("includes/usarBD.php");
$seleccionMora="SELECT * FROM mora WHERE estadoMora='Activa';";
$seleccionMoraScript=mysql_query($seleccionMora, $conexion);
$numerosMoras=mysql_num_rows($seleccionMoraScript);
if($numerosMoras!=0)
{
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
	?><body onLoad="javascript:imprimir()" onClick="javascript:regresar()">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="administrador.php" class="reg"><< Regresar</a>
	<center>
	<a class="titulo"><b>EMPRESA DE LAVADO DE AUTO GONLADY "S.A"</b></a><br>
	Sistema Reservacion gonlady.com<br>
	Moras Existentes <i><?php echo($diaActual." de ".$mesActual." del ".$annioActual);?></i>:
	<?php
	$mostrarMoras="SELECT m.ci, m.cantidad, m.fechaEmitida, a.nombreCliente FROM cliente a INNER JOIN mora m ON(a.ci = m.ci) WHERE estadoMora='Activa';";
	$mostrarMorasScript=mysql_query($mostrarMoras, $conexion);
	echo("<a class='numeros'>->".$numerosMoras." Clientes<-<br></a>");
	echo("<table border='2'>");
	echo("<tr><th>Cedula</th><th>Nombre del Cliente</th><th>Precio</th><th>Fecha de la Mora</th></tr>");
	while($mr=mysql_fetch_array($mostrarMorasScript, MYSQL_ASSOC))
	{
		$cc1=substr($mr["ci"], 0,2);
		$cc2=substr($mr["ci"], 2,4);
		$cc3=substr($mr["ci"], 6,8);
		$annioMora=substr($mr["fechaEmitida"],0,4);
		$mesMora=substr($mr["fechaEmitida"],5,2);
		$diaMora=substr($mr["fechaEmitida"],8);
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
		?>
	<tr><td align="center"><?php echo($cc1."-".$cc2."-".$cc3); ?></td>
	<td><?php echo($mr["nombreCliente"]); ?></td>
	<td align="center"><?php echo("$ ".$mr["cantidad"]); ?></td>
	<td align="center"><?php echo($diaMora."/".$mesMora."/".$annioMora); ?></td></tr>
	<?php
	}
	$sumamysql=mysql_query("SELECT SUM(cantidad) as total FROM mora WHERE estadoMora='Activa';");
	$resultado = mysql_fetch_array($sumamysql, MYSQL_ASSOC);
	$sumaCantidades=$resultado["total"];
	//SUMA DE LAS CANTIDADES
	?>
	<td align="right" colspan="2"><font face="arial">Total:</font></td><td colspan="2"><font face="arial"><b>$ <?php echo(number_format($sumaCantidades, 2, ".", ",")); ?></b></font></td></tr>
	</table>
	</center>
	</body>
	<?php
}
else
{
	?>
	<body onLoad="javascript:mensaje()">
	</body>
	<?php
}
?>

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
		function mensaje()
		{
			alert("No hay Clientes con Moras");
			setTimeout("location.href='administrador.php'", 1000);
		}
		function regresar()
		{
				setTimeout("location.href='administrador.php'", 100);
		}
	</SCRIPT>

	<style type="text/css">
	.nombre{ font-family:verdana; font-size:15px; }
	.numeros{ font-family:verdana; font-size:12px; font-weight:bold; }
	.cliente{ font-family:arial; font-size:15px; font-weight:bold; }
	.definicion{ font-family:arial; font-size:15px; }
.reg
{
	text-decoration:none;
	font-size:18px;
}
.reg:hover
{
	text-decoration:overline;
	color:red;
	font-size:24px;
	font-weight:bold;
}
</style>