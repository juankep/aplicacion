<?php
session_start();
include("includes/usarBD.php");
$eliminacion="DELETE FROM reserva WHERE ci= '".$_SESSION["txUsuario"]."';";
$scriptEliminarDeCanasta = mysql_query($eliminacion, $conexion);
session_destroy();
header("Location:index.php");
?>


