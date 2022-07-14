<?php
//include('./LoginPHP/conexion.php');
include_once('db/conexionDB.php');
$id = $_GET['id'];

$delete = "DELETE FROM `entradas` WHERE `entradas`.`id` = $id"; 
$eliminado = mysqli_query($conexion, $delete); 


if ($eliminado = true) {
    header("Location: ABM_Entradas.php");
}
?>