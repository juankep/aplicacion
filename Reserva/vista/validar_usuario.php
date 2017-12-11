<?php
	session_start();
?>
<script language="javascript">
	var num=2; 
	function contador()
	{ 
		num--; 
		if(num==0) 
		{
			location='index.php'; 
		}
		document.getElementById('seg').innerHTML=num; 
	}  
</script>
<style type="text/css">
.turn
{
	padding: 0 2px;
	margin-left: 0;
	width: 16em;
	font:bold 18px "Trebuchet MS"; 
	color:black;
}
}
</style>
<?php
	include("includes/usarBD.php");
	$txtusuario = $_REQUEST['txUsuario'];
	$txtpassword = $_REQUEST['txPass'];
	if($txtusuario != "" && $txtpassword != "")
	{
		//Captura de Datos
		$trabajador=$_POST["ckTrabajador"];
		if($trabajador)
		{
			
			$usuario = strtolower(htmlentities($txtusuario, ENT_QUOTES));
			$password = $txtpassword;
			$consulta= "SELECT user, password FROM ".$trabajador." WHERE user= '".$usuario."';";
			$consultar = mysql_query($consulta, $conexion);
			if($biblio = mysql_fetch_array($consultar))
			{
				if($biblio["password"]==$password)
				{
					//$_SESSION["txUsuario"]=$biblio["user"];
					
					$_SESSION["txUsuario"]=$_POST["txUsuario"];
					$_SESSION["txPass"]=$_POST["txPass"];
					?>
					<html>
					<head>
					<script language="javascript" type="text/javascript">
					function mandar(){
					  document.f0.submit();
					}
				  </script>
				  </head>
					<body onLoad="javascript:mandar();">
						<form name="f0" id="f0" method="post" action="trabajadores.php?<?php echo (session_name()); ?>=<?php echo (session_id()); ?>">
							<input type="hidden" name="<?php echo (session_name()); ?>" value="<?php echo (session_id()); ?>">
						</form>
					</body>
					</html>
					<?php
					
				}
				else
				{
					?>
					<body onLoad="setInterval('contador()',1000)" background="imagenes/green.jpg">
						<center>
						<script language="javascript">
						alert("Error en la Contraseña");
						</script>
						<br><a class="turn">Retornando en <span id="seg"><b>2</span> segundos.</b></a></center> 
						<hr />
					</body>
					<?php
				}
			}
			else
			{
					?>
					<body onLoad="setInterval('contador()',1000)" background="imagenes/green.jpg">
						<center>
						<script language="javascript">
						alert("El Usuario NO Existe");
						</script>
						<br><a class="turn">Retornando en <span id="seg"><b>2</span> segundos.</b></a></center> 
						<hr />
					</body>
					<?php
			}
			
		}
		else
		{
			
			$usuario = strtolower(htmlentities($txtusuario, ENT_QUOTES));
			$password = $txtpassword;
			$consulta= "SELECT ci, password from cliente WHERE ci= '".$usuario."';";
			$result = mysql_query($consulta, $conexion);
			if($row=mysql_fetch_array($result))
			{
				if($row["password"]==$password)
				{
					$_SESSION["txUsuario"]=$_POST["txUsuario"];
					$_SESSION["txPass"]=$_POST["txPass"];
					$buscarReserva="Select ci FROM reserva WHERE ci = '".$usuario."';";
					$buscarReservaScript = mysql_query($buscarReserva, $conexion);
					
					if($wor=mysql_fetch_array($buscarReservaScript))
					{
						?>
						<script language="javascript">
							alert("Hay Reservas Actualmente \nConsulte con el Trabajador");
							setTimeout("location.href='index.php'", 1000);
						</script>
						<?php
					}
					else
					{
						$buscarRservaMoras="Select ci FROM mora WHERE ci = '".$usuario."' AND estadoMora='Activa';";
						$buscarReservaMoraScript2 = mysql_query($buscarReservaMoras, $conexion);
						if($buscarMora=mysql_fetch_array($buscarReservaMoraScript2))
						{
							?>
						<script language="javascript">
							alert("Usted Tiene Moras Pendientes \n \nConsulte con el Trabajador");
							setTimeout("location.href='index.php'", 1000);
						</script>
						<?php
						}
						else
						{
						?>
						<html>
						<head>
						<script language="javascript" type="text/javascript">
						function mandar(){
						  document.f0.submit();
						}
					  </script>
					  </head>
						<body onLoad="javascript:mandar();">
							<form name="f0" id="f0" method="post" action="clientesReserva.php?<?php echo (session_name()); ?>=<?php echo (session_id()); ?>">
								<input type="hidden" name="<?php echo (session_name()); ?>" value="<?php echo (session_id()); ?>">
							</form>
						</body>
						</html>
						<?php
						}
						
					}
				}
				else
				{
					?>
					<body onLoad="setInterval('contador()',1000)" background="imagenes/green.jpg">
						<center>
						<script language="javascript">
						alert("Error en la Contraseña");
						</script>
						<br><a class="turn">Retornando en <span id="seg"><b>2</span> segundos.</b></a></center> 
						<hr />
					</body>
					<?php
				}
			}
			else
			{
					?>
					<body onLoad="setInterval('contador()',1000)" background="imagenes/green.jpg">
						<center>
						<script language="javascript">
						alert("El Usuario NO Existe");
						</script>
						<br><a class="turn">Retornando en <span id="seg"><b>2</span> segundos.</b></a></center> 
						<hr />
					</body>
					<?php
			}
		}
		}
		else
		{
					?>
					<body onLoad="setInterval('contador()',1000)" background="imagenes/green.jpg">
						<center>
						<script language="javascript">
						alert("Ingrese datos, en Usuario y la Contraseña");
						</script>
						<br><a class="turn">Retornando en <span id="seg"><b>2</span> segundos.</b></a></center> 
						<hr />
					</body>
					<?php
		}
		mysql_close();
	?>