<?php
include_once('includes/funciones.php');
include_once('includes/navAdmin.php');
include_once('db/conexionDB.php');




?>
<div class="container">
<div>
    <h1>Publicaciones</h1>
  </div>
  <div >
    <a href="upload.php"><i class="fa-solid fa-circle-plus"></i></a>
  </div>
<table class="table  table-light">
<thead>
    <tr>
      <th scope="col">Fecha</th>
      <th scope="col">Descripcion</th>
      <th scope="col"></th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <?php
  echo "<form action='#' ";
  $consulta =  "SELECT * FROM publicaciones WHERE `tipo`='galeria' ORDER BY idPublicacion DESC";
  $resultado = mysqli_query($conexion, $consulta);
  while ($fila = mysqli_fetch_array($resultado)) {
    $idPublicacion = $fila['idPublicacion'];
   // $_POST['idPublicacion']=$idPublicacion;
    $consulta2 = "SELECT idArchivo,  tipo, contenido FROM `archivos` where `idPublicacion`= '$idPublicacion' LIMIT 1";
    $resultado2 = mysqli_query($conexion, $consulta2);
  ?>
  <tbody>
    <tr>
      <td scope="row"><?php echo $fila['fecha'] ?></td>
      <td><div class=""><p><?php echo $fila['descripcion'] ?></p></div></td>
      <td><?php
while ($fila2 = mysqli_fetch_array($resultado2)) {
  $extension=devuelve_extension_de_archivo($fila2['tipo']);
    if ($extension == 'image/jpg' || $extension == 'image/jpeg' || $extension == 'image/png') {
      echo  "<div class='col-md-12'><img style='width:160;' class=' col-md-12' src='data:image/jpeg; base64, " . base64_encode($fila2['contenido']) . "'> </div>";
    } else {

      echo "<div class='d-flex justify-content-center' col-md-12> <video  class='col-md-12'src='data:video/mp4; base64, " . base64_encode($fila2['contenido'])  . "'  controls width='160' height='70'></video> </div>";
    }
  } 
     ?> </td>
<td>
<a class='pencil'  href='publicacionABM.php?id=<?php echo $fila['idPublicacion'] ?>'><i class='fa-solid fa-pencil'></i></a>
<a  class='trash' href='eliminarPublicacion.php?id=<?php echo $fila['idPublicacion'] ?>'><i class='fa-regular fa-trash-can'></i></a>
</td>

</td>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>