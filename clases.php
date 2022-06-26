<!doctype html>
<html class="no-js" lang="">
<?php include_once('db/conexionDB.php');
include_once('includes/head.php');
?>

<body>
    <!--[if IE]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->
<!--Reseñas reviews-->

<?php 

include_once('includes/nav.php');

?>

<main class="contenedor-vista">
  <div class="contenedor-contenido" style="margin-top:10rem; margin-bottom:5rem;">
    <h3>Compartiendo sus opiniones...</h3>
    <table class="table table-light">
      <thread>
        <tr>
          <th scope="col" class="ocultar">Nombre</th>
          <th scope="col" class="ocultar">Mensaje</th>
          <th scope="col" class="ocultar">Fecha</th>
          
        </tr>
      </thread>

        <?php
        echo "<form action='#' ";
        $consulta = "SELECT * FROM  reseñas ";
        $resultado = mysqli_query($conexion,$consulta);
        while ($fila = mysqli_fetch_array($resultado)) {
          $idReseña = $fila['idReseña'];
          
        ?>
        <tbody>
          <tr>
          <td> <div class="ubicacion"><p><?php echo $fila['nombre']?></p></div></td>
            <td> <div class="ubicacion"><p><?php echo $fila['mensaje']?></p></div></td>
            <th scope="row" class="ubicacion"><?php echo $fila ['fecha'] ?> </th>
            <td>
      <?php } ?>
    </table>
  </div>
</main>
<!--Fin reseñas review-->

<!--Reseñas caja-->
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


<?php include_once('includes/footer.php'); ?>
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
