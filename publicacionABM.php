<?php
include_once('includes/funciones.php');
include_once('includes/navAdmin.php');
include_once('db/conexionDB.php');
//con el id que llega en la variables $_GET buscamos la publicacion
if (isset($_GET['id'])) {
  $idPublicacion = $_GET['id'];

//variable $error si es true salta el mensaje de error guardado
  $error = false;
//si hay $_POST el siguente codifo actualiza la publicacion
if (isset($_POST['modificar']) && !empty($_POST)) {
    
   /* if (isset($_FILES['archivo1']) && !empty($_FILES['archivo1'])) {
        $extensions_arr = array("mp4", "avi", "3gp", "mov", "mpeg");
        verificarPostArchivo($_FILES['archivo1'], $extensions_arr, $idPublicacion, $conexion);
    }*/

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
        echo "<script>alert('Descripcion actualizada!');window.location.href='publicacionABM.php?id=$idPublicacion'</script>";

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
  <th scope="row"><?php echo $fila['fecha'] ?></th>
  <?php
  if($fila['tipo'] == 'evento'){
  echo " <a  class='btn btn-outline-success activa-link' style='width:170px;' href='modificarFecha.php?id=" . $fila['idPublicacion'] ." '>Ver</a>";

}
  ?>

    <div class="ver-img"><textarea name='descripcion' id="descripcion"style="height:150px; width:250px"class="form-control"><?php echo $fila['descripcion'] ?></textarea>
  
    <input name="modificar" type="submit" value="Guardar cambios" class="btn btn-outline-primary" />
    </div>
    <?php echo "  <td> <a  style='margin: 3rem; 'class='btn btn-info'  href='modificarArchivos.php?id=" . $idPublicacion . "'><i class='fa-solid fa-pencil'> Editar archivos</i></a> ";

?>


<?php } ?>

<div style="margin: 3rem;"><a class='btn btn-success'  href='listadoPublicaciones.php'>Volver</a> </div>
</form>
</div>
<?php
} ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>