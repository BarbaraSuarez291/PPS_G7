<?php
include_once('db/conexionDB.php');
include_once('includes/head.php');
include_once('includes/nav.php');
include_once('includes/funciones.php');

$existeEmail = false;
if ($_POST != null) {

  $usuario = datosDeNuevoUsuario($_POST);
  $existeEmail = existeUsuario($usuario['email'], $conexion);
  if ($existeEmail == false) {
    registrarUsuario($usuario, $conexion);
    crear_session_para($usuario);
    header('Location:index.php');
  }
}


?>

<head >
  <title>Registro</title>
</head>

<section>
  <div class="container" style="margin-top:1.5rem;font-size:1.3rem;">
    <?php if ($existeEmail == true) : ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>El email ingresado ya existe en la base de datos.</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>
  </div>
  <div class="form-registro">
    <h2>Registrate</h2>
    <form action="#" method="POST">
      <!-- NOMBRE -->
      <div class="nameSignUp">
        <div class="err-input">
          <input id="nameSignUp" class="input" type="text" placeholder="Nombre" name="nombre" value="<?= isset($_POST["nombre"]) ? $_POST["nombre"] : '' ?>">
          <p id="errName" class="err-alert"></p>
        </div>
        


        <!-- APELLIDO -->
        <div class="err-input">
          <input id="lastNameSignUp" class="input" type="text" placeholder="apellido" name="apellido" value="<?= isset($_POST["apellido"]) ? $_POST["apellido"] : '' ?>">
          <p id="errLastName" class="err-alert"></p>
        </div>
      </div>


      <!-- EMAIL -->
      <div class="err-input">
        <input id="emailSignUp" class="input" type="email" placeholder="email" name="email" value="<?= isset($_POST["email"]) ? $_POST["email"] : '' ?>">
        <p id="errEmail" class="err-alert"></p>
      </div>
      <div class="nameSignUp">


        <!-- CONTRASEÑA -->
        <div class="err-input">
          <input id="passwordSignUp" class="input" type="password" placeholder="password" name="password" value="<?= isset($_POST["password"]) ? $_POST["password"] : '' ?>">
          <p id="errPassword" class="err-alert"></p>
        </div>


        <!-- REPETIR CONTRASEÑA -->
        <div class="err-input">
          <input id="passwordConfirmSignUp" class="input" type="password" placeholder=" confirme password" name="passwordConfirm" value="<?= isset($_POST["passwordConfirm"]) ? $_POST["passwordConfirm"] : '' ?>">
          <p id="errPasswordConfirm" class="err-alert"></p>
        </div>

      </div>

      <div class="botones-link fontz-15">
        <a href="login.php">Ya tengo cuenta</a>
        <button class="activa-link" name="signup">Registrarse</button>
      </div>

    </form>

  </div>
</section>

<?php include("./includes/footer.php"); ?>