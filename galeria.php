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
<?php include_once('includes/nav.php');
      include_once('includes/navNosotros.php'); 
?>
    <div class="container-galeria">
        
        <div class="galeria">
            <main class="container">
                <div class="row">
                    <div class="col s12 center-align">

                    </div>
                </div>
                <div class="row galeria">
                    <?php
                    $consulta2 = "SELECT idArchivo,  tipo, contenido FROM `archivos` order by idArchivo desc";
                    $resultado2 = mysqli_query($conexion, $consulta2);

                    while ($fila = mysqli_fetch_array($resultado2)) {
                    ?>
                        <div class="col-md-3"><!-- col s12 m4 l3 -->
                            <div class="material-placeholder">
                                <?php

                                /* echo " ID: " . $fila['idArchivo'] . "<br>";
    echo  " Tipo: " .$fila['tipo'] . "<br>";*/
                                $extension = new SplFileInfo($fila['tipo']);
                                $extension->getExtension();
                                $extension = strtolower($extension);
                                if ($extension == 'image/jpg' || $extension == 'image/jpeg' || $extension == 'image/png') {
                                    echo  "<div class='box-img-video fotos mt-2'><img class='responsive-img materialboxed img-galeria imagen' src='data:image/jpeg; base64, " . base64_encode($fila['contenido']) . "'> </div>";
                                } else {

                                    echo "<div class='box-img-video videos mt-2'> <video  class='materialboxed'src='data:video/mp4; base64, " . base64_encode($fila['contenido'])  . "'  controls width=' 260' height='170'></video> </div>";
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