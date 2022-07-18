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
        echo "<script>alert('Email bloqueado para realizar reseñas.');window.location.href='abm_usuarios.php'</script>";
 
        //header('Location: abm_usuarios.php');
        //$correcto = "Bloqueado";
    }else{
        echo "<script>alert('Hubo un error.');window.location.href='abm_usuarios.php</script>";
 
    }
}

?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

