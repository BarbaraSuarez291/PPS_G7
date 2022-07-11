<?php
include_once('includes/funciones.php');
include_once('includes/head.php');
include_once('includes/navAdmin.php');
include_once('db/conexionDB.php');
$error = false;
//con el id que llega en la variables $_GET buscamos la publicacion
if (isset($_GET['id'])) {
  $idPublicacion = $_GET['id'];

//variable $error si es true salta el mensaje de error guardado
  $error = false;
//si hay $_POST el siguente codifo actualiza la publicacion
if (isset($_POST['modificar']) && !empty($_POST)) {
    
    if (isset($_FILES['archivo1']) && !empty($_FILES['archivo1'])) {
        $extensions_arr = array("mp4", "avi", "3gp", "mov", "mpeg");
        verificarPostArchivo($_FILES['archivo1'], $extensions_arr, $idPublicacion, $conexion);
    }

if(isset($_POST['descripcion'])){
  $descripcion = $_POST['descripcion'];
  if (strlen($descripcion) < 1) {
    $error = true;
     $message = 'Debe ingresar una descripcion.';
  } elseif (strlen($descripcion) <= 3) {
    $error = true;
    $message = 'La descripcion debe tener mas de 3 caracteres.';
  } else {
    $descripcion = $_POST['descripcion'];
    $query = "UPDATE  `publicaciones` SET `descripcion`= '$descripcion'  WHERE `idPublicacion` = '$idPublicacion'";
    $result = mysqli_query($conexion, $query);
  }
    
}


}
?>
<div class="container" style="margin-top:1.5rem;font-size:1.3rem;">
    <?php if ($error == true) : ?>
      <div class="alert alert-warning alert-dismissible fade show" style="margin-top:150px;" role="alert">
        <strong><?php echo $message; ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>
  </div>
<div class="abm-evento container" >
  <form action="#"  method="post" enctype="multipart/form-data" >


<?php
$consulta =  "SELECT * FROM publicaciones WHERE `idPublicacion`='$idPublicacion'";
$resultado = mysqli_query($conexion, $consulta);
while ($fila = mysqli_fetch_array($resultado)) {
    $consulta2 = "SELECT idArchivo,  tipo, contenido FROM `archivos` where `idPublicacion`= '$idPublicacion'";
    $resultado2 = mysqli_query($conexion, $consulta2); ?>

  <div scope="row"><?php echo $fila['fecha'] ?></div>
  
  <div class="ver-img"><div><?php echo "Fecha del evento: ". $fila['fechaEvento'] ?></div>
  <?php
  if($fila['tipo'] == 'evento'){
  echo "<div> <a class='btn btn-outline-success activa-link' href='modificarFecha.php?id=" . $fila['idPublicacion'] ." '>Ver</a>  </div></div>";

}
  ?>


  <div class="ver-img"><textarea name='descripcion' id="descripcion"style="height:150px; width:250px;"class="form-control"><?php echo $fila['descripcion'] ?></textarea>
  
    <input class="btn btn-outline-success activa-link" style="width:170px;" name="modificar" type="submit" value="Guardar cambios" class="btn btn-outline-primary" /></div>

<?php echo " <div class=' container'> <div> <a class='' style='margin-top:2rem;'  href='modificarArchivos.php?id=" . $idPublicacion . "'><i class='fa-solid fa-pencil'> Editar archivos</i></a> </div>";

?>

<?php
while ($fila2 = mysqli_fetch_array($resultado2)) {
    $extension = new SplFileInfo($fila2['tipo']);
    $extension->getExtension();
    $extension = strtolower($extension);
    if ($extension == 'image/jpg' || $extension == 'image/jpeg' || $extension == 'image/png') {
    echo  "<div class='col-md-12'><img style='width:150; margin-top:1rem;' class='responsive-img col-md-12' src='data:image/jpeg; base64, " . base64_encode($fila2['contenido']) . "'> </div>  </div>";
    } else {
    echo "<div class='d-flex justify-content-center' col-md-12> <video  class='col-md-12'src='data:video/mp4; base64, " . base64_encode($fila2['contenido'])  . "'  controls width='150' height='60'></video> </div>  </div>";
    } ?> 


<?php } ?>


<?php } ?>

<div><a class='btn btn-outline-success'  href='listadoEventos.php'>Volver</a> </div>
</form>
</div>
<?php
} ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>