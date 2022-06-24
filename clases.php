<!doctype html>
<html class="no-js" lang="">
<?php include_once('db/conexionDB.php'); ?>

<?php include_once('includes/head.php'); ?>
<body>
    <!--[if IE]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->
      
  

<header class="site-header">
    <div class="hero">
      <div class="contenido-header">
        <nav class="redes-sociales">
          <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
          <a href="#"><i class="fa-brands fa-youtube"></i></a>
        </nav>
        <div class="informacion-ballet">
         <div class="clearfix">
            <p class="localidad"><i class="fa-solid fa-location-dot"></i> Buenos Aires, Argentina</p>
          </div>
          <h1 class="nombre-sitio">Ballet de Jesús</h1>
          <p class="slogan">Evangelizamos desde la cultura llevando un mensaje de esperanza<p>
     </div><!--.informacion-ballet-->
      </div>
    </div><!--.hero-->
  </header>
  <?php include_once('includes/nav.php'); ?>
<!--
  <div class="barra">
    <div class="contenedor clearfix">
     <div class="logo">
        <img src="img/logo.svg" alt="logo ballet">
      </div>

      <div class="menu-movil">
        <span> </span>
        <span> </span>
        <span> </span>
      </div>

      <nav class="navegacion-principal clearfix">
        <a href="#">Inicio</a>
        <a href="#">Nosotros</a>
        <a href="#">Galeria</a>
        <a href="#">Clases</a>
        <a href="#">Eventos</a>
        
       
      </nav>-->
    </div><!--.contenedor-->
  </div><!--.barra-->


<!--Reseñas-->
<main class="contenedor sombra">
  <section>
    <h2>¡Compartinos tu opinión!</h2>

    <form class="formulario" action="reseñas.php" method="POST">
        <fieldset>
            <legend>Déjame tu comentario rellenando todos los compos</legend>

    <div class="contenedor-campos">
          <div class="campo">
              <label>Nombre</label>
              <input class="input-text" type="nombre" name="nombre" placeholder="Tu Nombre">
          </div>

          <div class="campo">
            <label>Teléfono</label>
            <input class="input-text" type="telefono" name="telefono" placeholder="Tu Teléfono">
          </div>

          <div class="campo">
              <label>Correo</label>
              <input class="input-text" type="email" name="email" placeholder="Tu Email">
          </div>

          <div class="campo">
              <label>Mensaje</label>
              <textarea class="input-text" type="mensaje" name="mensaje" placeholder="Escribe tu opinión aquí..." required></textarea>
          </div>

          <div class="alinear-derecha flex">
              <input class="boton w-sm-100" type="submit" value="Enviar">
          </div>
    </div> <!--.contenedor-campos-->

        
        
        </fieldset>
    </form>
  </section>
</main>

<?php include('includes/footer.php'); ?>

<script type="text/javascript">
      window.addEventListener("scroll", function(){
        var barra = document.querySelector(".barra");
        barra.classList.toggle("abajo",window.scrollY>0);
        var nav = document.querySelector("nav");
        nav.classList.toggle("abajo",window.scrollY>0);
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>
  </html>




<!-- . . . . . . . . . . . .-->


</body>

</html>
