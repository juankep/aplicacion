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
$idServicio=$_POST["codigoServicio"];
$nombre=ucwords(strtolower($nombre1));
if($dd == "trabajador")
{
	$campo1="user";
	$campo2="password";
	$campo3="password2";
	$campo4="nombreEmpleado";
	$campo5="telefonoEmpleado";
	$campo6="emailEmpleado";
	$campo7="direccionEmpleado";
	$campo8="idServicio";
	$consulta="INSERT INTO ".$dd." (".$campo1.", ".$campo2.", ".$campo3.", ".$campo4.", ".$campo5.", ".$campo6.", ".$campo7.", ".$campo8.") VALUES('".$usuario."', '".$pass1."', '".$pass2."', '".$nombre."', '".$telefono."', '".$email."', '".$direccion."', '".$idServicio."');";
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
								setTimeout("location.href='administrador.php'", 200);
								</script>
							<?php
					}
				}	
			}
		}
	}
}
?>