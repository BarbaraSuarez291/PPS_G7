<?php 
include('includes/funciones.php');
include('./db/conexionDB.php');
include('./funcion_delete.php');
include_once('includes/head.php');
$email = $_POST['email'];
if ($email == null) {
    echo "<script>alert('El campo no debe quedar vacio');window.location.href='recup_pass.php'</script>";
}elseif( !is_valid_email($email)){
    echo "<script>alert('El e-mail no es valido.');window.location.href='recup_pass.php'</script>";

}elseif (existeUsuario($email, $conexion) == false) {
    echo "<script>alert('El e-mail no se encuentra registrado.');window.location.href='recup_pass.php'</script>";
} else{ 
$consul1 = "SELECT nombre FROM usuarios WHERE email='$email'";
$nombre = mysqli_query($conexion,$consul1);

while($row = mysqli_fetch_array($nombre)){
                                 
    $asunto = 'Recuperacion de contraseña';
    $mensaje   = "Hola ".$row['nombre'] .",somos del equipo de Ballet de Jesus, para poder cambiar 
                       su clave ingrese a este link: <a href='http://localhost/PPS_G7/update_pass.php'> Cambar contraseña </a>";
   if (envia_mail($mail,$email,$mensaje,$asunto)){
    echo "<script>alert('Enviamos un link para recuperar su clave en e-mail.');window.location.href='login.php'</script>";
 }
}}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>