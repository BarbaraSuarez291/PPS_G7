<?php

use function PHPSTORM_META\type;

include('db/conexionDB.php');
include('includes/funciones.php');

$error = false;
if (!empty($_POST)) {
   if (!empty($_POST['descripcion'])) {
    if ((is_uploaded_file($_FILES['archivo1']['tmp_name'])) || (is_uploaded_file($_FILES['archivo2']['tmp_name'])) || (is_uploaded_file($_FILES['archivo3']['tmp_name']))  || (is_uploaded_file($_FILES['archivo4']['tmp_name'])) ) {

        $tipoPublicacion = "galeria";
        $fecha = date('Y-m-d');
       // $fechaS = $fecha['mday'] . "/" . $fecha['mon'] . "/" . $fecha['year'];
        $descripcion = $_POST['descripcion'];
        $admin = 1; //temporal, deberia traerse desde la session el id de admin que ingreso
        $insertPublicacion = "INSERT INTO `publicaciones` (`idPublicacion`, `idAdmin`, `descripcion`,`fecha`, `tipo`) VALUES (0, '$admin', '$descripcion', '$fecha', '$tipoPublicacion')";
    
        if (mysqli_query($conexion, $insertPublicacion)) {
            $rs = mysqli_query($conexion, "SELECT MAX(idPublicacion) AS idPublicacion FROM publicaciones");
            if ($row = mysqli_fetch_row($rs)) {
                $idPublicacion = trim($row[0]);
            }
    
            // extensiones validados
            $extensions_arr = array("mp4", "avi", "3gp", "mov", "mpeg");
    
            verificarPostArchivo($_FILES['archivo1'],$extensions_arr,$idPublicacion, $conexion);
            verificarPostArchivo($_FILES['archivo2'],$extensions_arr,$idPublicacion, $conexion);
            verificarPostArchivo($_FILES['archivo3'],$extensions_arr,$idPublicacion, $conexion);
            verificarPostArchivo($_FILES['archivo4'],$extensions_arr,$idPublicacion, $conexion);
            header('Location:listadoPublicaciones.php');
        }
  }else {

                
        $error = true;
        $message = "Debe seleccionar al menos 1 archivo";
       
    }
}else {
    $error = true;
    $message = "Debe ingresar la descripcion";
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva publicacion</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>
<?php include_once('includes/head.php'); ?>
<?php include_once('includes/navAdmin.php'); ?>

<body>
<div class="container" style="font-size:1.3rem;">
    <?php if ($error == true) : ?>
      <div class="alert alert-danger alert-dismissible fade show" style="margin-top:150px;" role="alert">
        <strong><?php echo $message ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>
  </div>

<div >
<div class="container-fluid column  mt-4 d-flex justify-content-center">
<div class=" justife-content-center col-md-10">
<div class="col-md-12">
<div class="card">
<div class="card-header text-center"><h3>Nueva publicacion</h3></div>
<div class="card-body">
<form action="#" method="post" enctype="multipart/form-data">
<div class="form-group row">
<label for="i1" class="col-md-3 col-form-label text-md-right"></label>
<div class="col-md-7 center">
<input name="archivo1" type="file" class="form-control btn-file" id="btn_file" onchange="return validarExt()" /><br />
</div>
</div>
<div class="form-group row">

<label for="i1" class="col-md-3 col-form-label text-md-right"></label>
<div class="col-md-7 center">
<input name="archivo2" type="file" class="form-control" id="btn_file2" onchange="return validarExt2()"/><br />
</div>
</div>

<div class="form-group row">
<label for="i1" class="col-md-3 col-form-label text-md-right"></label>
<div class="col-md-7 center">
<input name="archivo3" type="file" class="form-control"  id="btn_file3" onchange="return validarExt3()"/><br />
</div>
</div>


<div class="form-group row">
<label for="i1" class="col-md-3 col-form-label text-md-right"></label>
<div class="col-md-7 center">
<input name="archivo4" type="file" class="form-control" id="btn_file4" onchange="return validarExt4()"/><br />
</div>
</div>


<div class="form-group row">
<label for="descripcion" class=" err-input col-md-3 col-form-label text-md-right"></label>
<div class="col-md-7 center">
<textarea name="descripcion" id="descripcion" placeholder="Descripcion" class="form-control"></textarea>
<p id="err_descrip" class="err-alert"></p>
 </div>
</div>

<div class="col-md-6 offset-md-3">
<input  type="submit" value="Crear Publicacion" class="btn btn-outline-primary" />
</div>
</form>
</div>
</div>


</div>
</div>

</div>

</div>
        




    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
   <!-- <script src='js/altaPublicacion.js'>

    </script>-->
    <script src="js/upload.js"></script>
</body>

</html>