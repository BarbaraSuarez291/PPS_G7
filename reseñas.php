<?php

//conexión a BD
include_once('db/conexionDB.php'); 

//Recuperar datos

$mensaje=$_POST['mensaje'];
$nombre=$_POST['nombre'];
$telefono=$_POST['telefono'];
$email=$_POST['email'];
$fecha=date('Y-m-d');

//sentencia sql

$sql="INSERT INTO `reseñas` (`idReseña`, `mensaje`, `nombre`, `telefono`, `email`,`fecha`)VALUES(0,
                                                                                                '$mensaje',
                                                                                                '$nombre',
                                                                                                '$telefono',
                                                                                                '$email',
                                                                                                '$fecha')";

//ejecutar sentencia sql

$ejecutar = mysqli_query($conexion, $sql);

//verificamos

if(!$ejecutar){
    echo "Hubo algún error";
} else{
    echo "Datos guardados correctamente <br> <a href='clases.php'>VOLVER</a>";
}

?>