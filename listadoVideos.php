<?php 
include('includes/funciones.php');
include('db/conexionDB.php');
$notificacion = false;
//var_dump($_POST);
if (isset($_POST['eliminar']) && !empty($_POST['id_a_eliminar'])) {
  $id= $_POST['id_a_eliminar'];
  $result = "DELETE FROM `videos` WHERE `id` = $id"; 
  $eliminado = mysqli_query($conexion, $result); 
if ($eliminado = true) {
    $notificacion = true;
    $message = "Video eliminado con exito!";
    echo "<script>alert('Video eliminado con exito!');window.location.href='listadoVideos.php'</script>";
   
}
}


$resultado = listar_videos($conexion);
include_once('includes/head.php');
include_once('includes/navAdmin.php');
?>
<div class="container" style="margin-top:1.5rem;font-size:1.3rem;">
    <?php if ($notificacion == true) : ?>
      <div class="alert alert-success alert-dismissible fade show" style="margin-top: 120px;"role="alert">
        <strong><?php echo $message ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>
  </div>
<div class="container">
     <div>
    <h1>Videos de youtube</h1>
  </div>
  <div >
    <a href="videos_abm.php"><i class="fa-solid fa-circle-plus"></i></a>
  </div>
 
        <table class="table table-light">
          <tr>
            <td> ID </td>
            <td> codigo</td>
            <td> video</td>
            <td> eliminar</td>
          </tr>
          <form action="listadoVideos.php" method="POST">
        <?php
while( $videos = mysqli_fetch_array($resultado)){ 
        ?> 
        <input type="hidden" name="id_a_eliminar" value="<?php echo $videos['id']?>">
          <tr>
            <td> <?php echo $videos['id'];?></td>
            <td> <?php echo $videos['codigo'];?></td>
            <td ><a target="_blank" href=" <?php  echo "https://youtu.be/" . $videos['codigo'] ?>">Ver video en Youtube</a></td>
            <td><button type="submit" class="btn btn-danger" name="eliminar">Eliminar</button></td>
          </tr>
          </form>
        <?php
}
        ?>
        </table>
          </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>






</body>