<?php
session_start();
include("includes/usarBD.php");
?>
<style type="text/css">
.letras
{
	font-size:17px;
}
.titulo
{
	font-family:verdana;
	font-size:15px;
	font-weight:bold;
}
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
<body onLoad="javascript:imprimir()">
<?php
$dia='2';
$mes='Febrero';
$annio='2016';
if($dia!="1" && $mes!="Enero" && $annio!="")
	{
		$buscarHistorial="SELECT DISTINCT nombreCliente, fechaReservaServicio FROM comprobante WHERE fechaRS='".$_SESSION["annio"]."-".$_SESSION["mes"]."-".$_SESSION["dia"]."';";
		$buscarHistorialScript=mysql_query($buscarHistorial, $conexion);
		$contar=mysql_num_rows($buscarHistorialScript);
		if($contar==0)
		{
		?><table align='center'><tr><td><b><font color="red">Ese dia no se hizo Reservas!</font></b></td></tr></table>
		<?php
		}
		else
		{
		?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="administrador.php" class="reg"><< Regresar</a>
		<center><a class="titulo">EMPRESA DE LAVADO DE AUTOS GONLADY "S.A"</a><br>
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
	Fecha Actual: <i><?php echo($diaActual." de ".$mesActual." del ".$annioActual);?></i><br>
	<?php
	switch($_SESSION["mes"])
		{	
			case 1:
			{
				$_SESSION["mes"]="Enero";
				break;
			}
			case 2:
			{
				$_SESSION["mes"]="Febrero";
				break;
			}
			case 3:
			{
				$_SESSION["mes"]="Marzo";
				break;
			}
			case 4:
			{
				$_SESSION["mes"]="Abril";
				break;
			}
			case 5:
			{
				$_SESSION["mes"]="Mayo";
				break;
			}
			case 6:
			{
				$_SESSION["mes"]="Junio";
				break;
			}
			case 7:
			{
				$_SESSION["mes"]="Julio";
				break;
			}
			case 8:
			{
				$_SESSION["mes"]="Agosto";
				break;
			}
			case 9:
			{
				$_SESSION["mes"]="Septiembre";
				break;
			}
			case 10:
			{
				$_SESSION["mes"]="Octubre";
			break;
			}
			case 11:
			{
				$_SESSION["mes"]="Noviembre";
				break;
			}
			case 12:
			{
				$_SESSION["mes"]="Diciembre";
				break;
			}	
		}
	?>
	Reservas correspondientes al dia: <b><?php echo($_SESSION["dia"]." de ".$_SESSION["mes"]." del ".$_SESSION["annio"]); ?>
	<hr color="purple" width="300px"/>
		</center>
		<?php
			while($word=mysql_fetch_array($buscarHistorialScript, MYSQL_ASSOC))
			{
				$horaReserva=substr($word["fechaReservaServicio"],11);
				$consultarTabla="SELECT * FROM comprobante WHERE nombreCliente='".$word["nombreCliente"]."'";
				$consultarTablaScript=mysql_query($consultarTabla, $conexion);
				$contarTablasScript=mysql_num_rows($consultarTablaScript);
				echo("<center><a class='letras'><b>".$word["nombreCliente"]."</b> Realiz&oacute; ".$contarTablasScript." Reservaciones a las <font color='blue'><b>".$horaReserva."</b></font></a></center><br>");
				?>
				<table align="center" border="2">
				<tr bgcolor="#aff"><th align="center">Nombre del Servicio</th><th>Descripcion</th><th>Nombre Cliente</th></tr>
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
</body>
