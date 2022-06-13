<?php
include_once('includes/funciones.php');
include_once('db/conexionDB.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];
    $query = "UPDATE  `publicaciones` SET `descripcion`= '$descripcion'  WHERE `idPublicacion` = '$id'";
    $result = mysqli_query($conexion, $query);
    header('Location: actualizarPublicacion.php');
    if (!$result) {
        die("Query Failed.");
    }

}
var_dump($_POST);


?>

