<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
include('./db/conexionDB.php');

require './phpmailer/Exception.php';
require './phpmailer/PHPMailer.php';
require './phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$correo = $_GET['email'];

$estado = "Bloqueado";

$bloquear = "UPDATE reseñas SET estado='$estado' WHERE email='$correo'";
$bloqueado = mysqli_query($conexion,$bloquear);

try{
    //Server settings
    #$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'alex.larramendi14@gmail.com';                     //SMTP username
    $mail->Password   = 'hlvlhjbjdoibecsw';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        ));
    //Recipients
    $mail->setFrom('alex.larramendi14@gmail.com', 'Ballet De Jesus');
    $mail->addAddress($correo);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Recuperacion de contraseña';
    $mail->Body    = "Usted ha sido bloqueado del sistema";

    $mail->send();
    echo 'El correo se envio correctamente';
    header("Location: abm_usuarios.php");
    
}catch (Exception $e) {
    echo 'Ocurrio el siguiente error: ', $mail->ErrorInfo;
}
mysqli_close($conexion);
?>