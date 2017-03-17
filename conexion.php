<?php

$servidor="localhost";
$base = "encuestasp";
$usuario="usbackup";
$password="usbackup";
$port=5432;

$strCnx = "host=$servidor port=$port dbname=$base user=$usuario password=$password";
$cnx = pg_connect($strCnx) or die ("Error de conexion. ". pg_last_error());
return $cnx;
echo "Conexion exitosa <hr>"; 


?>
