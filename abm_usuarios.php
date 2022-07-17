<?php include_once('db/conexionDB.php'); ?>
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
  <div>
    <h1>Lista de comentarios</h1>
</div>
     <div>
        <table class="table">
          <tr>
            <td> ID de la Reseña </td>
            <td> Nombre </td>
            <td> Reseña</td>
            <td> Fecha </td>
            <td> Correo </td>
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
            <td> <?php echo $fila['fecha'];?></td>
            <td> <?php echo $fila['email'];?></td>
            <td><a href="bloquea_usu.php?email=<?php echo $fila['email'] ?>">Bloquear usuario</a></td>            
          </tr>
        <?php
            };  
        ?>
        </table>
    </div>    
</div>
</body>
</html>