<?php
$server = "localhost";
$user = "root";
$pass = "";
$bd = "ballet3";


$conexion = new mysqli($server, $user, $pass, $bd);
//verifica si hay error al conectar
if (mysqli_connect_errno()) {
    echo "No conectado", mysqli_connect_errno();
    exit();
} else {
    
}
/*
  //Paso 2:  Creo la conexion
  $conexion = mysqli_connect($server, $user, $pass) or die('Error: NO SE HA PODIDO CONECTAR AL SERVIDOR');

  //Paso 3: Me conecto a la db
  $db = mysqli_select_db($conexion, $bd) or die('Error : NO SE PUDO CONECTAR A LA BASE DE DATOS');
*/