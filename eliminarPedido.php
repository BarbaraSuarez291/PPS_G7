<?php 

include('db/conexionDB.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM `pedidos` WHERE `id` = $id";
    $result = mysqli_query($conexion, $query);


    echo "<script>alert('Pedido eliminado con exito!');window.location.href='listadoPedidos.php'</script>";

    if (!$result) {
        die("Query Failed.");
    }

}
