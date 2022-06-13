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
            <main class="container" style="width:100%;">
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
    




  <!-- jquery, popper.js y bootstrap js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
   




    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


    <script src='js/galeria.js'> </script>

</body>

</html>