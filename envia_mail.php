<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require './phpmailer/Exception.php';
require './phpmailer/PHPMailer.php';
require './phpmailer/SMTP.php';


include('./LoginPHP/conexion.php');

$mail = new PHPMailer(true);

$email = $_POST['email'];

$consul1 = "SELECT nombre FROM usuarios WHERE email='$email'";
$nombre = mysqli_query($conexion,$consul1);

while($row = mysqli_fetch_array($nombre)){
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
    $mail->addAddress($email);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Recuperacion de contraseña';
    $mail->Body    = "Hola ".$row['nombre'] .",somos del equipo de Ballet de Jesus, para poder cambiar 
                       su contraseña ingrese a este link: <a href='http://localhost/PPS_G7/update_pass.php'> Cambar contraseña </a>";

    $mail->send();
    echo 'El correo se envio correctamente';
    
}catch (Exception $e) {
    echo 'Ocurrio el siguiente error: ', $mail->ErrorInfo;
}
}
?>