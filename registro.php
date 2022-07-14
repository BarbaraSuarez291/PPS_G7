<?php
include_once('db/conexionDB.php');
include_once('includes/head.php');
include_once('includes/nav.php');
include_once('includes/funciones.php');

$error = false;
if ( $_POST) {
  if (!empty($_POST['nombre'])&& !empty($_POST['apellido']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordConfirm']) ) {
  

  $usuario = datosDeNuevoUsuario($_POST);
  $existeEmail = existeUsuario($usuario['email'], $conexion);
  if ($existeEmail == false) {
  if ($_POST['password'] ==$_POST['passwordConfirm']){
    registrarUsuario($usuario, $conexion);
    crear_session_para($usuario);
    header('Location:index.php');
  }else {
    $error = true;
    $message = "Las contraseñas no coinciden.";
  }
   
  }else {
    $error = true;
    $message = "El email ingresado ya existe en la base de datos.";
  }
}else {
  $error = true;
  $message = "Todos los campos son obligatorios.";
}
}


?>

<head >
  <title>Registro</title>
</head>

<section>
  <div class="container" style="font-size:1.3rem;">
    <?php if ($error == true) : ?>
      <div class="alert alert-danger alert-dismissible fade show" style="margin-top:150px;" role="alert">
        <strong><?php echo $message; ?></strong>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="js/form.js">

</script>