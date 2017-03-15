<?php 
session_start();//inicializar las variables de sesion
$conexion=require("conexion.php");
$usuario =$_SESSION['usuario'];
$nombreapellido =$_SESSION['nombreapellido'];
$link =$_SESSION['link'];
 
$sql="UPDATE usuarios set ingreso=1 WHERE usuario = '$usuario'";
$result = pg_query($sql);
header('Location:'.$link);
?>
