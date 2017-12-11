<?php
session_start();
include("includes/usarBD.php");
?>
<form action="" name="rMora" method="get">
<?php
$cedulaMora=$_GET["txCedulaMora"];
	if($cedulaMora!="")
	{
		$moras="SELECT * FROM mora WHERE estadoMora='Activa';";
		$moraScript=mysql_query($moras, $conexion);
		$contarMoras=mysql_num_rows($moraScript);
		$moras2="SELECT m.ci, m.cantidad, a.nombreCliente FROM cliente a INNER JOIN mora m ON (m.ci = a.ci) WHERE m.ci='".$cedulaMora."' AND estadoMora='Activa';";
		$mora2Script=mysql_query($moras2, $conexion);
		if($contarMoras==0)
		{
		?><table align='center'><tr><td><b><font color="red">No hay Clientes con Moras!</font></b></td></tr></table>
		<?php
		}
		else
		{
			if($word=mysql_fetch_array($mora2Script, MYSQL_ASSOC))
			{
			?>
			<table align="" border="2">
			<tr bgcolor="#3a2"><th align="center">Cedula</th><th>Nombre</th><th>Precio</th><th><img src="imagenes/eliminar.png"/></th><th>Generar</th></tr>
			<?php
					$annio=substr($word["ci"],6,4);
					$correlativo=substr($word["ci"],2,4);
					$carrera=substr($word["ci"],0,2);
					?>
					<tr class="seleccionarFila"><td align="center"><a class="cnt"><?php echo($carrera."-".$correlativo."-".$annio);?></a></td>
					<td><center><?php echo($word["nombreCliente"]);?></center></td>
					<td>$ <?php echo($word["cantidad"]);?></td>
					<td align="center"><input type="checkbox" name="ckMora" value="<?php echo($word["ci"]); ?>" onClick="javascript:ir('eliminarMoras.php');"/></td>
					<td align="center"><input type="submit" name="btnGenerar" onClick="javascript:ir('moraIndividual.php');" value="<?php echo($word["ci"]); ?>" class="imagenPrint" title="Imprimir Reporte"></td></tr>
					<?php
			}
			else
			{
				echo("<table align='center'><tr><td><b><font color='blue'>Ese Usuario No Tiene Mora</font></b></td></tr></table>");
			}
		?>
		</table>
		<?php
		}
	}
	else
	{
		echo("<center><font color='red'><b><marquee behavior='alternate' direction='right'><img src='imagenes/advertencia.png' width='180' height='50'/></marquee></b></font></center>");
	}
	?>
</form>
<script language="javascript">
	function ir(pagina)
	{
		document.rMora.action=pagina;
		document.rMora.submit();
	}
</script>
<style type="text/css">
.seleccionarFila:hover 
{
	background-color: red;
}
.cnt
{
	font-size:15px;
	font-weight:bold;
}
.imagenPrint
{
	background-image:url('imagenes/page_text_32.png');
	background-position:center;
	color:transparent;
	width:23px;
}
</style>