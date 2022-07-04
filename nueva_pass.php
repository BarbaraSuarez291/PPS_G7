<?php

include_once('includes/head.php');
include_once('includes/nav.php');
?>
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
<?php
include_once('includes/footer.php');
?>
</body>
</html>