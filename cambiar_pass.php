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
include('envia_mail.php');
 
$email = $_SERVER['email'];
$pass1 = $_SERVER['pass1'];
 
$cambiar_clave = "UPDATE usuarios SET clave='$pass1' WHERE Correo='$email'";
$respuesta_clave = mysqli_query($conexion,$cambiar_clave);
?>
    <form method="POST">
     <label>Ingrese la  nueva: </label>
     <input type="text" id="email" name="email"/>
     <input type="text" id="pass1" name="pass1"/>
     <br>
     <br>
     <input type="submit" name="enviar" value="Enviar">   
    </form>
</body>
</html>