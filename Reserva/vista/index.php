<?php
	session_start ();
	include('includes/calendar.php'); 
	extract($_REQUEST);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta charset="utf8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Sistema Biblioteca</title>
		<script src="scripts/min.js" type="text/javascript" charset="utf-8"></script>
		<script src="scripts/calendar.js" type="text/javascript" charset="utf-8"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link rel="stylesheet" type="text/css" media="all" href="css/style2.css" /> <!-- ESTILO DEL ACORDEON -->
	<script type="text/javascript" src="js/jquery2.js"></script>
    <link rel="stylesheet" href="css/style.css" /> <!-- ADMINISTRADOR-->
    <script src="js/jquery.min.js"></script>
    <script src="js/login.js"></script>
	<script type="text/javascript">
$(document).ready(function()
{
	$("#menu ul li ul").hide();	
	$("#menu ul li span.current").addClass("open").next("ul").show();
	$("#menu ul li span").click(function(){	
		$(this).next("ul").slideToggle("slow").parent("li").siblings("li").find("ul:visible").slideUp("fast");
		$("#menu ul li").find("span").removeClass("open");
		$(this).addClass("open");
	});

});
</script><marquee><font color="red"><a class="sbutec">RESERVA</a><a class="sbest"> PARA </a><a class="sbutec">TU</a><a class="sbutec"> LAVADO</a><a class="sbest"> DE </a><a class="sbutec">AUTO</a></font></marquee>
	</head>
<!--LOGIN ADMINISTRADOR -->
<div id="bar">
        <div id="container">
            <!-- Login Starts Here -->
            <div id="loginContainer">
                <a href="#" id="loginButton"><span>Administrador</span><em></em></a>
                <div style="clear:both"></div>
                <div id="loginBox">                
                    <form id="loginForm" action="validarAdmon.php" method="post">
                        <fieldset id="body">
                            <fieldset>
                                <label for="email">Nombre de Usuario:</label>
                                <input type="text" name="user" id="email" />
                            </fieldset>
                            <fieldset>
                                <label for="password">Contrase&ntilde;a:</label>
                                <input type="password" name="password" id="password" />
                            </fieldset>
                            <input type="submit" id="login" value="Ingresar" />
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
	</div>
<!-- FIN DE LOGIN -->
<style type="text/css">
.palabra
{
	font-weight:bold;
	font-family:arial;
	font-size:12px;
}
.sbutec
{
	font-size: 16px;
	color:red;
	font-weight:bold;
}
.sbest
{
	font-size: 16px;
	color:blue;
	font-weight:italic;
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

.sub
{
	border:2px solid #00ddbd;
	background-image:url('2010sp.png');
	background-position:0 -90px;
	font-family:arial;
	font-weight:bold;
	font-size:16px;
	color:#a04;
	padding-left:10px;
	padding-right:10px;
}
.check
{
	border-color: blue;
}
.bib
{
	font-family:elephant;
	font-size:14px;
}
.cajas
{
	border-width:1px;
	border-color:#48FD2A;
	height:23px;
	text-align: center;
	text-family:verdana;
	display:block;
}
.cajaspass
{
	border-width:1px;
	border-color:#48FD2A;
	background-image:url('imagenes/pass.gif');
	background-repeat:no-repeat;
	height:23px;
	text-align: center;
}
.calendar
{
	float: left;
	width: 30%;
}
.logCenter
{
	float: center;
	width: 60%;
}
.presentacion
{
	float: right;
	width: 30%;
}
A:link {text-decoration: none}
A:visited {background: #FFCC00; text-decoration: none}
A:active {background: #FFCC00; text-decoration: none}
</style>
<!-- CALENDARIO -->
<div class="calendar">
	<?php 
	$fechaActual=date("Y-m-d");
	$annio=substr($fechaActual,0,4);
	$mes=substr($fechaActual,5,2);
	$dia=substr($fechaActual,8);
	?>
	<center><font face="verdana" color="blue"><h3><?php echo("Calendario ");echo($annio);?></h3></font></center>
	<?php 
		echo (draw_calendar($mes,$annio)); 
		switch($mes)
			{
				case 1:
				{
					$mes="Enero";
					break;
				}
				case 2:
				{
					$mes="Febrero";
					break;
				}
				case 3:
				{
					$mes="Marzo";
					break;
				}
				case 4:
				{
					$mes="Abril";
					break;
				}
				case 5:
				{
					$mes="Mayo";
					break;
				}
				case 6:
				{
					$mes="Junio";
					break;
				}
				case 7:
				{
					$mes="Julio";
					break;
				}
				case 8:
				{
					$mes="Agosto";
					break;
				}
				case 9:
				{
					$mes="Septiembre";
					break;
				}
				case 10:
				{
					$mes="Octubre";
				break;
				}
				case 11:
				{
					$mes="Noviembre";
					break;
				}
				case 12:
				{
					$mes="Diciembre";
					break;
				}	
			}
			echo("<br><br><br><br><br><br><br><center><h4>".$dia." de ".$mes." del ".$annio."</h4></center>");
	?>
	</div>
<!-- FIN DEL CALENDARIO	-->
<!--MISION Y VISION-->
<div class="presentacion">
	<div id="pagia">
    <div id="menu">
       <h3>Bienvenidos</h3>
        <ul>
			<li><span><a href="index.php" id="link-inicio">Inicio</a></span>             
            </li>
            <li><span><a href="javascript:void(0);" id="link-posts">Mision</a></span>
                <ul>
                    <li><a class="bullet">Fidelizar al usuario para que nos reconozcan como empresa.
Brindar un excelente servicio utilizando los recursos adecuados, buscando la satisfacción de nuestros usuarios.
</a></li>
                </ul>
            </li>
            <li><span><a href="javascript:void(0);" id="link-categorias">Vision</a></span>
                <ul>
                    <li><a class="bullet">Ser líderes en el rubro de un auto lavados moderna de nuestra localidad.</a></li>
                </ul>
            </li>
			<li><span><a href="javascript:void(0);" id="link-usuarios">Integrantes</a></span>
                <ul>
                    <li><a class="list">Lady Fueltala</a></li>
					<li><a class="list">Lu&iacute;s Gonzalez</a></li>
                </ul>
            </li>
            <li><span><a href="javascript:void(0);" id="link-informacion">M&aacute;s Informacion</a></span>
                <ul>
                    <li><a class="bullet">información creados para solucionar problemas especificos de la empresa.
</a></li>
                </ul>
            </li>
			<li><span><a href="javascript:void(0);" id="link-contactos">Contactos</a></span>
                <ul>
                    <li><a class="bullet">fabygcom@gmail.com.
</a></li>
                </ul>
            </li>
			<li><span><a href="javascript:void(0);" id="link-ayuda">Ayuda</a></span>
                <ul>
                    <li><a class="bullet">fabygcom@gmail.com.
</a></li>
                </ul>
            </li>
        </ul>
	</div>
	</div>
	</div>
<!-- FIN DE MISION Y VISION-->	
	<form action="validar_usuario.php" name="formLogin" method="post">
	<div class="logCenter">
	<center>
	<br>
	<a name="reg" tabindex="1" href="registro.php" class="registro">Registrarse</a>
	
	<fieldset id="fsLogin" class="clear" style="width:320px;" align="center">
		<legend><i>Ingrese sus Datos!</i></legend>
		<div id="inputs">
		<!--Tabla-->
		<table align="center">
		<tr>
			<td><label class="palabra">Usuario:</label></td>
			<td><input type="text" name="txUsuario" placeholder="Username" maxlength="15" class="cajas"></td>
		</tr>
		<tr>
			<td><label class="palabra">Contrase&ntilde;a:</label></td>
			<td><input type="password" name="txPass" placeholder="Password" maxlength="15" class="cajaspass"></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="checkbox" name="ckTrabajador" value="trabajador" title="Checkar si eres Trabajador"class="check"><label class="bib">Soy Trabajador</label></td>
		</tr>
		<tr>
			<td align="center" colspan="2"><input type="hidden" name="<?php echo (session_name()); ?>" value="<?php echo (session_id()); ?>">
			<input type="submit" value="Ingresar" class="sub"></td>
		</tr>
		</table>
		<!--Fin de la Tabla-->
	</fieldset>
		</center>
		</div>
		</div>
		<iframe src="demo/" width="820" frameborder="0"  height="410"></iframe>
	</form>
	<fooder><center><span> lfgonzalez © 2016</span></center></fooder>
</html>