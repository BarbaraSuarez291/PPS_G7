<!doctype html>
<html class="no-js" lang="">
<?php
include_once('db/conexionDB.php');
include_once('includes/head.php');
include_once('includes/funciones.php'); ?>

<body>
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
  <?php include_once('includes/nav.php'); ?>
  <div class="contenedor_inicio">
    <header class="site-header">
      <div class="hero">
        <div class="contenido-header">
          <nav class="redes-sociales">
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-youtube"></i></a>
          </nav>
          <div class="informacion-ballet" data-aos="flip-left" data-aos-duration="2000">
            <div class="clearfix">
              <p class="localidad"><i class="fa-solid fa-location-dot"></i> Buenos Aires, Argentina</p>
            </div>
            <h1 class="nombre-sitio">Ballet de Jesús</h1>
            <p class="slogan">Evangelizamos desde la cultura llevando un mensaje de esperanza
            <p>
          </div>
          <!--.informacion-ballet-->
        </div>
      </div>
      <!--.hero-->
    </header>

    <div class="container" style="margin-top:10rem;">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div id="cars_inicio" class="col  " data-aos="fade-up" data-aos-duration="500">
          <a href="galeria.php">
            <div class="card h-100 ">
              <img src="img/ballet.jpg" class="card-img-top" alt="...">
              <div class="card-body tarjetas_inicio " style="color:#686464 ; background-color:#ffffff;">
                <h5 class="card-title text-center"><i class="fa-solid fa-camera-retro"></i></h5>
                <br>
                <p class="card-text text-center">Recorre nuestra galeria.</p>
              </div>

            </div>
          </a>
        </div>
        <div id="cars_inicio" class="col ">
          <a href="#redes_sociales_inicio">
            <div class="card h-100 " data-aos="fade-up" data-aos-duration="800">
              <div class="card-body tarjetas_inicio" style="color: white; background-color: black">
                <h5 class="card-title text-center"><i class="fa-solid fa-heart"></i></h5>
                <br>
                <p class="card-text text-center">Siguenos en nuestras redes sociales</p>
              </div>
              <img src="img/fondo.jpg" class="card-img-top" alt="...">
            </div>
          </a>
        </div>
        <div id="cars_inicio" class="col">
          <a href="eventos.php">
            <div class="card h-100 " data-aos="fade-up" data-aos-duration="1000">
              <img src="img/ballet_2.jpg" class="card-img-top" alt="...">
              <div class="card-body tarjetas_inicio" style="color: #686464 ;background-color:#ffffff;">
                <h5 class="card-title text-center"><i class="fa-solid fa-calendar-days"></i></h5>
                <br>
                <p class="card-text text-center">Conoce nuestros proximos eventos.</p>
              </div>
            </div>
          </a>
        </div>

      </div>
    </div>


<div style="max-width: 1500px; margin: 0 auto;">
    <div class="contee" data-aos="fade-right" data-aos-duration="1000">
    <div class="galeria__foto">
      <img src="img/ballet_12.jpg" class="galeria__img">
     
    </div>
      <div class="info_inicio ">
        <p class="card-text text-left"><i class="fa-solid fa-cross"></i></p>
        <p class="card-text text-left">Evangelizamos desde la cultura llevando un mensaje de esperanza a distintos escenarios nacionales.</p>
      </div>
    </div>

    <div class="contee con" style="margin-top:0; " data-aos="fade-left" data-aos-duration="1000">
      <div class="info_inicio ">
        <p class="card-text text-left"><i class="fa-solid fa-place-of-worship"></i></p>
        <p class="card-text text-left">Pertenecemos a las Parroquias de Garin y Escobar.</p>

      </div>
      <div class="galeria__foto">
        <img src="img/ballet_4.jpg" class="galeria__img" alt="...">

      </div>

    </div>
    </div>










    <div class="contenedor_redes_inicio">
      <section id="redes_sociales_inicio" class="redes_sociales_inicio">


        <div class="container">
          <div class="text-center nuestras_redes_inicio">
            <h2>Nuestras redes</h2>
          </div>
          <div class="row row-cols-md-3 g-4 text-center iconos_redes_inicio">
            <div class="col" data-aos="zoom-in-down" data-aos-duration="800">
              <a href="https://www.instagram.com/ballet.de.jesus.bs.as/" target="_blank">
                <i class="fa-brands fa-instagram"></i>
              </a>
            </div>
            <div class="col" data-aos="zoom-in-down" data-aos-duration="1300">
              <a href="https://www.facebook.com/Ballet-de-Jes%C3%BAs-Bs-As-1152876074851034" target="_blank">
                <i class="fa-brands fa-facebook"></i>
              </a>
            </div>
            <div class="col" data-aos="zoom-in-down" data-aos-duration="1800">
              <a href="https://www.youtube.com/channel/UCxzXcx4yOFKx0u_3eEmd5-w" target="_blank">
                <i class="fa-brands fa-youtube"></i>

              </a>
            </div>

          </div>
        </div>






      </section>
    </div>

  </div>



  </main>

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