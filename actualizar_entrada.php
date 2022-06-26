<?php 
include("./LoginPHP/conexion.php");


$id=$_GET['id'];

$sql="SELECT * FROM entradas WHERE id='$id'";
$traer_entrada=mysqli_query($conexion,$sql);

$fila = mysqli_fetch_array($traer_entrada);
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
    <h1>Modificacion de entradas</h1>
<form action="mod_entrada.php" name="mod1" method="POST">
     <label>Ingrese el nombre de la entrada nueva: </label>
     <input type="hidden" name="id" value="<?php echo $fila['id'] ?>">
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
</body>
</html>