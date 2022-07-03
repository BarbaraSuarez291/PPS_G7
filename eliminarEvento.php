<?php 

include('db/conexionDB.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM `archivos` WHERE `idPublicacion` = '$id'";
    $result = mysqli_query($conexion, $query);

    $query2 = "DELETE FROM `publicaciones` WHERE `idPublicacion` = '$id'";
    $result2 = mysqli_query($conexion, $query2);
    header('Location: listadoEventos.php');
    if (!$result && !$result2) {
        die("Query Failed.");
    }

}

