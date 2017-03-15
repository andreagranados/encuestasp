<?php

session_start();//crea una sesion para ser utilizada por peticion get o post

$conexion=require("conexion.php"); //conexion a la bd

// Preguntaremos si se han enviado ya las variables necesarias
//if (isset($_POST['usuario'])) {
if(trim($_POST["usuario"]) != "" ){
  if(trim($_POST["password"]) != "" ){
	$_SESSION['usuario'] = $_POST['usuario'];
        $usuario	  = $_POST['usuario'];
	$password = $_POST['password'];
        if($usuario<>$password){
           echo "<script>alert('No coincide el usuario y el password');window.location='index.php';</script>";

        }else{
		$sql="SELECT * FROM usuarios a, usuario_datos b WHERE a.idusuario=b.idusuario and usuario = '$usuario' and password = '$password' ";
		//ejecutamos la consulta
		$result = pg_query($sql);
		if($row = pg_fetch_array($result)){
	 		
	 	  	if($row["password"] == $password){
	 	  		$_SESSION['logueado']		= true;
	 	  		$_SESSION['usuario']		= $row["usuario"];
	 	  		$_SESSION['nombreapellido']	= $row["nombreapellido"];
	 	  		$_SESSION['link']		= $row["link_encuesta"];
	 	  		$_SESSION['descripcion']	= $row["descripcion"];

	 	  		if ($row["ingreso"] == 0){//es la primera vez que ingresa
	 	  			header( "Location: inicio.php" ) ;
	 	  			
	 	  			}
	 	  		else{
	 	  			
	 	  			echo "<script>alert('Usted ya hab\u00EDa ingresado previamente');window.location='index.php';</script>";
	 	  			}
	 	  	
	 	  	}else {
   		       		
   		       		echo "<script>alert('Password incorrecto');window.location='index.php';</script>";
  			}
	 	
	 	}else{
	     		
	     		echo "<script>alert('El usuario no existe. Recuerde que tienes que ingresar con tu n\u00FAmero de documento');window.location='index.php';</script>";
	     	}
	  }
	
}else{
 	
 	echo "<script>alert('Debe ingresar un password');window.location='index.php';</script>";
}
}
else{
 	echo "<script>alert('Debe ingresar un usuario');window.location='index.php';</script>";
 	}
	

?>
