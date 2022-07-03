<?php 
include("./LoginPHP/conexion.php");


$id=$_GET['id'];

$sql="SELECT * FROM entradas WHERE id='$id'";
$traer_entrada=mysqli_query($conexion,$sql);

$fila = mysqli_fetch_array($traer_entrada);
include_once('includes/head.php');
include_once('includes/navAdmin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ballet Folklorico - Entradas</title>
</head>
<body>

<div class="card container ">
<div class="card-header text-center">
    <h1>Crear entradas</h1>
</div>
<div class="card-body">
<form action="mod_entrada.php" name="alta1" method="POST">
<input type="hidden" name="id" value="<?php echo $fila['id'] ?>">
    <label class="col-md-3 col-form-label text-md-right">Titulo: </label>
    <div class="col-md-7 center">
    <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $fila['nombre']; ?>"/>
    </div>
    <br>
    <label class="col-md-3 col-form-label text-md-right">Precio: </label>
    <div class="col-md-7 center">
    <input class="form-control" type="text" id="precio" name="precio" value="<?php echo $fila['precio']; ?>"/>
   </div>
    <br>
    <label class="col-md-3 col-form-label text-md-right">Descripcion: </label>
    <div class="col-md-7 center">
      <input class="form-control" type="text" id="descripcion" name="descripcion" value="<?php echo $fila['descripcion']; ?>"/>
    </div>
    <br>
    <label class="col-md-3 col-form-label text-md-right">Cantidad de entradas disponibles: </label>
    <div class="col-md-7 center">
    <input class="form-control" type="text" id="cantidad" name="cantidad" value="<?php echo $fila['cantidad']; ?>"/>
    </div>
    <!-- <input type="date" name="fecha"> -->
    <div class="col-md-6 offset-md-3">
    <input  class="btn btn-primary" type="submit" name="enviar" value="Enviar">  
    
    </div>
</form>
</div>
</div>



