<?php 
session_start();//inicializar las variables de sesion
$conexion=require("conexion.php");
$usuario =$_SESSION['usuario'];
$nombreapellido =$_SESSION['nombreapellido'];
$descripcion =$_SESSION['descripcion'];
$link =$_SESSION['link'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <link rel="stylesheet" href="css/style.css">
  <title>Encuestas</title>
      
  
</head>
<body>
<br><br><br>
  <p> <?php echo $nombreapellido ?> nos interesa tu opini&oacute;n</p>
  <p> <?php echo $descripcion ?></p>
<br>  
  
  <a target="_self"  href="redireccion.php"  ><img src="css/img/boton-encuesta1.png"></a>
  
  <footer id="main"> 
   	<p> 2017 - Secretar&iacute;a de Planeamiento y Desarrollo Institucional - Universidad Nacional del Comahue. <img src="css/img/logo_institucion.png" width="50" height="50"></p>
  </footer>
</body>
</html>
