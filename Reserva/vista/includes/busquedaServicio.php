<?php
	$q=$_GET["q"];
	include("usarBD.php");
if (!$conexion)
  {
  die('Conexion Erronea: ' . mysql_error());
  }
  $consulta="SELECT * FROM servicio where nombre like '%$q%' or idServicio like '%$q%' or descripcion like '%$q%';";
  $result = mysql_query($consulta);
  $numeroDeRegistros = mysql_num_rows($result);
  if($result);
  {
?>
  	<table name="tablaServicios" id="tablaServicios" border="1" align="center">
	<tr bgcolor="A0A7CC">
		<th align="center" width="30">Codigo</th>
		<th align="center" width="250">Nombre</th>
		<th align="center" width="150">Descripcion</th>
		<th align="center" width="100">Caracteristicas</th>
		<th align="center" width="100">Presio</th>
		<th align="center" width="100">Estado</th>
		<th align="center" width="100">Tipo</th>
		<th align="center" width="100">Categoria</th>
		<th align="center" width="70">Existencia</th>
	</tr>
		<?php 
		while($Wservicios=mysql_fetch_array($result, MYSQL_ASSOC))
		{
			echo ("<tr><td align='center'><b>".$Wservicios["idServicio"]."</b></td>");
			echo ("<td>".$Wservicios["nombre"]."</td>");
			echo ("<td>".$Wservicios["descripcion"]."</td>");
			echo ("<td>".$Wservicios["caracteristicas"]."</td>");
			echo ("<td>".$Wservicios["presioServicio"]."</td>");
			echo ("<td>".$Wservicios["estado"]."</td>");
			echo ("<td>".$Wservicios["tipo"]."</td>");
			echo ("<td>".$Wservicios["idCategoria"]."</td>");
			echo ("<td align='center'>".$Wservicios["stockServicio"]."</td></tr>");
		}
		?>
	</table> 
	<?php
	
}
mysql_close($conexion);
?> 