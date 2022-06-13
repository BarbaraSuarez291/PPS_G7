<?php 

include('db/conexionDB.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM `publicaciones` WHERE `idPublicacion` = '$id'";
    $result = mysqli_query($conexion, $query);
    header("refresh: 3;");
    if (!$result) {
        die("Query Failed.");
    }

}
