<?php
	session_start ();
	include("includes/usarBD.php");
	$_SESSION["ckA"]=$_GET["ckA"];
?>
<script language="javascript">
	function mandar(pagina)
	{
		document.eliminarA.action=pagina;
		document.eliminarA.submit();
	}
</script>

	<form action="" name="eliminarA" method="GET">
	<center><b>¿Esta Seguro de Querer Borrar a: <font color="red"><?php echo($_SESSION["ckA"])?></font>?</b><br>
	<i>Tenga en cuenta, que esta Acci&oacute;n no ser&aacute; desecha.</i><br>
	<select name="bb" multiple size="2" ><option height="300" value="Si" onClick="javascript:mandar('eliminarScript2A.php');">Si</option><option value="No" onClick="javascript:mandar('eliminarScript2A.php');">No</option></select>
	<hr width="40%" color="#f2a"/>
	</center>
	</form>
	