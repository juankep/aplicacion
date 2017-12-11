<?php
	session_start ();
	include("includes/usarBD.php");
	$_SESSION["ckBi"]=$_GET["ckBi"];
?>
<script language="javascript">
	function mandar(pagina)
	{
		document.eliminarBi.action=pagina;
		document.eliminarBi.submit();
	}
</script>

	<form action="" name="eliminarBi" method="Post">
	<center><b>¿Esta Seguro de Querer Borrar: <font color="red"><?php echo($_SESSION["ckBi"])?></font>?</b><br>
	<i>Tenga en cuenta, que esta Acci&oacute;n no ser&aacute; desecha.</i><br>
	<select name="bb" multiple size="2" ><option height="300" value="Si" onClick="javascript:mandar('eliminarScript2Bi.php');">Si</option><option value="No" onClick="javascript:mandar('eliminarScript2Bi.php');">No</option></select>
	<hr width="40%" color="#f2a"/>
	</center>
	</form>
	