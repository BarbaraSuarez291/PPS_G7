<?php
include_once('db/conexionDB.php');
include_once('includes/head.php');
include_once('includes/funciones.php'); 

if($_GET['id']){
    $idPublicacion = $_GET['id'];
    $publicacion = traer_publicacion($idPublicacion, $conexion);
    $entradas = traer_entrada($idPublicacion, $conexion);
    $archivos = traer_archivos($idPublicacion, $conexion);
}


include_once('includes/nav.php'); 
?>

<body>
<div class="container" style="margin-top:10rem;">
<h1>Compra tus entradas</h1>
<h2>Fecha del evento:  <?php echo $publicacion['fechaEvento']; ?></h2>
<h2><?php echo $publicacion['descripcion'] ?></h2>
<?php
$extension = devuelve_extension_de_archivo($archivos[0]['tipo']);

                            if ($extension == 'image/jpg' || $extension == 'image/jpeg' || $extension == 'image/png') {
                                echo  "<div class='col-md-12'><img  class='responsive-img card-img-top col-md-12' src='data:image/jpeg; base64, " . base64_encode($archivos[0]['contenido']) . "'> </div>";
                            } else {

                                echo "<div class='d-flex justify-content-center' col-md-12> <video  class='col-md-12'src='data:video/mp4; base64, " . base64_encode($fila2['contenido'])  . "'  controls width='360' height='270'></video> </div>";
                            }

?>

<h2>Entradas:</h2>
<div>
    <?php for ($i = 0 ; $i < count($entradas); $i++){?>
    <div class="card">
<h5 class="card-title text-center"><?php echo $entradas[$i]['nombre'] ?></h5>
<p><?php echo $entradas[$i]['precio'] ?></p>
<select name="cantidad">
<option value="0" selected>0</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>

</select>
    </div>
    <?php } ?>
</div>
</div>




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



