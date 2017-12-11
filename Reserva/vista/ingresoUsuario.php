<?php
include("includes/usarBD.php");
$dd=$_POST["IngresarComo"];
$usuario=$_POST["txUsuario"];
$pass1=$_POST["txPass"];
$pass2=$_POST["txPass2"];
$nombre1=$_POST["txNombre"];
$telefono=$_POST["txTelefono"];
$email=$_POST["txEmail"];
$direccion=$_POST["txDireccion"];
$ciudad=$_POST["txCiudad"];
$nombre=ucwords(strtolower($nombre1));
if($dd == "cliente")
{
	$campo1="ci";
	$campo2="password";
	$campo3="password2";
	$campo4="nombreCliente";
	$campo5="telefonoCliente";
	$campo6="emailCliente";
	$campo7="direccion";
	$campo8="ciudad";
	$consulta="INSERT INTO ".$dd." (".$campo1.", ".$campo2.", ".$campo3.", ".$campo4.", ".$campo5.", ".$campo6.", ".$campo7.", ".$campo8.") VALUES('".$usuario."', '".$pass1."', '".$pass2."', '".$nombre."', '".$telefono."', '".$email."', '".$direccion."', '".$ciudad."');";
	if($usuario==NULL)
	{
	?>
		<script language="javascript">
			alert("El Campo USUARIO, esta Vacio");
			setTimeout("location.href='registro.php'", 200);
		</script>
		<?php
	}
	else
	{
		if($pass1 != $pass2)
		{
		?>
			<script language="javascript">
				alert("Las Contraseñas no Coindiciden");
				setTimeout("location.href='registro.php'", 200);
			</script>
			<?php
		}
		else
		{
		
			if($pass1==NULL)
			{
			?>
				<script language="javascript">
					alert("El Campo Contraseña NO debe ir Vacia");
					setTimeout("location.href='registro.php'", 200);
				</script>
				<?php
			}
			else
			{
				if($nombre==NULL)
				{
				?>
					<script language="javascript">
						alert("El Campo NOMBRE, esta Vacio");
						setTimeout("location.href='registro.php'", 200);
					</script>
					<?php
				}
				else
				{
					if (is_numeric($telefono)==false) 
					{
					?>
						<script language="javascript">
							alert("El Campo TELEFONO No es Numerico");
							setTimeout("location.href='registro.php'", 200);	
						</script>
					<?php
					}
					else
					{
						if (is_numeric($usuario)==false) 
						{
						?>
							<script language="javascript">
								alert("El Campo USUARIO, esta Incorrecto \n Debe ser en formato '25-2378-2007' SIN Guiones");
								setTimeout("location.href='registro.php'", 200);
							</script>
						<?php
						}
						else
						{
							$registros=mysql_query($consulta, $conexion);
							?>
							<script language="javascript">
								alert("Registro Realizado de Manera Exitosa");
								setTimeout("location.href='index.php'", 200);
								</script>
							<?php
						}
					}
				}
			}	
		}
	}
}
else
{
	$campo1="user";
	$campo2="password";
	$campo3="password2";
	$campo4="nombreEmpleado";
	$campo5="telefonoEmpleado";
	$campo6="emailEmpleado";
	$campo7="direccionEmpleado";
	$consulta="INSERT INTO ".$dd." (".$campo1.", ".$campo2.", ".$campo3.", ".$campo4.", ".$campo5.", ".$campo6.", ".$campo7.") VALUES('".$usuario."', '".$pass1."', '".$pass2."', '".$nombre."', '".$telefono."', '".$email."', '".$direccion."');";
	if($usuario==NULL)
	{
	?>
		<script language="javascript">
			alert("El Campo USUARIO, esta Vacio");
			setTimeout("location.href='registro.php'", 200);
		</script>
		<?php
	}
	else
	{
		if($pass1 != $pass2)
		{
		?>
			<script language="javascript">
				alert("Las Contraseñas no Coindiciden");
				setTimeout("location.href='registro.php'", 200);
			</script>
			<?php
		}
		else
		{
			if($pass1==NULL)
			{
			?>
				<script language="javascript">
					alert("El Campo Contraseña NO debe ir Vacia");
					setTimeout("location.href='registro.php'", 200);
				</script>
				<?php
			}
			else
			{
				if($nombre==NULL)
				{
				?>
					<script language="javascript">
						alert("El Campo NOMBRE, esta Vacio");
						setTimeout("location.href='registro.php'", 200);
					</script>
					<?php
				}
				else
				{
					if (is_numeric($telefono)==false) 
					{
					?>
						<script language="javascript">
							alert("El Campo TELEFONO No es Numerico");
							setTimeout("location.href='registro.php'", 200);	
						</script>
					<?php
					}
					else
					{
							$registros=mysql_query($consulta, $conexion);
							?>
							<script language="javascript">
								alert("Registro Realizado de Manera Exitosa");
								setTimeout("location.href='index.php'", 200);
								</script>
							<?php
					}
				}	
			}
		}
	}
}
?>