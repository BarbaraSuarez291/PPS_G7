<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

include('./db/conexionDB.php');

$mail = new PHPMailer();
function envia_mail($mail,$email,$mensaje,$asunto){
try {
  //Server settings
  #$mail->SMTPDebug = 2;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = "alex.larramendi14@gmail.com";                     //SMTP username
  $mail->Password   = "lcdeedxiyxlbphmn";                               //SMTP password
  $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
  $mail->Port       = 587; 
  $mail->SMTPOptions = array(
      'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
      )
  );             

  //Recipients
  $mail->setFrom('alex.larramendi14@gmail.com', 'Alex Nicolas Larramendi');
  $mail->addAddress("$email");     //Add a recipient
  
  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = "$asunto";
  $mail->Body    = "$mensaje";

  $mail->send();

 return $mail;
} catch (Exception $e) {
  echo "Ocurrio el siguiente error: {$mail->ErrorInfo}";
}
}


function delete_por_id($id,$conexion){
 $delete = "DELETE FROM `entradas` WHERE `entradas`.`id` = $id"; 
 $eliminado = mysqli_query($conexion, $delete);

  return $eliminado;
}
?>