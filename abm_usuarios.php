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
    <h1>Lista de usuarios</h1>
   <form action="alta_entrada.php" name="alta1" method="POST">
     <label>Correo del usuario </label>
     <input type="text" id="correo" name="correo"/>
     <br>
     <input type="submit" name="buscar" value="Buscar">   
   </form>
</div>
     <div>
        <table class="table">
          <tr>
            <td> ID de la Reseña </td>
            <td> Nombre </td>
            <td> Descripcion</td>
            <td> Puntaje </td>
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
            <td> <?php echo $fila['descripcion'];?></td>
            <td> <?php echo $fila['puntaje'];?></td>
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