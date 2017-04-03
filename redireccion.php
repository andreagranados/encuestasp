<?php 
session_start();//inicializar las variables de sesion
$conexion=require("conexion.php");
$idusuario =$_SESSION['idusuario'];
$identificador=$_GET['identif'];
//recupero el link a la encuesta correspondiente al identificador que ingresa como argumento
$sql="select link_encuesta from link where idusuario=".$idusuario." and id=".$identificador; 
$result = pg_query($sql);
$row=pg_fetch_array($result);
$link=$row["link_encuesta"];
$sql="UPDATE link set ingreso=1 WHERE idusuario = ".$idusuario." and id=".$identificador;
$result = pg_query($sql);
header('Location:'.$link);
?>
