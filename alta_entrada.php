<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Entradas</title>
</head>
<body>
  
   <?php 
   $nombre = $_POST['nombre'];
   $precio = $_POST['precio'];
   $descripcion = $_POST['descripcion'];
   $fecha = $_POST['fecha'];

   include('./LoginPHP/conexion.php');
        
  
        $insertar1 = "INSERT INTO entradas (nombre, precio, descripcion, fecha) VALUES('$nombre', '$precio', '$descripcion', '$fecha')";
        $respuesta2 = mysqli_query($conexion,$insertar1);
        echo "El nombre de la entrada se cammbio correctamente";

    if ($respuesta1 = true ){
        header("Location:ABM_Entradas.php");
    }
   ?>

</body>
</html>