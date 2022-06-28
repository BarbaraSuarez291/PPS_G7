<?php 


include('db/conexionDB.php');
include('includes/funciones.php');


if (!empty($_POST)) {
   
    try {
    $tipoPublicacion = "evento";
    $fecha = date('Y-m-d');
    $fechaEvento = $_POST['fechaEvento'];
    //$fechaS = $fecha['mday'] . "/" . $fecha['mon'] . "/" . $fecha['year'];
    $descripcion = $_POST['descripcion'];
    $admin = 1; //temporal, deberia traerse desde la session el id de admin que ingreso
    $insertPublicacion = "INSERT INTO `publicaciones` (`idPublicacion`, `idAdmin`, `descripcion`,`fecha`, `tipo`, `fechaEvento`) VALUES (0, '$admin', '$descripcion', '$fecha', '$tipoPublicacion', '$fechaEvento')";

} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}




    if (mysqli_query($conexion, $insertPublicacion)) {
        $rs = mysqli_query($conexion, "SELECT MAX(idPublicacion) AS idPublicacion FROM publicaciones");
        if ($row = mysqli_fetch_row($rs)) {
            $idPublicacion = trim($row[0]);
        }
    
     //extensiones validados
     $extensions_arr = array("mp4", "avi", "3gp", "mov", "mpeg");
     verificarPostArchivo($_FILES['archivo1'],$extensions_arr,$idPublicacion, $conexion);
     header('Location:listadoEventos.php');
        }
       
} else {
    echo 'Error al insertar la publicacion ' . mysqli_error($conexion);
}
