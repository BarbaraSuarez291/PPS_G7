<?php 
include_once('includes/funciones.php');

include_once('db/conexionDB.php');






if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $idPublicacion = $_GET['idPublicacion'];
    $publicacion = traer_publicacion($idPublicacion, $conexion);
    $query = "SELECT * FROM `archivos` WHERE `idArchivo`='$id'";
    $result = mysqli_query($conexion, $query);
    if (!empty($result)) {
        while ($fila = mysqli_fetch_array($result)) {
           
            if (isset($_POST['eliminar'])) {
                eliminarArchivo($conexion, $id, $idPublicacion);
                $url= 'modificarArchivos.php?id='.$idPublicacion;
                echo "<script>alert('Imagen eliminada con exito!');window.location.href='modificarArchivos.php?id=$idPublicacion'</script>";
            }


            include_once('includes/navAdmin.php');

        ?>
        <div class="eliminarArchivo">
        <form action='#' method='post'> <?php
            $extension = devuelve_extension_de_archivo($fila['tipo']);
            if ($extension == 'image/jpg' || $extension == 'image/jpeg' || $extension == 'image/png') {
                echo  "<td><div class='col-md-12'><img style='width:360;' class=' col-md-12' src='data:image/jpeg; base64, " . base64_encode($fila['contenido']) . "'> </div>";
            } else {
                echo "<td><div class='d-flex justify-content-center' col-md-12> <video  class='col-md-12'src='data:video/mp4; base64, " . base64_encode($fila['contenido'])  . "'  controls width='360' height='270'></video> </div>";
            }
           ?>
            <input style="width: 170px;" name='eliminar' type='submit' value='Eliminar' class='btn btn-outline-danger' />
           
            <a style="width: 100px;" class='btn btn-outline-success'  href='modificarArchivos.php?id=<?php echo $idPublicacion ?>'>Volver</a>
         
           
          
           </div>
           
           
           <?php
          
        }
    }else {
       echo "Foto eliminada";

    }
    if (!$result) {
        die("Query Failed.");
    }

}
?>