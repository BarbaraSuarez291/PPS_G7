<?php 

include('db/conexionDB.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM `archivos` WHERE `idPublicacion` = '$id'";
    $result = mysqli_query($conexion, $query);

    $query2 = "DELETE FROM `publicaciones` WHERE `idPublicacion` = '$id'";
    $result2 = mysqli_query($conexion, $query2);

    $query3 = "DELETE FROM `entradas` WHERE `idPublicacion` = '$id'";
    $result3 = mysqli_query($conexion, $query3);
    echo "<script>alert('Evento eliminado con exito!');window.location.href='listadoEventos.php'</script>";

    if (!$result && !$result2  && !$result3) {
        die("Query Failed.");
    }

}

