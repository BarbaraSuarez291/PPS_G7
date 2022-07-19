<?php
include('includes/funciones.php');
include_once('includes/head.php');
include_once('includes/nav.php');
?>
<body>
  
   <?php 
    
    include('db/conexionDB.php');
    $email = $_POST['email'];
      if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordConfirm']) ) {
      if (is_valid_email($email)) {
        if (existeUsuario($email, $conexion) == true) {
          if ($_POST['password'] ==$_POST['passwordConfirm']){
            $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $actulizar_pass= "UPDATE usuarios SET clave='$pass' WHERE email ='$email'";
            $respuesta_nueva = mysqli_query($conexion,$actulizar_pass);
        
            if ($respuesta_nueva = true){
            echo "<script>alert('Contraseña actualizada con exito!');window.location.href='login.php'</script>";
            }
            mysqli_close($conexion);
    
    
    
          }else {
            echo "<script>alert('Las contraseñas no coinciden.');window.location.href='update_pass.php'</script>";
          }
           
          }else {
            echo "<script>alert('El email ingresado no esta registrado.');window.location.href='update_pass.php'</script>";
          }
      }else {
        echo "<script>alert('El email ingresado no es valido.');window.location.href='update_pass.php'</script>";
 
      }
    } else {
      echo "<script>alert('Todos los campos son obligatorios.');window.location.href='update_pass.php'</script>";
    }




  
?>
<?php
include_once('includes/footer.php');
?>
</body>
</html>