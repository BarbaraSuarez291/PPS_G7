<?php 
include('./db/conexionDB.php');
include('./funcion_delete.php');

$email = $_GET['email'];

$estado = "Bloqueado";

$bloquear = "UPDATE reseñas SET estado='$estado' WHERE email='$correo'";
$bloqueado = mysqli_query($conexion,$bloquear);

$traer = "SELECT reseña  FROM reseñas WHERE email=$email";
$reseña = mysqli_query($conexion,$traer); 
while($fila_reseña = mysqli_fetch_array($reseña)){
$mensaje = "Usted ha sido bloquedo del sistema de ballet de Jesus por el siguiente comentario:".
           "`". $reseña . " ´";
$asunto = "Aviso de bloqueo";
envia_mail($mail,$email,$mensaje, $asunto);
};
mysqli_close($conexion);
?>