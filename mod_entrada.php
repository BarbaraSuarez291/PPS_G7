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
    
    include('./LoginPHP/conexion.php');
   
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];

 //Aca la actualizamos
    $actulizar_entrada = "UPDATE entradas SET nombre='$nombre', precio='$precio', descripcion='$descripcion', fecha='$fecha' WHERE id ='$id'";
    $respuesta = mysqli_query($conexion,$actulizar_entrada);

  if ($respuesta = true){
   header("Location:ABM_Entradas.php");
  
  }
    mysqli_close($conexion);
?>

</body>
</html>