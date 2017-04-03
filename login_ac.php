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
		$sql="SELECT * FROM usuarios a WHERE usuario = '$usuario' and password = '$password' ";
		
		//ejecutamos la consulta
		$result = pg_query($sql);
		if($row = pg_fetch_array($result)){
                    
	 	  	if(trim($row["password"]) == trim($password)){
                                $sql="SELECT * FROM link a WHERE a.idusuario =". $row["idusuario"]." AND a.ingreso=0";
                                
                                $result2 = pg_query($sql);
                                
                                if($row2 = pg_fetch_array($result2)){
                                    $_SESSION['idusuario']	= $row["idusuario"];
                                    $_SESSION['nombreapellido']	= $row["nombreapellido"];
                                    header( "Location: inicio.php" ) ;
                                }else{
                                    //ya pincho en todas las encuestas
                                    echo "<script>alert('Usted ya hab\u00EDa ingresado previamente a contestar');window.location='index.php';</script>";
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
