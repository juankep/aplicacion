<?php		
session_start();
include("includes/usarBD.php");
?>
<script language="javascript">
function val(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    patron =/[A-Za-z]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}
</script>
<script language="javascript">
function val2(e2) {
    tecla = (document.all) ? e2.keyCode : e2.which;
    if (tecla==8) return true;
    patron =/[A-Za-z]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

	function ir(pagina)
	{
		document.fAd.action=pagina;
		document.fAd.submit();
	}
</script>
<html>
<title></title>

<table align="center">
	<tr><td align="center" colspan="2"><a class="salir" href="cerrarSinDelete.php" target="_top">Salir</a></td></tr>
	</table>

<div class="config">
	<table border="0">
	<tr><td colspan="2" align="center"><h2>Gesti&oacute;n de Moras</h2></td></tr>
	<tr><td align="center" colspan="2">
	<form action="resultadoMoras.php" method="get" target="ifMora">
	<b>Buscar Mora:<br></b><input type="text" maxlength="10" class="caja2" placeholder='# Cedula' onkeypress='return val(event)' name="txCedulaMora">
	<input type="submit" class="btn" value="Buscar" /></form></td></tr>
	<tr><td><iframe name="ifMora" src="resultadoMoras.php" frameborder="0" height="200" width="450"></iframe></td></tr>
	</table>
</div>

<div class="opciones">
	<div id="navcontainer">
	<center><h2>Menu Principal</h2></center>
		<ul id="navlist">
		<li><a class="enlaces" href="agregarServicio.php"><center>Agregar Servicio</center></a>	<li>
		<li><a class="enlaces" href="autorizarServiciosReserva2.php"><center>Autorizar Servicio Reserva</center></a><li>
		<li><a class="enlaces" href="devolucionAtendidoServicio2.php"><center>Atencion a la Reserva(FACTURA)</center></a><li>
		<li><a class="enlaces" href="consultarDisponibilidadServicio2.php"><center>Consultar Disponibilidad</center></a><li>
		</ul>
	</div>
</div>
	
<center>
<div class="bibl">
<table border="0"><tr><td colspan="2"><h2>Gesti&oacute;n Reserva</h2></td></tr>
	<tr><td><form action="eliminarServicios.php?<?php echo (session_name()); ?>=<?php echo (session_id()); ?>"><input type="submit" value="" class="elimLibro" title="Eliminar Servicio"></form></td>
	<td align="center"><a name="reg" tabindex="1" href="registroUsuarioAdministrador.php" class="registro">Registrar Usuarios</a><a name="reg" tabindex="1" href="registroTrabajadorAdministrador.php" class="registro">Registrar Trabajador</a><br><br><form action="insertarCategoria.php" method="get"><b>Agregar Categoria <br>del Servicio:<br></b><input type="text"  class="caja" name="txCat" onKeyPress="return val2(event)"><br><a class="ej">Ej: "Completo, Basico"</a><br><input type="submit" class="btn" value="Agregar"></form></td></tr>
</table>
</div>
</center>

	<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/tabs.js"></script>
	
	<form name="fAd" method="get" action="">
<link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />
<style type="text/css">
body{background:url('imagenes/bodyppal.jpg');}
.caja
{
	font-family:arial black;
	width:100px;
	border-radius: 4px;
	text-align:center;
	border-color:blue;
}
.caja2
{
	font-family:arial;
	width:100px;
	border-radius: 4px;
	text-align:center;
	border-color:blue;
}
.btn
{
	font-family:arial;
	font-size:15px;
	width:90px;
	border-radius: 17px;
	text-align:center;
}
.palabra
{
	font-variant:small-caps;
	font-weight:bolder;
	white-space:normal;
	font-family:arial;
	background-color: transparent;
}
.bibliotecarios
{
	background-image:url('imagenes/bibliotecarioAdmon.gif');
	background-repeat:no-repeat;
	height:75px;
	width:110px;
	background-position:center;
}
.alumnos
{
	background-image:url('imagenes/alumnoAdmon.gif');
	background-repeat:no-repeat;
	height:75px;
	width:110px;
	background-position:center;
}
.elimLibro
{
	background-image:url('imagenes/elimLibro.png');
	background-repeat:no-repeat;
	height:125px;
	width:120px;
	background-position:center;
}
.ej
{
	color:red;
	font-size:12px;
}
.bibl
{
	float:left;
	width: 33%;
}
.config
{
	float:right;
	width: 33%;
}
.opciones
{
	float:left;
	width: 33%;
}
.salir
{
	font-weight:bold;
	font-size: 28px;
	color:blue;
}
.enlaces
{
	font-size:18px;
}
.tabla
{
	border-color:white;
}

#enlaces, #reportes, #tutoriales, #noticias
{
	font-size:18px;
}
.aopciones
{
	font-size:15px;
	text-decoration:none;
	color:white;
}
.aopciones:hover
{
	font-size:20px;
	text-decoration:overline;
	color:red;
}
#navlist
{
	color: white;
	background: #fff;
	border-bottom: 0.2em solid #17a;
	border-right: 0.2em solid #17a;
	padding: 0 1px;
	margin-left: 0;
	width: 25em;
	font: 12px Verdana, sans-serif;
}

#navlist li
{
	list-style: none;
	margin: 0;
	font-size: 1em;
}

#navlist a
{
	display: block;
	margin-top: 0.2em;
	color: red;
	background: #ddd;
	border-width: 1px;
	border-style: solid;
	border-color: #5bd #035 #068 #6cf;
	border-left: 1em solid #fc0;
	padding: 0.25em 0.5em 0.4em 0.75em;
	text-decoration: none;
}
#navlist a:hover, #navlist a#current:hover
{
	background: #b26;
	border-color: #069 #6cf #5bd white;
	padding: 0.4em 0.35em 0.25em 0.9em;
}

.registro
{
	border:1px solid #f6b22b;
	background-image:url('2010sp.png');
	background-repeat:repeat-x;
	background-position:top left;
	font-family:tahoma;
	font-weight:bolder;
	font-size:14px;
	padding-top:1px;
	padding-bottom:1px;
	padding-left:6px;
	padding-right:9px;
}
.registro:hover {font-weight:bold; color: red; text-decoration: blink;  font-size:18px}

</style>
	<script language="javascript">
	function val(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    patron =/[0-9]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}
	</script>
<!-- MENU PESTAÑAS -->
	<div class="aux">
            <div id="container"><!--..js/jquery.js-->
			<center><h2>Administraci&oacute;n de Recursos Humanos</h2></center>
                <ul class="menu">
                    <li id="noticias" class="active">Trabajadores</li>
                    <li id="tutoriales">Clientes</li>
                    <li id="enlaces">Enlaces</li>
					<li id="reportes">Generar Reportes</li>
                </ul>
                <span class="clear"></span>
                <div class="content noticias">
                    <center><h3>Trabajadores</h3></center>
					<table class="tabla" border="1" width="600">
					<tr>
					<td><font color='red'><b>Codigo</b></font></td>
					<td><font color='red'><b>Usuario</b></font></td>
					<td><font color='red'><b>Nombre del Empleado</b></font></td>
					<td><font color='red'><b>Telefono</b></font></td>
					<td><font color='red'><b>Email</b></font></td>
					<td><font color='red'><b>Direccion</b></font></td>
					<td><font color='red'><b>Eliminar</b></font></td></tr>
                    <?php 
					$trabaj="SELECT * FROM trabajador ORDER BY idEmpleado ASC"; 
					$trabaj2=mysql_query($trabaj, $conexion);
					while($b = mysql_fetch_array($trabaj2, MYSQL_ASSOC))
					{
						echo("<tr><td><font color='white'>".$b["idEmpleado"]."</font></td>");
						echo("<td><font color='white'>".$b["user"]."</font></td>");
						echo("<td><font color='white'>".$b["nombreEmpleado"]."</font></td>");
						echo("<td><font color='white'>".$b["telefonoEmpleado"]."</font></td>");
						echo("<td><font color='white'>".$b["emailEmpleado"]."</font></td>");
						echo("<td><font color='white'>".$b["direccionEmpleado"]."</font></td>");
						?><td align="center"><input type='checkbox' onClick="javascript:ir('eliminarTra.php');" name="ckBi" value="<?php echo($b["nombreEmpleado"]); ?>" ></td></tr>
						<?php
					}
					?>
					</table>
					
                </div>
                <div class="content tutoriales">
                    <center><h3>Clientes</h3></center>
					<table class="tabla" border="1" width="600">
					<tr>
					<td><font color='red'><b>Cedula</b></font></td>
					<td><font color='red'><b>Nombre del Cliente</b></font></td>
					<td><font color='red'><b>Telefono</b></font></td>
					<td><font color='red'><b>Email</b></font></td>
					<td><font color='red'><b>Direccion</b></font></td>
					<td><font color='red'><b>Eliminar</b></font></td></tr>
                    <?php 
					$bibli="SELECT * FROM cliente ORDER BY nombreCliente ASC"; 
					$bibli2=mysql_query($bibli, $conexion);
					while($bi = mysql_fetch_array($bibli2, MYSQL_ASSOC))
					{
						$cc1=substr($bi["ci"], 0,2);
						$cc2=substr($bi["ci"], 2,4);
						$cc3=substr($bi["ci"], 6,8);
						$cc4=substr($bi["ci"], 10,15);
						echo("<tr><td><font color='white'>".$cc1."-".$cc2."-".$cc3."-".$cc4."</font></td>");
						echo("<td><font color='white'>".$bi["nombreCliente"]."</font></td>");
						echo("<td><font color='white'>".$bi["telefonoCliente"]."</font></td>");
						echo("<td><font color='white'>".$bi["emailCliente"]."</font></td>");
						echo("<td><font color='white'>".$bi["direccion"]."</font></td>");
						?><td align="center"><input type='checkbox' onClick="javascript:ir('eliminarA.php');" name="ckA" value="<?php echo($bi["nombreCliente"]); ?>" ></td></tr>
						<?php
					}
					?>
					</table>
                </div>
                <div class="content enlaces">
                    <h3>Deber&iacute;as Visitar...</h3>
                    <ul>
                        <li><img src="img/bullet.png" alt="-" /> <a href="http://www.jquery.com">www.jquery.com</a> - Desarrollo con JQuery!</li>
                        <li><img src="img/bullet.png" alt="-" /> <a href="http://www.devexpress.com">www.devexpress.com</a> - Controles Ajax</li>
                        <li><img src="img/bullet.png" alt="-" /> <a href="http://www.asp.net/ajax">www.asp.net/ajax</a> - Official Microsoft Site</li>
                        <li><img src="img/bullet.png" alt="-" /> <a href="http://www.google.com">www.google.com</a> - Google Buscador</li>
                    </ul>
                </div>
				 <div class="content reportes">
                   <center> 
				   <a href="reservas.php?<?php echo(session_name());?>=<?php echo(session_id());?>" class="aOpciones">Historial de Reserva</a><br>
				   <a href="morasPrint.php?<?php echo(session_name());?>=<?php echo(session_id());?>" class="aOpciones">Moras Existentes</a>
                </div>
				
            </div>
        </div>
</form>
</html>