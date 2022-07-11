<?php
include_once('includes/funciones.php');


include_once('db/conexionDB.php');

if (isset($_GET['id'])) {
    $idPublicacion = $_GET['id'];

$error = false;
if(isset($_POST['enviar']) && !empty($_POST['enviar'])){
    $precio = floatval($_POST['precio']);
    $cant = intval($_POST['cantidad']);
    if ($_POST['nombre'] == null || $_POST['precio'] == null || $_POST['descripcion'] == null || $_POST['cantidad'] == null ) {
        $error = true;
        $message = 'Ningun campo debe quedar vacio.';
    } else if (!is_float($precio) ||  $precio < 0) {
        $error = true;
        $message = 'Revise el precio ingresado.';   
 }else if (!is_int($cant) || $cant < 0) {
    $error = true;
    $message = 'Revise la cantidad de entradas ingresada.';   
} else {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];


        $insertar1 = "INSERT INTO entradas (nombre, precio, descripcion, cantidad, idPublicacion) VALUES('$nombre', '$precio', '$descripcion', '$cantidad', '$idPublicacion')";
        $respuesta1 = mysqli_query($conexion,$insertar1);
        echo "El nombre de la entrada se cambio correctamente";
    if ($respuesta1 = true ){
        header("Location:ABM_Entradas.php");
    }
 }   
}

include_once('includes/head.php');
include_once('includes/navAdmin.php');
?>
 <?php if ($error == true) : ?>
      <div class="alert alert-warning alert-dismissible fade show" style="margin-top:150px;" role="alert">
        <strong><?php echo $message; ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>
<div class="card container ">
<div class="card-header text-center">
    <h1>Crear entradas</h1>
</div>
<div class="card-body">
<form action="#" name="alta1" method="POST">
Id del evento:
<div class="col-md-7 center">
<input type="text" name="idPublicacion" value=<?php echo $idPublicacion;?> disabled>
</div>

    <label class="col-md-3 col-form-label text-md-right">Titulo: </label>
    <div class="col-md-7 center">
    <input class="form-control" type="text" id="nombre" name="nombre"/>
    </div>
    <br>
    <label class="col-md-3 col-form-label text-md-right">Precio: </label>
    <div class="col-md-7 center">
    <input class="form-control" type="number" step="0.01" min="0" id="precio" name="precio"/>
    </div>
    <br>
    <label class="col-md-3 col-form-label text-md-right">Descripcion: </label>
    <div class="col-md-7 center">
    <input class="form-control" type="text" id="descripcion" name="descripcion"/>
    </div>
    <br>
    <label class="col-md-3 col-form-label text-md-right">Cantidad de entradas disponibles: </label>
    <div class="col-md-7 center">
    <input class="form-control" type="number" id="cantidad" name="cantidad"/>
    </div>
    <!-- <input type="date" name="fecha"> -->
    <div class="col-md-6 offset-md-3">
    <input  class="btn btn-primary" type="submit" name="enviar" value="Enviar">  
    
    </div>
</form>
</div>
</div>
<?php } ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>