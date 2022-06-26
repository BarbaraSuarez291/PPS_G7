<?php
include_once('includes/funciones.php');


include_once('db/conexionDB.php');

if (isset($_GET['id'])) {
    $idPublicacion = $_GET['id'];


if(isset($_POST['enviar']) && !empty($_POST['enviar'])){
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

include_once('includes/head.php');
include_once('includes/navAdmin.php');
?>
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
    <input class="form-control" type="text" id="precio" name="precio"/>
    </div>
    <br>
    <label class="col-md-3 col-form-label text-md-right">Descripcion: </label>
    <div class="col-md-7 center">
    <input class="form-control" type="text" id="descripcion" name="descripcion"/>
    </div>
    <br>
    <label class="col-md-3 col-form-label text-md-right">Cantidad de entradas disponibles: </label>
    <div class="col-md-7 center">
    <input class="form-control" type="text" id="cantidad" name="cantidad"/>
    </div>
    <!-- <input type="date" name="fecha"> -->
    <div class="col-md-6 offset-md-3">
    <input  class="btn btn-primary" type="submit" name="enviar" value="Enviar">  
    
    </div>
</form>
</div>
</div>
<?php } ?>