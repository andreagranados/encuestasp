<?php 
session_start();//inicializar las variables de sesion
$conexion=require("conexion.php");
$idusuario =$_SESSION['idusuario'];
$nombreapellido =$_SESSION['nombreapellido'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    
    <!-- Bootstrap Stylesheet -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Animate -->
    <link rel="stylesheet" href="css/animate.min.css">

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Normailize Stylesheet -->
    <link rel="stylesheet" href="css/normalize.min.css">

    <!-- Main Styles -->
    <link rel="stylesheet" href="css/templatemo_style.css">

    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    <title>Encuestas PDI</title>
      
  
</head>
<body id="texto">
<br><br><br>

<p> &#161;Recuerde! Una vez que ingrese al cuestionario, debe responder la encuesta completa, ya que no podr&aacute; volver a acceder al mismo.<br>
Por favor, lea detenidamente las preguntas y las opciones antes de responder.</p>
<p id="especial"> <em><?php echo $nombreapellido ?></em> </p>
<?php $sql="select * from link where idusuario=".$idusuario." and ingreso=0 and (claustro='D')";
      $result = pg_query($sql);
      if(pg_num_rows($result)==0){
          echo "<p>No tiene encuestas pendientes</p>";
      }
      while($registro=pg_fetch_array($result)){  ?>
        <p> <?php echo $registro["descripcion"];?> </p>
        <a target="_self"  href="redireccion.php?identif=<?php echo $registro["id"] ?>"  ><img src="images/boton-encuesta1.png"></a>
     <?php }?>

     
  
  <footer id="main"> 
   	<p> 2017- Secretar&iacute;a de Planeamiento y Desarrollo Institucional - Universidad Nacional del Comahue. <img src="images/logo_institucion.png" width="50" height="50"></p>
  </footer>

</body>
</html>
