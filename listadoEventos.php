<?php
include_once('includes/funciones.php');
include_once('includes/navAdmin.php');
include_once('db/conexionDB.php');


?>
<div class="container">
  <div>
    <h1>Eventos</h1>
  </div>
<div class="pencil">
    <a href="uploadEventos.php"><i class="fa-solid fa-circle-plus"></i></a>
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
  $consulta =  "SELECT * FROM publicaciones WHERE `tipo`='evento' ORDER BY fechaEvento ASC";
  $resultado = mysqli_query($conexion, $consulta);
  while ($fila = mysqli_fetch_array($resultado)) {
    $idPublicacion = $fila['idPublicacion'];
    $consulta2 = "SELECT idArchivo,  tipo, contenido FROM `archivos` where `idPublicacion`= '$idPublicacion' LIMIT 1";
    $resultado2 = mysqli_query($conexion, $consulta2);
  ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $fila['fecha'] ?></th>
      <td><div class=""><p><?php echo $fila['descripcion'] ?></p></div></td>
      <td><?php
while ($fila2 = mysqli_fetch_array($resultado2)) {
    //verificamos la extension del archivo
    $extension=devuelve_extension_de_archivo($fila2['tipo']);
    if ($extension == 'image/jpg' || $extension == 'image/jpeg' || $extension == 'image/png') {
      echo  "<div class='col-md-12'><img style='width:160;' class='responsive-img col-md-12' src='data:image/jpeg; base64, " . base64_encode($fila2['contenido']) . "'> </div>";
    } else {

      echo "<div class='d-flex justify-content-center' col-md-12> <video  class='col-md-12'src='data:video/mp4; base64, " . base64_encode($fila2['contenido'])  . "'  controls width='160' height='70'></video> </div>";
    }
  }
     ?> </td>

<?php 
echo "  <td> <a class='pencil' class='btn btn-outline-success' href='publicacionABM.php?id=" . $fila['idPublicacion'] . "'><i class='fa-solid fa-pencil'></i></a> ";
 echo "   <a class='trash'  class='btn btn-outline-danger' href='eliminarEvento.php?id=" . $fila['idPublicacion'] . "'><i class='fa-regular fa-trash-can'></i></a> " ;
echo "   <a  class='ticket' href='crearEntrada.php?id=" . $fila['idPublicacion'] . "'> <i class='fa-solid fa-ticket'></i> </a></td>" ;

?>
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