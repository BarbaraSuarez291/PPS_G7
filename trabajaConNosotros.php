<!DOCTYPE html>
<html lang="en">
<?php
include_once('db/conexionDB.php');
include_once('includes/head.php');
include_once('includes/nav.php');
include_once('includes/navNosotros.php'); ?>



<div class="contenedor_histo " style="margin-top:3rem;">
<div style="padding:3rem;">
  <h3 >¡Súmate a nuestro equipo!</h3>
  <h4> Envianos un mensaje a nuestro Whatsapp adjuntando tu curriculum.</h4>
  <h6><a href="https://api.whatsapp.com/send?phone=0123456789&text= Hola, quisiera ser parte del equipo!">Click Aquí</a></h6>

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