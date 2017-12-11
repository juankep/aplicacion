<?php
	ob_start("ob_gzhandler");
	session_start ();
	include("includes/usarBD.php");
	$seleccion = $_POST["ddSeleccion"];
	$elemento = $_POST["txBuscar"];
	if($seleccion==""){
		echo("<center><a>Debe Seleccionar un tipo de busqueda</a><img src='imagenes/busqueda.jpg' /></center>");
	}
	if($seleccion=="idServicio")
	{
		$busqueda = "SELECT * FROM servicio WHERE ".$seleccion. "='".$elemento."';";
	}
	else
	{
		$busqueda = "SELECT * FROM servicio WHERE ".$seleccion. " like '%".$elemento."%';";
	}
	$busquedaScript = mysql_query($busqueda, $conexion);
	$contar="SELECT * from reserva WHERE ci= '".$_SESSION["txUsuario"]."';";
	$contarScript=mysql_query($contar, $conexion);
	$numeroDeRegistros = mysql_num_rows($contarScript);
?>
<style type="text/css">
BODY{background:#FFFFFF;}
.mensaje
{
	font-family:arial;
	font-size:28px;
	align:center;
}
.submitImagen
{
	background-image:url(servicionoagregado.gif);
	background-repeat:no-repeat;
	height:30px;
	width:130px;
	color:white;
	font-size:1px;
	background-position:center;
	border-color:red;
}
.submitImagenBorrar
{
	background-image:url(servicioagregado.gif);
	background-repeat:no-repeat;
	height:30px;
	width:130px;
	color:white;
	font-size:1px;
	background-position:center;
	border-color:red;
}
.definiciones
{
	font-family:verdana;
	font-size:14px;
}
.valores
{
	font-family:verdana;
	font-size:14px;
	font-weight: bold;	
}


.button, .button:visited { /* botones genéricos */
display: inline-block;
padding: 5px 10px 6px;
color: #DDD;
text-decoration: none;
-moz-border-radius: 16px;
-webkit-border-radius: 12px;
-moz-box-shadow: 0 1px 3px rgba(0,0,0,0.6);
-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.6);
text-shadow: 0 -1px 1px rgba(0,0,0,0.25);
border-top: 0px;
border-left: 0px;
border-right: 0px;
border-bottom: 1px solid rgba(0,0,0,0.25);
cursor:pointer;
}

button::-moz-focus-inner,
input[type="reset"]::-moz-focus-inner,
input[type="button"]::-moz-focus-inner,
input[type="submit"]::-moz-focus-inner,
input[type="file"] > input[type="button"]::-moz-focus-inner {
border: none;
}


.button:active{ /* el efecto click */
top: 13px;
}
/* botones medianos */
.button, .button:visited,.medium.button, .medium.button:visited {
font-size: 13px;
font-weight: bold;
line-height: 1;
text-shadow: 0 -1px 1px rgba(0,0,0,0.25);
}

.blue.button, .blue.button:visited { background-color: #2981E4; }
.blue.button:hover{ background-color: #2575CF; }

</style>
	<?php 
	if(isset($elemento))
	{
		while($datos = mysql_fetch_array($busquedaScript, MYSQL_ASSOC))
		{
			?>
			<table align="center" name="resultados" border="0">
			<tr>
				<td colspan="2" align="center">
				<form action="datosServicio.php" name="datosServicio" id="datosServicio" method="post">
						<input type="submit"  title="Ver Datos del Servicio" class="button medium blue" value="<?php echo($datos["nombre"]);?>" name="dL"/></form>
				</td>
			</tr>
			<tr>
				<td><a class="definiciones">Nombre de Servicio:</a></td>
				<td><a class="valores"><?php echo($datos["descripcion"]); ?></a></td>
			</tr>
			<tr>
				<td><a class="definiciones">Carcteristica del Servicio:</a></td>
				<td><a class="valores"><?php echo($datos["caracteristicas"]); ?></a></td>
			</tr>
			<tr>
				<td><a class="definiciones">Presio del Servicio:</a></td>
				<td><a class="valores"><?php echo($datos["presioServicio"]); ?></a></td>
			</tr>		
			<?php
//---------------------------si es liviano la categoria y labado Exterior-------------------------------------			
			if($datos["idCategoria"]==1 && $datos["nombre"]=='basico Exterior')
			{
			?>
			<tr><td align=""><a class="mensaje">Hora Inicio:</a>
		<select name="ddSeleccionHora" class="dropdown">
			<option class="" value="">Selecciona una</option>
			<option class="dos" value="07:00 09:00">07:00 a 09:00 am</option>
			<option class="uno" value="09:00 11:00">09:00 a 11:00 am</option>
			<option class="dos" value="11:00 13:00">11:00 a 13:00 pm</option>
			<option class="uno" value="13:00 15:00">13:00 a 15:00 pm</option>
		</select></tr>
			<?php
			}
//-------------------------------Si es categoria es liviano y lavaado interior------------------------------------			
			if($datos["idCategoria"]==1 && $datos["nombre"]=='Basico Interior')
			{
			?>
			<tr><td align=""><a class="mensaje">Hora Inicio:</a>
		<select name="ddSeleccion" class="dropdown">
			<option class="" value="">Selecciona una</option>
			<option class="dos" value="nombre">07:00 a 09:00 am</option>
			<option class="uno" value="descripcion">09:00 a 11:00 am</option>
			<option class="dos" value="caracteristicas">11:00 a 13:00 pm</option>
			<option class="uno" value="idServicio">13:00 a 15:00 pm</option>
		</select></tr>
			<?php
			}
//-------------------------------Si es categoria es liviano y lavaado Completo------------------------------------			
			if($datos["idCategoria"]==1 && $datos["nombre"]=='completa')
			{
			?>
			<tr><td align=""><a class="mensaje">Hora Inicio:</a>
		<select name="ddSeleccion" class="dropdown">
			<option class="" value="">Selecciona una</option>
			<option class="dos" value="nombre">07:00 a 11:00 am</option>
			<option class="dos" value="caracteristicas">11:00 a 13:00 pm</option>
			<option class="uno" value="idServicio">14:00 a 17:00 pm</option>
		</select></tr>
			<?php
			}			
//------------------------------Si es categoria autos pesados y lavado Exterior------------------------------------------------------------		
			if($datos["idCategoria"]==2 && $datos["nombre"]=='basico Exterior')
			{
			?>
			<tr><td align=""><a class="mensaje">Hora Inicio:</a>
		<select name="ddSeleccion" class="dropdown">
			<option class="" value="">Selecciona una</option>
			<option class="dos" value="nombre">07:00 a 10:00 am</option>
			<option class="uno" value="descripcion">10:00 a 13:00 am</option>
			<option class="dos" value="caracteristicas">14:00 a 17:00 pm</option>
		</select></tr>
			<?php
			}
//------------------------------si ess categoria autos pesados y lavado Interior------------------------------------------------------------		
			if($datos["idCategoria"]==2 && $datos["nombre"]=='Basico Interior')
			{
			?>
			<tr><td align=""><a class="mensaje">Hora Inicio:</a>
		<select name="ddSeleccion" class="dropdown">
			<option class="" value="">Selecciona una</option>
			<option class="dos" value="nombre">07:00 a 10:00 am</option>
			<option class="uno" value="descripcion">10:00 a 13:00 am</option>
			<option class="dos" value="caracteristicas">14:00 a 17:00 pm</option>
		</select></tr>
			<?php
			}
//------------------------------si ess categoria autos pesados y lavado Completo------------------------------------------------------------		
			if($datos["idCategoria"]==2 && $datos["nombre"]=='completo')
			{
			?>
			<tr><td align=""><a class="mensaje">Hora Inicio:</a>
		<select name="ddSeleccion" class="dropdown">
			<option class="" value="">Selecciona una</option>
			<option class="dos" value="nombre">07:00 a 13:00 am</option>
			<option class="uno" value="descripcion">14:00 a 17:00 pm</option>
		</select></tr>
			<?php
			}
										
			if($datos["stockServicio"]>6)
			{
			?>
			<tr>
				<td colspan="2" align="center"><font color="green"><b><?php echo($datos["stockServicio"]); ?> Servicios Disponibles de Este Tipo</b></font></td>
			</tr>
			<?php
			}
			if($datos["stockServicio"]>3 && $datos["stockServicio"]<=6)
			{
			?>
			<tr>
				<td colspan="2" align="center"><font color="yellow"><b><?php echo($datos["stockServicio"]); ?> Servicios Disponibles de Este Tipo</b></font></td>
			</tr>
			<?php
			}
			if($datos["stockServicio"]>1 && $datos["stockServicio"]<=3)
			{
			?>
			<tr>
				<td colspan="2" align="center"><font color="red"><b><?php echo($datos["stockServicio"]); ?> Servicios Disponibles de Este Tipo</b></font></td>
			</tr>
			<?php
			}
			if($datos["stockServicio"]==1)
			{
			?>
			<tr>
				<td colspan="2" align="center"><font color="red"><b><u>Disponible solo en Sala</u></b></font></td>
			</tr>
			<?php
			}
			if($datos["stockServicio"]==0)
			{
				?><tr><td align="center" colspan="2"><font color="red"><b>Servicio Agotado!.....</b></font></td></tr>
					<?php
			}
			else
			{
			if($numeroDeRegistros <= 3)
			{
				$encontrarID="SELECT idServicio, ci FROM reserva WHERE idServicio='".$datos["idServicio"]."' AND ci= '".$_SESSION["txUsuario"]."';";
				$encontrarIDScript = mysql_query($encontrarID, $conexion);
				if($ing = mysql_fetch_array($encontrarIDScript))
				{
					?>
					<tr><td align="center" colspan="2">
					<form action="borraCarServicios.php" name="formBorrarBusqueda" id="formBorrarBusqueda" method="post">
						<input type="submit" class="submitImagenBorrar" title="Quitar de la Canasta" value="<?php echo($datos["idServicio"]);?>" name="idBorrarServicio"/></form>
					</td></tr>
					<?php
				}
				else
				{
					?>
				<tr><td align="center" colspan="2">
				<form action="carritoServicios.php" name="formResultadosBusqueda" id="formResultadosBusqueda" method="post">
					<input type="submit" class="submitImagen" title="Agregar a Canasta" value="<?php echo($datos["idServicio"]);?>" name="identificadorServicio"/></form>
				</td></tr>
				<?php				
				}
			}
			else
			{
				?>
				<tr>
				  <td align="center" colspan="2"><b><i>Elimina un Servicio </i></b></td>
				</tr>
				<?php
			}				
			?>
			<tr><td colspan="2" align="center"><hr color="red" /><hr color="lightblue"/></td></tr>
			</table>
			<?php
		}
		}
	}
	else
	{
		echo("<center><img src='imagenes/busqueda.jpg' /></center>");
	}
	mysql_close($conexion);
	ob_end_flush();
?>