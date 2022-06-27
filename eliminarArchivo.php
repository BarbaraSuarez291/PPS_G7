<?php 
include_once('includes/funciones.php');

include_once('db/conexionDB.php');






if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $idPublicacion = $_GET['idPublicacion'];
    $query = "SELECT * FROM `archivos` WHERE `idArchivo`='$id'";
    $result = mysqli_query($conexion, $query);
    if (!empty($result)) {
        while ($fila = mysqli_fetch_array($result)) {
           
            if (isset($_POST['eliminar'])) {
                eliminarArchivo($conexion, $id, $idPublicacion);
                $url= 'modificarArchivos.php?id='.$idPublicacion;
                header('location:modificarArchivos.php?id=' . $idPublicacion);
            }


            include_once('includes/navAdmin.php');

        echo   " <form action='#' method='post'>";
            $extension = devuelve_extension_de_archivo($fila['tipo']);
            if ($extension == 'image/jpg' || $extension == 'image/jpeg' || $extension == 'image/png') {
                echo  "<td><div class='col-md-12'><img style='width:360;' class='responsive-img col-md-12' src='data:image/jpeg; base64, " . base64_encode($fila['contenido']) . "'> </div>";
            } else {
                echo "<td><div class='d-flex justify-content-center' col-md-12> <video  class='col-md-12'src='data:video/mp4; base64, " . base64_encode($fila['contenido'])  . "'  controls width='360' height='270'></video> </div>";
            }
           echo "<input name='eliminar' type='submit' value='Eliminar' class='btn btn-outline-danger' /> " ;
          
        }
    }else {
       echo "Foto eliminada";

    }
    if (!$result) {
        die("Query Failed.");
    }

}
?>