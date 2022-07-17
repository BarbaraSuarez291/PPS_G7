<?php 
include('includes/funciones.php');
include('db/conexionDB.php');
var_dump($_POST);
if (isset($_POST['eliminar']) && !empty($_POST['id_a_eliminar'])) {
  $id= $_POST['id_a_eliminar'];
  $result = "DELETE FROM `pedidos` WHERE `id` = $id"; 
  $eliminado = mysqli_query($conexion, $result); 
if ($eliminado = true) {
    echo "<script>alert('Pedido eliminado con exito!');window.location.href='listadoPedidos.php'</script>";
}
}
$resultado = listar_pedidos($conexion);
include_once('includes/head.php');
include_once('includes/navAdmin.php');
?>

<div class="container">
     <div>
    <h1>Pedidos</h1>
  </div>
 
        <table class="table table-light">
          <tr>
            <td> ID </td>
            <td> Usuario</td>
            <td> Cant. entradas</td>
            <td> Monto a pagar</td>
            <td> Telefono</td>
            <td> </td>
          </tr>
          <form action="listadoPedidos.php" method="POST">
        <?php
while( $pedidos = mysqli_fetch_array($resultado)){ 

    $usuario = trae_usuario($pedidos['user'], $conexion);
        ?> 
                <input type="hidden" name="id_a_eliminar" value="<?php echo $pedidos['id']?>">
          <tr>
            <td> <?php echo $pedidos['id'];?></td>
            <?php // echo $pedidos['idPublicacion'];?>
            <td> <?php echo $usuario['nombre']. " " . $usuario['apellido'];?></td>
            <td> <?php echo $pedidos['cantidad'];?></td>
            <td> <?php echo "$".$pedidos['precio_total'];?></td>
            <td> <?php echo $pedidos['telefono'];?></td>
            <td><button type="submit" class="btn btn-danger" name="eliminar" onclick="return ConfirmDelete()">Eliminar</button></td> 
          </tr>
          </form>
        <?php
}
        ?>
        </table>
          </div>
</div>


<script type="text/javascript">
        function ConfirmDelete(){
          var respuesta = confirm('Esta seguro que desea eliminar?');
       if (respuesta== true) {
          return true;
        }else {
          return false;
        }
      }
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>






</body>