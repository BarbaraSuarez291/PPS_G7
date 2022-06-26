
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
  <div>
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
</div>
     <div>
        <table class="table">
          <tr>
            <td> ID de entrada</td>
            <td> Nombre de la entrada</td>
            <td> Precio de la entrada</td>
            <td> Descripcion de entrada</td>
            <td> Fecha de la entrada</td>
          </tr>
        <?php
           $consulta = "SELECT * FROM entradas";
           $a = mysqli_query($conexion, $consulta);
           while($fila = mysqli_fetch_array($a)){
        ?> 
          <tr>
            <td> <?php echo $fila['id'];?></td>
            <td> <?php echo $fila['nombre'];?></td>
            <td> <?php echo $fila['precio'];?></td>
            <td> <?php echo $fila['descripcion'];?></td>
            <td> <?php echo $fila['fecha'];?></td>
            <td><a href="actualizar_entrada.php?id=<?php echo $fila['id'] ?>" class="btn btn-info">Editar</a></td>
            <td><a href="delete_entrada.php?id=<?php echo $fila['id'] ?>" class="btn btn-danger">Eliminar</a></td>              
          </tr>
        <?php
            };  
        ?>
        </table>
    </div>    
</div>
</body>
</html>