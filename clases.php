<!doctype html>
<html class="no-js" lang="">
<?php include_once('db/conexionDB.php'); ?>

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=PT+Sans&family=Xanh+Mono&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/main.css">

  <meta name="theme-color" content="#fafafa">
</head>

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

<footer class="footer">
    <p class="footer__texto"> Ballet - Todos los derechos Reservados 2022</p>
</footer>


 <!-- . . . . . . . . . . . .-->

  <script src="js/vendor/modernizr-3.8.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>
