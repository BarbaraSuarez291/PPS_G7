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

$consulta = "SELECT descripcion FROM `publicaciones` where idPublicacion='$id'";

$resultado = $conexion->query($consulta);
$rows = $resultado->num_rows;

//si la consulta trae un valor crea la consulta usuario
if($rows > 0 ){
    $row = $resultado->fetch_assoc();
    $descripcion = $row['descripcion'];

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




            <main class="container" style="width:100%;">
            <div class="card">
            <div class="row">
                    <div class="col s12 center-align">
                    <?php if($descripcion != null){
                    echo "<div class='card-header'>". $descripcion ." </div> ";
                } ?>
                    </div>
                </div>
                <div class="row galeria">

                    <?php
                    $consulta2 = "SELECT idArchivo,  tipo, contenido FROM `archivos` where idPublicacion='$id'";
                    $resultado2 = mysqli_query($conexion, $consulta2);

                    while ($fila = mysqli_fetch_array($resultado2)) {
                    ?>
                        <div class="col-md-3 m-2">
                            <div class="material-placeholder">
                                <?php

                                /* echo " ID: " . $fila['idArchivo'] . "<br>";
    echo  " Tipo: " .$fila['tipo'] . "<br>";*/
                                $extension = new SplFileInfo($fila['tipo']);
                                $extension->getExtension();
                                $extension = strtolower($extension);
                                if ($extension == 'image/jpg' || $extension == 'image/jpeg' || $extension == 'image/png') {
                                    echo  "<div class='box-img-video fotos'><img class='responsive-img materialboxed img-galeria imagen' src='data:image/jpeg; base64, " . base64_encode($fila['contenido']) . "'> </div>";
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




        </div>

    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src='js/main.js'> </script>

</body>

</html>