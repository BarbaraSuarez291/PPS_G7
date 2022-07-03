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
      <div class="alert alert-warning alert-dismissible fade show" style="margin-top: 120px;"role="alert">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>