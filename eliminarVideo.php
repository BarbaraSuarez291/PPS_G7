<?php 

include('db/conexionDB.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM `videos` WHERE `id` = '$id'";
    $result = mysqli_query($conexion, $query);


    echo "<script>alert('Video eliminado con exito!');window.location.href='listadoVideos.php'</script>";

    if (!$result) {
        die("Query Failed.");
    }

}
