<?php include_once('db/conexionDB.php'); 
include_once('includes/head.php');


include_once('includes/navAdmin.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Usuarios</title>
</head>
<body>
<div class="container">
<div>
  <div>
    <h1>Lista de comentarios</h1>
</div>
     <div>
        <table class="table table-light">
          <tr>
            <td> ID de la Reseña </td>
            <td> Nombre </td>
            <td> Reseña</td>
            <td>Telefono</td>
            <td> Fecha </td>
            <td> Correo </td>
            
            <td></td>
          </tr>
        <?php
           $sql = "SELECT * FROM reseñas";
           $usu = mysqli_query($conexion, $sql);
           while($fila = mysqli_fetch_array($usu)){
        ?> 
          <tr>
            <td> <?php echo $fila['idReseña'];?></td>
            <td> <?php echo $fila['nombre'];?></td>
            <td> <?php echo $fila['mensaje'];?></td>
            <td> <?php echo $fila['telefono'];?></td>
            <td> <?php echo ($fila['fecha']);?></td>
            <td> <?php echo $fila['email'];?></td>
            <?php if ($fila['estado'] == "bloqueado"){
            ?>  <td><p>Usuario bloqueado</p></td> <?php
            } else {?>
            <td><a class="btn btn-danger" onclick="return ConfirmBloquear()" href="bloquea_usu.php?email=<?php echo $fila['email'] ?>">Bloquear usuario</a></td>            
          
          </tr>
        <?php
            } };  
        ?>
        </table>
    </div>    
</div>
</div>


<script type="text/javascript">
        function ConfirmBloquear(){
          var respuesta = confirm('Esta seguro que desea bloquear al usuario?');
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
</html>