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
  <?php include('./LoginPHP/conexion.php');?>
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
            <td> <?php echo $fila2['fechaEvento'];?></td>
            <td><a href="actualizar_entrada.php?id=<?php echo $fila['id'] ?>" class="btn btn-info">Editar</a></td>
            <td><a href="delete_entrada.php?id=<?php echo $fila['id'] ?>" class="btn btn-danger">Eliminar</a></td>              
          </tr>
        <?php
            } }; 
        ?>
        </table>
          </div>
</div>
</body>
</html>