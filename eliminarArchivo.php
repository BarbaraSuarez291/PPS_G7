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
            <input style="width: 170px;" name='eliminar' type='submit' value='Eliminar' class='btn btn-outline-danger'  onclick="return ConfirmDelete()"/>
           
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
<script type="text/javascript">
        function ConfirmDelete(){
          var respuesta = confirm('Esta seguro que desea eliminar?');
       if (respuesta== true) {
          return true;
        }else {
          return false;
        }
      }
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


