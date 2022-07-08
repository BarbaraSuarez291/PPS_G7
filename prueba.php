<?php
include_once('db/conexionDB.php');
include_once('includes/head.php');
include_once('includes/funciones.php'); ?>

<body>
<div class="container">
      <div class="contee" style="width: 500px;height: 250px;">
        <div>
<?php $archivos = traer_archivos_de_ultima_publicacion($conexion); ?>
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <?php
            for ($i = 0; $i < count($archivos); $i++) {
              if ($i == 0) {  ?>
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $i; ?>" class="active" aria-current="true" aria-label="Slide <?php echo $i + 1; ?>"></button>
                <?php } else { ?>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $i; ?>" aria-label="Slide <?php echo $i + 1; ?>"></button>
              <?php  }
            } ?>
                </div>
                <div class="carousel-inner">
                  <?php
                  for ($i = 0; $i < count($archivos); $i++) {
                    if ($i == 0) {  ?>
                      <div class="carousel-item active">
                        <?php
                        $extension = devuelve_extension_de_archivo($archivos[$i]['tipo']);

                        if ($extension == 'image/jpg' || $extension == 'image/jpeg' || $extension == 'image/png') {

                          echo  "<img  class='d-block w-100 img_carousel' src='data:image/jpeg; base64, " . base64_encode($archivos[$i]['contenido']) . "'> ";
                        } else {

                          echo " <video  class='d-block w-100 img_carousel'src='data:video/mp4; base64, " . base64_encode($archivos[$i]['contenido'])  . "'  controls width='360' height='270'></video> ";
                        }
                        ?> </div>
                    <?php } else { ?>
                      <div class="carousel-item">
                        <?php
                        $extension = devuelve_extension_de_archivo($archivos[$i]['tipo']);

                        if ($extension == 'image/jpg' || $extension == 'image/jpeg' || $extension == 'image/png') {

                          echo  "<img  class='d-block w-100 img_carousel' src='data:image/jpeg; base64, " . base64_encode($archivos[$i]['contenido']) . "'> ";
                        } else {

                          echo " <video  class='d-block w-100 img_carousel'src='data:video/mp4; base64, " . base64_encode($archivos[$i]['contenido'])  . "'  controls width='360' height='270'></video> ";
                        }
                        ?> </div>
                  <?php  }
                  } ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
          </div>

</div>

<div>

</div>




</div></div>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="js/vendor/modernizr-3.8.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>