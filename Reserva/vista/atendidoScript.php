<?php
	session_start ();
	include("includes/usarBD.php");
	$id=$_POST["seleccionServicio"];
	$mora=$_POST["moraServicio"];
	echo($mora);
	$diasMora=$_POST["dias"];
	$fechaEnCurso=date("Y-m-d");
	$consulta="SELECT * FROM reserva WHERE idServicio='".$id."' ORDER BY idServicio Asc;";
	$consultaScript=mysql_query($consulta, $conexion);
	$agregarOtraVez="SELECT stockServicio FROM servicio WHERE idServicio= '".$id."';";
	$agregarOtravezScript=mysql_query($agregarOtraVez, $conexion);
	$fechaEnCurso=date("Y-m-d");
	$annioActual=substr($fechaEnCurso,0,4);
	$mesActual=substr($fechaEnCurso,5,2);
	$diaActual=substr($fechaEnCurso,8);
	while($co = mysql_fetch_array($consultaScript, MYSQL_ASSOC))
		{
			if(!$mora)
			{
				$borrar="DELETE FROM reserva WHERE idServicio= '".$co["idServicio"]."' AND ci='".$_SESSION["txAten"]."';";
				$borrarScript=mysql_query($borrar, $conexion);
				while($ag=mysql_fetch_array($agregarOtravezScript, MYSQL_ASSOC))
				{
					$add=$ag["stockServicio"]+1;
					$consulta= "SELECT idServicio FROM servicio WHERE idServicio = '".$id."';";
					$consultar = mysql_query($consulta, $conexion);
					$consulta2= "UPDATE servicio SET stockServicio='".$add."' WHERE idServicio = '".$id."';";
					$consultar2 = mysql_query($consulta2, $conexion);
					@mysql_free_result ($autorizarScript);
				}
				@mysql_free_result ($borrarScript);
			}
			else
			{
				$borrar="DELETE FROM reserva WHERE idServicio= '".$co["idServicio"]."' AND ci='".$_SESSION["txAten"]."';";
				$borrarScript=mysql_query($borrar, $conexion);
				while($ag=mysql_fetch_array($agregarOtravezScript, MYSQL_ASSOC))
				{
					if($ag["stockServicio"]<2)
					{
						$tipoMora="Retardo de Servicio Escaso";
						$valorMora="5.25";
					}
					else
					{
						$tipoMora="Retardo de Servicio";
						$valorMora="1.15";
					}
					$sCedula="SELECT ci FROM mora WHERE ci= '".$_SESSION["txAten"]."' AND estadoMora='Activa';";
					$sCedulaScript=mysql_query($sCedula, $conexion);
					if(!$row=mysql_fetch_array($sCedulaScript))
					{
						$mora="INSERT INTO mora(ci, motivo, estadoMora, cantidad, fechaEmitida) VALUES ('".$co["ci"]."', '".$tipoMora."', 'Activa', '".$valorMora."', '".$annioActual."-".$mesActual."-".$diaActual."');";
						$moraScript = mysql_query($mora, $conexion);
					}
					else
					{
						$cantidadMora="SELECT cantidad FROM mora WHERE ci= '".$_SESSION["txAten"]."';";
						$cantidadMoraScript=mysql_query($cantidadMora, $conexion);
						$cmr=mysql_fetch_array($cantidadMoraScript);
						$valorMora2=$cmr["cantidad"] + $valorMora;
						$mora="UPDATE mora SET cantidad='".$valorMora2."' WHERE ci= '".$_SESSION["txAten"]."';";
						$moraScript = mysql_query($mora, $conexion);
					}
					$add=$ag["stockServicio"]+1;
					$consulta= "SELECT idServicio FROM servicio WHERE idServicio = '".$id."';";
					$consultar = mysql_query($consulta, $conexion);
					$consulta2= "UPDATE servicio SET stockServicio='".$add."' WHERE idServicio = '".$id."';";
					$consultar2 = mysql_query($consulta2, $conexion);
					@mysql_free_result ($autorizarScript);
				}
				@mysql_free_result ($borrarScript);
			}
		}	
if($borrarScript){echo("<body background='imagenes/bodyppal.jpg'><center><br><br><br><br><br><br><font face='arial' color='black'>Autorizado Correctamente</font><br><b>Presione 'Consultar' para Ver los Registros</b></center></body>");}
?>
