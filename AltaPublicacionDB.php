<?php

use function PHPSTORM_META\type;

include('db/conexionDB.php');
include('includes/funciones.php');


if (!empty($_POST)) {
    $tipoPublicacion = "galeria";
    $fecha = date('Y-m-d');
   // $fechaS = $fecha['mday'] . "/" . $fecha['mon'] . "/" . $fecha['year'];
    $descripcion = $_POST['descripcion'];
    $admin = 1; //temporal, deberia traerse desde la session el id de admin que ingreso
    $insertPublicacion = "INSERT INTO `publicaciones` (`idPublicacion`, `idAdmin`, `descripcion`,`fecha`, `tipo`) VALUES (0, '$admin', '$descripcion', '$fecha', '$tipoPublicacion')";

    if (mysqli_query($conexion, $insertPublicacion)) {
        $rs = mysqli_query($conexion, "SELECT MAX(idPublicacion) AS idPublicacion FROM publicaciones");
        if ($row = mysqli_fetch_row($rs)) {
            $idPublicacion = trim($row[0]);
        }

        // extensiones validados
        $extensions_arr = array("mp4", "avi", "3gp", "mov", "mpeg");

        verificarPostArchivo($_FILES['archivo1'],$extensions_arr,$idPublicacion, $conexion);
        verificarPostArchivo($_FILES['archivo2'],$extensions_arr,$idPublicacion, $conexion);
        verificarPostArchivo($_FILES['archivo3'],$extensions_arr,$idPublicacion, $conexion);
        verificarPostArchivo($_FILES['archivo4'],$extensions_arr,$idPublicacion, $conexion);
    }
} else {
    echo 'Error al insertar la publicacion ' . mysqli_error($conexion);
}
