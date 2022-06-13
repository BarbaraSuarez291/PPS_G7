<!DOCTYPE html>
<html lang="en">
<?php
include_once('db/conexionDB.php');
include_once('includes/head.php'); ?>

<head>
  <title>Publicaciones</title>
</head>

<body>

  <?php include_once('includes/nav.php');
  include('includes/navNosotros.php');

  ?>





  <?php //lista de todas la publicacines
  $consulta =  "SELECT * FROM publicaciones WHERE `tipo`='galeria' ORDER BY idPublicacion DESC";
  $resultado = mysqli_query($conexion, $consulta);
  while ($fila = mysqli_fetch_array($resultado)) {
    $idPublicacion = $fila['idPublicacion'];
    $consulta2 = "SELECT idArchivo,  tipo, contenido FROM `archivos` where `idPublicacion`= '$idPublicacion' LIMIT 1";
    $resultado2 = mysqli_query($conexion, $consulta2);

  ?>
    <div>
      <div class="col-md-5 container-fluid column  mt-4 d-flex justify-content-center">
        <div class="card">
          <div class="text-right m-2">
            <p><?php echo $fila['fecha'] ?></p>

          </div>
          <?php while ($fila2 = mysqli_fetch_array($resultado2)) {
            $extension = new SplFileInfo($fila2['tipo']);
            $extension->getExtension();
            $extension = strtolower($extension);
            if ($extension == 'image/jpg' || $extension == 'image/jpeg' || $extension == 'image/png') {
              echo  "<div class='col-md-12'><img class='responsive-img col-md-12' src='data:image/jpeg; base64, " . base64_encode($fila2['contenido']) . "'> </div>";
            } else {

              echo "<div class='d-flex justify-content-center' col-md-12> <video  class='col-md-12'src='data:video/mp4; base64, " . base64_encode($fila2['contenido'])  . "'  controls width='360' height='270'></video> </div>";
            }
          } ?>
          <div class="card-body">
            <h4 class="descrip"><?php
                                if ($fila['descripcion'] != null) {
                                  echo $fila['descripcion'];
                                } ?> </h4>

          </div>
          <div class="text-center"> <?php echo "<td> <a  class=' btn btn-outline-primary mb-4' href='publicacion.php?id=" . $fila['idPublicacion'] . "'>Ver publicacion</a>  </td>" ?></div>
        </div>
      </div>
    </div>


  <?php } ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


  <script src='js/galeria.js'> </script>

</body>

</html>