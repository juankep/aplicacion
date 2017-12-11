<?php
	session_start ();
	include("includes/usarBD.php");
	$id=$_POST["seleccionLibro"];
	$mora=$_POST["moraLibro"];
	$diasMora=$_POST["dias"];
	$fechaEnCurso=date("Y-m-d");
	$consulta="SELECT * FROM prestamo WHERE idLibro='".$id."' ORDER BY idLibro Asc;";
	$consultaScript=mysql_query($consulta, $conexion);
	$agregarOtraVez="SELECT Stock FROM libros WHERE idLibro= '".$id."';";
	$agregarOtravezScript=mysql_query($agregarOtraVez, $conexion);
	$fechaEnCurso=date("Y-m-d");
	$annioActual=substr($fechaEnCurso,0,4);
	$mesActual=substr($fechaEnCurso,5,2);
	$diaActual=substr($fechaEnCurso,8);
	while($co = mysql_fetch_array($consultaScript, MYSQL_ASSOC))
		{
			if(!$mora)
			{
				$borrar="DELETE FROM prestamo WHERE idLibro= '".$co["idLibro"]."' AND carnet='".$_SESSION["txDev"]."';";
				$borrarScript=mysql_query($borrar, $conexion);
				while($ag=mysql_fetch_array($agregarOtravezScript, MYSQL_ASSOC))
				{
					$add=$ag["Stock"]+1;
					$consulta= "SELECT idLibro FROM libros WHERE idLibro = '".$id."';";
					$consultar = mysql_query($consulta, $conexion);
					$consulta2= "UPDATE libros SET Stock='".$add."' WHERE idLibro = '".$id."';";
					$consultar2 = mysql_query($consulta2, $conexion);
					@mysql_free_result ($autorizarScript);
				}
				@mysql_free_result ($borrarScript);
			}
			else
			{
				$borrar="DELETE FROM prestamo WHERE idLibro= '".$co["idLibro"]."' AND carnet='".$_SESSION["txDev"]."';";
				$borrarScript=mysql_query($borrar, $conexion);
				while($ag=mysql_fetch_array($agregarOtravezScript, MYSQL_ASSOC))
				{
					if($ag["Stock"]<2)
					{
						$tipoMora="Retardo de Libro Escaso";
						$valorMora="5.25";
					}
					else
					{
						$tipoMora="Retardo de Libro";
						$valorMora="1.15";
					}
					$sCarnet="SELECT carnet FROM mora WHERE carnet= '".$_SESSION["txDev"]."' AND estadoMora='Activa';";
					$sCarnetScript=mysql_query($sCarnet, $conexion);
					if(!$row=mysql_fetch_array($sCarnetScript))
					{
						$mora="INSERT INTO mora(carnet, tipoMora, estadoMora, cantidad, fechaMora) VALUES ('".$co["carnet"]."', '".$tipoMora."', 'Activa', '".$valorMora."', '".$annioActual."-".$mesActual."-".$diaActual."');";
						$moraScript = mysql_query($mora, $conexion);
					}
					else
					{
						$cantidadMora="SELECT cantidad FROM mora WHERE carnet= '".$_SESSION["txDev"]."';";
						$cantidadMoraScript=mysql_query($cantidadMora, $conexion);
						$cmr=mysql_fetch_array($cantidadMoraScript);
						$valorMora2=$cmr["cantidad"] + $valorMora;
						$mora="UPDATE mora SET cantidad='".$valorMora2."' WHERE carnet= '".$_SESSION["txDev"]."';";
						$moraScript = mysql_query($mora, $conexion);
					}
					$add=$ag["Stock"]+1;
					$consulta= "SELECT idLibro FROM libros WHERE idLibro = '".$id."';";
					$consultar = mysql_query($consulta, $conexion);
					$consulta2= "UPDATE libros SET Stock='".$add."' WHERE idLibro = '".$id."';";
					$consultar2 = mysql_query($consulta2, $conexion);
					@mysql_free_result ($autorizarScript);
				}
				@mysql_free_result ($borrarScript);
			}
		}	
if($borrarScript){echo("<body background='imagenes/bodyppal.jpg'><center><br><br><br><br><br><br><font face='arial' color='black'>Autorizado Correctamente</font><br><b>Presione 'Consultar' para Ver los Registros</b></center></body>");}
?>
