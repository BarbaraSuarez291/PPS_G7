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
    
    if (isset($_FILES['archivo1']) && !empty($_FILES['archivo1'])) {
        $extensions_arr = array("mp4", "avi", "3gp", "mov", "mpeg");
         verificarPostArchivo($_FILES['archivo1'], $extensions_arr, $idPublicacion, $conexion);
         echo "<script>alert('Imagen guardada con exito!');window.location.href='modificarArchivos.php?id=$idPublicacion'</script>";

        if (verificarPostArchivo($_FILES['archivo1'], $extensions_arr, $idPublicacion, $conexion)) {
         
      
        }
    }




}



?>

<div class="container">
  <form action="#"  method="post" enctype="multipart/form-data" >
<div class="modificarArchivos">

<?php

$consulta =  "SELECT * FROM publicaciones WHERE `idPublicacion`='$idPublicacion'";
$resultado = mysqli_query($conexion, $consulta);
while ($fila = mysqli_fetch_array($resultado)) {
  
    $consulta2 = "SELECT idArchivo,  tipo, contenido FROM `archivos` where `idPublicacion`= '$idPublicacion'";
    $resultado2 = mysqli_query($conexion, $consulta2); ?>




<?php
while ($fila2 = mysqli_fetch_array($resultado2)) {

    $extension = new SplFileInfo($fila2['tipo']);
    $extension->getExtension();
    $extension = strtolower($extension);
    if ($extension == 'image/jpg' || $extension == 'image/jpeg' || $extension == 'image/png') {
    echo  "<div class='ver-img'><div class='col-md-12'><img style='width:260;' class=' col-md-12' src='data:image/jpeg; base64, " . base64_encode($fila2['contenido']) . "'> </div>";
    } else {
    echo "<div class='d-flex justify-content-center' col-md-12> <video  class='col-md-12'src='data:video/mp4; base64, " . base64_encode($fila2['contenido'])  . "'  controls width='260' height='170'></video> </div>";
    } ?> </td>
<?php echo " <div>  <a  class='btn btn-outline-success' href='eliminarArchivo.php?id=" . $fila2['idArchivo'] . "&idPublicacion=". $idPublicacion ."'>Ver</a></div> </div> ";

?>

<?php
}
$tipoPublicacion = $fila['tipo'];
$cantidad = contadorDeArchivos($conexion, $idPublicacion);

if($tipoPublicacion == 'galeria'){
  if ($cantidad["count(idPublicacion)"] < 11) {
    ?> <div class='form-group row'> <label for='i1' class='col-md-3 col-form-label text-md-right'></label> <div class='col-md-7 center'>  <input name="archivo1" type="file" class="form-control btn-file" id="btn_file" onchange="return validarExt()" />  </div></div> 
    <div><input name="modificar" type="submit" value="Guardar archivo" class="btn btn-outline-primary" /></div>
    <?php
 
  }
}elseif($tipoPublicacion == 'evento'){
  if ($cantidad["count(idPublicacion)"] == 0) {
    ?><div class='form-group row'> <label for='i1' class='col-md-3 col-form-label text-md-right'></label> <div class='col-md-7 center'>  <input name="archivo1" type="file" class="form-control btn-file" id="btn_file" onchange="return validarExt()" /></div></div>   
<div><input name="modificar" type="submit" value="Guardar archivo" class="btn btn-outline-primary" /></div><?php
  }
}

}

?>

  
  
  <?php
  if($tipoPublicacion == 'galeria'){
  echo "<div><a class='btn btn-success'  href='publicacionABM.php?id=" . $idPublicacion . "'>Volver</a> </div>";
  } else {
    echo "<div><a class='btn btn-success'  href='eventoABM2.php?id=" . $idPublicacion . "'>Volver</a> </div>";  }
  ?> 
</form>
</div>
<?php
} ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
   <!-- <script src='js/altaPublicacion.js'>

    </script>-->
    <script src="js/upload.js"></script>