<?php
	session_start ();
	include("includes/usarBD.php");
	$_SESSION["eliminarUnidad"]=$_GET["eliminarUnidad"];
?>
<script language="javascript">
	function mandar(pagina)
	{
		document.eUn.action=pagina;
		document.eUn.submit();
	}
</script>

	<form action="" name="eUn" method="GET">
	<center><b>¿Eliminara un Servicio <font color="red"><?php echo($_SESSION["eliminarUnidad"])?></font> de la Lavadora.</b><br>
	<i>¿Desea Continuar?</i><br>
	<select name="bb" multiple size="2" ><option height="300" value="Si" onClick="javascript:mandar('eliminarUnidadScript2.php');">Si</option><option value="No" onClick="javascript:mandar('eliminarUnidadScript2.php');">No</option></select>
	<hr width="40%" color="#f2a"/>
	</center>
	</form>
	