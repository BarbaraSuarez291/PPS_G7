<?php

include_once('db/conexionDB.php');
include_once('includes/head.php');
include_once('includes/nav.php');
include_once('includes/funciones.php');


$error = false;
if (isset($_POST['email']) && isset($_POST['password'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $user = ingresoUsuario($email, $password, $conexion);
  if (!empty($user)) {
    crear_session_para($user);
    header('Location:index.php');
  } else {
    $error = true;
  }
}




?>
<head><title>Ingreso</title> </head>
<section>
  <div class="container" style="margin-top:1.5rem;font-size:1.3rem;">
    <?php if ($error == true) : ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Email y/o Contraseña incorrecto/s</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>
  </div>
  <div class="form-login">
    <h2>Iniciar Sesion</h2>

    <form action="#" method="post">



      <input class="input" type="email" placeholder="email" name="email">

      <input class="input" type="password" placeholder="password" name="password">

      <div class="botones-link login-btn">
        <a href="registro.php"> Crear una cuenta</a>
        <button class="activa-link ">Iniciar Sesion</button>
      </div>

    </form>
  </div>

</section>

<?php include("./includes/footer.php"); ?>