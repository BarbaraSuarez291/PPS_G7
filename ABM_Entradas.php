<?php
include_once('includes/funciones.php');
include_once('includes/navAdmin.php');
include_once('db/conexionDB.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ballet Folklorico - Entradas</title>
  
</head>
<body>  
<div>
  <!--<div class="container">
    <h1>Crear entradas</h1>
   <form action="alta_entrada.php" name="alta1" method="POST">
     <label>Ingrese el nombre de la entrada nueva: </label>
     <input type="text" id="nombre" name="nombre"/>
     <br>
     <label>Ingrese el precio de la entrada nueva: </label>
     <input type="text" id="precio" name="precio"/>
     <br>
     <label>Ingrese una descripcion de la entrada nueva: </label>
     <input type="text" id="descripcion" name="descripcion"/>
     <br>
     <input type="date" name="fecha">
     <input type="submit" name="enviar" value="Enviar">   
   </form>
</div> -->
     <div class="container">
     <div>
    <h1>Entradas</h1>
  </div>
 
        <table class="table table-light">
          <tr>
            <td> ID de entrada</td>
            <td> Titulo</td>
            <td> Precio</td>
            <td> Descripcion</td>
            <td> Cantidad</td>
            <td> Fecha evento</td>
          </tr>
        <?php
           $consulta = "SELECT * FROM entradas";
           $a = mysqli_query($conexion, $consulta);
           while($fila = mysqli_fetch_array($a)){
            $id = $fila['idPublicacion'];
            $query = "SELECT fechaEvento FROM publicaciones WHERE idPublicacion=$id";
           $result = mysqli_query($conexion, $query);
           while($fila2 = mysqli_fetch_array($result)){
        ?> 
          <tr>
            <td> <?php echo $fila['id'];?></td>
            <td> <?php echo $fila['nombre'];?></td>
            <td> <?php echo $fila['precio'];?></td>
            <td> <?php echo $fila['descripcion'];?></td>
            <td> <?php echo $fila['cantidad'];?></td>
            <td> <?php echo $fila2['fechaEvento'];?></td>
            <td><a href="actualizar_entrada.php?id=<?php echo $fila['id'] ?>" class="btn btn-info">Editar</a></td>
            <td><a href="delete_entrada.php?id=<?php echo $fila['id'] ?>" class="btn btn-danger" onclick="return ConfirmDelete()"> Eliminar  </a></td>              
          </tr>
        <?php
            } }; 
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
</html>