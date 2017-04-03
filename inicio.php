<?php 
session_start();//inicializar las variables de sesion
$conexion=require("conexion.php");
$idusuario =$_SESSION['idusuario'];
$nombreapellido =$_SESSION['nombreapellido'];

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
<p id="especial"> <em><?php echo $nombreapellido ?></em> </p>
<p>te invitamos a contestar estas encuestas</p>
<?php $sql="select * from link where idusuario=".$idusuario." and ingreso=0";
      $result = pg_query($sql);
      
      while($registro=pg_fetch_array($result)){  ?>
        <p> <?php echo $registro["descripcion"];?> </p>
        <a target="_self"  href="redireccion.php?identif=<?php echo $registro["id"] ?>"  ><img src="css/img/boton-encuesta1.png"></a>
     <?php }?>

     
  
  <footer id="main"> 
   	<p> 2017- Secretar&iacute;a de Planeamiento y Desarrollo Institucional - Universidad Nacional del Comahue. <img src="css/img/logo_institucion.png" width="50" height="50"></p>
  </footer>
</body>
</html>
