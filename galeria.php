<?php

include_once('db/conexionDB.php');

$id = '';
$contenido = '';
$tipo = '';

/*
$resultado = $conexion->query($consulta);
$rows = $resultado->num_rows;
//si la consulta trae un valor crea la consulta usuario
if($rows > 0 ){
    $row = $resultado->fetch_assoc();
    $id = $row['idArchivo'];
}
else{
    echo "<script>
        alert('Error: No existe en db');
    </script>";
}
*/
/*echo " ID: " . $id . "<br>";
echo  " Tipo: " . $tipo . "<br>";
echo  "<img src='data:image/jpg; base64, " . base64_encode($contenido) . "'>";*/ ?>
<!DOCTYPE html>
<html lang="en">
<?php include_once('includes/head.php'); ?>
<head>
    <title>Galeria</title>
</head>



<body>
<?php

include_once('includes/funciones.php');
include_once('includes/nav.php');
include_once('includes/navNosotros.php');
?>
    <div class="container-gallery">

        <div class="galeria">
            <main class="container">
              
                    <?php
                    $consulta2 = "SELECT idArchivo,  tipo, contenido FROM `archivos` order by idArchivo desc";
                    $resultado2 = mysqli_query($conexion, $consulta2);

                    while ($fila = mysqli_fetch_array($resultado2)) {
                    ?>

                                <?php

                                /* echo " ID: " . $fila['idArchivo'] . "<br>";
    echo  " Tipo: " .$fila['tipo'] . "<br>";*/
                                $extension =devuelve_extension_de_archivo($fila['tipo']);
                                if ($extension == 'image/jpg' || $extension == 'image/jpeg' || $extension == 'image/png') {
                                $archivos[] = base64_encode($fila['contenido']);
                                }
                                
                    }
                    ?>
                    <div class="row galeria">
                    <div class="text-center"><!-- col s12 m4 l3 -->
                    <div class="material-placeholder wrapper">
                    <?php
                    if (!empty($archivos)) {
                        for($i=0; $i<count($archivos); $i++){
                            //  echo  "<div class='box-img-video fotos mt-2'><img class='responsive-img materialboxed img-galeria imagen' src='data:image/jpeg; base64, " . base64_encode($fila['contenido']) . "'> </div>";
                          echo  "<div class='box-img-video fotos mt-2'><img class=' materialboxed img-galeria imagen' src='data:image/jpeg; base64, " . ($archivos[$i]) . "'> </div>";
      
                          }
                    }else{
                        echo "<div class='d-flex justify-content-center text-center'> <div> <h4> Ups, no hay nada por aqui todavia... </h4> </div> </div>";
                    }
                   
                    ?>
                       </div>
                        </div>
                </div>
            </main>
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