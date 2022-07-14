<?php

include_once('db/conexionDB.php');
include_once('includes/head.php');
include_once('includes/nav.php');

$id = '';
$contenido = '';
$tipo = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$consulta = "SELECT * FROM `publicaciones` where idPublicacion='$id'";

$resultado = $conexion->query($consulta);
$rows = $resultado->num_rows;

//si la consulta trae un valor crea la consulta usuario
if($rows > 0 ){
    $row = $resultado->fetch_assoc();
    $descripcion = $row['descripcion'];
    $fechaEvento = $row['fechaEvento'];
    $fecha = $row['fecha'];
    $tipoPublicacion = $row['tipo'];
}

/*echo " ID: " . $id . "<br>";
echo  " Tipo: " . $tipo . "<br>";
echo  "<img src='data:image/jpg; base64, " . base64_encode($contenido) . "'>";*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Ballet de Jesus</title>
</head>

<body>

    <div class="container-galeria">

        <div class="galeria">

            <main class="container" style="width:100%; margin-top:10rem; text-align:center;">
                <div class=" text-center">
                    <?php if($tipoPublicacion == "evento") { ?>
                    <div class="text-right m-2">
                        <h2 class="titulo_evento_card"><?php echo "Te esperamos el " . $fechaEvento ?></h2>
                    </div>
                    <?php } ?>
                    <div class="row">
                            <div class="col s12 center-align">
                            <?php if($descripcion != null){
                            echo "<div class=''>". $descripcion ." </div> ";
                        } ?>
                    </div>
                </div>

                <div class="grid-galeria ">
                    <?php
                    $consulta2 = "SELECT idArchivo,  tipo, contenido FROM `archivos` where idPublicacion='$id'";
                    $resultado2 = mysqli_query($conexion, $consulta2);
                    while ($fila = mysqli_fetch_array($resultado2)) {
                    ?>
                        <div class="col-md-3 m-2 text-center ">
                            <div class="material-placeholder ">
                                <?php
                                $extension = new SplFileInfo($fila['tipo']);
                                $extension->getExtension();
                                $extension = strtolower($extension);
                                if ($extension == 'image/jpg' || $extension == 'image/jpeg' || $extension == 'image/png') {
                                    echo  "<div class='box-img-fotos'><img class='responsive-img materialboxed ' src='data:image/jpeg; base64, " . base64_encode($fila['contenido']) . "'> </div>";
                                } else {

                                    echo "<div class='box-img-video videos'> <video  class='materialboxed'src='data:video/mp4; base64, " . base64_encode($fila['contenido'])  . "'  controls width=' 260' height='170'></video> </div>";
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                    } ?>
                </div>
            </main>




        </div><!-- .galeria-->

    </div> <!-- .container-galeria-->


 
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="js/vendor/modernizr-3.8.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src='js/galeria.js'> </script>
</body>

</html>