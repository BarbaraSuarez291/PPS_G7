<?php
include('includes/funciones.php');
include('db/conexionDB.php');



$notificacion = false;
//var_dump($_POST);

if (isset($_POST['codigo']) && $_POST['codigo']!= null) {
    if(guardar_codigo($_POST['codigo'], $conexion)){
      header('videos_abm.php');
        //$notificacion = true;
        //$message ="Link guardado con exito";
        echo "<script>alert('Video cargado con exito');window.location.href='listadoVideos.php'</script>";
      


    }
}



include_once('includes/head.php');
include_once('includes/navAdmin.php');

?>
<div class="container" style="margin-top:1.5rem;font-size:1.3rem;">
    <?php if ($notificacion == true) : ?>
      <div class="alert alert-success alert-dismissible fade show" style="margin-top: 120px;"role="alert">
        <strong><?php echo $message ?></strong>
        <a href="listadoVideos.php"> <button type="button" class="btn btn-success" data-bs-dismiss="alert" aria-label="Close">Volver</button></a>
      </div>
    <?php endif; ?>
  </div>
<div class="container">
  <div>
    <h1>Videos</h1>
  </div>

  <table class="table table-light">
    <form action="videos_abm.php" method="POST">
      <?php
      ?>
      <tr>
        <td> Ingrese url del video </td>
        <td> <input class="" type="text" name="url"></td>
        <td><button class="btn btn-success" type="submit">Cargar video</button></td>

      </tr>
    </form>
    <?php
    ?>
  </table>



  <?php
  if (isset($_POST['url'])) {
    $url = $_POST['url'];
    //con str_split convertimos el string en un array asi podemos tomar solo el codigo que necesitamos
    $arr = str_split($url);
    $codigo = "";
    $link = "";
    for ($i = 17; $i < count($arr); $i++) {
      $codigo = $codigo . $arr[$i];
    }
    for ($i = 0; $i < 17; $i++) {
      $link = $link . $arr[$i];
    }
    if ($link != "https://youtu.be/") {
      echo "<script>alert('Hubo un error con la url.');window.location.href='videos_abm.php'</script>";
      
    }
  ?>
    <div class="contenedor_histo " style="margin-top:3rem; margin-bottom:4rem;">
      <?php echo "<div class='contenedor_histo_red'><div class='container_video' ><iframe width='360' height='115' src='https://www.youtube.com/embed/" . $codigo . "' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' class='video_youtube' allowfullscreen></iframe></div></div>";


      ?> <form action="#" method="POST">
        <div class="contenedor_histo_info">
          <input type="hidden" name="codigo" value="<?php echo $codigo ?>">
          <div style="margin: 0 auto;"><p>Si podes visualizar bien el video oprimi el boton "Guardar"</p></div>
        </div>
        <div style="margin: 0 auto;"><button class="btn btn-success" name="g" type="submit">Guardar</button></div>
    </div>
</div>
</form>
</div>
<?php
  } ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>






</body>