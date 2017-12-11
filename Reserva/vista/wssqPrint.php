<?php
session_start();
include("includes/usarBD.php");
$seleccion1="SELECT idLibro, carnet FROM prestamo WHERE carnet='".$_SESSION["txUsuario"]."';";
$sScript1=mysql_query($seleccion1, $conexion);

$lprestados="SELECT * FROM prestamo WHERE carnet='".$_SESSION["txUsuario"]."';";
$lprestadosScript=mysql_query($lprestados, $conexion);
$numeroPrestamos=mysql_num_rows($lprestadosScript);
?>
<SCRIPT language="javascript">
	function imprimir()
	{
		if ((navigator.appName == "Netscape")) 
		{
			window.print();
			setTimeout("location.href='cerrarSinDelete.php'", 5000); //Retorno!!!!!!!!!
		}
		else
		{
			var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=5 HEIGHT=4 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
			document.body.insertAdjacentHTML('beforeEnd', WebBrowser); 
			WebBrowser1.ExecWB(6, -1); 
			WebBrowser1.outerHTML = "";
			setTimeout("location.href='cerrarSinDelete.php'", 5000); //Retorno!!!!!!!!!
		}
	}
</SCRIPT> 
<style type="text/css">
.titulo
{
	font-family:verdana;
	font-size:15px;
}
.numeros
{
	font-family:verdana;
	font-size:12px;
	font-weight:bold;
}
.alumno
{
	font-family:arial;
	font-size:15px;
	font-weight:bold;
}
.definicion
{
	font-family:arial;
	font-size:15px;
}
</style>
<body onload="javascript:imprimir()">
<center>
<a class="titulo"><b>UNIDAD EDUCATIVA SAN JUAN DE ILUMAN</b></a><br>
Sistema Biblioteca F@by.com<br>
<i>Comprobante de Retiro de Libros</i><br>

<?php
echo("<a class='numeros'>->".$numeroPrestamos." Libros Prestados<-<br></a>");
$cc1=substr($_SESSION["txUsuario"], 0,2);
$cc2=substr($_SESSION["txUsuario"], 2,4);
$cc3=substr($_SESSION["txUsuario"], 6,8);
echo("Carnet: <b>".$cc1."-".$cc2."-".$cc3."</b><br>"); 
$sa="SELECT p.carnet, a.nombreAlumno FROM alumnos a INNER JOIN prestamo p ON(a.carnet = p.carnet) WHERE p.carnet='".$_SESSION["txUsuario"]."';";
$saAcript=mysql_query($sa, $conexion);
$saa=mysql_fetch_array($saAcript);
echo("Nombre del Alumno:<br> <a class='alumno'>".$saa["nombreAlumno"]."</a><br>"); 
echo("<hr width='15%' color='black'/>");
$fechaEnCurso=date("Y-m-d");
$horaEnCurso=date("H:i:s");
$horaa=substr($horaEnCurso,0,2);
$minutos=substr($horaEnCurso,3,2);
$segundos=substr($horaEnCurso,6,8);
$hora=$horaa-1;
while($ss1 = mysql_fetch_array($sScript1, MYSQL_ASSOC))
{
?>
	<table>
		<tr><td align="center"><a class="definicion">Codigo de Libro: </a><b><?php echo($ss1["idLibro"]); ?></b></td></tr>
		<?php 
		$ss="SELECT alumnos.carnet, alumnos.nombreAlumno, libros.idLibro, libros.Titulo, libros.Autor, libros.Editorial FROM alumnos, libros WHERE alumnos.carnet = '".$_SESSION["txUsuario"]."' AND libros.idLibro ='".$ss1["idLibro"]."'";
		$ssScript=mysql_query($ss, $conexion);
		$ss2= mysql_fetch_array($ssScript);
		?>
		<tr><td colspan="2" align="center"><b>"<?php echo($ss2["Titulo"]); ?>"</b></td></tr>
		<tr><td colspan="2" align="center"><a class="definicion">Autor:</a> <b><?php echo($ss2["Autor"]); ?></b></td></tr>
		<tr><td colspan="2" align="center"><a class="definicion">Editorial:</a> <b><?php echo($ss2["Editorial"]); ?></b></td></tr>
		<tr><td colspan="2" align="center">-----------</td></tr>
	</table>
<?php
$prestamoLibros="INSERT INTO comprobante(carnet, nombreAlumno, idLibro, Titulo, Autor, Editorial, fechaPrestamoLibro, fechaPL) VALUES('".$_SESSION["txUsuario"]."', '".$saa["nombreAlumno"]."', '".$ss1["idLibro"]."', '".$ss2["Titulo"]."', '".$ss2["Autor"]."', '".$ss2["Editorial"]."', '".$fechaEnCurso." ".$hora.":".$minutos.":".$segundos."', '".$fechaEnCurso."');";
$prestamoLibrosScript=mysql_query($prestamoLibros, $conexion);
}
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
	echo("<center><a class='fecha'>Fecha del prestamo: <i>".$diaActual." de ".$mesActual." del ".$annioActual."</i></a></center>");
	
	?>
	<br><b>F:_______________________</b>
	<br><b>Mora:___________________</b>
</center>
</body>
