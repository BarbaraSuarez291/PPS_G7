<?php

include_once('db/conexionDB.php');

?>
<!DOCTYPE html>
<html lang="en">
<?php include_once('includes/head.php'); 
include_once('includes/funciones.php');
$videos = listar_videos($conexion);
?>
<head>
    <title>Galeria</title>
</head>



<body>
<?php include_once('includes/nav.php');
      include_once('includes/navNosotros.php');
?>
<div class="container" style="width:460px;">
<?php while($video =  mysqli_fetch_array( $videos)){  ?>
<div class="container_video" style="margin-top:3rem; margin-bottom:6rem; height:315px;width:460px;  border-top: 1px solid black; border-bottom: 1px solid black;"data-aos="fade-left"  data-aos-duration="900" >
<iframe style="padding-top:3rem; padding-bottom:3rem;" width="460" height="315" src="https://www.youtube.com/embed/<?php echo $video['codigo'] ?>?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

<?php  }?>
</div>

<?php include_once('includes/footer.php'); ?> 


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


    <script src='js/galeria.js'> </script>
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