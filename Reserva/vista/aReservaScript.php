<?php
	session_start ();
	$id=$_POST["seleccionLibro"];
	include("includes/usarBD.php");
	$fechaEnCurso=date("Y-m-d");
	$annioActual=substr($fechaEnCurso,0,4);
	$mesActual=substr($fechaEnCurso,5,2);
	$diaActual=substr($fechaEnCurso,8);
	$valorDD=$_POST['ddEstado'];
	$restarServicio="SELECT stockServicio FROM servicio WHERE nombre= '".$id."';";
	$restarServicioScript=mysql_query($restarServicio, $conexion);
	$consulta="SELECT p.idServicio, l.Servicio FROM servicio l INNER JOIN reserva p ON (l.idServicio = p.idServicio) WHERE nombre='".$id."' AND ci='".$_SESSION["txCedula"]."';";
	$consultaScript=mysql_query($consulta, $conexion);
	while($co = mysql_fetch_array($consultaScript, MYSQL_ASSOC))
	{
		if($valorDD == "Hoy")
		{
			$annioActual2=$annioActual;
			$mesActual2=$mesActual;
			$diaActual2=$diaActual;
			$autorizar="UPDATE reserva SET fechaSalida='".$annioActual2."-".$mesActual2."-".$diaActual2."', fechaDevolucion='".$annioActual2."-".$mesActual2."-".$diaActual2."', Estado='Autorizado' WHERE idServicio= '".$co["idServicio"]."' AND ci='".$_SESSION["txCedula"]."';";
			$autorizarScript=mysql_query($autorizar, $conexion);
			while($rl=mysql_fetch_array($restarServicioScript, MYSQL_ASSOC))
			{
				$sub=$rl["stockServicio"]-1;
				$consulta= "SELECT nombre FROM servicio WHERE nombre= '".$id."' AND ci='".$_SESSION["txCedula"]."';";
				$consultar = mysql_query($consulta, $conexion);
				$consulta2= "UPDATE servicio SET stockServicio='".$sub."' WHERE nombre= '".$id."' AND ci='".$_SESSION["txCedula"]."';";
				$consultar2 = mysql_query($consulta2, $conexion);
				@mysql_free_result ($autorizarScript);
			}
			@mysql_free_result ($autorizarScript);
		}
		else
		{
			$annioActual2=$annioActual;
			$mesActual2=$mesActual;
			$diaActual2=$diaActual;
			$diaSiguiente = $diaActual + 1;
			//Abril
			if($diaSiguiente > 30 && $mesActual== 4)
			{
				$diaSiguiente=1;
				$mesSiguiente = $mesActual + 1;
				$annioSiguiente=$annioActual;
				$autorizar="UPDATE reserva SET fechaSalida='".$annioActual2."-".$mesActual2."-".$diaActual2."', fechaDevolucion='".$annioSiguiente."-".$mesSiguiente."-".$diaSiguiente."', Estado='Autorizado para Mañana' WHERE idServicio= '".$co["idServicio"]."' AND ci='".$_SESSION["txCedula"]."';";
				$autorizarScript=mysql_query($autorizar, $conexion);
				while($rl=mysql_fetch_array($restarServicioScript, MYSQL_ASSOC))
				{
					$sub=$rl["stockServicio"]-1;
					$consulta= "SELECT nombre FROM servicio WHERE nombre= '".$id."' AND ci='".$_SESSION["txCedula"]."';";
					$consultar = mysql_query($consulta, $conexion);
					$consulta2= "UPDATE servicio SET stockServicio='".$sub."' WHERE nombre= '".$id."' AND ci='".$_SESSION["txCedula"]."';";
					$consultar2 = mysql_query($consulta2, $conexion);
					@mysql_free_result ($consulta2);
				}
				@mysql_free_result ($autorizarScript);
			}
			else 
			{
				$autorizar="UPDATE reserva SET fechaSalida='".$annioActual2."-".$mesActual2."-".$diaActual2."', fechaDevolucion='".$annioActual."-".$mesActual."-".$diaSiguiente."', Estado='Autorizado para Mañana' WHERE idServicio= '".$co["idServicio"]."' AND ci='".$_SESSION["txCedula"]."';";
				$autorizarScript=mysql_query($autorizar, $conexion);
				while($rl=mysql_fetch_array($restarServicioScript, MYSQL_ASSOC))
				{
					$sub=$rl["stockServicio"]-1;
					$consulta= "SELECT nombre FROM servicio WHERE nombre= '".$id."' AND ci='".$_SESSION["txCedula"]."';";
					$consultar = mysql_query($consulta, $conexion);
					$consulta2= "UPDATE servicio SET stockServicio='".$sub."' WHERE nombre= '".$id."' AND ci='".$_SESSION["txCedula"]."';";
					$consultar2 = mysql_query($consulta2, $conexion);
					@mysql_free_result ($consulta2);
				}
				@mysql_free_result ($autorizarScript);
			}
			//Junio
			if($diaSiguiente > 30 && $mesActual==6)
			{
				$diaSiguiente=1;
				$mesSiguiente = $mesActual + 1;
				$annioSiguiente=$annioActual;
				$autorizar="UPDATE reserva SET fechaSalida='".$annioActual2."-".$mesActual2."-".$diaActual2."', fechaDevolucion='".$annioSiguiente."-".$mesSiguiente."-".$diaSiguiente."', Estado='Autorizado para Mañana' WHERE idServicio= '".$co["idServicio"]."' AND ".$_SESSION["txCedula"]."';";
				$autorizarScript=mysql_query($autorizar, $conexion);
				while($rl=mysql_fetch_array($restarServicioScript, MYSQL_ASSOC))
				{
					$sub=$rl["stockServicio"]-1;
					$consulta= "SELECT nombre FROM servicio WHERE nombre= '".$id."' AND ".$_SESSION["txCedula"]."';";
					$consultar = mysql_query($consulta, $conexion);
					$consulta2= "UPDATE servicio SET stockServicio='".$sub."' WHERE nombre= '".$id."' AND ".$_SESSION["txCedula"]."';";
					$consultar2 = mysql_query($consulta2, $conexion);
					@mysql_free_result ($consulta2);
				}
				@mysql_free_result ($autorizarScript);
			}
			//Septiembre
			if($diaSiguiente > 30 && $mesActual=9)
			{
				$diaSiguiente=1;
				$mesSiguiente = $mesActual + 1;
				$annioSiguiente=$annioActual;
				$autorizar="UPDATE reserva SET fechaSalida='".$annioActual2."-".$mesActual2."-".$diaActual2."', fechaDevolucion='".$annioSiguiente."-".$mesSiguiente."-".$diaSiguiente."', Estado='Autorizado para Mañana' WHERE idServicio= '".$co["idServicio"]."' AND ".$_SESSION["txCedula"]."';";
				$autorizarScript=mysql_query($autorizar, $conexion);
				while($rl=mysql_fetch_array($restarLibroScript, MYSQL_ASSOC))
				{
					$sub=$rl["stockServicio"]-1;
					$consulta= "SELECT nombre FROM servicio WHERE nombre= '".$id."' AND ".$_SESSION["txCedula"]."';";
					$consultar = mysql_query($consulta, $conexion);
					$consulta2= "UPDATE servicio SET stockServicio='".$sub."' WHERE nombre= '".$id."' AND ".$_SESSION["txCedula"]."';";
					$consultar2 = mysql_query($consulta2, $conexion);
					@mysql_free_result ($consulta2);
				}
				@mysql_free_result ($autorizarScript);
			}
			//Noviembre
			if($diaSiguiente > 30 && $mesActual==11)
			{
				$diaSiguiente=1;
				$mesSiguiente = $mesActual + 1;
				$annioSiguiente=$annioActual;
				$autorizar="UPDATE reserva SET fechaSalida='".$annioActual2."-".$mesActual2."-".$diaActual2."', fechaDevolucion='".$annioSiguiente."-".$mesSiguiente."-".$diaSiguiente."', Estado='Autorizado para Mañana' WHERE idServicio= '".$co["idServicio"]."' AND ".$_SESSION["txCedula"]."';";
				$autorizarScript=mysql_query($autorizar, $conexion);
				while($rl=mysql_fetch_array($restarLibroScript, MYSQL_ASSOC))
				{	
					$sub=$rl["stockServicio"]-1;
					$consulta= "SELECT nombre FROM servicio WHERE nombre= '".$id."' AND ".$_SESSION["txCedula"]."';";
					$consultar = mysql_query($consulta, $conexion);
					$consulta2= "UPDATE servicio SET stockServicio='".$sub."' WHERE nombre= '".$id."' AND ".$_SESSION["txCedula"]."';";
					$consultar2 = mysql_query($consulta2, $conexion);
					@mysql_free_result ($consulta2);
				}
				@mysql_free_result ($autorizarScript);
			}
			//Siguiente Año
			if($mesSiguiente > 12)
			{
				$annioSiguiente = $annioActual + 1;
				$diaSiguiente=1;
				$mesSiguiente=1;
				$autorizar="UPDATE reserva SET fechaSalida='".$annioActual2."-".$mesActual2."-".$diaActual2."', fechaDevolucion='".$annioSiguiente."-".$mesSiguiente."-".$diaSiguiente."', Estado='Autorizado para Mañana' WHERE idServicio= '".$co["idServicio"]."' AND ".$_SESSION["txCedula"]."';";
				$autorizarScript=mysql_query($autorizar, $conexion);
				while($rl=mysql_fetch_array($restarLibroScript, MYSQL_ASSOC))
				{
					$sub=$rl["stockServicio"]-1;
					$consulta= "SELECT nombre FROM servicio WHERE nombre= '".$id."' AND ".$_SESSION["txCedula"]."';";
					$consultar = mysql_query($consulta, $conexion);
					$consulta2= "UPDATE servicio SET stockServicio='".$sub."' WHERE nombre= '".$id."' AND ".$_SESSION["txCedula"]."';";
					$consultar2 = mysql_query($consulta2, $conexion);
					@mysql_free_result ($consulta2);
				}
				@mysql_free_result ($autorizarScript);
			}
			//Febrero
			else if($diaSiguiente > 28 && $mesActual== 2)
			{
				$diaSiguiente=1;
				$mesSiguiente = $mesActual + 1;
				$annioSiguiente=$annioActual;
				$autorizar="UPDATE reserva SET fechaSalida='".$annioActual2."-".$mesActual2."-".$diaActual2."', fechaDevolucion='".$annioSiguiente."-".$mesSiguiente."-".$diaSiguiente."', Estado='Autorizado para Mañana' WHERE idServicio= '".$co["idServicio"]."' AND ".$_SESSION["txCedula"]."';";
				$autorizarScript=mysql_query($autorizar, $conexion);
				while($rl=mysql_fetch_array($restarLibroScript, MYSQL_ASSOC))
				{
					$sub=$rl["stockServicio"]-1;
					$consulta= "SELECT nombre FROM servicio WHERE nombre= '".$id."' AND ".$_SESSION["txCedula"]."';";
					$consultar = mysql_query($consulta, $conexion);
					$consulta2= "UPDATE servicio SET stockServicio='".$sub."' WHERE nombre= '".$id."' AND ".$_SESSION["txCedula"]."';";
					$consultar2 = mysql_query($consulta2, $conexion);
					@mysql_free_result ($consulta2);
				}
				@mysql_free_result ($autorizarScript);
			}
			$autorizarScript=mysql_query($autorizar, $conexion);
		}
	}
if($autorizarScript)
{
?>
<script language="javascript">
alert("Autorizado");
setTimeout("location.href='resultadoAPrestamo.php'", 1000);
</script>
<?php
}
?>
