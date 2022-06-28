<!DOCTYPE html>
<html lang="en">
<?php
include_once('db/conexionDB.php');
include_once('includes/head.php');
include_once('includes/funciones.php'); ?>

<head>
    <title>Eventos</title>
</head>

<body>


    <?php include_once('includes/nav.php');
    //verifica las fechas de los eventos si el evento ya paso lo elimina
    verificarFechaEvento($conexion);

    ?>
    <div class="titulo_eventos text-center">
        <h1>Nuestro proximos eventos</h1>
    </div>
    <?php
    //lista de todas la publicacines
    $consulta =  "SELECT * FROM publicaciones WHERE `tipo`='evento' ORDER BY fechaEvento ASC";
    $resultado = mysqli_query($conexion, $consulta);
    if ($fila = mysqli_fetch_array($resultado)) {


        while ($fila = mysqli_fetch_array($resultado)) {
            $idPublicacion = $fila['idPublicacion'];
            $fechaEvento = $fila['fechaEvento'];
            $consulta2 = "SELECT idArchivo,  tipo, contenido FROM `archivos` where `idPublicacion`= '$idPublicacion' LIMIT 1";
            $resultado2 = mysqli_query($conexion, $consulta2);
            $query = "SELECT id FROM entradas WHERE idPublicacion=$idPublicacion";
            $r = mysqli_query($conexion, $query);
            $idEntrada = mysqli_fetch_array($r);
    ?>
            <div style="margin-bottom: 3rem;">
                <div class="col-md-5 container-fluid column  mt-4 d-flex justify-content-center">
                    <div class="card" data-aos="zoom-in-down" data-aos-duration="800">
                        <?php

                        while ($fila2 = mysqli_fetch_array($resultado2)) {
                            $extension = devuelve_extension_de_archivo($fila2['tipo']);

                            if ($extension == 'image/jpg' || $extension == 'image/jpeg' || $extension == 'image/png') {
                                echo  "<div class='col-md-12'><img  class='responsive-img card-img-top col-md-12' src='data:image/jpeg; base64, " . base64_encode($fila2['contenido']) . "'> </div>";
                            } else {

                                echo "<div class='d-flex justify-content-center' col-md-12> <video  class='col-md-12'src='data:video/mp4; base64, " . base64_encode($fila2['contenido'])  . "'  controls width='360' height='270'></video> </div>";
                            }
                        } ?>
                        <div class="card-body">
                            <div class="text-right m-2">
                                <h2 class="titulo_evento_card"><?php echo "Proximo evento el " . $fila['fechaEvento'] ?></h2>
                            </div>
                            <h4 class="descrip text-center"><?php
                                                            if ($fila['descripcion'] != null) {
                                                                echo $fila['descripcion'];
                                                            } ?> </h4>
                        </div>
                        <?php
                        if ($idEntrada) {
                        ?>
                        <div class="text-center"> <a class='ticket' href='entrada.php?id=<?php echo $idEntrada['id'] ?>?idPublicacion=<?php echo $idPublicacion ?>'> <i class='fa-solid fa-ticket'></i> Click aqui para comprar entradas  </a></div>
                        <?php } ?>
                        <div class="text-center"> <a href="">
                                <h3> Para mas info contactanos a traves de nuestras redes.. </h3>
                            </a> </div>
                        <div class="card-footer text-muted">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    <?php echo  $fila['fecha']; ?>
                                </font>
                            </font>
                        </div>
                    </div>
                </div>
            </div>


    <?php }
    } else {
        echo "<div style='margin-top:15rem; 'class='d-flex justify-content-center text-center'> <div> <h4> No hay proximos eventos por el momento. </h4> </div> </div>";
    }
    ?>


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