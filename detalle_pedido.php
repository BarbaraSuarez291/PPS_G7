<?php 
include('includes/funciones.php');
include('db/conexionDB.php');
include_once('includes/head.php');
include_once('includes/navAdmin.php');
?>

<div class="container">
     <div>
    <h1>Detalle del pedido</h1>
  </div>
 
        <table class="table table-light">
          <tr>
            <td>ID</td>
            <td>Nombre</td>
            <td>Email</td>
            <td>Telefono</td>
            <td>Unidades</td>
            <td>Precio total</td>
            <td>Metodo de pago</td>
          </tr>
        <?php
    $pedido = trae_pedido_por_id($_GET['id'], $conexion);
    $usuario = trae_usuario($pedido['user'], $conexion);
        ?> 
        <tr>
            <td> <?php echo $pedido['id'];?></td>
            <?php // echo $pedido['idPublicacion'];?>
            <td> <?php echo $usuario['nombre']. " " . $usuario['apellido'];?></td>
            <td> <?php echo $usuario['email']?></td>
            <td> <?php echo $pedido['telefono'];?></td>
            <td> <?php echo $pedido['cantidad'];?></td>
            <td> <?php echo "$".$pedido['precio_total'];?></td>
            <td style="text-transform: capitalize;"> <?php echo $pedido['metodo_de_pago'];?></td>
         </tr>
         
        
        <?php

        ?>
        </table>
        <a href="listadoPedidos.php" class="btn btn-success">Volver</a>
          </div>
</div>

