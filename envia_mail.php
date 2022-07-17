<?php 
include('./db/conexionDB.php');
include('./funcion_delete.php');

$email = $_POST['email'];

$consul1 = "SELECT nombre FROM usuarios WHERE email='$email'";
$nombre = mysqli_query($conexion,$consul1);

while($row = mysqli_fetch_array($nombre)){
                                 
    $asunto = 'Recuperacion de contraseña';
    $mensaje   = "Hola ".$row['nombre'] .",somos del equipo de Ballet de Jesus, para poder cambiar 
                       su contraseña ingrese a este link: <a href='http://localhost/PPS_G7/update_pass.php'> Cambar contraseña </a>";
    envia_mail($mail,$email,$mensaje,$asunto);
}
?>