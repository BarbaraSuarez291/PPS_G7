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
   
    $email = $_POST['email'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    $actulizar_pass= "UPDATE usuarios SET clave='$pass' WHERE email ='$email'";
    $respuesta_nueva = mysqli_query($conexion,$actulizar_pass);

    if ($respuesta_nueva = true){
    echo "Contraseña cambiada correctamente";
    }
    mysqli_close($conexion);
?>
  <a href="index.php"><button type="button">Volver al inicio</button></a>
</body>
</html>