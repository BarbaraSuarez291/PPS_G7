<?php 
include('./db/conexionDB.php');
include('./funcion_delete.php');

$email = $_GET['email'];

$bloquear = "UPDATE reseñas SET estado='bloqueado' WHERE email='$email'";
$bloqueado = mysqli_query($conexion,$bloquear);

$consulta = "SELECT mensaje FROM reseñas WHERE email='$email'";
$message = mysqli_query($conexion,$consulta);

while($row = mysqli_fetch_array($message)){
                                 
    $asunto = 'Recuperacion de contraseña';
    $mensaje   = "<h3> Hola usted se encuentra bloqueado del sistema Ballet de Jesus por el siguiente comentario: </h3><br><p1>'" 
                 .$row['mensaje']."</p1>'.";
    if (envia_mail($mail,$email,$mensaje,$asunto)){
        header('Location: abm_usuarios.php');
        $correcto = "Bloqueado";
    }
}

?>