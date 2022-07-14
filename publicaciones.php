<!DOCTYPE html>
<html lang="en">
<?php
include_once('db/conexionDB.php');
include_once('includes/head.php'); 
include_once('includes/funciones.php');
?>
  <?php //lista de todas la publicacines
  $consulta =  "SELECT * FROM publicaciones WHERE `tipo`='galeria' ORDER BY idPublicacion DESC";
  $resultado = mysqli_query($conexion, $consulta);
  while ($fila = mysqli_fetch_array($resultado)) {
    $idPublicacion = $fila['idPublicacion'];
    $consulta2 = "SELECT idArchivo,  tipo, contenido FROM `archivos` where `idPublicacion`= '$idPublicacion' LIMIT 1";
    $resultado2 = mysqli_query($conexion, $consulta2);


    include_once('includes/nav.php');
include_once('includes/navNosotros.php');
  ?>
  
    <div style="margin-top:100px;">
      <div class="col-md-5 container-fluid column  mt-4 d-flex justify-content-center" data-aos="fade-right"
     data-aos-offset="300"
     data-aos-duration="500"
     data-aos-easing="ease-in-sine">
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
  <?php include_once('includes/footer.php'); ?> 
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="js/vendor/modernizr-3.8.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>