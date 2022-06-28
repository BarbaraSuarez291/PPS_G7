<?php
include_once('includes/funciones.php');

include_once('db/conexionDB.php');

$error = false;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT fechaEvento FROM `publicaciones` WHERE `idPublicacion` = '$id'";
    $result = mysqli_query($conexion, $query);
    $fecha = mysqli_fetch_array($result);
    if (!$result) {
        die("Query Failed.");
    }
}

if (isset($_POST['modificar']) && !empty($_POST['fechaEvento'])) {
    var_dump($_POST);
    $fechaEvento = $_POST['fechaEvento'];
    $query = "UPDATE  `publicaciones` SET `fechaEvento`= '$fechaEvento'  WHERE `idPublicacion` = '$id'";
    $result = mysqli_query($conexion, $query);
    header("refresh: 2;");
}
if (isset($_POST['modificar']) && empty($_POST['fechaEvento'])) {
    $error = true;
    $message = "El campo fecha esta vacio.";
    header("refresh: 2;");
}
include_once('includes/navAdmin.php');
?>

<div class="container" style="margin-top:1.5rem;font-size:1.3rem;">
    <?php if ($error == true) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><?php echo $message; ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
  <?php endif; ?>
</div>
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <div class="col-md-7 center">
               <?php echo $fecha['fechaEvento']; ?>
            </div>

        </div>
        <div class="form-group row">
            <label for="fechaEvento" class="col-md-3 col-form-label text-md-right"></label>
            <div class="col-md-7 center">
                <input type="date" name="fechaEvento" id=""><br />
            </div>

        </div>
        <div class="col-md-6 offset-md-3">
        <td><input name="modificar" type="submit" value="Guardar cambios" class="btn btn-outline-primary" /></td>
        </div>
    </form>


